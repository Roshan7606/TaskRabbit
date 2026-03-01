
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage State || MUNCHBOX - The Foodies Food</title>
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
                                <h1>Manage State Data <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home") ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Location</li>
                                    <li class="active">Manage State</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->

                    <div class="row">

                        <div class="col-md-6">
                            <?php
                            if (!isset($state_edit_detail)) {
                                ?>
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Enter State</h4>
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method="post" action="" name="state" novalidate="">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" check_control="alpha" title="Only Alphabet Allow" placeholder="Enter State" name="state" class="form-control <?php
                                                if (form_error('state')) {
                                                    echo 'my_error';
                                                }
                                                ?>" value="<?php
                                                       if (set_value("state")) {
                                                           
                                                           echo set_value("state");
                                                       }
                                                       
                                                       ?>">
                                                <p class="form-php-error">
                                                    <?php
                                                    if (form_error("state")) {
                                                        echo form_error("state");
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <button class="btn btnadd"  type="submit" name="add" value="add">Add State </button>
                                            <button class="btn btnadd btn_clear" type="reset">Clear</button>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Edit State</h4>
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method="post" action="" name="state_edit" novalidate="">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" check_control="alpha" title="Only Alphabet Allow" placeholder="Enter State" name="state" class="form-control <?php
                                                if (form_error('state')) {
                                                    echo 'my_error';
                                                }
                                                ?>" value="<?php
                                                       if (!isset($success) && set_value("state"))
                                                       {
                                                           echo $this->input->post("state");
                                                       } 
                                                       else
                                                       {        
                                                               echo $state_edit_detail[0]->name;
                                                           
                                                       }
                                                       ?>">
                                                <p class="form-php-error">
                                                    <?php
                                                    if (form_error("state")) {
                                                        echo form_error("state");
                                                    }
                                                    ?>
                                            </div>
                                            <button class="btn btnadd" href=""  type="submit" name="update" value="update">Edit State </button>
                                            <a href="<?php echo base_url(); ?>Admin-Manage-State" class="btn btncancel">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <!--Email Data table code...........................................-->
                        <div class="col-md-6">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title"> Manage State Data</h4>
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
                                                <th>State</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($state_detail as $data) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>                                                  
                                                    <td><?php echo $data->name; ?></td>
                                                    <td align="center">
                                                        <a onclick="$('#state_del').attr('href', '<?php echo base_url(); ?>Remove/state/<?php echo $data->location_id; ?>')" class="" title="Delete" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fas fa-trash-alt text-danger"></i></a> &nbsp;&nbsp;
                                                        <a href="<?php echo base_url(); ?>Edit-State/<?php echo $data->location_id; ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
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
                        <a id="state_del" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
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
        if (isset($error)) {
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
