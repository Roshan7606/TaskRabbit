
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MUNCHBOX | Add Item</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                <?php
                $this->load->view("seller/head");
                $this->load->view("seller/sidebar");
                ?>
                <!-- Page Container START -->
                <div class="page-container">

                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <div class="page-header">
                            <h2 class="header-title"></h2>
                            <div class="header-sub-title">
                                <nav class="breadcrumb breadcrumb-dash">
                                    <a href="<?php echo base_url("Restaurant-Home"); ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                    <a class="breadcrumb-item" href="#">Items</a>
                                    <a class="breadcrumb-item" href="#">Add Items</a>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if (isset($item_edit_detail)) {
                                ?>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Edit Items</h4>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="" name="Edit" enctype="multipart/form-data">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                                        <label class="font-weight-semibold" for="maincategory">Main Category:</label>
                                                        <select autofocus="" id="maincategory" name="maincat" class="form-control" onchange="set_combo('subcat', this.value);">
                                                            <option value="">Select Main Category</option>
                                                            <?php
                                                            foreach ($maincat as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>"<?php
                                                                if (!isset($success) && set_select("maincat", $data->category_id)) {
                                                                    echo "selected";
                                                                }
                                                                else {
                                                                    $maincat = $this->md->my_query("select cat.* from tbl_category as cat,tbl_category as subcat,tbl_item as pro where pro.category_id = ".$item_edit_detail[0]->category_id." and pro.category_id = subcat.category_id and cat.category_id = subcat.parent_id and cat.label = 'maincat'"); 
                                                                    if($data->category_id == $maincat[0]->category_id)
                                                                    {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?>><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("maincat")) {
                                                                echo form_error("maincat");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12  ">
                                                        <label class="font-weight-semibold" for="subcategory">Sub Category:</label>
                                                        <select id="subcat" name="subcat" class="form-control">
                                                            <option value="">Select Sub Category</option>
                                                            <?php 
                                                    if($this->input->post("maincat") && !isset($success))
                                                    {
                
                                                        $wh["label"] = "subcat";
                                                        $wh["parent_id"] = $this->input->post("maincat");
                                                        $recordset=$this->md->my_select("tbl_category","*",$wh);
                                                        foreach($recordset as $data)
                                                        {
                                                ?>
                                                <option value="<?php echo $data->category_id;?>"<?php
                                                   if(!isset($success) && set_select("subcat",$data->category_id))
                                                   {
                                                       echo "selected";
                                                   }
                                                ?>><?php echo $data->name; ?></option>
                                                <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        
                                                        $subcat = $this->md->my_select("tbl_category","*",array("label"=>"subcat","category_id"=>$item_edit_detail[0]->category_id));
                                                        foreach($subcat as $data)
                                                        {
                                               ?>
                                                <option value="<?php echo $data->category_id ?>" <?php
                                                   if(!isset($success) && set_select("state",$data->category_id))
                                                   {
                                                       echo "selected";
                                                   }
                                                    else 
                                                    {
                                                       if($data->category_id == $item_edit_detail[0]->category_id)
                                                       {
                                                           echo "selected";
                                                       }
                                                    }
                                                ?>><?php echo $data->name; ?></option>
                                               <?php          
                                                        }
                                                    }
                                                ?>
                                                        </select>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("subcat")) {
                                                                echo form_error("subcat");
                                                            }
                                                            ?></p>                                                    </div>
                                                    <div class="form-group col-md-5 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="item_name">Name</label>
                                                        <input type="text" check_control="alpha" title="Only Alphabet Allow" name="item_name" placeholder="Dish Name" class="form-control <?php
                                                        if (form_error('item_name')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value("item_name")) {
                                                                   echo set_value("item_name");
                                                               }
                                                               else
                                                            {
                                                                echo $item_edit_detail[0]->item_name;
                                                            }
                                                               ?>">
                                                        <p class="form-php-error"><?php
                                                            if (form_error("item_name")) {
                                                                echo form_error("item_name");
                                                            }
                                                            
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="measurement">Measurement</label>
                                                        <select name="measurement" class="form-control">
                                                            <option value="">Select Measurement</option>
                                                            <option>KG</option>
                                                            <option>Gram</option>
                                                            <option>Litre</option>
                                                            <option>MiliLiter</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="price">Price</label>
                                                        <input type="text" check_control="number" title="Only Alphabet Allow" name="price" placeholder="Price" class="form-control <?php
                                                        if (form_error('price')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value("price")) {
                                                                   echo set_value("price");
                                                               }
                                                               else
                                                            {
                                                                echo $item_edit_detail[0]->price;
                                                            }
                                                               ?>">
                                                        <p class="form-php-error"><?php
                                                            if (form_error("price")) {
                                                                echo form_error("price");
                                                            }
                                                            
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="description">Description</label>
                                                    <textarea check_control="alpha" title="Only Alphabet Allow" name="description" placeholder="Description" class="form-control <?php
                                                        if (form_error('description')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>"><?php
                                                               if (!isset($success) && set_value("description")) {
                                                                   echo set_value("description");
                                                               }
                                                               else
                                                               {
                                                                   echo $item_edit_detail[0]->description;
                                                               }
                                                               ?></textarea>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("description")) {
                                                                echo form_error("description");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="tags">Tags</label>
                                                    <textarea check_control="alpha" title="Only Alphabet Allow" name="tags" placeholder="tag" class="form-control <?php
                                                        if (form_error('tags')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>"><?php
                                                               if (!isset($success) && set_value("tags")) {
                                                                   echo set_value("tags");
                                                               }
                                                               else
                                                               {
                                                                   echo $item_edit_detail[0]->tags;
                                                               }
                                                               ?></textarea>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("tags")) {
                                                                echo form_error("tags");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="pimage">Choose Dish Image</label>
                                                        <input type="file" name="pimage" class="form-control" onchange="readDishURL(this)">
                                                        <p class="form-php-error"><?php
                                                            if ($this->upload->display_errors()) {
                                                                echo $this->upload->display_errors();
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="petacategory">Image Preview</label>
                                                        <br>
                                                        <img src="<?php echo base_url().$item_edit_detail[0]->image; ?>" height="120" width="140" id="dish_preview">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12 col-sm-6 col-xs-6 class-space">
                                                        <button class="btn btnadd m-t-30" name="edit" value="edit" type="submit">Edit Item</button>
                                                        <button class="btn btncancel m-t-30" type="reset">Reset</button>
                                                        <br><br>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <?php
                                                        if (isset($success)) {
                                                            ?>
                                                            <div class="alert my_alert_success alert-success alert-dismissible fade in animated bounceInDown">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <i class="fa fa-info-circle"></i> 
                                                                <strong>Yeah, </strong> <small><?php echo $success; ?></small>
                                                            </div>

                                                            <?php
                                                        }
                                                        if (isset($error)) {
                                                            ?>
                                                            <div class="alert my_alert alert-warning alert-dismissible fade in animated bounceInUp">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <i class="fa fa-bell"></i> 
                                                                <strong>Oops! </strong> <small><?php echo $error; ?></small>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Add Items</h4>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="" enctype="multipart/form-data"  name="item">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                                        <label class="font-weight-semibold" for="maincategory">Main Category:</label>
                                                        <select id="maincategory" name="maincat" class="form-control <?php
                                                        if (form_error('maincat')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" onchange="set_combo('subcat', this.value);">
                                                            <option value="">Select Main Category</option>
                                                            <?php
                                                            foreach ($maincat as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>"<?php
                                                                if (!isset($success) && set_select("maincat", $data->category_id)) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("maincat")) {
                                                                echo form_error("maincat");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-6 col-xs-6  ">
                                                        <label class="font-weight-semibold" for="subcategory">Sub Category:</label>
                                                        <select id="subcat" name="subcat" class="form-control <?php
                                                        if (form_error('subcat')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>">
                                                            <option value="">Select Sub Category</option>
                                                            <?php
                                                            if ($this->input->post("maincat") && !isset($success)) {
                                                                $recordset = $this->md->my_select("tbl_category", "*", array("label" => "subcat", "parent_id" => $this->input->post("maincat")));
                                                                foreach ($recordset as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>"<?php
                                                                    if (!isset($success) && set_select("subcat", $data->category_id)) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("subcat")) {
                                                                echo form_error("subcat");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-5 col-sm-6 col-xs-6 class-space">
                                                        <label class="font-weight-semibold" for="petacategory">Item Name:</label>
                                                        <input type="text" check_control="alpha" title="Only Alphabet Allow" name="petacat" placeholder="Item Name" class="form-control <?php
                                                        if (form_error('petacat')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value("petacat")) {
                                                                   echo set_value("petacat");
                                                               }
                                                               ?>">
                                                        <p class="form-php-error"><?php
                                                            if (form_error("petacat")) {
                                                                echo form_error("petacat");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="measurement">Measurement</label>
                                                        <select name="measurement" class="form-control">
                                                            <option value="">Select Measurement</option>
                                                            <option>KG</option>
                                                            <option>Gram</option>
                                                            <option>Litre</option>
                                                            <option>MiliLiter</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="price">Price</label>
                                                        <input type="text" check_control="number" title="Only Alphabet Allow" name="price" placeholder="Price" class="form-control <?php
                                                        if (form_error('price')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value("price")) {
                                                                   echo set_value("price");
                                                               }
                                                               ?>">
                                                        <p class="form-php-error"><?php
                                                            if (form_error("price")) {
                                                                echo form_error("price");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="description">Description</label>
                                                    <textarea check_control="alpha" title="Only Alphabet Allow" name="description" placeholder="Description" class="form-control <?php
                                                        if (form_error('description')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>"><?php
                                                               if (!isset($success) && set_value("description")) {
                                                                   echo set_value("description");
                                                               }
                                                               ?></textarea>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("description")) {
                                                                echo form_error("description");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="tags">Tags</label>
                                                    <textarea check_control="alpha" title="Only Alphabet Allow" name="tags" placeholder="tag" class="form-control <?php
                                                        if (form_error('tags')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>"><?php
                                                               if (!isset($success) && set_value("tags")) {
                                                                   echo set_value("tags");
                                                               }
                                                               ?></textarea>
                                                        <p class="form-php-error"><?php
                                                            if (form_error("tags")) {
                                                                echo form_error("tags");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="pimage">Choose Dish Image</label>
                                                        <input type="file" name="pimage" class="form-control <?php 
                                                        if(form_error("pimage"))
                                                            {
                                                            echo "form_error";
                                                        }?>" onchange="readDishURL(this)">
                                                        <p class="form-php-error"><?php
                                                            if ($this->upload->display_errors()) {
                                                                echo $this->upload->display_errors();
                                                            }
                                                            if(form_error("pimage"))
                                                            {
                                                                echo form_error("pimage");
                                                            }
                                                            ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12 col-xs-12 class-space">
                                                        <label class="font-weight-semibold" for="petacategory">Image Preview</label>
                                                        <br>
                                                        <img src="" height="120" width="140" id="dish_preview">
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12 col-sm-6 col-xs-6 class-space">
                                                        <button class="btn btnadd m-t-30" name="add" value="add" type="submit">Add Item</button>
                                                        <button class="btn btncancel m-t-30" type="reset">Reset</button>
                                                        <br><br>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <?php
                                                        if (isset($success)) {
                                                            ?>
                                                            <div class="alert my_alert_success alert-success alert-dismissible fade in animated bounceInDown">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <i class="fa fa-info-circle"></i> 
                                                                <strong>Yeah, </strong> <small><?php echo $success; ?></small>
                                                            </div>

                                                            <?php
                                                        }
                                                        if (isset($error)) {
                                                            ?>
                                                            <div class="alert my_alert alert-warning alert-dismissible fade in animated bounceInUp">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <i class="fa fa-bell"></i> 
                                                                <strong>Oops! </strong> <small><?php echo $error; ?></small>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                    <!-- Content Wrapper END -->

                    <!-- Footer START -->
                    <?php
                    $this->load->view("seller/footer");
                    ?>
                    <!-- Footer END -->

                </div>
                <!-- Page Container END -->

                <!-- Search Start-->
                <div class="modal modal-left fade search" id="search-drawer">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Search</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-search"></i>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Files</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-cyan avatar-icon">
                                            <i class="anticon anticon-file-excel"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                            <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-blue avatar-icon">
                                            <i class="anticon anticon-file-word"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                            <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-purple avatar-icon">
                                            <i class="anticon anticon-file-text"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                            <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-red avatar-icon">
                                            <i class="anticon anticon-file-pdf"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                            <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Members</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                            <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                        </div>
                                    </div>
                                </div>   
                                <div class="m-t-30">
                                    <h5 class="m-b-20">News</h5> 
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/others/img-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                            <p class="m-b-0 text-muted font-size-13">
                                                <i class="anticon anticon-clock-circle"></i>
                                                <span class="m-l-5">25 Nov 2018</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search End-->

                <!-- Quick View START -->
                <div class="modal modal-right fade quick-view" id="quick-view">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Theme Config</h5>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="m-b-30">
                                    <h5 class="m-b-0">Header Color</h5>
                                    <p>Config header background color</p>
                                    <div class="theme-configurator d-flex m-t-10">
                                        <div class="radio">
                                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                                            <label for="header-default"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                                            <label for="header-primary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-success" name="header-theme" type="radio" value="success">
                                            <label for="header-success"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                            <label for="header-secondary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                                            <label for="header-danger"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Side Nav Dark</h5>
                                    <p>Change Side Nav to dark</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                        <label for="side-nav-theme-toogle"></label>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Folded Menu</h5>
                                    <p>Toggle Folded Menu</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                        <label for="side-nav-fold-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <!-- Quick View END -->
            </div>
        </div>
        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <img src="<?php echo base_url(); ?>admin_assets/images/exclamation.png" style="height: 60px;width: 60px;    " >
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to delete ?</p>
                        <p style="margin-top: 2%;font-size: 15px;">You don't able to recover data after deleting .</p>
                        <a id="petacat_del" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btncancel" data-dismiss="modal" style="padding:10px 40px;">NO</a>

                    </center>
                </div>
            </div>
        </div> 
        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js"></script>
        <script>
            <?php 
                if(!isset($item_edit_detail))
                {
            ?>
            $(document).ready(function(){
                $("#dish_preview").hide();
            });
            <?php
                }
            ?>
            </script>
    </body>
</html>






