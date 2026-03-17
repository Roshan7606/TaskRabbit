
 
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>TaskRabbit | Authentication</title>
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
                display: block;
                margin-top: 6px;
                font-size: 13px;
                color: #dc3545;
                font-weight: 500;
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
        </style>
        
    </head>
    <body>
        <div class="inner-wrapper">
            <div class="container-fluid no-padding">
                <div class="row no-gutters overflow-auto">
                    <div class="col-md-6">
                        <div class="main-banner">
                            <img src="<?php echo base_url(); ?>assets/img/banner/banner-1.png" class="img-fluid full-width main-img" alt="banner">
                            
                            <!-- <img src="<?php echo base_url(); ?>assets/img/banner/burger.png" class="center-img" alt="footer-img"> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-2 user-page main-padding">
                            <div class="login-sec" id="login_form">
                                <div class="login-box">
                                    <form method="post" name="user_login" action="<?php echo base_url('Log-in'); ?>" novalidate autocomplete="off" id="userLoginForm">
                                        <input type="hidden" name="login" value="1">

                                        <h4 class="text-light-black fw-600">Sign in with your TaskRabbit account</h4>

                                        <?php if (!empty($error)) { ?>
                                            <div style="background:#f8d7da;color:#721c24;padding:12px 14px;border:1px solid #f5c6cb;border-radius:6px;margin:15px 0;">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php } ?>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <?php
                                                        if(form_error("email"))
                                                        {
                                                    ?>
                                                    <label class="text-light-white fs-14 form_vis_er0ror_text"><?php echo form_error("email"); ?></label>
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
                                                            placeholder="Email Id"
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
                                                    <label class="text-light-white fs-14">Password</label>
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
                                                            required
                                                            onblur="validateLoginPassword('password-field')">

                                                        <span class="valid-tick" id="tick_password-field">✔</span>
                                                        <button type="button" class="field-icon" onclick="togglePasswordField('password-field', this)">👁</button>
                                                    </div>

                                                    <small id="error_password-field" class="premium-error"></small>
                                                </div>
                                                <div class="form-group checkbox-reset">
                                                    <label class="custom-checkbox mb-0">
                                                        <input type="checkbox" name="svp" value="yes"> <span class="checkmark"></span> Keep me signed in</label> <a id="login_forget" href="#">Reset password</a>
                                                </div>
                                                <div class="form-group">
<button type="submit" class="btn-second btn-submit full-width" name="login">
Login
</button>                                                        <img src="<?php echo base_url(); ?>assets/img/M.png" alt="btn logo" value="Sign In">
                                                        
                                                </div>
                                                
                                                <div class="form-group text-center mb-0"> Don't have an account? <a href="<?php echo base_url("Sign-up"); ?>">Signup</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
<!--                            <div class="login-sec" id="form_forget">
                                <div class="login-box">
                                    <form>
                                        <h4 class="text-light-black fw-600">Forget Password</h4>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="text-light-white fs-14">Email</label>
                                                    <input type="email" name="#" class="form-control form-control-submit" placeholder="Email I'd" required>
                                                </div>


                                                <div class="form-group">
                                                    <button type="submit" class="btn-second btn-submit full-width">Send Link</button>
                                                </div>

                                                <div class="form-group text-center">
                                                    <p class="text-light-black mb-0"><a href="#" id="forget_signin">Back to Login page</a>
                                                    </p>
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="login-sec" id="verify_otp">
                                <div class="login-box">
                                    <form>
                                        <h4 class="text-light-black fw-600 text-center otp-title">Mobile Verification</h4>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <center>
                                                        <img class="text-center otp-icon" src="<?php echo base_url(); ?>assets/img/otpvisitor.png">
                                                        <p class="mg-top-10px otp-title-sub">Enter a Verification code</p>
                                                        <p class="mg-top-10px">OTP has been sent on ********11 successfully</p>
                                                        <div class="otpbox">
                                                            <input type="text" id="otpbox1" onkeyup="transfer(this.value, '#otpbox1')" maxlength="1" autofocus="">
                                                            <input type="text" id="otpbox2" onkeyup="transfer(this.value, '#otpbox2')" maxlength="1">
                                                            <input type="text" id="otpbox3" onkeyup="transfer(this.value, '#otpbox3')"  maxlength="1">
                                                            <input type="text" id="otpbox4" onkeyup="transfer(this.value, '#otpbox4')"  maxlength="1">
                                                            <input type="text" id="otpbox5" onkeyup="transfer(this.value, '#otpbox5')"  maxlength="1">
                                                            <input type="text" id="otpbox6" onkeyup="transfer(this.value, '#otpbox6')"  maxlength="1">

                                                        </div>
                                                    </center>
                                                </div>

                                                <div class="form-group">
                                                    <a class="btn-second btn-submit full-width btn-safed" data-toggle="modal" data-target="#exampleModalCenter">Verify OTP</a>
                                                </div>

                                                <div class="form-group text-center">
                                                    <p class="text-light-black mb-0">Didn't Receive code ?<a href="#" id="forget_signin"> Resend</a>
                                                    </p>
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="login-sec" id="verify_email">
                                <div class="login-box">
                                    <form>
                                        <h4 class="text-light-black fw-600 text-center otp-title">Email Verification</h4>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <center>
                                                        <img class="text-center otp-icon" src="<?php echo base_url(); ?>assets/img/mail.png">
                                                        <p class="mg-top-10px otp-title-sub">Enter a Verification code</p>
                                                        <p class="mg-top-10px">OTP has been sent on *****@gm**.com successfully</p>
                                                        <div class="otpbox">
                                                            <input type="text" id="otpbox11" onkeyup="transfer_email(this.value, '#otpbox11')" maxlength="1" autofocus="">
                                                            <input type="text" id="otpbox12" onkeyup="transfer_email(this.value, '#otpbox12')" maxlength="1">
                                                            <input type="text" id="otpbox13" onkeyup="transfer_email(this.value, '#otpbox13')"  maxlength="1">
                                                            <input type="text" id="otpbox14" onkeyup="transfer_email(this.value, '#otpbox14')"  maxlength="1">
                                                            <input type="text" id="otpbox15" onkeyup="transfer_email(this.value, '#otpbox15')"  maxlength="1">
                                                            <input type="text" id="otpbox16" onkeyup="transfer_email(this.value, '#otpbox16')"  maxlength="1">
                                                        </div>
                                                    </center>
                                                </div>

                                                <div class="form-group">
                                                    <a class="btn-second btn-submit full-width btn-safed" data-toggle="modal" data-target="#exampleModalCenter_email">Verify OTP</a>
                                                </div>

                                                <div class="form-group text-center">
                                                    <p class="text-light-black mb-0">Didn't Receive code ?<a href="#" id="forget_signin"> Resend</a>
                                                    </p>
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>-->
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
<!--        <script>
            $(document).ready(function () {
                $('#form_register').hide();
                $('#form_forget').hide();
                //$('#login_form').hide();
                $('#verify_otp').hide();
                $('#verify_email').hide();
            });
        </script>-->

<script>
document.addEventListener('DOMContentLoaded', function () {
    var loginForm = document.getElementById('userLoginForm');
    var email = document.getElementById('email');
    var password = document.getElementById('password-field');

    if (email) {
        email.addEventListener('input', function () {
            if (this.value.trim() === '') {
                clearValidation('email');
            } else {
                validateEmail('email');
            }
        });

        email.addEventListener('keyup', function () {
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
                validateLoginPassword('password-field');
            }
        });

        password.addEventListener('keyup', function () {
            if (this.value.trim() === '') {
                clearValidation('password-field');
            } else {
                validateLoginPassword('password-field');
            }
        });

        password.addEventListener('blur', function () {
            validateLoginPassword('password-field');
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            var isValid = true;

            if (!validateEmail('email')) isValid = false;
            if (!validateLoginPassword('password-field')) isValid = false;

            if (!isValid) {
                e.preventDefault();
            }
        });
    }
});
</script>
    </body>
</html>