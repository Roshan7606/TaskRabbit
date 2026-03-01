<!DOCTYPE html>
<html lang="en">



    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>About Us || MUNCHBOX-The Foodies Food</title>
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
        <!-- slider -->
        
        <!-- slider -->
        <!-- about us -->
        <section class="aboutus section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="history-title mb-md-40">
                            <h2 class="text-light-black">A History Has Written For Munchbox Explore <span class="text-light-green">more Our Story</span></h2>
                            <p class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <p class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="histry-img mb-xs-20">
                                    <img src="<?php echo base_url(); ?>assets/img/about/blog/255x200/about-section-3.jpg" class="img-fluid full-width" alt="Histry">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="histry-img mb-xl-20">
                                    <img src="<?php echo base_url(); ?>assets/img/about/blog/255x200/about-section-1.jpg" class="img-fluid full-width" alt="Histry">
                                </div>
                                <div class="histry-img">
                                    <img src="<?php echo base_url(); ?>assets/img/about/blog/255x200/about-section-2.jpg" class="img-fluid full-width" alt="Histry">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us -->
        <!-- How It Woks -->
        <section class="section-padding how-it-works bg-light-theme">
            <div class="container">
                <div class="section-header-style-2">
                    <h6 class="text-light-green sub-title">Our Process</h6>
                    <h3 class="text-light-black header-title">How Does It Work</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="how-it-works-box arrow-1">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/001-search.png" alt="icon">
                                    <span class="number-box">01</span>
                                </span>
                                <h6>Search</h6>
                                <p>We provided facility to search your favourite restaurant or near by restaurant.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="how-it-works-box arrow-2">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/004-shopping-bag.png" alt="icon">
                                    <span class="number-box">02</span>
                                </span>
                                <h6>Select</h6>
                                <p>We have number of restaurants where you can select your favourite food item.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="how-it-works-box arrow-1">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/002-stopwatch.png" alt="icon">
                                    <span class="number-box">03</span>
                                </span>
                                <h6>Order</h6>
                                <p>We provide facility for place order within restaurant service time,order process is easy and convenient for every user.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="how-it-works-box">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/003-placeholder.png" alt="icon">
                                    <span class="number-box">04</span>
                                </span>
                                <h6>Enjoy</h6>
                                <p>We provide your favourite food at your doorstep so you enjoy your favourite food item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- feedback -->
        <!-- footer -->



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

    <?php
    $this->load->view("footerscript");
    ?>
</body>



</html>