                                                                                                        <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Editprofile</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                <?php
                $this->load->view("seller/head");
                $this->load->view("seller/sidebar");
                ?>
                <!-- Page Container START -->
                <div class="page-container">


                    <!-- Content Wrapper START -->
                    <div class="main-content">
<div class="page-header">
                            <h2 class="header-title"></h2>
                            <div class="header-sub-title">
                                <nav class="breadcrumb breadcrumb-dash">
                                    <a href="<?php echo base_url("Restaurant-Home"); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                  <a class="breadcrumb-item" href="#">Setting</a>
                                    <a class="breadcrumb-item" href="#">Change Password</a>
                                </nav>
                            </div>
                        </div>
                        <div class="container">
                            <div class="tab-content m-t-15 row">
                                <div class="tab-pane fade show active col-md-6" >
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Change Password</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post" autocomplete="off">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="font-weight-semibold" for="oldPassword">Old Password:</label>
                                                        <input type="password" check_control="pwd" value="<?php
                                                        if (!isset($success) && set_value("cps")) {
                                                            echo set_value("cps");
                                                        }
                                                        ?>" name="cps" title="Only Alphabet OR Numbers Allow" autofocus="" class="input100 ps-eye1 form-control" placeholder="Enter Old Password"  style="position: relative;" >
                                                        <span class="focus-input100"></span>
                                                        <a href="#" id="ps-eye1"  onclick="showpass('.ps-eye1', '.fa_eye1');" style="color: #000"><i class="far fa-eye fa_eye1" style="position: absolute;top:60%;right:5%;"></i></a></span>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="font-weight-semibold" for="newPassword">New Password:</label>
                                                        <input type="password" check_control="pwd" <?php
                                                        if (form_error("nps")) {
                                                            echo "form_error";
                                                        }
                                                        ?> value="<?php
                                                               if (!isset($success) && set_value("nps")) {
                                                                   echo set_value("nps");
                                                               }
                                                               ?>" name="nps" title="Only Alphabet OR Numbers Allow" class="input100 ps-eye2 form-control" placeholder="Enter New Password"  style="position: relative;" >
                                                        <span class="focus-input100"></span>
                                                        <a href="#" id="ps-eye2"  onclick="showpass('.ps-eye2', '.fa_eye2');" style="color: #000"><i class="far fa-eye fa_eye2" style="position: absolute;top:60%;right:5%;"></i></a></span>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                                                        <input type="password" check_control="pwd" <?php
                                                        if (form_error("ncps")) {
                                                            echo "form_error";
                                                        }
                                                        ?> name="ncps" title="Only Alphabet OR Numbers Allow" class="input100 ps-eye3 form-control" placeholder="Enter Confirm Password"  style="position: relative;" >
                                                        <span class="focus-input100"></span>
                                                        <a href="#" id="ps-eye3"  onclick="showpass('.ps-eye3', '.fa_eye3');" style="color: #000"><i class="far fa-eye fa_eye3" style="position: absolute;top:60%;right:5%;"></i></a></span>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button class="btn m-t-30 btnadd" name="add" value="add" type="submit">Change Password</button>
                                                        <button class="btn m-t-30 btncancel" type="reset">Cancel</button>
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
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Wrapper END -->

        <?php
        $this->load->view("seller/footer");
        ?>
    </div>
    <!-- Page Container END -->
    <?php
    $this->load->view("seller/footerscript");
    ?>
</body>
</html>