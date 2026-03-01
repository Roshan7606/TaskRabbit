<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Munchbox | Foodies food</title>
        <?php
        $this->load->view("CSS");
        ?>
    </head>

    <body>
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>

        <div class="feedback-img">
            <div class="row feedback-bg">
                <img src="<?php echo base_url(); ?>assets/img/banner/banner-8.jpg" class="img-fluid full-width main-img feedback-cover" alt="banner">
                <form action="" method="post" name="feedback">
                    <div class="container-fluid feedback-side feedback-card col-md-4 m-auto animated  jackInTheBox slow">
                    <h1 class="text-center feedback-title">Feedback</h1>
                    <input type="text" id="form-element-feedback-textbox" name="name" placeholder="Enter Name" class="form-control feedback-textbox">
                    <textarea id="form-element-feedback-textarea" name="msg" class="form-control feedback-textarea" rows="10" placeholder="Enter Message" style="color: #000;"></textarea>
                    <?php
                        if(isset($success))
                        {
                    ?>
                        <h5 style="margin-top: 15px;"><?php echo $success; ?></h5>
                    <?php
                        }
                    ?>
                    <center>
                        <input type="submit" class="btn-feedback" name="add" value="Send Feedback">
                    </center>
                    </div>
                </form> 
            </div>
        </div>
        <?php
        $this->load->view("footer");
        ?>
        <!-- footer -->
        <!-- modal-boxes -->
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



        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="otp-main">
                        <p class="text-center">Mobile Verification</p>
                        <img src="<?php echo base_url(); ?>assets/img/mobileverify.gif" height="200" width="200">
                        <p>Verification Code</p>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $this->load->view("footerscript");
        ?>
    </body>



</html>