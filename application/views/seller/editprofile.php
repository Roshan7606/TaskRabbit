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
            :root {
                --dash-bg: #0f172a;
                --dash-surface: rgba(30, 41, 59, 0.72);
                --dash-surface-strong: rgba(30, 41, 59, 0.92);
                --dash-border: rgba(255, 255, 255, 0.08);
                --dash-border-strong: rgba(255, 107, 0, 0.28);
                --dash-text: #f8fafc;
                --dash-muted: #94a3b8;
                --dash-primary: #ff6b00;
                --dash-secondary: #ff8c42;
            }

            body {
                background:
                    radial-gradient(circle at top left, rgba(59, 130, 246, 0.16), transparent 24%),
                    radial-gradient(circle at top right, rgba(255, 107, 0, 0.18), transparent 22%),
                    radial-gradient(circle at 85% 18%, rgba(255, 140, 66, 0.14), transparent 14%),
                    linear-gradient(180deg, #020617 0%, #0f172a 52%, #111827 100%);
                color: var(--dash-text);
                position: relative;
            }

            body::before {
                content: "";
                position: fixed;
                inset: 0;
                pointer-events: none;
                opacity: 0.06;
                background-image:
                    radial-gradient(rgba(248, 250, 252, 0.16) 0.6px, transparent 0.6px),
                    radial-gradient(rgba(255, 107, 0, 0.14) 0.6px, transparent 0.6px);
                background-position: 0 0, 12px 12px;
                background-size: 24px 24px;
            }

            .page-container,
            .main-content {
                background: transparent;
            }

            .main-content {
                padding: 28px;
                position: relative;
                overflow: hidden;
            }

            .main-content::before,
            .main-content::after {
                content: "";
                position: absolute;
                border-radius: 999px;
                pointer-events: none;
                filter: blur(12px);
            }

            .main-content::before {
                top: -100px;
                right: -90px;
                width: 260px;
                height: 260px;
                background: rgba(255, 107, 0, 0.2);
            }

            .main-content::after {
                bottom: 30px;
                left: -70px;
                width: 220px;
                height: 220px;
                background: rgba(59, 130, 246, 0.14);
            }

            .dashboard-shell {
                position: relative;
                z-index: 1;
                animation: dashboardFade 0.9s cubic-bezier(0.22, 1, 0.36, 1);
            }

            .dashboard-hero {
                position: relative;
                padding: 30px;
                margin-bottom: 28px;
                border-radius: 28px;
                border: 1px solid rgba(255, 255, 255, 0.08);
                background: linear-gradient(135deg, rgba(30, 41, 59, 0.82), rgba(15, 23, 42, 0.94) 42%, rgba(30, 41, 59, 0.92) 100%);
                box-shadow: 0 28px 70px rgba(2, 6, 23, 0.52), 0 0 40px rgba(255, 107, 0, 0.08);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .dashboard-hero::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.08), transparent 35%),
                    radial-gradient(circle at 100% 0%, rgba(255, 140, 66, 0.14), transparent 30%);
                pointer-events: none;
            }

            .dashboard-hero::after {
                content: "";
                position: absolute;
                inset: 1px;
                border-radius: inherit;
                border: 1px solid rgba(255, 255, 255, 0.06);
                pointer-events: none;
            }

            .dashboard-hero > .row,
            .profile-card .card-body {
                position: relative;
                z-index: 1;
            }

            .hero-eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 15px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.12);
                border: 1px solid rgba(255, 107, 0, 0.18);
                color: #fed7aa;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 16px;
            }

            .hero-title {
                margin-bottom: 10px;
                font-size: 2.15rem;
                font-weight: 800;
                line-height: 1.05;
                color: var(--dash-text);
                letter-spacing: -0.03em;
            }

            .hero-description,
            .hero-meta,
            .profile-subtitle {
                color: var(--dash-muted);
            }

            .hero-description {
                max-width: 640px;
                margin-bottom: 0;
                line-height: 1.7;
            }

            .hero-profile {
                display: flex;
                justify-content: flex-end;
            }

            .hero-profile-card {
                width: 100%;
                max-width: 360px;
                padding: 22px;
                border-radius: 24px;
                background: rgba(15, 23, 42, 0.58);
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.06), 0 24px 44px rgba(2, 6, 23, 0.42), 0 0 24px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
            }

            .hero-profile-card:hover {
                transform: translateY(-6px) scale(1.015);
                border-color: rgba(255, 107, 0, 0.24);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08), 0 30px 50px rgba(2, 6, 23, 0.5), 0 0 28px rgba(255, 107, 0, 0.1);
            }

            .hero-meta-title {
                margin-bottom: 10px;
                color: #f8fafc;
                font-size: 1.05rem;
                font-weight: 800;
            }

            .hero-status {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding-top: 14px;
                margin-top: 16px;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
            }

            .status-pill {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 14px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.14);
                color: #fed7aa;
                font-size: 0.85rem;
                font-weight: 700;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
            }

            .status-pill i {
                color: var(--dash-primary);
                font-size: 0.7rem;
                animation: pulseDot 1.8s ease-in-out infinite;
            }

            .hero-status small {
                color: #cbd5e1;
                font-size: 0.9rem;
            }

            .profile-tabs {
                display: inline-flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 24px;
                padding: 8px;
                border-radius: 999px;
                background: rgba(15, 23, 42, 0.48);
                border: 1px solid rgba(255, 255, 255, 0.06);
            }

            .profile-tabs .nav-link {
                border: 0;
                border-radius: 999px;
                padding: 11px 20px;
                color: var(--dash-muted);
                font-weight: 700;
                transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            }

            .profile-tabs .nav-link.active,
            .profile-tabs .nav-link:hover {
                color: #fff;
                background: linear-gradient(135deg, #ff6b00, #ff8c42);
                box-shadow: 0 16px 28px rgba(255, 107, 0, 0.22);
                transform: translateY(-1px);
            }

            .profile-content {
                margin-top: 6px;
            }

            .provider-section {
                display: block;
            }

            .profile-card {
                position: relative;
                border-radius: 24px;
                border: 1px solid var(--dash-border);
                background: linear-gradient(180deg, rgba(30, 41, 59, 0.82) 0%, rgba(15, 23, 42, 0.94) 100%);
                box-shadow: 0 24px 52px rgba(2, 6, 23, 0.48), 0 0 30px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .profile-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(180deg, rgba(255, 255, 255, 0.06), transparent 30%),
                    radial-gradient(circle at top right, rgba(255, 140, 66, 0.12), transparent 28%);
                pointer-events: none;
            }

            .profile-card .card-header,
            .profile-card .card-body {
                position: relative;
                z-index: 1;
            }

            .profile-card .card-header {
                padding: 24px 26px 0;
                border-bottom: 0;
                background: transparent;
            }

            .profile-card .card-body {
                padding: 24px 26px 26px;
            }

            .profile-card .card-title {
                margin-bottom: 0;
                color: #f8fafc;
                font-size: 1.2rem;
                font-weight: 800;
                letter-spacing: -0.02em;
            }

            .profile-card.mt-4 {
                margin-top: 24px !important;
            }

            .alert {
                border-radius: 16px;
                padding: 15px 18px;
                margin-bottom: 18px;
                border: 1px solid transparent;
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
            }

            .alert-success {
                background: rgba(34, 197, 94, 0.12);
                border-color: rgba(34, 197, 94, 0.2);
                color: #bbf7d0;
                box-shadow: 0 14px 32px rgba(34, 197, 94, 0.08);
            }

            label,
            .font-weight-semibold {
                color: #fdba74 !important;
                font-weight: 700 !important;
            }

            .form-row {
                margin-left: -10px;
                margin-right: -10px;
            }

            .form-row > [class*="col-"],
            .form-group {
                padding-left: 10px;
                padding-right: 10px;
            }

            .form-group {
                margin-bottom: 18px;
            }

            .form-control {
                height: 50px;
                border-radius: 14px;
                border: 1px solid rgba(255, 255, 255, 0.09);
                background: #1e293b;
                color: #f8fafc;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03);
                transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease, opacity 0.3s ease;
            }

            textarea.form-control {
                min-height: 130px;
                height: auto;
                padding-top: 14px;
            }

            .form-control::placeholder {
                color: #64748b;
            }

            .form-control:focus {
                background: #1e293b;
                color: #f8fafc;
                border-color: rgba(255, 107, 0, 0.7);
                box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.14), 0 0 22px rgba(255, 107, 0, 0.1);
                transform: translateY(-1px);
            }

            .form-control[disabled] {
                background: rgba(30, 41, 59, 0.72);
                color: #cbd5e1;
                opacity: 1;
                cursor: not-allowed;
            }

            input[type="file"].form-control {
                padding: 10px 14px;
            }

            .change-profile-btn,
            .btn-primary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 0;
                border-radius: 999px;
                padding: 13px 28px;
                font-weight: 700;
                letter-spacing: 0.01em;
                color: #fff !important;
                background: linear-gradient(135deg, #ff6b00, #ff8c42);
                box-shadow: 0 18px 30px rgba(255, 107, 0, 0.24);
                transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
                text-decoration: none !important;
            }

            .change-profile-btn:hover,
            .change-profile-btn:focus,
            .btn-primary:hover,
            .btn-primary:focus {
                color: #fff !important;
                background: linear-gradient(135deg, #ff6b00, #ff8c42);
                transform: translateY(-3px);
                box-shadow: 0 24px 40px rgba(255, 107, 0, 0.28), 0 0 22px rgba(255, 140, 66, 0.16);
                opacity: 0.98;
            }

            .search .modal-content,
            .quick-view .modal-content {
                background: #1e293b;
                color: var(--dash-text);
            }

            .search .text-dark,
            .quick-view .text-dark {
                color: var(--dash-text) !important;
            }

            @keyframes dashboardFade {
                from {
                    opacity: 0;
                    transform: translateY(22px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes pulseDot {
                0%,
                100% {
                    transform: scale(1);
                    opacity: 1;
                }
                50% {
                    transform: scale(1.45);
                    opacity: 0.55;
                }
            }

            @media (max-width: 991.98px) {
                .main-content {
                    padding: 20px;
                }

                .dashboard-hero {
                    padding: 22px;
                }

                .hero-profile {
                    justify-content: flex-start;
                    margin-top: 24px;
                }

                .profile-card .card-header,
                .profile-card .card-body {
                    padding-left: 22px;
                    padding-right: 22px;
                }
            }

            @media (max-width: 767.98px) {
                .main-content {
                    padding: 16px;
                }

                .dashboard-hero {
                    padding: 20px;
                    border-radius: 22px;
                }

                .hero-title {
                    font-size: 1.8rem;
                }

                .hero-profile-card {
                    max-width: 100%;
                }

                .profile-tabs {
                    width: 100%;
                    border-radius: 22px;
                }

                .profile-tabs .nav-link {
                    width: 100%;
                    justify-content: center;
                    text-align: center;
                }

                .profile-card {
                    border-radius: 20px;
                }

                .profile-card .card-header,
                .profile-card .card-body {
                    padding-left: 20px;
                    padding-right: 20px;
                }

                .change-profile-btn,
                .btn-primary {
                    width: 100%;
                }
            }
</style>
<style>
            .hero-profile-card,
            .profile-card,
            .profile-tabs .nav-link,
            .change-profile-btn,
            .btn-primary,
            .form-control {
                transition: all 0.3s ease;
            }

            .hero-profile-card:hover,
            .profile-card:hover {
                transform: translateY(-4px);
                background: #ffffff;
                border-color: #f1f1f1;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .profile-tabs .nav-link:hover,
            .profile-tabs .nav-link.active {
                color: #ffffff;
                filter: none !important;
                opacity: 1 !important;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .change-profile-btn:hover,
            .change-profile-btn:focus,
            .btn-primary:hover,
            .btn-primary:focus {
                background: linear-gradient(45deg, #ff5c5c, #ff6a4e);
                opacity: 1 !important;
                filter: none !important;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }
</style>
<style>
            body {
                background:
                    radial-gradient(circle at top left, rgba(255, 90, 60, 0.09), transparent 24%),
                    radial-gradient(circle at top right, rgba(255, 122, 92, 0.10), transparent 22%),
                    linear-gradient(180deg, #fcfcfe 0%, #f6f7fb 58%, #eef2f7 100%);
                color: #1f2937;
                font-family: "Poppins", "Inter", "Segoe UI", sans-serif;
            }

            .main-content {
                padding: 32px;
            }

            .dashboard-shell {
                animation: sellerProfileFade 0.7s ease;
            }

            .dashboard-hero,
            .profile-card {
                border-radius: 24px;
                background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            }

            .dashboard-hero::before,
            .profile-card::before {
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.65), transparent 36%),
                    radial-gradient(circle at 100% 0%, rgba(255, 90, 60, 0.10), transparent 30%);
            }

            .hero-eyebrow,
            .status-pill {
                background: rgba(255, 255, 255, 0.92);
                border-color: rgba(255, 90, 60, 0.14);
                color: #ff5a3c;
                box-shadow: 0 10px 24px rgba(255, 90, 60, 0.08);
            }

            .hero-title,
            .hero-meta-title,
            .profile-card .card-title {
                color: #1f2937;
            }

            .hero-description,
            .hero-meta,
            .hero-status small,
            .profile-subtitle {
                color: #6b7280 !important;
            }

            .hero-profile-card {
                background: rgba(255, 255, 255, 0.84);
                border: 1px solid rgba(255, 90, 60, 0.10);
                box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
            }

            .hero-status {
                border-top-color: rgba(15, 23, 42, 0.08);
            }

            .profile-tabs {
                background: rgba(255, 255, 255, 0.72);
                border-color: rgba(15, 23, 42, 0.06);
                box-shadow: 0 12px 28px rgba(15, 23, 42, 0.05);
            }

            .profile-tabs .nav-link {
                color: #6b7280;
            }

            .profile-tabs .nav-link.active,
            .profile-tabs .nav-link:hover {
                background: linear-gradient(45deg, #ff4d4d, #ff5a3c);
                color: #ffffff;
                box-shadow: 0 16px 28px rgba(255, 90, 60, 0.20);
            }

            label,
            .font-weight-semibold {
                color: #ff5a3c !important;
            }

            .form-control {
                background: #ffffff;
                color: #1f2937;
                border: 1px solid rgba(15, 23, 42, 0.10);
                box-shadow: none;
            }

            .form-control:focus {
                background: #ffffff;
                color: #1f2937;
                border-color: rgba(255, 90, 60, 0.45);
                box-shadow: 0 0 0 4px rgba(255, 90, 60, 0.10);
            }

            .form-control[disabled] {
                background: #f8fafc;
                color: #64748b;
            }

            .change-profile-btn,
            .btn-primary {
                border-radius: 10px;
                background: linear-gradient(45deg, #ff4d4d, #ff5a3c);
                box-shadow: 0 14px 28px rgba(255, 90, 60, 0.20);
            }

            .change-profile-btn:hover,
            .change-profile-btn:focus,
            .btn-primary:hover,
            .btn-primary:focus {
                box-shadow: 0 18px 32px rgba(255, 90, 60, 0.24);
            }

            @keyframes sellerProfileFade {
                from {
                    opacity: 0;
                    transform: translateY(16px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 991.98px) {
                .main-content {
                    padding: 22px;
                }
            }

            @media (max-width: 767.98px) {
                .main-content {
                    padding: 16px;
                }

                .dashboard-hero,
                .profile-card {
                    border-radius: 22px;
                }
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

<div class="dashboard-shell">

<div class="dashboard-hero">
<div class="row align-items-center">
<div class="col-xl-7">
<span class="hero-eyebrow">
<i class="fas fa-user-cog"></i>
Profile Control
</span>
<h1 class="hero-title">Service Provider Profile</h1>
<p class="hero-description">Manage your provider identity, professional details, and media from the same premium dark workspace used across your dashboard.</p>

<ul class="nav nav-tabs profile-tabs">

<li class="nav-item">
<!-- <a class="nav-link active provider-tab-link" href="#" data-target="tab-account">Profile</a> -->
</li>

<li class="nav-item">
<!-- <a class="nav-link provider-tab-link" href="#" data-target="tab-network">Location</a> -->
</li>

</ul>
</div>

<div class="col-xl-5">
<div class="hero-profile">
<div class="hero-profile-card">
<h4 class="hero-meta-title">Provider Workspace</h4>
<p class="hero-meta">Keep your public profile polished, update key information quickly, and maintain a consistent seller presence.</p>
<div class="hero-status">
<span class="status-pill">
<i class="fas fa-circle"></i>
Profile Live
</span>
<small>Update details anytime</small>
</div>
</div>
</div>
</div>
</div>

</div>


<div class="profile-content">
<div class="tab-content m-t-15">


<div id="tab-account" class="provider-section">

<div class="row">


<div class="col-md-6">

<div class="card profile-card">

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


<div class="card profile-card mt-4">

<div class="card-header">
<h4 class="card-title">Profile Images</h4>
</div>

<div class="card-body">

<!-- <form action="<?= base_url('Restaurant/upload_provider_image') ?>" method="post" enctype="multipart/form-data"> -->
<form action="<?= base_url('upload_provider_image') ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="restaurant_id" value="<?= $provider->restaurant_id ?>">

<!-- <div class="form-group">
<label>Profile Photo</label>
<input type="file" name="profile_pic" class="form-control">
</div> -->

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

<div class="card profile-card">

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
