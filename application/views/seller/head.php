<?php 
    $seller_detail = $this->md->my_select("tbl_restaurant", "*",array("restaurant_id"=>$this->session->userdata("seller_email")));
?>


<style>
.provider-logo-wrap{
    display:flex;
    align-items:center;
    height:170px;
    height:50px;
    padding-left:30px;
    text-decoration:none;
}

.provider-logo-main{
    max-height:170px;
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

.logo.logo-dark{
    display:flex;
    align-items:center;
    overflow:hidden;
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
                    <i class="anticon anticon-bell notification-badge sidebar-icon"></i>
                </a>
                <div class="dropdown-menu pop-notification">
                    <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                        <p class="text-dark font-weight-semibold m-b-0">
                            <i class="anticon anticon-bell"></i>
                            <span class="m-l-10">Notification</span>
                        </p>
                        <a class="btn-sm btn-default btn" href="javascript:void(0);">
                            <small>View All</small>
                        </a>
                    </div>
                    <div class="relative">
                        <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-mail"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">You received a new message</p>
                                        <p class="m-b-0"><small>8 min ago</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">New user registered</p>
                                        <p class="m-b-0"><small>7 hours ago</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">System Alert</p>
                                        <p class="m-b-0"><small>8 hours ago</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                <div class="d-flex">
                                    <div class="avatar avatar-gold avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">You have a new update</p>
                                        <p class="m-b-0"><small>2 days ago</small></p>
                                    </div>
                                </div>
                            </a>
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