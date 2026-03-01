<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>TaskRabbit</title>
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
        <div class="inner-wrapper">
            <div class="container-fluid no-padding">
                <div class="row no-gutters bg-home">
                <video autoplay muted loop class="bg-video">
                        <source src="<?php echo base_url(); ?>assets/video/bg.mp4" type="video/mp4">
                </video>                    <div class="col-md-6 bg-home-sub">
                        <div class="section-2 main-page main-padding home-padding">
                            <div class="top-nav">
                                <a href="<?php echo base_url("Restaurant-Sign-Up"); ?>"><h5>Partner with us?</h5></a>
                                <!--h5><a href="login.php" class="text-light-green fw-700">Sign up</a></h5-->
                            </div>
                            <div class="login-box bg-login">
                                <div class="col-12 typing-div" >
<h1 class="hero-title">
    Find Help for <br> Everyday Tasks
</h1>

<p class="hero-subtitle">
    Cleaning • Repair • Delivery • Electrician
</p>                                    <div class="input-group row">
                                        <div class="input-group2 col-xl-12">
                                            <!--<input type="search" class="form-control form-control-submit" placeholder="Enter Location" id="searchbox" value="" style="position:relative;">-->
                                            <?php 
                                                    $city_detail = $this->md->my_query("select st.name as state, ct.name as city, ct.location_id as res_location , count(*) as cnt_res from tbl_location as st, tbl_location as ct,tbl_restaurant as se,tbl_location as ar where se.location_id = ar.location_id and ct.location_id = ar.parent_id and ct.parent_id = st.location_id and se.status = 1  GROUP BY ct.name");
                                                  
                                            ?>
                                            <img src="<?php echo base_url();  ?>assets/img/index-loc.png" class="res-index-loc-img" >
                                            <select class="form-control height-42 index-serch" onchange="findresindex(this.value)">
                                               
                                                <option>Select City </option>
                                                <?php 
                                                    foreach ($city_detail as $single)
                                                    {
                                                ?>
                                                <option value="<?php echo $single->res_location; ?>"><?php echo ucwords($single->city).",".ucwords($single->state); ?></option>
                                                <?php
                                                    }
                                                ?>
                                                
                                                
                                              
                                            </select>
                                            <!--<a href="#" id="microphone" title="Speak for find food"><i class="fas fa-microphone-alt munch-microphone" style=""></i></a>-->
                                            <div class="input-group-prepend">
                                                <button class="input-group-text text-light-green">

                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Browse by category -->
        
        <!-- Browse by category -->
        <!-- your previous order -->
        <!-- Explore collection -->
        <section class="ex-collection section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title">Explore our collections</h3>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12  col-md-8" >
                        <div class="row" id="index-product" >
                            <?php
                            $last_item_id = 0;
                            foreach($food_item_detail as $data) {
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-top:13px;" id="last-div-view" lastid= "<?php echo $data->item_id;?>">
                                    <div class="product-box mb-xl-20">
                                        <div class="">
                                            <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $data->restaurant_id; ?>">
                                                <img src="<?php echo base_url().$data->image; ?>" class="img-fluid full-width view-more-size-img" alt="product-img">
                                            </a>
                                            <div class="overlay">
                                                <div class="product-tags padding-10">
                                                    <a id="btn_wishlist_<?php echo $data->item_id ?>" data-target="#wishlistmodal" onclick="<?php
                                                        if($this->session->userdata("user_username"))
                                                        {
                                                      ?>

                                                        wishlist('<?php echo $data->item_id; ?>', 'Item');
                                                      <?php  
                                                        }
                                                        else
                                                        {
                                                      ?>
                                                            call_wishlist_modal('<?php echo $data->item_id; ?>');
                                                        <?php
                                                        }
                                                        ?>">
                                                    <span class="circle-tag" >
                                                   
                                                        <?php
                                                            $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $data->item_id, "type" => "Item")));
                                                            if ($query == 1) {
                                                                ?>
                                                                
                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                                
                                                                <?php
                                                            } else {
                                                                ?>
                                                            
                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg"  title="Add To Favourite" alt="tag">
                                   
                                                                <?php
                                                            }
                                                            ?>
                                                        
                                                    </span>
                                                        </a>
                                                    <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $data->restaurant_id; ?>" class="btn-add-to-cart">
                                                        <span class="type-tag bg-gradient-green text-custom-white btn-addtocart top-137">
                                                            Visit Restaurant
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                
                                                <h6 class="product-title"><a href="restaurant.php" class="text-light-black "><?php echo $data->item_name; ?></a></h6>
                                            </div>
                                            <p class="text-light-white"><?php echo $data->subcategory; ?></p>
                                            <div class="product-details">
                                                <div class="restaurent-product-label"> 
                                                    <?php
                                                    if ($data->category == "Veg") {
                                                    ?>
                                                    <span class="rectangle-tag product-label-veg padding-top-5">Veg</span>
                                                    <?php
                                                } elseif ($data->category == "Non veg") {
                                                    ?>
                                                    <span class="rectangle-tag product-label-non-veg padding-top-5">Non-Veg</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="rectangle-tag product-label-ovo-veg">Ovo-Veg</span>
                                                    <?php
                                                }
                                                ?>
                                                </div>
                                                <div class="rating"> <span>
                                                        <?php 
                                                            $star_rating = $this->md->my_query("select AVG(rating) as rate_star , count(*) as cnt_rate from tbl_review_rating where restaurant_id = " . $data->restaurant_id);
                                                             $cnt_star = round($star_rating[0]->rate_star);
                                                             for ($i = 1; $i <= 5; $i++) {
                                                             if ($i <= $cnt_star) 
                                                             {
                                                       ?>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <?php
                                                             }
                                                             else
                                                             {
                                                        ?>  
                                                        <i class="fas fa-star text-dark-white"></i>
                                                        <?php
                                                             }
                                                             }
                                                             ?>   
                                                    </span>
                                                    <span class="text-light-white text-right"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                                                </div>
                                            </div>
                                            <div class="product-footer"> 
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/005-chef.svg" alt="tag" style="padding:4px;">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/004-leaf.svg" alt="tag">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/006-chili.svg" alt="tag">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/008-protein.svg" alt="tag">
                                                </span>
                                                <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $data->restaurant_id; ?>">
                                                <span class="text-dark text-right btnprice" id="card">
                                                    <b>&#8377;<?php echo $data->price; ?></b>       
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            <?php
                             }   
                            ?>
                        </div>
                    </div>
                </div>
                <center>
                    <button class="view-more-text-index" onclick="view_more_item()">View More</button>
                </center>
            </div>
        </section>
        <!-- Explore collection -->
        <!-- footer -->
        <?php
        $this->load->view("footer");
        ?>
        <!-- footer -->
        <!-- modal-boxes -->
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

        
        <!-- Wishlist Like & Dislike Message Box Code START -->    
        <div class="add-wishlist-msg ">
            <p></p>
        </div>
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
        <script src="<?php echo base_url(); ?>assets/js/munchbox.js"></script>
        <script type="text/javascript">
            new TypeIt(".typing-text", {
                speed: 300,
                loop: true
            }).go();
        </script>
    </body>



</html>