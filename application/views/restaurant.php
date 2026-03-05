<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Restaurant | TaskRabbit</title>
        <!-- Fav and touch icons -->
        <?php
        $this->load->view("CSS");
        ?>
    </head>
    <body>
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>
        <div class="main-sec"></div>
        <!-- Navigation -->
        
            <section class="section-padding-top exclusive-deals">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-10 res-search-bar">
                            <div class="row">
                                <div class="col-md-3 search-res-box-1">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="<?php echo base_url(); ?>assets/img/food-and-restaurant.png" class="search-img-find">
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-control" id="select_search" name="select_search" onchange="findres($('#searchbox-textbox').val(),this.value)">
                                                <!-- <option value="1"></option>
                                                <option value="2"></option> -->
                                                <option value="3">Service</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 search-res-textbox">
                                    <input type="text" name="text_search" class="form-control" onkeyup="findres(this.value,$('#select_search').val())" id="searchbox-textbox" placeholder="Enter Area To Find ">
                                </div>
                                <div class="col-md-1 search-res-btn">
                                    <img src="<?php echo base_url(); ?>assets/img/love.png" class="search-img-find-icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">

                    </div>
                </div>
            </section>
        <!-- exclusive deals -->
        <!-- Featured partners -->
        <section class="featured-partners section-padding-top">
            <div class="container" id="result">
                <div class="row section-padding-bottom u-line">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title">Featured partners</h3>
                           <div class="user-line margin-b-none m-t-10">
                        </div>
                        </div>
                    </div>
                    <?php
                    if (count($restaurent) == 0) {
                        ?>
                        <div class="col-12">
                            <div class="review-img">
                                <center>
                                    <img src="<?php echo base_url(); ?>assets/img/no_found.png" class="img-fluid" alt="#">
                                    <div class="review-text">
                                        <h2 class="text-light-white mb-2 fw-600">Search Result </h2>
                                        <p class="text-light-white f-s-17">We couldn’t find any Restaurant matching your search. Please try a new keyword.</p>
                                        
                                        

                                    </div>
                                </center>
                            </div>
                        </div>
                        <?php
                    } else {
                        foreach ($restaurent as $single) {
                            $itm_add = $this->md->my_select("tbl_item","*",array("restaurant_id"=>$single->restaurant_id,"status"=>1));
                            if(count($itm_add) != 0)
                            {
                            ?>
                            
                            <div class="col-md-4 col-sm-4 col-xs-12" >
                                <!--<div class="swiper-wrapper">-->
                                <div class="featured-product">
                    
                        
                    
                                    <div class="featured-img">
                                        <a href="<?Php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>">
                                            <?php
                                            if ($single->coverpic == "") {
                                                ?>
                                                <img src="<?php echo base_url(); ?>assets/img/deals/360x178/shop-1.jpg" class="img-res-cover full-width" alt="#">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url() . $single->coverpic; ?>" class="img-res-cover full-width" alt="#">
                                                <?php
                                            }
                                            ?>

                                        </a>
                                        <div class="overlay-2 padding-10"> <span class="background-none res-open-img"></span>
                                        </div>
                                        <div class="overlay-2 padding-10"> 
                                            <button id="btn_wishlist_<?php echo $single->restaurant_id; ?>" data-target="#wishlistmodal"  onclick="<?php
                                            if($this->session->userdata("user_username"))
                                            {
                                          ?>
                                              
                                            wishlist('<?php echo $single->restaurant_id; ?>', 'Restaurant')
                                          <?php  
                                            }
                                            else
                                            {
                                          ?>
                                                call_wishlist_modal('<?php echo $single->restaurant_id; ?>')
                                            <?php
                                            }
                                            ?>">
                                            <?php
                                            $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $single->restaurant_id, "type" => "restaurant")));
                                            if ($query == 1) {
                                                ?>
                                                <span class="circle-tag reataurant-wishlist-icon">
                                                    <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="circle-tag reataurant-wishlist-icon">
                                                    <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg"  title="Add To Favourite" alt="tag">
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </button>
                                        </div>
                                    </div>
                                    <div class="featured-product-details padding-bottom-none height-151px">
                                        
                                        <?php 
                                            if($single->service_status == "opened")
                                            {
                                        ?>
                                                                                <!-- <img src="<?php echo base_url(); ?>assets/img/open-res.png" class="wish-res-image  margin-right-17"> -->

                                        <?php
                                            }
                                            else
                                            {
                                         ?>
                                                                                <!-- <img src="<?php echo base_url(); ?>assets/img/close-res.png" class="wish-res-image  margin-right-17"> -->
                                        <?php
                                            }
                                        ?>
                                                <!--<img src="<?php echo base_url(); ?>assets/img/bakery-shop.png" class="" >-->
                                                
                                        
                                        <div class="pro-title max-width-100 height-107px">
                                            <h6 class="mb-1 restaurant-name"><a href="<?Php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>" class="text-light-black fw-600"><?php echo $single->restaurant_name; ?></a></h6>
                                              <div class="restaurent-rating mb-xl-20">
                            <div class="star"> 
                            
                            <?php
                            $star_rating = $this->md->my_query("select AVG(rating) as rate_star , count(*) as cnt_rate from tbl_review_rating where restaurant_id = ".$single->restaurant_id);
                            $cnt_star = round($star_rating[0]->rate_star); 
                            if($cnt_star == 0)
                            {
                            ?>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php    
                            }
                            else
                            {
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
                            }   
                            ?>
                           
                                
                            </div>
                             <span class="fs-12 text-light-black"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                             
                             <?php 
                                            if($single->service_status == "closed")
                                            {
                                                $cur_day_name = date("d");
                                                $cur_day = strval(date("l",strtotime($cur_day_name +1)));
                                               $schedule = $this->md->my_select("tbl_schedule", "*", array("restaurant_id" => $single->restaurant_id, "day_name" => $cur_day));
                                                                        $open_time = $schedule[0]->open_time;
                                        ?>
                             <p class="text-danger m-t-5 margin-b-none"><b>Open <?php 
                             if($schedule[0]->day_name == date("l"))
                                                                            {
                                                                                echo "today";
                                                                            }
                                                                            else
                                                                            {
                                                                                echo "tomorrow";
                                                                            }
                                
                             ?> at <?php echo date("h:i A", strtotime($open_time));?></b></p>
                             <?php 
                                            }
                             ?>
                            </div>
                                            
                                        </div>
                          
                                    </div>
                                  
                                </div>
                          
                            </div>
                            <?php
                            }
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- local deals -->
    <!-- footer -->
    <?php
    $this->load->view("footer");
    ?>
    <!-- footer -->
    <!-- Wishlist Like & Dislike Message Box Code START -->    
        <div class="add-wishlist-msg ">
            <p></p>
        </div>
        <!-- Wishlist Like & Dislike Message Box Code END -->
    <!-- modal boxes -->
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
    <div class="modal fade" id="wishlistmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="text-center wishlist-model-box">
                        <h3>Ooops! You Are Not Log In. </h3>
                    </div>
                    <div class="mb-20">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/login.png" class="log-out-user">
                        </center>
                    </div>
                    <div class="wishlist-model-msg">
                        <h6 class="text-center">If you want to add your favourite restaurant or food then, log in to your existing account or sign up. </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-product-add" ><a href="<?php echo base_url("Log-in"); ?>" class="text-white"><img src="<?php echo base_url(); ?>assets/img/block-user.png" class="wishlist-log-in-icon"> &nbsp;Go To Log In</a></button>
                    </div>
                </div>
            </div>
        </div>
    <?php
$this->load->view("footerscript");
?>
<script src="<?php echo base_url() ?>assets/js/munchbox.js" type="text/javascript"></script>
<script>
    $(document).unload(function(){
       alert("hello leave"); 
    });
    </script>
</body>



</html>