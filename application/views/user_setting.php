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

    <body style="background: linear-gradient(180deg, #fffdf8 0%, #f8fafc 45%, #fdf2f8 100%);">
        <!-- Navigation -->
        <?php
            $this->load->view("header");
        ?>

        <div class="main-sec" style="height: 70px;"></div>
      <?php
      $this->load->view("user_profile_top");
      ?>

        <style>
            .settings-card { max-width: 720px; padding: 28px; border-radius: 22px; border: 1px solid #edf2f7; background: linear-gradient(180deg, #ffffff, #fbfdff); box-shadow: 0 18px 36px rgba(15, 23, 42, 0.06); }
            .settings-title { margin: 0; font-size: 22px; font-weight: 800; color: #111827; }
            .settings-subtitle { margin: 10px 0 0; color: #6b7280; font-size: 14px; line-height: 1.7; }
            .settings-divider { width: 72px; height: 4px; margin: 18px 0 24px; border-radius: 999px; background: linear-gradient(135deg, #fb923c 0%, #f472b6 100%); }
            .password-field { position: relative; margin-bottom: 18px; }
            .password-field .form-control { padding-right: 78px; }
            .password-toggle { position: absolute; top: 50%; right: 16px; transform: translateY(-50%); color: #fb923c; font-size: 12px; font-weight: 800; letter-spacing: 0.04em; text-transform: uppercase; text-decoration: none !important; }
            .password-toggle:hover, .password-toggle:focus { color: #ea580c; }
            .form_vis_error_text { margin: 10px 0 0; font-size: 13px; color: #dc2626; font-weight: 600; }
            .settings-submit { min-width: 190px; height: 54px; margin-top: 8px; padding: 0 24px; font-size: 14px; font-weight: 800; letter-spacing: 0.02em; }

            @media (max-width: 767px) {
                .settings-card { padding: 22px; }
            }
        </style>

        <div class="container dashboard-shell">
            <div class="row">
                <?php
                    $this->load->view("user_profile_sidebar");
                ?>
                <div class="col-md-9 col-sm-9 col-xs-12 dashboard-main-column">
                    <div class="dashboard-panel user-menu-display">
                        <div class="dashboard-panel-header">
                            <div>
                                <h2>Setting</h2>
                                <p>Keep your account secure with a cleaner password management experience.</p>
                            </div>
                        </div>
                        <div class="dashboard-section-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="settings-card user-ch-ps">
                                        <h5 class="settings-title">Change Password</h5>
                                        <p class="settings-subtitle">Update your credentials with secure, easy-to-read input fields and clear validation feedback.</p>
                                        <div class="settings-divider user-line"></div>
                                        <form method="post" name="change_password" action="">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="password-field">
                                                        <input type="password" name="cps" id="user-ch-ps1" class="form-control dashboard-form-control" placeholder="Enter Current Password">
                                                        <a href="#" id="user-ch-button" class="user-button1 password-toggle" onclick="hideshow('#user-ch-ps1','.user-button1')">Show</a>
                                                    </div>
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
                                                    <div class="password-field">
                                                        <input type="password" name="nps" id="user-ch-ps2" class="form-control dashboard-form-control" placeholder="Enter New Password">
                                                        <a href="#" id="user-ch-button" class="user-button2 password-toggle" onclick="hideshow('#user-ch-ps2','.user-button2')">Show</a>
                                                    </div>
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
                                                    <div class="password-field">
                                                        <input type="password" name="ncps" id="user-ch-ps3" class="form-control dashboard-form-control" placeholder="Enter Confirm New Password">
                                                        <a href="#" id="user-ch-button" class="user-button3 password-toggle" onclick="hideshow('#user-ch-ps3','.user-button3')">Show</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input type="submit" name="add" value="Change Password" class="btn gradient-action settings-submit">
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
