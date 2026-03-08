<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard || MUNCHBOX - The Foodies Food</title>
        <?php
        $this->load->view("admin/headscript");
        ?>
    </head>
    <body>
        <?php
        $this->load->view("admin/head");
        ?>
        <section class="page">
            <?php
            $this->load->view("admin/sidebar");
            ?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>Dashboard <small></small></h1>
                                <ol class="breadcrumb">
                                    <li class="home-fa-fa"><a href="<?php echo base_url('Admin-Home'); ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <div class="widget-box clearfix dash-hover">
                                <!-- <a href="<?php echo base_url('Admin-Manage-Contact'); ?>">
                                     <div>
                                        <h4>Contact</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_contactus", "*"));
                                            ?>
                                            <i class="fa fa-id-card pull-right"></i></h2>
                                    </div> -->
                                </a> 
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-Feedback'); ?>">
                                    <div>
                                        <h4>Feedback</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_feedback", "*"));
                                            ?>    
                                            <i class="fa fa-user-edit pull-right"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-Active-Users'); ?>">
                                    <div>
                                        <h4>Active Users</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_user", "*", array("status" => 1)));
                                            ?>
                                            <i class="fa fa-users pull-right" style="color: green"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-Deactive-Users'); ?>">
                                    <div>
                                        <h4>Deactive Users</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_user", "*", array("status" => 0)));
                                            ?>
                                            <i class="fa fa-users pull-right" style="color: orangered"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-Email'); ?>">
                                    <div>
                                        <h4>Email</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_email_subscriber", "*"));
                                            ?>    
                                            <i class="fa fa-envelope pull-right"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-Banner'); ?>">
                                    <div>
                                        <h4>Banner</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_banner", "*"));
                                            ?>
                                            <i class="fa fa-image pull-right"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-Active-Stores'); ?>">
                                    <div>
                                        <h4>Active Stores</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_restaurant", "*", array("status" => 1)));
                                            ?> 
                                            <i class="fa fa-store-alt pull-right" style="color: green"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-Deactive-Stores'); ?>">
                                    <div>
                                        <h4>Deactive Stores</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_restaurant", "*", array("status" => 0)));
                                            ?>
                                            <i class="fa fa-store-alt pull-right " style="color: orangered"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-State'); ?>">
                                    <div>
                                        <h4>State</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_location", "*", array("label" => "state")));
                                            ?>
                                            <i class="fa fa-map-marked-alt pull-right"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="widget-box clearfix dash-hover">
                                <a href="<?php echo base_url('Admin-Manage-City'); ?>">
                                    <div>
                                        <h4>City</h4>
                                        <h2>
                                            <?php
                                            echo count($this->md->my_select("tbl_location", "*", array("label" => "city")));
                                            ?>
                                            <i class="fa fa-street-view pull-right"></i></h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
        </section>
        <?php
        $this->load->view('admin/footscript');
        ?>
        <script>
            var base_url = "http://localhost/MUNCHBOX/";
//function readURL(input) {
//  if (input.files && input.files[0]) {
//    var reader = new FileReader(); 
//    reader.onload = function(e) {
//      $('#preview_user').attr('src',e.target.result);
//    }
//    reader.readAsDataURL(input.files[0]);    
//  }
//}
function upload_admin_profile(imgurl)
{
    alert(imgurl);
    $data = {imgurl : imgurl};
      $path = $base_url+"Backend/uploadadminprofile";
      $.post($path,$data,function(data){
        alert(data);
      });
}
</script>
    </body>
</html>
