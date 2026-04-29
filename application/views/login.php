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
            body {
                background: linear-gradient(135deg, #fff8f8 0%, #f7f8fc 45%, #fffdfd 100%);
                font-family: 'Poppins', sans-serif;
            }

            .inner-wrapper {
                min-height: 100vh;
            }

            .auth-left-panel {
                min-height: 100vh;
                position: relative;
                overflow: hidden;
                background: #111827;
            }

            .auth-left-panel .main-banner {
                min-height: 100vh;
                position: relative;
            }

            .auth-left-panel .main-banner .main-img {
                width: 100%;
                height: 100vh;
                object-fit: cover;
                filter: brightness(0.70) blur(0.4px);
                transform: scale(1.02);
            }

            .auth-left-panel::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(90deg, rgba(35, 20, 14, 0.70) 0%, rgba(58, 35, 24, 0.38) 48%, rgba(84, 47, 26, 0.12) 100%);
                z-index: 1;
            }

            .auth-left-content {
                position: absolute;
                left: 48px;
                top: 84px;
                z-index: 2;
                color: #fff;
                max-width: 560px;
            }

            .auth-brand-badge {
                display: inline-block;
                padding: 12px 18px;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.82);
                border: 1px solid rgba(255, 255, 255, 0.35);
                color: #4a342f;
                backdrop-filter: blur(10px);
                font-size: 18px;
                font-weight: 500;
                letter-spacing: 0.2px;
                margin-bottom: 28px;
            }

            .auth-left-title {
                font-size: 58px;
                line-height: 1.08;
                font-weight: 700;
                color: #ffffff;
                margin-bottom: 22px;
                max-width: 560px;
                letter-spacing: -1px;
            }

            .auth-left-text {
                font-size: 18px;
                line-height: 1.85;
                color: rgba(255, 255, 255, 0.92);
                max-width: 560px;
                margin-bottom: 0px;
            }

            .auth-feature-list {
                display: flex;
                flex-wrap: wrap;
                gap: 14px;
                max-width: 560px;
                margin-top: -34px;
            }
            
            .auth-feature-chip {
                display: inline-flex;
                align-items: center;
                padding: 14px 20px;
                border-radius: 18px;
                background: rgba(255, 255, 255, 0.14);
                border: 1px solid rgba(255, 255, 255, 0.18);
                color: #ffffff;
                font-size: 15px;
                font-weight: 500;
                backdrop-filter: blur(10px);
                box-shadow: inset 0 1px 0 rgba(255,255,255,0.08);
            }

            .auth-feature-chip span {
                margin-right: 10px;
                font-size: 17px;
            }

            .section-2.user-page.main-padding.auth-right-panel {
                width: 100%;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px 24px;
                position: relative;
                background:
                    radial-gradient(circle at 20% 20%, rgba(255,255,255,0.75), transparent 22%),
                    radial-gradient(circle at 80% 75%, rgba(255,150,150,0.16), transparent 24%),
                    linear-gradient(135deg, #f3ebeb 0%, #f7f2f2 45%, #f5eeee 100%);
                overflow: hidden;
            }

            .login-sec {
                width: 100%;
                max-width: 420px;
                margin: 0 auto;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                z-index: 2;
            }

            .login-box {
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
                background: rgba(255, 251, 251, 0.92);
                border: 1px solid rgba(235, 214, 214, 0.95);
                box-shadow:
                    0 0 0 1px rgba(255,255,255,0.65),
                    0 16px 36px rgba(110, 77, 77, 0.08),
                    0 0 16px rgba(255, 133, 133, 0.05);
                border-radius: 22px;
                padding: 56px 20px 18px;
                backdrop-filter: blur(14px);
                position: relative;
                overflow: visible;
            }

            .login-box::before {
                content: "";
                position: absolute;
                top: 0;
                left: 30px;
                right: 30px;
                height: 8px;
                border-radius: 0 0 16px 16px;
                background: linear-gradient(90deg, #ff6b6b, #ff3d68);
                box-shadow: 0 4px 20px rgba(255, 77, 77, 0.5);
            }

            .auth-card-mini-badge {
                display: inline-block;
                padding: 8px 18px;
                border-radius: 14px;
                background: #fff2f2;
                color: #a73634;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: 0.2px;
                margin-bottom: 16px;
                border: 1px solid #f0dada;
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }

            .auth-form-title {
                font-size: 24px;
                line-height: 1.12;
                font-weight: 700;
                color: #1f2437;
                margin-bottom: 6px;
                text-align: center;
                letter-spacing: -0.5px;
            }

            .auth-form-small-heading {
                font-size: 15px;
                line-height: 1.3;
                font-weight: 400;
                color: #4d4b57;
                text-align: center;
                margin-bottom: 12px;
            }

            .auth-form-subtitle-center {
                font-size: 13px;
                line-height: 1.65;
                color: #5f616d;
                margin-bottom: 18px;
                max-width: 330px;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
            }

            .auth-form-subtitle {
                font-size: 15px;
                line-height: 1.8;
                color: #667085;
                margin-bottom: 28px;
                max-width: 430px;
            }

            .auth-label {
                display: block;
                margin-bottom: 10px;
                color: #4b4451 !important;
                font-size: 16px !important;
                font-weight: 500;
            }

            .premium-field-wrap {
                position: relative;
            }

            .premium-input {
                height: 56px;
                border-radius: 12px !important;
                border: 1.5px solid #d9d1d1 !important;
                background: rgba(255,255,255,0.95) !important;
                color: #2b2934 !important;
                font-size: 15px !important;
                padding: 0 48px 0 50px !important;
                box-shadow: none !important;
                transition: all 0.25s ease;
            }

            .premium-input:focus {
                border-color: #d8b2b2 !important;
                box-shadow: 0 0 0 0.15rem rgba(223, 190, 190, 0.18) !important;
            }

            .input-left-icon,
            .input-right-icon {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                color: #8a7d7d;
                font-size: 18px;
                line-height: 1;
                z-index: 3;
            }

            .input-left-icon {
                left: 16px;
            }

            .input-right-icon {
                right: 16px;
            }

            .premium-input.input-valid {
                border: 2px solid #28a745 !important;
                box-shadow: 0 0 0 0.12rem rgba(40, 167, 69, 0.12) !important;
            }

            .premium-input.input-invalid {
                border: 2px solid #dc3545 !important;
                box-shadow: 0 0 0 0.12rem rgba(220, 53, 69, 0.12) !important;
            }

            .valid-tick {
                display: none;
                position: absolute;
                right: 44px;
                top: 50%;
                transform: translateY(-50%);
                color: #28a745;
                font-weight: bold;
                font-size: 16px;
                z-index: 5;
            }

            .premium-error {
                display: block;
                margin-top: 7px;
                font-size: 13px;
                color: #dc3545;
                font-weight: 500;
                padding-left: 4px;
            }

            .field-icon {
                position: absolute;
                right: 16px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                color: #6d6570;
                z-index: 5;
                font-size: 16px;
                background: transparent;
                border: none;
                outline: none;
                padding: 0;
                line-height: 1;
            }

            .auth-error-box {
                background: linear-gradient(180deg, #fff1f1 0%, #ffe8e8 100%);
                color: #b42318;
                padding: 14px 16px;
                border: 1px solid #f7caca;
                border-radius: 14px;
                margin: 16px 0 18px;
                font-size: 14px;
                font-weight: 500;
            }

            .checkbox-reset {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: nowrap;
                gap: 12px;
                margin-top: 8px;
                margin-bottom: 18px;
            }

            .checkbox-reset .custom-checkbox {
                color: #433f49;
                font-size: 14px;
                font-weight: 500;
            }

            .checkbox-reset a {
                color: #d14d4d;
                font-size: 14px;
                font-weight: 600;
                text-decoration: none;
            }

            .checkbox-reset .custom-checkbox {
                color: #344054;
                font-size: 14px;
                font-weight: 500;
            }

            .checkbox-reset a {
                color: #ff4d4d;
                font-size: 14px;
                font-weight: 600;
                text-decoration: none;
            }

            .checkbox-reset a:hover {
                color: #e63b3b;
                text-decoration: none;
            }

            .premium-login-btn {
                width: 100%;
                height: 56px;
                border: none;
                border-radius: 18px;
                background: linear-gradient(90deg, #ee3e3e, #ff5c73);
                color: #fff;
                font-size: 18px;
                font-weight: 600;
                box-shadow: 0 10px 24px rgba(238, 62, 62, 0.20);
                transition: all 0.25s ease;
            }

            .premium-login-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 14px 30px rgba(238, 62, 62, 0.26);
                color: #fff;
            }

            .auth-trust-note {
                text-align: center;
                color: #7d7378;
                font-size: 14px;
                margin-top: 18px;
                margin-bottom: 0;
                letter-spacing: 0;
            }

            .auth-signup-text {
                text-align: center;
                margin-top: 24px;
                margin-bottom: 6px;
                color: #584e54;
                font-size: 16px;
            }

            .auth-signup-text a {
                color: #b63a36;
                font-weight: 700;
                text-decoration: none;
            }

            .auth-signup-text a:hover {
                color: #e63b3b;
                text-decoration: none;
            }

            .auth-divider {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 14px;
                margin-top: 18px;
                margin-bottom: 0;
                color: #887d83;
                font-size: 15px;
                font-weight: 500;
            }

            .auth-divider::before,
            .auth-divider::after {
                content: "";
                flex: 1;
                height: 1px;
                background: #ddd3d3;
            }

           @media (max-width: 576px) {
                .section-2.user-page.main-padding.auth-right-panel {
                    padding: 18px 12px;
                }

                .login-box {
                    border-radius: 18px;
                    padding: 54px 16px 18px;
                }

                .auth-top-logo-pill {
                    min-width: 150px;
                    height: 38px;
                    font-size: 16px;
                    top: -16px;
                }

                .auth-form-title {
                    font-size: 24px;
                }

                .auth-form-small-heading {
                    font-size: 16px;
                }

                .auth-form-subtitle-center {
                    font-size: 14px;
                    margin-bottom: 18px;
                }

                .premium-input {
                    height: 52px;
                    font-size: 14px !important;
                    padding: 0 42px 0 44px !important;
                }

                .premium-login-btn {
                    height: 52px;
                    font-size: 16px;
                }

                .checkbox-reset {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 8px;
                }

                .auth-signup-text {
                    font-size: 14px;
                }

                .auth-divider {
                    font-size: 13px;
                }
            }

            .brand-red {
                color: #b0302e;
                font-weight: 700;
            }

            .auth-right-panel::before {
                content: "";
                position: absolute;
                inset: 0;
                background-image:
                    radial-gradient(rgba(255,255,255,0.55) 0.8px, transparent 0.8px);
                background-size: 6px 6px;
                opacity: 0.25;
                pointer-events: none;
            }

            .auth-right-panel::after {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    radial-gradient(circle at 85% 20%, rgba(255, 170, 170, 0.22), transparent 18%),
                    radial-gradient(circle at 15% 80%, rgba(255, 255, 255, 0.35), transparent 18%);
                pointer-events: none;
            }

            .auth-top-logo-pill {
                position: absolute;
                top: -18px;
                left: 50%;
                transform: translateX(-50%);
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 180px;
                height: 42px;
                padding: 0 22px;
                border-radius: 16px;
                background: rgba(255,255,255,0.92);
                border: 1px solid rgba(236, 216, 216, 0.9);
                box-shadow: 0 8px 18px rgba(120, 90, 90, 0.08);
                color: #453330;
                font-size: 18px;
                font-weight: 500;
                z-index: 4;
                text-decoration: none !important;
                cursor: pointer;
            }

            .auth-top-logo-pill:hover {
                text-decoration: none !important;
                color: #453330;
            }

            .auth-feature-list-bottom {
                margin-top: 34px;
            }

            @media (max-width: 991px) {
                .auth-left-panel {
                    display: none;
                }

                .auth-right-column {
                    min-height: 100vh;
                    width: 100%;
                }

                .section-2.user-page.main-padding.auth-right-panel {
                    min-height: 100vh;
                    padding: 24px 16px;
                }

                .login-sec {
                    max-width: 100%;
                }

                .login-box {
                    max-width: 100%;
                    border-radius: 22px;
                    padding: 60px 20px 20px;
                }

                .auth-form-title {
                    font-size: 28px;
                }

                .auth-form-small-heading {
                    font-size: 18px;
                }
            }

            .auth-right-column {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 0;
            }

        </style>
        
    </head>
    <body>  
        <div class="inner-wrapper">
            <div class="container-fluid no-padding">
                <div class="row no-gutters overflow-auto">
                    <div class="col-lg-6 auth-left-panel">
                        <div class="main-banner">
                            <img src="<?php echo base_url(); ?>assets/img/banner/premium-bg.jpg" class="img-fluid full-width main-img" alt="TaskRabbit Login Banner">

                            <div class="auth-left-content">
                                <div class="auth-brand-badge"><span class="brand-red">TASK</span>RABBIT TRUSTED SERVICES</div>

                                <h1 class="auth-left-title">
                                    Trusted Services, Delivered With Premium Care
                                </h1>

                                <p class="auth-left-text">
                                    Access verified professionals for home services, repairs, digital work and everyday tasks —
                                    all in one premium booking experience designed for speed, trust and convenience.
                                </p>
                                <div class="auth-feature-list auth-feature-list-bottom">
                                    <div class="auth-feature-chip"><span>✔</span> Verified Providers</div>
                                    <div class="auth-feature-chip"><span>🔒</span> Secure Booking</div>
                                    <div class="auth-feature-chip"><span>🎧</span> 24/7 Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 auth-right-column">
                        <div class="section-2 user-page main-padding auth-right-panel">
                            <div class="login-sec" id="login_form">
                                <div class="login-box">
                                    <form method="post" name="user_login" action="<?php echo base_url('Log-in'); ?>" novalidate autocomplete="off" id="userLoginForm">
                                        <input type="hidden" name="login" value="1">

                                        <a href="<?php echo base_url(); ?>" class="auth-top-logo-pill"><span class="brand-red">TASK</span>RABBIT</a>

                                        <!-- <div class="auth-card-mini-badge">TASKRABBIT</div> -->
                                        <h2 class="auth-form-title auth-form-title-main">Welcome Back</h2>
                                        <h3 class="auth-form-small-heading">Sign in to your account</h3>
                                        <p class="auth-form-subtitle auth-form-subtitle-center">
                                            Continue to manage your bookings, access verified services and enjoy a seamless TaskRabbit experience.
                                        </p>
                                        <?php if (!empty($error)) { ?>
                                            <div class="auth-error-box">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <?php
                                                if(form_error("email"))
                                                {
                                            ?>
                                            <label class="auth-label form_vis_er0ror_text"><?php echo form_error("email"); ?></label>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                            <label class="auth-label">Email Address</label>
                                            <?php
                                                }
                                            ?>   

                                            <div class="premium-field-wrap has-left-icon has-right-icon">
                                                <span class="input-left-icon">✉</span>
                                                <input type="email" 
                                                    id="email"
                                                    name="email" 
                                                    class="form-control form-control-submit premium-input <?php
                                                            if(form_error("email"))
                                                            {
                                                                echo "form_vis_error";
                                                            }
                                                    ?>" 
                                                    placeholder="Enter your email address"
                                                    required
                                                    onblur="validateEmail('email')">
                                                <span class="valid-tick" id="tick_email">✔</span>
                                                <span class="input-right-icon">✉</span>
                                            </div>

                                            <small id="error_email" class="premium-error"></small>
                                        </div>

                                        <div class="form-group">
                                            <?php
                                                if(form_error("ps"))
                                                {
                                            ?>
                                            <label class="auth-label form_vis_error_text"><?php echo form_error("ps"); ?></label>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                            <label class="auth-label">Password</label>
                                            <?php
                                                }
                                            ?>   

                                            <div class="premium-field-wrap has-left-icon has-right-icon">
                                                <span class="input-left-icon">🔒</span>
                                                <input type="password" 
                                                    id="password-field" 
                                                    name="ps" 
                                                    class="form-control form-control-submit premium-input <?php
                                                            if(form_error("ps"))
                                                            {
                                                                echo "form_vis_error";
                                                            }                                                
                                                    ?>" 
                                                    placeholder="Enter your password"
                                                    required
                                                    onblur="validateLoginPassword('password-field')">

                                                <span class="valid-tick" id="tick_password-field">✔</span>
                                                <button type="button" class="field-icon" onclick="togglePasswordField('password-field', this)">👁</button>
                                            </div>

                                            <small id="error_password-field" class="premium-error"></small>
                                        </div>

                                        <div class="form-group checkbox-reset">
                                            <label class="custom-checkbox mb-0">
                                                <input type="checkbox" name="svp" value="yes"> <span class="checkmark"></span> Keep me signed in
                                            </label>
                                            <a id="login_forget" href="#">Reset password</a>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="premium-login-btn" name="login">
                                                Login
                                            </button>

                                            <p class="auth-trust-note">Safe access to your TaskRabbit account.</p>                                                            
                                        </div>
                                        
                                        <div class="form-group mb-0">
                                            <p class="auth-signup-text">
                                                Don’t have an account? <a href="<?php echo base_url("Sign-up"); ?>">Create Account</a>
                                            </p>
                                            <!-- <div class="auth-divider">Safe • Fast • Reliable</div> -->
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
function validateEmail(id) {

    var input = document.getElementById(id);
    var error = document.getElementById("error_" + id);

    if (!input) return true;

    var value = input.value.trim();

    input.value = value.toLowerCase();

    var regex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.(com|in|org|net|co\.in)$/;

    if (value === "") {

        error.innerHTML = "Please Enter Email.";

        input.classList.remove("input-valid");
        input.classList.add("input-invalid");

        return false;
    }

    if (!regex.test(value)) {

        error.innerHTML = "Enter valid email.";

        input.classList.remove("input-valid");
        input.classList.add("input-invalid");

        return false;
    }

    error.innerHTML = "";

    input.classList.remove("input-invalid");
    input.classList.add("input-valid");

    return true;
}
</script>
    </body>
</html>