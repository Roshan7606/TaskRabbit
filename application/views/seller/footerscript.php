
<!-- Core Vendors JS -->
<script src="<?php echo base_url(); ?>seller_assets/js/vendors.min.js"></script>

<script src="<?php echo base_url(); ?>seller_assets/js/custom.js"></script>

<!-- page js -->
<script src="<?php echo base_url(); ?>seller_assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/dashboard-default.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/datatables.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/e-commerce-order-list.js"></script>
<script src="<?php echo base_url();?>assets/js/form-validation.js"></script>

<!-- Core JS -->
<script src="<?php echo base_url(); ?>seller_assets/js/app.min.js"></script>

<!-- page js -->
<script src="<?php echo base_url(); ?>seller_assets/vendors/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/quill/quill.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/form-elements.js"></script>

<!--validation start-->
<script type="text/javascript">
    (function (w, d) {


                function LetterAvatar(name, size) {

                    name = name || '';
                    size = size || 60;

                    var colours = [
                        "#FF0000", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                        "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                    ],
                            nameSplit = String(name).toUpperCase().split(' '),
                            initials, charIndex, colourIndex, canvas, context, dataURI;


                    if (nameSplit.length == 1) {
                        initials = nameSplit[0] ? nameSplit[0].charAt(0) : '?';
                    } else {
                        initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
                    }

                    if (w.devicePixelRatio) {
                        size = (size * w.devicePixelRatio);
                    }

                    charIndex = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
                    colourIndex = charIndex % 20;
                    canvas = d.createElement('canvas');
                    canvas.width = size;
                    canvas.height = size;
                    context = canvas.getContext("2d");

                    context.fillStyle = "#FF0000";
                    context.fillRect(0, 0, canvas.width, canvas.height);
                    context.font = Math.round(canvas.width / 2) + "px Arial";
                    context.textAlign = "center";
                    context.fillStyle = "#FFF";
                    context.fillText(initials, size / 2, size / 1.5);

                    dataURI = canvas.toDataURL();
                    canvas = null;

                    return dataURI;
                }

                LetterAvatar.transform = function () {

                    Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function (img, name) {
                        name = img.getAttribute('avatar');
                        img.src = LetterAvatar(name, img.getAttribute('width'));
                        img.removeAttribute('avatar');
                        img.setAttribute('alt', name);
                    });
                };


                // AMD support
                if (typeof define === 'function' && define.amd) {

                    define(function () {
                        return LetterAvatar;
                    });

                    // CommonJS and Node.js module support.
                } else if (typeof exports !== 'undefined') {

                    // Support Node.js specific `module.exports` (which can be a function)
                    if (typeof module != 'undefined' && module.exports) {
                        exports = module.exports = LetterAvatar;
                    }

                    // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
                    exports.LetterAvatar = LetterAvatar;

                } else {

                    window.LetterAvatar = LetterAvatar;

                    d.addEventListener('DOMContentLoaded', function (event) {
                        LetterAvatar.transform();
                    });
                }

            })(window, document);
    $("input[check_control]").keypress(function (e) {
        if ($(this).attr("check_control") == "alpha") 
        {
            var regex = new RegExp("^[a-zA-Z -]+$");
        } 
        else if ($(this).attr("check_control") == "number") 
        {
            var regex = new RegExp("^[0-9]+$");
        } 
        else if ($(this).attr("check_control") == "pwd") 
        {
            var regex = new RegExp("^[0-9a-zA-Z!@#$%^&*.]+$");
        }
        else 
        {
            var regex = new RegExp("^[a-zA-Z0-9.@_]+$");
        }
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            $(this).removeClass("form_error").addClass("form_valid");
            return true;
        } else {
            $(this).removeClass("form_valid").addClass("form_error");
        }
        e.preventDefault();
        return false;
    });
    $("input[check_control]").blur(function () {
        var val = this.value;
        if (val == "") {
            $(this).removeClass("form_valid").addClass("form_error");
        } else {
            $(this).removeClass("form_error").addClass("form_valid");
        }
    });
    
    setTimeout(function () {
        $(".my_alert_success").fadeOut("slow");
    }, 4000);
    setTimeout(function () {
        $(".my_alert").fadeOut("slow");
    }, 3000);

</script>

<!--validation end-->

