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

        <style>
    .premium-field-wrap {
        position: relative;
    }

    .premium-input.input-valid {
        border: 2px solid #28a745 !important;
        box-shadow: 0 0 0 0.12rem rgba(40, 167, 69, 0.15) !important;
    }

    .premium-input.input-invalid {
        border: 2px solid #dc3545 !important;
        box-shadow: 0 0 0 0.12rem rgba(220, 53, 69, 0.15) !important;
    }

    .valid-tick {
        display: none;
        position: absolute;
        right: 42px;
        top: 50%;
        transform: translateY(-50%);
        color: #28a745;
        font-weight: bold;
        font-size: 16px;
        z-index: 5;
    }

    .premium-error {
        display: block !important;
        margin-top: 6px !important;
        font-size: 13px !important;
        color: #dc3545 !important;
        font-weight: 500 !important;
        min-height: 18px;
    }
    .field-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #333;
        z-index: 999;
        font-size: 16px;
        background: transparent;
        border: none;
        outline: none;
        padding: 0;
        line-height: 1;
    }

    .premium-field-wrap .premium-input {
        padding-right: 45px;
    }
</style>

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
                                    <form name="user_register" method="post" action="<?php echo base_url('Sign-up'); ?>" novalidate autocomplete="off" id="userSignupForm">
                                        <h4 class="text-light-black fw-600">Create your account</h4>
                                        
                                        <?php if (!empty($error)) { ?>
                                            <div style="background:#f8d7da;color:#721c24;padding:12px 14px;border:1px solid #f5c6cb;border-radius:6px;margin:15px 0;">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php } ?>

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

                                                    <div class="premium-field-wrap">
                                                        <input type="text"
                                                            id="name"
                                                            name="name"
                                                            class="form-control form-control-submit premium-input <?php
                                                                    if(form_error("name"))
                                                                    {
                                                                        echo "form_vis_error";
                                                                    }
                                                            ?>"
                                                            placeholder="First Name"
                                                            value="<?php
                                                                    if(!isset($success) && set_value('name'))
                                                                    {
                                                                        echo set_value('name');
                                                                    }
                                                            ?>"
                                                            required
                                                            onblur="validateName('name')">
                                                        <span class="valid-tick" id="tick_name">✔</span>
                                                    </div>

                                                    <small id="error_name" class="premium-error"></small>
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

                                                    <div class="premium-field-wrap">
                                                        <input type="text"
                                                            id="mobile"
                                                            name="mobile"
                                                            class="form-control form-control-submit premium-input <?php
                                                                    if(form_error("mobile"))
                                                                    {
                                                                        echo "form_vis_error";
                                                                    }
                                                            ?>"
                                                            placeholder="Mobile"
                                                            value="<?php
                                                                    if(!isset($success) && set_value('mobile'))
                                                                    {
                                                                        echo set_value('mobile');
                                                                    }
                                                            ?>"
                                                            required
                                                            onblur="validatePhone('mobile')">
                                                        <span class="valid-tick" id="tick_mobile">✔</span>
                                                    </div>

                                                    <small id="error_mobile" class="premium-error"></small>
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

                                                    <div class="premium-field-wrap">
                                                        <input type="email"
                                                            id="email"
                                                            name="email"
                                                            class="form-control form-control-submit premium-input <?php
                                                                    if(form_error("email"))
                                                                    {
                                                                        echo "form_vis_error";
                                                                    }
                                                            ?>"
                                                            placeholder="Email I'd"
                                                            value="<?php
                                                                    if(!isset($success) && set_value('email'))
                                                                    {
                                                                        echo set_value('email');
                                                                    }
                                                            ?>"
                                                            required
                                                            onblur="validateEmail('email')">
                                                        <span class="valid-tick" id="tick_email">✔</span>
                                                    </div>

                                                    <small id="error_email" class="premium-error"></small>
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
                                                        <label class="text-light-white fs-14">Password (min 8 chars, 1 uppercase, 1 number, 1 special)</label>
                                                    <?php
                                                        }
                                                    ?>

                                                    <div class="premium-field-wrap">
                                                        <input type="password"
                                                            id="password-field"
                                                            name="ps"
                                                            class="form-control form-control-submit premium-input <?php
                                                                    if(form_error("ps"))
                                                                    {
                                                                        echo "form_vis_error";
                                                                    }
                                                            ?>"
                                                            placeholder="Password"
                                                            value="<?php
                                                                    if(!isset($success) && set_value('ps'))
                                                                    {
                                                                        echo set_value('ps');
                                                                    }
                                                            ?>"
                                                            required
                                                            onblur="validatePassword('password-field')">

                                                        <span class="valid-tick" id="tick_password-field">✔</span>
                                                        <button type="button" class="field-icon" onclick="togglePasswordField('password-field', this)">👁</button>
                                                    </div>

                                                    <small id="error_password-field" class="premium-error"></small>
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
        $this->load->view("footerscript");
        ?>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            var signupForm = document.getElementById('userSignupForm');
            var name = document.getElementById('name');
            var mobile = document.getElementById('mobile');
            var email = document.getElementById('email');
            var password = document.getElementById('password-field');

            if (name) {
                name.addEventListener('input', function () {
                    if (this.value.trim() === '') {
                        clearValidation('name');
                    } else {
                        validateName('name');
                    }
                });
                name.addEventListener('blur', function () {
                    validateName('name');
                });
            }

            if (mobile) {
                mobile.addEventListener('input', function () {
                    if (this.value.trim() === '') {
                        clearValidation('mobile');
                    } else {
                        validatePhone('mobile');
                    }
                });
                mobile.addEventListener('blur', function () {
                    validatePhone('mobile');
                });
            }

            if (email) {
                email.addEventListener('input', function () {
                    if (this.value.trim() === '') {
                        clearValidation('email');
                    } else {
                        validateEmail('email');
                    }
                });
                email.addEventListener('blur', function () {
                    validateEmail('email');
                });
            }

            if (password) {
                password.addEventListener('input', function () {
                    if (this.value.trim() === '') {
                        clearValidation('password-field');
                    } else {
                        validatePassword('password-field');
                    }
                });
                password.addEventListener('blur', function () {
                    validatePassword('password-field');
                });
            }

            if (signupForm) {
                signupForm.addEventListener('submit', function (e) {
                    var isValid = true;

                    clearValidation('name');
                    clearValidation('mobile');
                    clearValidation('email');
                    clearValidation('password-field');

                    if (!validateName('name')) {
                        isValid = false;
                    }

                    if (!validatePhone('mobile')) {
                        isValid = false;
                    }

                    if (!validateEmail('email')) {
                        isValid = false;
                    }

                    if (!validatePassword('password-field')) {
                        isValid = false;
                    }

                    if (!isValid) {
                        e.preventDefault();
                    }
                });
            }
        });
        </script>

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