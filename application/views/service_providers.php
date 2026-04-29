<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title><?php echo !empty($service_detail->name) ? $service_detail->name : 'Service Providers'; ?> | TaskRabbit</title>

<?php $this->load->view("CSS"); ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

/* GLOBAL */

body{
font-family:'Inter',sans-serif;
background:
radial-gradient(circle at 10% 20%,#f9fbff 0%,#eef2f7 60%,#e9edf3 100%);
}


/* CARD */

.premium-card{

background:#ffffff;

border-radius:28px;

overflow:hidden;
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

position:relative;

transition:all .45s cubic-bezier(.2,.8,.2,1);

box-shadow:

0 60px 120px rgba(0,0,0,0.12),
0 20px 40px rgba(0,0,0,0.08),
inset 0 1px 0 rgba(255,255,255,0.6);

}


/* PREMIUM LIGHT BORDER */

.premium-card:before{

content:"";

position:absolute;

inset:0;

border-radius:28px;

padding:1px;

background:

linear-gradient(
120deg,
rgba(255,255,255,0.9),
rgba(255,255,255,0.2)
);

-webkit-mask:
linear-gradient(#fff 0 0) content-box,
linear-gradient(#fff 0 0);

-webkit-mask-composite:xor;

mask-composite:exclude;

}


/* HOVER */

.premium-card:hover{

transform:translateY(-20px) scale(1.03);

box-shadow:

0 90px 160px rgba(0,0,0,0.2),
0 30px 60px rgba(0,0,0,0.12);

}


/* IMAGE */

.premium-img{

height:250px;

overflow:hidden;

position:relative;

}

.premium-img img{

width:100%;
height:100%;
object-fit:cover;

transition:1.2s;

}

.premium-card:hover img{

transform:scale(1.15);

}


/* IMAGE SHADOW */

.premium-img:after{

content:"";

position:absolute;

inset:0;

background:

linear-gradient(
to top,
rgba(0,0,0,.55),
transparent 60%
);

opacity:.3;

}


/* BADGE */

.badge-available{

position:absolute;

top:18px;
right:18px;

background:linear-gradient(135deg,#00c853,#00e676);

padding:8px 18px;

border-radius:40px;

font-size:12px;

color:#fff;

font-weight:600;

box-shadow:

0 15px 30px rgba(0,0,0,.3);

}


/* BODY */

.premium-body{

padding:32px;

}


/* NAME */

.provider-name{

font-size:22px;

font-weight:700;

margin-bottom:6px;

}


/* CATEGORY */

.category{

font-size:13px;

color:#64748b;

margin-bottom:20px;

}


/* PRICE */

.price-row{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:20px;

}

.price-row span{

color:#94a3b8;

font-size:13px;

}

.price-row h3{

font-size:26px;

font-weight:800;

color:#ff3b3b;

}


/* CONTACT */

.contact{

font-size:13px;

color:#475569;

margin-bottom:18px;

}


/* RATING */

.rating{

color:#fbbf24;

font-size:15px;

letter-spacing:2px;

margin-bottom:24px;

}


/* BUTTON */

.premium-btn{

display:block;

width:100%;

text-align:center;

padding:16px;

border-radius:60px;

font-weight:600;

color:#fff;

background:

linear-gradient(
135deg,
#ff3b3b,
#ff6b6b
);

box-shadow:

0 20px 40px rgba(255,59,59,.35);

transition:.35s;

}

.premium-btn:hover{

transform:translateY(-4px);

box-shadow:

0 30px 60px rgba(255,59,59,.45);

}

</style>

</head>

<body>

<?php $this->load->view("header"); ?>

<div class="main-sec"></div>

<section class="section-padding-top">

<div class="container">

<div class="row mb-4">

<div class="col-12">

<h2 class="header-title">
<?php echo !empty($service_detail->name) ? $service_detail->name : 'Service'; ?> Providers
</h2>

<p>Select a service provider and continue to profile / booking page.</p>

</div>

</div>

<div class="row provider-grid">

<?php if (!empty($providers)) { ?>

<?php foreach ($providers as $single) { ?>

<div class="col-md-4 mb-4">

<div class="premium-card">

<div class="premium-img">

<a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>?service_id=<?php echo (int) $single->category_id; ?>">

<?php
if(!empty($single->coverpic)){
$provider_image = base_url($single->coverpic);
}else{
$provider_image = base_url("assets/img/deals/360x178/shop-1.jpg");
}
?>

<img src="<?php echo $provider_image; ?>">

</a>

<div class="badge-available">Available</div>

</div>

<div class="premium-body">

<h4 class="provider-name">
<?php echo !empty($single->owner_name) ? $single->owner_name : $single->restaurant_name; ?>
</h4>

<p class="category">
<?php echo $single->category_name; ?>
</p>

<div class="price-row">

<span>Starting Price</span>

<h3>₹<?php echo number_format($single->service_price,0); ?></h3>

</div>

<p class="contact">
📞 <?php echo !empty($single->owner_contactno) ? $single->owner_contactno : $single->contact_no; ?>
</p>

<!-- <div class="rating">
★★★★★
</div> -->

<a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>?service_id=<?php echo (int) $single->category_id; ?>" class="premium-btn btn-second btn-submit">

View Profile

</a>

</div>

</div>

</div>

<?php } ?>

<?php } else { ?>

<div class="col-12 no-provider">

<img src="<?php echo base_url(); ?>assets/img/no_found.png">

<h3>No Provider Found</h3>

<p>No service provider found for this service yet.</p>

</div>

<?php } ?>

</div>

</div>

</section>

<?php $this->load->view("footer"); ?>
<?php $this->load->view("footerscript"); ?>

<script src="<?php echo base_url() ?>assets/js/munchbox.js"></script>

</body>
</html>