<!-- EYE CHANGE EVENTS START  -->
<script>
    $c = 1;

    function showpass(id, cls)
    {
        if ($c == 1)
        {
            $(id).attr("type", "text");
            $(cls).css("color", "red");
            $(cls).removeClass("fa-eye");
            $(cls).addClass("fa-eye-slash");
            $c = 0;
        } else
        {
            $(id).attr("type", "password");
            $(cls).css("color", "#000");
            $(cls).removeClass("fa-eye-slash");
            $(cls).addClass("fa-eye");
            $c = 1;
        }

    }
</script>

<!-- EYE CHANGE EVENTS END  -->
<script>
    (function (w, d) {
        var endpoint = '<?php echo base_url('TaskProviderController/get_new_tasks_notifications'); ?>';
        var bookingRequestsUrl = '<?php echo base_url('Restaurant-Booking-Requests'); ?>';
        var notificationSoundPath = '<?php echo base_url('assets/notification.mp3'); ?>';
        var pollingDelay = 5000;
        var isPolling = false;
        var lastNotificationCount = 0;
        var shownTaskIds = {};
        var notificationAudio = null;
        var audioUnlocked = false;
        var bell = d.getElementById('task-provider-notification-bell');
        var countLabel = d.getElementById('task-provider-notification-count');
        var notificationList = d.getElementById('task-provider-notification-list');
        var toastContainer = null;

        if (!bell || !countLabel || !notificationList) {
            return;
        }

        function ensureToastContainer() {
            if (toastContainer) {
                return toastContainer;
            }

            toastContainer = d.getElementById('notification-toast-container');

            if (!toastContainer) {
                toastContainer = d.createElement('div');
                toastContainer.id = 'notification-toast-container';
                toastContainer.setAttribute('style', 'position:fixed;top:20px;right:20px;z-index:9999;display:flex;flex-direction:column;align-items:flex-end;gap:10px;pointer-events:none;');
                d.body.appendChild(toastContainer);
            }

            return toastContainer;
        }

        function ensureToastStyles() {
            if (d.getElementById('task-provider-toast-styles')) {
                return;
            }

            var style = d.createElement('style');
            style.id = 'task-provider-toast-styles';
            style.textContent = ''
                + '@keyframes taskProviderToastIn {'
                + 'from { transform: translate3d(110%, 0, 0); opacity: 0; }'
                + 'to { transform: translate3d(0, 0, 0); opacity: 1; }'
                + '}'
                + '@keyframes taskProviderToastOut {'
                + 'from { transform: translate3d(0, 0, 0); opacity: 1; }'
                + 'to { transform: translate3d(110%, 0, 0); opacity: 0; }'
                + '}'
                + '#notification-toast-container .task-provider-toast {'
                + 'pointer-events:auto;'
                + 'width:min(320px, calc(100vw - 32px));'
                + 'padding:14px 16px;'
                + 'border-radius:14px;'
                + 'background:linear-gradient(135deg, #111827 0%, #1f2937 100%);'
                + 'border:1px solid rgba(255,255,255,0.08);'
                + 'box-shadow:0 18px 45px rgba(15,23,42,0.28);'
                + 'color:#f8fafc;'
                + 'opacity:0;'
                + 'transform:translate3d(110%,0,0);'
                + 'animation:taskProviderToastIn 0.3s ease forwards;'
                + '}'
                + '#notification-toast-container .task-provider-toast.is-hiding {'
                + 'animation:taskProviderToastOut 0.3s ease forwards;'
                + '}'
                + '#notification-toast-container .task-provider-toast-title {'
                + 'display:block;'
                + 'margin-bottom:6px;'
                + 'font-size:14px;'
                + 'font-weight:700;'
                + 'letter-spacing:0.01em;'
                + '}'
                + '#notification-toast-container .task-provider-toast-line {'
                + 'display:block;'
                + 'font-size:13px;'
                + 'line-height:1.5;'
                + 'color:rgba(248,250,252,0.82);'
                + '}';
            d.head.appendChild(style);
        }

        function escapeHtml(value) {
            var text = value == null ? '' : String(value);

            return text
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function updateBadge(count) {
            var safeCount = parseInt(count, 10) || 0;

            bell.setAttribute('data-count', safeCount > 99 ? '99+' : String(safeCount));

            if (safeCount > 0) {
                bell.classList.add('has-count');
            } else {
                bell.classList.remove('has-count');
            }

            countLabel.textContent = safeCount + ' New';
        }

        function showToast(task) {
            var container = ensureToastContainer();
            var toast = d.createElement('div');

            toast.className = 'task-provider-toast';
            toast.innerHTML = ''
                + '<strong class="task-provider-toast-title">New Task Assigned</strong>'
                + '<span class="task-provider-toast-line">Customer: ' + escapeHtml(task.customer_name || 'Customer') + '</span>'
                + '<span class="task-provider-toast-line">Service: ' + escapeHtml(task.category_name || 'Service') + '</span>';

            container.appendChild(toast);

            w.setTimeout(function () {
                toast.classList.add('is-hiding');

                w.setTimeout(function () {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 300);
            }, 4000);
        }

        function renderNotificationList(tasks) {
            var safeTasks = Array.isArray(tasks) ? tasks : [];
            var html = '';

            if (!safeTasks.length) {
                notificationList.innerHTML = '' +
                    '<div class="dropdown-item d-block p-15 border-bottom">' +
                        '<div class="d-flex">' +
                            '<div class="avatar avatar-blue avatar-icon">' +
                                '<i class="anticon anticon-bell"></i>' +
                            '</div>' +
                            '<div class="m-l-15">' +
                                '<p class="m-b-0 text-dark">No new task notifications</p>' +
                                '<p class="m-b-0"><small>New task assignments will appear here.</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</div>';
                return;
            }

            safeTasks.forEach(function (task, index) {
                var borderClass = index === safeTasks.length - 1 ? '' : ' border-bottom';
                var taskTitle = task.booking_status === 'pending'
                    ? 'New task from ' + escapeHtml(task.customer_name || 'Customer')
                    : escapeHtml(task.customer_name || 'Customer') + ' task is ' + escapeHtml(task.booking_status || 'updated');

                html += '' +
                    '<a href="' + bookingRequestsUrl + '" class="dropdown-item d-block p-15' + borderClass + '">' +
                        '<div class="d-flex">' +
                            '<div class="avatar avatar-cyan avatar-icon">' +
                                '<i class="anticon anticon-calendar"></i>' +
                            '</div>' +
                            '<div class="m-l-15">' +
                                '<p class="m-b-0 text-dark">' + taskTitle + '</p>' +
                                '<p class="m-b-0"><small>' + escapeHtml(task.category_name || 'Service') + ' on ' + escapeHtml(task.service_date || '') + ' ' + escapeHtml(task.service_time || '') + '</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</a>';
            });

            notificationList.innerHTML = html;
        }

        function setupNotificationAudio() {
            if (notificationAudio) {
                return notificationAudio;
            }

            try {
                notificationAudio = new Audio(notificationSoundPath);
                notificationAudio.preload = 'auto';
            } catch (error) {
                notificationAudio = null;
            }

            return notificationAudio;
        }

        function unlockNotificationAudio() {
            var audio = setupNotificationAudio();

            if (!audio || audioUnlocked) {
                return;
            }

            var playPromise = audio.play();

            if (playPromise && typeof playPromise.then === 'function') {
                playPromise
                    .then(function () {
                        audio.pause();
                        audio.currentTime = 0;
                        audioUnlocked = true;
                        detachAudioUnlockListeners();
                    })
                    .catch(function () {
                        return null;
                    });
            }
        }

        function attachAudioUnlockListeners() {
            d.addEventListener('click', unlockNotificationAudio, { passive: true });
            d.addEventListener('keydown', unlockNotificationAudio, { passive: true });
            d.addEventListener('scroll', unlockNotificationAudio, { passive: true });
            d.addEventListener('touchstart', unlockNotificationAudio, { passive: true });
        }

        function detachAudioUnlockListeners() {
            d.removeEventListener('click', unlockNotificationAudio, { passive: true });
            d.removeEventListener('keydown', unlockNotificationAudio, { passive: true });
            d.removeEventListener('scroll', unlockNotificationAudio, { passive: true });
            d.removeEventListener('touchstart', unlockNotificationAudio, { passive: true });
        }

        function playNotificationSound() {
            var audio = setupNotificationAudio();

            if (!audio) {
                return null;
            }

            try {
                audio.pause();
                audio.currentTime = 0;

                var playPromise = audio.play();

                if (playPromise && typeof playPromise.then === 'function') {
                    playPromise.catch(function () {
                        return null;
                    });
                }
            } catch (error) {
                return null;
            }
        }

        function getUnshownTasks(tasks) {
            return (Array.isArray(tasks) ? tasks : []).filter(function (task) {
                if (!task || typeof task.booking_id === 'undefined' || task.booking_id === null) {
                    return false;
                }

                return !shownTaskIds[String(task.booking_id)];
            });
        }

        function rememberShownTasks(tasks) {
            (Array.isArray(tasks) ? tasks : []).forEach(function (task) {
                if (!task || typeof task.booking_id === 'undefined' || task.booking_id === null) {
                    return;
                }

                shownTaskIds[String(task.booking_id)] = true;
            });
        }

        function prependBookingRows(tasks) {
            var tableBody = d.querySelector('.table tbody');

            if (!tableBody || !tasks.length || !w.location.href.match(/Restaurant-Booking-Requests/i)) {
                return;
            }

            tasks.slice().reverse().forEach(function (task) {
                if (d.getElementById('booking-row-' + task.booking_id)) {
                    return;
                }

                var row = d.createElement('tr');
                row.id = 'booking-row-' + task.booking_id;
                row.className = 'booking-request-row';
                row.setAttribute('data-booking-id', task.booking_id);
                row.setAttribute('data-status', task.booking_status || 'pending');
                row.setAttribute('data-expiry', task.expires_at || '');
                row.setAttribute('data-expiry-timestamp', Math.floor(new Date(task.expires_at).getTime() / 1000));
                row.innerHTML = '' +
                    '<td data-label="ID"><strong>#' + escapeHtml(task.booking_id) + '</strong></td>' +
                    '<td data-label="Service"><strong>' + escapeHtml(task.category_name || '') + '</strong><span class="booking-copy">Requested service category</span></td>' +
                    '<td data-label="Name"><strong>' + escapeHtml(task.customer_name || '') + '</strong><span class="booking-copy">Customer profile</span></td>' +
                    '<td data-label="Phone">' + escapeHtml(task.customer_phone || '') + '</td>' +
                    '<td data-label="Email">' + escapeHtml(task.customer_email || '') + '</td>' +
                    '<td data-label="Address">' + escapeHtml(task.customer_address || '') + '</td>' +
                    '<td data-label="Description"><span class="booking-copy">' + escapeHtml(task.customer_description || '') + '</span></td>' +
                    '<td data-label="Date">' + escapeHtml(task.service_date || '') + '</td>' +
                    '<td data-label="Time">' + escapeHtml(task.service_time || '') + '</td>' +
                    '<td data-label="Status" class="booking-status-cell"><span class="badge badge-warning">Pending</span></td>' +
                    '<td data-label="Timer"><span class="booking-timer timer-pill">00:00</span></td>' +
                    '<td data-label="Action" class="booking-action-cell"><div class="action-group"><a href="' + escapeHtml(task.accept_url) + '" class="btn btn-success btn-sm m-b-5 booking-action-btn accept-btn" data-action="accepted">Accept</a><a href="' + escapeHtml(task.reject_url) + '" class="btn btn-danger btn-sm m-b-5 booking-action-btn reject-btn" data-action="rejected">Reject</a></div></td>';

                tableBody.insertBefore(row, tableBody.firstChild);
            });
        }

        function pollNotifications() {
            if (isPolling) {
                return;
            }

            isPolling = true;

            fetch(endpoint, {
                method: 'GET',
                credentials: 'same-origin',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (!data || data.status !== true) {
                    return;
                }

                var count = parseInt(data.new_tasks_count, 10) || 0;
                var tasks = Array.isArray(data.tasks) ? data.tasks : [];
                var latestNewTasks = count > 0 ? getUnshownTasks(tasks.slice(0, count)) : [];

                updateBadge(count);
                renderNotificationList(tasks);
                prependBookingRows(tasks);

                if (latestNewTasks.length > 0) {
                    latestNewTasks.forEach(function (task) {
                        showToast(task);
                    });
                    playNotificationSound();
                }

                rememberShownTasks(latestNewTasks);
                lastNotificationCount = count;
            })
            .catch(function () {
                return null;
            })
            .finally(function () {
                isPolling = false;
            });
        }

        ensureToastStyles();
        ensureToastContainer();
        setupNotificationAudio();
        attachAudioUnlockListeners();
        updateBadge(0);
        pollNotifications();
        w.setInterval(pollNotifications, pollingDelay);
    })(window, document);
</script>
