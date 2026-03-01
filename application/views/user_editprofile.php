<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Edit Profile | Munchbox-Foodies food</title>
        <?php
        $this->load->view("CSS");
        ?>
    </head>

    <body style="background: #F3F3F3;">
        <!-- Navigation -->
        <?php
            $this->load->view("header");
        ?>

        <div class="main-sec" style="height: 70px;">

        </div>
      <?php
      $this->load->view("user_profile_top");
      ?>  

        
        
        <div class="container" style="margin-bottom: 20px;">
            <div class="row">
                <?php
                    $this->load->view("user_profile_sidebar");
                ?>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="user-menu-display">
                        <h2>Edit Profile</h2>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h5>
                            Edit User Detail
                        </h5>
                        <div class="user-line">
                        </div>
                        <div class="user-ch-ps">
                            <form method="post" name="Edit_detail" action="">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      
                                        <input type="text" title="Full Name" name="name" id="user-ch-ps1" class="form-control <?php 
                                            if(form_error("name"))
                                            {
                                                echo "form_vis_error";
                                            }
                                        ?>" value="<?php
                                        if(!isset($success) && set_value("name"))
                                        {
                                            echo set_value("name");
                                        }
                                        else
                                        {
                                            echo $user_detail[0]->name;
                                        } ?>">
                                        <p class="form_vis_error_text"><?php
                                            if(form_error("name"))
                                            {
                                               echo form_error("name");
                                            }
                                        ?></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" title="Email" check_control="alpha" name="email" id="user-ch-ps2" class="form-control <?php 
                                            if(form_error("email"))
                                            {
                                                echo "form_vis_error";
                                            }
                                        ?>" value="<?php
                                        if(!isset($success) && set_value("email"))
                                        {
                                            echo set_value("email");
                                        }
                                        else
                                        {
                                            echo $user_detail[0]->email;
                                        } ?>">
                                        <p class="form_vis_error_text"><?php
                                            if(form_error("email"))
                                            {
                                               echo form_error("email");
                                            }
                                        ?></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" title="Contact No" name="mobile" id="user-ch-ps3" class="form-control <?php 
                                            if(form_error("mobile"))
                                            {
                                                echo "form_vis_error";
                                            }
                                        ?>" value="<?php
                                        if(!isset($success) && set_value("mobile"))
                                        {
                                            echo set_value("mobile");
                                        }
                                        else
                                        {
                                            echo $user_detail[0]->contact_no;
                                        } ?>">
                                        <p class="form_vis_error_text"><?php
                                            if(form_error("mobile"))
                                            {
                                               echo form_error("mobile");
                                            }
                                        ?></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="submit" name="edit_user_detail" value="Edit Detail" class="btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h5>
                            Edit Profile Picture
                        </h5>
                        <div class="user-line">
                        </div>
                        <div class="user-ch-ps">
                            <form method="post" name="Edit profile" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="user-img">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <center>
                                                    <img id="user_img_profile" src="<?php
                                                if($user_detail[0]->profile == "")
                                                    {
                                                        echo base_url()."assets/img/user.png";
                                                    }
                                                    else
                                                    {
                                                        echo base_url().$user_detail[0]->profile;
                                                    }
                                                ?>" class="profile">
                                                <label for="user_img" title="Choose Profile Picture"><i class="fa fa-camera user-img-icon"></i></label>

                                                <input type="file" id="user_img" name="user_img" onchange="readURL(this)" style="display: none;">
                                                
                                        
                                                   
                                                </center>
                                                <div class="">
                                                </div>
                                               
                                            </form>
                                        </div>
                                        <center>
                                            <input type="submit" name="edit_profile_picture" value="Edit Profile Picture" class="btn" style="margin-top: 20px;">
                                        </center>
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
<?php
    $this->load->view("footer");
?>
        <?php
            if(isset($success))
            {
        ?>
        <div class="add-success-message animated bounceInDown ">
            <img src="<?php echo base_url(); ?>assets/img/animated-gif/782-check-mark-success.gif">
            <p><?php echo $success; ?></p>
        </div>
        <?php
            }
        ?>
        <?php
            if(isset($error))
            {
        ?>
        <div class="add-alert-message animated bounceInDown ">
            <img src="<?php echo base_url(); ?>assets/img/animated-gif/4970-unapproved-cross.gif">
            <p><?php echo $error; ?></p>
        </div>
        <?php
            }
        ?>        
<!-- footer -->
<!-- modal-boxes -->
<div class="modal fade" id="address-box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title fw-700">Change Address</h4>
            </div>
            <div class="modal-body">
                <div class="location-picker">
                    <input type="text" class="form-control" placeholder="Enter a new address">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="search-box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="search-box p-relative full-width">
                    <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                </div>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<?php

    $this->load->view("footerscript");
?>
<script>
//            window.onbeforeunload = function(){
//  $data={};
//    $path = "http://localhost/MUNCHBOX/Backend/upadatechangesession";
//    $.post($path,$data,function(data){
//    });
//};
            </script>
</body>



</html>

