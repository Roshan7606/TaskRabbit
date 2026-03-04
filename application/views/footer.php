
<div class="footer-top section-padding bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                <div class="icon-box"> <span class="text-light-green"><i class="flaticon-credit-card-1"></i></span>
                    <span class="text-white">100% Payment<br>Secured</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                <div class="icon-box"> <span class="text-light-green"><i class="flaticon-wallet-1"></i></span>
                    <span class="text-white">Support lots<br> of Payments</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                <div class="icon-box"> <span class="text-light-green"><i class="flaticon-help"></i></span>
                    <span class="text-white">244 hours / 7 days<br>Support</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="icon-box"> <span class="text-light-green"><i class="flaticon-truck"></i></span>
                    <span class="text-white">Home Services<br>from &#8377;50</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="icon-box"> <span class="text-light-green"><i class="flaticon-guarantee"></i></span>
                    <span class="text-white">Best Price<br>Guaranteed</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="icon-box"> <span class="text-light-green"><i class="flaticon-app-file-symbol"></i></span>
                    <span class="text-white">Mobile Apps<br>Ready</span>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="section-padding bg-light-theme pt-0 u-line bg-black">
    <div class="u-line instagram-slider swiper-container">
        <ul class="hm-list hm-instagram swiper-wrapper">
            <?php
                $img_res = $this->md->my_select("tbl_restaurant","*");
                   
                foreach($img_res as $data)
                {
                    $itm_add = $this->md->my_select("tbl_item","*",array("restaurant_id"=>$data->restaurant_id,"status"=>1));
                            if(count($itm_add) != 0)
                            {
            ?>
            <li class="swiper-slide" title="<?php echo $data->restaurant_name; ?>">
                    <a href="<?php echo base_url(""); ?>/Restaurant-Details/<?php echo $data->restaurant_id; ?>"><img src="<?php echo base_url().$data->coverpic; ?>" class="swiper-slide-footer-img" alt="instagram"></a>
                </li>
            <?php
                            }
                }
            ?>
        </ul>
    </div>
    <div class="container">
        <div class="row bg-black">
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-contact">
                    <h6 class="text-white">Need Help</h6>
                    <ul>
                        <li class="fw-600"><span class="text-white">Call Us</span> <a href="tel:+917046221211" class="text-white">+(91) 7046221211</a>
                        </li>
                        <li class="fw-600"><span class="text-white">Email</span> <a href="mailto:taskrabbit@domain.com" class="text-white">TaskRabbit@domain.com</a>
                        </li>
                        <li class="fw-600"><span class="text-white">Join our twitter</span> <a href="#" class="text-white">@TaskRabbit</a>
                        </li>
                        <li class="fw-600"><span class="text-white">Join our instagram</span> <a href="#" class="text-white">@TaskRabbit</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-white">Site map</h6>
                    <ul>
                        <li><a href="<?php echo base_url("About-us"); ?>" class="text-white fw-600">About Us</a>
                        </li>
                        <li><a href="<?php echo base_url("Contact-us"); ?>" class="text-white fw-600">Contact US</a>
                        </li>
                        <li><a href="<?php echo base_url("Privacy-policy"); ?>" class="text-white fw-600">Privacy Policy</a>
                        </li>
                        <li><a href="<?php echo base_url("Terms-condition"); ?>" class="text-white fw-600">Terms & Condition</a>
                        </li>
                        <li><a href="<?php echo base_url("Feedback"); ?>" class="text-white fw-600">Give Feedback</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-white">Cities</h6>
                    <ul>
                        <?php 
                            $record_city = $this->md->my_query("select st.name as state, ct.name as city, ct.location_id as res_location , count(*) as cnt_res from tbl_location as st, tbl_location as ct,tbl_restaurant as se,tbl_location as ar where se.location_id = ar.location_id and ct.location_id = ar.parent_id and ct.parent_id = st.location_id  GROUP BY ct.name LIMIT 5");
                            foreach($record_city as $data)
                            {
  
                        ?>
                        <li><a href="<?php echo base_url(); ?>Restaurant/<?php echo $data->res_location; ?>" class="text-white fw-600"><?php echo $data->city; ?></a>
                        <?php
                                
                            }
                        ?>
                        <li><a href="<?php echo base_url("City"); ?>" class="fw-500 Underline" style="color: #ff0000;font-size: 14px;">View More...</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-white">service</h6>
                    <ul>
                        <?php 
                            $record_city = $this->md->my_query("select * from tbl_restaurant LIMIT 5");
                           
                            foreach($record_city as $data)
                            {
                               
                        ?>
                        <li><a href="#" class="text-white fw-600"><?php echo $data->restaurant_name; ?></a>
                        <?php
                                
                            }
                        ?>
                        <li><a href="<?php echo base_url("Restaurant"); ?>/0" class="fw-500 Underline" style="color: #ff0000;font-size: 14px;">View More...</a>
                        </li>
                    </ul>
                </div>
            </div>



        </div>
        <div class="row">
            <div class="col-xl col-lg-6 col-md-6 col-sm-4 col-xs-12">
                <div class="ft-social-media">
                    <h6 class="text-center text-white">Follow us</h6>
                    <ul>
                        <li> <a href="https://www.facebook.com/login.php" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li> <a href="https://twitter.com/login?lang=en" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li> <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li> <a href="https://in.pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                       
                    </ul>
                </div>
            </div>
