<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title><?php echo !empty($service_detail->name) ? $service_detail->name : 'Service Providers'; ?> | TaskRabbit</title>
        <?php $this->load->view("CSS"); ?>
    </head>
    <body>
        <?php $this->load->view("header"); ?>
        <div class="main-sec"></div>

        <section class="section-padding-top exclusive-deals">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10 res-search-bar">
                        <div class="row">
                            <div class="col-md-3 search-res-box-1">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="<?php echo base_url(); ?>assets/img/food-and-restaurant.png" class="search-img-find">
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control">
                                            <option>
                                                <?php echo !empty($service_detail->name) ? $service_detail->name : 'Service'; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 search-res-textbox">
                                <input type="text" class="form-control" placeholder="Search provider name or area">
                            </div>

                            <div class="col-md-1 search-res-btn">
                                <img src="<?php echo base_url(); ?>assets/img/love.png" class="search-img-find-icon">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>

        <section class="featured-partners section-padding-top">
            <div class="container">
                <div class="row section-padding-bottom u-line">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title">
                                <?php echo !empty($service_detail->name) ? $service_detail->name : 'Service'; ?> Providers
                            </h3>
                            <div class="user-line margin-b-none m-t-10"></div>
                            <p class="text-light-black mt-2">
                                Select a service provider and continue to profile / booking page.
                            </p>
                        </div>
                    </div>

                    <?php if (!empty($providers)) { ?>
                        <?php foreach ($providers as $single) { ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="featured-product">
                                    <div class="featured-img">
                                        <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>">
                                            <?php
                                            $provider_image = "";
                                            if (!empty($single->coverpic)) {
                                                $provider_image = base_url() . $single->coverpic;
                                            } elseif (!empty($single->profile_pic)) {
                                                $provider_image = base_url() . $single->profile_pic;
                                            } else {
                                                $provider_image = base_url() . "assets/img/deals/360x178/shop-1.jpg";
                                            }
                                            ?>
                                            <img src="<?php echo $provider_image; ?>" class="img-res-cover full-width" alt="#">
                                        </a>

                                        <div class="overlay-2 padding-10">
                                            <span class="background-none res-open-img"></span>
                                        </div>
                                    </div>

                                    <div class="featured-product-details padding-bottom-none">
                                        <div class="pro-title max-width-100">
                                            <h6 class="mb-1 restaurant-name">
                                                <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>" class="text-light-black fw-600">
                                                    <?php echo !empty($single->owner_name) ? $single->owner_name : $single->restaurant_name; ?>
                                                </a>
                                            </h6>

                                            <p class="text-light-black mb-1">
                                                <strong>Service:</strong>
                                                <?php echo $single->category_name; ?>
                                            </p>

                                            <p class="text-light-black mb-1">
                                                <strong>Starting Price:</strong>
                                                ₹<?php echo number_format($single->service_price, 2); ?>
                                            </p>

                                            <p class="text-light-black mb-2">
                                                <strong>Contact:</strong>
                                                <?php echo !empty($single->owner_contactno) ? $single->owner_contactno : $single->contact_no; ?>
                                            </p>

                                            <div class="restaurent-rating mb-xl-20">
                                                <div class="star">
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                </div>
                                                <span class="fs-12 text-light-black">Available Provider</span>
                                            </div>

                                            <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>" class="btn-second btn-submit">
                                                View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <div class="review-img">
                                <center>
                                    <img src="<?php echo base_url(); ?>assets/img/no_found.png" class="img-fluid" alt="#">
                                    <div class="review-text">
                                        <h2 class="text-light-white mb-2 fw-600">No Provider Found</h2>
                                        <p class="text-light-white f-s-17">No service provider found for this service yet.</p>
                                    </div>
                                </center>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php $this->load->view("footer"); ?>
        <?php $this->load->view("footerscript"); ?>
        <script src="<?php echo base_url() ?>assets/js/munchbox.js" type="text/javascript"></script>
    </body>
</html>