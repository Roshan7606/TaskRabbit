<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Setting | Munchbox-Foodies food</title>
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
                        <h2>Setting</h2>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h5>
                            Change Password
                        </h5>
                        <div class="user-line">
                        </div>
                        <div class="user-ch-ps">
                            <form method="post" name="change_password" action="">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" name="cps" id="user-ch-ps1" class="form-control" placeholder="Enter Current Password">
                                        <a href="#" id="user-ch-button" class="user-button1" onclick="hideshow('#user-ch-ps1','.user-button1')">Show</a>
                                        <p class="form_vis_error_text"><?php
                                            if(isset($error1))
                                            {
                                                echo $error1;
                                            }
                                            elseif(isset($error2))
                                            {
                                                echo $error2;
                                            }
                                        ?></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" name="nps" id="user-ch-ps2" class="form-control" placeholder="Enter New Password">
                                        <a href="#" id="user-ch-button" class="user-button2" onclick="hideshow('#user-ch-ps2','.user-button2')">Show</a>
                                        <p class="form_vis_error_text"><?php
                                            if(isset($error3))
                                            {
                                                echo $error3;
                                            }
                                            elseif(isset($error4))
                                            {
                                                echo $error4;
                                            }
                                        ?></p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" name="ncps" id="user-ch-ps3" class="form-control" placeholder="Enter Confirm New Password">
                                        <a href="#" id="user-ch-button" class="user-button3" onclick="hideshow('#user-ch-ps3','.user-button3')">Show</a>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="submit" name="add" value="Change Password" class="btn">
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
</body>



</html>

