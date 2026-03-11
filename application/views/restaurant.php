<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                    <div class="col-md-1"></div>

                    <div class="col-md-10 res-search-bar">
                        <div class="row">
                            <div class="col-md-3 search-res-box-1">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="<?php echo base_url(); ?>assets/img/food-and-restaurant.png" class="search-img-find">
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" id="select_search" name="select_search" onchange="findres($('#searchbox-textbox').val(),this.value)">
                                            <option value="3">Service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8 search-res-textbox">
                                    <input type="text"
                                        name="text_search"
                                        class="form-control"
                                        onkeyup="findres(this.value,$('#select_search').val())"
                                        id="searchbox-textbox"
                                        autocomplete="off">

                                    <div id="search_suggestion" style="
                                        position:absolute;
                                        background:white;
                                        width:100%;
                                        z-index:999;
                                        border:1px solid #ddd;
                                        border-radius:10px;
                                        display:none;">
                                        </div>
                                </div>
                                <div class="col-md-1 search-res-btn">
                                    <!-- <img src="<?php echo base_url(); ?>assets/img/love.png" class="search-img-find-icon"> -->
                                </div>
                            </div>

                            <div class="col-md-8 search-res-textbox">
        
                            </div>

                            <div class="col-md-1 search-res-btn">
                                <img src="<?php echo base_url(); ?>assets/img/love.png" class="search-img-find-icon">

                            </div>
                        </div>
                    </div>

                    <div class="col-md-1"></div>
                </div>
            </section>


<!-- TASKRABBIT SERVICE BAR -->
<section class="task-service-bar">
    <div class="container">
        <div class="service-wrapper">

            <div class="service-item active" data-service="assembly">
            <i class="fas fa-tools"></i>
            <p>Assembly</p>
            </div>

            <div class="service-item" data-service="mounting">
            <i class="fas fa-tv"></i>
            <p>Mounting</p>
            </div>

            <div class="service-item" data-service="moving">
            <i class="fas fa-truck"></i>
            <p>Moving</p>
            </div>

            <div class="service-item" data-service="cleaning">
            <i class="fas fa-broom"></i>
            <p>Cleaning</p>
            </div>

            <div class="service-item" data-service="outdoor">
            <i class="fas fa-tree"></i>
            <p>Outdoor Help</p>
            </div>

            <div class="service-item" data-service="repairs">
            <i class="fas fa-hammer"></i>
            <p>Home Repairs</p>
            </div>

            <div class="service-item" data-service="painting">
            <i class="fas fa-paint-roller"></i>
            <p>Painting</p>
            </div>

            <div class="service-item" data-service="trending">
            <i class="fas fa-fire"></i>
            <p>Trending</p>
            </div>
        </div>
    </div>
</section>
            


<div id="serviceContent">

<!-- Assembly -->
<div class="service-box" id="assembly">

<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/assembly.webp">
</div>

<div class="service-card">
<h3>Assembly</h3>

<ul>
<li>Assemble or disassemble furniture items.</li>
<li>Now Trending: desks, shelves and furniture builds.</li>
</ul>

</div>

</div>

</div>

<!-- Mounting -->
<div class="service-box" id="mounting" style="display:none;">
<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/mounting.webp">
</div>

<div class="service-card">
<h3>Mounting</h3>
<ul>
<li>Securely mount TVs, mirrors and shelves.</li>
<li>Now Trending: gallery walls and wraparound shelves.</li>
</ul>
</div>

</div>
</div>


<!-- Moving -->
<div class="service-box" id="moving" style="display:none;">
<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/moving.webp">
</div>

<div class="service-card">
<h3>Moving</h3>
<ul>
<li>Help moving furniture and heavy items.</li>
<li>Now Trending: apartment moves and packing help.</li>
</ul>
</div>

</div>
</div>


<!-- Cleaning -->
<div class="service-box" id="cleaning" style="display:none;">
<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/cleaning.webp">
</div>

<div class="service-card">
<h3>Cleaning</h3>
<ul>
<li>Professional home and office cleaning.</li>
<li>Now Trending: deep cleaning and eco-friendly cleaning.</li>
</ul>
</div>

</div>
</div>


<!-- Outdoor -->
<div class="service-box" id="outdoor" style="display:none;">
<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/outdoor.webp">
</div>

<div class="service-card">
<h3>Outdoor Help</h3>
<ul>
<li>Yard work, lawn care and snow removal.</li>
<li>Now Trending: seasonal yard maintenance.</li>
</ul>
</div>

</div>
</div>


<!-- Repairs -->
<div class="service-box" id="repairs" style="display:none;">
<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/repair.webp">
</div>

<div class="service-card">
<h3>Home Repairs</h3>
<ul>
<li>Electrical, plumbing and home fixes.</li>
<li>Now Trending: small home improvement projects.</li>
</ul>
</div>

</div>
</div>


<!-- Painting -->
<div class="service-box" id="painting" style="display:none;">
<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/painting.webp">
</div>

<div class="service-card">
<h3>Painting</h3>
<ul>
<li>Interior and exterior painting services.</li>
<li>Now Trending: accent walls and decorative painting.</li>
</ul>
</div>

</div>
</div>


<!-- Trending -->
<div class="service-box" id="trending" style="display:none;">
<div class="service-bg">

<div class="service-image">
<img src="<?php echo base_url(); ?>assets/img/services/trending.webp">
</div>

<div class="service-card">
<h3>Trending</h3>
<ul>
<li>Most popular services requested by users.</li>
<li>Book trusted taskers for trending tasks.</li>
</ul>
</div>

</div>
</div>

<section class="faq-section">
<div class="container">

