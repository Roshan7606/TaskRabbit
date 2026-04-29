<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Product-Active-Review</title>
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
            .reviews-card .card-body {
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
            .reviews-subtitle,
            .empty-state-copy,
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
                max-width: 360px;
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

            .reviews-card {
                position: relative;
                border-radius: 24px;
                border: 1px solid var(--dash-border);
                background: linear-gradient(180deg, rgba(30, 41, 59, 0.82) 0%, rgba(15, 23, 42, 0.94) 100%);
                box-shadow: 0 24px 52px rgba(2, 6, 23, 0.48), 0 0 30px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .reviews-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(180deg, rgba(255, 255, 255, 0.06), transparent 30%),
                    radial-gradient(circle at top right, rgba(255, 140, 66, 0.12), transparent 28%);
                pointer-events: none;
            }

            .reviews-card .card-body {
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

            .reviews-title {
                margin-bottom: 10px;
                color: #f8fafc;
                font-size: 1.8rem;
                font-weight: 800;
                letter-spacing: -0.03em;
            }

            .reviews-subtitle {
                margin-bottom: 24px;
                max-width: 720px;
                font-size: 0.98rem;
                line-height: 1.7;
            }

            .reviews-list {
                display: grid;
                gap: 18px;
            }

            .review-box {
                position: relative;
                padding: 24px;
                border-radius: 22px;
                border: 1px solid rgba(255, 255, 255, 0.08);
                background: rgba(30, 41, 59, 0.7);
                box-shadow: 0 20px 38px rgba(2, 6, 23, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.03);
                transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease, background 0.35s ease;
            }

            .review-box:hover {
                transform: translateY(-6px);
                border-color: rgba(255, 107, 0, 0.18);
                background: rgba(30, 41, 59, 0.88);
                box-shadow: 0 24px 44px rgba(2, 6, 23, 0.42), 0 0 28px rgba(255, 107, 0, 0.12);
            }

            .review-user {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                margin-bottom: 18px;
            }

            .review-user-img {
                display: flex;
                align-items: center;
                gap: 16px;
                min-width: 0;
            }

            .review-user-img-icon,
            .review-user-img .round {
                width: 56px;
                height: 56px;
                border-radius: 18px !important;
                object-fit: cover;
                background: linear-gradient(135deg, rgba(255, 107, 0, 0.95), rgba(255, 140, 66, 0.88));
                padding: 3px;
                box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.12), 0 16px 32px rgba(255, 107, 0, 0.22);
            }

            .reviewer-name {
                min-width: 0;
            }

            .review-box-user-name,
            .ratings .text-light-black,
            .review-box > p.text-light-black {
                color: #f8fafc !important;
            }

            .review-box-user-name {
                margin-bottom: 4px;
                font-size: 1.05rem;
                font-weight: 800;
            }

            .review-date span {
                display: inline-flex;
                align-items: center;
                padding: 9px 14px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.12);
                border: 1px solid rgba(255, 107, 0, 0.18);
                color: #fed7aa !important;
                font-size: 0.82rem;
                font-weight: 700;
                white-space: nowrap;
            }

            .ratings {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: 10px;
                margin-bottom: 14px;
            }

            .ratings p {
                margin-bottom: 0;
                color: var(--dash-muted) !important;
                font-size: 0.95rem;
            }

            .ratings p strong {
                color: #fdba74;
                font-weight: 800;
            }

            .text-yellow {
                color: #fbbf24 !important;
            }

            .text-dark-white {
                color: rgba(148, 163, 184, 0.45) !important;
            }

            .review-box > p.text-light-black {
                margin-bottom: 0;
                color: #cbd5e1 !important;
                line-height: 1.7;
            }

            .panding-order-img {
                width: 180px;
                max-width: 100%;
                margin-bottom: 16px;
                filter: drop-shadow(0 20px 40px rgba(255, 107, 0, 0.16));
            }

            .empty-state {
                padding: 36px 20px 20px;
                border-radius: 22px;
                background: rgba(15, 23, 42, 0.42);
                border: 1px dashed rgba(255, 255, 255, 0.08);
            }

            .empty-state h3 {
                margin-bottom: 8px;
                color: #f8fafc;
                font-size: 1.5rem;
                font-weight: 800;
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
                .reviews-card .card-body {
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

                .reviews-card {
                    border-radius: 20px;
                }

                .reviews-card .card-body {
                    padding: 20px;
                }

                .reviews-title {
                    font-size: 1.45rem;
                }

                .review-user {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .review-user-img {
                    width: 100%;
                }

                .review-date span {
                    width: 100%;
                    justify-content: center;
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
                animation: sellerReviewsFade 0.7s ease;
            }

            .dashboard-hero,
            .reviews-card {
                border-radius: 24px;
                background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            }

            .dashboard-hero::before,
            .reviews-card::before {
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.65), transparent 36%),
                    radial-gradient(circle at 100% 0%, rgba(255, 90, 60, 0.10), transparent 30%);
            }

            .hero-eyebrow,
            .section-label,
            .review-date span {
                background: rgba(255, 255, 255, 0.92);
                border-color: rgba(255, 90, 60, 0.14);
                color: #ff5a3c !important;
                box-shadow: 0 10px 24px rgba(255, 90, 60, 0.08);
            }

            .hero-title,
            .hero-meta-title,
            .reviews-title,
            .review-box-user-name,
            .ratings .text-light-black,
            .review-box > p.text-light-black {
                color: #1f2937 !important;
            }

            .hero-description,
            .hero-meta,
            .hero-status small,
            .reviews-subtitle,
            .empty-state-copy,
            .breadcrumb-item,
            .ratings p {
                color: #6b7280 !important;
            }

            .hero-profile-card,
            .review-box,
            .empty-state {
                background: #ffffff;
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: 0 16px 32px rgba(15, 23, 42, 0.06);
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

            .review-user-img-icon,
            .review-user-img .round {
                background: linear-gradient(135deg, #ffd8d2, #ffece7);
                box-shadow: 0 12px 24px rgba(255, 90, 60, 0.14);
            }

            .empty-state h3 {
                color: #1f2937;
            }

            .search .modal-content,
            .quick-view .modal-content {
                background: #ffffff;
                color: #1f2937;
            }

            @keyframes sellerReviewsFade {
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
                .reviews-card {
                    border-radius: 22px;
                }
            }
        </style>
        <style>
            .hero-profile-card,
            .reviews-card,
            .review-box,
            .empty-state,
            .review-date span {
                transition: all 0.3s ease;
            }

            .hero-profile-card:hover,
            .reviews-card:hover,
            .review-box:hover {
                transform: translateY(-4px);
                background: #ffffff !important;
                border-color: #f1f1f1;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .review-box:hover .review-box-user-name,
            .review-box:hover .ratings .text-light-black,
            .review-box:hover .ratings p,
            .review-box:hover > p.text-light-black,
            .review-box:hover .review-date span {
                color: #222 !important;
                opacity: 1 !important;
            }

            .review-box:hover .review-date span {
                background: #fff8f6;
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
                                        <i class="fas fa-star-half-alt"></i>
                                        Feedback Center
                                    </span>
                                    <h1 class="hero-title">Review and Rating</h1>
                                    <p class="hero-description">See what customers are saying about your services in a polished review workspace that matches the premium dashboard theme.</p>
                                    <div class="header-sub-title m-t-20">
                                        <nav class="breadcrumb breadcrumb-dash">
                                            <a href="<?php echo base_url("Restaurant-Home"); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                            <a class="breadcrumb-item" href="#">Review and Rating</a>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="hero-profile">
                                        <div class="hero-profile-card">
                                            <h4 class="hero-meta-title">Customer Sentiment</h4>
                                            <p class="hero-meta">Track ratings, read detailed comments, and stay close to the customer experience from one consistent seller workspace.</p>
                                            <div class="hero-status">
                                                <span class="status-pill">
                                                    <i class="fas fa-circle"></i>
                                                    Reviews Live
                                                </span>
                                                <small>Fresh feedback from customers</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card reviews-card">
                                    <div class="card-body">
                                        <span class="section-label">
                                            <i class="fas fa-comments"></i>
                                            Review Feed
                                        </span>
                                        <h4 class="reviews-title">Review and Rating</h4>
                                        <p class="reviews-subtitle">Browse ratings and review notes in a premium dark layout designed to keep feedback readable and consistent with the rest of your dashboard.</p>
                                        <?php 
                                           if(count($review_rating) == 0)
                                           {
                                        ?>
                                            <center class="empty-state">
                                                <img src="<?php echo base_url(); ?>seller_assets/images/others/noreview.png" class="panding-order-img">
                                                <h3 class="margin-top-10">No Review and Rating Found</h3>
                                                <p class="empty-state-copy">Customer reviews will appear here once your services start receiving feedback.</p>
                                         </center>
                                        
                                        <?php
                                           }
                                           else
                                           {
                                        ?>
                                        <div class="reviews-list">
                                        <?php
                                               foreach($review_rating as $single)
                                               {
                                        ?>
                                         <div class="review-box">
                            <div class="review-user">
                                <div class="review-user-img">
                                    <?php    
                                    if($single->profile != "")
                                            {
                                ?>
                                                <img src="<?php echo base_url().$single->profile; ?>" class="rounded-circle review-user-img-icon" alt="userimg"> 
                                <?php
                                            }
                                            else
                                            {
                                ?>
                                               <img class="round" height="40" width="40" avatar="<?php echo substr($single->user_name, 0,1); ?>">
                                <?php                
                                            }
                                 ?>    
                                    <div class="reviewer-name">
                                        <p class="fs-17 text-light-black fw-600 review-box-user-name"><?php echo ucwords($single->user_name); ?></p>
                                    </div> 
                                </div>
                                <div class="review-date"> <span class="text-light-white"><?php echo date("M d,Y",strtotime($single->created_at)); ?></span>
                                </div>
                            </div>
                            <div class="ratings">
                                <p class="text-light-black"><strong>Service:</strong> <?php echo ucfirst($single->service_name); ?></p> 
                                <?php $cnt_star = round($single->rating); 
                                for($i = 1;$i<=5;$i++)
                                {
                                    if($i <= $cnt_star)
                                    {
                                ?>
                                <span class="text-yellow fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php
                                    }
                                    else
                                    {
                             ?>
                            <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php
                                    }
                                }
                            ?>
                              
                            </div>
                                <p class="text-light-black"><?php echo ucfirst($single->review_text); ?></p> 
                            <!--<span class="text-light-white fs-12 food-order">Kathy-->
                              
<!--                            <ul class="food">
                                <li>
                                    <button class="add-pro bg-gradient-red">Coffee <span class="close">+</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-dark">Pizza <span class="close">+</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-gradient-green">Noodles <span class="close">+</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-gradient-orange">Burger <span class="close">+</span>
                                    </button>
                                </li>
                            </ul>-->
                                        </div>
                                        <?php
                                               }
                                        ?>
                                        </div>
                                        <?php
                                           }
                                        ?>
                                           
                                        <?php 
                                            for($i=0;$i<=10;$i++)
                                            {
                                         ?>

                                        <?php
                                            }
                                        ?>
                                        
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
    </body>
</html>
