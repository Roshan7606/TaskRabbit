<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Packages | MUNCHBOX-The foodies food</title>
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
                                <h2 class="text-light-black fw-700">Discover exclusive Packages</h2>
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
        <div class="container">
            <div class="row package ">
                <?php
                foreach ($packages as $pac_detail) {
                    ?>
                    <div class="col-md-3 pack_silver">
                        <center>
                            <a class="packg_name"><?php echo $pac_detail->name; ?></a><br><hr>
                            <a class="pack_month"><?php echo $pac_detail->duration; ?></a><br>
                            <a  class="pack_info"><strike>&#8377;<?php echo $pac_detail->price + 350; ?></strike></a><br>
                            <a class="pack_price">&#8377; <?php echo $pac_detail->price; ?></a><br><br>
                            <a class="pack_info"><?php echo $pac_detail->description; ?><br></a><br>
                            <a href="" onclick="$('#btn_package_lg').attr('href','Package-Update/login/<?php echo $pac_detail->package_id ?>');$('#btn_package_db').attr('href','Package-Update/dashboard/<?php echo $pac_detail->package_id ?>');" class="pack_btn" data-toggle="modal" data-target=".bs-example-modal-md">BUY PLAN</a>
                        </center>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
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
        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content modal_package">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/package_success1.png" class="package_image">
                        <p class="package_success">Registration Successfully Complete !</p>
                        <a href="#" id="btn_package_db" class="btn btn-go-to-dashboard">Go To Dashboard</a>
                        <a href="#" id="btn_package_lg" class="btn btn-go-to-log-in">Go To Log In</a>
                    </center>
                </div>
            </div>
        </div>
        <?php
        $this->load->view("footerscript");
        ?>
        <script src="<?php echo base_url();  ?>admin_assets/js/munchbox_ajax.js" type="text/javascript"></script>
    </body>
</html>