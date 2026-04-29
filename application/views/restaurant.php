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
        
        


<!-- TASKRABBIT SERVICE BAR -->
<?php
$service_icons = array('fa-tools', 'fa-tv', 'fa-truck', 'fa-broom', 'fa-tree', 'fa-hammer', 'fa-paint-roller', 'fa-fire');
$active_category_id = !empty($restaurent) ? (int) $restaurent[0]->category_id : 0;
?>
<section class="task-service-bar premium-restaurant-shell">
    <div class="container">
        <div class="service-bar-panel">
            <div class="service-bar-copy text-center">
                <span class="service-eyebrow">Explore Services</span>
                <h2 class="service-bar-title">Book premium help for every home project</h2>
                <p class="service-bar-subtitle">Switch between services to discover the most popular categories and trusted support for your next task.</p>
                <div class="service-bar-highlights">
                    <span class="service-highlight-pill"><i class="fas fa-shield-alt"></i> Verified Taskers</span>
                    <span class="service-highlight-pill"><i class="fas fa-bolt"></i> Same-Day Options</span>
                    <span class="service-highlight-pill"><i class="fas fa-star"></i> Premium Experience</span>
                </div>
            </div>

            <div class="service-wrapper">
                <?php if (!empty($restaurent)) { ?>
                    <?php foreach ($restaurent as $index => $service_category) { ?>
                        <div class="service-item <?php echo $index === 0 ? 'active' : ''; ?>" data-category-id="<?php echo (int) $service_category->category_id; ?>">
                            <span class="service-icon-wrap"><i class="fas <?php echo $service_icons[$index % count($service_icons)]; ?>"></i></span>
                            <p><?php echo htmlspecialchars($service_category->restaurant_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="service-empty-state">No services added yet.</div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<div id="serviceContent" class="service-content-shell">
    <?php if (!empty($restaurent)) { ?>
        <?php foreach ($restaurent as $index => $service_category) { ?>
            <?php
            $category_id = (int) $service_category->category_id;
            $category_name = htmlspecialchars($service_category->restaurant_name, ENT_QUOTES, 'UTF-8');
            $category_image = !empty($service_category->coverpic)
                ? base_url('uploads/category/' . $service_category->coverpic)
                : base_url('assets/img/deals/360x178/shop-1.jpg');
            ?>
            <div class="service-box" data-category-id="<?php echo $category_id; ?>" <?php echo $index === 0 ? '' : 'style="display:none;"'; ?>>
                <div class="service-bg">
                    <div class="service-image">
                        <img src="<?php echo $category_image; ?>" alt="<?php echo $category_name; ?>">
                    </div>

                    <div class="service-card">
                        <span class="service-card-label">Popular service</span>
                        <h3><?php echo $category_name; ?></h3>
                        <p class="service-card-text">Choose trusted taskers offering <?php echo $category_name; ?> with clear pricing and seamless booking.</p>
                        <ul>
                            <li>Available providers are shown below for the selected category.</li>
                            <li>Manage this service from the admin panel to update what customers see.</li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>



        <!-- exclusive deals -->
            </div>
        </section>


        <!-- Featured partners -->
        <section class="featured-partners section-padding-top premium-services-section">
            <div class="container">



                <div class="row section-padding-bottom u-line premium-services-row">
                    <div class="col-12">
                        <div class="section-header-left premium-section-header">
                            <span class="service-eyebrow">Curated categories</span>
                            <h3 class="text-light-black header-title">Populer Services</h3>
                            <p class="premium-section-subtitle">Browse standout services with elevated design, clear actions and a cleaner premium card experience.</p>
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
                            $is_active_category = ((int) $single->category_id === (int) $active_category_id);
                    ?>
                            <div class="col-md-4 col-sm-6 col-xs-12 premium-service-col" data-category-id="<?php echo (int) $single->category_id; ?>" <?php echo $is_active_category ? '' : 'style="display:none;"'; ?>>
                                <div class="neo-card">
                                    <div class="neo-card-shell">
                                        <span class="neo-card-badge">Popular Service</span>
                                        <div class="neo-card-action">
                                            <button class="neo-card-wishlist" id="btn_wishlist_<?php echo $single->restaurant_id; ?>" data-target="#wishlistmodal" onclick="<?php
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
                                                    <!-- <span class="circle-tag reataurant-wishlist-icon">
                                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                    </span> -->
                                                <?php
                                                } else {
                                                ?>
                                                    <!-- <span class="circle-tag reataurant-wishlist-icon">
                                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg" title="Add To Favourite" alt="tag">
                                                    </span> -->
                                                <?php
                                                }
                                                ?>
                                            </button>
                                        </div>

                                        <a class="neo-card-img" href="<?php echo base_url(); ?>Service-Providers/<?php echo $single->category_id; ?>">
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

                                        <div class="neo-card-body">
                                            <span class="neo-card-kicker">-</span>
                                            <h6 class="mb-1 neo-card-title">
                                                <a href="<?php echo base_url(); ?>Service-Providers/<?php echo $single->category_id; ?>">
                                                    <?php echo $single->restaurant_name; ?>
                                                </a>
                                            </h6>
                                            <p class="neo-card-subtitle">Premium task support with trusted professionals and a seamless booking experience.</p>
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


        <section class="faq-section premium-faq-section">
<div class="container">

<div class="faq-header text-center">
<span class="service-eyebrow">Support</span>
<h2>Frequently Asked Questions</h2>
<p>Everything you need to know about our services</p>
</div>

<div class="faq-wrapper">

<div class="faq-item">
<button class="faq-question">
How does TaskRabbit work?
<span class="faq-icon"><i class="fas fa-plus"></i></span>
</button>

<div class="faq-answer">
<p>Choose a service, select a Tasker and schedule the task at your convenience.</p>
</div>
</div>

<div class="faq-item">
<button class="faq-question">
How do I book a service?
<span class="faq-icon"><i class="fas fa-plus"></i></span>
</button>

<div class="faq-answer">
<p>Select your service, choose a Tasker and confirm the booking.</p>
</div>
</div>

<div class="faq-item">
<button class="faq-question">
Are Taskers verified?
<span class="faq-icon"><i class="fas fa-plus"></i></span>
</button>

<div class="faq-answer">
<p>Yes, all Taskers go through verification and background checks.</p>
</div>
</div>

<div class="faq-item">
<button class="faq-question">
What services are available?
<span class="faq-icon"><i class="fas fa-plus"></i></span>
</button>

<div class="faq-answer">
<p>We provide Assembly, Mounting, Moving, Cleaning, Painting and more.</p>
</div>
</div>

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

        <div class="modal fade" id="wish    listmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
<!-- <script>
    $(document).unload(function(){
       alert("hello leave"); 
    });
    </script> -->
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

var categoryId = $(this).data('category-id');

$('.service-box').hide();
$('.service-box[data-category-id="'+categoryId+'"]').fadeIn();

$('.premium-service-col').hide();
$('.premium-service-col[data-category-id="'+categoryId+'"]').fadeIn();

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
