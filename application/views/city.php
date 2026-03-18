<!DOCTYPE html>
<html lang="en">



    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Cities || TaskRabbit</title>
        <!-- Fav and touch icons -->
        <?php
          $this->load->view("CSS");
        ?>
    </head>

    <body>
        <!-- Navigation -->
        <?php
              $this->load->view("header");
        ?>
        <div class="main-sec"></div>
        <!-- Navigation -->
        <!-- exclusive deals -->
<!--        <section class="section-padding-top exclusive-deals">
            <div class="container">
                <div class="row section-padding-bottom u-line">
                    <div class="col-md-7 align-self-center">
                        <div class="title">
                            <div class="deals-heading">
                                <h2 class="text-light-black fw-700">Discover exclusive deals with Perks</h2>
                                <p class="text-light-black">Munchbox deals, coupons, promos, and more</p>
                                <a href="ex-deals.html" class="btn-second btn-submit">View Deals</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="deals-image">
                            <img src="<?php echo base_url(); ?>assets/img/deals/banner-1.jpg" class="img-fluid full-width" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- exclusive deals -->
        <!-- Featured partners -->
        <section class="featured-partners section-padding-top">
            <div class="container">
                <div class="row section-padding-bottom u-line">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title">Explored Cities</h3>
                            <div class="user-line  m-t-10"></div>
                        </div>
                    </div>
                    <?php
                    foreach($city_detail as $data) {
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-box-2">
                                    <div class="product-img">
                                        <a href="restaurant.php">
                                           <i class="fas fa-utensils"></i>
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title" style="font-size: 20px;"><a href="restaurant.php" class="text-light-black"><?php echo $data->city; ?></a></h6>
                                        </div>
                                        <p class="text-light-white" style="font-size: 15px;">India &Longrightarrow; <?php echo $data->state ?></p>
                                        <div class="product-details">
                                            <div class="price-time"> 
                                                <span class="text-light-black time" style="font-size: 15px;">Total Services</span>
                                                <!--<span class="text-light-white price">$10 min</span>-->
                                            </div>
                                            <div class="rating">  
                                                <span class="text-light-white text-right" style="padding-right: 8px;font-size: 30px;"><?php echo $data->cnt_res; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-footer-2">  
                                    <div class="discount-coupon"> 
                                        <a href="<?php echo base_url(); ?>Restaurant/<?php echo $data->res_location; ?>"><span class="text-light-white fs-14">Show All Services</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>



    <!-- local deals -->
    <!-- footer -->
    <?php
          $this->load->view("footer");
    ?>
    <!-- footer -->
    <!-- modal boxes -->
    <div class="modal fade" id="address-box">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title fw-700">Change Address</h4>
                </div>
                <div class="modal-body">
                    <div class="location-picker">
                        <input type="text" class="form-control" placeholder="Enter a new address">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search-box">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="search-box p-relative full-width">
                        <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                    </div>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <?php
          $this->load->view("footerscript");
    ?>
</body>



</html>