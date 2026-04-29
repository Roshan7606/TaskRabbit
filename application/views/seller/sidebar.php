<style>
    .side-nav {
        background: #111827 !important;
        border-right: 1px solid rgba(255, 255, 255, 0.06);
        box-shadow: 16px 0 36px rgba(15, 23, 42, 0.16);
        overflow: visible;
    }

    .side-nav::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.04), transparent 18%);
    }

    .side-nav-inner {
        position: relative;
        z-index: 1;
        padding: 18px 12px 20px;
    }

    .side-nav-menu {
        padding: 10px 8px 16px;
    }

    .side-nav-menu > .nav-item {
        margin-bottom: 8px;
    }

    .side-nav-menu > .nav-item > a {
        position: relative;
        display: flex;
        align-items: center;
        gap: 14px;
        min-height: 54px;
        padding: 12px 16px;
        border-radius: 16px;
        color: #e5e7eb !important;
        background: transparent;
        border: 1px solid transparent;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .side-nav-menu > .nav-item > a:hover {
        color: #ffffff !important;
        background: rgba(255,255,255,0.08);
        border-color: transparent;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }

    .side-nav-menu > .nav-item > a.sidebar-border {
        background: #ff4d4d;
        color: #fff !important;
        box-shadow: 0 10px 25px rgba(255, 77, 77, 0.22);
    }

    .side-nav-menu > .nav-item > a.sidebar-border:hover {
        background: #ff4d4d;
        color: #fff !important;
        transform: none;
        box-shadow: 0 10px 25px rgba(255, 77, 77, 0.22);
    }

    .side-nav .icon-holder {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 12px;
        background: rgba(255,255,255,0.08);
        transition: all 0.3s ease;
    }

    .side-nav-menu > .nav-item > a.sidebar-border .icon-holder {
        background: rgba(255,255,255,0.18);
    }

    .side-nav-menu > .nav-item > a:hover .icon-holder {
        background: rgba(255,255,255,0.14);
        transform: translateY(-1px);
    }

    .sidebar-icon {
        color: #f9fafb !important;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .sidebar-title,
    .side-nav .title {
        color: inherit !important;
        font-weight: 600;
        letter-spacing: 0.01em;
    }

    .side-nav .arrow {
        margin-left: auto;
        color: rgba(255, 255, 255, 0.7);
        transition: all 0.3s ease;
    }

    .side-nav-menu > .nav-item > a:hover .arrow {
        color: #fff;
        transform: translateX(2px);
    }

    .side-nav .dropdown-menu {
        margin-top: 8px;
        padding: 8px 0 4px 54px;
        background: transparent;
        border: 0;
        box-shadow: none;
        display: none;
        transition: all 0.3s ease;
        position: relative;
        z-index: 10;
    }

    .side-nav .nav-item.open .dropdown-menu {
        display: block;
    }

    .side-nav .dropdown-menu li {
        margin-bottom: 6px;
    }

    .side-nav .dropdown-menu li a {
        display: block;
        padding: 10px 14px;
        border-radius: 12px;
        color: #d1d5db !important;
        background: rgba(255,255,255,0.04);
        border: 1px solid transparent;
        transition: all 0.3s ease;
    }

    .side-nav .dropdown-menu li a:hover {
        color: #fff !important;
        background: rgba(255,255,255,0.08);
        transform: translateX(4px);
    }

    .side-nav-folded .side-nav-inner {
        padding: 10px 0 !important;
    }

    .side-nav-folded .side-nav {
        width: 72px !important;
        min-width: 72px !important;
        max-width: 72px !important;
        overflow: hidden;
    }

    .side-nav-folded .side-nav-menu {
        padding: 0 !important;
    }

    .side-nav-folded .nav-item {
        display: flex;
        justify-content: center;
    }

    .side-nav-folded .side-nav-menu > .nav-item {
        margin-bottom: 12px;
    }

    .side-nav-folded .side-nav-menu > .nav-item > a,
    .side-nav-folded .side-nav-menu > .nav-item > a.sidebar-border {
        width: 48px !important;
        height: 48px !important;
        margin: 0 auto !important;
        padding: 0 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        overflow: hidden;
    }

    .side-nav-folded .title,
    .side-nav-folded .sidebar-title {
        display: none !important;
    }

    .side-nav-folded .icon-holder {
        width: 32px;
        height: 32px;
        margin: 0 auto;
    }

    .side-nav-folded .arrow {
        display: none;
    }

    .side-nav-folded .side-nav .dropdown-menu {
        padding-left: 12px;
    }

    @media (max-width: 991.98px) {
        .side-nav-inner {
            padding: 16px 10px 20px;
        }

        .side-nav-menu {
            padding: 8px 6px 16px;
        }
    }
</style>
<?php
    $current = $this->uri->segment(1);
?>
<!-- Side Nav START -->
<div class="side-nav" style="background: ">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
           
            <li class="nav-item dropdown">
                <a class="dropdown-toggle <?php echo ($current == 'Restaurant-Home') ? 'sidebar-border' : ''; ?>" href="<?php echo base_url("Restaurant-Home"); ?>">
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
                <a class="dropdown-toggle <?php echo ($current == 'Restaurant-My-Services') ? 'sidebar-border' : ''; ?>" href="<?php echo base_url('Restaurant-My-Services'); ?>">
                    <span class="icon-holder">
                        <i class="fa fa-briefcase sidebar-icon" title="My Services"></i>
                    </span>
                    <span class="title sidebar-title">My Services</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle <?php echo ($current == 'Restaurant-Manage-Schedule') ? 'sidebar-border' : ''; ?>" href="<?php echo base_url("Restaurant-Manage-Schedule"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-calendar-check sidebar-icon" title="Availability"></i>
                    </span>
                    <span class="title sidebar-title">Availability</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle <?php echo ($current == 'Restaurant-Manage-Bill-Payment') ? 'sidebar-border' : ''; ?>" href="<?php echo base_url("Restaurant-Manage-Bill-Payment"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-wallet sidebar-icon" title="Wallet/Earnings"></i>
                    </span>
                    <span class="title sidebar-title">Wallet/Earnings</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle <?php echo ($current == 'Restaurant-Booking-Requests') ? 'sidebar-border' : ''; ?>" href="<?php echo base_url("Restaurant-Booking-Requests"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-calendar-plus sidebar-icon" title="Booking Requests"></i>
                    </span>
                    <span class="title sidebar-title">Booking Requests</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle <?php echo ($current == 'Restaurant-Item-Review-Rating') ? 'sidebar-border' : ''; ?>" href="<?php echo base_url("Restaurant-Item-Review-Rating"); ?>">
                    <span class="icon-holder">
                        <i class="fas fa-star sidebar-icon" title="Reviews & Ratings"></i>
                    </span>
                    <span class="title sidebar-title">Reviews & Ratings</span>
                </a>
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
