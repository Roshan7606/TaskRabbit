
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Promocode || MUNCHBOX - The Foodies Food</title>
        <?php
        $this->load->view('admin/headscript');
        ?>
    </head>
    <body>
        <?php
        $this->load->view('admin/head');
        ?>
        <section class="page">
            <?php
            $this->load->view('admin/sidebar');
            ?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>Manage Promocode Data <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home") ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Manage Promocode</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->

                    <div class="row">

                        <div class="col-md-12">
                            <div class="panel panel-card margin-b-30">
                                <!-- Start .panel -->
                                
                                <?php
                                if(isset($promocode_edit_detail))
                                {
                                ?>
                                <div class="panel-heading">
                                    <h4 class="panel-title">Edit Promocode</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" method="post" action="" name="update_promocode" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Code Name</label>
                                                    <input autofocus="" name="codename" type="text" check_control="alpha" title="Only Alphabet And Number  Allow" placeholder="Enter Code Name" class="form-control <?php 
                                                    if(form_error("codename"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("codename"))
                                                        {
                                                                echo set_value("codename");
                                                        }
                                                        else
                                                        {
                                                            if(!isset($success))
                                                            {
                                                                echo $promocode_edit_detail[0]->code;
                                                            }
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("codename"))
                                                        {
                                                            echo form_error("codename");
                                                        }
                                                        ?>
                                                    </p>
                                                 </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="text" name="amount" check_control="number" title="Only Numbres Allow" placeholder="Enter Amount" class="form-control <?php 
                                                    if(form_error("amount"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("amount"))
                                                        {
                                                                echo set_value("amount");
                                                        }
                                                        else
                                                        {
                                                            if(!isset($success))
                                                            {
                                                                echo $promocode_edit_detail[0]->amount;
                                                            }
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("amount"))
                                                        {
                                                            echo form_error("amount");
                                                        }
                                                        ?>
                                                    </p>
                                                 </div>
                                            </div>
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                    <label>Minimun Bill Price</label>
                                                    <input type="text" name="minprice" check_control="number" title="Only Numbres Allow" placeholder="Enter Minimum Bill Price" class="form-control <?php 
                                                    if(form_error("minprice"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("minprice"))
                                                        {
                                                                echo set_value("minprice");
                                                        }
                                                        else
                                                        {
                                                            if(!isset($success))
                                                            {
                                                                echo $promocode_edit_detail[0]->min_bill_price;
                                                            }
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("minprice"))
                                                        {
                                                            echo form_error("minprice");
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Percantage</label>
                                                    <input type="text" name="percentage" check_control="number" title="Only Numbres Allow" placeholder="Enter Persentage Of Amount" class="form-control <?php 
                                                    if(form_error("percentage"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("percentage"))
                                                        {
                                                                echo set_value("percentage");
                                                        }
                                                        else
                                                        {
                                                            if(!isset($success))
                                                            {
                                                                echo $promocode_edit_detail[0]->promo_percent;
                                                            }
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("percentage"))
                                                        {
                                                            echo form_error("percentage");
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Select Promocode Icon Image</label>
                                                    <div class="coupon-desc">
                                                        <div class="coupon1">
                                                            <br>
                                                            <img src="<?php
                                                                 if(!isset($success))
                                                                 {
                                                                      echo base_url().$promocode_edit_detail[0]->promo_icon_img;
                                                                 }
                                                                    ?>" alt="img" id="promo-priview-image"  class="coupon-simbol"/><label class="coupon-name" for="pro_icon">&nbsp;&nbsp; Select Image </label>
                                                            <div class="border-cupn">

                                                            </div>
                                                            <input type="file" id="pro_icon" name="promo_icon" onchange="readURLPRO(this)">
                                                            <p class="form-php-error">
                                                            <?php if(form_error("promo_icon"))
                                                            {
                                                                echo form_error("promo_icon");
                                                            }
                                                        ?>
                                                    </p>

                                                        </div>
                                                    </div>
 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control <?php 
                                                    if(form_error("description"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>"><?php
                                                        if(!isset($success) && set_value("description"))
                                                        {
                                                                echo set_value("description");
                                                        }
                                                        else
                                                        {
                                                            if(!isset($success))
                                                            {
                                                                echo $promocode_edit_detail[0]->description;
                                                            }
                                                        }
                                                    ?></textarea>
                                                    <p class="form-php-error">
                                                        <?php if(form_error("description"))
                                                        {
                                                            echo form_error("description");
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btnadd" name="update" value="update" type="submit">Edit Promocode </button>
                                        <a href="<?php echo base_url(); ?>Admin-Manage-Packages" class="btn btncancel">Cancel</a>
                                    </form>
                                </div>
                                <?php
                                }
                                else
                                {
                                ?>
                                <div class="panel-heading">
                                    <h4 class="panel-title">Enter Promocode</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" method="post" action="" name="add" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Code Name</label>
                                                    <input autofocus="" name="codename" type="text" check_control="alpha" title="Only Alphabet And Number  Allow" placeholder="Enter Code Name" class="form-control <?php 
                                                    if(form_error("codename"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("codename"))
                                                        {
                                                                echo set_value("codename");
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("codename"))
                                                        {
                                                            echo form_error("codename");
                                                        }
                                                        ?>
                                                    </p>
                                                 </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="text" name="amount" check_control="number" title="Only Numbres Allow" placeholder="Enter Amount" class="form-control <?php 
                                                    if(form_error("amount"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("amount"))
                                                        {
                                                                echo set_value("amount");
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("amount"))
                                                        {
                                                            echo form_error("amount");
                                                        }
                                                        ?>
                                                    </p>
                                                 </div>
                                            </div>
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                    <label>Minimun Bill Price</label>
                                                    <input type="text" name="minprice" check_control="number" title="Only Numbres Allow" placeholder="Enter Minimum Bill Price" class="form-control <?php 
                                                    if(form_error("minprice"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("minprice"))
                                                        {
                                                                echo set_value("minprice");
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("minprice"))
                                                        {
                                                            echo form_error("minprice");
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Percantage</label>
                                                    <input type="text" name="percentage" check_control="number" title="Only Numbres Allow" placeholder="Enter Persentage Of Amount" class="form-control <?php 
                                                    if(form_error("percentage"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>" value="<?php
                                                        if(!isset($success) && set_value("percentage"))
                                                        {
                                                                echo set_value("percentage");
                                                        }
                                                    ?>">
                                                    <p class="form-php-error">
                                                        <?php if(form_error("percentage"))
                                                        {
                                                            echo form_error("percentage");
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Select Promocode Icon Image</label>
                                                    <div class="coupon-desc">
                                                        <div class="coupon1">
                                                            <br>
                                                            <img src="<?php echo base_url(); ?>assets/img/address.png" alt="img" id="promo-priview-image"  class="coupon-simbol"/><label class="coupon-name" for="pro_icon">&nbsp;&nbsp; Select Image </label>
                                                            <div class="border-cupn">

                                                            </div>
                                                            <input type="file" id="pro_icon" name="promo_icon" onchange="readURLPRO(this)">
                                                            <p class="form-php-error">
                                                            <?php if(form_error("promo_icon"))
                                                            {
                                                                echo form_error("promo_icon");
                                                            }
                                                        ?>
                                                    </p>

                                                        </div>
                                                    </div>
 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control <?php 
                                                    if(form_error("description"))
                                                    {
                                                        echo "my_error";
                                                    }
                                                    ?>"><?php
                                                        if(!isset($success) && set_value("description"))
                                                        {
                                                                echo set_value("description");
                                                        }
                                                    ?></textarea>
                                                    <p class="form-php-error">
                                                        <?php if(form_error("description"))
                                                        {
                                                            echo form_error("description");
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>                    
                                        <button class="btn btnadd" name="add" value="add" type="submit">Add Promocode </button>
                                        <button class="btn btnadd btn_clear" type="reset">Clear</button>
                                    </form>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>


                        <!--Email Data table code...........................................-->
                        <div class="col-md-12">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Manage Promocode Data</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="basic-datatables" class="table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Code</th>
                                                <th>Amount</th>
                                                <th>Percentage</th>
                                                <th>Image</th>
                                                <th>Minimum Bill Prize</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c=0;
                                            foreach($promocode_detail as $data) {
                                                $c++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>                                                  

                                                    <td><?php echo $data->code; ?></td>
                                                    <td><?php echo $data->amount; ?></td>
                                                    <td><?php echo $data->promo_percent; ?></td>
                                                    <td><img src="<?php echo base_url().$data->promo_icon_img; ?>" style="height: 100px;width: 100px;"></td>
                                                    <td>&#8377; <?php echo $data->min_bill_price; ?></td>
                                                    <td><?php echo $data->description; ?></td>
                                                    <td><?php echo $data->status; ?></td>
                                                    
                                                    <td align="center">
                                                        <a onclick="$('#promocode-del').attr('href', '<?php echo base_url(); ?>Remove/promocode/<?php echo $data->promocode_id; ?>')" title="Delete" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fas fa-trash-alt text-danger"></i> </a> &nbsp; &nbsp;
                                                        <a href="<?php echo base_url(); ?>Edit-Promocode/<?php echo $data->promocode_id;?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End .panel -->  
                        </div><!--Email Data table code...........................................-->
                    </div>
                </div>
            </div> 
        </section>
        <!-- Large modal -->
        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <img src="<?php echo base_url(); ?>admin_assets/images/exclamation.png" style="height: 60px;width: 60px;    " >
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to delete ?</p>
                        <p style="margin-top: 2%;font-size: 15px;">You don't able to recover data after deleting .</p>
                        <a id="promocode-del" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal" style="padding:10px 40px;">NO</a>
                    </center>
                </div>
            </div>
        </div>
        <?php
        if (isset($success)) {
            ?>
            <div class="my_alert_success animated bounceInRight">
                <p>
                    <i class="fa fa-info-circle"></i> 
                    <b>Yeah, </b> <small><?php echo $success; ?></small>
                </p>
            </div>
            <?php
        }
        if(isset($error))
        {
        ?>
        <div class="my_alert animated bounceInRight">
                <p>
                    <i class="fa fa-bell"></i> 
                    <b>Oops, </b> <small><?php echo $error; ?></small>
                </p>
            </div>
        <?php  
        }
        ?>

        <?php
        $this->load->view('admin/footscript');
        ?>
        <!-- CKEDITOR LINK -->
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('description');
            
        </script>
        
    </body>
</html>
