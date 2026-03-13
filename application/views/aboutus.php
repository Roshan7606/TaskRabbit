<!DOCTYPE html>
<html lang="en">



    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>About Us || TaskRabbit</title>
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

         <section class="about-hero">
        <div class="container text-center">

        <h1>About TaskRabbit</h1>
        <p>Connecting people with trusted service professionals.</p>

        </div>
        </section>
        <!-- Navigation -->
        <!-- slider -->
        
        <!-- slider -->
        <!-- about us -->
        <section class="aboutus section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="history-title mb-md-40">
                            <h2>
                                A History Written For TaskRabbit <br>
                                <span class="text-light-green">Explore More Of Our Story</span>
                            </h2>
                            <p class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <p class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="histry-img mb-xs-20">
                                    <img src="<?php echo base_url(); ?>assets/img/about/blog/255x200/about-section-3.jpg" class="img-fluid full-width" alt="Histry">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="histry-img mb-xl-20">
                                    <img src="<?php echo base_url(); ?>assets/img/about/blog/255x200/about-section-1.jpg" class="img-fluid full-width" alt="Histry">
                                </div>
                                <div class="histry-img">
                                    <img src="<?php echo base_url(); ?>assets/img/about/blog/255x200/about-section-2.jpg" class="img-fluid full-width" alt="Histry">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us -->
        <!-- How It Woks -->
        <section class="section-padding how-it-works bg-light-theme">
            <div class="container">
                <div class="section-header-style-2">
                    <h6 class="text-light-green sub-title">Our Process</h6>
                    <h3 class="text-light-black header-title">How Does It Work</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="process-card">
                        <div class="how-it-works-box arrow-1">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/001-search.png" alt="icon">
                                    <span class="number-box">01</span>
                                </span>
                                <h6>Search</h6>
                                <p>We provided facility to search your favourite Service.</p>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="process-card">
                        <div class="how-it-works-box arrow-2">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/004-shopping-bag.png" alt="icon">
                                    <span class="number-box">02</span>
                                </span>
                                <h6>Select</h6>
                                <p>We have number of services where you can select your favourite service provider.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="process-card">
                        <div class="how-it-works-box arrow-1">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/002-stopwatch.png" alt="icon">
                                    <span class="number-box">03</span>
                                </span>
                                <h6>Book</h6>
                                <p>We provide facility for place Book within  service time,service process is easy and convenient for every user.</p>
                                </div>
                            </div>
                         </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="process-card">
                        <div class="how-it-works-box">
                            <div class="how-it-works-box-inner"> <span class="icon-box">
                                    <img src="<?php echo base_url(); ?>assets/img/003-placeholder.png" alt="icon">
                                    <span class="number-box">04</span>
                                </span>
                                <h6>Enjoy</h6>
                                <p>We provide your favourite service at your doorstep so you enjoy your favourite things.</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- <section class="how-it-works-premium">
<div class="container">

<div class="section-title text-center">
<h6>OUR PROCESS</h6>
<h2>How Does It Work</h2>
</div>

<div class="process-timeline">

<div class="process-step">
<div class="process-circle">01</div>
<div class="process-content">
<i class="fas fa-search"></i>
<h5>Search</h5>
<p>We provided facility to search your favourite service.</p>
</div>
</div>

<div class="process-step">
<div class="process-circle">02</div>
<div class="process-content">
<i class="fas fa-shopping-bag"></i>
<h5>Select</h5>
<p>Choose from a wide range of trusted service providers.</p>
</div>
</div>

<div class="process-step">
<div class="process-circle">03</div>
<div class="process-content">
<i class="fas fa-stopwatch"></i>
<h5>Book</h5>
<p>Book your service easily within your preferred time.</p>
</div>
</div>

<div class="process-step">
<div class="process-circle">04</div>
<div class="process-content">
<i class="fas fa-map-marker-alt"></i>
<h5>Enjoy</h5>
<p>Relax while professionals complete your task.</p>
</div>
</div>

</div>

