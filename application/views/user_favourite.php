<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Favourite | TaskRabbit</title>
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
                        <h2>Favourite</h2>
                        <div class="wishlist-nav">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs " role="tablist">
                                <li role="presentation" class="wishlist-li active" id="wishlist-item">
                                    <a href="#fooditem" aria-controls="fooditem" role="tab" data-toggle="tab">Service provider</a>
                                </li>
                                <li role="presentation" class="" id="wishlist-res">
                                    <a href="#restaurant" aria-controls="restaurant" role="tab" data-toggle="tab">Services</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="fooditem">
                                    <div class="row wishlist-item restaurant-wishlist" id="user_wishlist_item">
                                        <?php
                                        
                                        if (count($food_item) == 0) {
                                            ?>
                                            <div class="wishlist-empty">
                                                <center>
                                                    <img src="<?php echo base_url(); ?>assets/img/empty_favorites_food_wishlist.png">
                                                    <h3>Where is the love?</h3>
                                                    <h6>Once you favourite a Service, it will appear here.</h6>
                                                </center>
                                            </div>

                                            <?php
                                        } else {
                                            foreach ($food_item as $data) {
                                              
                                                ?>
                                        
                                                <div class="col-lg-12 m-b-9">
                                                        <div class="restaurent-product-list">
                                                            <div class="restaurent-product-detail">
                                                                <div class="restaurent-product-left">
                                                                    <div class="restaurent-product-title-box">
                                                                        <div class="restaurent-product-box">
                                                                            <div class="restaurent-product-title">
                                                                                <h5 class="m-b-9"><a class="text-light-black fw-500" href="<?php echo base_url()."Restaurant-Details/".$data->restaurant_id; ?>" ><?php echo ucwords($data->restaurant_name); ?></a></h5>
                                                                                <h6 class="mb-2" data-toggle="modal" data-target="#restaurent-popup"><a href="<?php echo base_url()."Restaurant-Details/".$data->restaurant_id; ?>" class="text-light-black fw-600"><?php echo $data->item_name; ?>
                                                                                    <?php
                                                                            if ($data->category == "Veg") {
                                                                                ?>
                                                                                        <img src="<?php echo base_url(); ?>assets/img/veg-tag.png" class="width-22">
                                                                                <?php
                                                                            } elseif ($data->category == "Non veg") {
                                                                                ?>
                                                                                <img src="<?php echo base_url(); ?>assets/img/nonvag-tag.png" class="width-22">
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <img src="<?php echo base_url(); ?>assets/img/ovoveg-tag.png" class="width-22">
                                                                                <?php
                                                                            }
                                                                            ?></a></h6>
                                                                           
                                                                                <p class="font-item-prize-style">&#8377; <?php echo $data->price; ?></p>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>

                                                                    </div>
                                                                    
                                                                    <div class="restaurent-tags-price">

                                                                        <button id="btn_wishlist_<?php echo $data->item_id ?>"  onclick="remove_wishlist_item('<?php echo $data->favourite_id; ?>', 'item')">
                                                                                   
                                                                                <span class="circle-tag ">
                                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                                                </span>
                                                                        
                                                                        </button>

                                                                        
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if ($data->image != "") {
                                                                    ?>
                                                                    <div class="restaurent-product-img">
                                                                        <img src="<?php echo base_url() . $data->image; ?>" class="img-fluid" alt="#">
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="restaurant">
                                    <div class="row wishlist-item restaurant-wishlist" id="user_wishlist_restaurant">
                                        <?php
                                        if (count($restaurant) == 0) {
                                            ?>
                                            <div class="wishlist-empty">
                                                <center>
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/empty_favourites_restaurant_wishlist.png"> -->
                                                    <h3>Where is the love?</h3>
                                                    <h6>Once you favourite a restaurant, it will appear here.</h6>
                                                </center>
                                            </div>

                                            <?php
                                        } else {
                                            foreach ($restaurant as $single) {
                                                ?>
                                                <div class="col-md-6 col-sm-4 col-xs-12" >
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
                                                                <button id="btn_wishlist_<?php echo $single->restaurant_id; ?>" data-target="#wishlistmodal"  onclick="remove_wishlist_item('<?php echo $single->favourite_id ?>', 'restaurant')">
                                                                           
                                                                        <span class="circle-tag reataurant-wishlist-icon">
                                                                            <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                                        </span>
                                                                    
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="featured-product-details padding-bottom-none height-151px">

                                                            <?php
                                                            if ($single->service_status == "opened") {
                                                                ?>
                                                                <!-- <img src="<?php echo base_url(); ?>assets/img/open-res.png" class="wish-res-image  margin-right-17"> -->

                                                                <?php
                                                            } else {
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
                                                                        $star_rating = $this->md->my_query("select AVG(rating) as rate_star , count(*) as cnt_rate from tbl_review_rating where restaurant_id = " . $single->restaurant_id);
                                                                        $cnt_star = round($star_rating[0]->rate_star);
                                                                        if ($cnt_star == 0) {
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
                                                                        } else {
                                                                            for ($i = 1; $i <= 5; $i++) {
                                                                                if ($i <= $cnt_star) {
                                                                                    ?>
                                                                                    <span class="text-yellow fs-16">
                                                                                        <i class="fas fa-star"></i>
                                                                                    </span>
                                                                                    <?php
                                                                                } else {
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
                                                                    if ($single->service_status == "closed") {
                                                                        $cur_day_name = date("d");
                                                                        $cur_day = strval(date("l", strtotime($cur_day_name + 1)));
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
                                                          
                                                                            
                                                                        ?> at <?php echo date("h:i A", strtotime($open_time)); ?></b></p>
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
                                        ?>
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

        <!-- Wishlist Like & Dislike Message Box Code START -->    
        <div class="add-wishlist-msg ">
            <p></p>
        </div>
        <!-- Wishlist Like & Dislike Message Box Code END -->    

        <?php
        $this->load->view("footerscript");
        ?>
    </body>
</html>




