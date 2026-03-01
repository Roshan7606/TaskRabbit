<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Deactive Users || MUNCHBOX - The Foodies Food</title>
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
                                <h1>Manage Users Data<small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home") ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Manage Deactive Users</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Manage Deactive Users Data</h4>
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
                                                <th>Name</th>
                                                <th>Contact No.</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Contact No.</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($user_detail as $deactiveuser) {
                                                $c++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $deactiveuser->name; ?></td>
                                                    <td><?php echo $deactiveuser->contact_no; ?></td>
                                                    <td><?php echo $deactiveuser->email; ?></td>
                                                    <td align="center">
                                                        <a title="Click For Active User" onclick="$('#deactiveuser').attr('href', '<?php echo base_url(); ?>Active-Deactive/activeuser/<?php echo $deactiveuser->user_id; ?>')" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fas fa-thumbs-down text-danger"></i> </a> &nbsp;&nbsp;
                                                        <a href="#">Read more</a>
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
        <button type="button" class="btn btn-primary" >Large modal</button>

        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <i class="fas fa-user-check text-success" style="margin-top: 3%;font-size: 70px"></i>
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to active ?</p>
                        <p style="margin-top: 1%;font-size: 14px;margin-bottom: 4%;padding: 0px 40px;">If you active user than you can able to upload images and other information about restaurant.</p>
                        <a id="deactiveuser" href="#" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal" style="padding:10px 40px;">NO</a>
                    </center>
                </div>
            </div>
        </div>
        
        <?php
       $this->load->view('admin/footscript');
        ?>
    </section>
</body>
</html>




