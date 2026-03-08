<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MUNCHBOX - Restaurant Dashboard </title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <link href="<?php echo base_url(); ?>seller_assets/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    
    <link href="<?php echo base_url(); ?>seller_assets/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                <!-- Header START -->
                <?php
                $this->load->view("seller/head");
                ?>
                <!-- Header END -->

                <!-- Side Nav START -->
                <?php
                $this->load->view("seller/sidebar");
                ?>
                <!-- Side Nav END -->

                <!-- Page Container START -->
                <div class="page-container">


                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <?php
                            $res_detail = $this->md->my_select("tbl_restaurant","*",array("restaurant_id"=>$this->session->userdata("seller_email")));
                        ?>
                         <div class="page-header no-gutters">
                        <div class="d-md-flex align-items-md-center justify-content-between">
                            <div class="media m-v-10 align-items-center">
                                <div class="avatar avatar-image avatar-lg">
                                                        <?php
                            if($res_detail[0]->profile_pic == "")
                            {
                        ?>
                        <img class="round" height="30" width="40" avatar="<?php echo substr($res_detail[0]->restaurant_name, 0,1); ?>">
                        <?php 
                            }
                            else 
                            {
                        ?>
                        <img src="<?php echo base_url().$res_detail[0]->profile_pic; ?>"  alt="">
                        <?php
                            }
                        ?>
                                </div>
                                <div class="media-body m-l-15">
                                    <h4 class="m-b-0"><?php echo ucwords($res_detail[0]->restaurant_name); ?></h4>
                                    <span class="text-gray">Last Login: <?php  echo date("d-m-Y h:i:s a", strtotime($res_detail[0]->lastlogin)); ?></span>
                                </div>
                            </div>
                            <div class="d-md-flex align-items-center d-none">
                                <div class="media align-items-center m-v-5">
                                    <div class="font-size-27 dashboard-rating-star m-l-5">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="font-size-27 dashboard-rating-star m-l-5">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="font-size-27 dashboard-rating-star m-l-5">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="font-size-27 dashboard-rating-star m-l-5">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="font-size-27 dashboard-rating-star m-l-5">
                                        <i class="far fa-star"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <div class="row">
                            
                            <div class="col-md-6 col-lg-3">
                                <div class="card dash-box">
                                    <div class="card-body">
                                        <a href="<?php echo base_url("Restaurant-Sub-Category"); ?>">
                                            <div class="media align-products-center">
                                                <div class="avatar avatar-icon avatar-lg avatar-blue">
                                                    <i class="fas fa-briefcase"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <h2 class="m-b-0">
                                                        <?php echo $c = count($this->md->my_select("tbl_category","*"));?>
                                                    </h2>
                                                    <p class="m-b-0 text-muted">Total Services</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3 ">
                                <div class="card dash-box">
                                    <div class="card-body">
                                        <a href="<?php echo base_url("Restaurant-Item-Review-Rating"); ?>">
                                            <div class="media align-products-center">
                                                <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <h2 class="m-b-0">
                                                        <?php echo $c = count($this->md->my_select("tbl_review_rating", "*",array("restaurant_id"=>$this->session->userdata("seller_email"))));?>
                                                    </h2>
                                                    <p class="m-b-0 text-muted">Total Reviews</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card dash-box">
                                    <div class="card-body">
                                        <a href="<?php echo base_url("Restaurant-Manage-Items"); ?>">
                                            <div class="media align-products-center">
                                                <div class="avatar avatar-icon avatar-lg avatar-blue">
                                                    <i class="fab fa-product-hunt"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <h2 class="m-b-0">
                                                        <?php echo $c = count($this->md->my_select("tbl_item", "*",array("restaurant_id"=>$this->session->userdata("seller_email"))));?>
                                                    </h2>
                                                    <p class="m-b-0 text-muted">Total Services</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card dash-box">
                                    <div class="card-body">
                                        <a href="<?php echo base_url("Restaurant-Order"); ?>">
                                            <div class="media align-products-center">
                                                <div class="avatar avatar-icon avatar-lg avatar-blue">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <h2 class="m-b-0">
                                                        <?php echo $c = count($this->md->my_query("select * from tbl_bill where status IN ('pending,','pending,prepared,','pending,prepared,readydeliver,','pending,prepared,readydeliver,delivered') and restaurant_id = ".$this->session->userdata("seller_email")));?>
                                                    </h2>
                                                    <p class="m-b-0 text-muted">Total Bookings</p>
                                                </div>
                                            </div>
                                        </a>
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
                            <div class="modal-header justify-content-between align-products-center">
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
                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-3.jpg" alt="">
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
                                            <img src="assets/images/others/img-1.jpg" alt="">
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
                            <div class="modal-header justify-content-between align-products-center">
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
        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      
      loop:true,
    margin:10,
    nav:true,
    }
  });
});
        </script>
    </body>
</html>