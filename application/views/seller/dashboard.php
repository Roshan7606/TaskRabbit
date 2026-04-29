<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MUNCHBOX - Restaurant Dashboard </title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <link href="<?php echo base_url(); ?>seller_assets/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    
    <link href="<?php echo base_url(); ?>seller_assets/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css"/>
    <style>
        :root {
            --dash-bg: #f8fafc;
            --dash-bg-alt: #eef2f9;
            --dash-surface: rgba(255, 255, 255, 0.88);
            --dash-surface-strong: #ffffff;
            --dash-surface-tint: rgba(255, 244, 245, 0.82);
            --dash-border: rgba(148, 163, 184, 0.22);
            --dash-border-strong: rgba(255, 77, 79, 0.24);
            --dash-text: #0f172a;
            --dash-muted: #64748b;
            --dash-primary: #ff4d4f;
            --dash-secondary: #ff7a7c;
            --dash-primary-soft: #fff1f2;
            --dash-primary-soft-strong: #ffe4e6;
            --dash-shadow: 0 24px 60px rgba(15, 23, 42, 0.08), 0 6px 20px rgba(15, 23, 42, 0.04);
            --dash-shadow-soft: 0 16px 32px rgba(15, 23, 42, 0.06), 0 4px 10px rgba(15, 23, 42, 0.03);
            --dash-shadow-hover: 0 24px 44px rgba(15, 23, 42, 0.1), 0 12px 22px rgba(255, 77, 79, 0.08);
            --dash-radius: 18px;
            --dash-radius-lg: 24px;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(255, 77, 79, 0.08), transparent 24%),
                radial-gradient(circle at top right, rgba(251, 113, 133, 0.08), transparent 22%),
                linear-gradient(180deg, #fbfdff 0%, var(--dash-bg) 48%, var(--dash-bg-alt) 100%);
            color: var(--dash-text);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(circle at 12% 18%, rgba(255, 255, 255, 0.7), transparent 20%),
                radial-gradient(circle at 82% 6%, rgba(255, 77, 79, 0.05), transparent 18%);
            opacity: 0.9;
        }

        .page-container,
        .main-content {
            background: transparent;
        }

        .main-content {
            padding: 34px;
            position: relative;
            overflow: hidden;
        }

        .main-content::before,
        .main-content::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: 0.55;
        }

        .main-content::before {
            top: -120px;
            right: -80px;
            width: 280px;
            height: 280px;
            background: radial-gradient(circle, rgba(255, 77, 79, 0.12), transparent 68%);
        }

        .main-content::after {
            bottom: -120px;
            left: -70px;
            width: 240px;
            height: 240px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8), transparent 70%);
        }

        .dashboard-shell {
            position: relative;
            z-index: 1;
        }

        .dashboard-hero {
            position: relative;
            padding: 36px;
            margin-bottom: 30px;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.75);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 248, 249, 0.96) 52%, rgba(255, 241, 242, 0.9) 100%);
            box-shadow: var(--dash-shadow);
            overflow: hidden;
        }

        .dashboard-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.4), transparent 38%),
                radial-gradient(circle at 88% 18%, rgba(255, 77, 79, 0.15), transparent 24%),
                radial-gradient(circle at 100% 0%, rgba(251, 113, 133, 0.18), transparent 28%);
            pointer-events: none;
        }

        .dashboard-hero::after {
            content: "";
            position: absolute;
            right: -38px;
            top: -30px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.78), rgba(255, 255, 255, 0));
            pointer-events: none;
            opacity: 0.9;
        }

        .dashboard-hero .row::after {
            content: "";
            position: absolute;
            left: 44%;
            top: 18%;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 77, 79, 0.08), transparent 72%);
            pointer-events: none;
        }

        .dashboard-hero > .row {
            position: relative;
            z-index: 1;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(255, 77, 79, 0.14);
            color: var(--dash-primary);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            margin-bottom: 18px;
            box-shadow: 0 8px 20px rgba(255, 77, 79, 0.08);
        }

        .hero-eyebrow i {
            color: var(--dash-primary);
        }

        .hero-title {
            font-size: 2.6rem;
            font-weight: 800;
            line-height: 1.05;
            margin-bottom: 14px;
            color: var(--dash-text);
            letter-spacing: -0.04em;
        }

        .hero-description,
        .hero-meta {
            color: var(--dash-muted);
        }

        .hero-description {
            max-width: 620px;
            margin-bottom: 0;
            font-size: 1.02rem;
            line-height: 1.8;
        }

        .hero-profile {
            display: flex;
            justify-content: flex-end;
        }

        .hero-profile-card {
            min-width: 290px;
            max-width: 370px;
            width: 100%;
            padding: 24px;
            border-radius: 22px;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.78) 0%, rgba(255, 246, 247, 0.88) 100%);
            border: 1px solid rgba(255, 255, 255, 0.85);
            box-shadow: 0 22px 38px rgba(15, 23, 42, 0.08), 0 10px 18px rgba(255, 77, 79, 0.06);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .hero-profile-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 77, 79, 0.2);
            box-shadow: 0 28px 48px rgba(15, 23, 42, 0.1), 0 14px 28px rgba(255, 77, 79, 0.08);
        }

        .hero-profile-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.36), transparent 40%);
            pointer-events: none;
        }

        .hero-profile-top {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 20px;
        }

        .dashboard-avatar {
            flex-shrink: 0;
            width: 72px;
            height: 72px;
            border-radius: 20px;
            overflow: hidden;
            background: linear-gradient(135deg, #ffe4e6 0%, #ffd6d9 100%);
            padding: 4px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 14px 28px rgba(255, 77, 79, 0.14);
            transition: transform 0.28s ease, box-shadow 0.28s ease;
        }

        .hero-profile-card:hover .dashboard-avatar {
            transform: scale(1.04) rotate(-2deg);
            box-shadow: 0 18px 30px rgba(255, 77, 79, 0.18);
        }

        .dashboard-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            background: #f8fafc;
        }

        .hero-profile-card h4 {
            margin-bottom: 5px;
            font-size: 1.12rem;
            font-weight: 800;
            color: var(--dash-text);
            letter-spacing: -0.02em;
        }

        .hero-meta {
            font-size: 0.94rem;
            margin-bottom: 0;
        }

        .hero-status {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid rgba(148, 163, 184, 0.18);
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border-radius: 999px;
            background: linear-gradient(180deg, #fff5f5 0%, #ffeef0 100%);
            color: var(--dash-primary);
            font-size: 0.84rem;
            font-weight: 800;
            border: 1px solid rgba(255, 77, 79, 0.14);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.7);
        }

        .status-pill i {
            color: var(--dash-primary);
            font-size: 0.62rem;
            animation: none;
        }

        .hero-status small {
            color: #5b6b82;
            font-size: 0.88rem;
            line-height: 1.5;
            font-weight: 500;
        }

        .stats-grid {
            margin-bottom: 4px;
        }

        .stats-grid > [class*="col-"] {
            display: flex;
        }

        .stat-link {
            display: block;
            width: 100%;
            color: inherit;
            text-decoration: none !important;
        }

        .stat-card {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
            min-height: 172px;
            padding: 25px;
            border-radius: var(--dash-radius);
            border: 1px solid rgba(255, 255, 255, 0.72);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 249, 250, 0.92) 100%);
            box-shadow: var(--dash-shadow-soft);
            overflow: hidden;
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            background: linear-gradient(180deg, var(--dash-primary) 0%, var(--dash-secondary) 100%);
            border-radius: 999px;
        }

        .stat-card::after {
            content: "";
            position: absolute;
            top: -30px;
            right: -24px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 77, 79, 0.1), transparent 72%);
            pointer-events: none;
            transition: transform 0.28s ease, opacity 0.28s ease;
            opacity: 0.75;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            border-color: var(--dash-border-strong);
            box-shadow: var(--dash-shadow-hover);
        }

        .stat-card:hover::after {
            transform: scale(1.12);
            opacity: 1;
        }

        .stat-card > * {
            position: relative;
            z-index: 1;
        }

        .stat-content {
            flex: 1;
        }

        .stat-label {
            margin-bottom: 12px;
            color: var(--dash-muted) !important;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .stat-value {
            margin-bottom: 12px;
            color: var(--dash-text);
            font-size: 2.28rem;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.04em;
        }

        .stat-caption {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #5e7087;
            font-size: 0.94rem;
            line-height: 1.55;
            font-weight: 500;
        }

        .stat-caption i {
            color: var(--dash-primary);
        }

        .stat-icon-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: linear-gradient(180deg, #fff0f1 0%, #ffe3e6 100%);
            border: 1px solid rgba(255, 77, 79, 0.12);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.78), 0 14px 24px rgba(255, 77, 79, 0.12);
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        }

        .stat-icon-wrap::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.58), transparent 60%);
            pointer-events: none;
        }

        .stat-icon-wrap::after {
            content: "";
            position: absolute;
            inset: 10px;
            border-radius: inherit;
            border: 1px solid rgba(255, 255, 255, 0.42);
            pointer-events: none;
        }

        .stat-icon-wrap i {
            color: var(--dash-primary);
            font-size: 1.45rem;
            position: relative;
            z-index: 1;
            transition: transform 0.28s ease;
        }

        .stat-link:hover .stat-icon-wrap {
            transform: translateY(-3px) scale(1.04);
            border-color: rgba(255, 77, 79, 0.2);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.84), 0 18px 28px rgba(255, 77, 79, 0.16);
        }

        .stat-link:hover .stat-icon-wrap i {
            transform: scale(1.08);
        }

        .stat-card.stat-reviews {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 247, 248, 0.92) 100%);
        }

        .stat-card.stat-bookings {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 245, 246, 0.92) 100%);
        }

        .stat-card.stat-services {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 250, 250, 0.92) 100%);
        }

        .search .modal-content,
        .quick-view .modal-content {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98) 0%, rgba(250, 252, 255, 0.98) 100%);
            color: var(--dash-text);
            border: 1px solid rgba(255, 255, 255, 0.85);
            box-shadow: var(--dash-shadow);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .search .text-dark,
        .quick-view .text-dark {
            color: var(--dash-text) !important;
        }

        .search .modal-header,
        .quick-view .modal-header {
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
        }

        .search .form-control,
        .quick-view .form-control {
            border: 1px solid rgba(148, 163, 184, 0.22);
            box-shadow: none;
            background: rgba(255, 255, 255, 0.92);
        }

        .search .form-control:focus,
        .quick-view .form-control:focus {
            border-color: rgba(255, 77, 79, 0.24);
            box-shadow: 0 0 0 3px rgba(255, 77, 79, 0.08);
        }

        @media (max-width: 991.98px) {
            .main-content {
                padding: 24px;
            }

            .dashboard-hero {
                padding: 28px;
                border-radius: 24px;
            }

            .hero-title {
                font-size: 2.15rem;
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
                padding: 22px;
                border-radius: 20px;
            }

            .hero-title {
                font-size: 1.85rem;
            }

            .hero-profile-card {
                min-width: 100%;
                padding: 20px;
            }

            .hero-status {
                flex-direction: column;
                align-items: flex-start;
            }

            .stat-card {
                min-height: 150px;
                padding: 22px;
                border-radius: 16px;
            }

            .stat-value {
                font-size: 1.95rem;
            }

            .stat-icon-wrap {
                width: 60px;
                height: 60px;
                border-radius: 18px;
            }

            .stat-icon-wrap i {
                font-size: 1.25rem;
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
            animation: sellerDashboardFade 0.7s ease;
        }

        .dashboard-hero {
            padding: 34px;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.82);
            background: linear-gradient(135deg, #ffffff 0%, #fff8f6 55%, #fff3f0 100%);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        .dashboard-hero::before {
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.6), transparent 36%),
                radial-gradient(circle at 100% 0%, rgba(255, 90, 60, 0.14), transparent 30%);
        }

        .hero-eyebrow {
            background: rgba(255, 255, 255, 0.86);
            border-color: rgba(255, 90, 60, 0.14);
            color: #ff5a3c;
            box-shadow: 0 10px 24px rgba(255, 90, 60, 0.08);
        }

        .hero-title,
        .hero-profile-card h4,
        .stat-value {
            color: #1f2937;
        }

        .hero-description,
        .hero-meta,
        .hero-status small,
        .stat-label,
        .stat-caption {
            color: #6b7280 !important;
        }

        .hero-profile-card {
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 90, 60, 0.10);
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
        }

        .dashboard-avatar {
            background: linear-gradient(135deg, #ffd8d2, #ffece7);
            box-shadow: 0 14px 28px rgba(255, 90, 60, 0.14);
        }

        .dashboard-avatar img {
            background: #f3f4f6;
        }

        .hero-status {
            border-top-color: rgba(15, 23, 42, 0.08);
        }

        .status-pill {
            background: linear-gradient(45deg, rgba(255, 77, 77, 0.10), rgba(255, 122, 92, 0.16));
            border-color: rgba(255, 90, 60, 0.14);
            color: #ff5a3c;
        }

        .stat-card {
            min-height: 178px;
            padding: 28px;
            border-radius: 22px;
            border: 1px solid rgba(15, 23, 42, 0.06);
            background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
            box-shadow: 0 14px 34px rgba(15, 23, 42, 0.06);
        }

        .stat-card:hover {
            box-shadow: 0 24px 55px rgba(15, 23, 42, 0.12);
        }

        .stat-card::before {
            background: linear-gradient(180deg, #ff4d4d, #ff5a3c);
        }

        .stat-card::after {
            background: radial-gradient(circle, rgba(255, 90, 60, 0.10), transparent 72%);
        }

        .stat-card.stat-services {
            background: linear-gradient(180deg, #ffffff 0%, #fff8f4 100%);
        }

        .stat-card.stat-reviews {
            background: linear-gradient(180deg, #ffffff 0%, #fff7f7 100%);
        }

        .stat-card.stat-bookings {
            background: linear-gradient(180deg, #ffffff 0%, #fff6f2 100%);
        }

        .stat-icon-wrap {
            background: linear-gradient(135deg, #fff0ec, #ffe0d8);
            border-color: rgba(255, 90, 60, 0.10);
            box-shadow: 0 14px 28px rgba(255, 90, 60, 0.12);
        }

        .stat-icon-wrap i,
        .stat-caption i {
            color: #ff5a3c;
        }

        .search .modal-content,
        .quick-view .modal-content {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            border-radius: 20px;
        }

        @keyframes sellerDashboardFade {
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

            .dashboard-hero {
                padding: 26px;
            }
        }

        @media (max-width: 767.98px) {
            .main-content {
                padding: 16px;
            }

            .dashboard-hero {
                padding: 22px;
                border-radius: 22px;
            }

            .hero-title {
                font-size: 1.85rem;
            }

            .stat-card {
                min-height: 154px;
                padding: 22px;
                border-radius: 18px;
            }
        }
    </style>
    <style>
        .hero-profile-card,
        .stat-card,
        .stat-icon-wrap,
        .search .modal-content,
        .quick-view .modal-content,
        .search .form-control,
        .quick-view .form-control {
            transition: all 0.3s ease;
        }

        .hero-profile-card:hover,
        .stat-card:hover {
            transform: translateY(-4px);
            background: #ffffff;
            border-color: #f1f1f1;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .hero-profile-card:hover .dashboard-avatar,
        .stat-link:hover .stat-icon-wrap {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #fff0ec, #ffe7de);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .stat-link:hover .stat-icon-wrap i,
        .hero-profile-card:hover h4,
        .hero-profile-card:hover .hero-meta,
        .hero-profile-card:hover small,
        .stat-card:hover .stat-label,
        .stat-card:hover .stat-value,
        .stat-card:hover .stat-caption {
            color: #222 !important;
            opacity: 1 !important;
        }

        .stat-card:hover::after {
            opacity: 0.55;
            transform: none;
        }
    </style>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                <!-- Header START -->
                <?php
                $this->load->view("seller/head");
                ?>
                <!-- Header END -->

                <!-- Side Nav START -->
                <?php
                $this->load->view("seller/sidebar");
                ?>
                <!-- Side Nav END -->

                <!-- Page Container START -->
                <div class="page-container">


                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <?php
                            $res_detail = $this->md->my_select("tbl_restaurant","*",array("restaurant_id"=>$this->session->userdata("seller_email")));
                        ?>
                        <div class="dashboard-shell">
                            <div class="dashboard-hero">
                                <div class="row align-items-center">
                                    <div class="col-xl-7">
                                        <span class="hero-eyebrow">
                                            <i class="fas fa-chart-line"></i>
                                            Seller Workspace
                                        </span>
                                        <h1 class="hero-title">Welcome back, <?php echo ucwords($res_detail[0]->restaurant_name); ?></h1>
                                        <p class="hero-description">Track performance, monitor customer activity, and manage your business from a polished command center designed for fast-moving teams.</p>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="hero-profile">
                                            <div class="hero-profile-card">
                                                <div class="hero-profile-top">
                                                    <div class="dashboard-avatar">
                                                        <?php
                            if($res_detail[0]->profile_pic == "")
                            {
                        ?>
                        <img class="round" height="30" width="40" avatar="<?php echo substr($res_detail[0]->restaurant_name, 0,1); ?>">
                        <?php 
                            }
                            else 
                            {
                        ?>
                        <img src="<?php echo base_url().$res_detail[0]->profile_pic; ?>" alt="Restaurant Profile">
                        <?php
                            }
                        ?>
                                                    </div>
                                                    <div>
                                                        <h4><?php echo ucwords($res_detail[0]->restaurant_name); ?></h4>
                                                        <p class="hero-meta">Premium seller dashboard</p>
                                                    </div>
                                                </div>
                                                <div class="hero-status">
                                                    <span class="status-pill">
                                                        <i class="fas fa-circle"></i>
                                                        Active Session
                                                    </span>
                                                    <small>Last Login: <?php  echo date("d-m-Y h:i:s a", strtotime($res_detail[0]->lastlogin)); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row stats-grid">
                                
                                <div class="col-md-6 col-xl-4 m-b-25">
                                    <!-- <a class="stat-link" href="<?php echo base_url("Restaurant-Sub-Category"); ?>"> -->
                                        <div class="stat-card stat-services">
                                            <div class="stat-content">
                                                <p class="stat-label">Total Services</p>
                                                <h2 class="stat-value">
                                                    <?php echo $c = count($this->md->my_select("tbl_category","*"));?>
                                                </h2>
                                                <span class="stat-caption">
                                                    <i class="fas fa-arrow-up-right-from-square"></i>
                                                    Explore service categories
                                                </span>
                                            </div>
                                            <div class="stat-icon-wrap">
                                                <i class="fas fa-layer-group"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6 col-xl-4 m-b-25">
                                    <a class="stat-link" href="<?php echo base_url("Restaurant-Item-Review-Rating"); ?>">
                                        <div class="stat-card stat-reviews">
                                            <div class="stat-content">
                                                <p class="stat-label">Total Reviews</p>
                                                <h2 class="stat-value">
                                                    <?php echo $c = count($this->md->my_select("tbl_review_rating", "*",array("restaurant_id"=>$this->session->userdata("seller_email"))));?>
                                                </h2>
                                                <span class="stat-caption">
                                                    <i class="fas fa-star"></i>
                                                    See customer feedback
                                                </span>
                                            </div>
                                            <div class="stat-icon-wrap">
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- <div class="col-md-6 col-lg-3">
                                    <div class="card dash-box">
                                        <div class="card-body">
                                            <a href="<?php echo base_url("Restaurant-Manage-Items"); ?>">
                                                <div class="media align-products-center">
                                                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                                                        <i class="fab fa-product-hunt"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <h2 class="m-b-0">
                                                            <?php echo $c = count($this->md->my_select("tbl_item", "*",array("restaurant_id"=>$this->session->userdata("seller_email"))));?>
                                                        </h2>
                                                        <p class="m-b-0 text-muted">Total Services</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-md-6 col-xl-4 m-b-25">
                                    <a class="stat-link" href="<?php echo base_url("Restaurant-Order"); ?>">
                                        <div class="stat-card stat-bookings">
                                            <div class="stat-content">
                                                <p class="stat-label">Total Bookings</p>
                                                <h2 class="stat-value">
                                                    <?php echo $c = count($this->md->my_query("select * from tbl_bill where status IN ('pending,','pending,prepared,','pending,prepared,readydeliver,','pending,prepared,readydeliver,delivered') and restaurant_id = ".$this->session->userdata("seller_email")));?>
                                                </h2>
                                                <span class="stat-caption">
                                                    <i class="fas fa-calendar-check"></i>
                                                    Manage current orders
                                                </span>
                                            </div>
                                            <div class="stat-icon-wrap">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                        </div>
                                    </a>
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
                            <div class="modal-header justify-content-between align-products-center">
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
                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-3.jpg" alt="">
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
                                            <img src="assets/images/others/img-1.jpg" alt="">
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
                            <div class="modal-header justify-content-between align-products-center">
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
        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      
      loop:true,
    margin:10,
    nav:true,
    }
  });
});
        </script>
    </body>
</html>
