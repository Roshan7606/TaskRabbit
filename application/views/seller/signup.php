<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant SignUp</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <style>
            .premium-field-wrap {
                position: relative;
            }

            .premium-input.input-valid {
                border: 2px solid #28a745 !important;
                box-shadow: 0 0 0 0.12rem rgba(40, 167, 69, 0.15);
                padding-right: 42px;
            }

            .premium-input.input-invalid {
                border: 2px solid #dc3545 !important;
                box-shadow: 0 0 0 0.12rem rgba(220, 53, 69, 0.15);
            }

            .field-valid-icon {
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                width: 18px;
                height: 18px;
                display: none;
                z-index: 5;
            }

            .field-icon {
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                border: none;
                background: transparent;
                cursor: pointer;
                font-size: 16px;
                color: #555;
                padding: 0;
                z-index: 6;
            }

            .validation-error {
                color: #dc3545;
                font-size: 13px;
                margin-top: 6px;
                display: block;
            }
        </style>
    </head>
    <body>
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
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between m-b-30">
                                            <h2 class="m-b-0 log-head">Service Provider Signup</h2>
                                        </div>

                                        <form method="post" action="" name="signup" id="sellerSignupForm" novalidate>
                                            
                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="resname">Restaurant Name:</label>
                                                <div class="premium-field-wrap">
                                                    <input
                                                        type="text"
                                                        autofocus
                                                        name="resname"
                                                        id="resname"
                                                        placeholder="Restaurant Name"
                                                        class="form-control premium-input <?php if (form_error('resname')) { echo 'my_error input-invalid'; } ?>"
                                                        value="<?php
                                                        if (!isset($success) && set_value("resname")) {
                                                            echo set_value("resname");
                                                        }
                                                        ?>"
                                                    >
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_resname" class="field-valid-icon" alt="valid"> -->
                                                </div>

                                                <?php if (form_error("resname")) { ?>
                                                    <small id="error_resname" class="validation-error"><?php echo form_error("resname"); ?></small>
                                                <?php } else { ?>
                                                    <small id="error_resname" class="validation-error"></small>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="mobile">Mobile No:</label>
                                                <div class="premium-field-wrap">
                                                    <input
                                                        type="text"
                                                        name="mobile"
                                                        id="mobile"
                                                        placeholder="Mobile No."
                                                        maxlength="10"
                                                        class="form-control premium-input <?php if (form_error('mobile')) { echo 'my_error input-invalid'; } ?>"
                                                        value="<?php
                                                        if (!isset($success) && set_value("mobile")) {
                                                            echo set_value("mobile");
                                                        }
                                                        ?>"
                                                    >
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_mobile" class="field-valid-icon" alt="valid"> -->
                                                </div>

                                                <?php if (form_error("mobile")) { ?>
                                                    <small id="error_mobile" class="validation-error"><?php echo form_error("mobile"); ?></small>
                                                <?php } else { ?>
                                                    <small id="error_mobile" class="validation-error"></small>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="email">Email:</label>
                                                <div class="premium-field-wrap">
                                                    <input
                                                        type="email"
                                                        autocomplete="off"
                                                        id="email"
                                                        name="email"
                                                        placeholder="Email"
                                                        class="form-control premium-input <?php if (form_error('email')) { echo 'my_error input-invalid'; } ?>"
                                                        value="<?php
                                                        if (!isset($success) && set_value("email")) {
                                                            echo set_value("email");
                                                        }
                                                        ?>"
                                                    >
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_email" class="field-valid-icon" alt="valid"> -->
                                                </div>

                                                <?php if (form_error("email")) { ?>
                                                    <small id="error_email" class="validation-error"><?php echo form_error("email"); ?></small>
                                                <?php } else { ?>
                                                    <small id="error_email" class="validation-error"></small>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="ps">Password:</label>
                                                <div class="premium-field-wrap">
                                                    <input
                                                        type="password"
                                                        autocomplete="off"
                                                        id="ps"
                                                        name="ps"
                                                        placeholder="Password"
                                                        class="form-control premium-input <?php if (form_error('ps')) { echo 'my_error input-invalid'; } ?>"
                                                        value="<?php
                                                        if (!isset($success) && set_value("ps")) {
                                                            echo set_value("ps");
                                                        }
                                                        ?>"
                                                    >
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_ps" class="field-valid-icon" alt="valid"> -->
                                                    <button type="button" class="field-icon" onclick="togglePasswordField('ps', this)">👁</button>
                                                </div>

                                                <?php if (form_error("ps")) { ?>
                                                    <small id="error_ps" class="validation-error"><?php echo form_error("ps"); ?></small>
                                                <?php } else { ?>
                                                    <small id="error_ps" class="validation-error"></small>
                                                <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between p-t-15">
                                                    <div class="checkbox">
                                                        <input id="checkbox" checked type="checkbox">
                                                        <label for="checkbox">
                                                            <span>I have read the <a href="<?php echo base_url("Terms-condition"); ?>" class="log-arg">agreement</a></span>
                                                        </label>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit" name="signup" value="signup">Next</button>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <a href="<?php echo base_url("Restaurant-Sign-In"); ?>">
                                                    <span class="log-c">Already have an account ?</span>
                                                    <span class="text-primary"><u> LOG IN</u></span>
                                                </a>
                                            </div>

                                            <div class="col-lg-12">
                                                <?php
                                                if (isset($success)) {
                                                    ?>
                                                    <div class="alert my_alert_success alert-success alert-dismissible fade in animated bounceInDown">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <i class="fa fa-info-circle"></i> 
                                                        <strong>Yeah, </strong> <small><?php echo $success; ?></small>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert my_alert alert-warning alert-dismissible fade in animated bounceInUp">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <i class="fa fa-bell"></i> 
                                                        <strong>Oops! </strong> <small><?php echo $error; ?></small>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="offset-md-1 col-md-6 d-none d-md-block">
                                <img class="img-fluid" src="<?php echo base_url(); ?>seller_assets/images/others/undraw_Chef_cu0r.svg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="d-none d-md-flex p-h-40 justify-content-between">
                        <span>All Rights © <?php echo date('Y'); ?> Reserved , Design & Developed By <a href="#" class="text-red"><b>TaskRabbit</b></a></span>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-dark text-link" href="<?php echo base_url("Privacy-policy"); ?>">Privacy Policy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-dark text-link" href="<?php echo base_url("Terms-condition"); ?>">Terms & Condition</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $this->load->view("seller/footerscript");
        ?>

        <script>
            function togglePasswordField(inputId, btn) {
                var input = document.getElementById(inputId);
                if (!input) return;

                if (input.type === "password") {
                    input.type = "text";
                    btn.innerHTML = "🙈";
                } else {
                    input.type = "password";
                    btn.innerHTML = "👁";
                }
            }

            document.addEventListener("DOMContentLoaded", function () {
                var form = document.getElementById("sellerSignupForm");
                var resname = document.getElementById("resname");
                var mobile = document.getElementById("mobile");
                var email = document.getElementById("email");
                var password = document.getElementById("ps");

                if (resname) {
                    resname.addEventListener("input", function () {
                        validateName("resname");
                    });
                    resname.addEventListener("blur", function () {
                        validateName("resname");
                    });
                }

                if (mobile) {
                    mobile.addEventListener("input", function () {
                        validatePhone("mobile");
                    });
                    mobile.addEventListener("blur", function () {
                        validatePhone("mobile");
                    });
                }

                if (email) {
                    email.addEventListener("input", function () {
                        validateEmail("email");
                    });
                    email.addEventListener("blur", function () {
                        validateEmail("email");
                    });
                }

                if (password) {
                    password.addEventListener("input", function () {
                        validatePassword("ps");
                    });
                    password.addEventListener("blur", function () {
                        validatePassword("ps");
                    });
                }

                if (form) {
                    form.addEventListener("submit", function (e) {
                        var isValid = true;

                        if (!validateName("resname")) isValid = false;
                        if (!validatePhone("mobile")) isValid = false;
                        if (!validateEmail("email")) isValid = false;
                        if (!validatePassword("ps")) isValid = false;

                        if (!isValid) {
                            e.preventDefault();
                        }
                    });
                }
            });
        </script>
    </body>
</html>