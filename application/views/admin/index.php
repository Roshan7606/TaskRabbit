<html lang="en">
    <head>
        <title>Admin SignIn || MUNCHBOX - The Foodies Food</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        $this->load->view('admin/headscript');
        ?>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/css/fontawesome-free-5.10.1-web/css/all.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/css/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 <?php if (isset($error)) { ?>animated shake <?php } ?> ">
                    <div class="login100-form-title" style="background-image: url(<?php echo base_url(); ?>/admin_assets/images/blog-10.jpg);">
                        <span class="login100-form-title-1">
                            Admin Sign In
                        </span>
                    </div>
                    <form class="login100-form validate-form" name="login" method="post" action="" autocomplete="off">
                        <div class="wrap-input100 m-b-26">
                            <span class="label-input100">Username</span>
                            <input class="input100 <?php
                            if(form_error("username"))
                            {
                                echo "form_error_admin";
                            }
                            ?>" type="text" name="username" placeholder="Enter Email" value="<?php
                            if ($this->input->cookie("admin_username")) {
                                echo $this->input->cookie("admin_username");
                            }
                            ?>">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100  m-b-18"  style="position: relative;">
                            <span class="label-input100">Password</span>
                            <input class="input100 ps-eye3" type="password" name="ps" placeholder="Enter password" value="<?php
                            if ($this->input->cookie("admin_password")) {
                                echo $this->input->cookie("admin_password");
                            }
                            ?>">
                            <span class="focus-input100"></span>
                            <a href="#" id="ps-eye3" onclick="showpass('.ps-eye3', '.fa_eye3');" style="color: #000"><i class="far fa-eye fa_eye3" style="position: absolute;top:50%;right:4%;"></i></a>
                        </div>

                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" value="yes" name="svp" <?php
                            if ($this->input->cookie("admin_username")) {
                                echo "checked";
                            }
                            ?>>
                                <label class="label-checkbox100" for="ckb1" >
                                    Remember me
                                </label>
                            </div>

                            <div>
                                <a href="<?php echo base_url(); ?>forgotpassword.php" class="txt1" style="color: red">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="login" value="login">
                                Log In
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
if (isset($error)) {
    ?>
            <div class="my_alert animated bounceInRight">
                <p>
                    <i class="fa fa-info-circle"></i> 
                    <b>Oops, </b> <small><?php echo $error; ?></small>
                </p>
            </div>
    <?php
}
?>
        <?php
        $this->load->view('admin/footscript');
        ?>
        <script>
            $c = 1;
            $('#ps-eye').click(function () {
                if ($c == 1)
                {
                    $('.ps-eye').attr("type", "text");
                    $('.ps-eye i').css("color", "red");
                    $('.ps-eye i').removeClass("far fa-eye");
                    $('.ps-eye i').addClass("far fa-eye-slash");
                    $c = 0;
                } else
                {
                    $('.ps-eye').attr("type", "password");
                    $('.ps-eye i').css("color", "#000");
                    $('.ps-eye i').removeClass("far fa-eye-slash");
                    $('.ps-eye i').addClass("far fa-eye");
                    $c = 1;
                }
            })
        </script>
    </body>
</html>
