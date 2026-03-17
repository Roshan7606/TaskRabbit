<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title><?php echo !empty($service_detail->name) ? $service_detail->name : 'Service Providers'; ?> | TaskRabbit</title>
        <?php $this->load->view("CSS"); ?>
    </head>
    <body>
        <?php $this->load->view("header"); ?>
        <div class="main-sec"></div>

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
                                        <select class="form-control">
                                            <option>
                                                <?php echo !empty($service_detail->name) ? $service_detail->name : 'Service'; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 search-res-textbox">
                                <input type="text" class="form-control" placeholder="Search provider name or area">
                            </div>

                            <div class="col-md-1 search-res-btn">
                                <img src="<?php echo base_url(); ?>assets/img/love.png" class="search-img-find-icon">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>

        <section class="featured-partners section-padding-top">
            <div class="container">
                <div class="row section-padding-bottom u-line">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title">
                                <?php echo !empty($service_detail->name) ? $service_detail->name : 'Service'; ?> Providers
                            </h3>
                            <div class="user-line margin-b-none m-t-10"></div>
                            <p class="text-light-black mt-2">
                                Select a service provider and continue to profile / booking page.
                            </p>
                        </div>
                    </div>

                    <?php if (!empty($providers)) { ?>
                        
                    <?php foreach ($providers as $single) { ?>

    <!-- 🔥 AHI TAMARU PREMIUM CARD -->
    <div class="col-md-4 col-sm-6 col-12">
        <div class="premium-card">

            <div class="premium-img">
                <img src="<?php echo $provider_image; ?>" alt="">
                
                <div class="wishlist">
                    <i class="fas fa-heart"></i>
                </div>

                <span class="badge-verified">✔ Verified</span>
            </div>

            <div class="premium-body">

                <h5 class="provider-name">
                    <?php echo htmlspecialchars($single->owner_name ?: $single->restaurant_name); ?>
                </h5>

                <p class="provider-service">
                    <?php echo $single->category_name; ?>
                </p>

                <div class="rating">
                    ⭐⭐⭐⭐☆ <span>(4.5)</span>
                </div>

                <div class="price">
                    ₹<?php echo number_format($single->service_price, 2); ?>
                </div>

                <p class="location">
                    <i class="fas fa-map-marker-alt"></i> Surat
                </p>

                <span class="status available">Available Now</span>

                <a href="<?php echo base_url(); ?>Provider-Details/<?php echo $single->restaurant_id; ?>" 
                   class="btn-premium">
                   Book Now
                </a>

            </div>
        </div>
    </div>

<?php } ?>
                    
                    
                
                        <div class="col-12">
                            <div class="review-img">
                                <center>
                                    <img src="<?php echo base_url(); ?>assets/img/no_found.png" class="img-fluid" alt="#">
                                    <div class="review-text">
                                        <h2 class="text-light-white mb-2 fw-600">No Provider Found</h2>
                                        <p class="text-light-white f-s-17">No service provider found for this service yet.</p>
                                    </div>
                                </center>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php $this->load->view("footer"); ?>
        <?php $this->load->view("footerscript"); ?>
        <script src="<?php echo base_url() ?>assets/js/munchbox.js" type="text/javascript"></script>
    </body>
</html>