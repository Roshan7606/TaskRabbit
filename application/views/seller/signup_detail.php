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

            .validation-error {
                color: #dc3545;
                font-size: 13px;
                margin-top: 6px;
                display: block;
            }

            .fixed-field {
                background: #f8f9fa !important;
                cursor: not-allowed;
            }
        </style>
    </head>
    <body>
        <div class="app">
            <div class="container-fluid p-h-0 p-v-0 bg full-height d-flex log-in-overlay">
                <div class="d-flex flex-column justify-content-between w-100">
                    <div class="container d-flex h-100" style="margin-bottom: 1%;">
                        <div class="row align-items-center w-100">
                            <div class="col-md-12 col-lg-8 m-h-auto">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between m-b-30">
                                            <h2 class="m-b-0 log-head">Other Details</h2>
                                        </div>

                                        <form method="post" action="" name="signup" id="sellerSignupDetailForm" novalidate>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label class="font-weight-semibold" for="ownname">Owner Name:</label>
                                                        <div class="premium-field-wrap">
                                                            <input
                                                                type="text"
                                                                autofocus
                                                                name="ownname"
                                                                id="ownname"
                                                                placeholder="Owner Name"
                                                                class="form-control premium-input <?php if (form_error('ownname')) { echo 'my_error input-invalid'; } ?>"
                                                                value="<?php echo set_value('ownname'); ?>"
                                                            >
                                                            <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_ownname" class="field-valid-icon" alt="valid"> -->
                                                        </div>
                                                        <small id="error_ownname" class="validation-error"><?php echo form_error("ownname"); ?></small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-semibold" for="ownmobile">Other Mobile No:</label>
                                                        <div class="premium-field-wrap">
                                                            <input
                                                                type="text"
                                                                name="ownmobile"
                                                                id="ownmobile"
                                                                maxlength="10"
                                                                placeholder="Other Mobile No"
                                                                class="form-control premium-input <?php if (form_error('ownmobile')) { echo 'my_error input-invalid'; } ?>"
                                                                value="<?php echo set_value('ownmobile'); ?>"
                                                            >
                                                            <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_ownmobile" class="field-valid-icon" alt="valid"> -->
                                                        </div>
                                                        <small id="error_ownmobile" class="validation-error"><?php echo form_error("ownmobile"); ?></small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-semibold" for="ownemail">Other Email:</label>
                                                        <div class="premium-field-wrap">
                                                            <input
                                                                type="email"
                                                                autocomplete="off"
                                                                id="ownemail"
                                                                name="ownemail"
                                                                placeholder="Other Email"
                                                                class="form-control premium-input <?php if (form_error('ownemail')) { echo 'my_error input-invalid'; } ?>"
                                                                value="<?php echo set_value('ownemail'); ?>"
                                                            >
                                                            <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_ownemail" class="field-valid-icon" alt="valid"> -->
                                                        </div>
                                                        <small id="error_ownemail" class="validation-error"><?php echo form_error("ownemail"); ?></small>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label class="font-weight-semibold">State:</label>
                                                        <input type="text" class="form-control fixed-field" value="Gujarat" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-semibold">City:</label>
                                                        <input type="text" class="form-control fixed-field" value="Surat" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-semibold" for="area">Area:</label>
                                                        <div class="premium-field-wrap">
                                                            <select
                                                                name="area"
                                                                id="area"
                                                                class="form-control premium-input <?php if (form_error('area')) { echo 'my_error input-invalid'; } ?>"
                                                            >
                                                                <option value="">Select Area</option>
                                                                <?php if (isset($surat_areas) && !empty($surat_areas)) { ?>
                                                                    <?php foreach ($surat_areas as $single) { ?>
                                                                        <option value="<?php echo $single->location_id; ?>" <?php echo set_select("area", $single->location_id); ?>>
                                                                            <?php echo $single->name; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                            <!-- <img src="<?php echo base_url(); ?>assets/img/tick.png" id="tick_area" class="field-valid-icon" alt="valid"> -->
                                                        </div>
                                                        <small id="error_area" class="validation-error"><?php echo form_error("area"); ?></small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-semibold"></label>
                                                        <div class="d-flex text-right justify-content-between p-t-15">
                                                            <button class="btn btn-primary signup-detail-btn" type="submit" name="signup" value="signup">Sign UP</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                        <?php if (isset($error)) { ?>
                                            <div class="alert my_alert alert-warning alert-dismissible fade in animated bounceInUp mt-3">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <i class="fa fa-bell"></i>
                                                <strong>Oops! </strong> <small><?php echo $error; ?></small>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $this->load->view("seller/footer"); ?>
                </div>
            </div>
        </div>

        <?php $this->load->view("seller/footerscript"); ?>
        <script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js" type="text/javascript"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var form = document.getElementById("sellerSignupDetailForm");
                var ownname = document.getElementById("ownname");
                var ownmobile = document.getElementById("ownmobile");
                var ownemail = document.getElementById("ownemail");
                var area = document.getElementById("area");

                if (ownmobile) {
                    ownmobile.addEventListener("input", function () { validatePhone("ownmobile"); });
                    ownmobile.addEventListener("blur", function () { validatePhone("ownmobile"); });
                }

                if (ownemail) {
                    ownemail.addEventListener("input", function () { validateEmail("ownemail"); });
                    ownemail.addEventListener("blur", function () { validateEmail("ownemail"); });
                }

                if (area) {
                    area.addEventListener("change", function () {
                        validateRequired("area", "Please Select Area");
                    });
                }

                if (form) {
                    form.addEventListener("submit", function (e) {
                        var isValid = true;

                        if (!validatePhone("ownmobile")) isValid = false;
                        if (!validateEmail("ownemail")) isValid = false;
                        if (!validateRequired("area", "Please Select Area")) isValid = false;

                        if (!isValid) {
                            e.preventDefault();
                        }
                    });
                }
            });
        </script>
    </body>
</html>