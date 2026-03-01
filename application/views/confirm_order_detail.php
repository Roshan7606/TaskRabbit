<?php 

echo $this->session->userdata("reorder_bill_id");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Checkout | MUNCHBOX-The foodies food</title>
        <!-- Fav and touch icons -->
        <?php
        $this->load->view("CSS");
        ?>
    </head>
    <body>
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>
        <section class="section-padding-top-checkout">
            <div class="container-munchbox">
                <section class="section-padding-bottom-munchbox">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="m-b-9">
                                        <div class=" p-b-14">
                                            <div class="review-sidebar-content p-19">
                           
                            <ul>
                                <li><i class="far fa-dot-circle"></i><b>For Order Cancellation</b></li>
                                <li class="content-line">Whenever you cancel the order if your order is send by restaurant for prepare then you will have to pay 100% of order amount which is added in your next order .</li>
                            </ul>
                           
                          
                        </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                            if($restaurant_detail[0]->service_status == "closed")
                                            {
                                
                                ?>
                                <div class="col-md-12">
                                    <div class="margin-bottom-40">
                                        <div class="review-sidebar-content-checkout p-b-14" style="position:relative;">
                                            <div class="address-detail">
                                                <h3 class="margin-b-none">Restaurant Service Status</h3>
                                                <div class="row m-t-15">
                                                    <div class="col-md-2 padding-right-none text-center">
                                                        <img src="<?php echo base_url(); ?>assets/img/closed.png" style="width:60px;">
                                                    </div>
                                                    <div class="col-md-10 padding-left-none">
                                                        <h5 class="m-b-5">Restaurant is closed</h5>
                                                        <p>Order you placed within restaurant is currently closed.Check tomorrow for place order.</p>
                                                        <p class="store-open-text">Open tomorrow at 10:00 Am</p>
                                                    </div>
                                                </div>    

                                                <div class="checkout-label-corner-2" id="address-label-corner-1">
                                                    <i class="fas fa-store"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                            }
                                ?>

                                <div class="col-md-12">
                                    <div class="review-sidebar-content-checkout" style="position:relative;">
                                        <div class="user-detail">
                                            <h3>
                                                Customer Detail

                                                <img id="checkout-checkmark-icon" class="<?php
                                                if ($this->session->userdata("confirm_detail_flag") && $this->session->userdata("confirm_detail_flag") == 1) {

                                                    echo "checkout-display-option-inline";
                                                } else {
                                                    echo "Checkout-display-option-none";
                                                }
                                                ?>" src="<?php echo base_url(); ?>assets/img/checkmark.png"><button class="<?php
                                                     if ($this->session->userdata("confirm_detail_flag") && $this->session->userdata("confirm_detail_flag") == 1) {

                                                         echo "checkout-display-option-inline";
                                                     } else {
                                                         echo "Checkout-display-option-none";
                                                     }
                                                     ?>" id="checkout-btn-change">CHANGE</button></h3>

                                            <?php
                                            if ($restaurant_detail[0]->service_status != "closed") {
                                                ?>       
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table>
                                                            <tr>
                                                                <td class="checkout-table-text">Name</td>
                                                                <td class="checkout-table-text">:</td>
                                                                <td class="checkout-table-text-td"><?php echo ucwords($user_detail[0]->name); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="checkout-table-text">Email</td>
                                                                <td class="checkout-table-text">:</td>
                                                                <td class="checkout-table-text-td"><?php echo $user_detail[0]->email; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="checkout-table-text">Mobile No</td>
                                                                <td class="checkout-table-text">:</td>
                                                                <td class="checkout-table-text-td"><?php echo $user_detail[0]->contact_no; ?></td>
                                                            </tr>

                                                        </table>

                                                        <div class="btn-checkout <?php
                                                        if ($this->session->userdata("confirm_detail_flag") && $this->session->userdata("confirm_detail_flag") == 1) {
                                                            echo "checkout-display-option-none";
                                                        }
                                                        ?>">
                                                            <button class="btn-checkout-confirm">Confirm detail</button>
                                                            <a class="btn-checkout-change" href="<?php echo base_url("User-Editprofile"); ?>" onclick="<?php $this->session->set_userdata("change_user_detail", $this->session->userdata("user_username")); ?>">Change detail</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        if ($restaurant_detail[0]->service_status == "closed") {
                                            ?>
                                            <div class="checkout-label-corner-1">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="checkout-label-corner-2">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="margin-top-40">
                                        <div class="review-sidebar-content-checkout" style="position:relative;">
                                            <div class="address-detail">
                                                <h3 class="margin-b-none">Delivery address
                                                    <?php
                                                    if ($restaurant_detail[0]->service_status != "closed") {
                                                        ?>
                                                        <img class="<?php
                                                        if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {
                                                            echo "checkout-display-option-inline";
                                                        }
                                                        ?>" id="checkout-checkmark-icon" src="<?php echo base_url(); ?>assets/img/checkmark.png"><button class="<?php
                                                             if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {
                                                                 echo "checkout-display-option-inline";
                                                             }
                                                             ?>" id="checkout-btn-change" onclick='showaddressdisplay();'>CHANGE</button>
                                                             <?php
                                                         }
                                                         ?>

                                                </h3>
                                                <?php
                                                    if ($restaurant_detail[0]->service_status != "closed") {
                                                        ?>
                                                <div class="row checkout-address-body checkout-address-body-display <?php
                                                if ($this->session->userdata("confirm_detail_flag") && $this->session->userdata("confirm_detail_flag") == 1) {
                                                    if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {

                                                        echo "checkout-display-option-none";
                                                    } else {
                                                        echo "checkout-display-option-flex";
                                                    }
                                                }
                                                ?>">
                                                         <?php
                                                         foreach ($address_detail as $single) {
                                                             ?>
                                                        <div class="col-md-6">
                                                            <div class="ship-address">
                                                                <div class="row" id="after-deliver">
                                                                    <div class="col-md-2">
                                                                        <?php
                                                                        if ($single->address_type == "Home") {
                                                                            ?>
                                                                            <img src="<?php echo base_url(); ?>assets/img/home-address.png">
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <img src="<?php echo base_url(); ?>assets/img/office-address.png">
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <p class="ship-address-header"><?php
                                                                            if ($single->address_type == "Home") {
                                                                                echo "Home";
                                                                            } else {
                                                                                echo "Office";
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                        <p class="ship-address-header-adress"><?php echo $single->address; ?></p>
                                                                        <p class="ship-address-state-details-con"><?php echo $single->state; ?> &Longrightarrow; <?php echo $single->city; ?> &Longrightarrow; <?php echo $single->area; ?></p>
                                                                        <button class="btn-checkout-confirm" onclick="delivercheckout('<?php echo $single->shipment_id; ?>', '<?php echo $restaurant_detail[0]->restaurant_id; ?>')">Deliver Here</button>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <div class="ship-address">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img src="<?php echo base_url(); ?>assets/img/address.png" style="height: 25px;width: 27px;">
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <p class="ship-address-header">Add New Address</p>
                                                                    <p class="text-justify">G-301,Managalam Residency,UtranGam,Surat-395006,Gujarat</p>
                                                                    <p>Gujarat &Longrightarrow; Surat &Longrightarrow; Utran</p>
                                                                    <a class="btn-checkout-confirm-shipment" href="<?php echo base_url("User-Shipment"); ?>" onclick="<?php $this->session->set_userdata("addnewaddress", "yes"); ?>">Add New</a>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="row checkout-address-body-hidden <?php
                                                if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {
                                                    echo "checkout-option-display-block";
                                                } else {
                                                    echo "checkout-option-display-none";
                                                }
                                                ?>">
                                                         <?php
                                                         if (isset($bill_address_detail) && count($bill_address_detail) != 0) {
                                                             ?>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-1 text-center">
                                                                    <?php
                                                                    if ($bill_address_detail[0]->address_type == "Home") {
                                                                        ?>
                                                                        <img src="<?php echo base_url(); ?>assets/img/home-address.png" style="height: 25px;width: 27px;">
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <img src="<?php echo base_url(); ?>assets/img/office-address.png" style="height: 25px;width: 27px;">
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-11" >
                                                                    <p class="ship-address-header">
                                                                        <?php
                                                                        if ($bill_address_detail[0]->address_type == "Home") {
                                                                            echo "Home";
                                                                        } else {
                                                                            echo "Office";
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                    <p class=""><?php echo $bill_address_detail[0]->address; ?></p>
                                                                    <p class=""><?php echo $bill_address_detail[0]->state; ?> &Longrightarrow; <?php echo $bill_address_detail[0]->city; ?> &Longrightarrow; <?php echo $bill_address_detail[0]->area; ?></p>
                                                                    <p class="text-justify">Expected Delivery Time : 30 min</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php 
                                                    }
                                                ?>
                                            </div>
                                            <?php
                                            if ($restaurant_detail[0]->service_status == "closed") {
                                                ?>
                                                <div class="checkout-label-corner-1">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="checkout-label-corner-1" id="address-label-corner-1" style="<?php
                                                if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {
                                                    echo "display : none";
                                                } else {
                                                    echo "display : block";
                                                }
                                                ?>">
                                                    <i class="fas fa-location-arrow"></i>
                                                </div>

                                                <div class="checkout-label-corner-2" id="address-label-corner-2" style="<?php
                                                if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {
                                                    echo "display : block";
                                                } else {
                                                    echo "display : none";
                                                }
                                                ?>">
                                                    <i class="fas fa-location-arrow"></i>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="margin-top-40">
                                        <div class="review-sidebar-content-checkout" style="position:relative;">
                                            <div class="payment-detail">
                                                <h3 class="margin-b-none">Payment Method
                                                <?php
                                                    if ($restaurant_detail[0]->service_status != "closed") {
                                                        ?>
                                                        <img class=" display-none " id="payment-checkmark-icon" src="<?php echo base_url(); ?>assets/img/checkmark.png">
                                                        <button class="display-none" id="payment-btn-change" onclick='change_payment();'>CHANGE</button>
                                                             <?php
                                                         }
                                                         ?>
                                                </h3>
                                                <?php
                                                    if ($restaurant_detail[0]->service_status != "closed") {
                                                        ?>
                                                <div class="checkout-payment-body-1 payment-method-show" style="<?php
                                                if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") != 0) {
                                                    echo "display : block !important";
                                                } else {
                                                    echo "display : none !important";
                                                }
                                                ?>">

                                                    <span class="payment-method-1">

                                                        <input type="radio" name="payment" id="payment-cod" value="cod" onchange="payment_method(this.value)">


                                                        <b>Cash On Delivery</b>

                                                    </span>
                                                    <span class="payment-method-2">
                                                        <input type="radio" name="payment" id="payment-pod" value="pod" onchange="payment_method(this.value)">
                                                        <b>Online Payment</b>

                                                    </span>


                                                </div>
                                                <div class="checkout-payment-body-2 display-none">

                                                    <span class="payment-method-1 show-ckecked-payment-method">
                                                        <img src="<?php echo base_url(); ?>assets/img/online-payment.png">
                                                    </span>
                                                    <span class="payment-method-2 show-checked-payment-text">

                                                        <b>Online Payment</b>

                                                    </span>


                                                </div>
                                                <?php
                                                    }
                                                ?>
                                                <?php
                                            if ($restaurant_detail[0]->service_status == "closed") {
                                                ?>
                                                <div class="checkout-label-corner-1">
                                                    <i class="fas fa-wallet"></i>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="checkout-label-corner-1 payment-indicate-icon" id="address-label-corner-1">
                                                    <i class="fas fa-wallet"></i>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="review-sidebar-content-checkout order-content-checkout">
                                <div class="order-cart-detail-header">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img class="res-img-logo" src="<?php echo base_url() . $restaurant_detail[0]->coverpic; ?>" >
                                        </div>
                                        <input type="hidden" value="<?php echo $restaurant_detail[0]->restaurant_id; ?>" id="confirm_page_restaurant_id">
                                        <div class="col-md-9 header-text-checkout">
                                            <h5><?php echo $restaurant_detail[0]->restaurant_name; ?></h5>
                                            <p><?php echo $restaurant_detail[0]->area; ?> &Longrightarrow; <?php echo $restaurant_detail[0]->city; ?> &Longrightarrow; <?php echo $restaurant_detail[0]->state; ?></p>
                                            <div class="line-checkout-order"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="order-cart-detail-body">
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2">
                                            <p class="font-item-prize-style">Item</p>
                                        </div>
                                        <div class="col-md-3 text-center font-item-prize-style">
                                            <p>Qty</p>
                                        </div>
                                        <div class="col-md-3 font-item-prize-style">
                                            <p>Price</p>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($cart_detail as $cart) {
                                        ?>
                                        <div class="row">
                                            <div class=" col-md-2">
                                                <?php
                                                if ($cart->category == "Veg") {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/veg-tag.png">
                                                    <?php
                                                } elseif ($cart->category == "Non veg") {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/nonvag-tag.png">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/ovoveg-tag.png">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-4 padding-top-5 padding-right-none">
                                                <p><?php echo $cart->item_name; ?></p>
                                            </div>
                                            <div class="col-md-3 text-center padding-top-5 checkout-qty" title="Quantity">
                                                <span><?php echo $cart->qty; ?></span>
                                            </div>
                                            <div class="col-md-3  padding-top-5 padding-left-none text-center ">
                                                <p class="margin-right-10">&#8377; <?php echo $cart->total_price ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div class="order-cart-dettail-promocode">
                                    <div class="row">
                                        <div class="col-md-12 padding-left-none padding-right-none">
                                            <textarea class="form-control confirm-suggestion-box" onblur="setsuggestion(this.value);" name="suggestion" rows="3"  placeholder="Enter any aditional information about your order.Eg:'No Mayo!'"></textarea>
                                            <?php $this->session->set_userdata("suggestion"); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="order-bill-detail">
                                    <h5 class="margin-b-address-title mar-bot-20">Bill Details</h5>
                                    <div class="row">
                                        <?php
                                        $subtotal = $this->md->my_query("select sum(total_price) as subtotal from tbl_addtocart where user_id = " . $this->session->userdata("user_username"))[0]->subtotal;
                                        $charges = $this->md->my_select("tbl_charges", "*", array("user_id" => $this->session->userdata("user_username"), "status" => "unpaid"));
                                        ?>
                                        <div class="col-md-6 text-left font-weight-500">
                                            <p class="font-weight-600">Item Total</p>
                                            <p class="font-weight-600">Tax&nbsp;</p>
                                            <?php
                                            if (count($charges) > 0) {
                                                ?>
                                                <p class="font-weight-600" ><i class="fas fa-info-circle text-lightt-black" title="Order Cancellation Charges"></i> Charges</p>
                                                <?php
                                            }
                                            ?>

                                            <p class="font-weight-600">Delivery Fee</p>
                            

                                        </div>
                                        <div class="col-md-6 text-right">
                                            <p class="font-weight-600">&#8377; <?php echo $subtotal; ?></p>
                                            <p class="font-weight-600">+ &#8377;<?php
                                                $tax = round($subtotal * 10 / 100);
                                                echo $tax;
                                                ?></p>
                                            <?php
                                            if (count($charges) > 0) {
                                                ?>
                                            <p class="font-weight-600">+ &#8377;<?php
                                                    $charges_id = "";
                                                    foreach($charges as $single)
                                                    {
                                                        $charges_id .= $single->charges_id."A";
                                                    }
                                                    $char_amt_total = $this->md->my_query("select SUM(charged_amt) as totalcharges from tbl_charges where user_id = " . $this->session->userdata("user_username") . " and status = 'unpaid'")[0]->totalcharges;
                                                    echo $char_amt_total;
                                                    ?></p>
                                                <?php
                                            }
                                            ?> 
                                            <p class="text-color-green font-weight-600">Free</p>
                                           

                                        </div>
                                        <div class="total-pay-line">

                                        </div>
                                        <div class="col-md-12">
                                            <div class="row total-to-pay">
                                                <div class="col-md-6">
                                                    <p>To Pay</p>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <p>&#8377; <?php
                                                    $new_amt = $subtotal + $tax;
                                                        if (count($charges) > 0) {
                                                            $amount = $new_amt  + $char_amt_total;
                                                        } else {
                                                            $amount = $new_amt;
                                                        }
                                                        echo $amount;
                                                        ?></p>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                         
                                <div class="place-order-btn  <?php
                                if ($this->session->userdata("payment_method") && $this->session->userdata("payment_method") != "no") {
                                    echo "checkout-display-option-block";
                                } else {
                                    echo "checkout-display-option-none";
                                }
                                ?>">
                                    <a data-target=".bs-example-modal-md-checkout" data-toggle="modal">
                                        <p>Place Order</p>
                                    </a>
                                </div>


                            </div>

                        </div>

                    </div>
                </section>    
            </div>
        </section>

        <?php
        $this->load->view("footer");
        ?>
    </body>
    <div class="modal fade bs-example-modal-md-checkout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="model-remove">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/website.png" style="height: 100px;width:100px;">
                        <p> Are you sure want to Place Order ? </p>
                        <div class="order-btn-reorder display-none" id="checkout-order-btn-cod"> 
                            <?php
                            
                                if(isset($charges_id))
                                    {
                                        $path_data = "/" . $restaurant_detail[0]->restaurant_id . "/" . $charges_id . "/" . $tax . "/" . $amount;
                                    }
                                    else
                                    {
                                      $path_data = "/" . $restaurant_detail[0]->restaurant_id . "/" ."00". "/" . $tax . "/" . $amount;

                                    }
                            ?>
                             <a href="<?php echo base_url("Payment-Succes") .$path_data; ?>" class="btn btn-checkout-modal">Yes</a>
                             <a href="" class="btn btn-cancel btn-checkout-no">No</a>
                        </div>
                        <div class="order-btn-reorder display-none" id="checkout-order-btn-pod">                  
                             <form action="<?php echo PAYPAL_URL; ?>" method="post">
                                <!-- Identify your business so that you can collect the payments. -->
                                <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                                <!-- Specify a Buy Now button. -->
                                <input type="hidden" name="cmd" value="_xclick">

                                <!-- Specify details about the item that buyers will purchase. -->
                                <input type="hidden" name="item_name" value="<?php echo "pro1"; ?>">
                                <input type="hidden" name="item_number" value="<?php echo "pro_11"; ?>">
                                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                                <!-- Specify URLs -->
                                <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">

                                <!-- Display the payment button. -->
                                <!--<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">-->
                                <?php 
                                    if(isset($charges_id))
                                    {
                                        $path_data = "/" . $restaurant_detail[0]->restaurant_id . "/" . $charges_id . "/" . $tax . "/" . $amount;
                                    }
                                    else
                                    {
                                       $path_data = "/" . $restaurant_detail[0]->restaurant_id . "/" ."00"."/". $tax . "/" . $amount;
                                    }
                                    
                                ?>
                                <input type="submit" name="submit" class="btn btn-checkout-modal cursor-pointer" value="Yes" onclick="<?php echo $this->session->set_userdata("payment-fail-success-path",$path_data); ?>">
                                <a href="" class="btn btn-cancel btn-checkout-no">No</a>
                            </form>
                        </div>
                         


                        
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="already-added no-res-found" id="already-added">
        <center>
            <img src="<?php echo base_url(); ?>assets/img/no-res-city.gif">
            <h5>Restaurant not found in your city.</h5>
            <p>Order you placed within restaurant is not provide services in your city.</p>
            <p>Click on Explore to find restaurant in your city.</p>
            <div class="row already-added-button-row">
                <div class="offset-md-1 col-md-5 btn-yes-cart" id="btn-yes-cart" onclick="remove_cart_item('yes', '<?php echo $this->session->userdata('user_username'); ?>')">
                    <a id="res-no-found-explore-btn"><button>Explore</button></a>
                </div>
                <div class="offset-md-1 col-md-5 btn-no-cart" id="btn-no-cart" onclick="remove_cart_item('no')">
                    <button >Cancel</button>
                </div>

            </div>
        </center>
    </div>
    <?php
    $this->load->view("footerscript");
    ?>
    <script src="<?php echo base_url(); ?>assets/js/munchbox.js"></script>
    <script>
//        $(document).unload(function(){
//            <?php
//            $this->session->set_userdata("leave_page","hello");
    ?>//
//        });

    </script>
    <?php
    if ($this->session->userdata("delivered_address") && $this->session->userdata("delivered_address") == 1) {
        ?>
    <script>
        $(".address-detail #checkout-checkmark-icon").addClass("checkout-display-option-inline");
        $(".address-detail #checkout-btn-change").addClass("checkout-display-option-inline");
        $(".address-detail .title-address").addClass("checkout-display-option-none");
      </script>  
        <?php
    }
    ?>
      <script>
//          $base_url = "http://localhost/MUNCHBOX/";
//          $(document).ready(function(){
//             $value_cod = $("#payment-cod").attr("checked"); 
//             $value_pod = $("#payment-pod").attr("checked");  
//             
//             if($value_cod == "checked")
//             {
//                 $(".checkout-payment-body-2").removeClass("display-none");
//                 $(".show-ckecked-payment-method img").attr("src",$base_url+"assets/img/cash-payment.png");
//                 $(".show-checked-payment-text b").html("Cash On Delivery");
//                 $(".payment-method-show").css("display","none");
//                alert($value);
//             }
//             //alert($("#payment-pod").attr("checked")); 
//          });

//window.onafterunload = function(){
//    var resid = $("#confirm_page_restaurant_id").val();
//  $data={payment_value : "no",res_id:resid};
//    $path = "http://localhost/MUNCHBOX/Backend/upadatepaymentsession";
//    $.post($path,$data,function(data){
//        window.location = "http://localhost/MUNCHBOX/Restaurant-Details/" + resid;
//    });
//};
          </script>

</html>