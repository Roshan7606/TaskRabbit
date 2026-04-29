<?php 
    $seller_detail = $this->md->my_select("tbl_restaurant", "*",array("restaurant_id"=>$this->session->userdata("seller_email")));
?>


<style>
    .header {
        background: #ffffff !important;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        border-bottom: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        overflow: visible;
        position: relative;
        z-index: 100;
    }

    .header::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.55), transparent 45%);
    }

    .header .logo.logo-dark {
        display: flex;
        align-items: center;
        background: #ffffff;
        border-right: 1px solid rgba(15, 23, 42, 0.06);
        overflow: visible;
    }

    .provider-logo-wrap{
        display:flex;
        align-items:center;
        height:110px;
        padding: 0 28px;
        text-decoration:none;
    }

    .provider-logo-main{
        max-height:74px;
        width:auto;
        display:block;
        object-fit:contain;
    }

    .provider-logo-fold{
        max-height:32px;
        width:auto;
        display:none;
        object-fit:contain;
    }

    .side-nav-folded .provider-logo-main{
        display:none;
    }

    .side-nav-folded .provider-logo-fold{
        display:block;
        margin:auto;
    }

    .nav-wrap {
        background: transparent;
        padding: 0 20px;
        overflow: visible;
    }

    .dropdown-menu {
        z-index: 9999 !important;
        position: absolute !important;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.25s ease;
    }

    .dropdown.show .dropdown-menu {
        opacity: 1;
        transform: translateY(0);
    }

    .header .nav-left > li > a,
    .header .nav-right > li > a,
    .header .nav-right .pointer {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        border-radius: 14px;
        background: #f8fafc;
        border: 1px solid rgba(15, 23, 42, 0.06);
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
        transition: all 0.3s ease;
    }

    .header .nav-left > li > a:hover,
    .header .nav-right > li > a:hover,
    .header .nav-right .pointer:hover {
        background: #f9fafb;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .header .nav-left > li > a:active,
    .header .nav-right > li > a:active,
    .header .nav-right .pointer:active {
        transform: scale(0.96);
        box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08);
    }

    .header .desktop-toggle,
    .header .mobile-toggle,
    .header .nav-right > li {
        margin-right: 10px;
    }

    .header .nav-right > li:last-child {
        margin-right: 0;
    }

    .header .nav-left > li > a .sidebar-icon,
    .header .nav-right > li > a .sidebar-icon,
    .header .nav-right .pointer .sidebar-icon,
    .header .nav-right > li > a i {
        color: #334155 !important;
        transition: all 0.3s ease;
    }

    .header .nav-left > li > a:hover .sidebar-icon,
    .header .nav-right > li > a:hover .sidebar-icon,
    .header .nav-right .pointer:hover .sidebar-icon,
    .header .nav-right > li > a:hover i {
        color: #ff4d4d !important;
    }

    .notification-badge::after {
        background: #ff4d4d;
        box-shadow: 0 0 0 4px rgba(255, 77, 77, 0.12);
    }

    .notification-badge.has-count::after {
        content: attr(data-count);
        position: absolute;
        top: -6px;
        right: -8px;
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        border-radius: 999px;
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    .notification-badge:not(.has-count)::after {
        content: none;
    }

    .head-img {
        width: 46px !important;
        height: 46px !important;
        min-width: 46px !important;
        min-height: 46px !important;
        border-radius: 14px !important;
        padding: 2px;
        background: linear-gradient(45deg, #ff4d4d, #ff7a5c);
        box-shadow: 0 8px 22px rgba(255, 77, 77, 0.22);
        overflow: hidden;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 !important;
        transition: all 0.3s ease;
    }

    .head-img img {
        width: 100%;
        height: 100%;
        display: block;
        min-width: 0 !important;
        min-height: 0 !important;
        border-radius: 12px !important;
        object-fit: cover;
        background: #ffffff;
        margin: 0 !important;
        padding: 0 !important;
    }

    .head-img .round {
        width: 100% !important;
        height: 100% !important;
        min-width: 0 !important;
        min-height: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 !important;
        padding: 0 !important;
        border: 0 !important;
        border-radius: 12px !important;
        background: #ffffff !important;
        color: #111827 !important;
        font-weight: 700 !important;
        font-size: 16px !important;
        line-height: 1 !important;
        text-transform: uppercase;
        box-shadow: none !important;
        object-fit: initial !important;
    }

    .header .nav-right .pointer:hover .head-img {
        transform: scale(1.03);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .pop-notification,
    .pop-profile {
        min-width: 320px;
        margin-top: 16px;
        border-radius: 18px;
        border: 1px solid rgba(15, 23, 42, 0.06);
        background: #ffffff;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.12);
        overflow: hidden;
        z-index: 9999 !important;
    }

    .pop-notification .border-bottom,
    .pop-profile .border-bottom,
    .pop-notification .dropdown-item.border-bottom {
        border-color: rgba(15, 23, 42, 0.06) !important;
    }

    .pop-notification .text-dark,
    .pop-profile .text-dark {
        color: #111827 !important;
    }

    .pop-notification small,
    .pop-profile .opacity-07,
    .pop-notification .m-b-0 small {
        color: #64748b !important;
    }

    .pop-notification .btn-default {
        border: 1px solid rgba(255, 77, 77, 0.12);
        border-radius: 999px;
        padding: 8px 14px;
        color: #ff4d4d;
        background: #fff5f5;
        box-shadow: none;
    }

    .pop-notification .dropdown-item,
    .pop-profile .dropdown-item {
        color: #334155 !important;
        transition: all 0.3s ease;
    }

    .pop-notification .dropdown-item:hover,
    .pop-profile .dropdown-item:hover {
        background: #f9fafb;
        transform: translateX(4px);
        box-shadow: none;
    }

    .pop-profile .avatar-lg.avatar-image,
    .pop-profile .avatar-image {
        border-radius: 14px;
        overflow: hidden;
        background: linear-gradient(45deg, #ff4d4d, #ff7a5c);
        padding: 2px;
    }

    .pop-profile .avatar-lg.avatar-image img,
    .pop-profile .avatar-image img {
        border-radius: 12px;
        object-fit: cover;
        background: #ffffff;
    }

    @media (max-width: 991.98px) {
        .provider-logo-wrap {
            padding: 0 18px;
        }

        .provider-logo-main {
            max-height: 60px;
        }

        .nav-wrap {
            padding: 0 14px;
        }
    }
</style>


<!-- Header START -->
<div class="header">
    <div class="logo logo-dark">
        <a href="<?php echo base_url("Restaurant-Home"); ?>" class="provider-logo-wrap">
            <img src="<?php echo base_url(); ?>seller_assets/images/logo/logo.png" class="provider-logo-main" alt="TaskRabbit Logo">
            <img src="<?php echo base_url(); ?>seller_assets/images/logo/logo-fold.png" class="provider-logo-fold" alt="TaskRabbit Small Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon sidebar-icon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon sidebar-icon"></i>
                </a>
            </li>

        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <a href="javascript:void(0);" data-toggle="dropdown" >
                    <i id="task-provider-notification-bell" class="anticon anticon-bell notification-badge sidebar-icon" data-count="0"></i>
                </a>
                <div class="dropdown-menu pop-notification">
                    <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                        <p class="text-dark font-weight-semibold m-b-0">
                            <i class="anticon anticon-bell"></i>
                            <span class="m-l-10">Notification</span>
                        </p>
                        <a class="btn-sm btn-default btn" href="<?php echo base_url('Restaurant-Booking-Requests'); ?>">
                            <small id="task-provider-notification-count">0 New</small>
                        </a>
                    </div>
                    <div class="relative">
                        <div id="task-provider-notification-list" class="overflow-y-auto relative scrollable" style="max-height: 300px">
                            <div class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-bell"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">No new task notifications</p>
                                        <p class="m-b-0"><small>New task assignments will appear here.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15 head-img">
                        <?php
                            if($seller_detail[0]->profile_pic == "")
                            {
                        ?>
                        <img class="round" height="40" width="40" avatar="<?php echo substr($seller_detail[0]->restaurant_name, 0,1); ?>">
                        <?php 
                            }
                            else 
                            {
                        ?>
                        <img src="<?php echo base_url().$seller_detail[0]->profile_pic; ?>"  alt="">
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-15">
                            <div class="avatar avatar-lg avatar-image">
                                <?php
                            if($seller_detail[0]->profile_pic == "")
                            {
                        ?>
                        <img class="round" height="30" width="40" avatar="<?php echo substr($seller_detail[0]->restaurant_name, 0,1); ?>">
                        <?php 
                            }
                            else 
                            {
                        ?>
                        <img src="<?php echo base_url().$seller_detail[0]->profile_pic; ?>"  alt="">
                        <?php
                            }
                        ?>
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold"><?php echo $seller_detail[0]->restaurant_name; ?></p>
                                <p class="m-b-0 opacity-07"><?php  echo date("d-m-Y h:i:s a", strtotime($seller_detail[0]->lastlogin)); ?></p>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('Restaurant-Edit-Profile'); ?>" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="opacity-04 font-size-16 fas fa-user"></i>
                                <span class="m-l-10">Edit Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url('Restaurant-Change-Password'); ?>" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="opacity-04 font-size-16 fas fa-lock"></i>
                                <span class="m-l-10">Account Setting</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url('Restaurant-Edit-Profile'); ?>" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="opacity-04 font-size-16 fas fa-university"></i>
                                <span class="m-l-10">Bank Detail Setting</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url('Restaurant-Edit-Profile'); ?>" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="opacity-04 font-size-16 fas fa-street-view"></i>
                                <span class="m-l-10">location Detail Setting</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url("Restaurant-Logout"); ?>" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Logout</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>    
<!-- Header END -->
