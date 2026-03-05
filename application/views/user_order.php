<!DOCTYPE html>

<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Order | TaskRabbit</title>
        <?php
        $this->load->view("CSS");
        ?>
    </head>

    <body style="background: #F3F3F3;">
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>

        <div class="main-sec" style="height: 70px;">

        </div>
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
                        <h2>Booking</h2>
                        <div class="wishlist-nav">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs " role="tablist">
                                <li role="presentation" class="wishlist-li active" id="wishlist-item">
                                    <a href="#fooditem" aria-controls="fooditem" role="tab" data-toggle="tab">Active booking</a>
                                </li>
                                <li role="presentation" class="" id="wishlist-res">
                                    <a href="#restaurant" aria-controls="restaurant" role="tab" data-toggle="tab">Past booking</a>
                                </li>
                                <li role="presentation" class="" id="wishlist-cancel">
                                    <a href="#cancelorder" aria-controls="cancelorder" role="tab" data-toggle="tab">Canceled booking</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="fooditem">
                                    <div class="row wishlist-item restaurant-wishlist" id="user_wishlist_item">
                                        <?php
                                            if(count($res_ord_detail_active) == 0)
                                            {
                                         ?>
                                            <div class="wishlist-empty">
                                                <center>
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/no-order-vis.png"> -->
                                                    <h3>Where is the Booking?</h3>
                                                    <h6>Once you place a Booking, it will display here.</h6>
                                                </center>
                                            </div>
                                        <?php
                                            }
                                            else
                                            {
                                        foreach ($res_ord_detail_active as $single) {
                                            ?>
                                            <div class="past-order">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="order_img col-md-3">
                                                            <img src="<?php echo base_url() . $single->coverpic; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="<?php echo base_url("Restaurant-Details") . "/" . $single->restaurant_id; ?>" class="order-text-main"><b><?php echo ucwords($single->restaurant_name); ?></b></a>
                                                            <br/>
                                                            <a href="<?php echo base_url("City") ?>" class="order-text-sub"><?php echo ucwords($single->area) . "," . ucwords($single->city) . "," . ucwords($single->state) ?></a>
                                                            <label style="font-size: 12px;" class="order-text-sub">ORDER  #<?php echo $single->bill_number; ?> | <?php echo date('d-m-y', strtotime($single->bill_date)); ?></label><br/>
                                                            <a href="<?php echo base_url("Order-Detail")."/".$single->bill_id; ?>"  class="btn-munchbox-text"><b>VIEW DETAILS</b></a>
                                                        </div>
                                                        <div class="col-md-5 order_time text-right">
                                                            <b class="font-weight-500 font-size-16"> Order Status:</b> <b class="font-weight-500 text-danger"><?php
                                                                if($single->status == "pending,")
                                                                {
                                                                    echo "Pending";
                                                                }
                                                                elseif($single->status == "pending,prepared,")
                                                                {
                                                                    echo "Prepared";
                                                                }
                                                                else
                                                                {
                                                                    echo "Delivery On way";
                                                                }
                                                            ?></b>

                                                        </div>

                                                    </div>
                                                    <div class="border-userprofile"></div>
                                                </div>
                                                <div class="container-fluid order-name-price">
                                                    <div class="row">

                                                        <div class="col-md-9 order-btn-reorder">
                                                            <a onclick="$('#modal-cancel-bill-id').val('<?php echo $single->bill_id; ?>')" data-target="#cancelmodal" data-toggle="modal"  class="btn btn-checkout-modal">Cancel Order</a>


                                                        </div>
                                                        <div class="col-md-3">

                                                            <label style="font-size: 14px;" >Total Paid: &#8377;<?php echo $single->amount; ?></label>
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
                                <div role="tabpanel" class="tab-pane" id="restaurant">
                                    <div class="row wishlist-item restaurant-wishlist" id="user_wishlist_restaurant">
                                        <?php
                                            if(count($res_ord_detail_past) == 0)
                                            {
                                         ?>
                                            <div class="wishlist-empty">
                                                <center>
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/no-order-vis.png"> -->
                                                    <h3>Where is your Booking?</h3>
                                                    <h6>Once your Book is Delivered,It will display here.</h6>
                                                </center>
                                            </div>
                                        <?php
                                            }
                                            else
                                            {
                                        foreach ($res_ord_detail_past as $single) {
                                            ?>
                                            <div class="past-order">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="order_img col-md-3">
                                                            <img src="<?php echo base_url() . $single->coverpic; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="<?php echo base_url("Restaurant-Details") . "/" . $single->restaurant_id; ?>" class="order-text-main"><b><?php echo ucwords($single->restaurant_name); ?></b></a>
                                                            <br/>
                                                            <a href="<?php echo base_url("City") ?>" class="order-text-sub"><?php echo ucwords($single->area) . "," . ucwords($single->city) . "," . ucwords($single->state) ?></a>
                                                            <label style="font-size: 12px;" class="order-text-sub">ORDER  #<?php echo $single->bill_number; ?> | <?php echo date('d-m-y', strtotime($single->bill_date)); ?></label><br/>
                                                            <a href="<?php echo base_url("Order-Detail")."/".$single->bill_id; ?>"  class="btn-munchbox-text"><b>VIEW DETAILS</b></a>
                                                        </div>
                                                        <div class="col-md-5 order_time text-right">
                                                            <b class="font-weight-500 font-size-16"> Order Status:</b> <b class="font-weight-500 text-success">Delivered</b>

                                                        </div>

                                                    </div>
                                                    <div class="border-userprofile"></div>
                                                </div>
                                                <div class="container-fluid order-name-price">
                                                    <div class="row">

                                                        <div class="col-md-9 order-btn-reorder">
                                                            <a onclick="$('#modal-reorder-bill-id').val('<?php echo $single->bill_id; ?>')" class="btn btn-checkout-modal" data-target="#reordermodal" data-toggle="modal">Reorder</a>


                                                        </div>
                                                        <div class="col-md-3">

                                                            <label style="font-size: 14px;" >Total Paid: &#8377;<?php echo $single->amount; ?></label>
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
                                <div role="tabpanel" class="tab-pane" id="cancelorder">
                                    <div class="row wishlist-item restaurant-wishlist" id="user_wishlist_cancel">
                                        <?php
                                            if(count($res_ord_detail_cancel) == 0)
                                            {
                                         ?>
                                            <div class="wishlist-empty">
                                                <center>
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/no-order-vis.png"> -->
                                                    <h3>Where is your Booking?</h3>
                                                    <h6>Once you Canceled Booking,It will display here.</h6>
                                                </center>
                                            </div>
                                        <?php
                                            }
                                            else
                                            {
                                        foreach ($res_ord_detail_cancel as $single) {
                                            ?>
                                            <div class="past-order">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="order_img col-md-3">
                                                            <img src="<?php echo base_url() . $single->coverpic; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="<?php echo base_url("Restaurant-Details") . "/" . $single->restaurant_id; ?>" class="order-text-main"><b><?php echo ucwords($single->restaurant_name); ?></b></a>
                                                            <br/>
                                                            <a href="<?php echo base_url("City") ?>" class="order-text-sub"><?php echo ucwords($single->area) . "," . ucwords($single->city) . "," . ucwords($single->state) ?></a>
                                                            <label style="font-size: 12px;" class="order-text-sub">ORDER  #<?php echo $single->bill_number; ?> | <?php echo date('d-m-y', strtotime($single->bill_date)); ?></label><br/>
                                                            <a href="<?php echo base_url("Order-Detail")."/".$single->bill_id; ?>"  class="btn-munchbox-text"><b>VIEW DETAILS</b></a>
                                                        </div>
                                                        <div class="col-md-5 order_time text-right">
                                                            <b class="font-weight-500 font-size-16"> Order Status:</b> <b class="font-weight-500 text-danger">Canceled</b>

                                                        </div>

                                                    </div>
                                                    <div class="border-userprofile"></div>
                                                </div>
                                                <div class="container-fluid order-name-price">
                                                    <div class="row">

                                                        <div class="col-md-9 order-btn-reorder">
                                                            <a onclick="$('#modal-reorder-bill-id').val('<?php echo $single->bill_id; ?>')" class="btn btn-checkout-modal" data-target="#reordermodal" data-toggle="modal">Reorder</a>


                                                        </div>
                                                        <div class="col-md-3">

                                                            <label style="font-size: 14px;" >Total Paid: &#8377;<?php echo $single->amount; ?></label>
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $this->load->view("footer");
        ?>
        <!-- footer -->
        <!-- modal-boxes -->

        <div class="modal fade bs-example-modal-md-checkout" id="cancelmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="model-remove">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/cancel-order.png" style="height: 100px;width:100px;">
                        <h5 class="margin-bottom-5"> Are you sure want to Cancel Order ? </h5>
                        <p>If your order is prepared and on the way to deliver then you will pay cancellation charges which is add on your next order.</p>
                        <input type="hidden" id="modal-cancel-bill-id">
                        <div class="order-btn-reorder">
                            <a  class="btn btn-checkout-modal" onclick="cancelorder($('#modal-cancel-bill-id').val())">Yes</a>
                            <a class="btn btn-cancel" data-dismiss="modal">No</a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade bs-example-modal-md-checkout" id="reordermodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="model-remove">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/cancel-order.png" style="height: 100px;width:100px;">
                        <h5 class="margin-bottom-10 margin-top-15"> Are you sure want to Reorder ? </h5>
                        <p>If the items you ordered earlier may not be available when you reorder, please check the item in the cart when ordering.</p>
                        <input type="hidden" id="modal-reorder-bill-id">
                        <div class="order-btn-reorder">
                            <a  class="btn btn-checkout-modal" onclick="reorder($('#modal-reorder-bill-id').val())">Yes</a>
                            <a class="btn btn-cancel" data-dismiss="modal">No</a>
                        </div>
                    </center>
                </div>
            </div>
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

        
    </div>



    <?php
    $this->load->view("footerscript");
    ?>
</body>



</html>




