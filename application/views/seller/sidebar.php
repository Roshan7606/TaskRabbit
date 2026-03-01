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
            
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Sub-Category"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-utensils sidebar-icon" title="Sub Category"></i>
                    </span>
                    <span class="title sidebar-title">Sub Category</span>
                </a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        <i class="fab fa-product-hunt sidebar-icon" title="Items"></i>
                    </span>
                    <span class="title sidebar-title">Items</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url("Restaurant-Add-Items"); ?>" class="sidebar-title">Add Items</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("Restaurant-Manage-Items"); ?>" class="sidebar-title">Manage Items</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Manage-Schedule"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-calendar-week sidebar-icon" title="Manage Shedule"></i>
                    </span>
                    <span class="title sidebar-title">Manage Schedule</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Manage-Bill-Payment"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-cash-register sidebar-icon" title="Manage Bill Payments"></i>
                    </span>
                    <span class="title sidebar-title">Manage Bill Payments</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Order"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-pencil-alt sidebar-icon" title="Order"></i>
                    </span>
                    <span class="title sidebar-title">Order</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Item-Review-Rating"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-edit sidebar-icon" title="Review and Rating"></i>
                    </span>
                    <span class="title sidebar-title">Review and Rating</span>
                </a>
            </li>
<!--            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="<?php echo base_url("Restaurant-Reports"); ?>">
                    <span class="icon-holder">
                        <i class="anticon anticon-file sidebar-icon" title="Reports"></i>
                    </span>
                    <span class="title sidebar-title">Reports</span>
                </a>
            </li>-->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                        <i class="fas fa-cog sidebar-icon" title="Setting"></i>
                    </span>
                    <span class="title sidebar-title">Setting</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url("Restaurant-Edit-Profile") ?>" class="sidebar-title">Edit Profile</a>
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
