<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Munchbox | Authentication</title>
        <?php
        $this->load->view("CSS");
        ?>
    </head>

    <body>
        <div class="inner-wrapper">
            <div class="container-fluid no-padding">
                <div class="row no-gutters overflow-auto">
                    <div class="col-md-6">
                        <div class="main-banner">
                            <img src="<?php echo base_url(); ?>assets/img/banner/banner-1.png" class="img-fluid full-width main-img" alt="banner">
                            <div class="overlay-2 main-padding">
                                <!-- <img src="<?php echo base_url(); ?>assets/img/logo-2.jpg" class="img-fluid" alt="logo"> -->
                            </div>
                            <!-- <img src="<?php echo base_url(); ?>assets/img/banner/burger.png" class="footer-img" alt="footer-img"> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-2 user-page main-padding">
                            
                            <div class="login-sec" id="form_register">
                                <div class="login-box">
                                    <form name="user_register" method="post" action="" novalidate="">
                                        <h4 class="text-light-black fw-600">Create your account</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <?php
                                                        if(form_error("name"))
                                                        {
                                                    ?>
                                                    <label class="text-light-white fs-14 form_vis_error_text"><?php echo form_error("name"); ?></label>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                        <label class="text-light-white fs-14">Full name</label>
                                                    <?php
                                                        }
                                                    ?>
                                       
                                                    <input type="text" name="name" check_control="alpha" title="Only Alphabats Allow." class="form-control form-control-submit <?php
                                                        if(form_error("name"))
                                                        {
                                                            echo "form_vis_error";
                                                        }                                                
                                                   ?>" placeholder="First Name" value="<?php
                                                        if( !isset($success) && set_value("name"))
                                                        {
                                                            echo set_value("name");
                                                        }
                                                   ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <?php
                                                        if(form_error("mobile"))
                                                        {
                                                    ?>
                                                        <label class="text-light-white fs-14 form_vis_error_text"><?php echo form_error("mobile"); ?></label>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                        <label class="text-light-white fs-14">Mobile</label>
                                                    <?php
                                                        }
                                                    ?>
                                                    <input type="text" check_control="mobile" name="mobile" title="Only Numeric Allow." class="form-control form-control-submit form-control-submit <?php
                                                        if(form_error("mobile"))
                                                        {
                                                            echo "form_vis_error";
                                                        }                                                
                                                   ?>" placeholder="Mobile" value="<?php
                                                        if( !isset($success) && set_value("mobile"))
                                                        {
                                                            echo set_value("mobile");
                                                        }
                                                   ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <?php
                                                        if(form_error("email"))
                                                        {
                                                    ?>
                                                        <label class="text-light-white fs-14 form_vis_error_text"><?php echo form_error("email"); ?></label>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                        <label class="text-light-white fs-14">Email</label>
                                                    <?php
                                                        }
                                                    ?>
                                                    <input type="email" check_control="email" name="email" title="Enter valid Email." class="form-control form-control-submit form-control-submit <?php
                                                        if(form_error("email"))
                                                        {
                                                            echo "form_vis_error";
                                                        }                                                
                                                   ?>" placeholder="Email I'd" value="<?php
                                                        if( !isset($success) && set_value("email"))
                                                        {
                                                            echo set_value("email");
                                                        }
                                                   ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <?php
                                                        if(form_error("ps"))
                                                        {
                                                    ?>
                                                        <label class="text-light-white fs-14 form_vis_error_text"><?php echo form_error("ps"); ?></label>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                        <label class="text-light-white fs-14">Password (8 character minimum)</label>
                                                    <?php
                                                        }
                                                    ?>
                                                    <input type="password" check_control="" id="password-field" name="ps" class="form-control form-control-submit form-control-submit <?php
                                                        if(form_error("ps"))
                                                        {
                                                            echo "form_vis_error";
                                                        }                                                
                                                   ?>" placeholder="Password" value="<?php
                                                        if( !isset($success) && set_value("ps"))
                                                        {
                                                            echo set_value("ps");
                                                        }
                                                   ?>" required>
                                                    <div data-name="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                                                </div>
                                                <div class="form-group checkbox-reset">
                                                    <label class="custom-checkbox mb-0">
                                                        <input type="checkbox" name="#"> <span class="checkmark"></span> Keep me signed in</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="add_register" class="btn-second btn-submit full-width" id="register_btn" value="Create your account">
                                                </div>
                                                <div class="form-group text-center">
                                                    <p class="text-light-black mb-0">Have an account? <a href="<?php echo base_url("Log-in"); ?>">Sign in</a>
                                                    </p>
                                                </div> <span class="text-light-black fs-12 terms">By creating your Munchbox account, you agree to the <a href="Terms.php"> Terms of Use </a> and <a href="privacypolicy.php"> Privacy Policy.</a></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/mobileverify.gif" style="width: 53%;" class="model-image" height="100" width="100">
                            <h2>Otp verify successfully</h2>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body" style="padding: 20px;">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/tick.png" style="width: 20%;margin-bottom: 10px;" class="model-image" height="100" width="100">
                            <h2>Email verify successfully</h2>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(isset($error))
            {
        ?>
        <div class="add-alert-message animated bounceInDown ">
            <img src="<?php echo base_url(); ?>assets/img/animated-gif/4970-unapproved-cross.gif">
            <p><?php echo $error; ?></p>
        </div>
        <?php
            }
        ?> 
        <?php
        $this->load->view("footerscript");
        ?>
<!--        <script>
            $(document).ready(function () {
                $('#form_register').hide();
                $('#form_forget').hide();
                //$('#login_form').hide();
                $('#verify_otp').hide();
                $('#verify_email').hide();
            });
        </script>-->
    </body>
</html>