                                                                                                        <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Editprofile</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <style>
            :root {
                --dash-bg: #0f172a;
                --dash-surface: rgba(30, 41, 59, 0.72);
                --dash-surface-strong: rgba(30, 41, 59, 0.92);
                --dash-border: rgba(255, 255, 255, 0.08);
                --dash-border-strong: rgba(255, 107, 0, 0.28);
                --dash-text: #f8fafc;
                --dash-muted: #94a3b8;
                --dash-primary: #ff6b00;
                --dash-secondary: #ff8c42;
            }

            body {
                background:
                    radial-gradient(circle at top left, rgba(59, 130, 246, 0.16), transparent 24%),
                    radial-gradient(circle at top right, rgba(255, 107, 0, 0.18), transparent 22%),
                    radial-gradient(circle at 85% 18%, rgba(255, 140, 66, 0.14), transparent 14%),
                    linear-gradient(180deg, #020617 0%, #0f172a 52%, #111827 100%);
                color: var(--dash-text);
                position: relative;
            }

            body::before {
                content: "";
                position: fixed;
                inset: 0;
                pointer-events: none;
                opacity: 0.06;
                background-image:
                    radial-gradient(rgba(248, 250, 252, 0.16) 0.6px, transparent 0.6px),
                    radial-gradient(rgba(255, 107, 0, 0.14) 0.6px, transparent 0.6px);
                background-position: 0 0, 12px 12px;
                background-size: 24px 24px;
            }

            .page-container,
            .main-content {
                background: transparent;
            }

            .main-content {
                padding: 28px;
                position: relative;
                overflow: hidden;
            }

            .main-content::before,
            .main-content::after {
                content: "";
                position: absolute;
                border-radius: 999px;
                pointer-events: none;
                filter: blur(12px);
            }

            .main-content::before {
                top: -100px;
                right: -90px;
                width: 260px;
                height: 260px;
                background: rgba(255, 107, 0, 0.2);
            }

            .main-content::after {
                bottom: 30px;
                left: -70px;
                width: 220px;
                height: 220px;
                background: rgba(59, 130, 246, 0.14);
            }

            .dashboard-shell {
                position: relative;
                z-index: 1;
                animation: dashboardFade 0.9s cubic-bezier(0.22, 1, 0.36, 1);
            }

            .dashboard-hero {
                position: relative;
                padding: 30px;
                margin-bottom: 28px;
                border-radius: 28px;
                border: 1px solid rgba(255, 255, 255, 0.08);
                background: linear-gradient(135deg, rgba(30, 41, 59, 0.82), rgba(15, 23, 42, 0.94) 42%, rgba(30, 41, 59, 0.92) 100%);
                box-shadow: 0 28px 70px rgba(2, 6, 23, 0.52), 0 0 40px rgba(255, 107, 0, 0.08);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .dashboard-hero::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.08), transparent 35%),
                    radial-gradient(circle at 100% 0%, rgba(255, 140, 66, 0.14), transparent 30%);
                pointer-events: none;
            }

            .dashboard-hero::after {
                content: "";
                position: absolute;
                inset: 1px;
                border-radius: inherit;
                border: 1px solid rgba(255, 255, 255, 0.06);
                pointer-events: none;
            }

            .dashboard-hero > .row,
            .password-card .card-body {
                position: relative;
                z-index: 1;
            }

            .hero-eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 15px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.12);
                border: 1px solid rgba(255, 107, 0, 0.18);
                color: #fed7aa;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 16px;
            }

            .hero-title {
                margin-bottom: 10px;
                font-size: 2.15rem;
                font-weight: 800;
                line-height: 1.05;
                color: var(--dash-text);
                letter-spacing: -0.03em;
            }

            .hero-description,
            .hero-meta,
            .breadcrumb-item,
            .password-note {
                color: var(--dash-muted) !important;
            }

            .hero-description {
                max-width: 640px;
                margin-bottom: 0;
                line-height: 1.7;
            }

            .hero-profile {
                display: flex;
                justify-content: flex-end;
            }

            .hero-profile-card {
                width: 100%;
                max-width: 340px;
                padding: 22px;
                border-radius: 24px;
                background: rgba(15, 23, 42, 0.58);
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.06), 0 24px 44px rgba(2, 6, 23, 0.42), 0 0 24px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
            }

            .hero-profile-card:hover {
                transform: translateY(-6px) scale(1.015);
                border-color: rgba(255, 107, 0, 0.24);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08), 0 30px 50px rgba(2, 6, 23, 0.5), 0 0 28px rgba(255, 107, 0, 0.1);
            }

            .hero-meta-title {
                margin-bottom: 10px;
                color: #f8fafc;
                font-size: 1.05rem;
                font-weight: 800;
            }

            .hero-status {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding-top: 14px;
                margin-top: 16px;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
            }

            .status-pill {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 14px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.14);
                color: #fed7aa;
                font-size: 0.85rem;
                font-weight: 700;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
            }

            .status-pill i {
                color: var(--dash-primary);
                font-size: 0.7rem;
                animation: pulseDot 1.8s ease-in-out infinite;
            }

            .hero-status small {
                color: #cbd5e1;
                font-size: 0.9rem;
            }

            .breadcrumb {
                background: transparent;
                margin-bottom: 0;
                padding: 0;
            }

            .breadcrumb-item + .breadcrumb-item::before {
                color: rgba(148, 163, 184, 0.5);
            }

            .password-card {
                position: relative;
                border-radius: 24px;
                border: 1px solid var(--dash-border);
                background: linear-gradient(180deg, rgba(30, 41, 59, 0.82) 0%, rgba(15, 23, 42, 0.94) 100%);
                box-shadow: 0 24px 52px rgba(2, 6, 23, 0.48), 0 0 30px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .password-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(180deg, rgba(255, 255, 255, 0.06), transparent 30%),
                    radial-gradient(circle at top right, rgba(255, 140, 66, 0.12), transparent 28%);
                pointer-events: none;
            }

            .password-card .card-header,
            .password-card .card-body {
                position: relative;
                z-index: 1;
            }

            .password-card .card-header {
                padding: 24px 26px 0;
                border-bottom: 0;
                background: transparent;
            }

            .password-card .card-body {
                padding: 24px 26px 26px;
            }

            .password-card .card-title {
                margin-bottom: 0;
                color: #f8fafc;
                font-size: 1.2rem;
                font-weight: 800;
                letter-spacing: -0.02em;
            }

            .password-note {
                margin-bottom: 22px;
                font-size: 0.98rem;
                line-height: 1.7;
            }

            label,
            .font-weight-semibold {
                color: #fdba74 !important;
                font-weight: 700 !important;
            }

            .form-row {
                margin-left: -10px;
                margin-right: -10px;
            }

            .form-row > [class*="col-"],
            .form-group {
                padding-left: 10px;
                padding-right: 10px;
            }

            .form-group {
                margin-bottom: 18px;
                position: relative;
            }

            .form-control {
                height: 52px;
                border-radius: 14px;
                border: 1px solid rgba(255, 255, 255, 0.09);
                background: #1e293b;
                color: #f8fafc;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03);
                transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            }

            .form-control::placeholder {
                color: #64748b;
            }

            .form-control:focus {
                background: #1e293b;
                color: #f8fafc;
                border-color: rgba(255, 107, 0, 0.7);
                box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.14), 0 0 22px rgba(255, 107, 0, 0.1);
                transform: translateY(-1px);
            }

            .password-field {
                position: relative;
            }

            .password-field .form-control {
                padding-right: 52px;
            }

            .toggle-password {
                position: absolute;
                top: 50%;
                right: 16px;
                transform: translateY(-50%);
                color: #94a3b8 !important;
                z-index: 2;
                transition: color 0.3s ease, transform 0.3s ease;
            }

            .toggle-password:hover {
                color: #fdba74 !important;
                transform: translateY(-50%) scale(1.05);
            }

            .btnadd,
            .btncancel {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 170px;
                border: 0;
                border-radius: 999px;
                padding: 13px 28px;
                font-weight: 700;
                letter-spacing: 0.01em;
                transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
            }

            .btnadd {
                color: #fff !important;
                background: linear-gradient(135deg, #ff6b00, #ff8c42);
                box-shadow: 0 18px 30px rgba(255, 107, 0, 0.24);
            }

            .btnadd:hover,
            .btnadd:focus {
                color: #fff !important;
                background: linear-gradient(135deg, #ff6b00, #ff8c42);
                transform: translateY(-3px);
                box-shadow: 0 24px 40px rgba(255, 107, 0, 0.28), 0 0 22px rgba(255, 140, 66, 0.16);
            }

            .btncancel {
                color: #e2e8f0 !important;
                background: rgba(30, 41, 59, 0.9);
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 16px 28px rgba(2, 6, 23, 0.24);
            }

            .btncancel:hover,
            .btncancel:focus {
                color: #fff !important;
                transform: translateY(-3px);
                box-shadow: 0 20px 34px rgba(2, 6, 23, 0.3), 0 0 20px rgba(148, 163, 184, 0.08);
            }

            .alert {
                border-radius: 16px;
                padding: 15px 18px;
                margin-bottom: 18px;
                border: 1px solid transparent;
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
            }

            .my_alert_success.alert-success {
                background: rgba(34, 197, 94, 0.12);
                border-color: rgba(34, 197, 94, 0.2);
                color: #bbf7d0;
                box-shadow: 0 14px 32px rgba(34, 197, 94, 0.08);
            }

            .my_alert.alert-warning {
                background: rgba(245, 158, 11, 0.12);
                border-color: rgba(245, 158, 11, 0.22);
                color: #fde68a;
                box-shadow: 0 14px 32px rgba(245, 158, 11, 0.08);
            }

            .search .modal-content,
            .quick-view .modal-content {
                background: #1e293b;
                color: var(--dash-text);
            }

            .search .text-dark,
            .quick-view .text-dark {
                color: var(--dash-text) !important;
            }

            @keyframes dashboardFade {
                from {
                    opacity: 0;
                    transform: translateY(22px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes pulseDot {
                0%,
                100% {
                    transform: scale(1);
                    opacity: 1;
                }
                50% {
                    transform: scale(1.45);
                    opacity: 0.55;
                }
            }

            @media (max-width: 991.98px) {
                .main-content {
                    padding: 20px;
                }

                .dashboard-hero {
                    padding: 22px;
                }

                .hero-profile {
                    justify-content: flex-start;
                    margin-top: 24px;
                }

                .password-card .card-header,
                .password-card .card-body {
                    padding-left: 22px;
                    padding-right: 22px;
                }
            }

            @media (max-width: 767.98px) {
                .main-content {
                    padding: 16px;
                }

                .dashboard-hero {
                    padding: 20px;
                    border-radius: 22px;
                }

                .hero-title {
                    font-size: 1.8rem;
                }

                .hero-profile-card {
                    max-width: 100%;
                }

                .container {
                    padding-left: 0;
                    padding-right: 0;
                }

                .password-card {
                    border-radius: 20px;
                }

                .password-card .card-header,
                .password-card .card-body {
                    padding-left: 20px;
                    padding-right: 20px;
                }

                .btnadd,
                .btncancel {
                    width: 100%;
                    margin-top: 10px;
                }
            }
        </style>
        <style>
            body {
                background:
                    radial-gradient(circle at top left, rgba(255, 90, 60, 0.09), transparent 24%),
                    radial-gradient(circle at top right, rgba(255, 122, 92, 0.10), transparent 22%),
                    linear-gradient(180deg, #fcfcfe 0%, #f6f7fb 58%, #eef2f7 100%);
                color: #1f2937;
                font-family: "Poppins", "Inter", "Segoe UI", sans-serif;
            }

            .main-content {
                padding: 32px;
            }

            .dashboard-shell {
                animation: sellerPasswordFade 0.7s ease;
            }

            .dashboard-hero,
            .password-card {
                border-radius: 24px;
                background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            }

            .dashboard-hero::before,
            .password-card::before {
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.65), transparent 36%),
                    radial-gradient(circle at 100% 0%, rgba(255, 90, 60, 0.10), transparent 30%);
            }

            .hero-eyebrow,
            .status-pill {
                background: rgba(255, 255, 255, 0.92);
                border-color: rgba(255, 90, 60, 0.14);
                color: #ff5a3c;
                box-shadow: 0 10px 24px rgba(255, 90, 60, 0.08);
            }

            .hero-title,
            .hero-meta-title,
            .password-card .card-title {
                color: #1f2937;
            }

            .hero-description,
            .hero-meta,
            .hero-status small,
            .password-note,
            .breadcrumb-item {
                color: #6b7280 !important;
            }

            .hero-profile-card {
                background: rgba(255, 255, 255, 0.84);
                border: 1px solid rgba(255, 90, 60, 0.10);
                box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
            }

            .hero-status {
                border-top-color: rgba(15, 23, 42, 0.08);
            }

            label,
            .font-weight-semibold {
                color: #ff5a3c !important;
            }

            .form-control {
                background: #ffffff;
                color: #1f2937;
                border: 1px solid rgba(15, 23, 42, 0.10);
                box-shadow: none;
            }

            .form-control:focus {
                background: #ffffff;
                color: #1f2937;
                border-color: rgba(255, 90, 60, 0.45);
                box-shadow: 0 0 0 4px rgba(255, 90, 60, 0.10);
            }

            .toggle-password {
                color: #6b7280 !important;
            }

            .toggle-password:hover {
                color: #ff5a3c !important;
            }

            .btnadd {
                border-radius: 10px;
                background: linear-gradient(45deg, #ff4d4d, #ff5a3c);
                box-shadow: 0 14px 28px rgba(255, 90, 60, 0.20);
            }

            .btncancel {
                border-radius: 10px;
                background: #ffffff;
                color: #475569 !important;
                border: 1px solid rgba(15, 23, 42, 0.10);
                box-shadow: 0 12px 24px rgba(15, 23, 42, 0.06);
            }

            .btnadd:hover,
            .btnadd:focus {
                box-shadow: 0 18px 32px rgba(255, 90, 60, 0.24);
            }

            .btncancel:hover,
            .btncancel:focus {
                color: #1f2937 !important;
                box-shadow: 0 16px 28px rgba(15, 23, 42, 0.08);
            }

            .my_alert_success.alert-success {
                background: #f0fdf4;
                border-color: rgba(22, 163, 74, 0.14);
                color: #166534;
            }

            .my_alert.alert-warning {
                background: #fff7ed;
                border-color: rgba(217, 119, 6, 0.14);
                color: #b45309;
            }

            @keyframes sellerPasswordFade {
                from {
                    opacity: 0;
                    transform: translateY(16px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 991.98px) {
                .main-content {
                    padding: 22px;
                }
            }

            @media (max-width: 767.98px) {
                .main-content {
                    padding: 16px;
                }

                .dashboard-hero,
                .password-card {
                    border-radius: 22px;
                }
            }
        </style>
        <style>
            .hero-profile-card,
            .password-card,
            .btnadd,
            .btncancel,
            .toggle-password,
            .form-control {
                transition: all 0.3s ease;
            }

            .hero-profile-card:hover,
            .password-card:hover {
                transform: translateY(-4px);
                background: #ffffff;
                border-color: #f1f1f1;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .toggle-password:hover {
                opacity: 1 !important;
                filter: none !important;
            }

            .btnadd:hover,
            .btnadd:focus {
                background: linear-gradient(45deg, #ff5c5c, #ff6a4e);
                opacity: 1 !important;
                filter: none !important;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .btncancel:hover,
            .btncancel:focus {
                background: #ffffff;
                color: #222 !important;
                opacity: 1 !important;
                filter: none !important;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }
        </style>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                <?php
                $this->load->view("seller/head");
                $this->load->view("seller/sidebar");
                ?>
                <!-- Page Container START -->
                <div class="page-container">


                    <!-- Content Wrapper START -->
                    <div class="main-content">
<div class="dashboard-shell">
<div class="dashboard-hero">
<div class="row align-items-center">
<div class="col-xl-7">
<span class="hero-eyebrow">
<i class="fas fa-lock"></i>
Security Settings
</span>
<h1 class="hero-title">Change Password</h1>
<p class="hero-description">Protect your seller workspace with a secure password update flow styled to match the same premium dark dashboard experience.</p>
<div class="header-sub-title m-t-20">
<nav class="breadcrumb breadcrumb-dash">
<a href="<?php echo base_url("Restaurant-Home"); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
<a class="breadcrumb-item" href="#">Setting</a>
<a class="breadcrumb-item" href="#">Change Password</a>
</nav>
</div>
</div>
<div class="col-xl-5">
<div class="hero-profile">
<div class="hero-profile-card">
<h4 class="hero-meta-title">Security Center</h4>
<p class="hero-meta">Refresh your login credentials anytime and keep your account access protected with an updated password.</p>
<div class="hero-status">
<span class="status-pill">
<i class="fas fa-circle"></i>
Account Protected
</span>
<small>Use a strong new password</small>
</div>
</div>
</div>
</div>
</div>
</div>
                        <div class="container">
                            <div class="tab-content m-t-15 row">
                                <div class="tab-pane fade show active col-md-6" >
                                    <div class="card password-card">
                                        <div class="card-header">
                                            <h4 class="card-title">Change Password</h4>
                                        </div>
                                        <div class="card-body">
                                            <p class="password-note">Update your current password with a new secure credential using the same premium seller workspace styling.</p>
                                            <form action="" method="post" autocomplete="off">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="font-weight-semibold" for="oldPassword">Old Password:</label>
                                                        <div class="password-field">
                                                        <input type="password" check_control="pwd" value="<?php
                                                        if (!isset($success) && set_value("cps")) {
                                                            echo set_value("cps");
                                                        }
                                                        ?>" name="cps" title="Only Alphabet OR Numbers Allow" autofocus="" class="input100 ps-eye1 form-control" placeholder="Enter Old Password"  style="position: relative;" >
                                                        <span class="focus-input100"></span>
                                                        <a href="#" id="ps-eye1" class="toggle-password" onclick="showpass('.ps-eye1', '.fa_eye1');"><i class="far fa-eye fa_eye1"></i></a></span>
                                                        </div>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="font-weight-semibold" for="newPassword">New Password:</label>
                                                        <div class="password-field">
                                                        <input type="password" check_control="pwd" <?php
                                                        if (form_error("nps")) {
                                                            echo "form_error";
                                                        }
                                                        ?> value="<?php
                                                               if (!isset($success) && set_value("nps")) {
                                                                   echo set_value("nps");
                                                               }
                                                               ?>" name="nps" title="Only Alphabet OR Numbers Allow" class="input100 ps-eye2 form-control" placeholder="Enter New Password"  style="position: relative;" >
                                                        <span class="focus-input100"></span>
                                                        <a href="#" id="ps-eye2" class="toggle-password" onclick="showpass('.ps-eye2', '.fa_eye2');"><i class="far fa-eye fa_eye2"></i></a></span>
                                                        </div>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                                                        <div class="password-field">
                                                        <input type="password" check_control="pwd" <?php
                                                        if (form_error("ncps")) {
                                                            echo "form_error";
                                                        }
                                                        ?> name="ncps" title="Only Alphabet OR Numbers Allow" class="input100 ps-eye3 form-control" placeholder="Enter Confirm Password"  style="position: relative;" >
                                                        <span class="focus-input100"></span>
                                                        <a href="#" id="ps-eye3" class="toggle-password" onclick="showpass('.ps-eye3', '.fa_eye3');"><i class="far fa-eye fa_eye3"></i></a></span>
                                                        </div>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button class="btn m-t-30 btnadd" name="add" value="add" type="submit">Change Password</button>
                                                        <button class="btn m-t-30 btncancel" type="reset">Cancel</button>
                                                    </div>
                                                    <div class="col-lg-12">
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
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Wrapper END -->

        <?php
        $this->load->view("seller/footer");
        ?>
    </div>
    <!-- Page Container END -->
    <?php
    $this->load->view("seller/footerscript");
    ?>
</body>
</html>
