<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Packages || MUNCHBOX - The Foodies Food</title>
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
                                <h1>Manage Package Data <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home") ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Manage Package</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->

                    <div class="row">

                        <div class="col-md-6">
                            <div class="panel panel-card margin-b-30">
                                <!-- Start .panel -->
                                
                                <?php
                                if(isset($package_edit_detail))
                                {
                                ?>
                                <div class="panel-heading">
                                    <h4 class="panel-title">Edit Package</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" method="post" action="" name="update">
                                        <div class="form-group">
                                            <label>Package Name</label>
                                            <input autofocus="" name="name" type="text" check_control="alpha" title="Only Alphabet Allow" placeholder="Enter Package Name" class="form-control <?php 
                                            if(form_error("name"))
                                            {
                                                echo "my_error";
                                            }
                                            ?>" value="<?php
                                                if(!isset($success) && set_value("name"))
                                                {
                                                        echo set_value("name");
                                                }
                                                else 
                                                {
                                                    if(!isset($success) )
                                                    {
                                                        echo $package_edit_detail[0]->name;
                                                    }
                                                }
                                            ?>">
                                            <p class="form-php-error">
                                                <?php if(form_error("name"))
                                                {
                                                    echo form_error("name");
                                                }
                                                ?>
                                            </p>

                                        </div>
                                        <div class="form-group">
                                            <label>Package Duration</label>
                                            <input type="text" name="duration" check_control="duration" title="Only Alphabet & Numbres Allow" placeholder="Enter Package Duration" class="form-control <?php 
                                            if(form_error("duration"))
                                            {
                                                echo "my_error";
                                            }
                                            ?>" value="<?php
                                                if(!isset($success) && set_value("duration"))
                                                {
                                                        echo set_value("duration");
                                                }
                                                else 
                                                {
                                                    if(!isset($success) )
                                                    {
                                                        echo $package_edit_detail[0]->duration;
                                                    }
                                                }
                                            ?>">
                                            <p class="form-php-error">
                                                <?php if(form_error("duration"))
                                                {
                                                    echo form_error("duration");
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Package Price</label>
                                            <input type="text" name="price" check_control="number" title="Only Numbres Allow" placeholder="Enter Package Price" class="form-control <?php 
                                            if(form_error("price"))
                                            {
                                                echo "my_error";
                                            }
                                            ?>" value="<?php
                                                if(!isset($success) && set_value("price"))
                                                {
                                                        echo set_value("price");
                                                }
                                                else 
                                                {
                                                    if(!isset($success) )
                                                    {
                                                        echo $package_edit_detail[0]->price;
                                                    }
                                                }
                                            ?>">
                                            <p class="form-php-error">
                                                <?php if(form_error("price"))
                                                {
                                                    echo form_error("price");
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Package Description</label>
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
                                                    if(!isset($success) )
                                                    {
                                                        echo $package_edit_detail[0]->description;
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
                                        <button class="btn btnadd" name="update" value="update" type="submit">Edit Package </button>
                                        <a href="<?php echo base_url(); ?>Admin-Manage-Packages" class="btn btncancel">Cancel</a>
                                    </form>
                                </div>
                                <?php
                                }
                                else
                                {
                                ?>
                                <div class="panel-heading">
                                    <h4 class="panel-title">Enter Package</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" method="post" action="" name="add">
                                        <div class="form-group">
                                            <label>Package Name</label>
                                            <input autofocus="" name="name" type="text" check_control="alpha" title="Only Alphabet Allow" placeholder="Enter Package Name" class="form-control <?php 
                                            if(form_error("name"))
                                            {
                                                echo "my_error";
                                            }
                                            ?>" value="<?php
                                                if(!isset($success) && set_value("name"))
                                                {
                                                        echo set_value("name");
                                                }
                                            ?>">
                                            <p class="form-php-error">
                                                <?php if(form_error("name"))
                                                {
                                                    echo form_error("name");
                                                }
                                                ?>
                                            </p>

                                        </div>
                                        <div class="form-group">
                                            <label>Package Duration</label>
                                            <input type="text" name="duration" check_control="duration" title="Only Alphabet & Numbres Allow" placeholder="Enter Package Duration" class="form-control <?php 
                                            if(form_error("duration"))
                                            {
                                                echo "my_error";
                                            }
                                            ?>" value="<?php
                                                if(!isset($success) && set_value("duration"))
                                                {
                                                        echo set_value("duration");
                                                }
                                            ?>">
                                            <p class="form-php-error">
                                                <?php if(form_error("duration"))
                                                {
                                                    echo form_error("duration");
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Package Price</label>
                                            <input type="text" name="price" check_control="number" title="Only Numbres Allow" placeholder="Enter Package Price" class="form-control <?php 
                                            if(form_error("price"))
                                            {
                                                echo "my_error";
                                            }
                                            ?>" value="<?php
                                                if(!isset($success) && set_value("price"))
                                                {
                                                        echo set_value("price");
                                                }
                                            ?>">
                                            <p class="form-php-error">
                                                <?php if(form_error("price"))
                                                {
                                                    echo form_error("price");
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Package Description</label>
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
                                        <button class="btn btnadd" name="add" value="add" type="submit">Add Package </button>
                                        <button class="btn btnadd btn_clear" type="reset">Clear</button>
                                    </form>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>


                        <!--Email Data table code...........................................-->
                        <div class="col-md-6">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Manage Package Data</h4>
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
                                                <th>Package Name</th>
                                                <th>Duration</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c=0;
                                            foreach($package_detail as $package) {
                                                $c++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>                                                  

                                                    <td><?php echo $package->name; ?></td>
                                                    <td><?php echo $package->duration; ?></td>
                                                    <td>&#8377; <?php echo $package->price; ?></td>
                                                    <td><?php echo $package->description; ?></td>
                                                    <td align="center">
                                                        <a onclick="$('#package-del').attr('href', '<?php echo base_url(); ?>Remove/package/<?php echo $package->package_id; ?>')" title="Delete" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fas fa-trash-alt text-danger"></i> </a> &nbsp; &nbsp;
                                                        <a href="<?php echo base_url(); ?>Edit-Package/<?php echo $package->package_id;?>" title="Edit"><i class="fas fa-pencil-alt"></i></a-->
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
                        <a id="package-del" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
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
