<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Banner || MUNCHBOX - The Foodies Food</title>
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
                                <h1>Manage Banner Data <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home"); ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Pages</li>
                                    <li class="active">Manage Banner</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->

                    <div class="row">

                        <div class="col-md-6">
                            <div class="panel panel-card margin-b-30">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Enter Banner Details</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form id="fileupload" action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Banner Name</label>
                                            <input type="text" autofocus="" name="banner_name" check_control="alpha" title="Only Alphabet Allow" placeholder="Enter banner name" class="form-control <?php
                                                if (form_error('banner_name')) {
                                                    echo 'my_error';
                                                }
                                                ?>" value="<?php
                                                if(!isset($success) && set_value("banner_name"))
                                                {
                                                    echo set_value("banner_name");
                                                }
                                            ?>">
                                            <p class="form-php-error">
                                            <?php 
                                            if(form_error("banner_name"))
                                            {
                                                echo form_error("banner_name"); 
                                            }
                                            ?>
                                            </p>
                                            <br>

                                            <span class="btn btn-success fileinput-button"><i class="fa fa-fw fa-plus"></i>
                                                <span>Add files...</span>
                                                <input type="file" name="banner_pic"  id="" onchange="readURL(this);">
                                            </span>
                                            <br>
                                            <br>
                                            <div class="img-thumbnail">
                                                <img class="img-thumbnail" id="blah" style="padding: 5% 5%;display: none;" height="100" width="100" alt="Image Preview">
                                            </div>
                                            <br>
                                            <br>
                                            <button class="btn btnadd" type="submit" name="add" value="add" >Add Banner</button>
                                            <button class="btn btncancel" type="reset" >Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Email Data table code...........................................-->
                        <div class="col-md-6">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Manage Banner Data</h4>
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
                                                <th>Banner Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c=0;
                                            foreach($banner_detail as $banner){
                                                $c++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>                                                  
                                                    <td><?php echo $banner->banner_name; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url().$banner->banner_path; ?>" target="_blank">
                                                            <img src="<?php echo base_url().$banner->banner_path; ?>" style="width: 191px;" />
                                                        </a>
                                                    </td>
                                                    <td align="center">
                                                        <a onclick="$('#banner_del').attr('href', '<?php echo base_url(); ?>Remove/banner/<?php echo $banner->banner_id; ?>')" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fas fa-trash-alt text-danger" title="Delete"></i> </a>
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
                        <a id="banner_del" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal" style="padding:10px 40px;">NO</a>
                    </center>
                </div>
            </div>
        </div>
        <?php
        if(isset($success))
        {
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
    </body>
</html>
