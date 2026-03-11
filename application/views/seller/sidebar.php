<!-- Side Nav START -->
<div class="side-nav" style="background: ">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
           
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle sidebar-border" href="<?php echo base_url("Restaurant-Home"); ?>">
                    <span class="icon-holder">
                        <i class="fa fa-th-large sidebar-icon" title="Dashboard"></i>
                    </span>
                    <span class="title sidebar-title">Dashboard</span>
                </a>
            </li>
            
            <!-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Sub-Category"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-briefcase sidebar-icon" title="Service Categories"></i>
                    </span>
                    <span class="title sidebar-title">Service Categories</span>
                </a>
            </li> -->
            
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url('Restaurant-My-Services'); ?>">
                    <span class="icon-holder">
                        <i class="fa fa-briefcase sidebar-icon" title="My Services"></i>
                    </span>
                    <span class="title sidebar-title">My Services</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        <i class="fas fa-tools sidebar-icon" title="Services"></i>
                    </span>
                    <span class="title sidebar-title">Services</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url("Restaurant-Add-Items"); ?>" class="sidebar-title">Add Service</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("Restaurant-Manage-Items"); ?>" class="sidebar-title">Manage Services</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Manage-Schedule"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-calendar-check sidebar-icon" title="Availability"></i>
                    </span>
                    <span class="title sidebar-title">Availability</span>
                </a>
            </li>

            <!-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Manage-Bill-Payment"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-wallet sidebar-icon" title="Payouts"></i>
                    </span>
                    <span class="title sidebar-title">Payouts</span>
                </a>
            </li> -->

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Booking-Requests"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-calendar-plus sidebar-icon" title="Booking Requests"></i>
                    </span>
                    <span class="title sidebar-title">Booking Requests</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Item-Review-Rating"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-star sidebar-icon" title="Reviews & Ratings"></i>
                    </span>
                    <span class="title sidebar-title">Reviews & Ratings</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        <i class="fas fa-cog sidebar-icon" title="Settings"></i>
                    </span>
                    <span class="title sidebar-title">Settings</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url("Restaurant-Edit-Profile") ?>" class="sidebar-title">Provider Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("Restaurant-Change-Password"); ?>" class="sidebar-title">Change Password</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Logout"); ?>">
                    <span class="icon-holder">
                        <i class="fa fa-sign-out-alt sidebar-icon" title="Logout"></i>
                    </span>
                    <span class="title sidebar-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->