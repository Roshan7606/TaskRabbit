<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title>Bill Detail | MUNCHBOX-The foodies food</title>
        <!-- Fav and touch icons -->
        <?php
        $this->load->view("CSS");
        ?>
        <style>
            .design{
                border: 1px solid #000;
                margin-top: 100px;
                height: 500px;

                background: red;
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>

        <div class="container">
            <div class="row bill-info">
                <div class="col-md-12 user-bill">
                    <a><i class="fa fa-caret-right">&nbsp; &nbsp;Bill Information</i></a>
                </div>
            </div>

            <div class="bill">
                <div class="row">
                    <div class="bill_no col-md-12">

                        <center>
                            <a class="hotel-name"><?php echo ucwords($restaurant_detail[0]->restaurant_name); ?></a>
                            <br/>
                            <a><?php echo $restaurant_detail[0]->area ?> &longrightarrow; <?php echo $restaurant_detail[0]->city ?> &longrightarrow; <?php echo $restaurant_detail[0]->state ?></a>
                            <br/>
                              <a href="tel:<?php echo $restaurant_detail[0]->contact_no; ?>" class="text-dark"><b>Tel : </b>(+91) <?php echo $restaurant_detail[0]->contact_no; ?></a>
                              <br/>
                              <a href="mailto:<?php echo $restaurant_detail[0]->email; ?>" class="text-dark"><b>Email : </b> <?php echo $restaurant_detail[0]->email; ?></a>
                        </center>    
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a class="bill_date"><b class="font-bold">Date:</b>&nbsp;<?php echo date('d-m-Y', strtotime($bill_detail[0]->bill_date)); ?></a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="padding-right-27"><b class="font-bold">Bill No:</b> <?php echo $bill_detail[0]->bill_number; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <div class="row bill_view_hr"></div>

                </center>
                <div class="row format-bill">

                    <div class="bill-title offset-md-1 col-md-1">
                        <a>No.</a>
                    </div>
                    <div class="bill-title col-md-3">
                        <a>Name</a>
                    </div>
                    <div class="bill-title col-md-3">
                        <a>Qty</a>
                    </div>
                    <div class="bill-title col-md-2">
                        <a>Price</a>
                    </div>
                    <div class="bill-title col-md-2">
                        <a>Amount</a>
                    </div>
                </div>
                <center>
                    <div class="row bill_view_hr"></div>

                </center>
                <?php 
                    $c = 0;
                    foreach($order_detail as $data)
                    {
                        $c++;
                ?>
                <div class="row format-bill">

                    <div class="bill-description offset-md-1 col-md-1">
                        <a><?php echo $c; ?></a>
                    </div>
                    <div class="bill-description col-md-3">
                        <a><?php echo $data->item_name; ?></a>
                    </div>
                    <div class="bill-description col-md-3">
                        <a><?php echo $data->qty; ?></a>
                    </div>
                    <div class="bill-description col-md-2">
                        <a>&#8377;<?php echo $data->price; ?></a>
                    </div>
                    <div class="bill-description col-md-2">
                        <a>&#8377;<?php echo $data->net_price; ?></a>
                    </div>
                </div>
                <?php 
                    }
                ?>
                <center>
                    <div class="row bill_view_hr"></div>

                </center>
                <div class="row">
                    <?php 
                                         $charges_amt = $this->md->my_query("select SUM(charged_amt) as amt from tbl_charges where status = 'added_".$bill_detail[0]->bill_id."'")[0]->amt;
                                                    ?>
                    <div class="grand-total offset-md-7 col-md-2 text-right bill-font-style">
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
                

                    </div>
                    <div class="grand-total col-md-1 text-right bill-font-style padding-right-none">
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
                
                    </div>
                    <div class="grand-sum col-md-2 bill-font-style">
                        <a>&#8377;<?php echo ($bill_detail[0]->amount + $bill_detail[0]->discount ) - $bill_detail[0]->tex?></a><br>
                        <a>&#8377;<?php echo $bill_detail[0]->tex; ?></a><br>
                        <?php
                                                if($charges_amt != "")
                                                {
                                                ?>
                                                <a>&#8377;<?php echo $charges_amt; ?></a><br>
                                                    <?php
                                                }
                                                 ?>

                    </div>
                </div>
                <center>
                    <div class="row bill_view_hr"></div>
                    <div class="row">
                    <div class="grand-total offset-md-7 col-md-2 text-right">
                        <a><b>Grand Total</b></a> 
                    </div>
                    <div class="grand-total col-md-1 text-right">
                        
                        <a></a><br>
                    </div>
                    <div class="grand-sum col-md-2 text-left">
                         <?php
                                                if($charges_amt != "")
                                                {
                                                ?>
                                                <a><b>&#8377;<?php echo $bill_detail[0]->amount + $charges_amt;?></b></a>
                                                    <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <a><b>&#8377;<?php echo $bill_detail[0]->amount;?></b></a>
                                                <?php
                                                }
                                                 ?>

                         
                    </div>
                </div>
                    <div class="row bill_view_hr"></div>
                </center>

                <div class="message">
                    <center>
                        <a>THANKS &nbsp;FOR &nbsp;ORDER</a>
                        <br/>
                        <img src="<?php echo base_url(); ?>assets/img/logo.png">
                    </center>

                </div>

            </div>
        </div>

        <?php
        $this->load->view("footer");
        ?>
    </body>
    <?php
    $this->load->view("footerscript");
    ?>



</html>