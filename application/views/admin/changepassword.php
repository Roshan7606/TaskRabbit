<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Edit Profile|| MUNCHBOX - The Foodies Food</title>
        <?php
        $this->load->view('admin/headscript');
        ?>
    </head>
    <body>
        <?php
        $this->load->view('admin/head');
        ?>
        <section class="page">
            <?php
            $this->load->view('admin/sidebar');
            ?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>Edit Profile <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url('Admin-Home'); ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Edit Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-card margin-b-30">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Change Password</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" action="" method="post" name="change_ps">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="input100 ps-eye1 form-control" value="<?php
                                            if (!isset($success) && set_value("cps")) {
                                                echo set_value("cps");
                                            }
                                            ?>" name="cps" placeholder="Enter old password"  style="position: relative;" >
                                            <span class="focus-input100"></span>
                                            <a href="#" id="ps-eye1"  onclick="showpass('.ps-eye1', '.fa_eye1');" style="color: #000"><i class="far fa-eye fa_eye1" style="position: absolute;top:23.3%;right:6.9%;"></i></a></span>
                                            <br>
                                            <label>New Password</label>
                                            <input type="password" class="input100 ps-eye2 form-control <?php
                                            if (form_error("nps")) {
                                                echo "form_error";
                                            }
                                            ?>" value="<?php
                                            if (!isset($success) && set_value("nps")) {
                                                echo set_value("nps");
                                            }
                                            ?>" name="nps" placeholder="Enter New password"  style="position: relative;" >
                                            <span class="focus-input100"></span>
                                            <a href="#" id="ps-eye2" onclick="showpass('.ps-eye2', '.fa_eye2');" style="color: #000"><i class="far fa-eye fa_eye2" style="position: absolute;top:42%;right:6.9%;"></i></a></span>
                                            <br>
                                            <label>Confirm Password</label>
                                            <input type="password" class="input100 ps-eye3 form-control <?php
                                                   if (form_error("ncps")) {
                                                       echo "form_error";
                                                   }
                                            ?>" name="ncps" placeholder="Enter Confirm password"  style="position: relative;" >
                                            <span class="focus-input100"></span>
                                            <a href="#" id="ps-eye3" onclick="showpass('.ps-eye3', '.fa_eye3');" style="color: #000"><i class="far fa-eye fa_eye3" style="position: absolute;top:60.6%;right:6.9%;"></i></a></span>
                                            <br>
                                        </div>

                                        <button class="btn btnadd" name="add" value="add" type="submit" >Change Password</button>
                                       <button class="btn btnadd btn_clear"  type="reset">Clear</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-card margin-b-30">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Admin Profile</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" action="" method="post" name="change_profile" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12  mx-auto">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12 col-xs-12" style="margin-top: 4%;margin-left: 14%">
                                                            <label class="cover-img-pro" for="user-img-pro">
                                                                <div class="user-img-pro">
                                                                    <div class="img-overlay">
                                                                        <?php
                                                                        if($admin_detail[0]->profile=="")
                                                                        {
                                                                            ?>
                                                                        <img class="img" src="<?php echo base_url(); ?>admin_assets/images/admin_profile/avtar_default.jpg"  alt="">
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                        <img id="profile-cover" src="<?php echo base_url().$admin_detail[0]->profile; ?>" class="img" >
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        
                                                                        <i class="fas fa-camera icon" style="font-size: 25px;" title="Choose Profile Picture"></i>
                                                                        <input type="file" id="user-img-pro" name="admin_profile" onchange="readURL1(this);" style="display: none;">
                                                                        <p class="form-php-error"></p>
                                                                    </div>
                                                                </div>  
                                                            </label>                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <input type="submit" name="apply" value="Edit Profile" class="btn btnadd" style="margin-top: 2.2%;margin-left: 19%;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
        if (isset($success)) {
            ?>
            <div class="my_alert_success animated bounceInRight">
                <p>
                    <i class="fa fa-info-circle"></i> 
                    <b>Yeah, </b> <small><?php echo $success; ?></small>
                </p>
            </div>
            <?php
        }
        if (isset($error)) {
            ?>
            <div class="my_alert animated bounceInRight">
                <p>
                    <i class="fa fa-bell"></i> 
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
            function readURL1(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#profile-cover').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
    </body>
</html>




