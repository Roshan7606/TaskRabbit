<!DOCTYPE html>
<html lang="en">



    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Contact Us || MUNCHBOX-The Foodies Food</title>
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
        <div class="container" style="text-align: center;margin-top: 20px;">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.942535551661!2d72.86207421488687!3d21.234127185887505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f1a6f801b9f%3A0xf9141eda48610fdb!2sNova%20One%20Click%20Solution!5e0!3m2!1sen!2sin!4v1575889003656!5m2!1sen!2sin" width="100%" frameborder="0" style="border:0;height: 400px;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 5%;">
            <div class="row">
                <div class=" col-md-6" >
                    <h2 class="light-title font-gray">Write Us</h2>
                    <form action="" method="post" name="contact-form" class="cnt-detail">
                        <?php
                            if(form_error("name"))
                            {
                        ?>
                        <p class="form_vis_error_text mg-right-10"><?php echo form_error("name"); ?></p>
                        <?php
                            }
                        ?>
                        <input type="text" id="form-element" check_control="alpha" value="<?php 
                            if(!isset($success) && set_value("name"))
                            {
                                echo set_value("name");
                            }
                        ?>" name="name" placeholder="Enter name..." class="form-control <?php 
                        if(form_error("name"))
                            {
                            echo "form_error";
                            }
                        ?>"/>
                        <?php
                            if(form_error("email"))
                            {
                        ?>
                        <p class="form_vis_error_text mg-right-10"><?php echo form_error("email"); ?></p>
                        <?php
                            }
                        ?>
                        <input type="text" id="form-element" name="email" value="<?php 
                            if(!isset($success) && set_value("email"))
                            {
                                echo set_value("email");
                            }
                        ?>"  placeholder="Enter email..." class="form-control <?php 
                        if(form_error("email"))
                            {
                            echo "form_error";
                            }
                        ?>"/>
                        <?php
                            if(form_error("mobile"))
                            {
                        ?>
                        <p class="form_vis_error_text mg-right-10"><?php echo form_error("mobile"); ?></p>
                        <?php
                            }
                        ?>
                        <input type="text" id="form-element" name="mobile" value="<?php 
                            if(!isset($success) && set_value("mobile"))
                            {
                                echo set_value("mobile");
                            }
                        ?>" placeholder="Enter mobile..." class="form-control <?php 
                        if(form_error("mobile"))
                            {
                            echo "form_error";
                            }
                        ?>"/>
                        <?php
                            if(form_error("subject"))
                            {
                        ?>
                        <p class="form_vis_error_text mg-right-10"><?php echo form_error("subject"); ?></p>
                        <?php
                            }
                        ?>
                        <input type="text" id="form-element" name="subject" value="<?php 
                            if(!isset($success) && set_value("subject"))
                            {
                                echo set_value("subject");
                            }
                        ?>" placeholder="Enter subject..." class="form-control <?php 
                        if(form_error("subject"))
                            {
                            echo "form_error";
                            }
                        ?>"/>
                        <?php
                            if(form_error("msg"))
                            {
                        ?>
                        <p class="form_vis_error_text mg-right-10"><?php echo form_error("msg"); ?></p>
                        <?php
                            }
                        ?>
                        <textarea cols="30" rows="4" id="form-element" name="msg" class="form-control <?php 
                        if(form_error("msg"))
                            {
                            echo "form_error";
                            }
                        ?>" placeholder="Write message..."><?php
                            if(!isset($success) && set_value("msg"))
                            {
                                echo set_value("msg");
                            }
                        ?></textarea>
                        <div class="contact-btn">
                            <button type="submit" name="add" value="add"  class="btn btnadd">Submit</button>
                        </div><!-- End .form-footer -->
                    </form>

                </div><!-- End .col-md-8 -->

                <div class=" col-md-6" >
                    <div class=" col-md-6" >
                        <div class="contact-details" style="padding-left: 5%;">	
                            <h2 class="light-title font-success">Contact Us</h2>
                            <ul class="list list-icons list-icons-lg">			
                                <li class="mb-1"  style="padding-top: 5%;"><i class="far fa-dot-circle text-color-primaryb animated" style="font-size: 25px;color: blue;padding-right: 3%;"></i> <a class="m-0">234 Street Name, City Name</a></li>	
                                <li class="mb-1"  style="padding-top: 5%;"><i class="fab fa-whatsapp text-color-primary" style="font-size: 25px;color: green;padding-right: 3%;"></i>  <a class="m-0"><a href="tel:7046221211" style="color: black">70462 21211</a></a></li>	
                                <li class="mb-1"  style="padding-top: 5%;"><i class="far fa-envelope text-color-primary" style="font-size: 25px;color: red;padding-right: 3%;"></i>  <a class="m-0"><a href="mailto:munchbox@gmail.com" style="color: black">munchbox@gmail.com</a></a></li>
                            </ul>							
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
        <script type="text/javascript">
            $("#form-element").attr("placeholder").css("color", "#000");
        </script>
    </body>



</html>