<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Waiting</title>
    <?php $this->load->view("CSS"); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --waiting-card: rgba(255, 255, 255, 0.72);
            --waiting-card-border: rgba(15, 23, 42, 0.06);
            --waiting-text: #111827;
            --waiting-muted: #6b7280;
            --waiting-soft: #475569;
            --waiting-red: #ff4d6d;
            --waiting-pink: #ff758f;
            --waiting-yellow: #facc15;
            --waiting-green: #22c55e;
            --waiting-red-badge: #ef4444;
            --waiting-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            --waiting-surface: #ffffff;
            --waiting-panel: rgba(255, 255, 255, 0.9);
            --waiting-panel-border: rgba(15, 23, 42, 0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: var(--waiting-text);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 0, 100, 0.15), transparent);
            z-index: 0;
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            right: -120px;
            bottom: -120px;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.12), transparent);
            z-index: 0;
            pointer-events: none;
        }

        p {
            color: #6b7280;
        }

        h1, h2, h3 {
            color: #111827;
        }

        .booking-waiting-section {
            position: relative;
            padding: 90px 0 110px;
            isolation: isolate;
            z-index: 1;
        }

        .booking-waiting-section::before,
        .booking-waiting-section::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            filter: blur(40px);
            opacity: 0.7;
            z-index: -1;
        }

        .booking-waiting-section::before {
            width: 260px;
            height: 260px;
            top: 40px;
            left: 8%;
            background: rgba(255, 77, 109, 0.14);
        }

        .booking-waiting-section::after {
            width: 320px;
            height: 320px;
            right: 6%;
            bottom: 40px;
            background: rgba(59, 130, 246, 0.1);
        }

        .waiting-stage {
            max-width: 940px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .waiting-card {
            position: relative;
            overflow: hidden;
            padding: 42px;
            border-radius: 30px;
            background: var(--waiting-card);
            border: 1px solid var(--waiting-card-border);
            box-shadow: var(--waiting-shadow);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            animation: waitingFadeIn 0.8s ease both;
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        }

        .waiting-card::before {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: 29px;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.35));
            pointer-events: none;
        }

        .waiting-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.12);
            border-color: rgba(15, 23, 42, 0.08);
        }

        .waiting-card > * {
            position: relative;
            z-index: 1;
        }

        .waiting-header {
            text-align: center;
            margin-bottom: 34px;
        }

        .waiting-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            margin-bottom: 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(15, 23, 42, 0.06);
            color: var(--waiting-soft);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .waiting-title {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.25rem);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -0.04em;
            background: linear-gradient(90deg, #ff4d6d, #ff758f);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .waiting-subtitle {
            max-width: 620px;
            margin: 16px auto 0;
            color: var(--waiting-muted);
            font-size: 16px;
            line-height: 1.8;
        }

        .waiting-hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(280px, 0.9fr);
            gap: 24px;
            align-items: stretch;
            margin-bottom: 30px;
        }

        .timer-panel,
        .summary-panel,
        .provider-panel {
            border-radius: 26px;
            border: 1px solid var(--waiting-panel-border);
            background: var(--waiting-panel);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .timer-panel {
            padding: 28px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 320px;
        }

        .timer-ring {
            position: relative;
            width: min(100%, 290px);
            aspect-ratio: 1;
            margin: 0 auto;
            border-radius: 50%;
            padding: 18px;
            background:
                radial-gradient(circle at center, #ffffff 0 58%, transparent 59%),
                conic-gradient(from 180deg, rgba(255, 77, 109, 0.75), rgba(255, 117, 143, 0.72), rgba(251, 191, 36, 0.62), rgba(255, 77, 109, 0.75));
            box-shadow:
                0 0 0 10px rgba(255, 0, 100, 0.05),
                0 10px 30px rgba(0, 0, 0, 0.1);
            animation: timerPulse 2.4s ease-in-out infinite;
        }

        .timer-ring::before {
            content: "";
            position: absolute;
            inset: 14px;
            border-radius: 50%;
            background:
                radial-gradient(circle at 35% 30%, rgba(255, 77, 109, 0.08), transparent 34%),
                linear-gradient(180deg, #ffffff, #fff8fb);
            border: 1px solid rgba(15, 23, 42, 0.05);
        }

        .timer-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 42px;
        }

        .timer-label {
            margin-bottom: 10px;
            color: var(--waiting-muted);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.24em;
            text-transform: uppercase;
        }

        #timer_text {
            margin: 0;
            font-size: clamp(2.8rem, 6vw, 4.2rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: 0.08em;
            color: #111827;
            text-shadow: none;
        }

        .timer-caption {
            margin-top: 12px;
            color: var(--waiting-soft);
            font-size: 14px;
            line-height: 1.7;
        }

        .summary-panel {
            padding: 28px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 22px;
        }

        .summary-block {
            padding: 18px 20px;
            border-radius: 20px;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .summary-label {
            display: block;
            margin-bottom: 10px;
            color: var(--waiting-muted);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        #status_text {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 0;
            padding: 12px 18px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: 0.02em;
            color: #111827;
            background: rgba(250, 204, 21, 0.95);
            box-shadow: 0 8px 22px rgba(250, 204, 21, 0.2);
        }

        #status_text::before {
            content: "";
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: currentColor;
            box-shadow: 0 0 12px currentColor;
        }

        #status_text.status-pending {
            color: #4a3700;
            background: #facc15;
            box-shadow: 0 8px 22px rgba(250, 204, 21, 0.2);
        }

        #status_text.status-accepted {
            color: #fff;
            background: #22c55e;
            box-shadow: 0 8px 22px rgba(34, 197, 94, 0.24);
        }

        #status_text.status-rejected,
        #status_text.status-expired,
        #status_text.status-not-found {
            color: #fff;
            background: #ef4444;
            box-shadow: 0 8px 22px rgba(239, 68, 68, 0.22);
        }

        .summary-note {
            margin: 0;
            color: var(--waiting-soft);
            font-size: 15px;
            line-height: 1.8;
        }

        .summary-metrics {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .metric-card {
            padding: 18px;
            border-radius: 20px;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .metric-value {
            display: block;
            margin-bottom: 6px;
            color: #111827;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .metric-label {
            color: var(--waiting-muted);
            font-size: 13px;
            line-height: 1.5;
        }

        #provider_box {
            display: none;
            margin-top: 0;
        }

        .provider-panel {
            padding: 28px;
            animation: waitingFadeIn 0.65s ease both;
        }

        .provider-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .provider-panel-title {
            margin: 0;
            color: #111827;
            font-size: clamp(1.4rem, 2.5vw, 1.8rem);
            font-weight: 700;
            letter-spacing: -0.03em;
        }

        .provider-panel-subtitle {
            margin: 8px 0 0;
            color: var(--waiting-muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .review-nav-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .nav-btn {
            padding: 10px 22px;
            border-radius: 999px;
            border: none;
            font-weight: 600;
            background: #f1f5f9;
            color: #111;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .nav-btn:hover {
            background: linear-gradient(90deg, #ff4d6d, #ff758f);
            color: #fff;
            transform: translateY(-2px);
        }

        .nav-btn.active {
            background: linear-gradient(90deg, #ff4d6d, #ff758f);
            color: #fff;
            box-shadow: 0 8px 20px rgba(255, 77, 109, 0.3);
        }

        .provider-panel-pill {
            padding: 10px 16px;
            border-radius: 999px;
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.18);
            color: #15803d;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .provider-content {
            display: grid;
            grid-template-columns: 180px minmax(0, 1fr);
            gap: 24px;
            align-items: start;
        }

        .provider-avatar-wrap {
            display: flex;
            justify-content: center;
        }

        #provider_image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid rgba(255, 77, 109, 0.14);
            box-shadow:
                0 18px 35px rgba(15, 23, 42, 0.12),
                0 0 0 10px rgba(255, 77, 109, 0.04);
            background: #ffffff;
        }

        .provider-details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .provider-detail-card {
            min-height: 100%;
            padding: 18px 18px 16px;
            border-radius: 20px;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
        }

        .provider-detail-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 77, 109, 0.12);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }

        .detail-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            margin-bottom: 14px;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(255, 77, 109, 0.12), rgba(255, 117, 143, 0.08));
            color: #ff4d6d;
            font-size: 18px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.7);
        }

        .detail-label {
            display: block;
            margin-bottom: 7px;
            color: var(--waiting-muted);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .detail-value {
            margin: 0;
            color: #111827;
            font-size: 15px;
            line-height: 1.7;
            word-break: break-word;
        }

        #debug_text {
            margin: 22px 0 0;
            text-align: center;
            color: var(--waiting-muted);
            font-size: 12px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        @keyframes waitingFadeIn {
            from {
                opacity: 0;
                transform: translateY(22px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes timerPulse {
            0%, 100% {
                transform: scale(1);
                box-shadow:
                    0 0 0 10px rgba(255, 0, 100, 0.05),
                    0 10px 30px rgba(0, 0, 0, 0.1);
            }
            50% {
                transform: scale(1.02);
                box-shadow:
                    0 0 0 14px rgba(255, 0, 100, 0.06),
                    0 16px 36px rgba(0, 0, 0, 0.11);
            }
        }

        @media (max-width: 991px) {
            .booking-waiting-section {
                padding: 70px 0 90px;
            }

            .waiting-card {
                padding: 30px 22px;
                border-radius: 26px;
            }

            .waiting-hero-grid,
            .provider-content {
                grid-template-columns: 1fr;
            }

            .provider-avatar-wrap {
                justify-content: flex-start;
            }
        }

        @media (max-width: 767px) {
            .timer-panel,
            .summary-panel,
            .provider-panel {
                border-radius: 22px;
            }

            .timer-panel {
                min-height: 280px;
                padding: 20px 16px;
            }

            .timer-ring {
                width: min(100%, 250px);
            }

            .summary-panel,
            .provider-panel {
                padding: 22px 18px;
            }

            .summary-metrics,
            .provider-details-grid {
                grid-template-columns: 1fr;
            }

            .provider-panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .provider-avatar-wrap {
                justify-content: center;
            }

            #provider_image {
                width: 132px;
                height: 132px;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <?php $this->load->view("header"); ?>
</div>

<div class="main-sec"></div>

<section class="booking-waiting-section" id="food">
    <div class="container">
        <div class="waiting-stage">
            <div class="waiting-card">
                <div class="waiting-header">
                    <span class="waiting-chip">⏳ Live Booking Tracker</span>
                    <h1 class="waiting-title">Waiting for Provider Response</h1>
                    <p class="waiting-subtitle">Your booking request has been sent successfully. We are checking for a provider update in real time and will surface the response here the moment it arrives.</p>
                </div>

                <div class="waiting-hero-grid">
                    <div class="timer-panel">
                        <div class="timer-ring">
                            <div class="timer-content">
                                <span class="timer-label">Response Countdown</span>
                                <h3 id="timer_text">02:00</h3>
                                <p class="timer-caption">Please keep this page open while we wait for the provider to respond.</p>
                            </div>
                        </div>
                    </div>

                    <div class="summary-panel">
                        <div class="summary-block">
                            <span class="summary-label">Current Booking Status</span>
                            <p id="status_text" class="status-pending">Status: Pending</p>
                        </div>

                        <div class="summary-block">
                            <span class="summary-label">What Happens Next</span>
                            <p class="summary-note">Once accepted, the assigned provider profile will appear instantly below with contact details, experience, languages, and service background.</p>
                        </div>

                        <div class="summary-metrics">
                            <div class="metric-card">
                                <span class="metric-value">Live</span>
                                <span class="metric-label">Auto-refreshing status updates every second</span>
                            </div>
                            <div class="metric-card">
                                <span class="metric-value">Secure</span>
                                <span class="metric-label">Your request is being tracked safely in real time</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="review-nav-buttons">
                    <a href="<?php echo base_url('Restaurant-Details/' . (int) $booking->provider_id); ?>#review" class="nav-btn active">Review</a>
                    <a href="<?php echo site_url('User-Order'); ?>" class="nav-btn">Services</a>
                </div>

                <div id="provider_box">
                    <div class="provider-panel" id="review">
                        <div class="provider-panel-header">
                            <div>
                                <h4 class="provider-panel-title">Your Service Provider</h4>
                                <p class="provider-panel-subtitle">Provider details are now available. Review the profile information below before proceeding.</p>
                            </div>
                            <span class="provider-panel-pill">Assigned</span>
                        </div>

                        <div class="provider-content">
                            <div class="provider-avatar-wrap">
                                <img id="provider_image" src="" alt="Provider Image">
                            </div>

                            <div class="provider-details-grid">
                                <div class="provider-detail-card">
                                    <span class="detail-icon">👤</span>
                                    <span class="detail-label">Name</span>
                                    <p class="detail-value"><span id="provider_name"></span></p>
                                </div>

                                <div class="provider-detail-card">
                                    <span class="detail-icon">⭐</span>
                                    <span class="detail-label">Primary Skill</span>
                                    <p class="detail-value"><span id="provider_skill"></span></p>
                                </div>

                                <div class="provider-detail-card">
                                    <span class="detail-icon">🏆</span>
                                    <span class="detail-label">Experience</span>
                                    <p class="detail-value"><span id="provider_experience"></span></p>
                                </div>

                                <div class="provider-detail-card">
                                    <span class="detail-icon">🌐</span>
                                    <span class="detail-label">Languages</span>
                                    <p class="detail-value"><span id="provider_languages"></span></p>
                                </div>

                                <div class="provider-detail-card">
                                    <span class="detail-icon">📞</span>
                                    <span class="detail-label">Phone</span>
                                    <p class="detail-value"><span id="provider_phone"></span></p>
                                </div>

                                <div class="provider-detail-card">
                                    <span class="detail-icon">📧</span>
                                    <span class="detail-label">Email</span>
                                    <p class="detail-value"><span id="provider_email"></span></p>
                                </div>

                                <div class="provider-detail-card" style="grid-column: 1 / -1;">
                                    <span class="detail-icon">📝</span>
                                    <span class="detail-label">About</span>
                                    <p class="detail-value"><span id="provider_about"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p id="debug_text"></p>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view("footer"); ?>
<?php $this->load->view("footerscript"); ?>

<script>
var bookingId = <?php echo (int)$booking->booking_id; ?>;
var checkUrl = "<?php echo base_url('check-booking-status'); ?>/" + bookingId;
var autoInterval = null;

function setActiveNavButton(targetLabel)
{
    var buttons = document.querySelectorAll('.review-nav-buttons .nav-btn');

    buttons.forEach(function(button) {
        button.classList.remove('active');

        if ((button.innerText || '').trim().toLowerCase() === targetLabel) {
            button.classList.add('active');
        }
    });
}

function formatTime(seconds)
{
    var min = Math.floor(seconds / 60);
    var sec = seconds % 60;

    if (min < 10) min = '0' + min;
    if (sec < 10) sec = '0' + sec;

    return min + ':' + sec;
}

function scrollToReview()
{
    var reviewSection = document.getElementById('review');

    setActiveNavButton('review');

    if (reviewSection) {
        reviewSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

function goToServices()
{
    setActiveNavButton('services');
    window.location.href = "<?= base_url('Restaurant-Details/' . (isset($booking->restaurant_id) ? $booking->restaurant_id : '') . '#food') ?>";
}

function setProviderData(provider)
{
    if (!provider) return;

    var providerImage = '';

    if (provider.profile_pic && provider.profile_pic !== '') {
        providerImage = "<?php echo base_url(); ?>" + provider.profile_pic;
    } else if (provider.coverpic && provider.coverpic !== '') {
        providerImage = "<?php echo base_url(); ?>" + provider.coverpic;
    } else {
        providerImage = "<?php echo base_url(); ?>assets/img/login.png";
    }

    document.getElementById('provider_image').src = providerImage;
    document.getElementById('provider_name').innerText = provider.owner_name ? provider.owner_name : '-';
    document.getElementById('provider_skill').innerText = provider.primary_skill ? provider.primary_skill : '-';
    document.getElementById('provider_experience').innerText = provider.experience ? provider.experience : '-';
    document.getElementById('provider_languages').innerText = provider.languages ? provider.languages : '-';
    document.getElementById('provider_phone').innerText = provider.contact_no ? provider.contact_no : '-';
    document.getElementById('provider_email').innerText = provider.email ? provider.email : '-';
    document.getElementById('provider_about').innerText = provider.about_me ? provider.about_me : '-';

    document.getElementById('provider_box').style.display = 'block';
}

function checkBookingStatus()
{
    fetch(checkUrl, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        document.getElementById('debug_text').innerText = 'Last updated: ' + new Date().toLocaleTimeString();

        if (typeof data.remaining_seconds !== 'undefined') {
            document.getElementById('timer_text').innerText = formatTime(data.remaining_seconds);
        }

        if (data.status === 'pending') {
            document.getElementById('status_text').innerText = 'Status: Pending';
        }
        else if (data.status === 'accepted') {
            document.getElementById('status_text').innerText = 'Status: Accepted';
            document.getElementById('timer_text').innerText = '00:00';
            setProviderData(data.provider);

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
        else if (data.status === 'rejected') {
            document.getElementById('status_text').innerText = 'Status: Rejected';
            document.getElementById('timer_text').innerText = '00:00';

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
        else if (data.status === 'expired') {
            document.getElementById('status_text').innerText = 'Status: Expired';
            document.getElementById('timer_text').innerText = '00:00';

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
        else {
            document.getElementById('status_text').innerText = 'Status: Not Found';

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
    })
    .catch(function(error){
        document.getElementById('debug_text').innerText = 'Error fetching status';
        console.log(error);
    });
}

checkBookingStatus();
autoInterval = setInterval(checkBookingStatus, 1000);
</script>

<script>
(function () {
    var statusEl = document.getElementById('status_text');

    if (!statusEl) {
        return;
    }

    function syncStatusBadge() {
        var value = (statusEl.innerText || '').toLowerCase();
        statusEl.classList.remove('status-pending', 'status-accepted', 'status-rejected', 'status-expired', 'status-not-found');

        if (value.indexOf('accepted') !== -1) {
            statusEl.classList.add('status-accepted');
        } else if (value.indexOf('rejected') !== -1) {
            statusEl.classList.add('status-rejected');
        } else if (value.indexOf('expired') !== -1) {
            statusEl.classList.add('status-expired');
        } else if (value.indexOf('not found') !== -1) {
            statusEl.classList.add('status-not-found');
        } else {
            statusEl.classList.add('status-pending');
        }
    }

    syncStatusBadge();

    if (window.MutationObserver) {
        new MutationObserver(syncStatusBadge).observe(statusEl, {
            childList: true,
            characterData: true,
            subtree: true
        });
    } else {
        setInterval(syncStatusBadge, 500);
    }
})();
</script>

</body>
</html>
