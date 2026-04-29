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
                margin: 0;
                padding: 0;
                background: #f6f3f3;
                font-family: 'Poppins', sans-serif;
                overflow-x: hidden;
            }

            .premium-auth-wrap {
                min-height: 100vh;
                display: flex;
                flex-wrap: wrap;
                background: #f6f3f3;
                width: 100%;
            }

            .premium-auth-left,
            .premium-auth-right {
                width: 50%;
                min-height: 100vh;
            }

            .premium-auth-left {
                position: relative;
                background: linear-gradient(rgba(32, 18, 14, 0.62), rgba(32, 18, 14, 0.62)),
                            url('<?php echo base_url(); ?>assets/img/banner/premium-bg.jpg') center center/cover no-repeat;
                display: flex;
                align-items: center;
                padding: 32px 30px;
            }

            .premium-left-content {
                max-width: 600px;
                color: #fff;
                width: 100%;
            }

            .premium-badge {
                display: inline-block;
                padding: 9px 16px;
                border-radius: 14px;
                background: rgba(255,255,255,0.92);
                color: #5a3e39;
                font-size: 13px;
                font-weight: 500;
                letter-spacing: 0.25px;
                margin-bottom: 18px;
            }

            .premium-badge strong {
                color: #cb4b45;
                font-weight: 700;
            }

            .premium-left-content h1 {
                font-size: 46px;
                line-height: 1.05;
                font-weight: 800;
                color: #fff;
                margin-bottom: 16px;
            }

            .premium-left-content p {
                font-size: 13px;
                line-height: 1.7;
                color: rgba(255,255,255,0.94);
                max-width: 560px;
                margin-bottom: 18px;
            }

            .premium-chip-group {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .premium-chip {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 10px 15px;
                border-radius: 14px;
                background: rgba(255,255,255,0.10);
                border: 1px solid rgba(255,255,255,0.22);
                color: #fff;
                font-size: 12px;
                font-weight: 600;
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
                box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            }

            .premium-auth-right {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 16px 12px;
                background: #f6f3f3;
            }

            .premium-register-card {
                width: 100%;
                max-width: 450px;
                background: rgba(255,255,255,0.82);
                border: 1px solid rgba(255,255,255,0.9);
                border-radius: 4px;
                box-shadow: 0 14px 40px rgba(30, 22, 20, 0.10);
                padding: 34px 20px 18px;
                position: relative;
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
            }

            .premium-register-topline {
                position: absolute;
                top: 0;
                left: 20px;
                right: 20px;
                height: 8px;
                background: linear-gradient(90deg, #ff5f72 0%, #ff4f69 100%);
                border-bottom-left-radius: 8px;
                border-bottom-right-radius: 8px;
            }

            .premium-register-pill {
                position: absolute;
                top: -13px;
                left: 50%;
                transform: translateX(-50%);
                background: rgba(255,255,255,0.97);
                border: 1px solid rgba(0,0,0,0.06);
                border-radius: 18px;
                padding: 7px 22px;
                font-size: 13px;
                font-weight: 700;
                color: #6f6a70;
                box-shadow: 0 8px 24px rgba(0,0,0,0.08);
                white-space: nowrap;
                text-decoration: none !important;
                display: inline-block;
                cursor: pointer;
            }

            .premium-register-pill:hover {
                text-decoration: none !important;
                color: #6f6a70;
            }

            .premium-register-pill span {
                color: #c94741;
            }

            .premium-register-card h4 {
                font-size: 21px;
                line-height: 1.2;
                font-weight: 700;
                text-align: center;
                color: #20253f;
                margin-bottom: 6px;
                margin-top: 0;
            }

            .premium-register-subtitle {
                font-size: 12px;
                line-height: 1.6;
                text-align: center;
                color: #6f778c;
                max-width: 310px;
                margin: 0 auto 18px;
            }

            .premium-form-group {
                margin-bottom: 13px;
            }

            .premium-form-group label {
                display: block;
                font-size: 12px;
                font-weight: 600;
                color: #43465c;
                margin-bottom: 6px;
            }

            .premium-field-wrap {
                position: relative;
            }

            .premium-input {
                width: 100%;
                height: 40px;
                border-radius: 12px !important;
                border: 1.5px solid #d8d4d8 !important;
                background: rgba(255,255,255,0.82) !important;
                font-size: 13px !important;
                color: #23263a !important;
                padding: 0 38px 0 12px !important;
                box-shadow: none !important;
                transition: all 0.25s ease;
            }

            .premium-input:focus {
                border-color: #ff5a6f !important;
                box-shadow: 0 0 0 0.14rem rgba(255, 90, 111, 0.10) !important;
                background: #fff !important;
            }

            .premium-input.input-valid {
                border: 2px solid #28a745 !important;
                box-shadow: 0 0 0 0.12rem rgba(40, 167, 69, 0.15) !important;
            }

            .premium-input.input-invalid {
                border: 2px solid #dc3545 !important;
                box-shadow: 0 0 0 0.12rem rgba(220, 53, 69, 0.15) !important;
            }

            .premium-input::placeholder {
                color: #8a8f9f;
            }

            .premium-input-icon {
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                color: #8a7f80;
                font-size: 12px;
                z-index: 4;
                pointer-events: none;
            }

            .valid-tick {
                display: none;
                position: absolute;
                right: 30px;
                top: 50%;
                transform: translateY(-50%);
                color: #28a745;
                font-weight: bold;
                font-size: 11px;
                z-index: 5;
            }

            .premium-error {
                display: block !important;
                margin-top: 5px !important;
                font-size: 11px !important;
                color: #dc3545 !important;
                font-weight: 500 !important;
                min-height: 15px;
                line-height: 1.35;
            }

            .field-icon {
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                color: #8a7f80;
                z-index: 999;
                font-size: 12px;
                background: transparent;
                border: none;
                outline: none;
                padding: 0;
                line-height: 1;
            }

            .premium-checkbox-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 8px;
                margin: 2px 0 11px;
                flex-wrap: wrap;
            }

            .premium-check-label {
                display: flex;
                align-items: center;
                gap: 7px;
                font-size: 12px;
                font-weight: 600;
                color: #4c4f63;
                margin: 0;
                cursor: pointer;
            }

            .premium-check-label input {
                width: 14px;
                height: 14px;
                accent-color: #ff5a6f;
            }

            .premium-submit-btn {
                width: 100%;
                border: none;
                border-radius: 12px;
                height: 41px;
                font-size: 13px;
                font-weight: 700;
                color: #fff;
                background: linear-gradient(90deg, #ff434f 0%, #ff5f7c 100%);
                box-shadow: 0 12px 28px rgba(255, 87, 112, 0.22);
                transition: all 0.25s ease;
            }

            .premium-submit-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 16px 32px rgba(255, 87, 112, 0.26);
            }

            .premium-helper-text {
                text-align: center;
                font-size: 12px;
                color: #7a8090;
                margin: 11px 0 0;
                line-height: 1.5;
            }

            .premium-helper-text strong,
            .premium-helper-text a {
                color: #d14b43 !important;
                font-weight: 700;
                text-decoration: none !important;
            }

            .premium-terms {
                display: block;
                text-align: center;
                margin-top: 10px;
                font-size: 10px;
                line-height: 1.5;
                color: #7a8090;
            }

            .premium-terms a {
                color: #d14b43 !important;
                font-weight: 600;
                text-decoration: none !important;
            }

            .premium-alert {
                background: #f8d7da;
                color: #721c24;
                padding: 10px 12px;
                border: 1px solid #f5c6cb;
                border-radius: 8px;
                margin: 0 0 14px 0;
                font-size: 12px;
            }

            .form_vis_error_text {
                color: #dc3545 !important;
            }

            @media (min-width: 1200px) and (max-width: 1600px) {
                .premium-auth-left {
                    padding: 28px 26px;
                }

                .premium-left-content {
                    max-width: 540px;
                }

                .premium-left-content h1 {
                    font-size: 42px;
                }

                .premium-left-content p {
                    font-size: 12px;
                    max-width: 510px;
                }

                .premium-chip {
                    font-size: 11px;
                    padding: 9px 13px;
                }

                .premium-auth-right {
                    padding: 12px 10px;
                }

                .premium-register-card {
                    max-width: 420px;
                    padding: 30px 18px 16px;
                }
            }

            @media (max-width: 1199px) {
                .premium-auth-left,
                .premium-auth-right {
                    width: 100%;
                }

                .premium-auth-left {
                    min-height: auto;
                    padding: 34px 24px;
                }

                .premium-auth-right {
                    min-height: auto;
                    padding: 24px 16px 30px;
                }

                .premium-left-content {
                    max-width: 100%;
                }

                .premium-left-content h1 {
                    font-size: 40px;
                }

                .premium-left-content p {
                    font-size: 13px;
                    max-width: 100%;
                }

                .premium-register-card {
                    max-width: 480px;
                }
            }

            @media (max-width: 767px) {
                .premium-auth-left {
                    padding: 28px 16px;
                }

                .premium-auth-right {
                    padding: 18px 12px 24px;
                }

                .premium-register-card {
                    max-width: 100%;
                    padding: 32px 14px 18px;
                }

                .premium-register-topline {
                    left: 14px;
                    right: 14px;
                }

                .premium-register-pill {
                    font-size: 12px;
                    padding: 7px 18px;
                }

                .premium-left-content h1 {
                    font-size: 32px;
                    line-height: 1.12;
                }

                .premium-left-content p {
                    font-size: 13px;
                    line-height: 1.7;
                }

                .premium-chip {
                    width: 100%;
                    justify-content: flex-start;
                    font-size: 12px;
                }

                .premium-register-card h4 {
                    font-size: 20px;
                }

                .premium-register-subtitle {
                    font-size: 11px;
                    margin-bottom: 16px;
                }

                .premium-input {
                    height: 42px;
                    font-size: 13px !important;
                }

                .premium-submit-btn {
                    height: 42px;
                    font-size: 13px;
                }
            }

            @media (max-width: 575px) {
                .premium-auth-left {
                    padding: 24px 14px;
                }

                .premium-auth-right {
                    padding: 14px 8px 20px;
                }

                .premium-left-content h1 {
                    font-size: 28px;
                    line-height: 1.15;
                    margin-bottom: 14px;
                }

                .premium-left-content p {
                    font-size: 12px;
                    line-height: 1.65;
                    margin-bottom: 16px;
                }

                .premium-badge {
                    font-size: 12px;
                    padding: 8px 14px;
                    margin-bottom: 16px;
                    border-radius: 12px;
                }

                .premium-chip {
                    font-size: 11px;
                    padding: 9px 12px;
                    border-radius: 12px;
                }

                .premium-register-card {
                    padding: 30px 12px 16px;
                }

                .premium-register-pill {
                    font-size: 11px;
                    padding: 6px 16px;
                    top: -12px;
                }

                .premium-register-card h4 {
                    font-size: 18px;
                }

                .premium-register-subtitle {
                    font-size: 11px;
                    line-height: 1.55;
                    margin-bottom: 14px;
                }

                .premium-form-group label {
                    font-size: 11px;
                }

                .premium-input {
                    height: 40px;
                    font-size: 12px !important;
                    padding: 0 34px 0 11px !important;
                    border-radius: 11px !important;
                }

                .premium-submit-btn {
                    height: 40px;
                    font-size: 12px;
                    border-radius: 11px;
                }

                .premium-helper-text {
                    font-size: 11px;
                }

                .premium-terms {
                    font-size: 9px;
                }

                .valid-tick {
                    right: 28px;
                    font-size: 10px;
                }

                .premium-input-icon,
                .field-icon {
                    right: 10px;
                    font-size: 11px;
                }
            }
        </style>

    </head>

    <body>
        <div class="premium-auth-wrap">
            <div class="premium-auth-left">
                <div class="premium-left-content">
                    <div class="premium-badge">
                        <strong>TASK</strong>RABBIT TRUSTED SERVICES
                    </div>

                    <h1>Trusted Services,<br>Delivered With<br>Premium Care</h1>

                    <p>
                        Access verified professionals for home services, repairs, digital
                        work and everyday tasks — all in one premium booking experience
                        designed for speed, trust and convenience.
                    </p>

                    <div class="premium-chip-group">
                        <div class="premium-chip">✔ Verified Providers</div>
                        <div class="premium-chip">🔒 Secure Booking</div>
                        <div class="premium-chip">🎧 24/7 Support</div>
                    </div>
                </div>
            </div>

            <div class="premium-auth-right">
                <div class="premium-register-card">
                    <div class="premium-register-topline"></div>
                    <a href="<?php echo base_url(); ?>" class="premium-register-pill"><span>TASK</span>RABBIT</a>

                    <form name="user_register" method="post" action="<?php echo base_url('Sign-up'); ?>" novalidate autocomplete="off" id="userSignupForm">
                        <h4>Create your account</h4>
                        <p class="premium-register-subtitle">
                            Sign up to book trusted services, manage requests and enjoy a seamless TaskRabbit experience.
                        </p>

                        <?php if (!empty($error)) { ?>
                            <div class="premium-alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>

                        <div class="premium-form-group">
                            <?php if(form_error("name")) { ?>
                                <label class="form_vis_error_text"><?php echo form_error("name"); ?></label>
                            <?php } else { ?>
                                <label>Full name</label>
                            <?php } ?>

                            <div class="premium-field-wrap">
                                <input type="text"
                                       id="name"
                                       name="name"
                                       class="form-control premium-input <?php if(form_error("name")) { echo "form_vis_error"; } ?>"
                                       placeholder="Enter your full name"
                                       value="<?php if(!isset($success) && set_value('name')) { echo set_value('name'); } ?>"
                                       required
                                       onblur="validateName('name')">
                                <span class="valid-tick" id="tick_name">✔</span>
                                <span class="premium-input-icon">👤</span>
                            </div>
                            <small id="error_name" class="premium-error"></small>
                        </div>

                        <div class="premium-form-group">
                            <?php if(form_error("mobile")) { ?>
                                <label class="form_vis_error_text"><?php echo form_error("mobile"); ?></label>
                            <?php } else { ?>
                                <label>Mobile</label>
                            <?php } ?>

                            <div class="premium-field-wrap">
                                <input type="text"
                                       id="mobile"
                                       name="mobile"
                                       class="form-control premium-input <?php if(form_error("mobile")) { echo "form_vis_error"; } ?>"
                                       placeholder="Enter your mobile number"
                                       value="<?php if(!isset($success) && set_value('mobile')) { echo set_value('mobile'); } ?>"
                                       required
                                       onblur="validatePhone('mobile')">
                                <span class="valid-tick" id="tick_mobile">✔</span>
                                <span class="premium-input-icon">📞</span>
                            </div>
                            <small id="error_mobile" class="premium-error"></small>
                        </div>

                        <div class="premium-form-group">
                            <?php if(form_error("email")) { ?>
                                <label class="form_vis_error_text"><?php echo form_error("email"); ?></label>
                            <?php } else { ?>
                                <label>Email Address</label>
                            <?php } ?>

                            <div class="premium-field-wrap">
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control premium-input <?php if(form_error("email")) { echo "form_vis_error"; } ?>"
                                       placeholder="Enter your email address"
                                       value="<?php if(!isset($success) && set_value('email')) { echo set_value('email'); } ?>"
                                       required
                                       onblur="validateEmail('email')">
                                <span class="valid-tick" id="tick_email">✔</span>
                                <span class="premium-input-icon">✉</span>
                            </div>
                            <small id="error_email" class="premium-error"></small>
                        </div>

                        <div class="premium-form-group">
                            <?php if(form_error("ps")) { ?>
                                <label class="form_vis_error_text"><?php echo form_error("ps"); ?></label>
                            <?php } else { ?>
                                <label>Password</label>
                            <?php } ?>

                            <div class="premium-field-wrap">
                                <input type="password"
                                       id="password-field"
                                       name="ps"
                                       class="form-control premium-input <?php if(form_error("ps")) { echo "form_vis_error"; } ?>"
                                       placeholder="Enter your password"
                                       value="<?php if(!isset($success) && set_value('ps')) { echo set_value('ps'); } ?>"
                                       required
                                       onblur="validatePassword('password-field')">
                                <span class="valid-tick" id="tick_password-field">✔</span>
                                <button type="button" class="field-icon" onclick="togglePasswordField('password-field', this)">👁</button>
                            </div>
                            <small id="error_password-field" class="premium-error"></small>
                        </div>

                        <div class="premium-checkbox-row">
                            <label class="premium-check-label">
                                <input type="checkbox" name="#">
                                <span>Keep me signed in</span>
                            </label>
                        </div>

                        <div class="premium-form-group" style="margin-bottom:0;">
                            <input type="submit"
                                   name="add_register"
                                   class="premium-submit-btn"
                                   id="register_btn"
                                   value="Create Account">
                        </div>

                        <p class="premium-helper-text">
                            Already have an account?
                            <a href="<?php echo base_url("Log-in"); ?>"><strong>Sign in</strong></a>
                        </p>

                        <span class="premium-terms">
                            By creating your TaskRabbit account, you agree to the
                            <a href="Terms.php">Terms of Use</a> and
                            <a href="privacypolicy.php">Privacy Policy</a>.
                        </span>
                    </form>
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
                    var tick = document.getElementById("tick_" + id);
                    if (tick) tick.style.display = "none";
                    return false;
                }

                if (!regex.test(value)) {
                    error.innerHTML = "Enter valid email.";
                    input.classList.remove("input-valid");
                    input.classList.add("input-invalid");
                    var tick2 = document.getElementById("tick_" + id);
                    if (tick2) tick2.style.display = "none";
                    return false;
                }

                error.innerHTML = "";
                input.classList.remove("input-invalid");
                input.classList.add("input-valid");
                var tick3 = document.getElementById("tick_" + id);
                if (tick3) tick3.style.display = "block";

                return true;
            }
        </script>
    </body>
</html>