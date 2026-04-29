(function (window, document) {
    "use strict";

    var config = window.AdminNotificationsConfig || {};
    var selectors = config.selectors || {};
    var state = {
        isFirstLoad: true,
        unreadCount: 0,
        notifications: [],
        unreadIds: {},
        knownIds: {},
        markReadTimer: null,
        audioUnlocked: false,
        pusherChannel: null
    };

    function getElement(key) {
        return document.querySelector(selectors[key] || "");
    }

    function escapeHtml(value) {
        return String(value || "")
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function request(url, options) {
        return window.fetch(url, options || {}).then(function (response) {
            if (!response.ok) {
                throw new Error("Notification request failed with status " + response.status);
            }

            return response.json();
        });
    }

    function getNotificationIdentity(notification) {
        if (!notification) {
            return "";
        }

        if (notification.notification_id) {
            return "notification-" + notification.notification_id;
        }

        if (notification.id) {
            return "notification-" + notification.id;
        }

        if (notification.task_id) {
            return "task-" + notification.task_id;
        }

        return "message-" + (notification.message || "") + "-" + (notification.created_at || notification.timestamp || "");
    }

    function normalizeNotification(notification) {
        return {
            id: notification && notification.id ? parseInt(notification.id, 10) : 0,
            notification_id: notification && notification.notification_id ? parseInt(notification.notification_id, 10) : 0,
            task_id: notification && notification.task_id ? parseInt(notification.task_id, 10) : 0,
            message: notification && notification.message ? notification.message : "A customer assigned a new task.",
            type: notification && notification.type ? notification.type : "task_assigned",
            is_read: notification && typeof notification.is_read !== "undefined" ? parseInt(notification.is_read, 10) : 0,
            created_at: notification && (notification.created_at || notification.timestamp) ? (notification.created_at || notification.timestamp) : ""
        };
    }

    function rememberNotifications(notifications) {
        var nextUnreadIds = {};
        var nextKnownIds = {};
        var index;
        var item;
        var identity;

        for (index = 0; index < notifications.length; index += 1) {
            item = normalizeNotification(notifications[index]);
            identity = getNotificationIdentity(item);
            nextKnownIds[identity] = true;

            if (parseInt(item.is_read, 10) === 0) {
                nextUnreadIds[identity] = true;
            }

            notifications[index] = item;
        }

        state.notifications = notifications;
        state.unreadIds = nextUnreadIds;
        state.knownIds = nextKnownIds;
    }

    function renderList() {
        var list = getElement("list");
        var html = "";
        var index;
        var item;
        var isUnread;

        if (!list) {
            return;
        }

        if (!state.notifications.length) {
            list.innerHTML = '<div class="admin-notification-empty">No notifications yet. New task assignments will appear here.</div>';
            return;
        }

        for (index = 0; index < state.notifications.length; index += 1) {
            item = state.notifications[index];
            isUnread = parseInt(item.is_read, 10) === 0;

            html += ''
                + '<a href="javascript:void(0);" class="admin-notification-entry' + (isUnread ? ' is-unread' : '') + '">'
                + '<strong>' + escapeHtml(item.message) + '</strong>'
                + '<small>' + escapeHtml(item.created_at) + '</small>'
                + '</a>';
        }

        list.innerHTML = html;
    }

    function renderBadge() {
        var badge = getElement("badge");
        var pill = getElement("pill");
        var bellToggle = getElement("dropdown");

        if (pill) {
            pill.textContent = state.unreadCount > 99 ? "99+" : String(state.unreadCount);
        }

        if (!badge || !bellToggle) {
            return;
        }

        if (state.unreadCount > 0) {
            badge.hidden = false;
            badge.textContent = state.unreadCount > 99 ? "99+" : String(state.unreadCount);
            bellToggle.classList.add("has-unread");
            bellToggle.classList.add("is-ringing");
        } else {
            badge.hidden = true;
            bellToggle.classList.remove("has-unread");
            bellToggle.classList.remove("is-ringing");
        }
    }

    function renderTitle() {
        var title = getElement("title");

        if (!title) {
            return;
        }

        title.textContent = state.unreadCount > 0 ? state.unreadCount + " unread notifications" : "Notifications";
    }

    function renderAll() {
        renderList();
        renderBadge();
        renderTitle();
    }

    function createToast(notification) {
        var root = getElement("toastRoot");
        var toast;
        var title;
        var message;

        if (!root) {
            return;
        }

        toast = document.createElement("div");
        toast.className = "admin-notification-toast";

        title = document.createElement("strong");
        title.textContent = "New task assigned";

        message = document.createElement("p");
        message.textContent = notification.message;

        toast.appendChild(title);
        toast.appendChild(message);
        root.insertBefore(toast, root.firstChild);

        window.setTimeout(function () {
            toast.classList.add("is-visible");
        }, 20);

        window.setTimeout(function () {
            toast.classList.remove("is-visible");

            window.setTimeout(function () {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 260);
        }, 4200);
    }

    function playFallbackBeep() {
        var AudioContextClass = window.AudioContext || window.webkitAudioContext;
        var context;
        var oscillator;
        var gain;

        if (!AudioContextClass) {
            return;
        }

        context = new AudioContextClass();
        oscillator = context.createOscillator();
        gain = context.createGain();

        oscillator.type = "sine";
        oscillator.frequency.value = 880;
        gain.gain.value = 0.04;

        oscillator.connect(gain);
        gain.connect(context.destination);
        oscillator.start();

        window.setTimeout(function () {
            oscillator.stop();

            if (typeof context.close === "function") {
                context.close();
            }
        }, 180);
    }

    function playSound() {
        var sound = getElement("sound");
        var playPromise;

        if (!sound) {
            playFallbackBeep();
            return;
        }

        try {
            sound.currentTime = 0;
            playPromise = sound.play();

            if (playPromise && typeof playPromise.catch === "function") {
                playPromise.catch(function () {
                    playFallbackBeep();
                });
            }
        } catch (error) {
            playFallbackBeep();
        }
    }

    function unlockAudio() {
        var sound = getElement("sound");
        var playPromise;

        if (state.audioUnlocked || !sound) {
            return;
        }

        state.audioUnlocked = true;

        try {
            sound.muted = true;
            playPromise = sound.play();

            if (playPromise && typeof playPromise.then === "function") {
                playPromise.then(function () {
                    sound.pause();
                    sound.currentTime = 0;
                    sound.muted = false;
                }).catch(function () {
                    sound.muted = false;
                });
            } else {
                sound.pause();
                sound.currentTime = 0;
                sound.muted = false;
            }
        } catch (error) {
            sound.muted = false;
        }
    }

    function bindAudioUnlock() {
        var events = ["click", "touchstart", "keydown"];
        var index;

        for (index = 0; index < events.length; index += 1) {
            document.addEventListener(events[index], unlockAudio, { once: true, passive: true });
        }
    }

    function normalizeResponse(response) {
        var notifications = response && Array.isArray(response.notifications) ? response.notifications : [];
        var unreadCount = response && response.unread_count ? parseInt(response.unread_count, 10) : 0;

        if (window.isNaN(unreadCount)) {
            unreadCount = 0;
        }

        notifications = notifications.map(normalizeNotification);

        return {
            notifications: notifications,
            unreadCount: unreadCount
        };
    }

    function applyServerState(response) {
        var normalized = normalizeResponse(response);

        state.unreadCount = normalized.unreadCount;
        rememberNotifications(normalized.notifications);
        renderAll();
        state.isFirstLoad = false;
    }

    function prependNotification(notification) {
        var normalized = normalizeNotification(notification);
        var identity = getNotificationIdentity(normalized);

        if (state.knownIds[identity]) {
            return;
        }

        state.notifications.unshift(normalized);
        state.notifications = state.notifications.slice(0, 10);
        state.unreadCount += 1;
        state.unreadIds[identity] = true;
        state.knownIds[identity] = true;

        renderAll();
        createToast(normalized);
        playSound();
    }

    function loadNotifications() {
        if (!config.endpoints || !config.endpoints.fetch) {
            return;
        }

        request(config.endpoints.fetch, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
            credentials: "same-origin"
        }).then(function (response) {
            applyServerState(response);
        }).catch(function (error) {
            if (window.console && typeof window.console.error === "function") {
                window.console.error(error);
            }
        });
    }

    function markNotificationsRead() {
        if (!config.endpoints || !config.endpoints.markRead) {
            return;
        }

        request(config.endpoints.markRead, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
            credentials: "same-origin"
        }).then(function (response) {
            applyServerState(response);
        }).catch(function (error) {
            if (window.console && typeof window.console.error === "function") {
                window.console.error(error);
            }
        });
    }

    function bindDropdownEvents() {
        var dropdown = getElement("dropdown");
        var dropdownContainer;

        if (!dropdown) {
            return;
        }

        dropdownContainer = dropdown.parentNode;

        if (window.jQuery && window.jQuery.fn && typeof window.jQuery.fn.dropdown === "function") {
            window.jQuery(dropdownContainer).on("shown.bs.dropdown", function () {
                unlockAudio();
                window.clearTimeout(state.markReadTimer);
                state.markReadTimer = window.setTimeout(markNotificationsRead, 250);
            });
        } else {
            dropdown.addEventListener("click", function () {
                unlockAudio();
                window.clearTimeout(state.markReadTimer);
                state.markReadTimer = window.setTimeout(markNotificationsRead, 250);
            });
        }
    }

    function initPusher() {
        var pusherConfig = config.pusher || {};
        var pusher;

        if (!pusherConfig.enabled) {
            return;
        }

        if (typeof window.Pusher === "undefined") {
            if (window.console && typeof window.console.warn === "function") {
                window.console.warn("Pusher JS client is not available.");
            }
            return;
        }

        pusher = new window.Pusher(pusherConfig.key, {
            cluster: pusherConfig.cluster,
            forceTLS: true
        });

        state.pusherChannel = pusher.subscribe(pusherConfig.channel || "admin-channel");
        state.pusherChannel.bind(pusherConfig.event || "task-assigned", function (eventData) {
            prependNotification(eventData || {});
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        bindAudioUnlock();
        bindDropdownEvents();
        loadNotifications();
        initPusher();
    });
})(window, document);
