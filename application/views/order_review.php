
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Review For Order | MUNCHBOX-The foodies food</title>
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
        <div class="main-sec"></div>
        <!-- Navigation -->
        <!-- exclusive deals -->

        <section class="section-padding-bottom section-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="review-sidebar-content">
                            <p>Expectation Type</p>
                            <ul>
                                <li><i class="far fa-dot-circle"></i><b>Delivery</b></li>
                                <li class="content-line">Your order will be delivered in your area</li>
                            </ul>
                            <hr>
                            <p>Delivery Time</p>
                            <ul>
                                <li><i class="far fa-dot-circle"></i><b>As soon as possible</b></li>
                                <li class="content-line">Expacted Delivery time: 30 min</li>
                                <button data-target="#promocode" data-toggle="modal">promocode</button>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 order-review-sidebar-2">
                        <form method="post" action="" name="order-review">
                            <div class="review-sidebar-content-2">

                                <div class="header-order-review">
                                    <p>Your Order</p>
                                </div>
                                <div class="order-review-detail">
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <p>Quantity :</p>
                                        </div>
                                        <div class="col-md-5 margin-left-10px">
                                            <p>Item Name :</p>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <p>Price :</p>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($cart_detail as $cart) {
                                        ?>
                                        <div class="row">
                                            <div class="col-md-3 item-list-qty item-list-qty-review">
                                                <p class="m-l-49"><?php echo $cart->qty; ?></p>


                                            </div>
                                            <div class="col-md-6 order-view-item-name">
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
                                                <span><?php echo $cart->item_name; ?></span>
                                            </div>
                                            <div class="col-md-2 order-review-item-price">
                                                <span> &#8377; <?php echo $cart->total_price ?></span>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>


                                </div>
                                 <div class="total-pay-line-1">

                                        </div>
                                <div class="cart-footer m-b-10">
                                    <div class="row text-dark">
                                        
                                        <div class="col-md-9 text-right">
                                            <p>Item Total</p>
                                            <p>Tax&nbsp;
                                            <div class="tooltip bs-tooltip-top" role="tooltip">
                                                <div class="arrow"></div>
                                                <div class="tooltip-inner">
                                                    Some tooltip text!
                                                </div>
                                            </div>
                                            </p>

                                            <?php
                                            $charges = $this->md->my_select("tbl_charges", "*", array("user_id" => $this->session->userdata("user_username"), "status" => "unpaid"));

                                            if (count($charges) > 0) {
                                                ?>
                                                <p>Charges&nbsp;<i class="fas fa-info-circle text-light-black" title="Order Cancellation Charges"></i></p>
                                                <?php
                                            }
                                            ?>
                                            <p>Delivery Fee</p>
                                            <!--<p>Discount(8%)</p>-->
                                        </div>
                                        
                                        <div class="col-md-3 p-l-50">
                                             <?php
                                            $subtotal = $this->md->my_query("select SUM(`total_price`) as subtotal from tbl_addtocart where user_id = " . $this->session->userdata("user_username"))[0]->subtotal;
                                            ?>
                                            <p>&#8377; <?php echo $subtotal; ?></p>
                                            <p>+ &#8377;<?php
                                                $tax = round($subtotal * 10 / 100);
                                                echo $tax;
                                                ?></p>
                                            <?php
                                            if (count($charges) > 0) {
                                                ?>
                                                <p>+ &#8377;<?php
                                                    $char_amt_total = $this->md->my_query("select SUM(charged_amt) as totalcharges from tbl_charges where user_id = " . $this->session->userdata("user_username") . " and status = 'unpaid'")[0]->totalcharges;
                                                    echo $char_amt_total;
                                                    ?></p>
                                                <?php
                                            }
                                            ?>

                                            <p class="text-color-green">Free</p>
                                            

                                        </div>
                                        

                                    </div>
                                </div>
                                <div class="header-order-review">
                                    <?php
                                    $subtotal = $this->md->my_query("select sum(total_price) as subtotal from tbl_addtocart where user_id = " . $this->session->userdata("user_username"))[0]->subtotal;
                                    ?>
                                    <div class="row">
                                        <div class="col-md-9 text-right order-review-total-amount">
                                            Subtotal 
                                        </div>   
                                        
                                        <div class="col-md-3 order-review-total-price">
                                            &#8377;<?php
                                               $new_amt = $subtotal + $tax;
                                            if (count($charges) > 0) {
                                                $amount = $new_amt  + $char_amt_total;
                                            } else {
                                                $amount = $new_amt;
                                            }
                                            echo $amount;
                                            ?>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="btn-order-review">
                                <a class="btn-order-review-change" href="<?php echo base_url("Restaurant-Details") . "/" . $cart->restaurant_id; ?>/">Change Order Detail</a>
                                <a class="btn-order-review-confirm" href="<?php echo base_url("Confirm-order-detail"); ?>" onclick="<?php $this->session->set_userdata("confirm_order_review", "yes"); ?>">Confirm Order Detail</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
        <!-- exclusive deals -->
        <!-- Featured partners -->

        <!-- local deals -->
        <!-- footer -->
<?php
$this->load->view("footer");
?>
        <!-- footer -->
        <div class="modal left fade" id="promocode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Left Sidebar</h4>
                    </div>

                    <div class="modal-body">
                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </p>
                    </div>

                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->

<?php
$this->load->view("footerscript");
?>
        <script src="<?php echo base_url() ?>assets/js/munchbox.js" type="text/javascript"></script>
    </body>



</html>