<div class="faq-header text-center">
<h2>Frequently Asked Questions</h2>
<p>Everything you need to know about our services</p>
</div>

<div class="faq-wrapper">

<div class="faq-item">
<button class="faq-question">
How does TaskRabbit work?
<span class="faq-icon">+</span>
</button>

<div class="faq-answer">
<p>Choose a service, select a Tasker and schedule the task at your convenience.</p>
</div>
</div>

<div class="faq-item">
<button class="faq-question">
How do I book a service?
<span class="faq-icon">+</span>
</button>

<div class="faq-answer">
<p>Select your service, choose a Tasker and confirm the booking.</p>
</div>
</div>

<div class="faq-item">
<button class="faq-question">
Are Taskers verified?
<span class="faq-icon">+</span>
</button>

<div class="faq-answer">
<p>Yes, all Taskers go through verification and background checks.</p>
</div>
</div>

<div class="faq-item">
<button class="faq-question">
What services are available?
<span class="faq-icon">+</span>
</button>

<div class="faq-answer">
<p>We provide Assembly, Mounting, Moving, Cleaning, Painting and more.</p>
</div>
</div>

</div>

</div>
</section>





        <!-- exclusive deals -->
            </div>
        </section>


        <!-- Featured partners -->
        <section class="featured-partners section-padding-top">
            <div class="container">



                <div class="row section-padding-bottom u-line">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title">Featured partners</h3>
                            <div class="user-line margin-b-none m-t-10"></div>
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
                                        <h2 class="text-light-white mb-2 fw-600">Search Result</h2>
                                        <p class="text-light-white f-s-17">We couldn’t find any Restaurant matching your search. Please try a new keyword.</p>
                                    </div>
                                </center>
                            </div>
                        </div>
                    <?php
                    } else {
                        foreach ($restaurent as $single) {
                    ?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="featured-product">

                                    <div class="featured-img">
                                        <a href="<?php echo base_url(); ?>Service-Providers/<?php echo $single->category_id; ?>">
                                            <?php
                                            if ($single->coverpic == "") {
                                            ?>
                                                <img src="<?php echo base_url(); ?>assets/img/deals/360x178/shop-1.jpg" class="img-res-cover full-width" alt="#">
                                            <?php
                                            } else {
                                            ?>
                                                <img src="<?php echo base_url(); ?>uploads/category/<?php echo $single->coverpic; ?>" class="img-res-cover full-width" alt="#">
                                            <?php
                                            }
                                            ?>
                                        </a>

                                        <div class="overlay-2 padding-10">
                                            <span class="background-none res-open-img"></span>
                                        </div>

                                        <div class="overlay-2 padding-10">
                                            <button id="btn_wishlist_<?php echo $single->restaurant_id; ?>" data-target="#wishlistmodal" onclick="<?php
                                                if ($this->session->userdata("user_username")) {
                                            ?>
                                                    wishlist('<?php echo $single->restaurant_id; ?>', 'Restaurant')
                                            <?php
                                                } else {
                                            ?>
                                                    call_wishlist_modal('<?php echo $single->restaurant_id; ?>')
                                            <?php
                                                }
                                            ?>">
                                                <?php
                                                $query = count($this->md->my_select("tbl_favourite", "*", array(
                                                    "user_id" => $this->session->userdata('user_username'),
                                                    "reference_id" => $single->restaurant_id,
                                                    "type" => "restaurant"
                                                )));
                                                if ($query == 1) {
                                                ?>
                                                    <span class="circle-tag reataurant-wishlist-icon">
                                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                    </span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="circle-tag reataurant-wishlist-icon">
                                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg" title="Add To Favourite" alt="tag">
                                                    </span>
                                                <?php
                                                }
                                                ?>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="featured-product-details padding-bottom-none height-151px">
                                        <div class="pro-title max-width-100 height-107px">
                                            <h6 class="mb-1 restaurant-name">
                                                <a href="<?php echo base_url(); ?>Service-Providers/<?php echo $single->category_id; ?>" class="text-light-black fw-600">
                                                    <?php echo $single->restaurant_name; ?>
                                                </a>
                                            </h6>

                                            <div class="restaurent-rating mb-xl-20">
                                                <div class="star">
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                    <span class="text-dark-white fs-16"><i class="fas fa-star"></i></span>
                                                </div>
                                                <span class="fs-12 text-light-black">Service Category</span>
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
        </section>

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
                        <button type="button" class="btn btn-product-add">
                            <a href="<?php echo base_url("Log-in"); ?>" class="text-white">
                                <img src="<?php echo base_url(); ?>assets/img/block-user.png" class="wishlist-log-in-icon"> &nbsp;Go To Log In
                            </a>
                        </button>
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
    <script>

function findres(keyword)
{
    if(keyword.length < 1)
    {
        $("#search_suggestion").hide();
        return;
    }

    $.ajax({
        url:"<?php echo base_url();?>Restaurant/live_search",
        type:"POST",
        data:{keyword:keyword},
        success:function(data)
        {
            $("#search_suggestion").show();
            $("#search_suggestion").html(data);
        }
    });
}

function selectItem(name)
{
    $("#searchbox-textbox").val(name);
    $("#search_suggestion").hide();
}

$('.service-item').click(function(){

$('.service-item').removeClass('active');
$(this).addClass('active');

var service = $(this).data('service');

$('.service-box').hide();

$('#'+service).fadeIn();

});
$('.faq-question').click(function(){

var parent = $(this).parent();

parent.toggleClass('active');

parent.find('.faq-answer').slideToggle();

parent.siblings().removeClass('active');
parent.siblings().find('.faq-answer').slideUp();

});
</script>
</body>

</html>