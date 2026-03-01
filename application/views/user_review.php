<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Review | Munchbox-Foodies food</title>
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
                        <h2>Review</h2>
                        <div class="<?php 
                            if(count($user_review_rating) >= 5)
                            {
                                echo "review-scroll";
                            }
                        ?>">
                        <?php
                        if (count($user_review_rating) == 0) {
                            ?>
                            <div class="wishlist-empty">
                                <center>
                                    <img src="<?php echo base_url(); ?>assets/img/noreview.png">
                                    <h3>Where is the Reviews And Rating?</h3>
                                    <h6>Once you Give Reviews and Rating, it will appear here.</h6>
                                </center>
                            </div>
                            <?php
                        } else {
                            foreach($user_review_rating as $single)
                            {
                            ?>
                            <div class="review-box">
                            <div class="review-user">
                                <div class="review-user-img">
                                   <?php    
                                    if($single->profile != "")
                                            {
                                ?>
                                                <img src="<?php echo base_url().$single->profile; ?>" class="rounded-circle review-user-img-icon" alt="userimg"> 
                                <?php
                                            }
                                            else
                                            {
                                ?>
                                               <img class="round" height="30" width="30" avatar="<?php echo substr($single->name, 0,1); ?>">
                                <?php                
                                            }
                                 ?>    
                                    <div class="reviewer-name">
                                        <p class="fs-17 text-light-black fw-600 font-size-27"><?php echo ucwords($single->name); ?></p>
                                    </div> 
                                </div>
                                <div class="review-date"> <span class="text-light-white"><?php echo date("M d,Y",strtotime($single->date)); ?></span>
                                </div>
                            </div>
                            <div class="ratings"> 
                                <p class="m-b-5 font-weight-500 rev-res-name"><?php echo $single->restaurant_name; ?></p>
                                <br>
                                <?php $cnt_star = round($single->rating); 
                                for($i = 1;$i<=5;$i++)
                                {
                                    if($i <= $cnt_star)
                                    {
                                ?>
                                <span class="text-yellow fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php
                                    }
                                    else
                                    {
                             ?>
                            <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php
                                    }
                                }
                            ?>
                              
                            </div>
                                <p class="text-light-black"><?php echo ucfirst($single->review); ?></p> 
                            <!--<span class="text-light-white fs-12 food-order">Kathy-->
                              
<!--                            <ul class="food">
                                <li>
                                    <button class="add-pro bg-gradient-red">Coffee <span class="close">+</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-dark">Pizza <span class="close">+</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-gradient-green">Noodles <span class="close">+</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="add-pro bg-gradient-orange">Burger <span class="close">+</span>
                                    </button>
                                </li>
                            </ul>-->
                        </div>
                            <?php
                            }
                        }
                        ?>
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




