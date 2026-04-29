<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant SignUp</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            :root {
                --bg-dark: #f8fbff;
                --bg-mid: #eef4ff;
                --card-bg: rgba(255, 255, 255, 0.74);
                --card-border: rgba(148, 163, 184, 0.2);
                --text-main: #0f172a;
                --text-soft: rgba(51, 65, 85, 0.78);
                --text-muted: rgba(100, 116, 139, 0.9);
                --field-bg: rgba(255, 255, 255, 0.96);
                --field-border: rgba(148, 163, 184, 0.28);
                --primary-a: #ff7a18;
                --primary-b: #ff4d8d;
                --shadow-xl: 0 28px 70px rgba(148, 163, 184, 0.22);
                --shadow-md: 0 18px 44px rgba(148, 163, 184, 0.18);
                --radius-xl: 28px;
                --transition: 0.3s ease;
            }

            * { box-sizing: border-box; }
            html, body { min-height: 100%; }

            body {
                margin: 0;
                font-family: 'Inter', sans-serif;
                color: var(--text-main);
                background:
                    radial-gradient(circle at top left, rgba(255, 122, 24, 0.14), transparent 32%),
                    radial-gradient(circle at 85% 16%, rgba(244, 114, 182, 0.12), transparent 24%),
                    radial-gradient(circle at 50% 90%, rgba(96, 165, 250, 0.14), transparent 26%),
                    linear-gradient(135deg, #fbfdff 0%, #eff6ff 52%, #fff1f7 100%);
                overflow-x: hidden;
            }

            body::before,
            body::after {
                content: "";
                position: fixed;
                width: 420px;
                height: 420px;
                border-radius: 50%;
                filter: blur(70px);
                opacity: 0.45;
                z-index: 0;
                animation: floatGlow 9s ease-in-out infinite;
                pointer-events: none;
            }

            body::before {
                top: -80px;
                left: -100px;
                background: rgba(255, 122, 24, 0.18);
            }

            body::after {
                right: -120px;
                bottom: -100px;
                background: rgba(96, 165, 250, 0.14);
                animation-delay: -4s;
            }

            a, input, button, label, .premium-checkbox-label::before, .illustration-panel, .stat-pill {
                transition: all var(--transition);
            }

            .seller-auth-shell {
                position: relative;
                z-index: 1;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 32px 20px;
            }

            .seller-auth-frame {
                width: min(1240px, 100%);
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .seller-auth-brand,
            .seller-auth-grid,
            .seller-auth-footer {
                opacity: 0;
                transform: translateY(18px);
                animation: fadeSlideUp 0.85s ease forwards;
            }

            .seller-auth-brand {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                padding: 0 6px;
            }

            .seller-auth-brand img {
                height: 58px;
                width: auto;
            }

            .seller-auth-brand span {
                color: var(--text-soft);
                font-size: 14px;
                letter-spacing: 0.04em;
                text-transform: uppercase;
            }

            .seller-auth-grid {
                animation-delay: 0.08s;
                display: grid;
                grid-template-columns: minmax(0, 540px) minmax(0, 1fr);
                background: rgba(255, 255, 255, 0.58);
                border: 1px solid rgba(255, 255, 255, 0.72);
                border-radius: 32px;
                box-shadow: var(--shadow-xl);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                overflow: hidden;
            }

            .auth-form-panel,
            .illustration-panel {
                position: relative;
                min-height: 760px;
            }

            .auth-form-panel {
                padding: 42px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.72) 0%, rgba(248, 250, 252, 0.9) 100%);
            }

            .auth-card {
                width: 100%;
                max-width: 430px;
                padding: 40px;
                border-radius: var(--radius-xl);
                background: var(--card-bg);
                border: 1px solid var(--card-border);
                box-shadow: var(--shadow-md);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 14px;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.84);
                border: 1px solid rgba(148, 163, 184, 0.18);
                color: #b45309;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 18px;
            }

            .eyebrow::before {
                content: "";
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--primary-a), var(--primary-b));
                box-shadow: 0 0 16px rgba(255, 122, 24, 0.9);
            }

            .auth-title {
                margin: 0;
                font-size: 34px;
                line-height: 1.14;
                font-weight: 800;
                letter-spacing: -0.03em;
                color: var(--text-main);
            }

            .auth-subtitle {
                margin: 14px 0 28px;
                color: var(--text-soft);
                font-size: 15px;
                line-height: 1.7;
            }

            .form-group { margin-bottom: 18px; }

            .form-label {
                display: block;
                margin-bottom: 8px;
                color: rgba(51, 65, 85, 0.9);
                font-size: 13px;
                font-weight: 600;
                letter-spacing: 0.02em;
            }

            .premium-field-wrap { position: relative; }

            .field-leading-icon {
                position: absolute;
                left: 18px;
                top: 50%;
                transform: translateY(-50%);
                width: 20px;
                height: 20px;
                color: rgba(100, 116, 139, 0.72);
                pointer-events: none;
                z-index: 2;
            }

            .premium-input {
                width: 100%;
                height: 62px;
                border-radius: 18px;
                border: 1px solid var(--field-border);
                background: var(--field-bg);
                color: var(--text-main);
                padding: 24px 54px 14px 52px;
                font-size: 15px;
                font-weight: 500;
                outline: none;
                box-shadow: none;
            }

            .premium-input::placeholder { color: transparent; }
            .premium-input:hover {
                border-color: rgba(148, 163, 184, 0.4);
                background: #ffffff;
            }

            .premium-input:focus {
                border-color: rgba(255, 143, 92, 0.82);
                box-shadow: 0 0 0 4px rgba(255, 122, 24, 0.14), 0 14px 32px rgba(255, 122, 24, 0.1);
                background: #ffffff;
            }

            .floating-label {
                position: absolute;
                top: 50%;
                left: 52px;
                transform: translateY(-50%);
                color: var(--text-muted);
                font-size: 14px;
                font-weight: 500;
                pointer-events: none;
                z-index: 2;
                padding: 0 6px;
                border-radius: 999px;
            }

            .premium-field-wrap.is-active .floating-label,
            .premium-field-wrap.is-filled .floating-label {
                top: 12px;
                transform: translateY(0);
                font-size: 11px;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                color: rgba(100, 116, 139, 0.95);
                background: rgba(255, 255, 255, 0.92);
            }

            .premium-input.input-valid {
                border: 1px solid rgba(34, 197, 94, 0.75) !important;
                box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.12) !important;
                padding-right: 56px;
            }

            .premium-input.input-invalid,
            .my_error {
                border: 1px solid rgba(255, 107, 107, 0.8) !important;
                box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.12) !important;
            }

            .field-valid-icon {
                position: absolute;
                right: 54px;
                top: 50%;
                transform: translateY(-50%) scale(0.7);
                width: 24px;
                height: 24px;
                display: none;
                z-index: 5;
                border-radius: 50%;
                background: rgba(34, 197, 94, 0.16);
                border: 1px solid rgba(34, 197, 94, 0.42);
                color: #86efac;
                font-size: 13px;
                font-weight: 700;
                line-height: 22px;
                text-align: center;
                animation: tickPop 0.35s ease forwards;
            }

            .field-icon {
                position: absolute;
                right: 16px;
                top: 50%;
                transform: translateY(-50%);
                width: 34px;
                height: 34px;
                border-radius: 50%;
                border: none;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: rgba(255, 255, 255, 0.88);
                color: rgba(100, 116, 139, 0.9);
                cursor: pointer;
                z-index: 6;
                font-size: 0;
            }

            .field-icon::before {
                content: "\f06e";
                font-family: "Font Awesome 5 Free";
                font-weight: 900;
                font-size: 14px;
            }

            .field-icon.is-visible::before {
                content: "\f070";
            }

            .field-icon:hover,
            .field-icon:focus {
                background: #ffffff;
                color: var(--text-main);
                box-shadow: 0 10px 20px rgba(148, 163, 184, 0.22);
                outline: none;
            }

            .validation-error {
                color: #ffb1b1;
                font-size: 13px;
                margin-top: 8px;
                display: block;
                font-weight: 600;
                line-height: 1.5;
            }

            .validation-error:empty { display: none; }

            .validation-error::before {
                content: "!";
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 16px;
                height: 16px;
                margin-right: 8px;
                border-radius: 50%;
                background: rgba(255, 107, 107, 0.18);
                border: 1px solid rgba(255, 107, 107, 0.42);
                color: #ffc4c4;
                font-size: 11px;
                font-weight: 700;
            }
            .auth-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                margin-top: 8px;
                margin-bottom: 22px;
                flex-wrap: wrap;
            }

            .checkbox { position: relative; }
            .checkbox input[type="checkbox"] {
                position: absolute;
                opacity: 0;
                pointer-events: none;
            }

            .premium-checkbox-label {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                color: var(--text-soft);
                font-size: 14px;
                font-weight: 500;
                cursor: pointer;
                user-select: none;
            }

            .premium-checkbox-label::before {
                content: "";
                width: 22px;
                height: 22px;
                border-radius: 8px;
                border: 1px solid rgba(148, 163, 184, 0.28);
                background: rgba(255, 255, 255, 0.96);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.95);
            }

            .checkbox input[type="checkbox"]:checked + .premium-checkbox-label::before {
                background: linear-gradient(135deg, var(--primary-a), var(--primary-b));
                border-color: transparent;
                box-shadow: 0 10px 20px rgba(255, 122, 24, 0.25);
            }

            .checkbox input[type="checkbox"]:checked + .premium-checkbox-label::after {
                content: "";
                position: absolute;
                left: 8px;
                top: 6px;
                width: 7px;
                height: 11px;
                border: solid #fff;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }

            .premium-checkbox-label a,
            .signin-link a {
                color: #db2777;
                text-decoration: none;
                font-weight: 600;
            }

            .premium-checkbox-label a:hover,
            .signin-link a:hover {
                color: #0f172a;
                text-decoration: none;
            }

            .btn-signup {
                min-width: 138px;
                height: 58px;
                border: 0;
                border-radius: 999px;
                background: linear-gradient(135deg, var(--primary-a), var(--primary-b));
                color: #fff;
                font-size: 15px;
                font-weight: 700;
                letter-spacing: 0.02em;
                box-shadow: 0 18px 36px rgba(255, 92, 141, 0.28);
                padding: 0 28px;
            }

            .btn-signup:hover,
            .btn-signup:focus {
                transform: translateY(-2px) scale(1.01);
                box-shadow: 0 22px 44px rgba(255, 92, 141, 0.34);
                color: #fff;
            }

            .signin-link {
                margin-top: 18px;
                text-align: center;
                color: var(--text-soft);
                font-size: 14px;
            }

            .alert {
                margin-top: 16px;
                border-radius: 16px;
                border: 1px solid rgba(148, 163, 184, 0.18);
                padding: 14px 16px;
                box-shadow: 0 12px 30px rgba(148, 163, 184, 0.14);
            }

            .alert-success {
                background: rgba(34, 197, 94, 0.14);
                color: #d1fae5;
                border-color: rgba(34, 197, 94, 0.24);
            }

            .alert-warning {
                background: rgba(255, 107, 107, 0.14);
                color: #ffe0e0;
                border-color: rgba(255, 107, 107, 0.24);
            }

            .alert .close {
                color: inherit;
                opacity: 0.8;
            }

            .illustration-panel {
                padding: 46px;
                display: flex;
                align-items: center;
                justify-content: center;
                background:
                    radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.9), transparent 24%),
                    linear-gradient(160deg, rgba(255, 255, 255, 0.78) 0%, rgba(239, 246, 255, 0.74) 100%);
            }

            .illustration-panel::before,
            .illustration-panel::after {
                content: "";
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
            }

            .illustration-panel::before {
                width: 260px;
                height: 260px;
                top: 36px;
                right: 36px;
                background: radial-gradient(circle, rgba(255, 122, 24, 0.18), transparent 68%);
                filter: blur(12px);
            }

            .illustration-panel::after {
                width: 200px;
                height: 200px;
                left: 40px;
                bottom: 50px;
                background: radial-gradient(circle, rgba(96, 165, 250, 0.18), transparent 72%);
                filter: blur(6px);
            }

            .illustration-inner {
                position: relative;
                width: 100%;
                max-width: 540px;
                min-height: 610px;
                border-radius: 32px;
                padding: 34px;
                overflow: hidden;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(248, 250, 252, 0.76));
                border: 1px solid rgba(255, 255, 255, 0.9);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 1);
            }

            .illustration-badge,
            .stat-pill {
                position: absolute;
                z-index: 2;
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 12px 16px;
                border-radius: 18px;
                background: rgba(255, 255, 255, 0.78);
                border: 1px solid rgba(148, 163, 184, 0.18);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                box-shadow: 0 16px 32px rgba(148, 163, 184, 0.16);
                color: var(--text-main);
            }

            .illustration-badge {
                top: 8px;
                right: 16px;
                animation: floatCard 6s ease-in-out infinite;
            }

            .stat-pill {
                left: 16px;
                bottom: 10px;
                animation: floatCard 7s ease-in-out infinite -2s;
            }

            .badge-icon,
            .pill-icon {
                width: 38px;
                height: 38px;
                border-radius: 12px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, rgba(255, 122, 24, 0.9), rgba(255, 77, 141, 0.88));
                box-shadow: 0 12px 24px rgba(255, 92, 141, 0.24);
            }

            .illustration-copy {
                position: relative;
                z-index: 2;
                max-width: 380px;
                margin-bottom: 26px;
            }

            .illustration-copy h3 {
                margin: 0 0 12px;
                font-size: 38px;
                line-height: 1.1;
                font-weight: 800;
                letter-spacing: -0.04em;
                color: var(--text-main);
            }

            .illustration-copy p {
                margin: 0;
                color: rgba(51, 65, 85, 0.78);
                font-size: 15px;
                line-height: 1.8;
            }

            .illustration-graphic {
                position: relative;
                z-index: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 380px;
                margin-top: 20px;
            }

            .graphic-ring {
                position: absolute;
                border-radius: 50%;
                border: 1px solid rgba(148, 163, 184, 0.22);
                animation: pulseRing 8s linear infinite;
            }

            .graphic-ring.ring-one { width: 360px; height: 360px; }
            .graphic-ring.ring-two { width: 280px; height: 280px; animation-direction: reverse; }
            .graphic-ring.ring-three { width: 210px; height: 210px; }

            .graphic-orbit {
                position: absolute;
                width: 100%;
                height: 100%;
                animation: orbit 12s linear infinite;
            }

            .graphic-orbit::before,
            .graphic-orbit::after {
                content: "";
                position: absolute;
                border-radius: 50%;
                background: linear-gradient(135deg, rgba(255, 122, 24, 1), rgba(255, 77, 141, 0.88));
                box-shadow: 0 12px 22px rgba(255, 92, 141, 0.28);
            }

            .graphic-orbit::before {
                width: 18px;
                height: 18px;
                top: 36px;
                left: 56px;
            }

            .graphic-orbit::after {
                width: 12px;
                height: 12px;
                right: 58px;
                bottom: 48px;
            }

            .device-shell {
                position: relative;
                width: min(100%, 370px);
                padding: 18px;
                border-radius: 28px;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.94), rgba(241, 245, 249, 0.92));
                border: 1px solid rgba(148, 163, 184, 0.18);
                box-shadow: 0 24px 44px rgba(148, 163, 184, 0.18);
                animation: floatCard 7s ease-in-out infinite -1s;
            }

            .device-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 18px;
            }

            .device-brand {
                font-size: 13px;
                font-weight: 700;
                color: rgba(15, 23, 42, 0.74);
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .device-dots { display: flex; gap: 7px; }
            .device-dots span {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: rgba(148, 163, 184, 0.45);
            }
            .device-metrics {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
                margin-bottom: 14px;
            }

            .metric-card {
                padding: 16px;
                border-radius: 20px;
                background: rgba(255, 255, 255, 0.84);
                border: 1px solid rgba(148, 163, 184, 0.14);
            }

            .metric-card strong {
                display: block;
                font-size: 22px;
                line-height: 1;
                margin-bottom: 8px;
                color: var(--text-main);
            }

            .metric-card span {
                color: rgba(100, 116, 139, 0.82);
                font-size: 12px;
                line-height: 1.5;
            }

            .device-chart {
                margin-top: 18px;
                padding: 18px;
                border-radius: 22px;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.94), rgba(248, 250, 252, 0.92));
                border: 1px solid rgba(148, 163, 184, 0.14);
            }

            .chart-labels {
                display: flex;
                justify-content: space-between;
                color: rgba(100, 116, 139, 0.76);
                font-size: 11px;
                margin-top: 14px;
            }

            .chart-bars {
                height: 126px;
                display: grid;
                grid-template-columns: repeat(6, minmax(0, 1fr));
                align-items: end;
                gap: 10px;
            }

            .chart-bars span {
                display: block;
                border-radius: 14px 14px 8px 8px;
                background: linear-gradient(180deg, rgba(255, 122, 24, 0.95), rgba(255, 77, 141, 0.8));
                box-shadow: 0 12px 26px rgba(255, 92, 141, 0.18);
                animation: barPulse 2.8s ease-in-out infinite;
            }

            .chart-bars span:nth-child(1) { height: 42%; animation-delay: -0.2s; }
            .chart-bars span:nth-child(2) { height: 68%; animation-delay: -0.8s; }
            .chart-bars span:nth-child(3) { height: 56%; animation-delay: -1.1s; }
            .chart-bars span:nth-child(4) { height: 82%; animation-delay: -0.4s; }
            .chart-bars span:nth-child(5) { height: 60%; animation-delay: -1.4s; }
            .chart-bars span:nth-child(6) { height: 92%; animation-delay: -0.7s; }

            .seller-auth-footer {
                animation-delay: 0.15s;
                text-align: center;
                color: rgba(51, 65, 85, 0.72);
                font-size: 13px;
                line-height: 1.8;
                padding: 0 8px;
            }

            .seller-auth-footer a {
                color: var(--text-main);
                text-decoration: none;
                font-weight: 600;
            }

            .seller-auth-footer a:hover { color: #db2777; }

            @keyframes fadeSlideUp {
                from { opacity: 0; transform: translateY(24px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @keyframes floatGlow {
                0%, 100% { transform: translate3d(0, 0, 0) scale(1); }
                50% { transform: translate3d(14px, 10px, 0) scale(1.08); }
            }

            @keyframes floatCard {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }

            @keyframes pulseRing {
                0% { transform: scale(0.96); opacity: 0.5; }
                50% { transform: scale(1.04); opacity: 1; }
                100% { transform: scale(0.96); opacity: 0.5; }
            }

            @keyframes orbit {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            @keyframes tickPop {
                from { opacity: 0; transform: translateY(-50%) scale(0.7); }
                to { opacity: 1; transform: translateY(-50%) scale(1); }
            }

            @keyframes barPulse {
                0%, 100% { transform: scaleY(0.95); opacity: 0.82; }
                50% { transform: scaleY(1.03); opacity: 1; }
            }

            @media (max-width: 1199px) {
                .auth-form-panel,
                .illustration-panel { min-height: 700px; }
                .auth-form-panel,
                .illustration-panel { padding: 34px; }
                .illustration-copy h3 { font-size: 34px; }
            }

            @media (max-width: 991px) {
                .seller-auth-shell { padding: 18px; }
                .seller-auth-grid { grid-template-columns: 1fr; }
                .auth-form-panel,
                .illustration-panel { min-height: auto; }
                .auth-form-panel { order: 1; padding: 28px; }
                .illustration-panel { order: 2; padding: 28px; }
                .auth-card { max-width: 100%; }
                .seller-auth-brand { justify-content: center; text-align: center; }
                .seller-auth-brand span { display: none; }
            }

            @media (max-width: 767px) {
                .seller-auth-shell { padding: 14px; }
                .auth-form-panel { padding: 18px; }
                .auth-card { padding: 26px 20px; border-radius: 24px; }
                .auth-title { font-size: 28px; }
                .auth-subtitle { margin-bottom: 24px; font-size: 14px; }
                .premium-input { height: 58px; padding-right: 48px; }
                .floating-label { left: 50px; }
                .illustration-panel { display: none; }
                .seller-auth-grid { border-radius: 26px; }
                .auth-row { align-items: flex-start; }
                .btn-signup { width: 100%; }
            }
        </style>
    </head>
    <body>
        <div class="seller-auth-shell">
            <div class="seller-auth-frame">
                <div class="seller-auth-brand">
                    <!-- <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="TaskRabbit"> -->
                    <!-- <span>Premium Provider Onboarding</span> -->
                </div>

                <div class="seller-auth-grid">
                    <div class="auth-form-panel">
                        <div class="auth-card">
                            <span class="eyebrow">Launch Your Seller Workspace</span>
                            <h1 class="auth-title">Service Provider Sign In</h1>
                            <p class="auth-subtitle">Create your provider account, set up your business details, and unlock a polished dashboard experience built for modern service teams.</p>

                            <form method="post" action="" name="signup" id="sellerSignupForm" novalidate>
                                <div class="form-group">
                                    <label class="form-label" for="resname">Restaurant Name</label>
                                    <div class="premium-field-wrap">
                                        <span class="field-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M4.75 19.25h14.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                                <path d="M6.5 19.25V8.75a1.75 1.75 0 0 1 1.75-1.75h7.5A1.75 1.75 0 0 1 17.5 8.75v10.5" stroke="currentColor" stroke-width="1.7"/>
                                                <path d="M9 10.5h6M9 13.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                            </svg>
                                        </span>
                                        <input
                                            type="text"
                                            autofocus
                                            name="resname"
                                            id="resname"
                                            placeholder="Restaurant Name"
                                            class="form-control premium-input <?php if (form_error('resname')) { echo 'my_error input-invalid'; } ?>"
                                            value="<?php if (!isset($success) && set_value("resname")) { echo set_value("resname"); } ?>"
                                        >
                                        <span class="floating-label">Restaurant Name</span>
                                        <span id="tick_resname" class="field-valid-icon">&#10003;</span>
                                    </div>
                                    <?php if (form_error("resname")) { ?>
                                        <small id="error_resname" class="validation-error"><?php echo form_error("resname"); ?></small>
                                    <?php } else { ?>
                                        <small id="error_resname" class="validation-error"></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="mobile">Mobile No</label>
                                    <div class="premium-field-wrap">
                                        <span class="field-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <rect x="7.25" y="3.75" width="9.5" height="16.5" rx="2.25" stroke="currentColor" stroke-width="1.7"/>
                                                <path d="M10 6.75h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                                <circle cx="12" cy="17.25" r=".85" fill="currentColor"/>
                                            </svg>
                                        </span>
                                        <input
                                            type="text"
                                            name="mobile"
                                            id="mobile"
                                            placeholder="Mobile No."
                                            maxlength="10"
                                            class="form-control premium-input <?php if (form_error('mobile')) { echo 'my_error input-invalid'; } ?>"
                                            value="<?php if (!isset($success) && set_value("mobile")) { echo set_value("mobile"); } ?>"
                                        >
                                        <span class="floating-label">Mobile No</span>
                                        <span id="tick_mobile" class="field-valid-icon">&#10003;</span>
                                    </div>
                                    <?php if (form_error("mobile")) { ?>
                                        <small id="error_mobile" class="validation-error"><?php echo form_error("mobile"); ?></small>
                                    <?php } else { ?>
                                        <small id="error_mobile" class="validation-error"></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">Email Address</label>
                                    <div class="premium-field-wrap">
                                        <span class="field-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M4 7.75C4 6.784 4.784 6 5.75 6h12.5C19.216 6 20 6.784 20 7.75v8.5A1.75 1.75 0 0 1 18.25 18H5.75A1.75 1.75 0 0 1 4 16.25v-8.5Z" stroke="currentColor" stroke-width="1.7"/>
                                                <path d="m5 8 6.227 4.358a1.35 1.35 0 0 0 1.546 0L19 8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <input
                                            type="email"
                                            autocomplete="off"
                                            id="email"
                                            name="email"
                                            placeholder="Email"
                                            class="form-control premium-input <?php if (form_error('email')) { echo 'my_error input-invalid'; } ?>"
                                            value="<?php if (!isset($success) && set_value("email")) { echo set_value("email"); } ?>"
                                        >
                                        <span class="floating-label">Email Address</span>
                                        <span id="tick_email" class="field-valid-icon">&#10003;</span>
                                    </div>
                                    <?php if (form_error("email")) { ?>
                                        <small id="error_email" class="validation-error"><?php echo form_error("email"); ?></small>
                                    <?php } else { ?>
                                        <small id="error_email" class="validation-error"></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="ps">Password</label>
                                    <div class="premium-field-wrap">
                                        <span class="field-leading-icon">
                                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M7.75 10V8.75a4.25 4.25 0 1 1 8.5 0V10" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                                <rect x="4.75" y="10" width="14.5" height="9.25" rx="2.25" stroke="currentColor" stroke-width="1.7"/>
                                                <path d="M12 13.5v2.25" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                            </svg>
                                        </span>
                                        <input
                                            type="password"
                                            autocomplete="off"
                                            id="ps"
                                            name="ps"
                                            placeholder="Password"
                                            class="form-control premium-input <?php if (form_error('ps')) { echo 'my_error input-invalid'; } ?>"
                                            value="<?php if (!isset($success) && set_value("ps")) { echo set_value("ps"); } ?>"
                                        >
                                        <span class="floating-label">Password</span>
                                        <span id="tick_ps" class="field-valid-icon">&#10003;</span>
                                        <button type="button" class="field-icon" onclick="togglePasswordField('ps', this)" aria-label="Toggle password visibility">toggle</button>
                                    </div>
                                    <?php if (form_error("ps")) { ?>
                                        <small id="error_ps" class="validation-error"><?php echo form_error("ps"); ?></small>
                                    <?php } else { ?>
                                        <small id="error_ps" class="validation-error"></small>
                                    <?php } ?>
                                </div>

                                <div class="auth-row">
                                    <div class="checkbox">
                                        <input id="checkbox" checked type="checkbox">
                                        <label for="checkbox" class="premium-checkbox-label">I have read the <a href="<?php echo base_url("Terms-condition"); ?>" class="log-arg">agreement</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-signup" type="submit" name="signup" value="signup">Next</button>
                                </div>

                                <div class="signin-link">
                                    <a href="<?php echo base_url("Restaurant-Sign-In"); ?>">Already have an account? Log in</a>
                                </div>

                                <div class="col-lg-12" style="padding: 0;">
                                    <?php
                                    if (isset($success)) {
                                        ?>
                                        <div class="alert my_alert_success alert-success alert-dismissible fade in animated bounceInDown">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <i class="fa fa-info-circle"></i>
                                            <strong>Yeah, </strong> <small><?php echo $success; ?></small>
                                        </div>
                                        <?php
                                    }
                                    if (isset($error)) {
                                        ?>
                                        <div class="alert my_alert alert-warning alert-dismissible fade in animated bounceInUp">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <i class="fa fa-bell"></i>
                                            <strong>Oops! </strong> <small><?php echo $error; ?></small>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="illustration-panel">
                        <div class="illustration-inner">
                            <div class="illustration-badge">
                                <span class="badge-icon"><i class="fa fa-bolt"></i></span>
                                <span>Fast, frictionless onboarding</span>
                            </div>

                            <div class="illustration-copy">
                                <h3>Bring your service brand online with a polished premium workspace.</h3>
                                <p>Register your business, complete your setup, and step into a dashboard that feels every bit as professional as the service you deliver.</p>
                            </div>

                            <div class="illustration-graphic">
                                <div class="graphic-ring ring-one"></div>
                                <div class="graphic-ring ring-two"></div>
                                <div class="graphic-ring ring-three"></div>
                                <div class="graphic-orbit"></div>
                                <div class="device-shell">
                                    <div class="device-header">
                                        <span class="device-brand">Provider Setup</span>
                                        <div class="device-dots"><span></span><span></span><span></span></div>
                                    </div>
                                    <div class="device-metrics">
                                        <div class="metric-card"><strong>4 Steps</strong><span>Guided onboarding flow</span></div>
                                        <div class="metric-card"><strong>24/7</strong><span>Access to your seller portal</span></div>
                                    </div>
                                    <div class="device-chart">
                                        <div class="chart-bars"><span></span><span></span><span></span><span></span><span></span><span></span></div>
                                        <div class="chart-labels"><span>Setup</span><span>Profile</span><span>Menu</span><span>Orders</span><span>Growth</span><span>Scale</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="stat-pill">
                                <span class="pill-icon"><i class="fa fa-shield-alt"></i></span>
                                <span>Secure sign-up designed for fast provider activation</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="seller-auth-footer">
                    <span>All Rights &copy; <?php echo date('Y'); ?> Reserved, Design &amp; Developed by <a href="#">TaskRabbit</a>. <a href="<?php echo base_url("Privacy-policy"); ?>">Privacy Policy</a> | <a href="<?php echo base_url("Terms-condition"); ?>">Terms &amp; Condition</a></span>
                </div>
            </div>
        </div>

        <?php
        $this->load->view("seller/footerscript");
        ?>

        <script>
            function togglePasswordField(inputId, btn) {
                var input = document.getElementById(inputId);
                if (!input) return;

                if (input.type === "password") {
                    input.type = "text";
                    btn.innerHTML = "hide";
                    btn.classList.add("is-visible");
                } else {
                    input.type = "password";
                    btn.innerHTML = "show";
                    btn.classList.remove("is-visible");
                }
            }

            document.addEventListener("DOMContentLoaded", function () {
                var form = document.getElementById("sellerSignupForm");
                var resname = document.getElementById("resname");
                var mobile = document.getElementById("mobile");
                var email = document.getElementById("email");
                var password = document.getElementById("ps");

                function syncFieldState(input) {
                    if (!input || !input.parentElement) {
                        return;
                    }

                    var wrap = input.parentElement;
                    wrap.classList.toggle("is-filled", input.value.trim() !== "");

                    input.addEventListener("focus", function () {
                        wrap.classList.add("is-active");
                    });

                    input.addEventListener("blur", function () {
                        wrap.classList.remove("is-active");
                        wrap.classList.toggle("is-filled", input.value.trim() !== "");
                    });

                    input.addEventListener("input", function () {
                        wrap.classList.toggle("is-filled", input.value.trim() !== "");
                    });
                }

                syncFieldState(resname);
                syncFieldState(mobile);
                syncFieldState(email);
                syncFieldState(password);

                if (resname) {
                    resname.addEventListener("input", function () {
                        validateName("resname");
                    });
                    resname.addEventListener("blur", function () {
                        validateName("resname");
                    });
                }

                if (mobile) {
                    mobile.addEventListener("input", function () {
                        validatePhone("mobile");
                    });
                    mobile.addEventListener("blur", function () {
                        validatePhone("mobile");
                    });
                }

                if (email) {
                    email.addEventListener("input", function () {
                        validateEmail("email");
                    });
                    email.addEventListener("blur", function () {
                        validateEmail("email");
                    });
                }

                if (password) {
                    password.addEventListener("input", function () {
                        validatePassword("ps");
                    });
                    password.addEventListener("blur", function () {
                        validatePassword("ps");
                    });
                }

                if (form) {
                    form.addEventListener("submit", function (e) {
                        var isValid = true;

                        if (!validateName("resname")) isValid = false;
                        if (!validatePhone("mobile")) isValid = false;
                        if (!validateEmail("email")) isValid = false;
                        if (!validatePassword("ps")) isValid = false;

                        if (!isValid) {
                            e.preventDefault();
                        }
                    });
                }
            });
            function validateEmail(id) {

    var input = document.getElementById(id);
    var error = document.getElementById("error_" + id);

    if (!input) return true;

    var value = input.value.trim();

    input.value = value.toLowerCase();

    var regex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.(com|in|org|net|co\.in)$/;

    if (value === "") {

        error.innerHTML = "Please Enter Email.";

        input.classList.remove("input-valid");
        input.classList.add("input-invalid");

        return false;
    }

    if (!regex.test(value)) {

        error.innerHTML = "Enter valid email.";

        input.classList.remove("input-valid");
        input.classList.add("input-invalid");

        return false;
    }

    error.innerHTML = "";

    input.classList.remove("input-invalid");
    input.classList.add("input-valid");

    return true;
}
        </script>
    </body>
</html>
