
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Item Detail</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>

    </head>

    <body>
        <div class="app">
            <div class="layout">
                <?php
                $this->load->view("seller/head");
                $this->load->view("seller/sidebar");
                ?>
                <div class="page-container">


                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <div class="page-header no-gutters has-tab">
                            <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                        <img src="<?php echo base_url() . $item_detail[0]->image ?>" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <h4 class="m-b-0"><?php echo $item_detail[0]->item_name; ?></h4>
                                    </div>
                                </div>
                                <div class="m-b-15">
                                    <a href="<?php echo base_url(); ?>Restaurant-Item-Edit/<?php echo $item_detail[0]->item_id; ?>" class="btn btn-primary">
                                        <i class="anticon anticon-edit"></i>
                                        <span>Edit</span>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="container-fluid">
                            <div class="tab-content m-t-15">
                                <div class="tab-pane fade show active" id="product-overview" >
<!--                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="media align-items-center">
                                                        <i class="font-size-40 text-success anticon anticon-smile"></i>
                                                        <div class="m-l-15">
                                                            <p class="m-b-0 text-muted">10 ratings</p>
                                                            <div class="star-rating m-t-5">
                                                                <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled/><label for="star3-5" title="5 star"></label>
                                                                <input type="radio" id="star3-4" name="rating-3" value="4" disabled/><label for="star3-4" title="4 star"></label>
                                                                <input type="radio" id="star3-3" name="rating-3" value="3" disabled/><label for="star3-3" title="3 star"></label>
                                                                <input type="radio" id="star3-2" name="rating-3" value="2" disabled/><label for="star3-2" title="2 star"></label>
                                                                <input type="radio" id="star3-1" name="rating-3" value="1" disabled/><label for="star3-1" title="1 star"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="media align-items-center">
                                                        <i class="font-size-40 text-primary anticon anticon-shopping-cart"></i>
                                                        <div class="m-l-15">
                                                            <p class="m-b-0 text-muted">Sales</p>
                                                            <h3 class="m-b-0 ls-1">1,521</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="media align-items-center">
                                                        <i class="font-size-40 text-primary anticon anticon-message"></i>
                                                        <div class="m-l-15">
                                                            <p class="m-b-0 text-muted">Reviews</p>
                                                            <h3 class="m-b-0 ls-1">27</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="media align-items-center">
                                                        <i class="font-size-40 text-primary anticon anticon-stock"></i>
                                                        <div class="m-l-15">
                                                            <p class="m-b-0 text-muted">Available Stock</p>
                                                            <h3 class="m-b-0 ls-1">152</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Basic Info</h4>
                                            <div class="table-responsive">
                                                <table class="product-info-table m-t-20">
                                                    <tbody>
                                                        <tr>
                                                            <td>Price:</td>
                                                            <td class="text-dark font-weight-semibold">&#8377; <?php echo $item_detail[0]->price; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Main Category:</td>
                                                            <td>	<?php echo $item_detail[0]->main_cat; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub Category:</td>
                                                            <td>	<?php echo $item_detail[0]->sub_cat; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status:</td>
                                                            <td>
                                                                <span class="badge badge-pill badge-cyan"><?php
                                                                    if ($item_detail[0]->status == 0) {
                                                                        echo "Deactive";
                                                                    } else {
                                                                        echo "active";
                                                                    }
                                                                    ?></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Other Info</h4>
                                            <div class="table-responsive">
                                                <table class="product-info-table m-t-20">
                                                    <tbody>
                                                        <tr>
                                                            <td>Measurement:</td>
                                                            <td>
<?php
if ($item_detail[0]->measurement != "") {
    echo $item_detail[0]->measurement;
} else {
    echo "Measurement Not Available";
}
?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tags:</td>
                                                            <td><?php echo $item_detail[0]->tags; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Dish Description</h4>
                                        </div>
                                        <div class="card-body">
<?php echo $item_detail[0]->description; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Content Wrapper END -->

<?php
$this->load->view("seller/footer");
?>                
                    <!-- Footer END -->

                </div>

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
                    <p style="margin-top: 5%;font-size: 20px;">Are you sure want to Remove Dish ?</p>
                    <a id="del_item" href="#"   class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                    <a href="#" class="btn btncancel" data-dismiss="modal" style="padding:10px 40px;" >NO</a>
                </center>
            </div>
        </div>
    </div>


<?php
$this->load->view("seller/footerscript");
?>
</body>
</html>


