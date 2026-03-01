<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Contact || MUNCHBOX - The Foodies Food</title>
        <?php
        $this->load->view('admin/headscript');
        ?>
    </head>
    <body>
        <section class="page">
            <?php
            $this->load->view('admin/head');
            $this->load->view('admin/sidebar');
            ?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>Manage Contact Data<small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home") ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Pages</li>
                                    <li class="active">Manage contact</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Manage Contact Data</h4>
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="basic-datatables" class="table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($contact as $single)
                                            {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php  echo $single->name;?></td>
                                                    <td><?php  echo $single->email;?></td>
                                                    <td><?php  echo $single->mobile;?></td>
                                                    <td><?php  echo $single->subject;?></td>
                                                    <td><?php  echo $single->msg;?></td>
                                                    <td align="center">
                                                        <a onclick="$('#contact_del').attr('href', '<?php echo base_url(); ?>Remove/contact/<?php echo $single->contact_id; ?>')"  title="Delete" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fas fa-trash-alt text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End .panel -->  
                        </div><!--end .col-->
                    </div>
                </div> 
            </div>
        </section>

        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <img src="<?php echo base_url(); ?>admin_assets/images/exclamation.png" style="height: 60px;width: 60px;    " >
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to delete ?</p>
                        <p style="margin-top: 2%;font-size: 15px;">You don't able to recover data after deleting .</p>
                        <a id="contact_del" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal" style="padding:10px 40px;">NO</a>

                    </center>
                </div>
            </div>
        </div>
        <?php
        $this->load->view('admin/footscript');
        ?>
    </body>
</html>




