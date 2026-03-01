<?php 
//    echo $this->encryption->decrypt("acd55d944a1bd990579e20699951aaf1550ea1487cd64294a1873d7583b08a718fa3176077d6ad29e63eb78ffb9bb1db82140eb1f5d9e573ffe6a27cebd926c4S0/VxWau7Prz6Xly9MB/FdttkbJ09Hdt0KUCSttCmFU=");
//    die();
?>
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
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" class="height-62px">
                        </div>
                    </div>
                    
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                            <!--img class="img-fluid" alt="" src="<?php echo base_url(); ?>seller_assets/images/logo/logo.png"-->
                          
                                            <h2 class="m-b-0 log-head">Restaurant Signin</h2>
                                        </div>
                                        <form method="post" autocomplete="off" action="" name="add">
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
                                                <input type="email" autofocus="" check_control="" class="form-control <?php
                                                if (form_error("email")) {
                                                    echo "form_error_seller";
                                                }
                                                ?>" name="email" id="email" placeholder="Email" value="<?php
                                                       if ($this->input->cookie("seller_email")) {
                                                           echo $this->input->cookie("seller_email");
                                                       }
                                                       ?>">

                                            </div>
                                            <div class="form-group" style="position: relative;margin-bottom: 10px">
                                                <?php
                                                if (form_error("ps")) {
                                                    ?>
                                                    <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("ps"); ?></label>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <label class="font-weight-semibold" for="password">Password:</label>
                                                    <?php
                                                }
                                                ?>
                                                <input type="password" check_control="pwd" class="form-control ps-eye <?php
                                                if (form_error("ps")) {
                                                    echo "form_error_seller";
                                                }
                                                ?> " name="ps" id="password" placeholder="Password" value="<?php
                                                       if ($this->input->cookie("seller_password")) {
                                                           echo $this->input->cookie("seller_password");
                                                       }
                                                       ?>">

                                                <span class="focus-input100"></span>
                                                <a href="#" id="ps-eye2"  onclick="showpass('.ps-eye', '.fa_eye2');" style="color: #000"><i class="far fa-eye fa_eye2" style="position: absolute;top:62%;right:5%;"></i></a>
                                            </div>
                                            <div class="form-group" >
                                                <a href="<?php echo base_url("Restaurant-Forgot-Password"); ?>">&nbsp;Forgot Password</a>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between p-t-15">
                                                    <div class="checkbox">
                                                        <input id="checkbox" name="svp" value="yes" type="checkbox" <?php
                                                        if ($this->input->cookie("seller_email")) {
                                                            echo "checked";
                                                        }
                                                        ?>>
                                                        <label for="checkbox"><span>Remember Me</span></label>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" value="Sign In" name="login">

                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <a href="<?php echo base_url("Restaurant-Sign-Up"); ?>"><span class="log-c">Dont't have an Account ?</span><span class="text-primary"><u> Register</u></span></a>
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
        

        <?php
        $this->load->view("seller/footerscript");
        ?>
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
    </body>
</html>