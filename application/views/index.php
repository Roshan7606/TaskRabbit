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
                </video>
                        <div class="video-overlay"></div>
                                    <div class="col-md-6 bg-home-sub">
                        <div class="section-2 main-page main-padding home-padding">
                            <div class="top-nav">
                                <!-- <a href="<?php echo base_url("Restaurant-Sign-Up"); ?>"><h5>Partner with us?</h5></a> -->
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




<!-- Why Choose Us -->

<section class="why-premium">

<div class="container">

<h2 class="why-heading">Why Choose TaskRabbit</h2>

<div class="row">

<div class="col-md-3">
<div class="premium-card">

<div class="icon-circle">
<i class="fas fa-user-check"></i>
</div>

<h4>Verified Taskers</h4>
<p>Background checked professionals you can trust.</p>

</div>
</div>


<div class="col-md-3">
<div class="premium-card">

<div class="icon-circle">
<i class="fas fa-bolt"></i>
</div>

<h4>Fast Booking</h4>
<p>Book services instantly within seconds.</p>

</div>
</div>


<div class="col-md-3">
<div class="premium-card">

<div class="icon-circle">
<i class="fas fa-star"></i>
</div>

<h4>Top Rated</h4>
<p>Highly rated service providers in your city.</p>

</div>
</div>


<div class="col-md-3">
<div class="premium-card">

<div class="icon-circle">
<i class="fas fa-headset"></i>
</div>

<h4>24/7 Support</h4>
<p>Our support team is always ready to help.</p>

</div>
</div>


</div>

</div>

</section>


<section class="trust-section">

<div class="trust-container">

<!-- LEFT IMAGE -->

<div class="trust-image">

<img src="<?php echo base_url();  ?>assets/img/poster.webp" alt="trust">

<div class="rating-card">
<img src="<?php echo base_url();  ?>assets/img/poster_photo.webp">
<div>
<h4>5.0 ⭐</h4>
<p>Overall Rating</p>
</div>
</div>

<div class="status-card">
👍 Job completed
</div>

<div class="status-card2">
✔ Payment released
</div>

</div>


<!-- RIGHT CONTENT -->

<div class="trust-content">

<h2>Trust and safety<br>features for your<br>protection</h2>

<div class="trust-item">

<h4>💲 Secure payments</h4>
<p>Only release payment when the task is completed to your satisfaction</p>

</div>

<div class="trust-item">

<h4>⭐ Trusted ratings and reviews</h4>
<p>Pick the right person for the task based on real ratings and reviews from other users</p>

</div>

<div class="trust-item">

<h4>🛡 Insurance for peace of mind</h4>
<p>We provide liability insurance for Taskers performing most task activities</p>

</div>

<a class="trust-btn">Post your task for free</a>

</div>

</div>

</section>




<section class="boss-section">

<div class="boss-container">

<!-- LEFT -->
<div class="boss-left">

<h2>Be your own boss</h2>

<p class="boss-desc">
Whether you're a genius spreadsheet guru or a diligent carpenter,
find your next job on Airtasker.
</p>

<ul class="boss-list">
<li>Free access to thousands of job opportunities</li>
<li>No subscription or credit fees</li>
<li>Earn extra income on a flexible schedule</li>
<li>Grow your business and client base</li>
</ul>

<a href="#" class="boss-btn">Earn money as a Tasker</a>

</div>


<!-- RIGHT -->
<div class="boss-right">

<img src="<?php echo base_url();  ?>assets/img/earn_task.webp" class="boss-img">


<div class="payment-card">
<span>Payment received!</span>
<h4>Paint chairs</h4>
<strong>$179</strong>
</div>

<div class="alert-card">
🔔 New job alert!
</div>


<div class="earning-card">
<p>Total earnings</p>
<h3>$13,066</h3>
<span>↑ 20% vs last month</span>
</div>


</div>

</div>

</section>






<!-- RIGHT AUTO SCROLL -->




        <section class="ex-collection section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title">Explore our Work-partner</h3>
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
                                                            Visit Services
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
                                                    <span class="rectangle-tag product-label-veg padding-top-5">Excellent</span>
                                                    <?php
                                                } elseif ($data->category == "Non veg") {
                                                    ?>
                                                    <span class="rectangle-tag product-label-non-veg padding-top-5">Good</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="rectangle-tag product-label-ovo-veg">Average</span>
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
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/cleaning_2971406.png" alt="tag" style="padding:4px;">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/polisher_13481448.png" alt="tag">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/cleaning_12211111.png" alt="tag">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/svg/008-protein.svg" alt="tag"> -->
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



        <!-- Top Taskers -->

<section class="top-taskers section-padding">

<div class="container">

<h2 class="text-center">Top Taskers</h2>

<div class="row">

<div class="col-md-4">
<div class="tasker-card">
<img src="<?php echo base_url(); ?>assets/img/taskers/tasker1.jpg">
<h4>Rahul Sharma</h4>
<p>Handyman Expert</p>
</div>
</div>

<div class="col-md-4">
<div class="tasker-card">
<img src="<?php echo base_url(); ?>assets/img/taskers/tasker2.jpg">
<h4>Amit Patel</h4>
<p>Cleaning Specialist</p>
</div>
</div>

<div class="col-md-4">
<div class="tasker-card">
<img src="<?php echo base_url(); ?>assets/img/taskers/tasker3.jpg">
<h4>Ravi Kumar</h4>
<p>Electrician</p>
</div>
</div>

</div>

</div>

</section>




<section class="app-download section-padding">

<div class="container">

<div class="row align-items-center">

<div class="col-md-6">
<h2>Download Our App</h2>
<p>Book services anytime anywhere.</p>

<img src="<?php echo base_url(); ?>assets/img/playstore.png">
<img src="<?php echo base_url(); ?>assets/img/appstore.png">

</div>

<div class="col-md-6">
<img src="<?php echo base_url(); ?>assets/img/mobile-app.png" class="img-fluid">
</div>

</div>

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

const counters=document.querySelectorAll(".counter");

counters.forEach(counter=>{
counter.innerText='0';

const updateCounter=()=>{
const target=+counter.getAttribute("data-target");
const c=+counter.innerText;

const increment=target/200;

if(c < target){
counter.innerText=Math.ceil(c+increment);
setTimeout(updateCounter,10);
}else{
counter.innerText=target;
}

};

updateCounter();
});

const cards = document.querySelectorAll('.premium-card');

window.addEventListener('scroll',()=>{

cards.forEach(card=>{

const top = card.getBoundingClientRect().top;
const screen = window.innerHeight;

if(top < screen-100){
card.style.opacity = "1";
card.style.transform = "translateY(0)";
}

});

});


        </script>
    </body>



</html>