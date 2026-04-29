<?php
$this->config->load('pusher');
$pusherConfig = (array) $this->config->item('pusher');
?>
<style>
    .admin-notification-nav {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .admin-notification-item {
        position: relative;
    }

    .admin-notification-toggle {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        border-radius: 16px;
        background: linear-gradient(135deg, #ffffff 0%, #f4f7fb 100%);
        box-shadow: 0 12px 30px rgba(31, 45, 61, 0.12);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .admin-notification-toggle:hover,
    .admin-notification-toggle:focus {
        transform: translateY(-1px);
        box-shadow: 0 16px 34px rgba(31, 45, 61, 0.18);
    }

    .admin-bell-icon {
        font-size: 18px;
        color: #2f4050;
        transition: color 0.2s ease, transform 0.2s ease;
        transform-origin: top center;
    }

    .admin-notification-toggle.has-unread .admin-bell-icon {
        color: #e67e22;
    }

    .admin-notification-toggle.is-ringing .admin-bell-icon {
        animation: adminBellPulse 1.4s ease-in-out infinite;
    }

    .admin-notification-badge {
        position: absolute;
        top: 6px;
        right: 4px;
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        border-radius: 999px;
        border: 2px solid #ffffff;
        background: linear-gradient(135deg, #ff6b4a 0%, #ff3d68 100%);
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        line-height: 16px;
        text-align: center;
        box-shadow: 0 10px 18px rgba(255, 83, 83, 0.28);
    }

    .admin-notification-badge[hidden] {
        display: none !important;
    }

    .admin-notification-menu {
        width: 360px;
        padding: 0;
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 24px 60px rgba(31, 45, 61, 0.18);
        background: #ffffff;
    }

    .admin-notification-menu li {
        list-style: none;
    }

    .admin-notification-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 18px 14px;
        background: linear-gradient(135deg, #243949 0%, #517fa4 100%);
        color: #ffffff;
    }

    .admin-notification-header strong {
        display: block;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: 0.01em;
    }

    .admin-notification-header span {
        display: block;
        font-size: 12px;
        opacity: 0.86;
    }

    .admin-notification-pill {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 28px;
        height: 28px;
        padding: 0 9px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.14);
        font-size: 12px;
        font-weight: 700;
    }

    .admin-notification-list {
        margin: 0;
        padding: 0;
        max-height: 360px;
        overflow-y: auto;
        background: #f8fafc;
    }

    .admin-notification-entry {
        position: relative;
        display: block;
        padding: 16px 18px;
        border-bottom: 1px solid rgba(36, 57, 73, 0.08);
        background: #ffffff;
        text-decoration: none;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .admin-notification-entry:hover,
    .admin-notification-entry:focus {
        background: #f6fbff;
        text-decoration: none;
        transform: translateX(2px);
    }

    .admin-notification-entry.is-unread {
        background: linear-gradient(90deg, rgba(37, 99, 235, 0.08) 0%, rgba(255, 255, 255, 1) 32%);
    }

    .admin-notification-entry.is-unread::before {
        content: "";
        position: absolute;
        top: 20px;
        left: 8px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #2563eb;
        box-shadow: 0 0 0 5px rgba(37, 99, 235, 0.12);
    }

    .admin-notification-entry strong {
        display: block;
        margin-bottom: 6px;
        padding-left: 10px;
        color: #243949;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.45;
    }

    .admin-notification-entry small {
        display: block;
        padding-left: 10px;
        color: #6b7280;
        font-size: 12px;
    }

    .admin-notification-empty {
        padding: 28px 18px;
        color: #6b7280;
        text-align: center;
        background: #ffffff;
    }

    .admin-notification-toast-root {
        position: fixed;
        top: 88px;
        right: 22px;
        z-index: 1200;
        width: min(360px, calc(100vw - 32px));
        pointer-events: none;
    }

    .admin-notification-toast {
        position: relative;
        margin-bottom: 12px;
        padding: 16px 18px 16px 54px;
        border-radius: 18px;
        background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        color: #ffffff;
        box-shadow: 0 24px 50px rgba(15, 23, 42, 0.28);
        opacity: 0;
        transform: translate3d(0, -14px, 0);
        transition: opacity 0.25s ease, transform 0.25s ease;
        pointer-events: auto;
        overflow: hidden;
    }

    .admin-notification-toast::before {
        content: "\f0f3";
        position: absolute;
        top: 16px;
        left: 18px;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
        color: #ffd166;
        font: normal normal normal 14px/26px FontAwesome;
        text-align: center;
    }

    .admin-notification-toast.is-visible {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }

    .admin-notification-toast strong {
        display: block;
        margin-bottom: 4px;
        font-size: 13px;
        font-weight: 700;
    }

    .admin-notification-toast p {
        margin: 0;
        color: rgba(255, 255, 255, 0.82);
        font-size: 12px;
        line-height: 1.5;
    }

    @keyframes adminBellPulse {
        0%, 100% {
            transform: rotate(0deg) scale(1);
        }

        20% {
            transform: rotate(10deg) scale(1.08);
        }

        40% {
            transform: rotate(-10deg) scale(1.12);
        }

        60% {
            transform: rotate(8deg) scale(1.08);
        }

        80% {
            transform: rotate(-5deg) scale(1.04);
        }
    }

    @media (max-width: 767px) {
        .admin-notification-menu {
            width: 320px;
        }

        .admin-notification-toast-root {
            top: 76px;
            right: 14px;
            width: calc(100vw - 24px);
        }
    }
</style>

<nav class="navbar navbar-default yamm navbar-fixed-top" style="z-index: 11">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand admin-premium-brand" href="<?php echo base_url("Admin-Home"); ?>"><span>task</span><strong>rabbit</strong></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right navbar-top-drops admin-notification-nav">
                <li class="dropdown admin-notification-item">
                    <a
                        href="#"
                        id="notificationDropdown"
                        class="dropdown-toggle button-wave admin-notification-toggle"
                        data-toggle="dropdown"
                        aria-expanded="false"
                        aria-haspopup="true"
                        aria-label="View notifications"
                    >
                        <i id="bell-icon" class="fa fa-bell admin-bell-icon" aria-hidden="true"></i>
                        <span id="notification-badge" class="admin-notification-badge" hidden>0</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right admin-notification-menu" aria-labelledby="notificationDropdown">
                        <li class="admin-notification-header">
                            <div>
                                <strong id="notification-title-text">Notifications</strong>
                                <span>Real-time admin activity stream</span>
                            </div>
                            <span id="notification-pill" class="admin-notification-pill">0</span>
                        </li>
                        <li>
                            <div id="notification-list" class="admin-notification-list">
                                <div class="admin-notification-empty">Loading notifications...</div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="admin-notification-toast-root" class="admin-notification-toast-root" aria-live="polite" aria-atomic="true"></div>

<audio id="notifSound" preload="auto">
    <source src="<?php echo base_url('assets/notification.mp3'); ?>" type="audio/mpeg">
</audio>

<script>
    window.AdminNotificationsConfig = {
        endpoints: {
            fetch: "<?php echo base_url('admin/get_notifications.php'); ?>",
            markRead: "<?php echo base_url('admin/mark_notifications_read.php'); ?>"
        },
        soundUrl: "<?php echo base_url('assets/notification.mp3'); ?>",
        pusher: {
            enabled: <?php echo !empty($pusherConfig['enabled']) ? 'true' : 'false'; ?>,
            key: "<?php echo isset($pusherConfig['key']) ? addslashes($pusherConfig['key']) : ''; ?>",
            cluster: "<?php echo isset($pusherConfig['cluster']) ? addslashes($pusherConfig['cluster']) : ''; ?>",
            channel: "<?php echo isset($pusherConfig['channel']) ? addslashes($pusherConfig['channel']) : 'admin-channel'; ?>",
            event: "<?php echo isset($pusherConfig['event']) ? addslashes($pusherConfig['event']) : 'task-assigned'; ?>"
        },
        selectors: {
            dropdown: "#notificationDropdown",
            bell: "#bell-icon",
            badge: "#notification-badge",
            list: "#notification-list",
            title: "#notification-title-text",
            pill: "#notification-pill",
            toastRoot: "#admin-notification-toast-root",
            sound: "#notifSound"
        }
    };
</script>
<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
<script src="<?php echo base_url('admin_assets/js/notifications.js'); ?>" defer></script>