<!--            <div class="col-xl col-lg-4 col-md-4 col-sm-4 col-xs-12 offset-md-2" >
                <div class="footer-links">
                    <h6 class="text-white text-center">Download Apps</h6>
                    <div class="appimg" style="display: inline;">
                        <a href="https://play.google.com/store?hl=en" target="_blank">
                            <img src="<?php echo base_url(); ?>assets/img/playstore.jpg" class="img-fluid" alt="app logo">
                        </a>
                    </div>
                    <div class="appimg" style="display: inline;">
                        <a href="https://www.apple.com/in/ios/app-store/" target="_blank">
                            <img src="<?php echo base_url(); ?>assets/img/appstore.jpg" class="img-fluid" alt="app logo">
                        </a>
                    </div>
                </div>
            </div>-->
            <div class="col-xl col-lg-6 col-md-6 col-sm-4 col-xs-12 offset-md-2" >
                <div class="footer-contact">
                    <h6 class="text-white">Newsletter</h6>
                    <div class="subscribe_form" name="subscriber" method="post" action="">
                        <div class="input-group" style="position: relative;">
                            <input type="text" class="form-control form-control-submit" name="email" placeholder="Enter your email" id="email">
                            <span class="input-group-btn">
                                <button class="btn btn-second btn-submit" name="add-subscriber" value="add" type="submit" onclick="addsubscriber()"><i class="fas fa-paper-plane"></i></button>
                            </span> 
                            
                        </div>
                        <p style="margin-top: 2%;color: #fff;font-size: 14px;" id="email-message">Subscribe to our newsletter to get latest update and amazing offer</p>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</footer>
<div class="copyright bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="payment-logo mb-md-20"> <span class="text-white fs-14 mr-3">We are accept</span>
                    <div class="payemt-icon">
                        <img src="<?php echo base_url(); ?>assets/img/card-front.jpg" alt="#">
                        <img src="<?php echo base_url(); ?>assets/img/visa.jpg" alt="#">
                        <img src="<?php echo base_url(); ?>assets/img/amex-card-front.png" alt="#">
                        <img src="<?php echo base_url(); ?>assets/img/mastercard.png" alt="#">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center medewithlove align-self-center">
                <a href="http://www.slidesigma.com/" class="text-white">Made with Bharat <i class="fas fa-heart"></i></a>
            </div>
            <div class="col-lg-4">
                <!-- <div class="copyright-text"> <span class="text-white">All Rights © <?php echo date('Y'); ?> Reserved , Design & Developed By <a href="#" class="text-white">TaskRabbit</a></span> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>

window.addEventListener("scroll",function(){

let header=document.querySelector(".header");

if(window.scrollY>60){
header.classList.add("scrolled");
}else{
header.classList.remove("scrolled");
}

});

</script>