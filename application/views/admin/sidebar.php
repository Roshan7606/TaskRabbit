<nav class="navbar-aside navbar-static-side" style="z-index: 1" role="navigation">
    <div class="sidebar-collapse nano">
        <div class="nano-content">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown side-profile text-left"> 
                        <span>
                            <?php
                            $admin_detail = $this->md->my_select("tbl_admin", "*", array("admin_id" => $this->session->userdata("admin_username")));
                            if ($admin_detail[0]->profile == "") {
                                ?>
                                <img class="img-circle" src="<?php echo base_url(); ?>admin_assets/images/admin_profile/avtar_default.jpg"  alt="">
                                <?php
                            } else {
                                ?>
                                <img src="<?php echo base_url() . $admin_detail[0]->profile; ?>" class="img-circle" >
                                <?php
                            }
                            ?>
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear" style="display: block;"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold">Admin</strong>
                                </span>
                                <span class="block m-t-xs"> 
                                    <p class="fa fa-clock-o">  <?php
                                        $time = $this->md->my_select("tbl_admin", "*", array("admin_id" => $this->session->userdata("admin_username")))[0]->lastlogin;
                                        echo date("d-m-Y h:i:s a", strtotime($time));
                                        ?></p>
                                </span>
                            </span> 
                        </a>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url("Admin-Home") ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard </span></span></a>
                </li>
                <li>
                    <a href="mailbox.html"><i class="fas fa-street-view"></i> <span class="nav-label">Location</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url("Admin-Manage-State"); ?>">State</a></li>
                        <li><a href="<?php echo base_url("Admin-Manage-City"); ?>">City</a></li>
                        <li><a href="<?php echo base_url("Admin-Manage-Area"); ?>">Area</a></li>
                    </ul>
                </li>
            
                <li>
                    <a href="#"><i class="fas fa-tools"></i> <span class="nav-label">Service Provider</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url("Admin-Manage-Active-Stores"); ?>">Active Service Provider</a></li>
                        <li><a href="<?php echo base_url("Admin-Manage-Deactive-Stores"); ?>">Deactive Service Provider</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url("Admin-Manage-Active-Users"); ?>">Active Users</a></li>
                        <li><a href="<?php echo base_url("Admin-Manage-Deactive-Users"); ?>">Deactive Users</a></li>

                    </ul>
                </li>

                <!--li>
                    <a href="#"><i class="fas fa-utensils"></i> <span class="nav-label">Category</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<!--?php echo base_url("Admin-Manage-Main-Category"); ?>">Main Category</a></li>
                        <li><a href="<!?php echo base_url("Admin-Manage-Food-Category"); ?>">Food Category</a></li>
                        <li><a href="<!?php echo base_url("Admin-Manage-Dishes"); ?>">Dishes</a></li>
                    </ul>
                </li-->
                <li>
                    <a href="<?php echo base_url("Admin-Main-Category"); ?>"><i class="fas fa-utensils"></i><span class="nav-label">Main Category</span></span></a>
                </li>
<!--                <li>
                    <a href="<?php echo base_url("Admin-Manage-Promocode"); ?>"><i class="fas fa-money-check-alt"></i><span class="nav-label">Promocode</span></span></a>
                </li>-->
                <li>
                    <a href="<?php echo base_url("Admin-Manage-Packages"); ?>"><i class="fas fa-box-open"></i><span class="nav-label">Packages</span></span></a>
                </li>

                <li>
                    <a href="<?php echo base_url("Admin-Edit-Profile"); ?>"><i class="fas fa-cogs"></i><span class="nav-label">Settings</span></span></a>
                </li>
                <li>
                    <a href="<?php echo base_url("Admin-Logout"); ?>"><i class="fas fa-sign-out-alt"></i><span class="nav-label">Log Out</span></a>
                </li>                                   
            </ul>

        </div>
    </div>
</nav>
