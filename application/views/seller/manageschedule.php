<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Manage Shedule</title>
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
            .schedule-card .card-body {
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
            .schedule-note,
            .schedule-cell-copy,
            .breadcrumb-item {
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

            .schedule-card {
                position: relative;
                border-radius: 24px;
                border: 1px solid var(--dash-border);
                background: linear-gradient(180deg, rgba(30, 41, 59, 0.82) 0%, rgba(15, 23, 42, 0.94) 100%);
                box-shadow: 0 24px 52px rgba(2, 6, 23, 0.48), 0 0 30px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .schedule-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(180deg, rgba(255, 255, 255, 0.06), transparent 30%),
                    radial-gradient(circle at top right, rgba(255, 140, 66, 0.12), transparent 28%);
                pointer-events: none;
            }

            .schedule-card .card-body {
                padding: 30px;
            }

            .section-label {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 14px;
                padding: 7px 14px;
                border-radius: 999px;
                border: 1px solid rgba(255, 107, 0, 0.18);
                background: rgba(255, 107, 0, 0.12);
                color: #fdba74;
                font-size: 0.78rem;
                font-weight: 800;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .schedule-title {
                margin-bottom: 10px;
                color: #f8fafc;
                font-size: 1.8rem;
                font-weight: 800;
                letter-spacing: -0.03em;
            }

            .schedule-note {
                margin-bottom: 24px;
                max-width: 700px;
                font-size: 0.98rem;
                line-height: 1.7;
            }

            .alert {
                border-radius: 16px;
                padding: 15px 18px;
                margin-bottom: 18px;
                border: 1px solid transparent;
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
            }

            .alert-success {
                background: rgba(34, 197, 94, 0.12);
                border-color: rgba(34, 197, 94, 0.2);
                color: #bbf7d0;
                box-shadow: 0 14px 32px rgba(34, 197, 94, 0.08);
            }

            .schedule-table {
                padding: 6px;
                border-radius: 22px;
                background: rgba(15, 23, 42, 0.4);
                border: 1px solid rgba(255, 255, 255, 0.05);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
            }

            .schedule-head {
                margin: 0 0 10px;
                padding: 0 14px;
            }

            .schedule-head [class*="col-"] p {
                margin-bottom: 0;
                color: #fdba74;
                font-size: 0.78rem;
                font-weight: 800;
                letter-spacing: 0.09em;
                text-transform: uppercase;
            }

            .schedule-border-line {
                display: none;
            }

            .schedule-row {
                margin: 0 0 14px;
                padding: 4px;
                border-radius: 20px;
                transition: transform 0.35s ease, filter 0.35s ease;
            }

            .schedule-row:hover {
                transform: translateY(-4px);
                filter: brightness(1.03);
            }

            .schedule-row > [class*="col-"] {
                display: flex;
                align-items: center;
                min-height: 92px;
                padding: 20px 18px;
                background: rgba(30, 41, 59, 0.7);
                box-shadow: 0 20px 38px rgba(2, 6, 23, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.03);
                transition: background 0.35s ease, box-shadow 0.35s ease;
            }

            .schedule-row:hover > [class*="col-"] {
                background: rgba(30, 41, 59, 0.88);
                box-shadow: 0 24px 44px rgba(2, 6, 23, 0.42), 0 0 28px rgba(255, 107, 0, 0.12);
            }

            .schedule-row > [class*="col-"]:first-child {
                border-top-left-radius: 18px;
                border-bottom-left-radius: 18px;
            }

            .schedule-row > [class*="col-"]:last-child {
                border-top-right-radius: 18px;
                border-bottom-right-radius: 18px;
            }

            .schedule-day {
                display: flex;
                flex-direction: column;
                gap: 4px;
            }

            .schedule-day label {
                margin-bottom: 0;
                color: #f8fafc;
                font-size: 1rem;
                font-weight: 700;
            }

            .schedule-cell-copy {
                font-size: 0.88rem;
                line-height: 1.5;
            }

            .form-control {
                height: 50px;
                border-radius: 14px;
                border: 1px solid rgba(255, 255, 255, 0.09);
                background: #1e293b;
                color: #f8fafc;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03);
                transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            }

            .form-control:focus {
                background: #1e293b;
                color: #f8fafc;
                border-color: rgba(255, 107, 0, 0.7);
                box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.14), 0 0 22px rgba(255, 107, 0, 0.1);
                transform: translateY(-1px);
            }

            input[type="time"]::-webkit-calendar-picker-indicator {
                filter: invert(78%) sepia(91%) saturate(1297%) hue-rotate(345deg) brightness(101%) contrast(101%);
                cursor: pointer;
            }

            .badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 88px;
                padding: 10px 14px;
                border-radius: 999px;
                font-size: 0.8rem;
                font-weight: 800;
                letter-spacing: 0.04em;
                border: 1px solid transparent;
            }

            .badge-success {
                background: rgba(34, 197, 94, 0.14);
                border-color: rgba(34, 197, 94, 0.22);
                color: #bbf7d0;
                box-shadow: 0 12px 24px rgba(34, 197, 94, 0.12);
            }

            .badge-danger {
                background: rgba(244, 63, 94, 0.14);
                border-color: rgba(244, 63, 94, 0.22);
                color: #fecdd3;
                box-shadow: 0 12px 24px rgba(244, 63, 94, 0.12);
            }

            .btn-primary {
                border: 0;
                border-radius: 999px;
                padding: 13px 30px;
                font-weight: 700;
                letter-spacing: 0.01em;
                color: #fff;
                background: linear-gradient(135deg, #ff6b00, #ff8c42);
                box-shadow: 0 18px 30px rgba(255, 107, 0, 0.24);
                transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
            }

            .btn-primary:hover,
            .btn-primary:focus {
                background: linear-gradient(135deg, #ff6b00, #ff8c42);
                transform: translateY(-3px);
                box-shadow: 0 24px 40px rgba(255, 107, 0, 0.28), 0 0 22px rgba(255, 140, 66, 0.16);
                opacity: 0.98;
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

                .dashboard-hero,
                .schedule-card .card-body {
                    padding: 22px;
                }

                .hero-profile {
                    justify-content: flex-start;
                    margin-top: 24px;
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

                .schedule-card {
                    border-radius: 20px;
                }

                .schedule-card .card-body {
                    padding: 20px;
                }

                .schedule-title {
                    font-size: 1.45rem;
                }

                .schedule-head {
                    display: none;
                }

                .schedule-table {
                    padding: 0;
                    background: transparent;
                    border: 0;
                    box-shadow: none;
                }

                .schedule-row {
                    margin-bottom: 16px;
                    border-radius: 18px;
                    background: rgba(30, 41, 59, 0.72);
                    box-shadow: 0 18px 36px rgba(2, 6, 23, 0.34);
                }

                .schedule-row > [class*="col-"] {
                    min-height: auto;
                    justify-content: space-between;
                    gap: 16px;
                    border-radius: 0;
                    background: transparent;
                    box-shadow: none;
                }

                .schedule-row:hover > [class*="col-"] {
                    background: transparent;
                    box-shadow: none;
                }

                .schedule-row > [class*="col-"]::before {
                    content: attr(data-label);
                    flex: 0 0 42%;
                    color: #fdba74;
                    font-size: 0.76rem;
                    font-weight: 800;
                    text-transform: uppercase;
                    letter-spacing: 0.08em;
                }

                .schedule-day {
                    text-align: right;
                    align-items: flex-end;
                }

                .btn-primary {
                    width: 100%;
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
                animation: sellerScheduleFade 0.7s ease;
            }

            .dashboard-hero,
            .schedule-card {
                border-radius: 24px;
                background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            }

            .dashboard-hero::before,
            .schedule-card::before {
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.65), transparent 36%),
                    radial-gradient(circle at 100% 0%, rgba(255, 90, 60, 0.10), transparent 30%);
            }

            .hero-eyebrow,
            .section-label {
                background: rgba(255, 255, 255, 0.92);
                border-color: rgba(255, 90, 60, 0.14);
                color: #ff5a3c;
                box-shadow: 0 10px 24px rgba(255, 90, 60, 0.08);
            }

            .hero-title,
            .hero-meta-title,
            .schedule-title,
            .schedule-day label {
                color: #1f2937 !important;
            }

            .hero-description,
            .hero-meta,
            .hero-status small,
            .schedule-note,
            .schedule-cell-copy,
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

            .status-pill {
                background: linear-gradient(45deg, rgba(255, 77, 77, 0.10), rgba(255, 122, 92, 0.16));
                border-color: rgba(255, 90, 60, 0.14);
                color: #ff5a3c;
                box-shadow: none;
            }

            .schedule-table {
                background: #fffdfc;
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9);
            }

            .schedule-head [class*="col-"] p {
                color: #ff5a3c;
            }

            .schedule-row > [class*="col-"] {
                background: #ffffff;
                box-shadow: 0 16px 32px rgba(15, 23, 42, 0.06);
            }

            .schedule-row:hover > [class*="col-"] {
                background: #ffffff;
                box-shadow: 0 20px 38px rgba(15, 23, 42, 0.10);
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

            .badge-success {
                background: rgba(22, 163, 74, 0.10);
                border-color: rgba(22, 163, 74, 0.14);
                color: #166534;
            }

            .badge-danger {
                background: rgba(220, 38, 38, 0.10);
                border-color: rgba(220, 38, 38, 0.14);
                color: #b91c1c;
            }

            .btn-primary {
                border-radius: 10px;
                background: linear-gradient(45deg, #ff4d4d, #ff5a3c);
                box-shadow: 0 14px 28px rgba(255, 90, 60, 0.20);
            }

            .btn-primary:hover,
            .btn-primary:focus {
                box-shadow: 0 18px 32px rgba(255, 90, 60, 0.24);
            }

            @keyframes sellerScheduleFade {
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
                .schedule-card {
                    border-radius: 22px;
                }

                .schedule-row {
                    background: #ffffff;
                    box-shadow: 0 18px 36px rgba(15, 23, 42, 0.08);
                }

                .schedule-row > [class*="col-"]::before {
                    color: #ff5a3c;
                }
            }
        </style>
        <style>
            .hero-profile-card,
            .schedule-card,
            .schedule-row,
            .schedule-row > [class*="col-"],
            .btn-primary,
            .form-control {
                transition: all 0.3s ease;
            }

            .hero-profile-card:hover,
            .schedule-card:hover {
                transform: translateY(-4px);
                background: #ffffff;
                border-color: #f1f1f1;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .schedule-row:hover {
                transform: translateY(-2px);
                filter: none !important;
            }

            .schedule-row:hover > [class*="col-"] {
                background: #f9fafb !important;
                color: #222 !important;
                box-shadow: none;
            }

            .schedule-row:hover label,
            .schedule-row:hover .schedule-cell-copy {
                color: #222 !important;
                opacity: 1 !important;
            }

            .btn-primary:hover,
            .btn-primary:focus {
                background: linear-gradient(45deg, #ff5c5c, #ff6a4e);
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
                                            <i class="fas fa-clock"></i>
                                            Schedule Control
                                        </span>
                                        <h1 class="hero-title">Manage Schedule</h1>
                                        <p class="hero-description">Configure your weekly service hours from the same premium workspace design used throughout the dashboard.</p>
                                        <div class="header-sub-title m-t-20">
                                            <nav class="breadcrumb breadcrumb-dash">
                                                <a href="<?php echo base_url("Restaurant-Home"); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                                <a class="breadcrumb-item" href="#">Manage Schedule</a>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="hero-profile">
                                            <div class="hero-profile-card">
                                                <h4 class="hero-meta-title">Weekly Availability</h4>
                                                <p class="hero-meta">Set opening and closing hours for every day so customers always see your latest availability.</p>
                                                <div class="hero-status">
                                                    <span class="status-pill">
                                                        <i class="fas fa-circle"></i>
                                                        Live Schedule
                                                    </span>
                                                    <small>Review and update anytime</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card schedule-card">
                                    <div class="card-body">
                                        <span class="section-label">
                                            <i class="fas fa-calendar-alt"></i>
                                            Service Hours
                                        </span>
                                        <h4 class="schedule-title">Service Schedule</h4>
                                        <p class="schedule-note">Keep your daily operating hours clear and polished with a premium schedule layout that matches the rest of your dashboard.</p>

                                            <?php if($this->session->flashdata("success")) { ?>
                                                <div class="alert alert-success">
                                                    <?php echo $this->session->flashdata("success"); ?>
                                                </div>
                                            <?php } ?>

                                            <form method="post" action="">
                                                <div class="schedule-table">
                                                    <div class="schedule-details schedule-head">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <p><strong>Day Name</strong></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><strong>Open Time</strong></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><strong>Close Time</strong></p>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p><strong>Status</strong></p>
                                                        </div>
                                                        <div class="col-md-12 schedule-border-line m-b-10"></div>
                                                    </div>
                                                </div>

                                                <?php foreach($days as $day) { 
                                                    $open_time = isset($schedule[$day]) ? $schedule[$day]['open_time'] : "";
                                                    $close_time = isset($schedule[$day]) ? $schedule[$day]['close_time'] : "";
                                                ?>
                                                <div class="row schedule-details-subcard schedule-row">
                                                        <div class="col-md-4" data-label="Day Name">
                                                            <div class="schedule-day">
                                                                <label><?php echo $day; ?></label>
                                                                <span class="schedule-cell-copy">Daily service availability window</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3" data-label="Open Time">
                                                            <input 
                                                                type="time" 
                                                                name="open_time_<?php echo $day; ?>" 
                                                                class="form-control"
                                                                value="<?php echo $open_time; ?>"
                                                            >
                                                        </div>

                                                        <div class="col-md-3" data-label="Close Time">
                                                            <input 
                                                                type="time" 
                                                                name="close_time_<?php echo $day; ?>" 
                                                                class="form-control"
                                                                value="<?php echo $close_time; ?>"
                                                            >
                                                        </div>

                                                        <div class="col-md-2" data-label="Status">
                                                            <?php if(!empty($open_time) && !empty($close_time)) { ?>
                                                                <span class="badge badge-success">Set</span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-danger">Not Set</span>
                                                            <?php } ?>
                                                        </div>
                                                </div>
                                                <?php } ?>

                                                    <div class="col-md-12 mt-3">
                                                        <button type="submit" name="save_schedule" value="1" class="btn btn-primary">
                                                            Save Schedule
                                                        </button>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
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

                <!-- Search Start-->
                <div class="modal modal-left fade search" id="search-drawer">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Search</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-search"></i>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Files</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-cyan avatar-icon">
                                            <i class="anticon anticon-file-excel"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                            <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-blue avatar-icon">
                                            <i class="anticon anticon-file-word"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                            <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-purple avatar-icon">
                                            <i class="anticon anticon-file-text"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                            <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-red avatar-icon">
                                            <i class="anticon anticon-file-pdf"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                            <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Members</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                            <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                        </div>
                                    </div>
                                </div>   
                                <div class="m-t-30">
                                    <h5 class="m-b-20">News</h5> 
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/others/img-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                            <p class="m-b-0 text-muted font-size-13">
                                                <i class="anticon anticon-clock-circle"></i>
                                                <span class="m-l-5">25 Nov 2018</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search End-->

                <!-- Quick View START -->
                <div class="modal modal-right fade quick-view" id="quick-view">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Theme Config</h5>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="m-b-30">
                                    <h5 class="m-b-0">Header Color</h5>
                                    <p>Config header background color</p>
                                    <div class="theme-configurator d-flex m-t-10">
                                        <div class="radio">
                                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                                            <label for="header-default"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                                            <label for="header-primary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-success" name="header-theme" type="radio" value="success">
                                            <label for="header-success"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                            <label for="header-secondary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                                            <label for="header-danger"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Side Nav Dark</h5>
                                    <p>Change Side Nav to dark</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                        <label for="side-nav-theme-toogle"></label>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Folded Menu</h5>
                                    <p>Toggle Folded Menu</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                        <label for="side-nav-fold-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <!-- Quick View END -->
            </div>
        </div>

        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <img src="<?php echo base_url(); ?>admin_assets/images/deactiveres.jpg" height="120" width="60" >
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to deactive ?</p>
                        <p style="margin-top: 1%;font-size: 14px;margin-bottom: 4%;padding: 0px 40px;">If you deactive restaurant than you can't able to upload images and other information of restaurant.</p>
                        <a id="activeproduct" href="#"   class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btncancel" data-dismiss="modal" style="padding:10px 40px;" >NO</a>
                    </center>
                </div>
            </div>
        </div>

        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js" type="text/javascript"></script>
    </body>
   
</html>
