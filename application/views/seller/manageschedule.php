<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Manage Shedule</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <style>
            
            </style>
    </head>

    <body>
        <div class="app">
            <div class="layout">
                <?php
                $this->load->view("seller/head");
                $this->load->view("seller/sidebar");
                ?>
                <!-- Page Container START -->
                <div class="page-container">


                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <div class="page-header">
                            <h2 class="header-title"></h2>
                            <div class="header-sub-title">
                                <nav class="breadcrumb breadcrumb-dash">
                                    <a href="<?php echo base_url("Restaurant-Home"); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                    <a class="breadcrumb-item" href="#">Manage Schedule</a>
                                    
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Service Shedule:</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="schedule-details">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Date</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>Day Name</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>Open Time</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>Close Time</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>Action</p>
                                                </div>
                                                <div class="col-md-12 schedule-border-line m-b-10">
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <!--<form name="sceduleform" method="post" action="">-->
                                        <div class="row schedule-details-subcard">
                                           
                                            <?php
                                         
                                            for($i=0;$i<7;$i++)
                                            {
                                                $day_name = date("l",strtotime("+".$i." day"));
                                                $schedule_detail = $this->md->my_select("tbl_schedule","*",array("day_name"=>$day_name,"restaurant_id"=>$this->session->userdata("seller_email")));
                                                foreach($schedule_detail as $single)
                                                {
                                            
                       
                                         ?>
                                            <div class="col-md-3 m-b-10">
                                                    <p><?php
                                                        
                                                        echo date("d-m-y",strtotime("+".$i." day")); 
                                                    ?></p>
                                                </div>
                                             <div class="col-md-3 m-b-10">
                                                    <p><?php echo $single->day_name; ?></p>
                                                </div>
                                                <div class="col-md-2 m-b-10">
                                                    <p class="schedule_p_<?php echo $single->schedule_id; ?>"> <?php echo date("h:i:s A", strtotime($single->open_time)); ?></p>
                                                    <input  class="schedule_input_<?php echo $single->schedule_id; ?> display-none form-control" type="time" id="schedule_opentime_<?php echo $single->schedule_id; ?>" value="<?php echo $single->open_time; ?>">
                                                </div>
                                                <div class="col-md-2 m-b-10">
                                                    <p class="schedule_p_<?php echo $single->schedule_id; ?>"> <?php echo date("h:i:s A", strtotime($single->close_time)); ?></p>
                                                    <input class=" schedule_input_<?php echo $single->schedule_id; ?> form-control display-none" type="time" id="schedule_closetime_<?php echo $single->schedule_id; ?>" value="<?php echo $single->close_time; ?>">
                                                </div>
                                                <div class="col-md-2 m-b-10">
                                                    <button class="btn btn-primary update_btn_schedule_<?php echo $single->schedule_id; ?>" title="Click Here To Update Schedule Details" onclick="updateschedule('<?php echo $single->schedule_id; ?>','show')">Edit</button>
                                                    <button class="btn btn-primary update-btn-schedule display-none" type="submit" value="update">Update Schedule</button>
                                                    
                                                </div>
                                            
                                        <?php
                                                }
                                            }
                                        ?>
                                                
                                        </div>
                                        <!--</form>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Wrapper END -->
                    <?php
                    $this->load->view("seller/footer");
                    ?>
                </div>
                <!-- Page Container END -->

                <!-- Search Start-->
                <div class="modal modal-left fade search" id="search-drawer">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Search</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-search"></i>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Files</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-cyan avatar-icon">
                                            <i class="anticon anticon-file-excel"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                            <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-blue avatar-icon">
                                            <i class="anticon anticon-file-word"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                            <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-purple avatar-icon">
                                            <i class="anticon anticon-file-text"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                            <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-red avatar-icon">
                                            <i class="anticon anticon-file-pdf"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                            <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Members</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                            <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                        </div>
                                    </div>
                                </div>   
                                <div class="m-t-30">
                                    <h5 class="m-b-20">News</h5> 
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/others/img-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                            <p class="m-b-0 text-muted font-size-13">
                                                <i class="anticon anticon-clock-circle"></i>
                                                <span class="m-l-5">25 Nov 2018</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search End-->

                <!-- Quick View START -->
                <div class="modal modal-right fade quick-view" id="quick-view">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Theme Config</h5>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="m-b-30">
                                    <h5 class="m-b-0">Header Color</h5>
                                    <p>Config header background color</p>
                                    <div class="theme-configurator d-flex m-t-10">
                                        <div class="radio">
                                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                                            <label for="header-default"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                                            <label for="header-primary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-success" name="header-theme" type="radio" value="success">
                                            <label for="header-success"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                            <label for="header-secondary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                                            <label for="header-danger"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Side Nav Dark</h5>
                                    <p>Change Side Nav to dark</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                        <label for="side-nav-theme-toogle"></label>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Folded Menu</h5>
                                    <p>Toggle Folded Menu</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                        <label for="side-nav-fold-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <!-- Quick View END -->
            </div>
        </div>

        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <img src="<?php echo base_url(); ?>admin_assets/images/deactiveres.jpg" height="120" width="60" >
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to deactive ?</p>
                        <p style="margin-top: 1%;font-size: 14px;margin-bottom: 4%;padding: 0px 40px;">If you deactive restaurant than you can't able to upload images and other information of restaurant.</p>
                        <a id="activeproduct" href="#"   class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btncancel" data-dismiss="modal" style="padding:10px 40px;" >NO</a>
                    </center>
                </div>
            </div>
        </div>

        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js" type="text/javascript"></script>
    </body>
   
</html>