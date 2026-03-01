
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant SignUp</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
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
                                            <!--img class="img-fluid" alt="" src="<?php echo base_url(); ?>seller_assets/images/logo/logo.png"-->
                                            <h2 class="m-b-0 log-head">Restaurant Signup</h2>
                                        </div>
                                        <form method="post" action="" name="signup">
                                            <div class="form-group">
                                                <?php
                                                if (form_error("resname")) {
                                                    ?>
                                                    <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("resname"); ?></label>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <label class="font-weight-semibold" for="restaurantname">Restaurant Name:</label>
                                                    <?php
                                                }
                                                ?>
                                                <input type="text" check_control="" autofocus="" name="resname" id="restaurantname" placeholder="Restaurant Name" class="form-control <?php
                                                if (form_error('resname')) {
                                                    echo 'my_error';
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value("resname")) {
                                                           echo set_value("resname");
                                                       }
                                                       ?>">
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                if (form_error("mobile")) {
                                                    ?>
                                                    <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("mobile"); ?></label>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <label class="font-weight-semibold" for="mobile">Mobile No:</label>
                                                    <?php
                                                }
                                                ?>
                                                <input type="text"  check_control="number" id="mobile" name="mobile" placeholder="Mobile No."F class="form-control <?php
                                                if (form_error('mobile')) {
                                                    echo 'my_error';
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value("mobile")) {
                                                           echo set_value("mobile");
                                                       }
                                                       ?>">
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                if (form_error("email")) {
                                                    ?>
                                                    <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("email"); ?></label>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <label class="font-weight-semibold" for="email">Email:</label>
                                                    <?php
                                                }
                                                ?>
                                                <input type="email" autocomplete="off" id="email" name="email" placeholder="Email" check_control="" class="form-control <?php
                                                if (form_error('email')) {
                                                    echo 'my_error';
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value("email")) {
                                                           echo set_value("email");
                                                       }
                                                       ?>">
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                if (form_error("ps")) {
                                                    ?>
                                                    <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("ps"); ?></label>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <label class="font-weight-semibold" for="ps">Password:</label>
                                                    <?php
                                                }
                                                ?>
                                                <input type="password" autocomplete="off" id="ps" name="ps" placeholder="Password" check_control="pwd" class="form-control ps-eye <?php
                                                if (form_error('ps')) {
                                                    echo 'my_error';
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value("ps")) {
                                                           echo set_value("ps");
                                                       }
                                                       ?>">
                                                <span class="focus-input100"></span>
                                                <a href="#" id="ps-eye2"  onclick="showpass('.ps-eye', '.fa_eye2');" style="color: #000"><i class="far fa-eye fa_eye2" style="position: absolute;top:68%;right:9%;"></i></a>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between p-t-15">
                                                    <div class="checkbox">
                                                        <input id="checkbox" checked="" type="checkbox">
                                                        <label for="checkbox"><span>I have read the <a href="<?php echo base_url("Terms-condition"); ?>" class="log-arg">agreement</a></span></label>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit" name="signup" value="signup">Next</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="<?php echo base_url("Restaurant-Sign-In"); ?>"><span class="log-c">Already have an account ?</span><span class="text-primary"><u> LOG IN</u></span></a>
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
                <div class="d-none d-md-flex  p-h-40 justify-content-between">
                    <span class="">All Rights © <?php echo date('Y'); ?> Reserved , Design & Developed By <a href="#" class="text-red"><b>MUNCHBOX</b></a></span>
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
        
        <!--script type="text/javascript">
            $(document).ready(function(){
                $("#ps").val("");
            });
        </script-->
        <script>
            $c = 1;
            function showpass(id, cls)
            {
                if ($c == 1)
                {
                    $(id).attr("type", "text");
                    $(id).attr("title", "Show");
                    $(cls).css("color", "red");
                    $(cls).removeClass("fa-eye");
                    $(cls).addClass("fa-eye-slash");
                    $c = 0;
                } else
                {
                    $(id).attr("type", "password");
                    $(id).attr("title", "Hide");
                    $(cls).css("color", "#000");
                    $(cls).removeClass("fa-eye-slash");
                    $(cls).addClass("fa-eye");
                    $c = 1;
                }

            }
        </script>
        <?php
        $this->load->view("seller/footerscript");
        ?>
    </body>
</html>