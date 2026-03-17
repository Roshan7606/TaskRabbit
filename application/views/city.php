<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="#">
<meta name="description" content="#">
<title>Cities || TaskRabbit</title>

<?php
$this->load->view("CSS");
?>
</head>

<body>

<?php
$this->load->view("header");
?>

<div class="main-sec"></div>

<section class="featured-partners section-padding-top">

<div class="container">

<div class="row section-padding-bottom u-line">

<div class="col-12">
<div class="section-header-left">
<h3 class="text-light-black header-title">Explored Cities</h3>
<div class="user-line m-t-10"></div>
</div>
</div>

<?php
foreach($city_detail as $data) {
?>

<div class="col-lg-4 col-md-6 mb-4">

<div class="city-card">

<div class="service-badge">
<?php echo $data->cnt_res; ?> Services
</div>

<div class="city-card-body">

<div class="city-icon">
<i class="fas fa-city"></i>
</div>

<div class="city-title">
<a href="restaurant.php" class="text-light-black">
<?php echo $data->city; ?>
</a>
</div>

<div class="city-state">
India → <?php echo $data->state; ?>
</div>

</div>

<div class="city-card-footer">

<a href="<?php echo base_url(); ?>Restaurant/<?php echo $data->res_location; ?>">
Show All Services
</a>

</div>

</div>

</div>

<?php
}
?>

</div>

</div>

</section>

<?php
$this->load->view("footer");
?>

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

</body>

</html>