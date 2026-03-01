<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <head>
        <title>User-Shipment | Munchbox-Foodies food</title>
        <?php
        $this->load->view("CSS");
        ?>
    </head>
    <body style="background: #F3F3F3;">
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>
        <div class="main-sec" style="height: 70px;"></div>
        <?php
        $this->load->view("user_profile_top");
        ?>  

        <div class="container" style="margin-bottom: 20px;">
            <div class="row">
                <?php
                $this->load->view("user_profile_sidebar");
                ?>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="user-menu-display">
                        <h2>Shipment</h2>
                        <h5>
                            Add Shipment Address
                        </h5>
                        <div class="user-line">
                        </div>
                        <div class="user-ship-form">
                            <form method="post" action="" name="shipment">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="form-control <?php 
                                            if(form_error("state"))
                                            {
                                                echo "form_vis_error";
                                            }
                                        ?>" name="state" id="state" onchange="set_combo('city', this.value);">
                                            <option value="">Select State</option>
                                            <?php 
                                                foreach($state_detail as $single)
                                                {
                                             ?>
                                            <option value="<?php echo $single->location_id;?>"<?php
                                                   if(!isset($success) && set_select("state",$single->location_id))
                                                   {
                                                       echo "selected";
                                                   }
         
                                                ?>><?php echo $single->name; ?></option>
                                             <?php       
                                                }
                                            ?>
                                            
                                        </select>
                                        <p class="form_vis_error_text">
                                            <?php 
                                            if(form_error("state"))
                                            {
                                                echo form_error("state");
                                            }
                                            ?>
                                        </p>
                                        
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12"  name="city">
                                        <select class="form-control <?php 
                                            if(form_error("city"))
                                            {
                                                echo "form_vis_error";
                                            }
                                        ?>" id="city" name="city" onchange="set_combo('area', this.value);">
                                            <option value="">Select City</option>
                                            <?php 
                                                if($this->input->post(state) && !isset($success))
                                                {
                                                    $detail = $this->md->my_select("tbl_location","*",array("parent_id"=>$this->input->post("state"),"label"=>"city"));
                                                    foreach($detail as $single)
                                                    {
                                            ?>
                                                <option value="<?php echo $single->location_id;?>"<?php
                                                   if(!isset($success) && set_select("city",$single->location_id))
                                                   {
                                                       echo "selected";
                                                   }
         
                                                ?>><?php echo $single->name; ?></option>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                            <option value="">Select City</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <p class="form_vis_error_text">
                                            <?php 
                                            if(form_error("city"))
                                            {
                                                echo form_error("city");
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" name="area">
                                        <select class="form-control" name="area" <?php 
                                            if(form_error("area"))
                                            {
                                                echo "form_vis_error";
                                            }
                                        ?>" id="area">
                                            <option value="">Select Area</option>
                                            <?php 
                                                if($this->input->post("city") && !isset($success))
                                                {        
                                                    $details = $this->md->my_select("tbl_location","*",array("parent_id"=>$this->input->post("city"),"label"=>"area"));
                                                    foreach($details as $single)
                                                    {
                                            ?>
                                                <option value="<?php echo $single->location_id;?>"<?php
                                                   if(!isset($success) && $this->input->post('area') )
                                                   {
                                                       echo set_select("area",$single->location_id);
                                                   }
                                                ?>><?php echo $single->name; ?></option>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                            <option value="">Select Area</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <p class="form_vis_error_text">
                                            <?php 
                                            if(form_error("area"))
                                            {
                                                echo form_error("area");
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" check_control="number" class="form-control <?php 
                                            if(form_error("pincode"))
                                            {
                                                echo "form_vis_error";
                                            }
                                            ?>" name="pincode" placeholder="Enter Pincode" value="<?php 
                                                if(!isset($success) && set_value("pincode"))
                                                {
                                                    echo set_value("pincode");
                                                }
                                            ?>">
                                        <p class="form_vis_error_text">
                                            <?php 
                                            if(form_error("pincode"))
                                            {
                                                echo form_error("pincode");
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea class="form-control <?php 
                                            if(form_error("address"))
                                            {
                                                echo "form_vis_error";
                                            }
                                        ?>" check_control="" name="address" placeholder="Enter Full Address"><?php 
                                            if(!isset($success) && set_value("address"))
                                            {
                                                echo set_value("address");
                                            }
                                        ?></textarea>
                                        <p class="form_vis_error_text">
                                            <?php 
                                            if(form_error("address"))
                                            {
                                                echo form_error("address");
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label>
                                            <input type="radio" name="add_type" value="Office" <?php
                                                if(!isset($success) && set_radio("add_type","Office"))
                                                {
                                                    echo "checked";
                                                }
                                            ?>>&nbsp;Office
                                        </label>
                                        <label>
                                            <input type="radio" name="add_type" value="Home" <?php
                                                if(!isset($success) && set_radio("add_type","Office"))
                                                {
                                                    echo set_radio("add_type","Home");
                                                }
                                            ?>>&nbsp;Home
                                        </label>
                                        <p class="form_vis_error_text">
                                            <?php 
                                            if(form_error("add_type"))
                                            {
                                                echo form_error("add_type");
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="submit"  value="Submit" name="add" class="btn" style="background:#ff0018;color: #fff;">
                                        <input type="reset" class="btn btn-default" style="background: #F3F3F3;color: #000;">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <h5>
                            Manage Address
                        </h5>
                        <div class="user-line">
                        </div>
                        <section class="featured-partners" style="margin-top: 15px;">
                            <div class="container">
                                <div class="row section-padding-bottom u-line">
                                    <?php 
                                        if(count($address_detail) == 0)
                                        {
                                    ?>
                                    <div class="wishlist-empty">
                                <center>
                                    <img src="<?php echo base_url(); ?>assets/img/addressnofound.png">
                                    <h3>Where is the Address?</h3>
                                    <h6>Once you add Delivery Address, it will appear here.</h6>
                                </center>
                            </div>
                                    <?php
                                        }
                                        else
                                        {
                                            foreach($address_detail as $single)
                                            {
                                    ?>
                                        <div class="col-lg-6 col-md-6">
                                        <div class="product-box mb-xl-20">
                                            <div class="product-box-2">
                                                <div class="product-img">
                                                    <a href="restaurant.html">
                                                        <?php
                                                            if($single->address_type == "Home")
                                                            {
                                                         ?>
                                                        <i class="fa fa-home"></i>
                                                        <?php
                                                            }
                                                            else
                                                            {
                                                        ?>
                                                        <i class="fas fa-building"></i>
                                                        <?php
                                                            }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="product-caption" style="width:100%;white-space: normal;">
                                                    <p class="text-light-white fs-15 shipment-address-text-box"><?php echo $single->address ?></p>
                                                    <?php 
                                                        
                                                    ?>
                                                    <p class="text-dark shipment-address-state-detail" style="font-size: 15px;"><?php echo $single->state;?> &Longrightarrow; <?php echo $single->city;?> &Longrightarrow; <?php echo $single->area;?></p>
                                                </div>
                                            </div>
                                            <div class="product-footer-2">  
                                                <div class="discount-coupon"> 
                                                    <a onclick="$('#remove_address').attr('href','Remove-Visitor/shipment/<?php echo $single->shipment_id; ?>')" data-toggle="modal" data-target=".bs-example-modal-md"><span class="text-light-white fs-14">Remove Address</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                                    
                                    
                                </div>
                            </div>
                    </div>
                    </section>

                </div>
            </div>
        </div>
        <?php
        $this->load->view("footer");
        ?>
        <!-- footer -->
        <!-- modal-boxes -->
        <?php
            if(isset($success))
            {
        ?>
        <div class="add-success-message animated bounceInDown ">
            <img src="<?php echo base_url(); ?>assets/img/animated-gif/782-check-mark-success.gif">
            <p><?php echo $success; ?></p>
        </div>
        <?php
            }
        ?>
        <?php
            if(isset($error))
            {
        ?>
        <div class="add-alert-message animated bounceInDown ">
            <img src="<?php echo base_url(); ?>assets/img/animated-gif/4970-unapproved-cross.gif">
            <p><?php echo $error; ?></p>
        </div>
        <?php
            }
        ?> 
        <div id="remove-address" class="modal fade" role="dialog">
            <div class="modal-dialog">

                
                
            </div>
        </div>

        <div class="modal fade" id="address-box">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title fw-700">Change Address</h4>
                    </div>
                    <div class="modal-body">
                        <div class="location-picker">
                            <input type="text" class="form-control" placeholder="Enter a new address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="search-box">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="search-box p-relative full-width">
                            <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                        </div>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="model-remove">
                        <center>
                            <i class="fas fa-exclamation-triangle"></i>
                            <p> Are you sure want to remove address ? </p>
                            <div class="order-btn-reorder">
                                <a id="remove_address" class="btn btn-reorder">Remove</a>
                                <a href="" class="btn btn-cancel">Cancel</a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $this->load->view("footerscript");
        ?>
        <script>
            window.onbeforeunload = function(){
  $data={address_value : "no"};
    $path = "http://localhost/MUNCHBOX/Backend/upadateaddresssession";
    $.post($path,$data,function(data){
    });
};
            </script>
    </body>



</html>

