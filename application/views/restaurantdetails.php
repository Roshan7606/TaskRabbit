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

        .service-rating-block .text-yellow i {
            color: #f5c518 !important;
        }

        .service-rating-block .text-dark-white i {
            color: #dcdcdc !important;
        }

        .service-rating-block {
            display: block;
            margin: 6px 0 8px 0;
        }

        .service-rating-block .rating-stars {
            display: flex;
            align-items: center;
            gap: 2px;
            margin-bottom: 2px;
        }

        .service-rating-block .rating-stars {
            display: flex;
            align-items: center;
            gap: 2px;
            margin-bottom: 2px;
            line-height: 1;
        }

        .service-rating-block .star-filled,
        .service-rating-block .star-empty {
            font-size: 14px;
            display: inline-block;
        }

        .service-rating-block .star-filled {
            color: #f5c518 !important;
        }

        .service-rating-block .star-empty {
            color: #d9d9d9 !important;
        }

        .service-rating-block .rating-text {
            font-size: 12px;
            color: #666;
        }

        .review-star {
            font-size: 30px;
            color: #ffc107;
            cursor: pointer;
            margin-right: 2px;
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
        <div class="page-banner p-relative smoothscroll fixed-top" id="menu" style="height: 400px;z-index: 1">
            <img src="<?php echo base_url(); ?>assets/img/banner.jpg" class="img-fluid full-width" alt="banner">
            <div class="overlay-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading padding-tb-10">
                            <h3 class="text-light-black title fw-700 no-margin">
                                <?php
                                if ($restaurent_detail[0]->restaurant_name != "") {
                                    echo $restaurent_detail[0]->restaurant_name;
                                } else {
                                    echo "Data not inserted";
                                }
                                ?>
                            </h3>
                            <p class="text-light-black sub-title no-margin">
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
                            <p class="text-light-black sub-title no-margin">
                                <a href="mailto:<?php
                                if ($restaurent_detail[0]->email != "") {
                                    echo $restaurent_detail[0]->email;
                                } else {
                                    echo "Data not inserted";
                                }
                                ?>" style="color: black">
                                    <i class="fa fa-envelope" style="margin-right: 0.5%;"></i>
                                    <?php
                                    if ($restaurent_detail[0]->email != "") {
                                        echo $restaurent_detail[0]->email;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>
                                </a>

                                <a style="margin-left: 1%;color: black;" href="tel:<?php
                                if ($restaurent_detail[0]->contact_no != "") {
                                    echo $restaurent_detail[0]->contact_no;
                                } else {
                                    echo "Data not inserted";
                                }
                                ?>">
                                    <i class="fa fa-phone-alt" style="margin-right: 0.5%"></i>
                                    <?php
                                    if ($restaurent_detail[0]->contact_no != "") {
                                        echo $restaurent_detail[0]->contact_no;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>
                                </a>
                            </p>

                            <div class="head-rating">
                                <div class="rating"> 
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

                                <div class="product-review">
                                    <div class="restaurent-details-mob">
                                        <a href="#">
                                            <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>
                                    <div class="restaurent-details-mob">
                                        <a href="#">
                                            <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>
                                    <div class="restaurent-details-mob">
                                        <a href="#">
                                            <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>
                                    <div class="restaurent-details-mob">
                                        <a href="#">
                                            <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="restaurent-logo" style="margin-left: 40%;">
                        <?php
                        $cover_img = !empty($restaurent_detail[0]->coverpic)
                            ? base_url($restaurent_detail[0]->coverpic)
                            : base_url('assets/img/banner.jpg');
                        ?>
                        <img src="<?php echo $cover_img; ?>" class="img-fluid" alt="#">                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- restaurent top -->

        <!-- restaurent tab -->
        <div class="restaurent-tabs u-line">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="restaurent-menu scrollnav">
                            <ul class="nav nav-pills">
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

                            <div class="add-wishlist">
                                <button id="btn_wishlist_<?php echo $restaurent_detail[0]->restaurant_id; ?>" data-target="#wishlistmodal" onclick="<?php
                                if ($this->session->userdata("user_username")) {
                                    ?>
                                                    wishlist('<?php echo $restaurent_detail[0]->restaurant_id; ?>', 'Restaurant');
                                    <?php
                                } else {
                                    ?>
                                                    call_wishlist_modal('<?php echo $restaurent_detail[0]->restaurant_id; ?>');
                                    <?php
                                }
                                ?>">
                                    <?php
                                    $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $restaurent_detail[0]->restaurant_id, "type" => "Restaurant")));
                                    if ($query == 1) {
                                        ?>
                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $restaurent_detail[0]->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                        <?php
                                    } else {
                                        ?>
                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $restaurent_detail[0]->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg" title="Add To Favourite" alt="tag">
                                        <?php
                                    }
                                    ?>
                                </button>
                            </div>
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
        <section class="section-padding restaurent-meals bg-light-theme">
            <div class="container-fluid" id="food">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">

                            <div class="col-xl-3 col-lg-3">
                                <div class="card sidebar-card">
                                    <div class="user-menu scrollnav">
                                        <ul class="nav-pills">
                                            <li class="user-menu-li">Services</li>
                                            <li class="display-none"><a href="" class="active-cuisin ">Search Result</a></li>

                                            <?php if (!empty($service_items)) { ?>
                                                <?php foreach ($service_items as $single) { ?>
                                                    <li>
                                                        <a href="javascript:void(0);"><?php echo $single->category_name; ?></a>
                                                    </li>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <li>
                                                    <a href="javascript:void(0);">No services found</a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 restaurent-meal-head mb-md-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header background-header-card padding-left-none">
                                            <div class="section-header-left">
                                                <h3 class="text-light-black header-title">
                                                    <a class="text-light-black no-margin">
                                                        Our Services
                                                    </a>
                                                </h3>
                                            </div>

                                            <div class="user-line"></div>

                                            <div class="row">
                                                <div class="col-md-12 m-b-10 padding-right-none">
                                                    <div class="sb-example-3">
                                                        <div class="search__container">
                                                            <input class="search__input" type="text" placeholder="Search services">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" id="search_food_item">
                                    <div id="">
                                        <div class="card-body no-padding">

                                            <div class="row">

                                                <?php if (!empty($service_items)) { ?>
                                                    <?php foreach ($service_items as $item) { ?>    
                                                        <div class="col-md-12 food-category-detail-heading">
                                                            <h4><?php echo ucwords($item->category_name); ?></h4>
                                                            <p>1 Service</p>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="restaurent-product-list">
                                                                <div class="restaurent-product-detail">
                                                                    <div class="restaurent-product-left">
                                                                        <div class="restaurent-product-title-box">
                                                                            <div class="restaurent-product-box">
                                                                                <div class="restaurent-product-title">
                                                                                    <h6 class="mb-2">
                                                                                        <a href="javascript:void(0)" class="text-light-black fw-600">
                                                                                            <?php echo $item->category_name; ?>
                                                                                        </a>
                                                                                    </h6>

                                                                                    <?php
                                                                                    $avg_rating = 0;
                                                                                    $total_reviews = 0;

                                                                                    if (isset($service_rating_map[$item->id])) {
                                                                                        $avg_rating = (float)$service_rating_map[$item->id]["avg_rating"];
                                                                                        $total_reviews = (int)$service_rating_map[$item->id]["total_reviews"];
                                                                                    }

                                                                                    $rounded_rating = round($avg_rating);
                                                                                    ?>

                                                                                    <?php if ($total_reviews > 0) { ?>
                                                                                        <div class="service-rating-block">
                                                                                            <div class="rating-stars">
                                                                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                                                                    <?php if ($i <= $rounded_rating) { ?>
                                                                                                        <span class="star-filled">&#9733;</span>
                                                                                                    <?php } else { ?>
                                                                                                        <span class="star-empty">&#9733;</span>
                                                                                                    <?php } ?>
                                                                                                <?php } ?>
                                                                                            </div>

                                                                                            <div class="rating-text">
                                                                                                <?php echo number_format($avg_rating, 1); ?>
                                                                                                (<?php echo $total_reviews; ?> review<?php echo ($total_reviews != 1 ? 's' : ''); ?>)
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php } ?>

                                                                                    <p class="font-item-prize-style">
                                                                                        &#8377; <?php echo number_format($item->service_price, 2); ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="restaurent-product-label">
                                                                                    <span class="rectangle-tag product-label-ovo-veg-tag">Service</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="restaurent-product-caption-box">
                                                                            <span class="text-light-white">
                                                                                <?php
                                                                                if (!empty($item->description)) {
                                                                                    echo $item->description;
                                                                                } else {
                                                                                    echo "Professional service available";
                                                                                }
                                                                                ?>
                                                                            </span>
                                                                        </div>
                                                                        <div style="margin-top: 15px;">
                                                                            <button type="button"
                                                                                    class="btn btn-danger"
                                                                                    onclick="handleBookingClick(
                                                                                        '<?php echo $restaurent_detail[0]->restaurant_id; ?>',
                                                                                        '<?php echo $item->id; ?>',
                                                                                        '<?php echo $item->category_id; ?>',
                                                                                        '<?php echo htmlspecialchars($item->category_name, ENT_QUOTES); ?>',
                                                                                        '<?php echo $item->service_price; ?>'
                                                                                    )">
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
        <section class="section-padding restaurent-about smoothscroll" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-light-black fw-700 title"><?php echo ucwords($restaurent_detail[0]->restaurant_name); ?></h3>
                        <p class="text-light-green no-margin">Services Category Provided By Us</p>

                        <div class="rating">
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

                        <ul class="about-restaurent">
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <span>
                                    <a href="tel:<?php
                                    if ($restaurent_detail[0]->contact_no != "") {
                                        echo $restaurent_detail[0]->contact_no;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>" class="text-light-white">
                                        <?php
                                        if ($restaurent_detail[0]->contact_no != "") {
                                            echo $restaurent_detail[0]->contact_no;
                                        } else {
                                            echo "Data not inserted";
                                        }
                                        ?>
                                    </a>
                                </span>
                            </li>

                            <li>
                                <i class="far fa-envelope"></i>
                                <span>
                                    <a href="mailto:<?php
                                    if ($restaurent_detail[0]->email != "") {
                                        echo $restaurent_detail[0]->email;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>" class="text-light-white">
                                        <?php
                                        if ($restaurent_detail[0]->email != "") {
                                            echo $restaurent_detail[0]->email;
                                        } else {
                                            echo "Data not inserted";
                                        }
                                        ?>
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <div class="restaurent-schdule">
                            <div class="card">
                                <div class="card-header text-light-white fw-700 fs-16">Available Service Timing</div>
                                <div class="card-body">
                                    <?php
                                    if (!empty($schedule_details)) {
                                        foreach ($schedule_details as $single) {
                                            ?>
                                            <div class="schedule-box">
                                                <div class="day text-light-black"><?php echo $single->day_name; ?></div>
                                                <div class="time text-light-black">Available: <?php echo date("h:ia", strtotime($single->open_time)); ?> - <?php echo date("h:ia", strtotime($single->close_time)); ?></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- restaurent about -->

        <!-- restaurent reviews -->
        <section class="section-padding restaurent-review smoothscroll" id="review">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title">Reviews for <?php echo ucwords($restaurent_detail[0]->restaurant_name); ?></h3>
                        </div>
                        <div class="restaurent-rating mb-xl-20">
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

                    <div class="col-md-12 <?php
                    if (count($review_rating) >= 3) {
                        echo "review-scroll";
                    }
                    ?>">
                        <?php
                        foreach ($review_rating as $single) {
                            ?>
                            <div class="review-box">
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
                                        <span class="text-light-white"><?php echo date("M d, Y", strtotime($single->created_at)); ?></span>
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

                                <p class="text-light-black"><strong>Service:</strong> <?php echo ucfirst($single->service_name); ?></p>
                                <p class="text-light-black"><?php echo ucfirst($single->review_text); ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-12">
                        <div class="review-img">
                            <img src="<?php echo base_url(); ?>assets/img/review-footer.png" class="img-fluid" alt="#">
                            <div class="review-text">
                                <h2 class="text-light-white mb-2 fw-600">Be one of the first to review</h2>
                                <p class="text-light-white">Order now and write a review to give others the inside scoop.</p>

                                <?php if($this->session->flashdata('review_success')) { ?>
                                    <div class="alert alert-success" style="margin-bottom:15px;">
                                        <?php echo $this->session->flashdata('review_success'); ?>
                                    </div>
                                <?php } ?>

                                <?php if($this->session->flashdata('review_error')) { ?>
                                    <div class="alert alert-danger" style="margin-bottom:15px;">
                                        <?php echo $this->session->flashdata('review_error'); ?>
                                    </div>
                                <?php } ?>

                                <?php
                                if ($this->session->userdata("user_username")) {
                                    if (!empty($eligible_review_services)) {
                                        ?>
                                        <form method="post" action="<?php echo base_url('Pages/submit_service_review'); ?>">
                                            <input type="hidden" name="provider_id" value="<?php echo $current_provider_id; ?>">

                                            <div class="form-group" style="margin-bottom:15px;">
                                                <label class="text-light-white">Select Service</label>
                                                <select name="review_service_data" id="review_service_data" class="form-control" required>
                                                    <option value="">Select Service</option>
                                                    <?php foreach($eligible_review_services as $single) { ?>
                                                        <option value="<?php echo $single->booking_id . '|' . $single->provider_service_id . '|' . $single->category_id; ?>">
                                                            <?php echo $single->service_name; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <input type="hidden" name="booking_id" id="booking_id">
                                            <input type="hidden" name="provider_service_id" id="provider_service_id">
                                            <input type="hidden" name="category_id" id="category_id">

                                            <div class="form-group" style="margin-bottom:15px;">
                                                <label class="text-light-white">Rating</label>
                                                <div style="line-height:1;">
                                                    <span class="review-star" data-value="1">☆</span>
                                                    <span class="review-star" data-value="2">☆</span>
                                                    <span class="review-star" data-value="3">☆</span>
                                                    <span class="review-star" data-value="4">☆</span>
                                                    <span class="review-star" data-value="5">☆</span>
                                                </div>
                                                <input type="hidden" name="rating" id="rating" required>
                                            </div>

                                            <div class="form-group" style="margin-bottom:15px;">
                                                <input type="text" class="form-control" value="<?php echo ucfirst($user_detail[0]->name); ?>" readonly="">
                                            </div>

                                            <div class="form-group" style="margin-bottom:15px;">
                                                <textarea name="review_text" class="visitor_review form-control" rows="8" placeholder="Please Enter Your Review" required></textarea>
                                            </div>

                                            <button type="submit" class="btn-reorder">Give Review</button>
                                        </form>
                                        <?php
                                    } else {
                                        ?>
                                        <p class="text-light-white">You can review only accepted booked services which are not reviewed yet.</p>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <p class="text-light-white">For giving review please <a href ="<?php echo base_url("Log-in"); ?>">LogIn/Sign Up</a> first</p>
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

        


        <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="text-center wishlist-model-box">
                        <h3>Ooops! You Are Not Log In. </h3>
                    </div>
                    <div class="mb-20">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/login_cart.png" class="log-out-user">
                        </center>
                    </div>
                    <div class="wishlist-model-msg">
                        <h6 class="text-center">To place your order now, log in to your existing account or sign up.</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-product-add"><a href="<?php echo base_url("Log-in"); ?>" class="text-white"><img src="<?php echo base_url(); ?>assets/img/block-user.png" class="wishlist-log-in-icon"> &nbsp;Go To Log In</a></button>
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

        <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="post" action="<?php echo base_url('submit-booking'); ?>" id="bookingForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookingModalLabel">Book Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="provider_id" id="modal_provider_id">
                            <input type="hidden" name="provider_service_id" id="modal_provider_service_id">
                            <input type="hidden" name="category_id" id="modal_category_id">

                            <div class="form-group">
                                <label>Service Name</label>
                                <input type="text" id="modal_service_name" class="form-control" readonly>
                            </div>

                            <div class="alert alert-danger validation-summary" id="validation_summary">
                                Please correct the highlighted fields.
                            </div>

                            <!-- <?php if($this->session->flashdata('booking_error')) { ?>
                                <div class="alert alert-danger" style="margin-bottom:15px;">
                                    <?php echo $this->session->flashdata('booking_error'); ?>
                                </div>
                            <?php } ?> -->

                            <div class="form-group">
                                <label>Service Price</label>
                                <input type="text" id="modal_service_price" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label>First Name</label>
                                <div class="position-relative">
                                    <input type="text" name="customer_first_name" id="customer_first_name" class="form-control premium-input" maxlength="50" required onblur="validateName('customer_first_name')">
                                    <span class="valid-tick" id="tick_customer_first_name">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_first_name"></small>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <div class="position-relative">
                                    <input type="text" name="customer_last_name" id="customer_last_name" class="form-control premium-input" maxlength="50" required onblur="validateName('customer_last_name')">
                                    <span class="valid-tick" id="tick_customer_last_name">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_last_name"></small>
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <div class="position-relative">
                                    <input type="text" name="customer_phone" id="customer_phone" class="form-control premium-input" maxlength="10" required onblur="validatePhone('customer_phone')">
                                    <span class="valid-tick" id="tick_customer_phone">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_phone"></small>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <div class="position-relative">
                                    <input type="email" name="customer_email" id="customer_email" class="form-control premium-input" maxlength="100" required onblur="validateEmail('customer_email')">
                                    <span class="valid-tick" id="tick_customer_email">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_email"></small>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <div class="position-relative">
                                    <textarea name="customer_address" id="customer_address" class="form-control premium-input" maxlength="300" required onblur="validateAddressField()"></textarea>
                                    <span class="valid-tick textarea-tick" id="tick_customer_address">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_address"></small>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <div class="position-relative">
                                    <textarea name="customer_description" id="customer_description" class="form-control premium-input" placeholder="Write your work details" maxlength="500" required onblur="validateDescriptionField()"></textarea>
                                    <span class="valid-tick textarea-tick" id="tick_customer_description">✔</span>
                                </div>
                                <small class="text-danger" id="error_customer_description"></small>
                            </div>

                            <div class="form-group">
                                <label>Preferred Date</label>
                                <div class="position-relative">
                                    <input type="date" name="service_date" id="service_date" class="form-control premium-input" min="<?php echo date('Y-m-d'); ?>" required onblur="validateRequired('service_date', 'Date is required')">
                                    <span class="valid-tick" id="tick_service_date">✔</span>
                                </div>
                                <small class="text-danger" id="error_service_date"></small>
                            </div>

                            <div class="form-group">
                                <label>Preferred Time</label>
                                <div class="position-relative">
                                    <input type="time" name="service_time" id="service_time" class="form-control premium-input" required onblur="validateRequired('service_time', 'Time is required')">
                                    <span class="valid-tick" id="tick_service_time">✔</span>
                                </div>
                                <small class="text-danger" id="error_service_time"></small>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Confirm Booking</button>
                        </div>
                    </form>
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
<div class="sticky-book-btn">
    <button onclick="scrollToServices()">
        Book Service
    </button>
</div>


        <?php
        $this->load->view("footerscript");
        ?>

        

        <script src="<?php echo base_url() ?>assets/js/munchbox.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/less.min.js" type="text/javascript"></script>
        
        <script>
    $(document).ready(function() {
        $('a[href*="#"]').on('click', function(e) {
            var target = $(this).attr("href");

            if (!target || target === "#" || $(target).length === 0) {
                return;
            }

            e.preventDefault();

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

    function handleBookingClick(provider_id, provider_service_id, category_id, category_name, service_price)
    {
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

        openBookingModal(provider_id, provider_service_id, category_id, category_name, service_price);
    }

    function openBookingModal(provider_id, provider_service_id, category_id, category_name, service_price)
    {
        $('#modal_provider_id').val(provider_id);
        $('#modal_provider_service_id').val(provider_service_id);
        $('#modal_category_id').val(category_id);
        $('#modal_service_name').val(category_name);
        $('#modal_service_price').val('₹ ' + service_price);

        resetBookingValidationUI();
        $('#bookingModal').modal('show');
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

function validateAddressField() {
    var input = document.getElementById('customer_address');
    var error = document.getElementById('error_customer_address');
    var tick = document.getElementById('tick_customer_address');

    if (!input) return false;

    var value = input.value.trim();

    if (value === '') {
        input.classList.remove('input-valid');
        input.classList.add('input-invalid');
        if (tick) tick.style.display = 'none';
        if (error) error.innerText = 'Address is required';
        return false;
    }

    if (value.length < 10) {
        input.classList.remove('input-valid');
        input.classList.add('input-invalid');
        if (tick) tick.style.display = 'none';
        if (error) error.innerText = 'Address must be at least 10 characters';
        return false;
    }

    input.classList.remove('input-invalid');
    input.classList.add('input-valid');
    if (tick) tick.style.display = 'block';
    if (error) error.innerText = '';
    return true;
}

function validateDescriptionField() {
    var input = document.getElementById('customer_description');
    var error = document.getElementById('error_customer_description');
    var tick = document.getElementById('tick_customer_description');

    if (!input) return false;

    var value = input.value.trim();

    if (value === '') {
        input.classList.remove('input-valid');
        input.classList.add('input-invalid');
        if (tick) tick.style.display = 'none';
        if (error) error.innerText = 'Description is required';
        return false;
    }

    if (value.length < 10) {
        input.classList.remove('input-valid');
        input.classList.add('input-invalid');
        if (tick) tick.style.display = 'none';
        if (error) error.innerText = 'Description must be at least 10 characters';
        return false;
    }

    input.classList.remove('input-invalid');
    input.classList.add('input-valid');
    if (tick) tick.style.display = 'block';
    if (error) error.innerText = '';
    return true;
}

function validateBookingForm() {
    var valid = true;

    if (!validateName('customer_first_name')) valid = false;
    if (!validateName('customer_last_name')) valid = false;
    if (!validatePhone('customer_phone')) valid = false;
    if (!validateEmail('customer_email')) valid = false;
    if (!validateAddressField()) valid = false;
    if (!validateDescriptionField()) valid = false;
    if (!validateRequired('service_date', 'Date is required')) valid = false;
    if (!validateRequired('service_time', 'Time is required')) valid = false;

    var summary = document.getElementById('validation_summary');
    if (summary) summary.style.display = valid ? 'none' : 'block';

    return valid;
}

document.addEventListener('DOMContentLoaded', function () {
    var bookingForm = document.getElementById('bookingForm');

    var debouncedFirstName = debounce(function(){ validateName('customer_first_name'); }, 300);
    var debouncedLastName = debounce(function(){ validateName('customer_last_name'); }, 300);
    var debouncedPhone = debounce(function(){ validatePhone('customer_phone'); }, 300);
    var debouncedEmail = debounce(function(){ validateEmail('customer_email'); }, 300);
    var debouncedAddress = debounce(function(){ validateAddressField(); }, 300);
    var debouncedDescription = debounce(function(){ validateDescriptionField(); }, 300);

    var firstName = document.getElementById('customer_first_name');
    var lastName = document.getElementById('customer_last_name');
    var phone = document.getElementById('customer_phone');
    var email = document.getElementById('customer_email');
    var address = document.getElementById('customer_address');
    var description = document.getElementById('customer_description');
    var serviceDate = document.getElementById('service_date');
    var serviceTime = document.getElementById('service_time');

    if (firstName) {
        firstName.addEventListener('input', function () {
            if (this.value.trim() === '') clearFieldState('customer_first_name');
            else debouncedFirstName();
        });
    }

    if (lastName) {
        lastName.addEventListener('input', function () {
            if (this.value.trim() === '') clearFieldState('customer_last_name');
            else debouncedLastName();
        });
    }

    if (phone) {
        phone.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');
            if (this.value.trim() === '') clearFieldState('customer_phone');
            else debouncedPhone();
        });
    }

    if (email) {
        email.addEventListener('input', function () {
            if (this.value.trim() === '') clearFieldState('customer_email');
            else debouncedEmail();
        });
    }

    if (address) {
        address.addEventListener('input', function () {
            if (this.value.trim() === '') clearFieldState('customer_address');
            else debouncedAddress();
        });
    }

    if (description) {
        description.addEventListener('input', function () {
            if (this.value.trim() === '') clearFieldState('customer_description');
            else debouncedDescription();
        });
    }

    if (serviceDate) {
        serviceDate.addEventListener('change', function () {
            validateRequired('service_date', 'Date is required');
        });
    }

    if (serviceTime) {
        serviceTime.addEventListener('change', function () {
            validateRequired('service_time', 'Time is required');
        });
    }

    if (bookingForm) {
        bookingForm.addEventListener('submit', function (e) {
            if (!validateBookingForm()) {
                e.preventDefault();
            }
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
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var serviceDropdown = document.getElementById("review_service_data");
    var bookingIdInput = document.getElementById("booking_id");
    var providerServiceIdInput = document.getElementById("provider_service_id");
    var categoryIdInput = document.getElementById("category_id");
    var ratingInput = document.getElementById("rating");
    var stars = document.querySelectorAll(".review-star");

    if (serviceDropdown) {
        serviceDropdown.addEventListener("change", function () {
            var value = this.value;
            if (value !== "") {
                var parts = value.split("|");
                bookingIdInput.value = parts[0];
                providerServiceIdInput.value = parts[1];
                categoryIdInput.value = parts[2];
            } else {
                bookingIdInput.value = "";
                providerServiceIdInput.value = "";
                categoryIdInput.value = "";
            }
        });
    }

    if (stars.length > 0) {
        stars.forEach(function(star) {
            star.addEventListener("click", function() {
                var selected = parseInt(this.getAttribute("data-value"));
                ratingInput.value = selected;

                stars.forEach(function(s, index) {
                    if ((index + 1) <= selected) {
                        s.textContent = "★";
                    } else {
                        s.textContent = "☆";
                    }
                });
            });
        });
    }
});
</script>

<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    <?php if($this->session->flashdata('booking_error')) { ?>
        if (!sessionStorage.getItem('booking_error_modal_shown')) {
            $('#bookingModal').modal('show');
            sessionStorage.setItem('booking_error_modal_shown', '1');
        }
    <?php } else { ?>
        sessionStorage.removeItem('booking_error_modal_shown');
    <?php } ?>

    $('#bookingModal').on('hidden.bs.modal', function () {
        sessionStorage.removeItem('booking_error_modal_shown');
    });
});
</script> -->

    </body>
</html>

