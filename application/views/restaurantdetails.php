<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title><?php echo $restaurent_detail[0]->restaurant_name; ?> | TaskRabbit</title>

        <?php
        $this->load->view("CSS");
        ?>

        <style>
        .position-relative {
            position: relative;
        }

        .valid-tick {
            display: none;
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #28a745;
            font-weight: bold;
            font-size: 16px;
        }

        .textarea-tick {
            top: 18px;
            transform: none;
        }

        .premium-input.input-valid {
            border: 2px solid #28a745 !important;
            box-shadow: 0 0 0 0.1rem rgba(40, 167, 69, 0.15);
        }

        .premium-input.input-invalid {
            border: 2px solid #dc3545 !important;
            box-shadow: 0 0 0 0.1rem rgba(220, 53, 69, 0.15);
        }

        .validation-summary {
            display: none;
            margin-bottom: 15px;
        }

        /* ===============================
        Premium Login Required Modal
        ================================== */
        #cartmodal .modal-dialog {
            max-width: 520px;
        }

        #cartmodal .modal-content {
            border: none;
            border-radius: 26px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 25px 70px rgba(20, 24, 39, 0.18);
            position: relative;
        }

        #cartmodal .modal-content::before {
            content: "";
            position: absolute;
            top: 0;
            left: 22px;
            right: 22px;
            height: 7px;
            border-radius: 0 0 14px 14px;
            background: linear-gradient(90deg, #ff6b6b, #ff4d4d, #ff3d68);
        }

        .premium-login-modal-body {
            padding: 42px 36px 28px;
            text-align: center;
            position: relative;
        }

        .premium-login-icon-wrap {
            width: 110px;
            height: 110px;
            margin: 6px auto 22px;
            border-radius: 50%;
            background: radial-gradient(circle at top, #fffefe 0%, #fdeeee 55%, #f9dede 100%);
            border: 1px solid rgba(255, 77, 77, 0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 10px 30px rgba(255, 77, 77, 0.10),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            position: relative;
        }

        .premium-login-icon-wrap::before {
            content: "";
            position: absolute;
            inset: 10px;
            border-radius: 50%;
            border: 1px dashed rgba(255, 77, 77, 0.18);
        }

        .premium-login-icon-wrap i {
            font-size: 38px;
            color: #ff4d4d;
            position: relative;
            z-index: 2;
        }

        .premium-login-title {
            font-size: 42px;
            font-weight: 800;
            line-height: 1.15;
            color: #1b2234;
            margin-bottom: 14px;
            letter-spacing: -0.8px;
        }

        .premium-login-title span {
            color: #ff4d4d;
            position: relative;
        }
        .premium-login-subtitle {
            font-size: 16px;
            line-height: 1.9;
            color: #6b7280;
            max-width: 400px;
            margin: 0 auto 26px;
            font-weight: 400;
        }

        .premium-login-feature-box {
            background: linear-gradient(180deg, #fffdfd 0%, #fff7f7 100%);
            border: 1px solid #f2d9d9;
            border-radius: 22px;
            padding: 18px 22px;
            margin-bottom: 28px;
            text-align: left;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.9);
        }

        .premium-login-feature-box ul {
            margin: 0;
            padding-left: 0;
            list-style: none;
        }

        .premium-login-feature-box ul li {
            font-size: 15px;
            color: #344054;
            margin-bottom: 14px;
            display: flex;
            align-items: flex-start;
            line-height: 1.7;
        }

        .premium-login-feature-box ul li:last-child {
            margin-bottom: 0;
        }

        .premium-login-feature-box ul li i {
            color: #ff4d4d;
            margin-right: 12px;
            font-size: 14px;
            margin-top: 6px;
        }

        .premium-login-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 14px;
        }

        .premium-btn-secondary {
            min-width: 140px;
            height: 52px;
            border-radius: 999px;
            border: 1px solid #d8dee8;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            color: #344054;
            font-weight: 700;
            transition: all 0.25s ease;
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.04);
        }

        .premium-btn-secondary:hover {
            background: #f3f5f8;
            color: #101828;
            transform: translateY(-1px);
        }

        .premium-btn-primary {
            min-width: 210px;
            height: 52px;
            border-radius: 999px;
            border: none;
            background: linear-gradient(90deg, #ff5a5a, #ff3d68);
            color: #fff !important;
            font-weight: 700;
            box-shadow: 0 14px 28px rgba(255, 77, 77, 0.22);
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
        }

        .premium-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(255, 77, 77, 0.28);
            color: #fff !important;
            text-decoration: none !important;
        }

        .premium-btn-primary i {
            margin-right: 8px;
        }

        .premium-login-bottom-text {
            font-size: 13px;
            color: #98a2b3;
            margin-bottom: 0;
            letter-spacing: 0.2px;
        }

        #cartmodal .modal-footer {
            border-top: 1px solid #f2f4f7;
            justify-content: center;
            padding: 18px 24px 24px;
            background: #fff;
        }

        #cartmodal.modal .modal-dialog {
            margin-top: 4rem;
        }


        #cartmodal .close-premium-modal:hover {
            background: #ffe3e3;
            transform: rotate(90deg);
        }

        @media (max-width: 576px) {
            .premium-login-modal-body {
                padding: 30px 20px 22px;
            }

            .premium-login-title {
                font-size: 32px;
            }

            .premium-login-actions {
                flex-direction: column;
            }

            .premium-btn-primary,
            .premium-btn-secondary {
                width: 100%;
            }
        }
        
        .premium-login-symbol {
            font-size: 42px;
            color: #ff4d4d;
            font-weight: 700;
        }

        .premium-review-cta {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, 0.24), transparent 32%),
                linear-gradient(135deg, #1b1f3b 0%, #35245f 42%, #ff4d6d 100%);
            box-shadow: 0 30px 80px rgba(31, 38, 135, 0.20);
            isolation: isolate;
        }

        .premium-review-cta::before {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: 27px;
            background: linear-gradient(145deg, rgba(255,255,255,0.18), rgba(255,255,255,0.05));
            pointer-events: none;
            z-index: 0;
        }

        .premium-review-cta > img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.14;
            pointer-events: none;
            z-index: 0;
        }

        .premium-review-form-wrap {
            position: relative;
            z-index: 2;
            padding: 42px;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        .premium-review-form-wrap,
        .premium-review-form-wrap * {
            pointer-events: auto;
        }

        .premium-review-rating {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            margin: 18px 0 24px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.22);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            position: relative;
            z-index: 3;
        }

        .premium-review-star {
            border: 0;
            background: transparent;
            padding: 0;
            line-height: 1;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.42);
            font-size: 30px;
            transition: transform 0.22s ease, color 0.22s ease, text-shadow 0.22s ease;
            position: relative;
            z-index: 3;
        }

        .premium-review-star:hover,
        .premium-review-star:focus {
            outline: none;
            transform: translateY(-2px) scale(1.08);
        }

        .premium-review-star.is-active {
            color: #ffd166;
            text-shadow: 0 8px 20px rgba(255, 209, 102, 0.35);
        }

        .premium-review-form-fields {
            display: grid;
            gap: 16px;
            position: relative;
            z-index: 3;
        }

        .premium-review-input,
        .premium-review-select,
        .premium-review-textarea {
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.22);
            color: #ffffff;
            border-radius: 18px;
            padding: 16px 18px;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.08);
            position: relative;
            z-index: 3;
        }

        select,
        .premium-review-form-wrap select,
        .premium-review-select {
            background-color: #ffffff !important;
            background: #ffffff !important;
            color: #000000 !important;
            opacity: 1 !important;
            pointer-events: auto !important;
            -webkit-text-fill-color: #000000 !important;
        }

        .premium-review-input::placeholder,
        .premium-review-select::placeholder,
        .premium-review-textarea::placeholder {
            color: rgba(255, 255, 255, 0.72);
        }

        select option,
        .premium-review-select option,
        .premium-review-form-wrap select option {
            background-color: #ffffff !important;
            background: #ffffff !important;
            color: #000000 !important;
        }

        .premium-review-input[readonly] {
            opacity: 1;
        }

        .premium-review-input:focus,
        .premium-review-select:focus,
        .premium-review-textarea:focus {
            background: rgba(255, 255, 255, 0.20);
            border-color: rgba(255, 255, 255, 0.35);
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        select:focus,
        .premium-review-form-wrap select:focus,
        .premium-review-select:focus {
            background: #ffffff !important;
            color: #000000 !important;
            outline: none !important;
            box-shadow: none !important;
        }

        body,
        input,
        textarea {
            color: #000000 !important;
        }

        textarea,
        .premium-review-form-wrap textarea,
        .premium-review-textarea {
            background-color: #ffffff !important;
            background: #ffffff !important;
            color: #000000 !important;
            opacity: 1 !important;
            caret-color: #000000 !important;
            -webkit-text-fill-color: #000000 !important;
        }

        textarea::placeholder,
        .premium-review-form-wrap textarea::placeholder,
        .premium-review-textarea::placeholder {
            color: #666666 !important;
            opacity: 1 !important;
        }

        .dark textarea {
            background: #1e1e1e !important;
            color: #ffffff !important;
        }

        .premium-review-textarea {
            min-height: 170px;
            resize: vertical;
        }

        .premium-review-message {
            display: none;
            margin: 0;
            padding: 14px 16px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.6;
        }

        .premium-review-message.is-visible {
            display: block;
        }

        .premium-review-message.is-error {
            background: rgba(255, 90, 95, 0.18);
            border: 1px solid rgba(255, 90, 95, 0.35);
            color: #fff3f4;
        }

        .premium-review-message.is-success {
            background: rgba(52, 211, 153, 0.18);
            border: 1px solid rgba(52, 211, 153, 0.35);
            color: #ecfff8;
        }

        .premium-review-submit {
            border: 0;
            border-radius: 999px;
            padding: 15px 26px;
            min-height: 54px;
            width: fit-content;
            background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 0.2px;
            box-shadow: 0 18px 35px rgba(255, 75, 43, 0.32);
            transition: transform 0.22s ease, box-shadow 0.22s ease, filter 0.22s ease;
            position: relative;
            z-index: 4;
            cursor: pointer;
        }

        .premium-review-submit:hover,
        .premium-review-submit:focus {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 24px 40px rgba(255, 75, 43, 0.38);
            filter: brightness(1.04);
            outline: none;
        }

        .premium-review-submit:disabled {
            opacity: 0.72;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .premium-review-card {
            transition: transform 0.24s ease, box-shadow 0.24s ease;
        }

        .premium-review-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 38px rgba(15, 23, 42, 0.10);
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

        @media (max-width: 767px) {
            .premium-review-form-wrap {
                padding: 28px 20px;
            }

            .premium-review-rating {
                gap: 8px;
                padding: 10px 14px;
            }

            .premium-review-star {
                font-size: 26px;
            }

            .premium-review-submit {
                width: 100%;
            }
        }
        </style>

    </head>

    <body>
        <!-- Navigation -->
        <div class="header">
            <?php
            $this->load->view("header");
            ?>
        </div>
        <div class="main-sec"></div>
        <!-- Navigation -->

        <!-- restaurent top -->
        <div class="page-banner p-relative smoothscroll fixed-top premium-hero-banner premium-hero-banner-clean" id="menu" style="height: 400px;z-index: 1">
            <img src="<?php echo base_url(); ?>assets/img/banner.jpg" class="img-fluid full-width premium-hero-image" alt="banner">
            <div class="overlay-3 premium-hero-overlay">
                <div class="container premium-hero-shell">
                    <div class="row align-items-end">
                        <div class="col-lg-12">
                            <div class="heading padding-tb-10 premium-hero-content">
                                <span class="premium-hero-badge">Trusted Professional</span>
                                <h3 class="text-light-black title fw-700 no-margin">
                                    <?php
                                    if ($restaurent_detail[0]->restaurant_name != "") {
                                        echo $restaurent_detail[0]->restaurant_name;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>
                                </h3>
                                <p class="text-light-black sub-title no-margin premium-hero-location">
                                    <?php
                                    if (count($restaurent_address_detail) != 0) {
                                        echo $restaurent_address_detail[0]->area;
                                    } else {
                                        echo "Area";
                                    }
                                    ?> &longrightarrow; 
                                    <?php
                                    if (count($restaurent_address_detail) != 0) {
                                        echo $restaurent_address_detail[0]->city;
                                    } else {
                                        echo "City";
                                    }
                                    ?> &longrightarrow; 
                                    <?php
                                    if (count($restaurent_address_detail) != 0) {
                                        echo $restaurent_address_detail[0]->state;
                                    } else {
                                        echo "State";
                                    }
                                    ?>
                                    <span></span>
                                </p>
                                <div class="premium-hero-contact-group">
                                    <a class="text-light-black sub-title no-margin premium-hero-contact" href="mailto:<?php
                                    if ($restaurent_detail[0]->email != "") {
                                        echo $restaurent_detail[0]->email;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>">
                                        <i class="fa fa-envelope"></i>
                                        <?php
                                        if ($restaurent_detail[0]->email != "") {
                                            echo $restaurent_detail[0]->email;
                                        } else {
                                            echo "Data not inserted";
                                        }
                                        ?>
                                    </a>

                                    <a class="text-light-black sub-title no-margin premium-hero-contact" href="tel:<?php
                                    if ($restaurent_detail[0]->contact_no != "") {
                                        echo $restaurent_detail[0]->contact_no;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>">
                                        <i class="fa fa-phone-alt"></i>
                                        <?php
                                        if ($restaurent_detail[0]->contact_no != "") {
                                            echo $restaurent_detail[0]->contact_no;
                                        } else {
                                            echo "Data not inserted";
                                        }
                                        ?>
                                    </a>

                                    <div class="premium-rating-pill">
                                        <?php
                                        $cnt_star = round($star_rating[0]->rate_star);
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $cnt_star) {
                                                ?>
                                                <span class="text-yellow fs-16">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="text-dark-white fs-16">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <span class="fs-12 text-light-black"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- restaurent top -->

        <!-- restaurent tab -->
        <div class="restaurent-tabs u-line premium-tabs-wrap premium-tabs-wrap-final">
            <div class="container">
                <div class="row premium-tabs-row">
                    <div class="col-12">
                        <div class="restaurent-menu scrollnav premium-tabs-shell premium-tabs-shell-final">
                            <ul class="nav nav-pills premium-tabs-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#food">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#review">Reviews</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- restaurent tab -->

        <div class="container">
            <div class="row check_menu"></div>
        </div>

        <!-- restaurent meals -->
        <section class="section-padding restaurent-meals bg-light-theme premium-services-section premium-services-section-clean" id="food">
            <div class="container-fluid">
                <div class="row premium-services-layout">
                    <div class="col-xl-12 col-lg-12 premium-services-shell">
                <div class="row premium-services-grid premium-services-grid-centered">
                    <div class="col-xl-12 col-lg-12 restaurent-meal-head mb-md-40 premium-services-fullwidth">
                        <div class="row premium-services-header-row">
                            <div class="col-md-12">
                                <div class="card-header background-header-card padding-left-none premium-services-header premium-services-header-centered">
                                    <div class="section-header-left premium-section-heading premium-section-heading-centered">
                                        <span class="premium-section-kicker">Curated Services</span>
                                        <h3 class="text-light-black header-title">
                                            <a class="text-light-black no-margin">
                                                Our Services
                                            </a>
                                        </h3>
                                    </div>

                                    <div class="user-line premium-services-divider"></div>
                                </div>
                            </div>
                        </div>

                                <div class="card premium-services-card premium-glass-panel" id="search_food_item">
                            <div id="">
                                <div class="card-body no-padding premium-services-body">

                                            <?php if ($this->session->flashdata('error')) { ?>
                                                <div class="alert alert-danger" style="margin:15px;">
                                                    <?php echo $this->session->flashdata('error'); ?>
                                                </div>
                                            <?php } ?>
                    <div class="row premium-services-list premium-services-list-grid">

                        <?php if (!empty($service_items)) { ?>
                            <?php
                            $shown_selected_services_heading = false;
                            $shown_other_services_heading = false;
                            $selected_category_id = !empty($selected_category_id) ? (int) $selected_category_id : 0;
                            ?>
                            <?php foreach ($service_items as $item) { ?>
                                <?php
                                $is_selected_service = ($selected_category_id > 0 && (int) $item->category_id === $selected_category_id);
                                if ($is_selected_service && !$shown_selected_services_heading) {
                                    $shown_selected_services_heading = true;
                                ?>
                                    <div class="col-12" style="grid-column: 1 / -1; flex: 0 0 100%; max-width: 100%;">
                                        <div class="premium-services-group-heading" style="margin: 0 0 18px;">
                                            <span class="premium-section-kicker">Selected Service</span>
                                            <h4 class="text-light-black" style="margin: 6px 0 0;">Your chosen service</h4>
                                        </div>
                                    </div>
                                <?php
                                }
                                if ($selected_category_id > 0 && !$is_selected_service && !$shown_other_services_heading) {
                                    $shown_other_services_heading = true;
                                ?>
                                    <div class="col-12" style="grid-column: 1 / -1; flex: 0 0 100%; max-width: 100%;">
                                        <div class="premium-services-group-heading" style="margin: 18px 0;">
                                            <span class="premium-section-kicker">Other Services</span>
                                            <h4 class="text-light-black" style="margin: 6px 0 0;">More services from this provider</h4>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-6 premium-service-grid-col">
                                    <div class="restaurent-product-list premium-service-card premium-service-card-grid premium-service-card-luxe">
                                        <div class="restaurent-product-detail">
                                            <div class="restaurent-product-left">
                                                <div class="restaurent-product-title-box premium-service-card-head premium-service-card-head-grid">
                                                    <div class="restaurent-product-box">
                                                        <div class="restaurent-product-title">
                                                            <h6 class="mb-2">
                                                                                        <a href="javascript:void(0)" class="text-light-black fw-600">
                                                                                            <?php echo $item->category_name; ?>
                                                                                        </a>
                                                                                    </h6>
                                                                                    <p class="font-item-prize-style">
                                                                                        &#8377; <?php echo number_format($item->service_price, 2); ?>
                                                                                    </p>
                                                                                </div>

                                                        <div class="restaurent-product-label">
                                                            <span class="rectangle-tag product-label-ovo-veg-tag premium-service-tag">Available</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="restaurent-product-caption-box premium-service-card-description premium-service-card-description-grid">
                                                    <span class="text-light-white premium-muted-copy">
                                                        <?php
                                                        if (!empty($item->description)) {
                                                                                    echo $item->description;
                                                                                } else {
                                                                                    echo "Professional service available";
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                        </div>
                                                <div class="premium-service-action premium-service-action-vertical">
                                                    <button type="button"
                                                            class="btn btn-danger premium-gradient-btn premium-gradient-btn-block js-book-service"
                                                            data-provider-id="<?php echo (int) $restaurent_detail[0]->restaurant_id; ?>"
                                                            data-provider-service-id="<?php echo !empty($item->id) ? (int) $item->id : 1; ?>"
                                                            data-category-id="<?php echo !empty($item->category_id) ? (int) $item->category_id : 1; ?>"
                                                            data-category-name="<?php echo htmlspecialchars((string) $item->category_name, ENT_QUOTES, 'UTF-8'); ?>"
                                                            data-service-price="<?php echo (float) $item->service_price; ?>">
                                                        Book Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                                                <?php } else { ?>
                                                    <div class="col-lg-12">
                                                        <div class="alert alert-warning">
                                                            No services added by this provider yet.
                                                        </div>
                                                    </div>
                                                <?php } ?>

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
                </div>
            </div>
        </section>
        <!-- restaurent meals -->

        <!-- restaurent about -->
        <section class="section-padding restaurent-about smoothscroll premium-about-section premium-provider-section" id="about">
            <div class="container premium-provider-container">
                <div class="row premium-about-grid premium-provider-grid">
                    <div class="col-md-6">
                        <div class="card premium-about-card premium-provider-card premium-provider-card-luxe" style="border:1px solid #eee; border-radius:10px;">
                            <div class="card-body premium-about-card-body">

                                <h3 class="text-light-black fw-700 title premium-provider-title" style="margin-bottom: 20px;">
                                    <?php echo ucwords($restaurent_detail[0]->restaurant_name); ?>
                                </h3>

                                <div class="mb-4 premium-info-block premium-provider-mini-card">
                                    <h4 class="premium-provider-subtitle" style="font-size:18px; font-weight:700; margin-bottom:15px; color:#222;">
                                        Provider Account Information
                                    </h4>

                                    <div class="premium-info-row premium-info-row-luxe" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Provider Name</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php echo !empty($restaurent_detail[0]->owner_name) ? ucwords($restaurent_detail[0]->owner_name) : 'Not Available'; ?>
                                        </div>
                                    </div>

                                    <div class="premium-info-row premium-info-row-luxe" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Phone Number</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php echo !empty($restaurent_detail[0]->contact_no) ? $restaurent_detail[0]->contact_no : 'Not Available'; ?>
                                        </div>
                                    </div>

                                    <div class="premium-info-row premium-info-row-luxe" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Email Address</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php echo !empty($restaurent_detail[0]->email) ? $restaurent_detail[0]->email : 'Not Available'; ?>
                                        </div>
                                    </div>

                                    <div class="premium-info-row premium-info-row-luxe" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Location</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php
                                            if (count($restaurent_address_detail) != 0) {
                                                echo $restaurent_address_detail[0]->area . ', ' . $restaurent_address_detail[0]->city . ', ' . $restaurent_address_detail[0]->state;
                                            } else {
                                                echo 'Not Available';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 premium-info-block premium-provider-mini-card">
                                    <h4 class="premium-provider-subtitle" style="font-size:18px; font-weight:700; margin-bottom:15px; color:#222;">
                                        Professional Details
                                    </h4>

                                    <div class="premium-info-row premium-info-row-luxe" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Primary Skill</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php echo !empty($restaurent_detail[0]->primary_skill) ? ucwords($restaurent_detail[0]->primary_skill) : 'Not Available'; ?>
                                        </div>
                                    </div>

                                    <div class="premium-info-row premium-info-row-luxe" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Experience</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php echo !empty($restaurent_detail[0]->experience) ? $restaurent_detail[0]->experience : 'Not Available'; ?>
                                        </div>
                                    </div>

                                    <div class="premium-info-row premium-info-row-luxe" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Starting Price</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php echo !empty($restaurent_detail[0]->starting_price) ? '₹ ' . $restaurent_detail[0]->starting_price : 'Not Available'; ?>
                                        </div>
                                    </div>

                                    <div class="premium-info-row" style="display:flex; padding:8px 0; border-bottom:1px solid #f1f1f1;">
                                        <div class="premium-provider-label" style="width:220px; font-weight:600; color:#333;">Languages</div>
                                        <div class="premium-provider-value" style="flex:1; color:#555;">
                                            <?php echo !empty($restaurent_detail[0]->languages) ? ucwords($restaurent_detail[0]->languages) : 'Not Available'; ?>
                                        </div>
                                    </div>

                                    <div class="premium-info-row premium-info-row-about premium-info-row-luxe" style="padding:8px 0;">
                                        <div class="premium-provider-label premium-provider-label-block" style="font-weight:600; color:#333; margin-bottom:8px;">About Me</div>
                                        <div class="premium-provider-value premium-provider-value-copy" style="color:#555; line-height:1.7;">
                                            <?php echo !empty($restaurent_detail[0]->about_me) ? nl2br(htmlspecialchars($restaurent_detail[0]->about_me)) : 'Not Available'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="restaurent-schdule premium-schedule-wrap premium-provider-timing-wrap">
                            <div class="card premium-schedule-card premium-provider-card premium-provider-timing-card premium-provider-card-luxe">
                                <div class="card-header text-light-white fw-700 fs-16 premium-schedule-header premium-provider-timing-header">Available Service Timing</div>
                                <div class="card-body premium-schedule-body premium-provider-timing-body">
                                    <?php if (!empty($schedule_details)) { ?>
                                        <?php foreach ($schedule_details as $single) { ?>
                                            <div class="schedule-box premium-schedule-row premium-provider-timing-row premium-info-row-luxe" style="padding:8px 0; border-bottom:1px solid #eee;">
                                                <div class="day text-light-black premium-provider-value" style="font-weight:600;">
                                                    <?php echo $single->day_name; ?>
                                                </div>
                                                <div class="time text-light-black premium-provider-label premium-provider-timing-value">
                                                    <?php echo date("h:i A", strtotime($single->open_time)); ?>
                                                    to
                                                    <?php echo date("h:i A", strtotime($single->close_time)); ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="schedule-box premium-provider-empty">
                                            <div class="time text-light-black premium-provider-empty-text">No timing available.</div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- restaurent about -->

        <!-- restaurent reviews -->
        <section class="section-padding restaurent-review smoothscroll premium-review-section" id="review">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left premium-review-header">
                            <h3 class="text-light-black header-title title">Reviews for <?php echo ucwords($restaurent_detail[0]->restaurant_name); ?></h3>
                        </div>
                        <div class="restaurent-rating mb-xl-20 premium-rating-summary">
                            <div class="star">
                                <?php
                                $cnt_star = round($star_rating[0]->rate_star);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $cnt_star) {
                                        ?>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="text-dark-white fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <span class="fs-12 text-light-black"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                        </div>

                        <div class="u-line"></div>
                    </div>

                    <div class="col-md-12 premium-review-list <?php
                    if (count($review_rating) >= 3) {
                        echo "review-scroll";
                    }
                    ?>">
                        <?php
                        foreach ($review_rating as $single) {
                            ?>
                            <div class="review-box premium-review-card">
                                <div class="review-user">
                                    <div class="review-user-img">
                                        <?php
                                        if ($single->profile != "") {
                                            ?>
                                            <img src="<?php echo base_url() . $single->profile; ?>" class="rounded-circle review-user-img-icon" alt="userimg">
                                            <?php
                                        } else {
                                            ?>
                                            <img class="round" height="30" width="30" avatar="<?php echo substr($single->name, 0, 1); ?>">
                                            <?php
                                        }
                                        ?>

                                        <div class="reviewer-name">
                                            <p class="fs-17 text-light-black fw-600 font-size-27"><?php echo ucwords($single->name); ?></p>
                                        </div>
                                    </div>

                                    <div class="review-date">
                                        <span class="text-light-white"><?php echo date("M d,Y", strtotime($single->date)); ?></span>
                                    </div>
                                </div>

                                <div class="ratings">
                                    <?php
                                    $cnt_star = round($single->rating);
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $cnt_star) {
                                            ?>
                                            <span class="text-yellow fs-16">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="text-dark-white fs-16">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <p class="text-light-black"><?php echo ucfirst($single->review); ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-12">
                        <div class="review-img premium-review-cta premium-review-cta-final">
                            <img src="<?php echo base_url(); ?>assets/img/review-footer.png" class="img-fluid" alt="#">
                            <div class="review-text premium-review-form-wrap">
                                <h2 class="text-light-white mb-2 fw-600">Be one of the first to review</h2>
                                <p class="text-light-white">Order now and write a review to give others the inside scoop.</p>

                                <?php
                                if ($this->session->userdata("user_username")) {
                                    $review_services = !empty($eligible_review_services) ? $eligible_review_services : array();
                                    $can_review = false;
                                    $selected_review_service = null;

                                    foreach ($review_services as $service_option) {
                                        if ((int)$service_option->already_reviewed === 0) {
                                            $can_review = true;
                                            $selected_review_service = $service_option;
                                            break;
                                        }
                                    }

                                    if ($selected_review_service === null && !empty($review_services)) {
                                        $selected_review_service = $review_services[0];
                                    }

                                    if (empty($review_services)) {
                                        ?>
                                        <p class="premium-review-message is-visible is-error" id="review_access_message">You can only review after completing a service.</p>
                                        <?php
                                    } else if ($can_review) {
                                    ?>
                                    <div class="rating plugin-rating premium-review-rating" id="premiumReviewRating" title="Give Rating On Restaurant" aria-label="Give rating">
                                        <button type="button" class="premium-review-star rating-star-1" data-rating="1" aria-label="Rate 1 star">
                                            <i class="fas fa-star"></i>
                                        </button>
                                        <button type="button" class="premium-review-star rating-star-2" data-rating="2" aria-label="Rate 2 stars">
                                            <i class="fas fa-star"></i>
                                        </button>
                                        <button type="button" class="premium-review-star rating-star-3" data-rating="3" aria-label="Rate 3 stars">
                                            <i class="fas fa-star"></i>
                                        </button>
                                        <button type="button" class="premium-review-star rating-star-4" data-rating="4" aria-label="Rate 4 stars">
                                            <i class="fas fa-star"></i>
                                        </button>
                                        <button type="button" class="premium-review-star rating-star-5" data-rating="5" aria-label="Rate 5 stars">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </div>

                                    <div class="premium-review-form-fields" id="premiumReviewForm" data-provider-id="<?php echo $restaurent_detail[0]->restaurant_id; ?>">
                                        <?php $rendered_review_services = array(); ?>
                                        <select class="form-control premium-review-select" id="review_service_selector">
                                            <?php foreach ($review_services as $service_option) { ?>
                                                <?php
                                                $service_key = $service_option->provider_service_id . '_' . $service_option->category_id;
                                                if (isset($rendered_review_services[$service_key])) {
                                                    continue;
                                                }
                                                $rendered_review_services[$service_key] = true;
                                                ?>
                                                <option
                                                    value="<?php echo $service_option->provider_service_id; ?>"
                                                    data-booking-id="<?php echo $service_option->booking_id; ?>"
                                                    data-provider-id="<?php echo $service_option->provider_id; ?>"
                                                    data-provider-service-id="<?php echo $service_option->provider_service_id; ?>"
                                                    data-category-id="<?php echo $service_option->category_id; ?>"
                                                    data-service-name="<?php echo htmlspecialchars($service_option->service_name, ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-already-reviewed="<?php echo (int)$service_option->already_reviewed; ?>"
                                                    <?php echo ($selected_review_service && (int)$selected_review_service->provider_service_id === (int)$service_option->provider_service_id) ? 'selected' : ''; ?>
                                                >
                                                    <?php echo $service_option->service_name; ?><?php echo ((int)$service_option->already_reviewed === 1) ? ' - Already reviewed' : ' - Completed service'; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input type="text" class="form-control premium-review-input" placeholder="<?php echo ucfirst($user_detail[0]->name); ?>" readonly="">
                                        <textarea class="visitor_review form-control premium-review-textarea" rows="8" id="review_visitor" placeholder="Please Enter Your Review"></textarea>
                                        <p class="text-light-white premium-review-message" id="review_message"></p>
                                        <button type="button" class="btn-reorder premium-review-submit" id="review_submit_button" onclick="insert_review('<?php echo $restaurent_detail[0]->restaurant_id; ?>');">Give Review</button>
                                    </div>
                                    <?php
                                    } else {
                                        ?>
                                        <p class="premium-review-message is-visible is-error" id="review_access_message">You already reviewed all services</p>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <p class="text-light-white premium-review-login-text">For giving review please <a href ="<?php echo base_url("Log-in"); ?>">LogIn/Sign Up</a> first</p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- restaurent reviews -->

        <!-- footer -->
        <?php
        $this->load->view("footer");
        ?>

        


        <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="cartmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close-premium-modal" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>

                    <div class="premium-login-modal-body">
                        <div class="premium-login-icon-wrap premium-login-symbol">
                            🔒
                        </div>
                        <h3 class="premium-login-title">
                            <span>Login</span> Required
                        </h3>

                        <p class="premium-login-subtitle">
                            You need an account to book this service. Log in to continue your booking securely
                            or create a new account in just a few seconds.
                        </p>

                        <div class="premium-login-feature-box">
                            <ul>
                                <li><i class="fas fa-check-circle"></i> Continue your booking without losing selected service details</li>
                                <li><i class="fas fa-check-circle"></i> Access trusted providers, secure booking and quick support</li>
                                <li><i class="fas fa-check-circle"></i> Manage your bookings, reviews and account in one place</li>
                            </ul>
                        </div>

                        <div class="premium-login-actions">
                            <button type="button" class="btn premium-btn-secondary" data-dismiss="modal">
                                Close
                            </button>

                            <a href="<?php echo base_url('Log-in'); ?>" class="premium-btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Go To Login
                            </a>
                        </div>

                        <p class="premium-login-bottom-text">
                            Safe, quick and designed for a smooth booking experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="wishlistmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="text-center wishlist-model-box">
                        <h3>Ooops! You Are Not Log In. </h3>
                    </div>
                    <div class="mb-20">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/login.png" class="log-out-user">
                        </center>
                    </div>
                    <div class="wishlist-model-msg">
                        <h6 class="text-center">If you want to add your favourite restaurant or food then, log in to your existing account or sign up.</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-product-add"><a href="<?php echo base_url("Log-in"); ?>" class="text-white"><img src="<?php echo base_url(); ?>assets/img/block-user.png" class="wishlist-log-in-icon"> &nbsp;Go To Log In</a></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade premium-booking-modal" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content premium-booking-content">
                    <form method="post" action="<?php echo base_url('submit-booking'); ?>" id="bookingForm">
                        <div class="modal-header premium-booking-header">
                            <h5 class="modal-title" id="bookingModalLabel">Book Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>

                        <div class="modal-body premium-booking-body">
                            <input type="hidden" name="provider_id" id="modal_provider_id">
                            <input type="hidden" name="provider_service_id" id="modal_provider_service_id">
                            <input type="hidden" name="category_id" id="modal_category_id">
                            <input type="hidden" name="payment_method" id="booking_payment_method" value="cod">
                            <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                            <input type="hidden" name="razorpay_signature" id="razorpay_signature">

                            <div class="form-group premium-form-group premium-readonly-group">
                                <label>Service Name</label>
                                <input type="text" id="modal_service_name" class="form-control premium-input premium-readonly-input" readonly>
                            </div>

                            <div class="alert alert-danger validation-summary" id="validation_summary">
                                Please correct the highlighted fields.
                            </div>

                            <div class="form-group premium-form-group premium-readonly-group">
                                <label>Service Price</label>
                                <input type="text" id="modal_service_price" class="form-control premium-input premium-readonly-input" readonly>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>First Name</label>
                                <div class="position-relative">
                                    <input type="text" name="customer_first_name" id="customer_first_name" class="form-control premium-input" maxlength="50" required>
                                    <span class="valid-tick" id="tick_customer_first_name">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_first_name"></small>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>Last Name</label>
                                <div class="position-relative">
                                    <input type="text" name="customer_last_name" id="customer_last_name" class="form-control premium-input" maxlength="50" required>
                                    <span class="valid-tick" id="tick_customer_last_name">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_last_name"></small>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>Phone Number</label>
                                <div class="position-relative">
                                    <input type="text" name="customer_phone" id="customer_phone" class="form-control premium-input" maxlength="10" required>
                                    <span class="valid-tick" id="tick_customer_phone">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_phone"></small>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>Email</label>
                                <div class="position-relative">
                                    <input type="email" name="customer_email" id="customer_email" class="form-control premium-input" maxlength="100" required>
                                    <span class="valid-tick" id="tick_customer_email">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_email"></small>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>Address</label>
                                <div class="position-relative">
                                    <textarea name="customer_address" id="customer_address" class="form-control premium-input" maxlength="300" required></textarea>
                                    <span class="valid-tick textarea-tick" id="tick_customer_address">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_address"></small>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>Description</label>
                                <div class="position-relative">
                                    <textarea name="customer_description" id="customer_description" class="form-control premium-input" placeholder="Write your work details" maxlength="500" required></textarea>
                                    <span class="valid-tick textarea-tick" id="tick_customer_description">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_description"></small>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>Preferred Date</label>
                                <div class="position-relative">
                                    <input type="date" name="service_date" id="service_date" class="form-control premium-input" min="<?php echo date('Y-m-d'); ?>" required>
                                    <span class="valid-tick" id="tick_service_date">✔</span>
                                </div>
                                <small class="text-danger" id="error_service_date"></small>
                            </div>

                            <div class="form-group premium-form-group">
                                <label>Preferred Time</label>
                                <div class="position-relative">
                                    <input type="time" name="service_time" id="service_time" class="form-control premium-input" required>
                                    <span class="valid-tick" id="tick_service_time">✔</span>
                                </div>
                                <small class="text-danger" id="error_service_time"></small>
                            </div>
                        </div>

                        <div class="modal-footer premium-booking-footer">
                            <button type="submit" class="btn btn-danger premium-gradient-btn">Confirm Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="paymentChoiceModal" tabindex="-1" role="dialog" aria-labelledby="paymentChoiceLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content premium-booking-content">
                    <div class="modal-header premium-booking-header">
                        <h5 class="modal-title" id="paymentChoiceLabel">Choose Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body premium-booking-body">
                        <p class="text-light-black" style="font-weight:700;margin-bottom:18px;">How would you like to pay for this booking?</p>
                        <div class="row">
                            <div class="col-md-6 m-b-15">
                                <button type="button" class="btn btn-danger premium-gradient-btn w-100" id="payCodBtn">Cash On Delivery</button>
                            </div>
                            <div class="col-md-6 m-b-15">
                                <button type="button" class="btn btn-danger premium-gradient-btn w-100" id="payOnlineBtn">Online</button>
                            </div>
                        </div>
                        <small class="text-danger" id="payment_choice_error"></small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wishlist Like & Dislike Message Box Code START -->
        <div class="add-wishlist-msg ">
            <p></p>
        </div>

        <?php
        if ($restaurent_detail[0]->service_status == "closed") {
            ?>
            <!-- <div class="restaurant-closed-msg">
                <div class="row">
                    <div class="col-md-2 padding-right-none padding-left-none">
                    <img src="<?php echo base_url(); ?>assets/img/res-closed.png">
                    </div>
                    <div class="col-md-10 padding-right-none ">
                        <p>Restaurant is Currently Closed</p>
                        <p><b>Check tommorow for place order.</b></p>
                    </div>
                </div>
            </div> -->
            <?php
        }
        ?>
        <!-- Wishlist Like & Dislike Message Box Code END -->

        <div class="already-added" id="already-added">
            <h5 class="text-light-black">Items already in cart </h5>
            <p>Your cart contains items from other restaurant. Would you like to reset your<br> cart for adding items from this restaurant?</p>
            <div class="row already-added-button-row">
                <div class="offset-md-1 col-md-5 btn-no-cart" id="btn-no-cart" onclick="remove_cart_item('no')">
                    <button>No</button>
                </div>
                <div class="offset-md-1 col-md-5 btn-yes-cart" id="btn-yes-cart" onclick="remove_cart_item('yes', '<?php echo $this->session->userdata('user_username'); ?>')">
                    <button>Yes, Refresh Cart</button>
                </div>
            </div>
        </div>

        <!-- Sticky Book Button -->
<div class="sticky-book-btn premium-sticky-book">
    <button class="premium-gradient-btn" onclick="scrollToServices()">
        Book Service
    </button>
</div>


        <?php
        $this->load->view("footerscript");
        ?>

        

        <script src="<?php echo base_url() ?>assets/js/munchbox.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/less.min.js" type="text/javascript"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        
        <script>
    $(document).ready(function() {
        $('a[href*=#]').bind('click', function(e) {
            e.preventDefault();

            var target = $(this).attr("href");

            $('html, body').stop().animate({
                scrollTop: $(target).offset().top
            }, 600, function() {
                location.hash = target;
            });

            return false;
        });
    });

    $(window).scroll(function() {
        var scrollDistance = $(window).scrollTop();
        $('.fooditem-section').each(function(i) {
            if ($(this).position().top <= scrollDistance) {
                $('.sidebar-card .user-menu ul li a.active-cuisin').removeClass('active-cuisin');
                $('.sidebar-card .user-menu ul li a').eq(i).addClass('active-cuisin');
            }
        });
    }).scroll();

    function resetBookingValidationUI()
    {
        var summary = document.getElementById('validation_summary');
        if (summary) summary.style.display = 'none';

        var fields = document.querySelectorAll('.premium-input');
        fields.forEach(function(field){
            field.classList.remove('input-valid');
            field.classList.remove('input-invalid');
        });

        var ticks = document.querySelectorAll('.valid-tick');
        ticks.forEach(function(tick){
            tick.style.display = 'none';
        });

        var errors = document.querySelectorAll('[id^="error_"]');
        errors.forEach(function(error){
            error.innerText = '';
        });
    }

    window.handleBookingClick = function(provider_id, provider_service_id, category_id, category_name, service_price)
    {
        console.log('CLICK WORKING');

        provider_id = provider_id ? String(provider_id).trim() : '';
        provider_service_id = provider_service_id ? String(provider_service_id).trim() : '';
        category_id = category_id ? String(category_id).trim() : '';
        category_name = category_name ? String(category_name).trim() : '';
        service_price = service_price ? String(service_price).trim() : '';

        if (!provider_id || provider_id === '0') {
            alert('Provider ID missing');
            return;
        }

        if (!provider_service_id || provider_service_id === '0') {
            console.warn('Service ID missing, using fallback');
            provider_service_id = '1';
        }

        if (!category_id || category_id === '0') {
            console.warn('Category ID missing, using default');
            category_id = '1';
        }

        console.log('BOOK CLICK:', provider_id, provider_service_id, category_id);

        var isLoggedIn = <?php echo $this->session->userdata("user_username") ? 'true' : 'false'; ?>;

        if (!isLoggedIn) {
            sessionStorage.setItem('pending_booking_provider_id', provider_id);
            sessionStorage.setItem('pending_booking_provider_service_id', provider_service_id);
            sessionStorage.setItem('pending_booking_category_id', category_id);
            sessionStorage.setItem('pending_booking_category_name', category_name);
            sessionStorage.setItem('pending_booking_service_price', service_price);

            fetch("<?php echo base_url('set-booking-redirect'); ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "redirect_url=" + encodeURIComponent(window.location.href)
            });

            $('#cartmodal').modal('show');
            return;
        }

        window.openBookingModal(provider_id, provider_service_id, category_id, category_name, service_price);
    }

    window.openBookingModal = function(provider_id, provider_service_id, category_id, category_name, service_price)
    {
        $('#modal_provider_id').val(provider_id);
        $('#modal_provider_service_id').val(provider_service_id);
        $('#modal_category_id').val(category_id);
        $('#modal_service_name').val(category_name);
        $('#modal_service_price').val('₹ ' + service_price);

        $('#booking_payment_method').val('cod');
        $('#razorpay_order_id').val('');
        $('#razorpay_payment_id').val('');
        $('#razorpay_signature').val('');
        $('#bookingForm').removeAttr('data-payment-ready');

        resetBookingValidationUI();
        $('#bookingModal').modal('show');
    }

    function showError(id, message) {
        var errorEl = document.getElementById('error_' + id);
        var inputEl = document.getElementById(id);
        var tickEl = document.getElementById('tick_' + id);

        if (errorEl) errorEl.innerText = message;
        if (inputEl) {
            inputEl.classList.remove('input-valid');
            inputEl.classList.add('input-invalid');
        }
        if (tickEl) tickEl.style.display = 'none';
    }

    function showValid(id) {
        var errorEl = document.getElementById('error_' + id);
        var inputEl = document.getElementById(id);
        var tickEl = document.getElementById('tick_' + id);

        if (errorEl) errorEl.innerText = '';
        if (inputEl) {
            inputEl.classList.remove('input-invalid');
            inputEl.classList.add('input-valid');
        }
        if (tickEl) tickEl.style.display = 'inline';
    }

    function clearFieldState(id) {
        var errorEl = document.getElementById('error_' + id);
        var inputEl = document.getElementById(id);
        var tickEl = document.getElementById('tick_' + id);

        if (errorEl) errorEl.innerText = '';
        if (inputEl) {
            inputEl.classList.remove('input-invalid');
            inputEl.classList.remove('input-valid');
        }
        if (tickEl) tickEl.style.display = 'none';
    }

    function debounce(fn, delay) {
        var timer;
        return function() {
            var context = this;
            var args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function() {
                fn.apply(context, args);
            }, delay);
        };
    }

    window.selectedRating = 0;

    function goToReviewPage() {
        window.location.href = "<?= base_url('Restaurant-Details/' . $restaurent_detail[0]->restaurant_id) ?>#review";
    }

    function goToServicesPage() {
        window.location.href = "<?= base_url('User-Order') ?>";
    }

    window.addEventListener("load", function () {
        if (window.location.hash === "#review") {
            const reviewSection = document.getElementById("review");
            if (reviewSection) {
                setTimeout(() => {
                    reviewSection.scrollIntoView({
                        behavior: "smooth",
                        block: "center"
                    });
                }, 300);
            }
        }
    });

    function setReviewMessage(message, type) {
        var messageEl = document.getElementById('review_message');
        if (!messageEl) {
            return;
        }

        messageEl.textContent = message || '';
        messageEl.classList.remove('is-visible', 'is-error', 'is-success');

        if (message) {
            messageEl.classList.add('is-visible');
            messageEl.classList.add(type === 'success' ? 'is-success' : 'is-error');
        }
    }

    function renderReviewStars(rating) {
        var stars = document.querySelectorAll('.premium-review-star');
        stars.forEach(function(star) {
            var starValue = parseInt(star.getAttribute('data-rating'), 10);
            star.classList.toggle('is-active', starValue <= rating);
            star.classList.toggle('text-yellow', starValue <= rating);
        });
    }

    window.ratingstar = function(star) {
        window.selectedRating = star;

        document.querySelectorAll('.premium-review-star').forEach(function(el, index) {
            if (index < star) {
                el.classList.add('is-active');
                el.classList.add('text-yellow');
            } else {
                el.classList.remove('is-active');
                el.classList.remove('text-yellow');
            }
        });
    };

    function getSelectedReviewService() {
        var selector = document.getElementById('review_service_selector');
        if (!selector || !selector.options.length) {
            return null;
        }

        var selectedOption = selector.options[selector.selectedIndex];

        return {
            bookingId: selectedOption.getAttribute('data-booking-id'),
            providerId: selectedOption.getAttribute('data-provider-id'),
            providerServiceId: selectedOption.getAttribute('data-provider-service-id'),
            categoryId: selectedOption.getAttribute('data-category-id'),
            serviceName: selectedOption.getAttribute('data-service-name'),
            alreadyReviewed: parseInt(selectedOption.getAttribute('data-already-reviewed'), 10) === 1
        };
    }

    function updateReviewAccessState() {
        var submitButton = document.getElementById('review_submit_button');
        var selectedService = getSelectedReviewService();

        if (!submitButton || !selectedService) {
            return;
        }

        if (selectedService.alreadyReviewed) {
            submitButton.disabled = true;
            setReviewMessage('You have already reviewed this service', 'error');
        } else {
            submitButton.disabled = false;
            setReviewMessage('', '');
        }
    }

    function appendReviewToList(reviewText, rating) {
        var reviewList = document.querySelector('.premium-review-list');
        if (!reviewList) {
            return;
        }

        if (reviewList.querySelector('.premium-empty-review-state')) {
            reviewList.innerHTML = '';
        }

        var reviewCard = document.createElement('div');
        reviewCard.className = 'review-box premium-review-card';

        var reviewStars = '';
        for (var i = 1; i <= 5; i++) {
            reviewStars += '<span class="' + (i <= rating ? 'text-yellow' : 'text-dark-white') + ' fs-16"><i class="fas fa-star"></i></span>';
        }

        reviewCard.innerHTML =
            '<div class="review-user">' +
                '<div class="review-user-img">' +
                    '<img class="round" height="30" width="30" avatar="<?php echo substr(isset($user_detail[0]->name) ? $user_detail[0]->name : "U", 0, 1); ?>">' +
                    '<div class="reviewer-name">' +
                        '<p class="fs-17 text-light-black fw-600 font-size-27"><?php echo ucwords(isset($user_detail[0]->name) ? $user_detail[0]->name : "User"); ?></p>' +
                    '</div>' +
                '</div>' +
                '<div class="review-date">' +
                    '<span class="text-light-white"><?php echo date("M d,Y"); ?></span>' +
                '</div>' +
            '</div>' +
            '<div class="ratings">' + reviewStars + '</div>' +
            '<p class="text-light-black premium-review-body"></p>';

        reviewCard.querySelector('.premium-review-body').textContent = reviewText.charAt(0).toUpperCase() + reviewText.slice(1);
        reviewList.insertAdjacentElement('afterbegin', reviewCard);
    }

    window.insert_review = function(restaurant_id) {
        let review = document.getElementById('review_visitor').value.trim();
        let serviceSelect = document.querySelector('select');
        let service_id = serviceSelect ? serviceSelect.value : '';
        let selectedService = getSelectedReviewService();
        let submitButton = document.getElementById('review_submit_button');

        if (!window.selectedRating || window.selectedRating === 0) {
            document.getElementById('review_message').innerText = 'Please select rating';
            return;
        }

        if (!service_id || !selectedService) {
            document.getElementById('review_message').innerText = 'Please select service';
            return;
        }

        if (review === '') {
            document.getElementById('review_message').innerText = 'Please enter review';
            return;
        }

        if (selectedService.alreadyReviewed) {
            document.getElementById('review_message').innerText = 'You have already reviewed this service';
            if (submitButton) {
                submitButton.disabled = true;
            }
            return;
        }

        document.getElementById('review_message').innerText = '';

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.textContent = 'Submitting...';
        }

        fetch('<?php echo base_url("Backend/insert_review"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:
                'rating=' + encodeURIComponent(window.selectedRating) +
                '&review_text=' + encodeURIComponent(review) +
                '&provider_service_id=' + encodeURIComponent(service_id) +
                '&booking_id=' + encodeURIComponent(selectedService.bookingId) +
                '&category_id=' + encodeURIComponent(selectedService.categoryId) +
                '&provider_id=' + encodeURIComponent(restaurant_id || selectedService.providerId)
        })
        .then(function(res) {
            return res.json();
        })
        .then(function(data) {
            if (!data || data.status !== 'success') {
                document.getElementById('review_message').innerText = data && data.message ? data.message : 'Please complete all review fields correctly.';
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Give Review';
                }
                return;
            }

            appendReviewToList(review, window.selectedRating);
            document.getElementById('review_visitor').value = '';
            window.selectedRating = 0;
            renderReviewStars(0);

            if (serviceSelect) {
                serviceSelect.options[serviceSelect.selectedIndex].setAttribute('data-already-reviewed', '1');
                serviceSelect.options[serviceSelect.selectedIndex].text = selectedService.serviceName + ' - Already reviewed';
            }

            document.getElementById('review_message').innerText = data.message || 'Review submitted successfully.';

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Give Review';
            }
        })
        .catch(function() {
            document.getElementById('review_message').innerText = 'Please complete all review fields correctly.';
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = 'Give Review';
            }
        });
    };

    function validateFirstName() {
        var id = 'customer_first_name';
        var value = document.getElementById(id).value.trim();
        var regex = /^[A-Za-z ]+$/;

        if (value === '') return showError(id, 'First name is required'), false;
        if (value.length < 2) return showError(id, 'Minimum 2 characters required'), false;
        if (!regex.test(value)) return showError(id, 'Only letters allowed'), false;

        showValid(id);
        return true;
    }

    function validateLastName() {
        var id = 'customer_last_name';
        var value = document.getElementById(id).value.trim();
        var regex = /^[A-Za-z ]+$/;

        if (value === '') return showError(id, 'Last name is required'), false;
        if (value.length < 2) return showError(id, 'Minimum 2 characters required'), false;
        if (!regex.test(value)) return showError(id, 'Only letters allowed'), false;

        showValid(id);
        return true;
    }

    function validatePhone() {
        var id = 'customer_phone';
        var value = document.getElementById(id).value.trim();
        var regex = /^[0-9]{10}$/;

        if (value === '') return showError(id, 'Phone number is required'), false;
        if (!regex.test(value)) return showError(id, 'Enter valid 10 digit phone number'), false;

        showValid(id);
        return true;
    }

    function validateEmail() {
        var id = 'customer_email';
        var value = document.getElementById(id).value.trim();
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (value === '') return showError(id, 'Email is required'), false;
        if (!regex.test(value)) return showError(id, 'Enter valid email address'), false;

        showValid(id);
        return true;
    }

    function validateAddress() {
        var id = 'customer_address';
        var value = document.getElementById(id).value.trim();

        if (value === '') return showError(id, 'Address is required'), false;
        if (value.length < 10) return showError(id, 'Address must be at least 10 characters'), false;

        showValid(id);
        return true;
    }

    function validateDescription() {
        var id = 'customer_description';
        var value = document.getElementById(id).value.trim();

        if (value === '') return showError(id, 'Description is required'), false;
        if (value.length < 10) return showError(id, 'Description must be at least 10 characters'), false;

        showValid(id);
        return true;
    }

    function validateServiceDate() {
        var id = 'service_date';
        var value = document.getElementById(id).value;

        if (value === '') return showError(id, 'Date is required'), false;

        var today = new Date();
        today.setHours(0,0,0,0);

        var selectedDate = new Date(value);
        selectedDate.setHours(0,0,0,0);

        if (selectedDate < today) return showError(id, 'Past date is not allowed'), false;

        showValid(id);
        return true;
    }

    function validateServiceTime() {
        var id = 'service_time';
        var value = document.getElementById(id).value;

        if (value === '') return showError(id, 'Time is required'), false;

        showValid(id);
        return true;
    }

    function validateBookingForm() {
        var valid = true;

        if (!validateFirstName()) valid = false;
        if (!validateLastName()) valid = false;
        if (!validatePhone()) valid = false;
        if (!validateEmail()) valid = false;
        if (!validateAddress()) valid = false;
        if (!validateDescription()) valid = false;
        if (!validateServiceDate()) valid = false;
        if (!validateServiceTime()) valid = false;

        var summary = document.getElementById('validation_summary');
        if (summary) summary.style.display = valid ? 'none' : 'block';

        return valid;
    }

    function setPaymentChoiceError(message) {
        var errorEl = document.getElementById('payment_choice_error');
        if (errorEl) {
            errorEl.innerText = message || '';
        }
    }

    function submitBookingWithMethod(method) {
        var bookingForm = document.getElementById('bookingForm');
        var paymentMethod = document.getElementById('booking_payment_method');

        if (!bookingForm || !paymentMethod) {
            return;
        }

        paymentMethod.value = method;
        bookingForm.setAttribute('data-payment-ready', '1');
        bookingForm.submit();
    }

    function startRazorpayBookingPayment() {
        var bookingForm = document.getElementById('bookingForm');
        var onlineButton = document.getElementById('payOnlineBtn');

        if (!bookingForm) {
            return;
        }

        setPaymentChoiceError('');

        if (typeof Razorpay === 'undefined') {
            setPaymentChoiceError('Online payment is not ready. Please try again.');
            return;
        }

        if (onlineButton) {
            onlineButton.disabled = true;
            onlineButton.innerText = 'Opening...';
        }

        var body = new URLSearchParams();
        body.append('provider_id', document.getElementById('modal_provider_id').value);
        body.append('provider_service_id', document.getElementById('modal_provider_service_id').value);
        body.append('category_id', document.getElementById('modal_category_id').value);

        document.getElementById('razorpay_order_id').value = '';
        document.getElementById('razorpay_payment_id').value = '';
        document.getElementById('razorpay_signature').value = '';
        bookingForm.removeAttribute('data-payment-ready');

        fetch("<?php echo base_url('create-razorpay-booking-order'); ?>", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: body.toString()
        })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (!data || data.status !== true) {
                    throw new Error(data && data.message ? data.message : 'Unable to start online payment.');
                }

                var options = {
                    key: data.key,
                    amount: data.amount,
                    currency: data.currency || 'INR',
                    name: 'TaskRabbit',
                    description: document.getElementById('modal_service_name').value || 'Service Booking',
                    order_id: data.order_id,
                    prefill: {
                        name: (document.getElementById('customer_first_name').value + ' ' + document.getElementById('customer_last_name').value).trim(),
                        email: document.getElementById('customer_email').value,
                        contact: document.getElementById('customer_phone').value
                    },
                    handler: function(response) {
                        document.getElementById('razorpay_order_id').value = response.razorpay_order_id || data.order_id;
                        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id || '';
                        document.getElementById('razorpay_signature').value = response.razorpay_signature || '';
                        submitBookingWithMethod('online');
                    },
                    modal: {
                        ondismiss: function() {
                            document.getElementById('razorpay_order_id').value = '';
                            document.getElementById('razorpay_payment_id').value = '';
                            document.getElementById('razorpay_signature').value = '';
                            bookingForm.removeAttribute('data-payment-ready');
                            setPaymentChoiceError('Payment cancelled. Booking was not created.');
                            if (onlineButton) {
                                onlineButton.disabled = false;
                                onlineButton.innerText = 'Online';
                            }
                        }
                    },
                    theme: {
                        color: '#ff4f58'
                    }
                };

                var razorpay = new Razorpay(options);
                razorpay.on('payment.failed', function () {
                    document.getElementById('razorpay_order_id').value = '';
                    document.getElementById('razorpay_payment_id').value = '';
                    document.getElementById('razorpay_signature').value = '';
                    bookingForm.removeAttribute('data-payment-ready');
                    setPaymentChoiceError('Payment failed. Booking was not created.');
                    if (onlineButton) {
                        onlineButton.disabled = false;
                        onlineButton.innerText = 'Online';
                    }
                });
                razorpay.open();
            })
            .catch(function(error) {
                setPaymentChoiceError(error.message || 'Unable to start online payment.');
                if (onlineButton) {
                    onlineButton.disabled = false;
                    onlineButton.innerText = 'Online';
                }
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.js-book-service').forEach(function(button) {
            button.addEventListener('click', function () {
                window.handleBookingClick(
                    this.getAttribute('data-provider-id'),
                    this.getAttribute('data-provider-service-id'),
                    this.getAttribute('data-category-id'),
                    this.getAttribute('data-category-name'),
                    this.getAttribute('data-service-price')
                );
            });
        });

        var bookingForm = document.getElementById('bookingForm');
        var payCodBtn = document.getElementById('payCodBtn');
        var payOnlineBtn = document.getElementById('payOnlineBtn');
        var reviewField = document.getElementById('review_visitor');
        var reviewRating = document.getElementById('premiumReviewRating');
        var reviewSelector = document.getElementById('review_service_selector');

        var debouncedFirstName = debounce(validateFirstName, 300);
        var debouncedLastName = debounce(validateLastName, 300);
        var debouncedPhone = debounce(validatePhone, 300);
        var debouncedEmail = debounce(validateEmail, 300);
        var debouncedAddress = debounce(validateAddress, 300);
        var debouncedDescription = debounce(validateDescription, 300);

        var firstName = document.getElementById('customer_first_name');
        var lastName = document.getElementById('customer_last_name');
        var phone = document.getElementById('customer_phone');
        var email = document.getElementById('customer_email');
        var address = document.getElementById('customer_address');
        var description = document.getElementById('customer_description');
        var serviceDate = document.getElementById('service_date');
        var serviceTime = document.getElementById('service_time');

        if (firstName) {
            firstName.addEventListener('input', function(){
                if (this.value.trim() === '') clearFieldState('customer_first_name');
                else debouncedFirstName();
            });
            firstName.addEventListener('blur', validateFirstName);
        }

        if (lastName) {
            lastName.addEventListener('input', function(){
                if (this.value.trim() === '') clearFieldState('customer_last_name');
                else debouncedLastName();
            });
            lastName.addEventListener('blur', validateLastName);
        }

        if (phone) {
            phone.addEventListener('input', function(){
                this.value = this.value.replace(/\D/g, '');
                if (this.value.trim() === '') clearFieldState('customer_phone');
                else debouncedPhone();
            });
            phone.addEventListener('blur', validatePhone);
        }

        if (email) {
            email.addEventListener('input', function(){
                if (this.value.trim() === '') clearFieldState('customer_email');
                else debouncedEmail();
            });
            email.addEventListener('blur', validateEmail);
        }

        if (address) {
            address.addEventListener('input', function(){
                if (this.value.trim() === '') clearFieldState('customer_address');
                else debouncedAddress();
            });
            address.addEventListener('blur', validateAddress);
        }

        if (description) {
            description.addEventListener('input', function(){
                if (this.value.trim() === '') clearFieldState('customer_description');
                else debouncedDescription();
            });
            description.addEventListener('blur', validateDescription);
        }

        if (serviceDate) {
            serviceDate.addEventListener('change', validateServiceDate);
            serviceDate.addEventListener('blur', validateServiceDate);
        }

        if (serviceTime) {
            serviceTime.addEventListener('change', validateServiceTime);
            serviceTime.addEventListener('blur', validateServiceTime);
        }

        if (bookingForm) {
            bookingForm.addEventListener('submit', function(e) {
                if (!validateBookingForm()) {
                    e.preventDefault();
                    return;
                }

                if (bookingForm.getAttribute('data-payment-ready') !== '1') {
                    e.preventDefault();
                    setPaymentChoiceError('');
                    $('#paymentChoiceModal').modal('show');
                }
            });
        }

        if (payCodBtn) {
            payCodBtn.addEventListener('click', function() {
                submitBookingWithMethod('cod');
            });
        }

        if (payOnlineBtn) {
            payOnlineBtn.addEventListener('click', startRazorpayBookingPayment);
        }

        if (reviewRating) {
            var reviewStars = reviewRating.querySelectorAll('.premium-review-star');

            reviewStars.forEach(function(star) {
                star.addEventListener('mouseenter', function() {
                    ratingstar(parseInt(this.getAttribute('data-rating'), 10));
                });

                star.addEventListener('click', function() {
                    window.selectedRating = parseInt(this.getAttribute('data-rating'), 10);
                    renderReviewStars(window.selectedRating);
                    setReviewMessage('', '');
                });
            });

            reviewRating.addEventListener('mouseleave', function() {
                renderReviewStars(window.selectedRating);
            });
        }

        if (reviewField) {
            reviewField.addEventListener('input', function() {
                if (this.value.trim()) {
                    var selectedService = getSelectedReviewService();
                    if (!selectedService || !selectedService.alreadyReviewed) {
                        setReviewMessage('', '');
                    }
                }
            });
        }

        if (reviewSelector) {
            reviewSelector.addEventListener('change', function() {
                window.selectedRating = 0;
                renderReviewStars(0);
                if (reviewField) {
                    reviewField.value = '';
                }
                updateReviewAccessState();
            });

            updateReviewAccessState();
        }

        var reviewFormContainer = document.getElementById('premiumReviewForm');
        var reviewParentForm = reviewFormContainer ? reviewFormContainer.closest('form') : null;
        if (reviewParentForm) {
            reviewParentForm.addEventListener('submit', function(e) {
                e.preventDefault();
            });
        }

        var isLoggedIn = <?php echo $this->session->userdata("user_username") ? 'true' : 'false'; ?>;

        if (isLoggedIn) {
            var provider_id = sessionStorage.getItem('pending_booking_provider_id');
            var provider_service_id = sessionStorage.getItem('pending_booking_provider_service_id');
            var category_id = sessionStorage.getItem('pending_booking_category_id');
            var category_name = sessionStorage.getItem('pending_booking_category_name');
            var service_price = sessionStorage.getItem('pending_booking_service_price');

            if (provider_id && provider_service_id && category_id && category_name && service_price) {
                openBookingModal(provider_id, provider_service_id, category_id, category_name, service_price);

                sessionStorage.removeItem('pending_booking_provider_id');
                sessionStorage.removeItem('pending_booking_provider_service_id');
                sessionStorage.removeItem('pending_booking_category_id');
                sessionStorage.removeItem('pending_booking_category_name');
                sessionStorage.removeItem('pending_booking_service_price');
            }
        }
    });

    function scrollToServices(){
    document.getElementById("food").scrollIntoView({
        behavior:"smooth"
    });
}

window.addEventListener('load', function () {
    if (window.location.hash === '#review') {
        var reviewSection = document.getElementById('review');

        if (reviewSection) {
            setTimeout(function () {
                reviewSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 300);
        }
    }
});
</script>
    </body>
</html>

