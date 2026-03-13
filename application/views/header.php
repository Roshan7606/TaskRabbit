<div class="header">
    <header class="full-width">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mainNavCol">
                    <!-- logo -->
                    <div class="logo mainNavCol" style="margin-left: 2%;">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" style="height:40px;width:auto; transform:scale(4);">
                        </a>
                    </div>
                    <!-- logo -->
                    <div class="main-search mainNavCol">
                        <form class="main-search search-form full-width">
                            <div class="row">


                            </div>
                        </form>
                    </div>
                    <div class="right-side fw-700 mainNavCol">
                        
                        <div class="gem-points">
                            <a href="<?php echo base_url(); ?>Restaurant/0"> <i class="fas fa-concierge-bell"></i>
                                <span>Services</span>
                            </a>
                        </div>
                        
                        <div class="gem-points">
                            <a href="<?php echo base_url("City"); ?>"><i class="fas fa-city fs-23"></i>
                                <span>Cities</span>
                            </a>
                        </div>
                        <div class="gem-points">
                            <a href="<?php echo base_url("About-us"); ?>">
                                <span>About Us</span>
                            </a>
                        </div>
                        
                        <!-- mobile search -->
                        <div class="mobile-search">
                            <a href="#" data-toggle="modal" data-target="#search-box"> <i class="fas fa-search"></i>
                            </a>
                        </div>
                        <!-- mobile search -->
                        <!-- user account -->
                        
                            <?php 
                                if($this->session->userdata("user_username"))
                                {
                            ?>
                        <div class="user-details p-relative">
                            <a href="#" class="text-light-white fw-500">
                                <?php 
                                    if($this->session->userdata("user_username"))
                                    {
                                        
                                        $record = $this->md->my_select("tbl_user","*",array("user_id"=>$this->session->userdata("user_username")));
                                        if(isset($record))
                                        {
                                            if($record[0]->profile != "")
                                            {
                                ?>
                                                <img src="<?php echo base_url().$record[0]->profile; ?>" class="rounded-circle user-header-img" alt="userimg"> 
                                <?php
                                            }
                                            else
                                            {
                                ?>
                                                <img class="round" height="20" width="20" avatar="<?php echo $record[0]->name; ?>"/>
                                <?php                
                                            }
                                        }
                                 ?>
                                   <span>Hi, <?php echo ucwords($record[0]->name); ?></span>
                                <?php
                                     
                                    }
                                 ?>
  
                                
                            </a>
                            <div class="user-dropdown">
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url("User-Order"); ?>">
                                            <div class="icon"><i class="flaticon-rewind"></i>
                                            </div> <span class="details">Order</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="order-details.html">
                                            <div class="icon"><i class="flaticon-takeaway"></i>
                                            </div> <span class="details">My Cart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url("User-Favourite"); ?>">
                                            <div class="icon"><i class="flaticon-heart-1"></i>
                                            </div> <span class="details">Favourite</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url("Profile"); ?>">
                                            <div class="icon"><i class="flaticon-user"></i>
                                            </div> <span class="details">Account</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="user-footer"> <span class="text-light-black">Not Name?</span> <a href="<?php echo base_url("User-Logout"); ?>">Sign Out</a>
                                </div>
                            </div>
                            </div>
                            <?php
                                }
                                else
                                {
                            ?>
                        <div class="gem-points">
                            <a href="<?php echo base_url("Log-in"); ?>">
                                <span>LogIn</span>
                            </a>
                        </div>
                         
                            <?php   
                                }
                            ?>
                        
                        <!-- mobile search -->
                        <!-- user notification -->
                        
                        <!-- user notification -->
                        <!-- user cart -->
                       
                        <div class="cart-btn cart-dropdown">
                            <a href="#" class="text-light-green fw-700"> <i class="fas fa-shopping-bag"></i>
                                <span class="user-alert-cart" id="cart_counter"><?php 
                                if($this->session->userdata("user_username"))
                                {
                                         $count = $this->md->my_query("select SUM(qty) as countqty from tbl_addtocart where user_id = ".$this->session->userdata("user_username"))[0]->countqty; 
                                if($count == "")
            {
                echo "0";
            }
            else
            {
                echo $count;
            }
                                }
                                else
                                {
                                    echo "0";
                                }
                               
                                ?></span>
                            </a>
                            <div class="cart-detail-box">
                                <div class="card-header padding-20 fw-700" id="cart_shop_<?php echo $this->session->userdata("user_username"); ?>">
                                        <?php
                                        if($this->session->userdata("user_username"))
                                        {
                                            $cart_detail = $this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = ".$this->session->userdata("user_username"));
                                        if (count($cart_detail) == 0) {
                                            ?>
                                            <a class="emt_cart">Your Order</a>
                                            <hr>
                                            <div class="img_emtcart">
                                                <center> 
                                                    <!-- <img src="<?php echo base_url(); ?>assets/img/emt_cart.png"><br><br> -->
                                                    <p>Your cart is empty.</p>
                                                    <p>Add an item to begin.</p>
                                                </center>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="emt_cart">Your Order</a>
                                            <hr>
                                            <?php
                                            foreach ($cart_detail as $cart) {
                                                ?>
                                                <div class="item-list">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                                        <?php
                                                                    if($cart->category == "Veg")
                                                                    {
                                                                ?>
                                                                <img src="<?php echo base_url(); ?>assets/img/veg-tag.png">
                                                                <?php
                                                                    }
                                                                    elseif($cart->category == "Non veg")
                                                                    {
                                                                 ?>
                                                                <img src="<?php echo base_url(); ?>assets/img/nonvag-tag.png">
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                  ?>
                                                                <img src="<?php echo base_url(); ?>assets/img/ovoveg-tag.png">
                                                                <?php
                                                                    }
                                                                ?>

                                                        </div>
                                                        <div class="col-md-10 item-list-option">
                                                            <p class="product-list-option-name fs-15"><?php echo $cart->item_name; ?></p>
                                                           
                                                            <div class="product-list-qty m-l-t-10">
                                                                <button class="item-list-qty-plus" onclick="qtyincre('<?php echo $cart->item_id; ?>', '<?php echo $cart->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $cart->price; ?>')">+</button>
                                                                <input type="text" value="<?php echo $cart->qty; ?>" id="qty-num-<?php echo $cart->item_id; ?>" class="item-list-qty-number"/>
                                                                <button class="item-list-qty-minus" onclick="qtydecre('<?php echo $cart->item_id; ?>', '<?php echo $cart->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $cart->price; ?>')">-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row cart-food-price">
                                                        <div class="col-md-4 offset-md-2">
                                                            <span class="food-item-price">&#8377; <?php echo $cart->price; ?></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="food-item-price">&#8377; <?php echo $cart->total_price; ?></span>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                   
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <hr>
                                            <div class="cart-footer">
                                                            <div class="row">
                                                                <div class="col-md-6 text-left">
                                                                    <p>Item Total</p>
                                                                    <p>Tax&nbsp;
                                                                    <div class="tooltip bs-tooltip-top" role="tooltip">
                                                                        <div class="arrow"></div>
                                                                                <div class="tooltip-inner">
                                                                                    Some tooltip text!
                                                                                </div>
                                                                            </div>
                                                                    </p>
                                                                    
                                                                                      
                                                                    <p>Delivery Fee</p>
                                                                    

                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <?php
                                                                    $subtotal = $this->md->my_query("select SUM(`total_price`) as subtotal from tbl_addtocart where user_id = " . $this->session->userdata("user_username"))[0]->subtotal;
                                                                    ?>
                                                                    <p>&#8377; <?php echo $subtotal; ?></p>
                                                                    <p>+ &#8377;<?php
                                                                        $tax = round($subtotal * 10 / 100);
                                                                        echo $tax;
                                                                        ?></p>
                                                                            
                                                 
                                                                    <p class="text-color-green">Free</p>
                                                                    

                                                                </div>
                                                                <div class="total-pay-line-1">

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row total-to-pay">
                                                                        <div class="col-md-6">
                                                                            <p class="cart-pay-text">To Pay</p>
                                                                        </div>
                                                                        <div class="col-md-6 text-right">
                                                                            <p class="cart-pay-text">&#8377; <?php 
                                              
                                                        $amount = $subtotal + $tax;
                                                    
                                                echo $amount;
                                                ?></p>
                                                                        </div>    
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 cart-footer-button" >
                                                                    <a href="<?php echo base_url("Order-review"); ?>" class="form-control">Proceed To Checkout</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <?php
                                        }
                                        ?>
                                        <?php    
                                        }
                                        else
                                        {
                                            ?>
                                            <a class="emt_cart">Your Order</a>
                                            <hr>
                                            <div class="img_emtcart">
                                                <center> 
                                                    <img src="<?php echo base_url(); ?>assets/img/emt_cart.png"><br><br>
                                                    <p>Your cart is empty.</p>
                                                    <p>SignIn or SignUp to Add an item in cart.</p>
                                                </center>
                                            </div>
                                         <?php   
                                        }
                                        ?>
                     
                                    </div>
                            </div>
                        </div>
                        
                        
                        <!-- user cart -->
                    </div>
                </div>
                <div class="col-sm-12 mobile-search">
                    <div class="mobile-address">
                        <a href="#" class="delivery-add" data-toggle="modal" data-target="#address-box"> <span class="address">Location</span>
                        </a>
                    </div>
                    <div class="sorting-addressbox"> <span class="full-address text-light-green">Pizza burger</span>
                        <div class="btns">
                            <div class="filter-btn">
                                <button type="button"><i class="fas fa-sliders-h text-light-green fs-18"></i>
                                </button> <span class="text-light-green">Sort</span>
                            </div>
                            <div class="filter-btn">
                                <button type="button"><i class="fas fa-filter text-light-green fs-18"></i>
                                </button> <span class="text-light-green">Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>