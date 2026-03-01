<html lang="en">
    <head>
        <title>Admin Forgotpassword || MUNCHBOX - The Foodies Food</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        require_once './headscript.php';
        ?>
       
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url(images/blog-7.jpg);">
                        <span class="login100-form-title-1">
                            Admin Forgot Password
                        </span>
                    </div>
                    <form class="login100-form validate-form">
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Email id is required">
                            <input class="input100" type="text" name="email" placeholder="Enter Email ID">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                <input class="" id="ckb1" type="" name="remember-me">
                                <label class="" for="ckb1">

                                </label>
                            </div>
                            <div>
                                <a href="index.php" class="txt1" style="color: red">
                                    Back to signin page?
                                </a>
                            </div>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Send Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        require_once './footscript.php';
        ?>
    </body>
</html>
