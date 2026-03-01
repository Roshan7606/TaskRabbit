    <!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Munchbox | Payment</title>
        <?php
        $this->load->view("CSS");
        ?>
    </head>

    <body>
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12  payment1">
                    <center>
                        <!--img src="<?php echo base_url(); ?>assets/img/payment-success.gif"-->
                        <!--<i class="flaticon-guarantee" style="font-size: 80px;color: green" ></i>-->
                        <img src="<?php echo base_url(); ?>assets/img/animated-gif/no_found.gif">
                        <h2>Thank you for your order!</h2>
                        <a>The order confirmation email with details of your Order has been sent to your email address.</a><br>
                        <br>
                        <a class="pay_id">Your order  # Is: <?php echo $bill_detail[0]->bill_number."00".$bill_detail[0]->bill_id; ?></a>
                        <?php 
                            $wh1["bill_id"] = $bill_detail[0]->bill_id;
                            $ins_bill_number["bill_number"] = intval($bill_detail[0]->bill_number."00".$bill_detail[0]->bill_id);
                            $this->md->my_update("tbl_bill",$ins_bill_number,$wh1);
                        ?>
                        <br/><br>
                        <a>Your order: &nbsp; <?php echo date("Y M d", strtotime($bill_detail[0]->bill_date)); ?></a>
                    </center><br>
                    <div class="row">
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
                                                <img src="<?php echo base_url().$restaurant_detail[0]->coverpic; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="add_detail">
                                                <a class="font_bold"><p><?php echo ucwords($restaurant_detail[0]->restaurant_name); ?></p></a>
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
                                            if($shipment_detail[0]->address_type == "Home")
                                            {
                                        ?> 
                                        <i class="fas fa-home munchbox-primary-text-color margin-right-10"></i><a class="font-size-16 font-weight-500">Home</a>
                                        <?php
                                             
                                            }
                                            else
                                            {
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
                                        <a class="font_bold">Cash On Delivery</a><br>
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
                                                <a>Charges <i class="fas fa-info-circle text-light-black" title="Order Cancellation Charges"></i></a><br>
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
        <?php
        $this->load->view("footerscript");
        ?>
    </body>



</html>