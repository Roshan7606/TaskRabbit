<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>Order-Detail | Munchbox-Foodies food</title>
        <?php
        $this->load->view("CSS");
        ?>
        <style>

        </style>
    </head>

    <body>
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>

        <section class="checkout-page section-padding bg-light-theme">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- recipt -->
                        <div class="recipt-sec padding-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class=" pay_add">
                                                <i class="fas fa-utensils"></i> 
                                                <a>Order Details</a>
                                            </div>

                                            <div class="add_detail padding-top-10">
                                                

                                                <a class="text-dark"><p><b class="font-weight-500 text-dark">Order Id: </b>#<?php echo $bill_detail[0]->bill_number; ?></p></a>
                                                <a class="text-dark"><p><b class="font-weight-500 text-dark">Date : </b> <?php echo $bill_detail[0]->bill_date; ?></p></a>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="pay_summery">
                                        <i class="fa fa-check-square"></i> 
                                        <a>Expected Delivery Time</a>   
                                    </div>
                                    <div class="countdown-box margin-top-10 text-center">

                                        <div class="time-box"> <span id="mb-hours"></span>
                                        </div>
                                        <div class="time-box"> <span id="mb-minutes"></span>
                                        </div>
                                        <div class="time-box"> <span id="mb-seconds"></span>
                                        </div>

                                    </div>
                                </div>
                                <?php 
                                    if($bill_detail[0]->status != "canceled")
                                    {
                                ?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class=" pay_add">
                                                <i class="fas fa-tasks"></i>
                                                <a>Order Status</a>
                                            </div>
                                            <div class="container progressbar-order">
                                                <div class="row">
                                                    <div class="col-md-12 status-content">
                                                        <div class="row">
                                                            <div class="col-md-2 padding-right-none">
                                                                <div class="panding-1">
                                                                    <img src="<?php echo base_url(); ?>assets/img/pending-order.png">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 padding-left-none padding-right-none">

                                                            </div>
                                                            <div class="col-md-2 padding-left-none">
                                                                <div class="panding-2">
                                                                    <img src="<?php echo base_url(); ?>assets/img/prepared.png">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 padding-left-none padding-right-none">

                                                            </div>
                                                            <div class="col-md-2 padding-left-none">
                                                                <div class="panding-3">
                                                                    <img src="<?php echo base_url(); ?>assets/img/door-delivery.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 status-content">
                                                        <div class="row">
                                                            <div class="col-md-1 offset-md-1 padding-right-none z-index-1">
                                                                <div class="panding order-status-active">
                                                                    <i class="fas fa-check"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 padding-left-none padding-right-none" data-toggle="tooltip" data-html="true" >
                                                                <div class="status-line <?php
                                                                $status_array = explode(",", $bill_detail[0]->status);
                                                                if (in_array("prepared", $status_array)) {
                                                                    echo "order-status-active";
                                                                } else {
                                                                    echo "order-status-active-line";
                                                                }
                                                                ?>">

                                                                </div>
                                                            </div>
                                                           
                                                            <div class="col-md-1 padding-left-none z-index-1">
                                                                <div class="panding <?php
                                                                $status_array = explode(",", $bill_detail[0]->status);
                                                                if (in_array("prepared", $status_array)) {
                                                                    echo "order-status-active";
                                                                }
                                                                ?>">
                                                                    <i class="<?php
                                                                    if (in_array("prepared", $status_array)) {
                                                                        echo "fas fa-check";
                                                                    } else {
                                                                        echo "far fa-clock";
                                                                    }
                                                                    ?>"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 padding-left-none padding-right-none">
                                                                <div class="status-line <?php
                                                                $status_array = explode(",", $bill_detail[0]->status);
                                                                if (in_array("prepared", $status_array)) {
                                                                    if(in_array("delivered", $status_array))
                                                                    {
                                                                        echo "order-status-active";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "order-status-active-line";
                                                                    }
                                                                    
                                                                }
                                                                ?>">

                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 padding-left-none">
                                                                <div class="panding <?php
                                                                    if (in_array("delivered", $status_array)) {
                                                                        echo "order-status-active";
                                                                    }
                                                                    ?>">
                                                                    <i class="<?php
                                                                    if (in_array("delivered", $status_array)) {
                                                                        echo "fas fa-check";
                                                                    } else {
                                                                        echo "far fa-clock";
                                                                    }
                                                                    ?>"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 status-content">
                                                        <div class="row">
                                                            <div class="col-md-2 padding-right-none">
                                                                <div class="panding-1">
                                                                    <p>Pending</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 padding-left-none padding-right-none">

                                                            </div>
                                                            <div class="col-md-2 padding-left-none">
                                                                <div class="panding-2">
                                                                    <p>Prepared</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 padding-left-none padding-right-none">

                                                            </div>
                                                            <div class="col-md-2 padding-left-none">
                                                                <div class="panding-3">
                                                                    <p>Delivered</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                 ?>   
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class=" pay_add">
                                                <i class="fas fa-utensils"></i> 
                                                <a>RESTAURANT DETAILS</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="res_img_detail">
                                                        <img src="<?php echo base_url() . $restaurant_detail[0]->coverpic; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="add_detail">
                                                        <a href ="<?php echo base_url(); ?>Restaurant-Details/<?php echo $restaurant_detail[0]->restaurant_id; ?>" class="font_bold text-dark"><p><?php echo ucwords($restaurant_detail[0]->restaurant_name); ?></p></a>
                                                        <a><p><?php echo $restaurant_detail[0]->area ?> &longrightarrow; <?php echo $restaurant_detail[0]->city ?> &longrightarrow; <?php echo $restaurant_detail[0]->state ?></p></a>
                                                        <a href="tel:<?php echo $restaurant_detail[0]->contact_no; ?>" class="text-dark"><p><b class="font-weight-500 text-dark">Tel : </b>(+91) <?php echo $restaurant_detail[0]->contact_no; ?></p></a>
                                                        <a href="mailto:<?php echo $restaurant_detail[0]->email; ?>" class="text-dark"><p><b class="font-weight-500" text-dark>Email : </b> <?php echo $restaurant_detail[0]->email; ?></p></a>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 padding-right-5px">
                                            <div class=" pay_add">
                                                <i class="fas fa-id-card"></i> 
                                                <a>CUSTOMER DETAILS</a>
                                            </div>
                                            <div class="add_detail padding-top-10">
                                                <a class="font_bold"><p><?php echo ucwords($user_detail[0]->name); ?></p></a>

                                                <a href="tel:<?php echo $user_detail[0]->contact_no; ?>" class="text-dark"><p><b class="font-weight-500 text-dark">Tel : </b>(+91) <?php echo $user_detail[0]->contact_no; ?></p></a>
                                                <a href="mailto:<?php echo $user_detail[0]->email; ?>" class="text-dark"><p><b class="font-weight-500 text-dark">Email : </b> <?php echo $user_detail[0]->email; ?></p></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 padding-left-5px">
                                            <div class=" pay_add">
                                                <i class="fas fa-map-marked-alt"></i> 
                                                <a>DELIVERY ADDRESS</a>
                                            </div>
                                            <div class="add_detail padding-top-10">
                                                <?php
                                                if ($shipment_detail[0]->address_type == "Home") {
                                                    ?> 
                                                    <i class="fas fa-home munchbox-primary-text-color margin-right-10"></i><a class="font-size-16 font-weight-500">Home</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <i class="fas fa-building munchbox-primary-text-color margin-right-10"></i><a class="font-size-16 font-weight-500">Office</a>
                                                    <?php
                                                }
                                                ?>

                                                <a class="font-size-17"><p><?php echo $shipment_detail[0]->address; ?></p></a>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="pay_add">
                                                <i class="fa fa-credit-card"></i> 
                                                <a>PAYMENT METHOD</a>
                                            </div>
                                            <div class="add_detail padding-top-10">
                                                <a class="font_bold">
                                                    <?php 
                                                        if($bill_detail[0]->payment_method == "cod")
                                                        {
                                                            echo "Cash On Delivery";
                                                        }
                                                        else
                                                        {
                                                            echo "Online Payment";
                                                        }
                                                    ?>
                                                    </a><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pay_summery">
                                        <i class="fa fa-check-square"></i> 
                                        <a>ORDER SUMMERY</a>
                                    </div>

                                    <div class=" order-detail-listing">
                                        <?php
                                        foreach ($order_detail as $data) {
                                            ?>
                                            <div class="row pay_summery_del add_detail_summery">
                                                <?php
                                                if ($data->image != "") {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <img src="<?php echo base_url() . $data->image; ?>">
                                                    </div>
                                                    <?php
                                                }
                                                ?> 


                                                <div class="<?php
                                                if ($data->image != "") 
                                                {
                                                    echo "col-md-9";
                                                }
                                                    else
                                                    {
                                                        echo "col-md-12";
                                                    }
                                                    ?>
                                                     col-md-9">
                                                   
                                                    <a><img src="<?php echo base_url(); ?>assets/img/veg-tag.png" style="height: 20px;width:20px;"></a>
                                                    <a class="font_bold font-size-16"><?php echo $data->item_name; ?></a><br>
                                                    <div class="row" style="margin-top: 10px;">
                                                        <div class="col-md-4">
                                                            <p class="font-weight-500">Price</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p class="font-weight-500">Qty</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p class="font-weight-500">Total Price</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <p>&#8377;<?php echo $data->price; ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><?php echo $data->qty; ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p>&#8377;<?php echo $data->net_price; ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        
                                        
                                            <?php
                                        }
                                        ?>



                                    </div>
                                     <?php 
                                         $charges_amt = $this->md->my_query("select SUM(charged_amt) as amt from tbl_charges where status = 'added_".$bill_detail[0]->bill_id."'")[0]->amt;
                                                    ?>
                                    <div class="pay_summery">
                                        <div class="row">
                                            <div class="col-md-8 text-right padding-right-none">
                                                <a>Subtotal</a><br>
                                                <a>Tax</a><br>
                                                
                                                <?php
                                                if($charges_amt != "")
                                                {
                                                ?>
                                                <a><i class="fas fa-info-circle text-lightt-black" title="Order Cancellation Charges"></i> Charges</a><br>
                                                    <?php
                                                }
                                                 ?>
                                                <a>Grand Total</a>
                                            </div>
                                            <div class="col-md-1 text-right padding-right-5px">
                                                <a></a><br>
                                                <a>+</a><br>
                                               <?php
                                                if($charges_amt != "")
                                                {
                                                ?>
                                                <a>+</a><br>
                                                    <?php
                                                }
                                                 ?>
                                                <a></a><br>
                                            </div>
                                            <div class="col-md-3 text-left p-l-7">
                                                <a>&#8377;<?php echo ($bill_detail[0]->amount + $bill_detail[0]->discount ) - $bill_detail[0]->tex ?></a><br>
                                                <a>&#8377;<?php echo $bill_detail[0]->tex; ?></a><br>
                                                
                                                <?php
                                                if($charges_amt != "")
                                                {
                                                ?>
                                                <a>&#8377;<?php echo $charges_amt; ?></a><br>
                                                    <?php
                                                }
                                                 ?>
                                                <?php
                                                if($charges_amt == "")
                                                {
                                                ?>
                                                      <a>&#8377;<?php echo $bill_detail[0]->amount; ?></a>
                                                    <?php
                                                }
                                                else
                                                {
                                                ?>
                                                      <a>&#8377;<?php echo $bill_detail[0]->amount + $charges_amt; ?></a>
                                                      <?php
                                                }
                                                 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row btn_payment">
                                       
                                        <?php 
                                            if($bill_detail[0]->status == "canceled" || $bill_detail[0]->status == "pending,prepared,readydeliver,delivered")
                                            {
                                        ?>
                                        <div class="col-md-6">
                                            <a onclick="$('#modal-reorder-bill-id').val('<?php echo $bill_detail[0]->bill_id; ?>')" class="cursor-pointer text-white" data-target="#reordermodal" data-toggle="modal"><i class="fas fa-times"></i> &nbsp; Reorder</a>
                                        </div>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <div class="col-md-6">
                                            <a onclick="$('#modal-cancel-bill-id').val('<?php echo $bill_detail[0]->bill_id; ?>')" class="cursor-pointer text-white"  data-target="#cancelmodal" data-toggle="modal"><i class="fas fa-times"></i> &nbsp; Cancel Order</a>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        
                                        <div class="col-md-6 text-right">
                                            <a href="<?php echo base_url(); ?>User-Bill/<?php echo $bill_detail[0]->bill_id . "/" . $restaurant_detail[0]->restaurant_id; ?>"><i class="fa fa-print"></i> &nbsp; Print Order</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <?php
        $this->load->view("footer");
        ?>
        <div class="md-modal md-effect-12">
            <div class="md-content">
                <div class="container-fluid h-100">
                    <div class="row h-100">
                        <div class="col-lg-3">
                            <div class="modal-sidebar padding-20">
                                <div class="content-box padding-15 u-line">
                                    <h5 class="text-light-black title fw-600 no-margin">Delivered <span><a href="#" class="fs-14">Help</a></span></h5>
                                    <p class="text-light-white mb-xl-20">Five Guys 8:56pm arrival</p>
                                    <div id="add-listing-tab1" class="step-app mb-xl-20">
                                        <ul class="step-steps">
                                            <li class="done order-note">
                                                <a href="javascript:void(0)"> <span class="number"></span>
                                                </a>
                                            </li>
                                            <li class="active make-order">
                                                <a href="javascript:void(0)"> <span class="number"></span>
                                                </a>
                                            </li>
                                            <li class="bike">
                                                <a href="javascript:void(0)"> <span class="number"></span>
                                                </a>
                                            </li>
                                            <li class="home-delivery">
                                                <a href="javascript:void(0)"> <span class="number"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rating-box"> <span class="text-light-black fs-12">Rate your delivery</span>
                                        <div class="ratings"> <span class="text-light-white">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-light-white">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-light-white">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-light-white">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-light-white">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="arrow"><a href="#"><i class="fas fa-chevron-right"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-box padding-15 u-line">
                                    <h6 class="text-light-black fw-500 mb-2 title">Five Guys <span><a href="#" class="fs-12"><i class="fas fa-chevron-right"></i></a></span></h6>
                                    <p class="text-light-black mb-1">2 Items</p>
                                    <p class="text-light-white no-margin fs-12">1x Little Hamburger</p>
                                    <p class="text-light-white no-margin fs-12">1x Hamburger</p>
                                </div>
                                <div class="content-box padding-15 u-line">
                                    <h6 class="text-light-black fw-500 mb-2 title">Delivery Address</h6>
                                    <p class="text-light-black no-margin">314 79th St, Brooklyn, NY 11209, USA</p>
                                </div>
                                <button class="md-close btn-second btn-submit full-width"><i class="fas fa-chevron-left"></i> Go Back</button>
                            </div>
                        </div>
                        <div class="col-lg-9 no-padding">
                            <div id="pickupmap2"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="md-overlay"></div>
        
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

        <?php
        $this->load->view("footerscript");
        ?>
    </body>



</html>




