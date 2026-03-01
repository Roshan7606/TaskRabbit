<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Forgot Password</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
    </head>

    <body>
        <div class="app">
            <div class="container-fluid p-h-0 p-v-0 bg full-height d-flex log-in-overlay">
                <div class="d-flex flex-column justify-content-between w-100">
                    <div class="container d-flex h-100">
                        <div class="row align-items-center w-100">
                            <div class="col-md-7 col-lg-5 m-h-auto">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between m-b-30">
                                            <!--img class="img-fluid" alt="" src="<?php echo base_url(); ?>seller_assets/images/logo/logo.png"-->
                                            <h2 class="m-b-0 log-head">Forgot Password</h2>
                                        </div>
                                        <form method="post" autocomplete="off" action="" name="add">
                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="email">Email:</label>
                                                <input type="email" autofocus="" check_control="" class="form-control" name="email" id="email" placeholder="Email" >
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between p-t-10">
                                                    <input type="submit" class="btn btn-primary" value="Send Link" name="sendlink" style="margin-left: 70%;">
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 0">
                                                <a href="<?php echo base_url("Restaurant-Sign-Up"); ?>"><span class="log-c">&nbsp; Back to Sign In ?</span><span style="color: #003eff"><u> Sign In</u></span></a>
                                            </div>
                                            <br>
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
                        </div>
                    </div>
                    <?php
                    $this->load->view("seller/footer");
                    ?>
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
                    $(cls).removeClass("fa-eye-slash");
                    $(cls).addClass("fa-eye");
                    $c = 0;
                } else
                {
                    $(id).attr("type", "password");
                    $(id).attr("title", "Hide");
                    $(cls).css("color", "#000");
                    $(cls).removeClass("fa-eye");
                    $(cls).addClass("fa-eye-slash");
                    $c = 1;
                }

            }
        </script>
    </body>
</html>