<?php if($this->session->flashdata('success')){ ?>
<div class="alert alert-success">
<?php echo $this->session->flashdata('success'); ?>
</div>
<?php } ?>

<?php
$seller_detail = $this->md->my_select("tbl_restaurant", "*", array("restaurant_id" => $this->session->userdata("seller_email")));
?>

<?php $provider = isset($edit_profile[0]) ? $edit_profile[0] : null; ?>

<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>TaskRabbit | Service Provider Profile</title>

<?php $this->load->view("seller/headerscript"); ?>

<style>
.provider-section{
display:block;
}
</style>

</head>

<body>

<div class="app">
<div class="layout">

<?php
$this->load->view("seller/head");
$this->load->view("seller/sidebar");
?>

<div class="page-container">

<div class="main-content">

<div class="page-header no-gutters has-tab">

<h2 class="font-weight-normal">Service Provider Profile</h2>

<ul class="nav nav-tabs">

<li class="nav-item">
<a class="nav-link active provider-tab-link" href="#" data-target="tab-account">Profile</a>
</li>

<li class="nav-item">
<a class="nav-link provider-tab-link" href="#" data-target="tab-network">Location</a>
</li>

</ul>

</div>


<div class="">
<div class="tab-content m-t-15">


<div id="tab-account" class="provider-section">

<div class="row">


<div class="col-md-6">

<div class="card">

<div class="card-header">
<h4 class="card-title">Provider Account Information</h4>
</div>

<div class="card-body">

<form method="post" action="">

<?php
if (!isset($seller_account_info)) {

foreach ($edit_profile as $data) {
?>

<div class="form-row">

<div class="form-group col-md-4">

<label class="font-weight-semibold" for="restaurantName">Provider Name:</label>

<input type="text" name="resname" disabled="" autofocus="" class="form-control" id="restaurantName"
placeholder="<?php
if ($data->restaurant_name == "") {
echo 'Data Not Found';
} else {
echo $data->restaurant_name;
}
?>">

</div>


<div class="form-group col-md-4">

<label class="font-weight-semibold" for="email">Email:</label>

<input type="email" disabled="" name="email" class="form-control" id="email"
placeholder="<?php
if ($data->email == "") {
echo 'Data Not Found';
} else {
echo $data->email;
}
?>">

</div>


<div class="form-group col-md-4">

<label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>

<input type="text" disabled="" name="contactno" class="form-control" id="phoneNumber"
placeholder="<?php
if ($data->contact_no == "") {
echo 'Data Not Found';
} else {
echo $data->contact_no;
}
?>">

</div>

</div>


<div class="form-row">
<div class="col-md-4">
<a href="Edit-Restaurant-Account" class="btn change-profile-btn" name="editprofile">Edit Profile</a>
</div>
</div>

<?php
}
}
else {

foreach ($edit_profile as $data) {
?>

<div class="form-row">

<div class="form-group col-md-4">

<label class="font-weight-semibold">Provider Name:</label>

<input type="text" name="resname" class="form-control"
value="<?php echo $data->restaurant_name; ?>">

</div>

<div class="form-group col-md-4">

<label class="font-weight-semibold">Email:</label>

<input type="email" name="email" class="form-control"
value="<?php echo $data->email; ?>">

</div>

<div class="form-group col-md-4">

<label class="font-weight-semibold">Phone Number:</label>

<input type="text" name="contactno" class="form-control"
value="<?php echo $data->contact_no; ?>">

</div>

</div>


<div class="form-row">
<div class="col-md-4">
<button type="submit" class="btn change-profile-btn" value="updateaccount" name="updateaccount">Update Account</button>
</div>
</div>

<?php
}
}
?>

</form>

</div>
</div>


<div class="card mt-4">

<div class="card-header">
<h4 class="card-title">Profile Images</h4>
</div>

<div class="card-body">

<!-- <form action="<?= base_url('Restaurant/upload_provider_image') ?>" method="post" enctype="multipart/form-data"> -->
<form action="<?= base_url('upload_provider_image') ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="restaurant_id" value="<?= $provider->restaurant_id ?>">

<div class="form-group">
<label>Profile Photo</label>
<input type="file" name="profile_pic" class="form-control">
</div>

<div class="form-group">
<label>Cover Photo</label>
<input type="file" name="cover_pic" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Upload</button>

</form>
</div>
</div>


</div>


<div class="col-md-6">

<div class="card">

<div class="card-header">
<h4 class="card-title">Professional Details</h4>
</div>

<div class="card-body">

<form method="post" action="<?= base_url('Restaurant/update_profile'); ?>">

<div class="form-row">

<div class="form-group col-md-6">
<label class="font-weight-semibold">Primary Skill:</label>
<input type="text" name="primary_skill" class="form-control"
value="<?php echo ($provider && isset($provider->primary_skill)) ? $provider->primary_skill : ''; ?>">
</div>

<div class="form-group col-md-6">
<label class="font-weight-semibold">Experience:</label>
<input type="text" name="experience" class="form-control"
value="<?php echo ($provider && isset($provider->experience)) ? $provider->experience : ''; ?>">
</div>

</div>


<div class="form-row">

<div class="form-group col-md-6">
<label class="font-weight-semibold">Starting Price:</label>
<input type="text" name="starting_price" class="form-control"
value="<?php echo ($provider && isset($provider->starting_price)) ? $provider->starting_price : ''; ?>">
</div>

<div class="form-group col-md-6">
<label class="font-weight-semibold">Languages Known:</label>
<input type="text" name="languages" class="form-control"
value="<?php echo ($provider && isset($provider->languages)) ? $provider->languages : ''; ?>">
</div>

</div>


<div class="form-row">

<div class="form-group col-md-12">

<label class="font-weight-semibold">About Me:</label>

<textarea name="about_me" class="form-control" rows="4"><?php echo ($provider && isset($provider->about_me)) ? $provider->about_me : ''; ?></textarea>

</div>

</div>


<div class="form-row">
<div class="col-md-4">
<button type="submit" class="btn change-profile-btn">Save Details</button>
</div>
</div>

</form>

</div>
</div>

</div>


</div>

</div>


</div>

</div>

<?php $this->load->view("seller/footer"); ?>

</div>

</div>

</div>

<?php $this->load->view("seller/footerscript"); ?>

<script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

const links = document.querySelectorAll('.provider-tab-link');
const sections = document.querySelectorAll('.provider-section');

links.forEach(link => {

link.addEventListener('click', function (e) {

e.preventDefault();

const targetId = this.getAttribute('data-target');

links.forEach(l => l.classList.remove('active'));
this.classList.add('active');

sections.forEach(section => {
section.style.display = 'none';
});

const targetSection = document.getElementById(targetId);

if (targetSection) {
targetSection.style.display = 'block';
}

});

});

});

</script>

</body>
</html>