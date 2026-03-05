<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="#">
        <meta name="description" content="#">
        <title><?php echo $restaurent_detail[0]->restaurant_name; ?> | MUNCHBOX-The Foodies Food</title>

        <?php
        $this->load->view("CSS");
        ?>

    </head>

    <body>
        <!-- Navigation -->
        <div class="header">
            <?php
            $this->load->view("header");
            ?>
        </div>
        <div class="main-sec"></div>
        <!-- Navigation -->
        <!-- restaurent top -->
        <div class="page-banner p-relative smoothscroll fixed-top" id="menu" style="height: 400px;z-index: 1">
            <img src="<?php echo base_url(); ?>assets/img/banner.jpg" class="img-fluid full-width" alt="banner">
            <div class="overlay-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading padding-tb-10">
                            <h3 class="text-light-black title fw-700 no-margin">
                                <?php
                                if ($restaurent_detail[0]->restaurant_name  != "") {
                                    echo $restaurent_detail[0]->restaurant_name ;
                                } else {
                                    echo "Data not inserted";
                                }
                                ?>
                            </h3>
                            <p class="text-light-black sub-title no-margin">
                                <?php
                                if (count($restaurent_address_detail) != 0) {
                                    echo $restaurent_address_detail[0]->area;
                                } else {
                                    echo "Area";
                                }
                                ?> &longrightarrow; 
                                <?php
                                if (count($restaurent_address_detail) != 0) {
                                    echo $restaurent_address_detail[0]->city;
                                } else {
                                    echo "City";
                                }
                                ?> &longrightarrow; 
                                <?php
                                if (count($restaurent_address_detail) != 0) {
                                    echo $restaurent_address_detail[0]->state;
                                } else {
                                    echo "State";
                                }
                                ?>
                                <span></span>
                            </p>
                            <p class="text-light-black sub-title no-margin"><a href="mailto:<?php
                                if ($restaurent_detail[0]->email != "") {
                                    echo $restaurent_detail[0]->email;
                                } else {
                                    echo "Data not inserted";
                                }
                                ?> " style="color: black">
                                    <i class="fa fa-envelope" style="margin-right: 0.5%;"></i>
                                    <?php
                                    if ($restaurent_detail[0]->email != "") {
                                        echo $restaurent_detail[0]->email;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>
                                </a>
                                <a style="margin-left: 1%;color: black;" href="tel:<?php
                                if ($restaurent_detail[0]->contact_no != "") {
                                    echo $restaurent_detail[0]->contact_no;
                                } else {
                                    echo "Data not inserted";
                                }
                                ?>">
                                    <i class="fa fa-phone-alt" style="margin-right: 0.5%"></i>
                                    <?php
                                    if ($restaurent_detail[0]->contact_no != "") {
                                        echo $restaurent_detail[0]->contact_no;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>
                                </a>
                            </p>

                            <div class="head-rating">
                                <div class="rating"> 
                                    <?php
                                    $cnt_star = round($star_rating[0]->rate_star);
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $cnt_star) {
                                            ?>
                                            <span class="text-yellow fs-16">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="text-dark-white fs-16">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <span class="fs-12 text-light-black"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                                </div>
                                <div class="product-review">
                                    <div class="restaurent-details-mob">
                                        <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>
                                    <div class="restaurent-details-mob">
                                        <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>
                                    <div class="restaurent-details-mob">
                                        <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>
                                    <div class="restaurent-details-mob">
                                        <a href="#"> <span class="text-light-black"><i class="fas fa-info-circle"></i></span>
                                            <span class="text-dark-white">info</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="restaurent-logo" style="margin-left: 40%;">
                            <img src="<?php echo base_url() . $restaurent_detail[0]->coverpic; ?>" class="img-fluid" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- restaurent top -->
        <!-- restaurent details -->
        <!-- restaurent details -->
        <!-- restaurent tab -->
        <div class="restaurent-tabs u-line">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="restaurent-menu scrollnav">
                            <ul class="nav nav-pills">
                                <!-- <li class="nav-item"> <a class="nav-link active text-light-white fw-700" data-toggle="pill" href="#menu">Menu</a> -->
                                </li>
                                <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#food">Food Item</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#about">About</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#review">Reviews</a>
                                </li>
                                <!-- <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#mapgallery">Map & Gallery</a> -->
                                </li>
                            </ul>
                            <div class="add-wishlist">
                                <button id="btn_wishlist_<?php echo $restaurent_detail[0]->restaurant_id; ?>" data-target="#wishlistmodal" onclick="<?php
                                if ($this->session->userdata("user_username")) {
                                    ?>

                                                    wishlist('<?php echo $restaurent_detail[0]->restaurant_id; ?>', 'Restaurant');
                                    <?php
                                } else {
                                    ?>
                                                    call_wishlist_modal('<?php echo $restaurent_detail[0]->restaurant_id; ?>');
                                    <?php
                                }
                                ?>">
                                            <?php
                                            $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $restaurent_detail[0]->restaurant_id, "type" => "Restaurant")));
                                            if ($query == 1) {
                                                ?>

                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $restaurent_detail[0]->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">

                                        <?php
                                    } else {
                                        ?>
                                        <img id="add-wishlist-Restaurant-heart-image-<?php echo $restaurent_detail[0]->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg"  title="Add To Favourite" alt="tag">
                                        <?php
                                    }
                                    ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- restaurent tab -->

        <div class="container">
            <div class="row check_menu">

                <!-- <div class="col-md-6 menu_detail">
                    <center>
                        <h4>What's my favourite food?</h4>
                        <img src="<?php echo base_url(); ?>assets/img/arrow4.png">
                        <h4>One you order out.</h4>
                    </center>
                </div> -->
                <!-- <div class=" menu_order col-md-6">

                    <a href="<?php echo base_url(); ?>Menu"><img src="<?php echo base_url(); ?>assets/img/menu-cover1.jpg"></a>
                    <div class="menu_text" >

                        <p class="text-center"><?php echo $restaurent_detail[0]->restaurant_name; ?></p>
                        <img src="<?php echo base_url(); ?>assets/img/menu-chef.png">
                    </div>


                </div> -->


            </div>
        </div>


        <!-- restaurent meals -->
        <section class="section-padding restaurent-meals bg-light-theme">
            <div class="container-fluid" id="food">
                <div class="row">

                    <div class="col-xl-12 col-lg-12" >
                        <div class="row">
                            <div class="col-xl-3 col-lg-3" >
                                <div class="card sidebar-card">

                                    <div class="user-menu scrollnav">
                                    <ul class="nav-pills">
                                        <li class="user-menu-li">Prices</li>
                                        <li class="display-none"><a href="" class="active-cuisin ">Search Result</a></li>
                                        <?php 
                                        $c = 0;
                                            foreach($food_menu_cuisin as $single)
                                            {
                                                $c++;
                                        ?>
                                        <li><a  href="#it_<?php echo $single->category_id; ?>"  class="<?php
                                            
                                        ?>"><?php echo  $single->name;?></a></li>
                                        <?php
                                            }
                                        ?>

                                    </ul>
                                </div>
                                </div>
                            </div>

                            <div class="col-lg-6 restaurent-meal-head mb-md-40" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header background-header-card padding-left-none">
                                            <div class="section-header-left">
                                                <h3 class="text-light-black header-title">
                                                    <a class=" text-light-black no-margin" >
                                                        Our Best Food 
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="user-line">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 m-b-10 padding-right-none">
                                                    <div class="sb-example-3">
                                                        <!-- partial:index.partial.html -->
                                                        <div class="search__container">

                                                            <input class="search__input" type="text" placeholder="Search" onkeyup="findfood(this.value, '<?php echo $restaurent_detail[0]->restaurant_id ?>')">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card" id="search_food_item">
                              
                                    <div id="">
                                        <div class="card-body no-padding">
                                            <div class="row <?php
                                                if(count($food_item_count) >= 5)
                                                {
                                                    echo "food-item-scroll";
                                                }
                                                
                                            
                                            ?>">

                                               
                                                <?php
                                                    foreach($food_menu_cuisin as $single)
                                                    {
                                                        $food_item = $this->md->my_query("select cat.name as category,subcat.name,item.* from tbl_category as cat ,tbl_category as subcat,tbl_item as item where item.restaurant_id = ".$this->uri->segment(2)." and subcat.category_id = item.category_id and subcat.category_id = ".$single->category_id." and cat.category_id = subcat.parent_id and status = 1 order by subcat.name")
                                                ?>
                                                <div class="col-md-12 food-category-detail-heading" id="it_<?php echo $single->category_id; ?>">
                                                    <h4><?php echo ucwords($single->name); ?></h4>
                                                    <p><?php echo count($food_item); ?> Item</p>
                                                </div>
                                                 <?php
                                                foreach ($food_item as $data) {
                                                    ?>
                                                <div class="col-lg-12" >
                                                        <div class="restaurent-product-list">
                                                            <div class="restaurent-product-detail">
                                                                <div class="restaurent-product-left">
                                                                    <div class="restaurent-product-title-box">
                                                                        <div class="restaurent-product-box">
                                                                            <div class="restaurent-product-title">
                                                                                <h6 class="mb-2" data-toggle="modal" data-target="#restaurent-popup"><a href="javascript:void(0)" class="text-light-black fw-600"><?php echo $data->item_name; ?></a></h6>
                                                                                <p class="font-item-prize-style">&#8377; <?php echo $data->price; ?></p>
                                                                            </div>
                                                                            <div class="restaurent-product-label">
                                                                                <?php
                                                                                if ($data->category == "Veg") {
                                                                                    ?>
                                                                                    <span class="rectangle-tag product-label-veg">Veg</span>
                                                                                    <?php
                                                                                } elseif ($data->category == "Non veg") {
                                                                                    ?>
                                                                                    <span class="rectangle-tag product-label-non-veg">Good</span>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <span class="rectangle-tag product-label-ovo-veg-tag">Excellent</span>
                                                                                    <?php
                                                                                }
                                                                                ?>




                                                                                        <!--<span class="rectangle-tag bg-dark text-custom-white">Combo</span>-->
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="restaurent-product-caption-box"> 
                                                                        <span class="text-light-white"><?php echo $data->name; ?></span>
                                                                        <?php
                                                                        $record_cart_button = $this->md->my_select("tbl_addtocart", "*", array("item_id" => $data->item_id, "user_id" => $this->session->userdata("user_username"), "restaurant_id" => $data->restaurant_id));
                                                                        if (count($record_cart_button) == 0) {
                                                                            ?>
                                                                            <button class = "btn btn-product-add" data-target = "#cartmodal" id = "add-product-<?php echo $data->item_id; ?>" onclick ="
                                                                            <?php
                                                                            if (!$this->session->userdata("user_username")) {
                                                                                ?>
                                                                                        call_cartmodal('<?php echo $data->item_id ?>');
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                        viewqty('<?php echo $data->item_id; ?>', '<?php echo $data->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $data->price; ?>')
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                                    ">
                                                                                Add +
                                                                            </button>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <div class="item-list-qty" style="text-align: right;" id="product-qty-<?php echo $data->item_id; ?>">
                                                                                <button class="item-list-qty-plus" id="qty-plus" value="<?php echo $data->item_id; ?>" onclick="qtyincre('<?php echo $data->item_id; ?>', '<?php echo $data->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $data->price; ?>')">+</button>
                                                                                <input type="text" id="qty-num-product-<?php echo $data->item_id; ?>" value="<?php
                                                                                if ($record_cart_button[0]->qty == 0) {
                                                                                    echo "1";
                                                                                } else {
                                                                                    echo $record_cart_button[0]->qty;
                                                                                }
                                                                                ?>" class="item-list-qty-number"/>
                                                                                <button class="item-list-qty-minus" id ="qty-minus" value="<?php echo $data->item_id; ?>" onclick="qtydecre('<?php echo $data->item_id; ?>', '<?php echo $data->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $data->price; ?>')" >-</button>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <button class = "btn btn-product-add" style="display: none;" data-target = "#cartmodal" id = "add-product-<?php echo $data->item_id; ?>" onclick = "
                                                                        <?php
                                                                        if (!$this->session->userdata("user_username")) {
                                                                            ?>
                                                                                    call_cartmodal('<?php echo $data->item_id ?>');
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                                    viewqty('<?php echo $data->item_id; ?>', '<?php echo $data->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $data->price; ?>')
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                                ">
                                                                            Add +
                                                                        </button>
                                                                    </div>
                                                                    <div class="restaurent-tags-price">

                                                                        <button id="btn_wishlist_<?php echo $data->item_id ?>" data-target="#wishlistmodal" onclick="<?php
                                                                        if ($this->session->userdata("user_username")) {
                                                                            ?>

                                                                                    wishlist('<?php echo $data->item_id; ?>', 'Item');
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                                    call_wishlist_modal('<?php echo $data->item_id; ?>');
                                                                            <?php
                                                                        }
                                                                        ?>">
                                                                                    <?php
                                                                                    $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $data->item_id, "type" => "Item")));
                                                                                    if ($query == 1) {
                                                                                        ?>
                                                                                <span class="circle-tag ">
                                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                                                </span>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <span class="circle-tag">
                                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg"  title="Add To Favourite" alt="tag">
                                                                                </span>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </button>

                                                                        <div class="item-list-qty" style="text-align: right;display: none;" id="product-qty-<?php echo $data->item_id; ?>">
                                                                            <button class="item-list-qty-plus" id="qty-plus" value="<?php echo $data->item_id; ?>" onclick="qtyincre('<?php echo $data->item_id; ?>', '<?php echo $data->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $data->price; ?>')">+</button>
                                                                            <input type="text" id="qty-num-product-<?php echo $data->item_id; ?>" value="1" class="item-list-qty-number"/>
                                                                            <button class="item-list-qty-minus" id ="qty-minus" value="<?php echo $data->item_id; ?>" onclick="qtydecre('<?php echo $data->item_id; ?>', '<?php echo $data->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $data->price; ?>')" >-</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                if ($data->image != "") {
                                                                    ?>
                                                                    <div class="restaurent-product-img">
                                                                        <img src="<?php echo base_url() . $data->image; ?>" class="img-fluid" alt="#">
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>

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
                            <div class="col-xl-3 col-lg-3">
                                <div class="sidebar">
                                    <!--                            <div class="video-box mb-xl-20">
                                                                    <div class="video_wrapper video_wrapper_full js-videoWrapper">
                                                                    </div>
                                                                    <div class="discount-box main-box padding-tb-10">
                                                                        <div class="discount-price padding-10">
                                                                            <div class="left-side">
                                                                                <h6 class="text-light-black fw-600 no-margin">Watch Now and get 50% discount</h6>
                                                                                <p class="text-light-white no-margin">The hung-over foody (2019)</p>
                                                                            </div>
                                                                            <div class="right-side justify-content-end">
                                                                                <div class="dis-text">
                                                                                    <span class="badge bg-light-green text-custom-white fw-400">Discount</span>
                                                                                    <h4 class="text-light-black no-margin">50%</h4>
                                                                                </div>
                                                                                <a href="restaurent.html">
                                                                                    <img src="<?php echo base_url(); ?>assets/img/logo-3.jpg" class="img-fluid" alt="logo">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                    
                                                                    </div>
                                                                </div>-->
                                    <div class="cart-detail-box cart-detail-box-restaurant">
                                        <div class="card">
                                            <div class="card-header padding-15 fw-700" id="cart_<?php echo $this->session->userdata("user_username"); ?>">
                                                <?php
                                                if ($this->session->userdata("user_username")) {
                                                    $cart_detail = $this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = " . $this->session->userdata("user_username"));
                                                    if (count($cart_detail) == 0) {
                                                        ?>
                                                        <a class="emt_cart">Your Order</a>
                                                        <hr>
                                                        <div class="img_emtcart">
                                                            <center> 
                                                                <img src="<?php echo base_url(); ?>assets/img/emt_cart.png"><br><br>
                                                                <p>Your cart is empty.</p>
                                                                <p>Add an item to begin.</p>
                                                            </center>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a class="emt_cart">Your Order</a>
                                                        <hr>
                                                        <div class="side-cart-item <?php
                                                        if (count($cart_detail) >= 3) {
                                                            echo "cart-item-scroll";
                                                        }
                                                        ?>">
                                                                 <?php
                                                                 foreach ($cart_detail as $cart) {
                                                                     ?>
                                                                <div class="item-list margin-top-10">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
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
                                                                        <div class="col-md-10 item-list-option">
                                                                            <p class="item-list-option-name"><?php echo $cart->item_name; ?></p>
<!--                                                                            <p class ="item-list-option-option">Option-Fanta[200 ml],Sprite[300 ml]</p>-->
                                                                            <div class="item-list-qty">
                                                                                <button class="item-list-qty-plus" onclick="qtyincre('<?php echo $cart->item_id; ?>', '<?php echo $cart->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $cart->price; ?>')">+</button>
                                                                                <input type="text" value="<?php echo $cart->qty; ?>" id="qty-num-<?php echo $cart->item_id; ?>" class="item-list-qty-number"/>
                                                                                <button class="item-list-qty-minus" onclick="qtydecre('<?php echo $cart->item_id; ?>', '<?php echo $cart->restaurant_id; ?>', '<?php echo $this->session->userdata("user_username"); ?>', '<?php echo $cart->price; ?>')">-</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row cart-food-price">
                                                                        <div class="col-md-4  offset-md-2">
                                                                            <span class="food-item-price">&#8377;<?php echo $cart->price." x ".$cart->qty; ?></span>
                                                                        </div>
                                                                        <div class="col-md-6 text-right">
                                                                            <span class="food-item-price">&#8377;<?php echo $cart->total_price; ?></span>
                                                                        </div>

                                                                    </div>  

                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
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
                                                } else {
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
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>   
        </section>
        <!-- restaurent meals -->
        <!-- restaurent about -->
        <section class="section-padding restaurent-about smoothscroll" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-light-black fw-700 title"><?php echo ucwords($restaurent_detail[0]->restaurant_name); ?></h3>
                        <p class="text-light-green no-margin">Services Category Provided By Us</p>
                        <!-- <p class="text-light-white no-margin"><?php echo ucwords($restaurent_detail[0]->category); ?></p>  -->
                        <div class="rating"> 
                            <?php
                            $cnt_star = round($star_rating[0]->rate_star);
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $cnt_star) {
                                    ?>
                                    <span class="text-yellow fs-16">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="text-dark-white fs-16">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <?php
                                }
                            }
                            ?>



                        </div>
                        <ul class="about-restaurent">

                            <li> <i class="fas fa-phone-alt"></i>
                                <span><a href="tel:<?php
                                    if ($restaurent_detail[0]->contact_no != "") {
                                        echo $restaurent_detail[0]->contact_no;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>" class="text-light-white">
                                         <?php
                                         if ($restaurent_detail[0]->contact_no != "") {
                                             echo $restaurent_detail[0]->contact_no;
                                         } else {
                                             echo "Data not inserted";
                                         }
                                         ?>
                                    </a></span>
                            </li>
                            <li> <i class="far fa-envelope"></i>
                                <span><a href="mailto:<?php
                                    if ($restaurent_detail[0]->email != "") {
                                        echo $restaurent_detail[0]->email;
                                    } else {
                                        echo "Data not inserted";
                                    }
                                    ?>" class="text-light-white">
                                         <?php
                                         if ($restaurent_detail[0]->email != "") {
                                             echo $restaurent_detail[0]->email;
                                         } else {
                                             echo "Data not inserted";
                                         }
                                         ?>
                                    </a></span>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-6">
                        <div class="restaurent-schdule">
                            <div class="card">
                                <div class="card-header text-light-white fw-700 fs-16">Available Service Timing</div>
                                <div class="card-body">
                                    <?php 
                                         foreach($schedule_details as $single)
                                         {
                                    ?>
                                    <div class="schedule-box">
                                        <div class="day text-light-black"><?php echo $single->day_name; ?></div>
                                        <div class="time text-light-black">Available: <?php echo date("h:ia",strtotime($single->open_time));?> - <?php echo date("h:ia",strtotime($single->close_time));?></div>
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
        </section>
        <!-- restaurent about -->
        <!-- map gallery -->
        <!-- <div class="map-gallery-sec section-padding bg-light-theme smoothscroll" id="mapgallery">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-box">
                            <div class="row">
                                <div class="col-md-12 map-pr-0">
                                    <iframe id="locmap" class="locmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.942535551661!2d72.86207421488687!3d21.234127185887505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f1a6f801b9f%3A0xf9141eda48610fdb!2sNova%20One%20Click%20Solution!5e0!3m2!1sen!2sin!4v1575889003656!5m2!1sen!2sin" style="height:500px;"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- map gallery -->
        <!-- restaurent reviews -->
        <section class="section-padding restaurent-review smoothscroll" id="review">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title">Reviews for <?php echo ucwords($restaurent_detail[0]->restaurant_name); ?></h3>
                        </div>
                        <div class="restaurent-rating mb-xl-20">
                            <div class="star"> 

                                <?php
                                $cnt_star = round($star_rating[0]->rate_star);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $cnt_star) {
                                        ?>
                                        <span class="text-yellow fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="text-dark-white fs-16">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <span class="fs-12 text-light-black"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                        </div>

                        <div class="u-line"></div>
                    </div>
                    <div class="col-md-12 <?php
                    if (count($review_rating) >= 3) {
                        echo "review-scroll";
                    }
                    ?>">

                        <?php
                        foreach ($review_rating as $single) {
                            ?>
                            <div class="review-box">
                                <div class="review-user">
                                    <div class="review-user-img">
                                        <?php
                                        if ($single->profile != "") {
                                            ?>
                                            <img src="<?php echo base_url() . $single->profile; ?>" class="rounded-circle review-user-img-icon" alt="userimg"> 
                                            <?php
                                        } else {
                                            ?>
                                            <img class="round" height="30" width="30" avatar="<?php echo substr($single->name, 0, 1); ?>">
                                            <?php
                                        }
                                        ?>           

                                        <div class="reviewer-name">
                                            <p class="fs-17 text-light-black fw-600 font-size-27"><?php echo ucwords($single->name); ?></p>
                                        </div> 
                                    </div>
                                    <div class="review-date"> <span class="text-light-white"><?php echo date("M d,Y", strtotime($single->date)); ?></span>
                                    </div>
                                </div>
                                <div class="ratings"> 
                                    <?php
                                    $cnt_star = round($single->rating);
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $cnt_star) {
                                            ?>
                                            <span class="text-yellow fs-16">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="text-dark-white fs-16">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                                <p class="text-light-black"><?php echo ucfirst($single->review); ?></p> 
                            <!--<span class="text-light-white fs-12 food-order">Kathy-->

                                <!--                            <ul class="food">
                                                                <li>
                                                                    <button class="add-pro bg-gradient-red">Coffee <span class="close">+</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="add-pro bg-dark">Pizza <span class="close">+</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="add-pro bg-gradient-green">Noodles <span class="close">+</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="add-pro bg-gradient-orange">Burger <span class="close">+</span>
                                                                    </button>
                                                                </li>
                                                            </ul>-->
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="col-12">
                        <div class="review-img">
                            <img src="<?php echo base_url(); ?>assets/img/review-footer.png" class="img-fluid" alt="#">
                            <div class="review-text">
                                <h2 class="text-light-white mb-2 fw-600">Be one of the first to review</h2>
                                <p class="text-light-white">Order now and write a review to give others the inside scoop.</p>

                                <?php
                                if ($this->session->userdata("user_username")) {
                                    ?>
                                    <div class="rating plugin-rating" title="Give Rating On Restaurant"> 
                                        <span class="fs-31 text-dark-white rating-star-1" id="star-value">
                                            <i class="fas fa-star" onmouseover="ratingstar(1)"></i>
                                        </span>
                                        <span class="fs-31 text-dark-white rating-star-2" id="star-value">
                                            <i class="fas fa-star" onmouseover="ratingstar(2)"></i>
                                        </span>
                                        <span class="fs-31 text-dark-white rating-star-3" id="star-value">
                                            <i class="fas fa-star" onmouseover="ratingstar(3)"></i>
                                        </span>
                                        <span class="fs-31 text-dark-white rating-star-4" id="star-value">
                                            <i class="fas fa-star" onmouseover="ratingstar(4)"></i>
                                        </span>
                                        <span class="fs-31 text-dark-white rating-star-5" id="star-value">
                                            <i class="fas fa-star" onmouseover="ratingstar(5)"></i>
                                        </span>

                                    </div>
                                    <input type="text" class="form-control" placeholder="<?php echo ucfirst($user_detail[0]->name); ?>" readonly="">
                                    <br>
                                    <textarea class="visitor_review form-control" rows="8" id="review_visitor" placeholder="Please Enter Your Review"></textarea>
                                    <p class="text-light-white" id="review_message"></p>
                                    <button class="btn-reorder" onclick="insert_review('<?php echo $restaurent_detail[0]->restaurant_id; ?>');">Give Review</button>
                                    <?php
                                } else {
                                    ?>
                                    <p class="text-light-white">For giving review please <a href ="<?php echo base_url("Log-in"); ?>">LogIn/Sign Up</a> first</p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- restaurent reviews -->
        <!-- offer near -->
<!--        <section class="fresh-deals section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title">Offers near you</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="fresh-deals-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="restaurant.html">
                                                <img src="<?php echo base_url(); ?>assets/img/restaurants/255x150/shop-10.jpg" class="img-fluid full-width" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Great Burger</a></h6>
                                            </div>
                                            <p class="text-light-white">American, Fast Food</p>
                                            <div class="product-details">
                                                <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                    <span class="text-light-white price">$10 min</span>
                                                </div>
                                                <div class="rating"> <span>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                    </span>
                                                    <span class="text-light-white text-right">4225 ratings</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-footer-2">
                                            <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                            </div>
                                            <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="restaurant.html">
                                                <img src="<?php echo base_url(); ?>assets/img/restaurants/255x150/shop-11.jpg" class="img-fluid full-width" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Flavor Town</a></h6>
                                            </div>
                                            <p class="text-light-white">Breakfast, Lunch & Dinner</p>
                                            <div class="product-details">
                                                <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                    <span class="text-light-white price">$10 min</span>
                                                </div>
                                                <div class="rating"> <span>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                    </span>
                                                    <span class="text-light-white text-right">4225 ratings</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-footer-2">
                                            <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                            </div>
                                            <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="restaurant.html">
                                                <img src="<?php echo base_url(); ?>assets/img/restaurants/255x150/shop-22.jpg" class="img-fluid full-width" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Big Bites</a></h6>
                                            </div>
                                            <p class="text-light-white">Pizzas, Fast Food</p>
                                            <div class="product-details">
                                                <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                    <span class="text-light-white price">$10 min</span>
                                                </div>
                                                <div class="rating"> <span>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                    </span>
                                                    <span class="text-light-white text-right">4225 ratings</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-footer-2">
                                            <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                            </div>
                                            <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="restaurant.html">
                                                <img src="<?php echo base_url(); ?>assets/img/restaurants/255x150/shop-23.jpg" class="img-fluid full-width" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Smile N’ Delight</a></h6>
                                            </div>
                                            <p class="text-light-white">Desserts, Beverages</p>
                                            <div class="product-details">
                                                <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                    <span class="text-light-white price">$10 min</span>
                                                </div>
                                                <div class="rating"> <span>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                    </span>
                                                    <span class="text-light-white text-right">4225 ratings</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-footer-2">
                                            <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                            </div>
                                            <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="restaurant.html">
                                                <img src="<?php echo base_url(); ?>assets/img/restaurants/255x150/shop-24.jpg" class="img-fluid full-width" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Lil Johnny’s</a></h6>
                                            </div>
                                            <p class="text-light-white">Continental & Mexican</p>
                                            <div class="product-details">
                                                <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                    <span class="text-light-white price">$10 min</span>
                                                </div>
                                                <div class="rating"> <span>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                    </span>
                                                    <span class="text-light-white text-right">4225 ratings</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-footer-2">
                                            <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                            </div>
                                            <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Add Arrows 
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <!-- offer near -->
        <!-- footer -->
        <?php
        $this->load->view("footer");
        ?>
        <!-- Modal -->
      
        <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="text-center wishlist-model-box">
                        <h3>Ooops! You Are Not Log In. </h3>
                    </div>
                    <div class="mb-20">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/login_cart.png" class="log-out-user">
                        </center>
                    </div>
                    <div class="wishlist-model-msg">
                        <h6 class="text-center">To place your order now, log in to your existing account or sign up.</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-product-add" ><a href="<?php echo base_url("Log-in"); ?>" class="text-white"><img src="<?php echo base_url(); ?>assets/img/block-user.png" class="wishlist-log-in-icon"> &nbsp;Go To Log In</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="wishlistmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="text-center wishlist-model-box">
                        <h3>Ooops! You Are Not Log In. </h3>
                    </div>
                    <div class="mb-20">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/login.png" class="log-out-user">
                        </center>
                    </div>
                    <div class="wishlist-model-msg">
                        <h6 class="text-center">If you want to add your favourite restaurant or food then, log in to your existing account or sign up. </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-product-add" ><a href="<?php echo base_url("Log-in"); ?>" class="text-white"><img src="<?php echo base_url(); ?>assets/img/block-user.png" class="wishlist-log-in-icon"> &nbsp;Go To Log In</a></button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Wishlist Like & Dislike Message Box Code START -->    
        <div class="add-wishlist-msg ">
            <p></p>
        </div>
        <?php
            if($restaurent_detail[0]->service_status == "closed")
            {
        ?>
        <!-- <div class="restaurant-closed-msg">
            <div class="row">
                <div class="col-md-2 padding-right-none padding-left-none">
                <img src="<?php echo base_url(); ?>assets/img/res-closed.png">
                </div>
                <div class="col-md-10 padding-right-none ">
                    <p>Restaurant is Currently Closed</p>
                    <p><b>Check tommorow for place order.</b></p>
                </div>
            </div>
            
        </div> -->
<?php        
            }
        ?>
        
        <!-- Wishlist Like & Dislike Message Box Code END -->    

        <div class="already-added" id="already-added">
            <h5 class="text-light-black">Items already in cart </h5>
            <p>Your cart contains items from other restaurant. Would you like to reset your<br> cart for adding items from this restaurant?</p>
            <div class="row already-added-button-row">
                <div class="offset-md-1 col-md-5 btn-no-cart" id="btn-no-cart" onclick="remove_cart_item('no')">
                    <button >No</button>
                </div>
                <div class="offset-md-1 col-md-5 btn-yes-cart" id="btn-yes-cart" onclick="remove_cart_item('yes', '<?php echo $this->session->userdata('user_username'); ?>')">
                    <button>Yes, Refresh Cart</button>
                </div>
            </div>
        </div>

        <?php
        $this->load->view("footerscript");
        ?>
        <script src="<?php echo base_url() ?>assets/js/munchbox.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/less.min.js" type="text/javascript"></script>
        <script>
                $(document).ready(function() {
		$('a[href*=#]').bind('click', function(e) {
				e.preventDefault(); // prevent hard jump, the default behavior

				var target = $(this).attr("href"); // Set the target as variable

				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: $(target).offset().top
				}, 600, function() {
						location.hash = target; //attach the hash (#jumptarget) to the pageurl
				});

				return false;
                    });
                });
                $(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();
        		$('.fooditem-section').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
                                    $('.sidebar-card .user-menu ul li a.active-cuisin').removeClass('active-cuisin');
                                    $('.sidebar-card .user-menu ul li a').eq(i).addClass('active-cuisin');
				}
		});
             }).scroll();
        </script>
        <!-- footer -->
    </body>
</html>