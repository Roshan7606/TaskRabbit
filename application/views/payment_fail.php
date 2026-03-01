
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant SignUp</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
    </head>
    <body style="background: #F6F6F6 !important;">
        <div class="app">
        <div class="container-fluid"> 
            <div class="d-flex full-height p-v-15 flex-column justify-content-between">
                <div class="d-none d-md-flex p-h-40">
                    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="height-62px">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body padding-top-none">
                                    <center>
                                        <img class="height-194px" src="<?php echo base_url(); ?>assets/img/10448-payment-failed-error.gif">
                                        <h3>Payment Failed</h3>
                                        <p class="p-b-10">Oops! Your payment of  <b>&#8377;137</b> was not completed for some issues.Click on <b>Continue</b> to placed your order as <b>Cash On Delivery</b> .</p>
                                        
                                            <span class="margin-top-23"><a class="btn-payment-fail" href="#">Retry</a></span>
                                            <span class="margin-top-23"><a class="btn-payment-success" onclick="<?php $this->session->set_userdata("payment_method","cod");?>" href="<?php echo base_url("Payment-Succes").$this->session->userdata("payment-fail-success-path"); ?>">Continue</a></span>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-6 d-none d-md-block">
                            <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/undraw_make_it_rain_iwk4.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex  p-h-40 justify-content-between">
                    <span class="">All Rights © <?php echo date('Y'); ?> Reserved , Design & Developed By <a href="#" class="text-dark">MUNCHBOX</a></span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="<?php echo base_url("Privacy-policy"); ?>" >Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="<?php echo base_url("Terms-condition"); ?>" >Terms & Condition</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

        <?php
        $this->load->view("seller/footerscript");
        ?>
    </body>
</html>