</div>
</section> -->











        
        <section class="about-stats">
        <div class="row text-center">

        <div class="col-md-3">
        <h2 class="counter" data-count="3.4">0</h2>
        <p>Tasks Completed</p>
        </div>

        <div class="col-md-3">
        <h2 class="counter" data-count="120">0</h2>
        <p>Trusted Taskers</p>
        </div>

        <div class="col-md-3">
        <h2 class="counter" data-count="50">0</h2>
        <p>Cities Covered</p>
        </div>

        <div class="col-md-3">
        <h2 class="counter" data-count="98">0</h2>
        <p>Customer Satisfaction</p>
        </div>

        </div>
        </section>

        <section class="testimonials section-padding bg-light-theme">
<div class="container">

<div class="section-header text-center">
<h3 class="text-light-black">What Our Customers Say</h3>
<p>Trusted by thousands of happy users</p>
</div>

<div class="row">

<div class="col-md-4">
<div class="testimonial-box text-center">

<img src="<?php echo base_url(); ?>assets/img/user1.jpg" class="testimonial-img">

<h6>David Miller</h6>

<div class="testimonial-stars">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>

<p>"Amazing service! Booking a handyman was quick and easy."</p>

</div>
</div>

<div class="col-md-4">
<div class="testimonial-box text-center">

<img src="<?php echo base_url(); ?>assets/img/user2.jpg" class="testimonial-img">

<h6>Sophia Johnson</h6>

<div class="testimonial-stars">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>

<p>"Very professional taskers. I highly recommend TaskRabbit."</p>

</div>
</div>

<div class="col-md-4">
<div class="testimonial-box text-center">

<img src="<?php echo base_url(); ?>assets/img/user3.jpg" class="testimonial-img">

<h6>James Wilson</h6>

<div class="testimonial-stars">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>

<p>"Best platform for finding reliable service providers."</p>

</div>
</div>

</div>

</div>
</section>


        <section class="our-team section-padding">
<div class="container">

<div class="section-header text-center">
<h3>Meet Our Team</h3>
</div>

<div class="row">

<div class="col-md-4">
<div class="team-box text-center">
<img src="<?php echo base_url(); ?>assets/img/team1.jpg" class="img-fluid">
<h6>John Smith</h6>
<p>Founder</p>
</div>
</div>

<div class="col-md-4">
<div class="team-box text-center">
<img src="<?php echo base_url(); ?>assets/img/team2.jpg" class="img-fluid">
<h6>Emily Watson</h6>
<p>Operations Manager</p>
</div>
</div>

<div class="col-md-4">
<div class="team-box text-center">
<img src="<?php echo base_url(); ?>assets/img/team3.jpg" class="img-fluid">
<h6>Michael Lee</h6>
<p>Service Manager</p>
</div>
</div>

</div>

</div>
</section>


<section class="cta-section">
<div class="container text-center">

<div class="cta-content">

<i class="fas fa-tools cta-icon"></i>

<h2>Need Help With Your Tasks?</h2>

<p>Book trusted professionals for any service you need.</p>

<a href="<?php echo base_url(); ?>Restaurant" class="cta-btn">
Book a Tasker
</a>

</div>

</div>
</section>




        <!-- feedback -->
        <!-- footer -->



    <!-- local deals -->
    <!-- footer -->
    <?php
    $this->load->view("footer");
    ?>
    <!-- footer -->
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

    <?php
    $this->load->view("footerscript");
    ?>
    <script>

$('.counter').each(function () {

var $this = $(this);
var countTo = $this.attr('data-count');

$({ countNum: 0 }).animate({
countNum: countTo
},

{
duration: 2000,
easing: 'swing',

step: function () {
$this.text(this.countNum.toFixed(1));
},

complete: function () {

var finalNumber = this.countNum;

if(finalNumber >= 100){
$this.text(finalNumber + "K+");
}
else if(finalNumber == 3.4){
$this.text("3.4M+");
}
else if(finalNumber == 98){
$this.text("98%");
}
else{
$this.text(finalNumber + "+");
}

}

});

});

</script>
</body>



</html>