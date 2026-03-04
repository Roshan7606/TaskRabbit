<?php
class Backend extends CI_Controller
{
    
    public function city()
    {
       $action=$this->input->post('action');    
       $id=$this->input->post('id');    
       if($action=='city')
       {
           $wh["parent_id"] = $id;
           $wh["label"] = $action;
           $query="select * from tbl_location where parent_id='".$id."' and label='".$action."'";
           $recordset=$this->md->my_query($query);
           print_r($recordset);
           echo '<option value="">Select City</option>';
           foreach($recordset as $data)
           {
               ?>
                    <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
              <?php
           }
       }
    }
    public function findfood()
    {
        $id = $this->input->post("id");
        if($this->input->post("action") == "yes")
        {
            if($this->input->post("search")=="")
            {
                 $query = "select cat.name as category,subcat.name,item.* from tbl_category as cat ,tbl_category as subcat,tbl_item as item where item.restaurant_id = ".$id." and subcat.category_id = item.category_id and cat.category_id = subcat.parent_id and status = 1";
                 $food_item = $this->md->my_query($query); 
            }
            else
            {
               $name="%".$this->input->post("search")."%";
                $query = "select cat.name as category,subcat.name,item.* from tbl_category as cat ,tbl_category as subcat,tbl_item as item where item.restaurant_id = ".$id." and item.tags like '".$name."' and subcat.category_id = item.category_id and cat.category_id = subcat.parent_id and status = 1";
                $food_item = $this->md->my_query($query);
            }
        }
        else
        {
            $query = "select cat.name as category,subcat.name,item.* from tbl_category as cat ,tbl_category as subcat,tbl_item as item where item.restaurant_id = ".$id." and subcat.category_id = item.category_id and cat.category_id = subcat.parent_id and status = 1";
                 $food_item = $this->md->my_query($query);
        }
        if(count($food_item) == 0)
        {
        ?>
                    <div class="no-search-found">
                                        <center>
                                            <h4>Search Result</h4>
                                            <img src="<?php echo base_url(); ?>assets/img/no_found.png">
                                            <p>We couldn’t find any items matching your search. Please try a new keyword.<p>
                                                <input type="hidden" value="no" id="food-item-not-found">   
                                        </center>
                                    </div>
                    
        <?php            
        }
        else
        {
        ?>
                    <div id="">
                                        <div class="card-body no-padding">
                                            <div class="row <?php
                                            if (count($food_item) > 5) {
                                                echo "food-item-scroll";
                                            }
                                            ?>">
                                                <div class="col-md-12 food-category-detail-heading">
                                                    <h4>Search Result</h4>
                                                    <p><?php echo count($food_item); ?> Item</p>
                                                </div>
                                                <?php
                                                foreach ($food_item as $data) {
                                                    ?>
                                                    <div class="col-lg-12">
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
                                                                                    <span class="rectangle-tag product-label-non-veg">Non-Veg</span>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <span class="rectangle-tag product-label-ovo-veg-tag">Ovo-Veg</span>
                                                                                    <?php
                                                                                }
                                                                                ?>




                                                                                        <!--<span class="rectangle-tag bg-dark text-custom-white">Combo</span>-->
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="restaurent-product-caption-box"> 
                                                                        <span class="text-light-white"><?php echo $data->description; ?></span>
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

                                                                        <button id="btn_wishlist_<?php echo $data->item_id; ?>" data-target="#wishlistmodal" onclick="<?php
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
                                                ?>
                                            </div>
                                        </div>
                                    </div>
        <?php            
        }
    }
    public function area()
    {
       $action=$this->input->post('action');    
       $id=$this->input->post('id');    
       if($action=='area')
       {
           $wh["parent_id"] = $id;
           $wh["label"] = $action;
           $recordset=$this->md->my_select('tbl_location','*',$wh);
           echo '<option value="">Select Area</option>';
           foreach($recordset as $data)
           {
               ?>
                    <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
               <?php
           }
       }
    }
    public function sendemail()
    {
        if($this->input->post("email"))
        {
            $ins["email_id"] = 0;
            $ins["email"] = $this->input->post("email");
            echo $this->md->my_insert("tbl_email_subscriber",$ins);
        }
        else
        {
            echo "emp_error";
        }
    }
    public function remove_wishlist()
    {
        if($this->input->post("type")=="item")
        {
            $wh['type']="Item";
            $wh['favourite_id']=$this->input->post("id");
            $res=$this->md->my_delete("tbl_favourite",$wh);
            if($res==1)
            {
                $food_item = $this->md->my_query("select res.restaurant_id,res.restaurant_name,cat.name as category,subcat.name,item.*,fav.favourite_id from tbl_restaurant as res, tbl_favourite as fav ,tbl_category as cat ,tbl_category as subcat,tbl_item as item where subcat.category_id = item.category_id and cat.category_id = subcat.parent_id and item.status = 1 and fav.type = 'Item' and res.restaurant_id = item.restaurant_id and item.item_id = fav.reference_id and fav.user_id = ".$this->session->userdata("user_username")." order by subcat.name");
                if(count($food_item) == 0)
                {
                ?>
               <div class="wishlist-empty">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/empty_favorites_food_wishlist.png">
                        <h3>Where is the love?</h3>
                        <h6>Once you favourite a food, it will appear here.</h6>
                    </center>
                </div>

                <?php
                }
                else
                {
                    foreach ($food_item as $data) 
                    {
                    ?>
                    <div class="col-lg-12 m-b-9">
                                                        <div class="restaurent-product-list">
                                                            <div class="restaurent-product-detail">
                                                                <div class="restaurent-product-left">
                                                                    <div class="restaurent-product-title-box">
                                                                        <div class="restaurent-product-box">
                                                                            <div class="restaurent-product-title">
                                                                                <h5 class="m-b-9"><a class="text-light-black fw-500" href="<?php echo base_url()."Restaurant-Details/".$data->restaurant_id; ?>" ><?php echo ucwords($data->restaurant_name); ?></a></h5>
                                                                                <h6 class="mb-2" data-toggle="modal" data-target="#restaurent-popup"><a href="<?php echo base_url()."Restaurant-Details/".$data->restaurant_id; ?>" class="text-light-black fw-600"><?php echo $data->item_name; ?>
                                                                                    <?php
                                                                            if ($data->category == "Veg") {
                                                                                ?>
                                                                                        <img src="<?php echo base_url(); ?>assets/img/veg-tag.png" class="width-22">
                                                                                <?php
                                                                            } elseif ($data->category == "Non veg") {
                                                                                ?>
                                                                                <img src="<?php echo base_url(); ?>assets/img/nonvag-tag.png" class="width-22">
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <img src="<?php echo base_url(); ?>assets/img/ovoveg-tag.png" class="width-22">
                                                                                <?php
                                                                            }
                                                                            ?></a></h6>
                                                                           
                                                                                <p class="font-item-prize-style">&#8377; <?php echo $data->price; ?></p>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>

                                                                    </div>
                                                                    
                                                                    <div class="restaurent-tags-price">

                                                                        <button id="btn_wishlist_<?php echo $data->item_id ?>" data-target="#wishlistmodal"  onclick="remove_wishlist_item('<?php echo $data->favourite_id; ?>', 'item')" >
                                                                                   
                                                                                <span class="circle-tag ">
                                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                                                </span>
                                                                        
                                                                        </button>

                                                                        
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
            }
        }
        elseif ($this->input->post("type")=="restaurant") 
        {
            $wh['type']="restaurant";
            $wh['favourite_id']=$this->input->post("id");
            $res=$this->md->my_delete("tbl_favourite",$wh);
            if($res==1)
            {                                       
                $restaurant = $this->md->my_query("select se.*,ws.* from tbl_restaurant as se,tbl_favourite as ws where se.restaurant_id = ws.reference_id and ws.type = 'Restaurant' and ws.user_id = ".$this->session->userdata("user_username"));
        
                                        if (count($restaurant) == 0) {
                                            ?>
                                            <div class="wishlist-empty">
                                                <center>
                                                    <img src="<?php echo base_url(); ?>assets/img/empty_favourites_restaurant_wishlist.png">
                                                    <h3>Where is the love?</h3>
                                                    <h6>Once you favourite a restaurant, it will appear here.</h6>
                                                </center>
                                            </div>

                                            <?php
                                        } else {
                                            foreach ($restaurant as $single) {
                                                ?>
                                                <div class="col-md-6 col-sm-4 col-xs-12" >
                                                    <!--<div class="swiper-wrapper">-->
                                                    <div class="featured-product">



                                                        <div class="featured-img">
                                                            <a href="<?Php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>">
                                                                <?php
                                                                if ($single->coverpic == "") {
                                                                    ?>
                                                                    <img src="<?php echo base_url(); ?>assets/img/deals/360x178/shop-1.jpg" class="img-res-cover full-width" alt="#">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <img src="<?php echo base_url() . $single->coverpic; ?>" class="img-res-cover full-width" alt="#">
                                                                    <?php
                                                                }
                                                                ?>

                                                            </a>
                                                            <div class="overlay-2 padding-10"> <span class="background-none res-open-img"></span>
                                                            </div>
                                                            <div class="overlay-2 padding-10"> 
                                                                <button id="btn_wishlist_<?php echo $single->restaurant_id; ?>" data-target="#wishlistmodal"  onclick="remove_wishlist_item('<?php echo $single->favourite_id ?>', 'restaurant')">
                                                                            <?php
                                                                            $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $single->restaurant_id, "type" => "restaurant")));
                                                                            if ($query == 1) {
                                                                                ?>
                                                                        <span class="circle-tag reataurant-wishlist-icon">
                                                                            <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                                        </span>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <span class="circle-tag reataurant-wishlist-icon">
                                                                            <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg"  title="Add To Favourite" alt="tag">
                                                                        </span>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="featured-product-details padding-bottom-none height-151px">

                                                            <?php
                                                            // if ($single->service_status == "opened") {
                                                            //     ?>
                                                            //     <img src="<?php echo base_url(); ?>assets/img/open-res.png" class="wish-res-image  margin-right-17">

                                                            //     <?php
                                                            // } else {
                                                            //     ?>
                                                            //     <img src="<?php echo base_url(); ?>assets/img/close-res.png" class="wish-res-image  margin-right-17">
                                                            //     <?php
                                                            // }
                                                            ?>
                        <!--<img src="<?php echo base_url(); ?>assets/img/bakery-shop.png" class="" >-->


                                                            <div class="pro-title max-width-100 height-107px">
                                                                <h6 class="mb-1 restaurant-name"><a href="<?Php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>" class="text-light-black fw-600"><?php echo $single->restaurant_name; ?></a></h6>
                                                                <div class="restaurent-rating mb-xl-20">
                                                                    <div class="star"> 

                                                                        <?php
                                                                        $star_rating = $this->md->my_query("select AVG(rating) as rate_star , count(*) as cnt_rate from tbl_review_rating where restaurant_id = " . $single->restaurant_id);
                                                                        $cnt_star = round($star_rating[0]->rate_star);
                                                                        if ($cnt_star == 0) {
                                                                            ?>
                                                                            <span class="text-dark-white fs-16">
                                                                                <i class="fas fa-star"></i>
                                                                            </span>
                                                                            <span class="text-dark-white fs-16">
                                                                                <i class="fas fa-star"></i>
                                                                            </span>
                                                                            <span class="text-dark-white fs-16">
                                                                                <i class="fas fa-star"></i>
                                                                            </span>
                                                                            <span class="text-dark-white fs-16">
                                                                                <i class="fas fa-star"></i>
                                                                            </span>
                                                                            <span class="text-dark-white fs-16">
                                                                                <i class="fas fa-star"></i>
                                                                            </span>
                                                                            <?php
                                                                        } else {
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
                                                                        }
                                                                        ?>


                                                                    </div>
                                                                    <span class="fs-12 text-light-black"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>

                                                                    <?php
                                                                    if ($single->service_status == "closed") {
                                                                        $cur_day_name = date("d");
                                                                        $cur_day = strval(date("l", strtotime($cur_day_name + 1)));
                                                                        $open_time = $this->md->my_select("tbl_schedule", "*", array("restaurant_id" => $single->restaurant_id, "day_name" => $cur_day))[0]->open_time;
                                                                        ?>
                                                                        <p class="text-danger m-t-5 margin-b-none"><b>Open tomorrow at <?php echo date("h:i A", strtotime($open_time)); ?></b></p>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                                <?php
                                            }
                                        }
                                        
            }
        }
    }

    public function subcat()
    {
       $action=$this->input->post('action');    
       $id=$this->input->post('id');
       if($action=='subcat')
       {
           $wh["parent_id"] = $id;
           $wh["label"] = $action;
           $recordset=$this->md->my_select('tbl_category','*',$wh);
           echo '<option>Select Sub Category</option>';
           foreach($recordset as $data)
           {
               ?>
                    <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
               <?php
           }
       }
    }
    public function activestore()
    {    
           $id=$this->input->post('id');
           $wh["restaurant_id"] = $id;
           $recordset=$this->md->my_select('tbl_restaurant','*',$wh);
           ?>
                    <div class="row main-row">
                        <div class="col-md-12 second-row">
                            <div class="Back-meodel-box">
                                <div class="black-overlay"></div>
                                <div class="white-overlay"><p class="resname"><?php echo $recordset[0]->restaurant_name; ?> Restaurant</p></div>
                            </div>
                        </div>
                        <div class="col-md-5 cover-photo-box">
                            <img height="35%" width="42%" class="model-box-image" src="<?php echo base_url(); ?>assets/img/logo-6.jpg"> 
                        </div>
                    </div>
                    <div class="row mar-bottom">
                        <div class="col-md-6">
                            <div class="row main-row-contact">
                                <div class="col-md-12"  >
                                    <h1 class="contact-main-head">Contact</h1>
                                    <div class="admin-hr-line"></div>
                                    <br>
                                </div>
                                <div class="col-md-12 contact-detail">
                                    <div class="media" title="Email">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fas fa-envelope contact-fa-fa-icon"></i>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="mailto:munchbox@gmail.com" class="contact-detail-head" value="<?php echo $recordset[0]->restaurant_id; ?>" ><?php 
                                            if($recordset[0]->email == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->email;
                                            }
                                                ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 contact-detail">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fa fa-home contact-fa-fa-icon" title="Address"></i>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="#" class="contact-detail-head" title="Address" value="<?php echo $recordset[0]->restaurant_id; ?>" ><?php 
                                            if($recordset[0]->address == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->address;
                                            }
                                            ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 contact-detail">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fa fa-phone-alt contact-fa-fa-icon" title="Mobile Number"></i>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="tel:9532819102" title="Mobile Number" class="contact-detail-head" value="<?php echo $recordset[0]->restaurant_id; ?>">+ <?php 
                                            if($recordset[0]->contact_no == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->contact_no;                                            }
                                            ?> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 contact-detail">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <i class="fas fa-clock contact-fa-fa-icon" title="Resturant Services Time"></i>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="#" class="contact-detail-head" title="Resturant Services Time">9:00 AM - 11:00 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12"  >
                                    <h1 class="contact-main-head">Other Details</h1>
                                    <div class="admin-hr-line-other-detail"></div>
                                    <br>
                                </div>
                                <div class="col-md-12 other-detail-main-row" title="Bank Name">
                                    <span class="fa fa-university other-detail-fa-fa-icon" title="Bank Name"> &nbsp;Bank Name :</span>
                                    <span class="other-detail-details" title="Bank Name" value="<?php echo $recordset[0]->restaurant_id; ?>"> <?php 
                                            if($recordset[0]->bank_name == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->bank_name;
                                            }
                                            ?></span>
                                </div>
                                <div class="col-md-12 other-detail-main-row" title="Branch Name">
                                    <span class="fas fa-code-branch other-detail-fa-fa-icon" itle="Branch Name"> &nbsp;Branch Name :</span>
                                    <span class="other-detail-details" itle="Branch Name" value="<?php echo $recordset[0]->restaurant_id; ?>"> <?php 
                                            if($recordset[0]->branch_name == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->branch_name;
                                            }
                                            ?></span>
                                </div>
                                <div class="col-md-12 other-detail-main-row" title="IFSC Code">
                                    <span class="fas fa-file-alt other-detail-fa-fa-icon" itle="IFSC Code"> &nbsp;IFSC Code :</span>
                                    <span class="other-detail-details" itle="IFSC Code" value="<?php echo $recordset[0]->restaurant_id; ?>"> <?php 
                                            if($recordset[0]->IFSC_code == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->IFSC_code;
                                            }
                                            ?></span>
                                </div>
                                <div class="col-md-12 other-detail-main-row" title="Account Number">
                                    <span class="fas fa-user other-detail-fa-fa-icon" itle="Account Number"> &nbsp;A/C No. :</span>
                                    <span class="other-detail-details" itle="Account Number" value="<?php echo $recordset[0]->restaurant_id; ?>"> <?php 
                                            if($recordset[0]->ac_no == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->ac_no;
                                            }
                                            ?></span>
                                </div>
                                <div class="col-md-12 other-detail-main-row" title="Bank Benificiary Name">
                                    <span class="fas fa-user-circle other-detail-fa-fa-icon" itle="Bank Benificiary Name"> &nbsp;Bank Benificiary Name :</span>
                                    <span class="other-detail-details" itle="Bank Benificiary Name" value="<?php echo $recordset[0]->restaurant_id; ?>"> &nbsp;<?php 
                                            if($recordset[0]->bank_benificiary_name == "")
                                            {                                                
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->bank_benificiary_name;
                                            }
                                            ?></span>
                                </div>
                                <div class="col-md-12 other-detail-main-row" title="Pan Number">
                                    <span class="fas fa-address-card other-detail-fa-fa-icon" itle="Pan Number"> &nbsp;Pan No. :</span>
                                    <span class="other-detail-details" itle="Pan Number" value="<?php echo $recordset[0]->restaurant_id; ?>"> <?php 
                                            if($recordset[0]->pan_no == "")
                                            {
                                                 echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->pan_no;
                                            }
                                            ?></span>
                                </div>
                                <div class="col-md-12 other-detail-main-row" title="TIN VAT Number">
                                    <span class="fas fa-file-alt other-detail-fa-fa-icon" itle="TIN VAT Number"> &nbsp;TIN VAT No. :</span>
                                    <span class="other-detail-details" itle="TIN VAT Number" value="<?php echo $recordset[0]->restaurant_id; ?>"> <?php 
                                            if($recordset[0]->tin_vat_no == "")
                                            {
                                                echo '<span class="modelbox_error">Data Not Found.<span>';
                                            }
                                            else
                                            {
                                                echo $recordset[0]->tin_vat_no;
                                            }
                                            ?></span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 5%;">
                                <div class="col-md-2" style="margin-left: 60%;">
                                    <a href="#" class="btn btncancel" data-dismiss="modal" style="padding:8px 30px;font-size: 15px;" >Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
           <?php
    }
    public function package_update()
    {
        $action = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        if($action == "dashboard")
        {
            $wh["restaurant_id"] = $this->session->userdata("seller_email");
            $ins["package_id"] = $id;
            $ins["status"] = 1;
            $result = $this->md->my_update("tbl_restaurant",$ins,$wh);
            if($result == 1)
            {
                redirect("Restaurant-Home");
            }
        }
        elseif($action == "login")
        {
            $wh["restaurant_id"] = $this->session->userdata("seller_email");
            $record = $this->md->my_select("tbl_restaurant","*",$wh);
            if($record[0]->package_id == 0)
            {
                $wh["restaurant_id"] = $this->session->userdata("seller_email");
                $ins["package_id"] = $id;
                $ins["status"] = 1;
                $result = $this->md->my_update("tbl_restaurant",$ins,$wh);
                if($result == 1)
                {
                    redirect("Restaurant-Sign-In");
                }
            }
            else
            {
                redirect("Restaurant-Home");
            }
        }
    }
    public function insert_review()
    {
        $ins["review_id"] = 0;
        $ins["user_id"] = $this->session->userdata("user_username");
        $ins["restaurant_id"] = $this->input->post("restaurant_id");
        $ins["review"] = $this->input->post("message");
        $ins["date"] = date('Y-m-d h-i-s');
        $ins["rating"] = $this->input->post("rating");
        $result = $this->md->my_insert("tbl_review_rating",$ins);
        if($result == 1)
        {
            echo "1";
        }
    }
    public function activeitem()
    {
        echo "<pre>";
        print_r($this->input->post());
        $action = $this->input->post("action");
        if($action == "active")
        {
            $wh["item_id"] = $this->input->post("id");
            $ins["status"] = 1;
            $this->md->my_update("tbl_item",$ins,$wh);
        }
        elseif($action == "deactive")
        {
            $wh["item_id"] = $this->input->post("id");
            $ins["status"] = 0;
            $this->md->my_update("tbl_item",$ins,$wh);
        }
    }
    public function uploadadminprofile()
    {
        echo $this->input->post("imgurl");
    }
    public function userimageupload()
    {
        print_r($_FILES);
        
//        $user_detail = $this->md->my_select("tbl_user","*",array("user_id"=>$this->session->userdata("user_username")));
//        if($user_detail[0]->profile == "")
//        {
//            $config['file_name']="profile_".$this->session->userdata("user_username");
//            $config['upload_path']='./admin_assets/images/banner/';
//            $config['allowed_types']='jpeg|jpg|png';
//            $config['max_size']=1024 * 4;
//            $this->load->library('upload',$config);
//            $this->upload->initialize($config);
//                    
//        }
//        else
//        {
//            echo "update code";
//        }
    }
    public function findrestaurant()
    {
        $id = $this->session->userdata("search_restaurant");
        if($id == 0)
        {
                    if($this->input->post("id")==1)
                {
                    if($this->input->post("search")=="")
                    {
                        $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it where se.restaurant_id = it.restaurant_id and subcat.category_id = it.category_id and se.status = 1 GROUP BY it.restaurant_id ORDER BY se.service_name ASC"; 
                        $recordset=$this->md->my_query($query); 
                    }
                    else
                    {
                       $name="%".$this->input->post("search")."%";
                       $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it,tbl_location as ar where ar.location_id = se.location_id and se.status = 1 and se.restaurant_id = it.restaurant_id and subcat.category_id = it.category_id and  ar.name like '".$name."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC "; 
                       $recordset=$this->md->my_query($query); 
                    } 
                }
                elseif($this->input->post("id")==2)
                {
                    if($this->input->post("search")=="")
                    {
                        $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it where se.restaurant_id = it.restaurant_id and se.status = 1 and subcat.category_id = it.category_id GROUP BY it.restaurant_id ORDER BY se.service_name ASC"; 
                        $recordset=$this->md->my_query($query); 
                    }
                    else
                    {
                       $name="%".$this->input->post("search")."%";
                       $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it where  se.restaurant_id = it.restaurant_id and se.status = 1 and  subcat.category_id = it.category_id and it.item_name like '".$name."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC "; 
                       $recordset=$this->md->my_query($query);
                    }
                }
                elseif($this->input->post("id")==3)
                {
                    if($this->input->post("search")=="")
                    {
                        $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it where se.restaurant_id = it.restaurant_id and se.status = 1 and subcat.category_id = it.category_id GROUP BY it.restaurant_id ORDER BY se.service_name ASC"; 
                        $recordset=$this->md->my_query($query); 
                    }
                    else
                    {
                       $name="%".$this->input->post("search")."%";
                       $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it where se.restaurant_id = it.restaurant_id and se.status = 1 and subcat.category_id = it.category_id and se.service_name like '".$name."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC";
                       $recordset=$this->md->my_query($query);
                    }
                }
        }
        else
        {
             if($this->input->post("id")==1)
                {
                    if($this->input->post("search")=="")
                    {
                        $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it,tbl_location as ar,tbl_location as ct where se.restaurant_id = it.restaurant_id  and subcat.category_id = it.category_id and ar.location_id = se.location_id and ct.location_id = ar.parent_id and ct.location_id = '".$id."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC"; 
                        $recordset=$this->md->my_query($query); 
                    }
                    else
                    {
                       $name="%".$this->input->post("search")."%";
                       $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it,tbl_location as ar,tbl_location as ct  where ar.location_id = se.location_id and ct.location_id = ar.parent_id and se.status = 1 and ct.location_id = '".$id."' and se.restaurant_id = it.restaurant_id and subcat.category_id = it.category_id and  ar.name like '".$name."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC "; 
                       $recordset=$this->md->my_query($query); 
                    } 
                }
                elseif($this->input->post("id")==2)
                {
                    if($this->input->post("search")=="")
                    {
                        $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it,tbl_location as ar,tbl_location as ct where se.restaurant_id = it.restaurant_id  and subcat.category_id = it.category_id and ar.location_id = se.location_id and ct.location_id = ar.parent_id and ct.location_id = '".$id."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC"; 
                        $recordset=$this->md->my_query($query); 
                    }
                    else
                    {
                       $name="%".$this->input->post("search")."%";
                       $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it,tbl_location as ar,tbl_location as ct where ar.location_id = se.location_id and ct.location_id = ar.parent_id and se.status = 1 and ct.location_id = '".$id."' and  se.restaurant_id = it.restaurant_id and subcat.category_id = it.category_id and it.item_name like '".$name."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC "; 
                       $recordset=$this->md->my_query($query);
                    }
                }
                elseif($this->input->post("id")==3)
                {
                    if($this->input->post("search")=="")
                    {
                        $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it,tbl_location as ar,tbl_location as ct where se.restaurant_id = it.restaurant_id  and subcat.category_id = it.category_id and ar.location_id = se.location_id and ct.location_id = ar.parent_id and ct.location_id = '".$id."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC"; 
                        $recordset=$this->md->my_query($query); 
                    }
                    else
                    {
                       $name="%".$this->input->post("search")."%";
                       $query = "select GROUP_CONCAT(DISTINCT subcat.name) as category,se.* from tbl_restaurant as se,tbl_category as cat,tbl_category as subcat,tbl_item as it,tbl_location as ar,tbl_location as ct where ar.location_id = se.location_id and ct.location_id = ar.parent_id and se.status = 1 and ct.location_id = '".$id."' and se.restaurant_id = it.restaurant_id and subcat.category_id = it.category_id and se.service_name like '".$name."' GROUP BY it.restaurant_id ORDER BY se.service_name ASC";
                       $recordset=$this->md->my_query($query);
                    }
                }
                
        }
        
        
        ?>
                    <div class="row section-padding-bottom u-line">
                    <div class="col-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title">Featured partners</h3>
                            <div class="user-line margin-b-none m-t-10"></div>
                        </div>
                    </div>
                    <?php
                    if (count($recordset) == 0) {
                        ?>
                        <div class="col-12">
                            <div class="review-img">
                                <center>
                                    <img src="<?php echo base_url(); ?>assets/img/no_found.png" class="img-fluid" alt="#">
                                    <div class="review-text">
                                        <h2 class="text-light-white mb-2 fw-600">Search Result </h2>
                                        <p class="text-light-white f-s-17">We couldn’t find any Restaurant matching your search. Please try a new keyword.</p>
                                        
                                        

                                    </div>
                                </center>
                            </div>
                        </div>
                        <?php
                    } else {
                        foreach ($recordset as $single) {
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-12" >
                                <!--<div class="swiper-wrapper">-->
                                <div class="featured-product">
                    
                        
                    
                                    <div class="featured-img">
                                        <a href="<?Php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>">
                                            <?php
                                            if ($single->coverpic == "") {
                                                ?>
                                                <img src="<?php echo base_url(); ?>assets/img/deals/360x178/shop-1.jpg" class="img-res-cover full-width" alt="#">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo base_url() . $single->coverpic; ?>" class="img-res-cover full-width" alt="#">
                                                <?php
                                            }
                                            ?>

                                        </a>
                                        <div class="overlay-2 padding-10"> <span class="background-none res-open-img"></span>
                                        </div>
                                        <div class="overlay-2 padding-10"> 
                                            <button id="btn-wishlist-Restaurant" data-target="#wishlistmodal"  onclick="<?php
                                            if($this->session->userdata("user_username"))
                                            {
                                          ?>
                                              
                                            wishlist('<?php echo $single->restaurant_id; ?>', 'Restaurant')
                                          <?php  
                                            }
                                            else
                                            {
                                          ?>
                                                call_wishlist_modal('Restaurant')
                                            <?php
                                            }
                                            ?>">
                                            <?php
                                            $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $single->restaurant_id, "type" => "restaurant")));
                                            if ($query == 1) {
                                                ?>
                                                <span class="circle-tag reataurant-wishlist-icon">
                                                    <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="circle-tag reataurant-wishlist-icon">
                                                    <img id="add-wishlist-Restaurant-heart-image-<?php echo $single->restaurant_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg"  title="Add To Favourite" alt="tag">
                                                </span>
                                                <?php
                                            }
                                            ?>
                                        </button>
                                        </div>
                                    </div>
                                    <div class="featured-product-details padding-bottom-none height-151px">
                                        
                                        <?php 
                                            if($single->service_status == "opened")
                                            {
                                        ?>
                                                                                <!-- <img src="<?php echo base_url(); ?>assets/img/open-res.png" class="wish-res-image  margin-right-17"> -->

                                        <?php
                                            }
                                            else
                                            {
                                         ?>
                                                                                <!-- <img src="<?php echo base_url(); ?>assets/img/close-res.png" class="wish-res-image  margin-right-17"> -->
                                        <?php
                                            }
                                        ?>
                                                <!--<img src="<?php echo base_url(); ?>assets/img/bakery-shop.png" class="" >-->
                                                
                                        
                                        <div class="pro-title max-width-100 height-107px">
                                            <h6 class="mb-1 restaurant-name"><a href="<?Php echo base_url(); ?>Restaurant-Details/<?php echo $single->restaurant_id; ?>" class="text-light-black fw-600"><?php echo $single->restaurant_name; ?></a></h6>
                                              <div class="restaurent-rating mb-xl-20">
                            <div class="star"> 
                            
                            <?php
                            $star_rating = $this->md->my_query("select AVG(rating) as rate_star , count(*) as cnt_rate from tbl_review_rating where restaurant_id = ".$single->restaurant_id);
                            $cnt_star = round($star_rating[0]->rate_star); 
                            if($cnt_star == 0)
                            {
                            ?>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                                 <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php    
                            }
                            else
                            {
                                for($i = 1;$i<=5;$i++)
                                {
                                    if($i <= $cnt_star)
                                    {
                                ?>
                                <span class="text-yellow fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php
                                    }
                                    else
                                    {
                             ?>
                            <span class="text-dark-white fs-16">
                                    <i class="fas fa-star"></i>
                                </span>
                            <?php
                                    }
                                }
                            }   
                            ?>
                           
                                
                            </div>
                             <span class="fs-12 text-light-black"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                             
                             <?php 
                                            if($single->service_status == "closed")
                                            {
                                                $cur_day_name = date("d");
                                                $cur_day = strval(date("l",strtotime($cur_day_name +1)));
                                               $open_time = $this->md->my_select("tbl_schedule","*",array("restaurant_id"=>$single->restaurant_id,"day_name"=>$cur_day))[0]->open_time;
                                        ?>
                             <p class="text-danger m-t-5 margin-b-none"><b>Open tomorrow at <?php echo date("h:i A", strtotime($open_time));?></b></p>
                             <?php 
                                            }
                             ?>
                            </div>
                                            
                                        </div>
                          
                                    </div>
                                  
                                </div>
                          
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
                    <?php
    }
    public function wishlist()
    {
        if($this->session->userdata("user_username"))
        {
            if($this->input->post("action")=="ins")
            {
                $ins['favourite_id']=0;
                $ins['user_id']=$this->session->userdata("user_username");
                $ins['reference_id']=$this->input->post("id");
                $ins['type']=$this->input->post("type");
                $wh['user_id']=$this->session->userdata("user_username");
                $wh['reference_id']=$this->input->post("id");
                $wh['type']=$this->input->post("type");
                $wishquery=count($this->md->my_select("tbl_favourite","*",$wh));
                if($wishquery==0)
                {
                    $res=$this->md->my_insert("tbl_favourite",$ins);
                    if($res==1)
                    {
                        echo "ins_success";
                    }
                }
            }
            else
            {
                $wh['type']=$this->input->post("type");
                $wh['reference_id']=$this->input->post("id");
                $wh['user_id'] = $this->session->userdata("user_username");
                $res=$this->md->my_delete("tbl_favourite",$wh);
                if($res==1)
                {
                    echo "del_success";
                }
            }
          
        }
        else
        {
            echo "Error_login";
        }
    }
    public function addtocart()
    {
        if($this->session->userdata("user_username"))
        {
            if($this->input->post("action")=="ins_cart")
            {
                $ins['cart_id']=0;
                $ins['user_id']=$this->input->post("user_id");
                $ins['item_id']=$this->input->post("pro_id");
                $ins['qty']=$this->input->post("qty");
                $ins['restaurant_id']=$this->input->post("sel_id");
                $ins['price']=$this->input->post("price");
                $ins['total_price']= intval($this->input->post("price")) * intval($this->input->post("qty"));
                $cart_already_added=$this->md->my_select("tbl_addtocart","*",array("restaurant_id !="=>$this->input->post("sel_id"),"user_id"=>$this->input->post("user_id")));
                if(count($cart_already_added)==0)
                {
                 $res=$this->md->my_insert("tbl_addtocart",$ins);
                 if($res==1)
                 {
                    $cart_detail=$this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = ".$this->input->post("user_id"));
                    if(count($cart_detail)==0)
                    { 
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
                    }
                    else
                    {
                    ?>
                    <a class="emt_cart">Your Order</a>
                    <hr>
                    <div class="side-cart-item <?php
                                                        if (count($cart_detail) >= 3) {
                                                            echo "cart-item-scroll";
                                                        }
                                                        ?>">
                    <?php
                    foreach($cart_detail as $cart)
                    {
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
                }
            }
            else
            {
                
                echo "cart_already_added";
            }
                
        }
        elseif($this->input->post("action")=="up_cart")
        {
            $wh['user_id']=$this->input->post("user_id");
            $wh['item_id']=$this->input->post("pro_id");
            $ins['qty']=$this->input->post("qty");
            $wh['restaurant_id']=$this->input->post("sel_id");
            $ins['total_price']= intval($this->input->post("price")) * intval($this->input->post("qty"));
            $res=$this->md->my_update("tbl_addtocart",$ins,$wh);
            if($res==1)
            {
                    $cart_detail=$this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = ".$this->input->post("user_id"));
                    if(count($cart_detail)==0)
                    { 
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
                    }
                    else
                    {
                    ?>
                    <a class="emt_cart">Your Order</a>
                    <hr>
                    <div class="side-cart-item <?php
                                                        if (count($cart_detail) >= 3) {
                                                            echo "cart-item-scroll";
                                                        }
                                                        ?>">
                    <?php
                    foreach($cart_detail as $cart)
                    {
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
            }
        }
        elseif($this->input->post("action")=="del_cart")
        {
            $wh['user_id']=$this->input->post("user_id");
            $wh['item_id']=$this->input->post("pro_id");
            //$ins['qty']=$this->input->post("qty");
            $wh['restaurant_id']=$this->input->post("sel_id");
            //$ins['total_price']= intval($this->input->post("price")) * intval($this->input->post("qty"));
            $res=$this->md->my_delete("tbl_addtocart",$wh);
            if($res==1)
            {
                $cart_detail=$this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = ".$this->input->post("user_id"));
                    if(count($cart_detail)==0)
                    { 
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
                    }
                    else
                    {
                    ?>
                    <a class="emt_cart">Your Order</a>
                    <hr>
                      <div class="side-cart-item <?php
                                                        if (count($cart_detail) >= 3) {
                                                            echo "cart-item-scroll";
                                                        }
                                                        ?>">
                    <?php
                    foreach($cart_detail as $cart)
                    {
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
            }
        }
        else
        {
            echo "Error_login";
        }
    }
 }
 public function remove_cart_items()
 {
     $wh['user_id']=$this->session->userdata("user_username");
     $this->md->my_delete("tbl_addtocart",$wh);
     $cart_detail=$this->md->my_query("select pr.item_name,cat.name as category,ac.* from tbl_item as pr,tbl_addtocart as ac,tbl_category as cat,tbl_category as subcat where pr.item_id=ac.item_id and pr.category_id = subcat.category_id and cat.category_id = subcat.parent_id and ac.user_id = ".$this->session->userdata("user_username"));
     if(count($cart_detail)==0)
     { 
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
      }
      else
      {
      ?>
        <a class="emt_cart">Your Order</a>
        <hr>
        <div class="side-cart-item <?php
                                                        if (count($cart_detail) >= 3) {
                                                            echo "cart-item-scroll";
                                                        }
                                                        ?>">
        <?php
        foreach($cart_detail as $cart)
        {
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
        }
    public function getcount()
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
    public function viewmoreitem()
    {
        $detail = $this->md->my_query("select cat.name as category,subcat.name as subcategory , res.service_name ,item.* from tbl_category as cat,tbl_category as subcat,tbl_restaurant as res,tbl_item as item where item.item_id > ".$this->input->post("last_item_id")." and subcat.category_id = item.category_id and cat.category_id = subcat.parent_id and item.image != '' and res.restaurant_id = item.restaurant_id and item.status=1  ORDER by item_id ASC LIMIT 12");
        ?>
    <div class="row">
        <?php
        foreach($detail as $data)
        {
            
        ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-top:13px;" id="last-div-view" lastid= "<?php echo $data->item_id;?>">
                                    <div class="product-box mb-xl-20">
                                        <div class="">
                                            <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $data->restaurant_id; ?>">
                                                <img src="<?php echo base_url().$data->image; ?>" class="img-fluid full-width view-more-size-img" alt="product-img">
                                            </a>
                                            <div class="overlay">
                                                <div class="product-tags padding-10">
                                                    <span class="circle-tag"data-target="#wishlistmodal" onclick="<?php
                                                        if($this->session->userdata("user_username"))
                                                        {
                                                      ?>

                                                        wishlist('<?php echo $data->item_id; ?>', 'Item');
                                                      <?php  
                                                        }
                                                        else
                                                        {
                                                      ?>
                                                            call_wishlist_modal('Product');
                                                        <?php
                                                        }
                                                        ?>">
                                                        <?php
                                                            $query = count($this->md->my_select("tbl_favourite", "*", array("user_id" => $this->session->userdata('user_username'), "reference_id" => $data->item_id, "type" => "Item")));
                                                            if ($query == 1) {
                                                                ?>
                                                                
                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/010-heart.svg" title="Already Added In Favourite" alt="tag">
                                                                
                                                                <?php
                                                            } else {
                                                                ?>
                                                            
                                                                    <img id="add-wishlist-Item-heart-image-<?php echo $data->item_id; ?>" src="<?php echo base_url(); ?>assets/img/svg/013-heart-1.svg"  title="Add To Favourite" alt="tag">
                                   
                                                                <?php
                                                            }
                                                            ?>
                                                    </span>
                                                    <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $data->restaurant_id; ?>" class="btn-add-to-cart">
                                                        <span class="type-tag bg-gradient-green text-custom-white btn-addtocart top-137">
                                                            Visit Restaurant
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                
                                                <h6 class="product-title"><a href="restaurant.php" class="text-light-black "><?php echo $data->item_name; ?></a></h6>
                                            </div>
                                            <p class="text-light-white"><?php echo $data->subcategory; ?></p>
                                            <div class="product-details">
                                                <div class="restaurent-product-label"> 
                                                    <?php
                                                    if ($data->category == "Veg") {
                                                    ?>
                                                    <span class="rectangle-tag product-label-veg padding-top-5">Veg</span>
                                                    <?php
                                                } elseif ($data->category == "Non veg") {
                                                    ?>
                                                    <span class="rectangle-tag product-label-non-veg padding-top-5">Non-Veg</span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="rectangle-tag product-label-ovo-veg">Ovo-Veg</span>
                                                    <?php
                                                }
                                                ?>
                                                </div>
                                                <div class="rating"> <span>
                                                        <?php 
                                                            $star_rating = $this->md->my_query("select AVG(rating) as rate_star , count(*) as cnt_rate from tbl_review_rating where restaurant_id = " . $data->restaurant_id);
                                                             $cnt_star = round($star_rating[0]->rate_star);
                                                             for ($i = 1; $i <= 5; $i++) {
                                                             if ($i <= $cnt_star) 
                                                             {
                                                       ?>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <?php
                                                             }
                                                             else
                                                             {
                                                        ?>  
                                                        <i class="fas fa-star text-dark-white"></i>
                                                        <?php
                                                             }
                                                             }
                                                             ?>   
                                                    </span>
                                                    <span class="text-light-white text-right"><?php echo $star_rating[0]->cnt_rate; ?> Ratings</span>
                                                </div>
                                            </div>
                                            <div class="product-footer"> 
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/005-chef.svg" alt="tag" style="padding:4px;">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/004-leaf.svg" alt="tag">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/006-chili.svg" alt="tag">
                                                </span>
                                                <span class="text-custom-white square-tag">
                                                    <img src="<?php echo base_url(); ?>assets/img/svg/008-protein.svg" alt="tag">
                                                </span>
                                                <a href="<?php echo base_url(); ?>Restaurant-Details/<?php echo $data->restaurant_id; ?>">
                                                <span class="text-dark text-right btnprice" id="card">
                                                    <b>&#8377;<?php echo $data->price; ?></b>       
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        <?php
            $last_item_id = $data->item_id;
        }
        ?>
                    </div>
        <?php
        
    }
    function updatebill()
    {
        $id = $this->input->post("shipment_id");
        $shipment_loc_id = $this->md->my_query("select ct.location_id from tbl_shipment as sh,tbl_location as ar,tbl_location as ct where sh.shipment_id = ".$id." and ar.location_id = sh.location_id and ct.location_id = ar.parent_id");
        $seller_loc_id = $this->md->my_query("select ct.location_id from tbl_restaurant as se,tbl_location as ar,tbl_location as ct where se.restaurant_id = ".$this->input->post("restaurant_id")." and ar.location_id = se.location_id and ct.location_id = ar.parent_id");
        if($shipment_loc_id[0]->location_id != $seller_loc_id[0]->location_id)
        {
            echo strval("error".$shipment_loc_id[0]->location_id);
        }
        else
        {
            $this->session->set_userdata("delivered_address",$id);
            $this->session->set_userdata("cart_display","yes");
            $recordset = $this->md->my_query("SELECT st.name as state,ct.name as city,ar.name as area,sh.* from tbl_location as st,tbl_location as ct,tbl_location as ar ,tbl_shipment as sh where sh.location_id = ar.location_id and ar.parent_id = ct.location_id and ct.parent_id = st.location_id and user_id = ".$this->session->userdata("user_username")." and sh.shipment_id = ".$this->input->post("shipment_id"));
            
            ?>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1 text-center">
                    <?php 
                        if($recordset[0]->address_type == "Home")
                        {
                    ?>
                        <img src="<?php echo base_url(); ?>assets/img/home-address.png" style="height: 25px;width: 27px;">
                    <?php
                        }
                        else
                        {
                    ?>
                        <img src="<?php echo base_url(); ?>assets/img/office-address.png" style="height: 25px;width: 27px;">
                    <?php

                        }
                    ?>
                </div>
                <div class="col-md-11" >
                <p class="ship-address-header">
                    <?php 
                        if($recordset[0]->address_type == "Home")
                        {
                              echo "Home";
                        }
                        else
                        {
                            echo "Office";
                        }
                    ?>
                </p>
                <p class=""><?php echo $recordset[0]->address; ?></p>
                <p class=""><?php echo $recordset[0]->state;?> &Longrightarrow; <?php echo $recordset[0]->city;?> &Longrightarrow; <?php echo $recordset[0]->area;?></p>
                <p class="text-justify">Expected Delivery Time : 30 min</p>
            </div>
            </div>
        </div>
        <?php
        }
    }
    public function upadateconfirmusersession()
    {
        $this->session->set_userdata("confirm_detail_flag",$this->input->post("count_number_confirm"));
    }
    public function resmanageschedule()
    {
        
        $in["open_time"] = $this->input->post("opentime");
        $in["close_time"] = $this->input->post("closetime");
        $wh["Schedule_id"] = $this->input->post("schedule_id");
        $result = $this->md->my_update("tbl_schedule",$in,$wh);
        if($result == 1)
        {
            echo "success";
        }
        else
        {
            echo "error";
        }
    }
    public function upadateaddresssession()
    {
        $this->session->set_userdata("addnewaddress",$this->input->post("address_value"));
    }
    public function upadatechangesession()
    {
        $this->session->unset_userdata("change_user_detail","");
    }
    
    public function upadatepaymentsession()
    {
        
            $this->session->set_userdata("payment_method",$this->input->post("payment_value"));
        
        
//            $this->session->unset_userdata("confirm_detail_flag","");
//            $this->session->unset_userdata("delivered_address", "");
//            $this->session->unset_userdata("suggestion", "");
//            $this->session->unset_userdata("payment_method", "");
        
        
        
    }
    public function upadateconfirmaddresssession()
    {
        $this->session->set_userdata("delivered_address",$this->input->post("count_number_address"));
    }
    public function setsuggestion()
    {
        $this->session->set_userdata("suggestion",$this->input->post("suggetion"));
    }
    public function ordermodaldata()
    {
        $id = $this->input->post("id");
        $type = $this->input->post("type");
              $order_detail = $this->md->my_query("select maincat.name as maincategory , tr.*,it.item_name,it.measurement,it.description,it.category_id,it.image,maincat.name from tbl_transaction as tr,tbl_item as it,tbl_category as maincat,tbl_category as subcat where it.item_id = tr.item_id and subcat.category_id = it.category_id and maincat.category_id = subcat.parent_id and tr.bill_id = ".$id);
              $bill_detail = $this->md->my_select("tbl_bill","*",array("bill_id"=>$id));
              ?>
              <div class="container model-detail">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="modal-order-display-seller">
                        <a class="font-size-20 text-dark"><b class="font-weight-500 munchbox-seller-primary-color">Order Id:</b> #<?php echo $bill_detail[0]->bill_number; ?></a> 
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fa fa-times font-size-20 munchbox-seller-primary-color" title="Close" data-dismiss="modal"></i>
                    </div>
                    <div class="col-md-12 margin-top-15">
                        <div class="row border-2-gray">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-5">
                                <h4>Item Name</h4>
                            </div>
                            <div class="col-md-3 text-center">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>Price</h4>
                            </div>

                        </div>

                    </div>
                    <?php 
                        foreach($order_detail as $single)
                        {
                     ?>
                    <div class="col-md-12 margin-top-15">
                        <div class="row border-1-gray margin-top-10">
                            <div class="col-md-1 padding-right-none">
                                <?php 
                                    if($single->maincategory == "Veg")
                                    {
                                ?>
                                 <img src="<?php echo base_url(); ?>seller_assets/images/others/veg-tag.png" class="item-veg-tag">
                                <?php
                                    }
                                    elseif($single->maincategory == "Non veg")
                                    {
                                ?>
                                  <img src="<?php echo base_url(); ?>seller_assets/images/others/nonvag-tag.png" class="item-veg-tag">
                                <?php        
                                    }
                                    else
                                    {
                                ?>
                                   <img src="<?php echo base_url(); ?>seller_assets/images/others/ovoveg-tag.png" class="item-veg-tag">
                                <?php        
                                    }
                                ?>

                            </div>
                            <div class="col-md-5 padding-left-none">
                                <p class="font-size-15"><?php echo ucwords($single->item_name); ?></p>
                            </div>
                            <div class="col-md-3 text-center">
                                <p class="font-size-15"><?php echo $single->qty; ?></p>
                            </div>
                            <div class="col-md-3">
                                <p class="font-size-15">&#8377;<?php echo $single->price; ?></p>
                            </div>

                        </div>
                    </div>
                    <?php
                        }
                    ?>

                    <div class="col-md-12">
                        <div class="row margin-top-10">
                            <div class="col-md-6">
                                <h5>Suggestions:</h5>
                                <div class="row">
                                    <div class="col-md-12 order-suggestion-box">
                                        <p class="text-dark"><?php
                                            if($bill_detail[0]->suggestion == "")
                                            {
                                                echo "No Suggestions.";
                                            }
                                            else
                                            {
                                                echo $bill_detail[0]->suggestion;
                                            }
                                        ?></p>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-right padding-right-none font-size-15 font-weight-500">
                                <p>Subtotal</p>
                                <p>Tax(VAT)</p>
                                <p>Delivery Fee</p>
                                <p>Discount</p>
                            </div>
                            <div class="col-md-1 text-right padding-right-none padding-left-none font-size-15 font-weight-500">
                                <p class="visibility-hidden">hello</p>
                                <p>+</p>
                                <p class="visibility-hidden">hello</p>
                                <p>-</p>
                            </div>
                            <div class="col-md-3 font-size-15 font-weight-500">
                                <p>&#8377;<?php echo ($bill_detail[0]->amount + $bill_detail[0]->discount ) - $bill_detail[0]->tex; ?></p>
                                <p>&#8377;<?php echo $bill_detail[0]->tex;?></p>
                                <p class="text-green">Free</p>
                                <p>&#8377;<?php echo $bill_detail[0]->discount;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 border-2-gray-top border-2-gray">
                        <div class="row margin-top-10">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-3 text-right padding-right-none font-size-15 font-weight-500">
                                <p>Grand Total</p>
                            </div>
                            <div class="col-md-1 text-right padding-right-none padding-left-none font-size-15 font-weight-500">

                            </div>
                            <div class="col-md-3 font-size-15 font-weight-500">
                                <p>&#8377;<?php echo $bill_detail[0]->amount; ?></p>
                            </div>
                        </div>
                    </div>



                </div>
                  <div class="col-md-12 order-card-footer margin-top-10">
                      <div class="row">
                          <div class=" offset-md-9 col-md-3 text-center button-view-order">
                              <?php 
                                if($type == "pending")
                                {
                              ?>
                              <a onclick="orderprocess('<?php echo $single->bill_id; ?>', 'pending')" data-dismiss="modal"><p class="margin-bottom-none">Send To Prepare</p></a>
                              <?php
                                }
                                elseif($type == "prepared")
                                {
                              ?>
                              <a onclick="orderprocess('<?php echo $single->bill_id; ?>', 'prepared')" data-dismiss="modal"><p class="margin-bottom-none">Send For Deliver</p></a>
                              <?php
                                }
                              ?>    
                          </div>
                      </div>
                  </div>
            </div>
              <?php
    }
    public function orderprocess()
    {
        $id = $this->input->post("id");
        $type=$this->input->post("type");
        if($type == "pending")
        {
            $status = $this->md->my_select("tbl_bill","*",array("bill_id"=>$id))[0]->status;
            $status .= "prepared,";
            $in["status"] = $status;
            $result = $this->md->my_update("tbl_bill",$in,array("bill_id"=>$id));
            if($result == 1)
            {
                $pending_orders = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,'");
                ?>
                <?php
                if (count($pending_orders) == 0) {
                    ?>
                    <center>
                        <img src="<?php echo base_url(); ?>seller_assets/images/others/no-order.png" class="panding-order-img">
                        <h3 class="margin-top-10">No Pending Orders Found...</h3>
                    </center>
                    <?php
                } else {
                    ?>

                    <div class="table-responsive">
                        <table class="table table-hover e-commerce-table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th class="text-center">view</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pending_orders as $single) {
                                    ?>
                                    <tr>

                                        <td>#<?php echo $single->bill_number; ?></td>
                                        <td><?php echo ucwords($single->name); ?></td>
                                        <td><a title="Click Here To Contact Customer" href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>

                                        <td><a title="Click Here To Send Mail To Customer" href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                        <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                        <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'pending');"  data-toggle="modal" data-target="#pendingModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                        <td> <a title="Click Here To Send Item for Prepared" onclick="orderprocess('<?php echo $single->bill_id; ?>', 'pending')"><p class="margin-bottom-none btn-send-table">Send To Prepare</p></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
                <?php
            }
        }
        elseif ($type == "prepared") 
        {
             $status = $this->md->my_select("tbl_bill","*",array("bill_id"=>$id))[0]->status;
             $status .= "readydeliver,";
             $in["status"] = $status;
             $result = $this->md->my_update("tbl_bill",$in,array("bill_id"=>$id));
            if($result == 1)
            {
                $prepared_orders = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,prepared,'");
                ?>
                <?php
                if (count($prepared_orders) == 0) {
                    ?>
                    <center>
                        <img src="<?php echo base_url(); ?>seller_assets/images/others/prepared.png" class="panding-order-img">
                        <h3 class="margin-top-10">No Prepared Orders Found...</h3>
                    </center>
                    <?php
                } else {
                    ?>

                    <div class="table-responsive">
                        <table class="table table-hover e-commerce-table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th class="text-center">view</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($prepared_orders as $single) {
                                    ?>
                                    <tr>

                                        <td>#<?php echo $single->bill_number; ?></td>
                                        <td><?php echo ucwords($single->name); ?></td>
                                        <td><a title="Click Here To Contact Customer" href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>

                                        <td><a title="Click Here To Send Mail To Customer" href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                        <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                        <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'prepared');"  data-toggle="modal" data-target="#preparedModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                        <td> <a title="Click Here To Send Item for Deliver" onclick="orderprocess('<?php echo $single->bill_id; ?>', 'prepared')"><p class="margin-bottom-none btn-send-table">Send For Deliver</p></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
                <?php
            }
        }
    }
    public function setordertabdata()
    {
        $type=$this->input->post("type");
        if($type == "pending")
        {
                $pending_orders = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,'");
                ?>
                <?php
                if (count($pending_orders) == 0) {
                    ?>
                    <center>
                        <img src="<?php echo base_url(); ?>seller_assets/images/others/no-order.png" class="panding-order-img">
                        <h3 class="margin-top-10">No Pending Orders Found...</h3>
                    </center>
                    <?php
                } else {
                    ?>

                    <div class="table-responsive">
                        <table class="table table-hover e-commerce-table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th class="text-center">view</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pending_orders as $single) {
                                    ?>
                                    <tr>

                                        <td>#<?php echo $single->bill_number; ?></td>
                                        <td><?php echo ucwords($single->name); ?></td>
                                        <td><a title="Click Here To Contact Customer" href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>

                                        <td><a title="Click Here To Send Mail To Customer" href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                        <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                        <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'pending');"  data-toggle="modal" data-target="#pendingModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                        <td> <a title="Click Here To Send Item for Prepared" onclick="orderprocess('<?php echo $single->bill_id; ?>', 'pending')"><p class="margin-bottom-none btn-send-table">Send To Prepare</p></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
            <?php
        }
        elseif($type == "prepared")
        {
            $prepared_orders = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,prepared,'");
                ?>
                <?php
                if (count($prepared_orders) == 0) {
                    ?>
                    <center>
                        <img src="<?php echo base_url(); ?>seller_assets/images/others/prepared.png" class="panding-order-img">
                        <h3 class="margin-top-10">No Prepared Orders Found...</h3>
                    </center>
                    <?php
                } else {
                    ?>

                    <div class="table-responsive">
                        <table class="table table-hover e-commerce-table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th class="text-center">view</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($prepared_orders as $single) {
                                    ?>
                                    <tr>

                                        <td>#<?php echo $single->bill_number; ?></td>
                                        <td><?php echo ucwords($single->name); ?></td>
                                        <td><a title="Click Here To Contact Customer" href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>

                                        <td><a title="Click Here To Send Mail To Customer" href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                        <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                        <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'prepared');"  data-toggle="modal" data-target="#preparedModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                        <td> <a title="Click Here To Send Item for Deliver" onclick="orderprocess('<?php echo $single->bill_id; ?>', 'prepared')"><p class="margin-bottom-none btn-send-table">Send For Deliver</p></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
                <?php
        }
        else
        {
            $deliveredready_orders = $this->md->my_query("select us.*,bill.* from tbl_user as us,tbl_bill as bill where bill.restaurant_id = ".$this->session->userdata("seller_email")." and us.user_id = bill.user_id and bill.status = 'pending,prepared,readydeliver,'");
            ?>
             <?php
                if (count($deliveredready_orders) == 0) {
                    ?>
                    <center>
                        <img src="<?php echo base_url(); ?>seller_assets/images/others/ready-order.png" class="panding-order-img">
                        <h3 class="margin-top-10">No Ready To Deliver Orders Found...</h3>
                    </center>
                    <?php
                } else {
                    ?>

                    <div class="table-responsive">
                        <table class="table table-hover e-commerce-table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th class="text-center">view</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($deliveredready_orders as $single) {
                                    ?>
                                    <tr>

                                        <td>#<?php echo $single->bill_number; ?></td>
                                        <td><?php echo ucwords($single->name); ?></td>
                                        <td><a title="Click Here To Contact Customer" href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>
                                        <td><a title="Click Here To Send Mail To Customer" href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                        <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                        <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'readydeliver');"  data-toggle="modal" data-target="#readydeliverModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>   
            <?php    
        }
    }
    public function cancelorder()
    {

        $bill_id = $this->input->post("bill_id");
        $wh["status"] = "added_".$bill_id;
        $charges = $this->md->my_select("tbl_charges","*",$wh);
        if(count($charges) != 0)
        {
            foreach($charges as $single)
            {
                $in["status"] = "unpaid";
                $wh["charges_id"] = $single->charges_id;
                $this->md->my_update("tbl_charges",$in,$wh);
            }
        }
        
        $recordset = $this->md->my_select("tbl_bill","*",array("bill_id"=>$bill_id,"user_id"=>$this->session->userdata("user_username")));
//        $cur_time = strtotime(date("ymd"));
//        $order_time = strtotime($recordset[0]->bill_date )+1*60;
//        
//        if(intval($cur_time) <= intval($order_time))
//        {
//            echo "success";
//        }
//        else
//        {
//            echo "hello";
//        }
        
        if($recordset[0]->status == "pending,prepared," || $recordset[0]->status =="pending,prepared,readydeliver," || $recordset[0]->status == "pending,prepared,readydeliver,delivered")
        {
             
           $ins["charges_id"] = 0;
           $ins["bill_id"] = $bill_id;
           $ins["user_id"] = $this->session->userdata("user_username");
           $ins["restaurant_id"] = $recordset[0]->restaurant_id;
           $ins["charged_amt"] = $recordset[0]->amount;
           $ins["type"] = "ordercancel";
           $ins["status"] = "unpaid";
           
           $result = $this->md->my_insert("tbl_charges",$ins);
           if($result == 1)
           {
               $up["status"] = "canceled";
           $this->md->my_update("tbl_bill",$up,array("bill_id"=>$bill_id));
           }
        }
        else
        {
            $up["status"] = "canceled";
            $result = $this->md->my_update("tbl_bill",$up,array("bill_id"=>$bill_id));
        }
        
        
    }
    public function reorder()
    {
        $bill_id = $this->input->post("bill_id");
        $this->session->set_userdata("reorder_bill_id",$bill_id);
        $bill_detail = $this->md->my_select("tbl_bill","*",array("bill_id"=>$bill_id));
        $recordset = $this->md->my_select("tbl_transaction","*",array("bill_id"=>$bill_id));
        foreach($recordset as $single)
        {
            $cart_status = $this->md->my_select("tbl_addtocart","*",array("item_id"=>$single->item_id,"user_id"=>$this->session->userdata("user_username")));
            if(count($cart_status) == 0)
            {
            $itm_status = $this->md->my_select("tbl_item","*",array("item_id"=>$single->item_id,"restaurant_id"=>$bill_detail[0]->restaurant_id));
            if(count($itm_status) != 0 && $itm_status[0]->status == 1)
            {
                $ins["cart_id"] = 0;
                $ins["user_id"] = $this->session->userdata("user_username");
                $ins["item_id"] = $itm_status[0]->item_id;
                $ins["qty"] = $single->qty;
                $ins["restaurant_id"] = $itm_status[0]->restaurant_id;
                $ins["price"] = $itm_status[0]->price;
                $ins["total_price"] = intval($itm_status[0]->price) * intval($single->qty);
                $this->md->my_insert("tbl_addtocart",$ins);
            }
            }
        }
        $this->md->my_delete("tbl_transaction",array("bill_id"=>$bill_id));
//        echo $this->session->set_userdata("reorder_bill_id",$bill_id);
    }
 }
 
 

