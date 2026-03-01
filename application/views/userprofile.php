<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Shipment | Munchbox-Foodies food</title>
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
                        <h2>Dashboard</h2>
                        <div class="user-line">
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



