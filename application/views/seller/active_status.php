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
            <div class="container-fluid p-h-0 p-v-0 bg full-height d-flex log-in-overlay">
                <div class="d-flex flex-column justify-content-between w-100">
                    <div class="container d-flex h-100">
                        <div class="row align-items-center w-100">
                            <div class="col-md-7 col-lg-5 m-h-auto">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="active-request-image">
                                        </div>
                                        <div class="active-request-detail">
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                               <img src="<?php echo base_url(); ?>admin_assets/images/deactiveres.jpg">
                                            </div>
                                            <div class="col-md-8 active-request-detail">
                                                <form action="" method="post" name="request_form">
                                                <?php 
                                                    if(isset($success))
                                                    {
                                                 ?>
                                                    <h1>Request Panding...</h1>
                                                    <h4>Your Request has been sent</h4>
                                                    <p><?php echo $success; ?></p>
                                                    <a href="<?php echo base_url("Restaurant-Logout"); ?>" class="btn btn_request">Back To Login</a>
                                                 <?php   
                                                    }
                                                    else
                                                    {
                                                 ?>
                                                    <h1>Oops!</h1>
                                                    <h4>You are Deactive</h4>
                                                    <p>If you want to become Active then please contact Admin</p>
                                                    <button class="btn btn_request" type="submit" value="add" name="add">Contact-Us</button>
                                                    </form>
                                                 <?php
                                                    }
                                                ?>
                                                
                                            </div>
                                            
                                        </div>
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
        
    </body>
</html>