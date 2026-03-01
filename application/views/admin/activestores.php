<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Active Restaurants || MUNCHBOX - The Foodies Food</title>
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
                                <h1>Manage Restaurants Data<small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home"); ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Manage Active Restaurants</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-card ">
                                <!-- Start .panel -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">Manage Active Restaurants Data</h4>
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
                                                <th>Restaurant Name</th>
                                                <th>Mobile No.</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Restaurant Name</th>
                                                <th>Mobile No.</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($seller_detail as $activestore) {
                                                $c++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $activestore->restaurant_name; ?></td>
                                                    <td><?php echo $activestore->contact_no; ?></td>
                                                    <td><?php echo $activestore->email; ?></td>
                                                    <td align="center">
                                                        <a onclick="$('#activestore').attr('href', '<?php echo base_url(); ?>Active-Deactive/deactivestore/<?php echo $activestore->restaurant_id; ?>')" data-toggle="modal" data-target=".bs-example-modal-md" title="Click For Deactive Restaurant"><i class="fas fa-thumbs-up "></i> </a> &nbsp;&nbsp;
                                                        <a href="#" onclick="set_modal('<?php echo $activestore->restaurant_id; ?>');" class="text-danger" data-toggle="modal" data-target=".bs-example-modal-lg">Read more</a>
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

        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <img src="<?php echo base_url(); ?>admin_assets/images/deactiveres.jpg" height="120" width="60" >
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to deactive ?</p>
                        <p style="margin-top: 1%;font-size: 14px;margin-bottom: 4%;padding: 0px 40px;">If you deactive restaurant than you can't able to upload images and other information of restaurant.</p>
                        <a id="activestore" href="#"   class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal" style="padding:10px 40px;" >NO</a>
                    </center>
                </div>
            </div>
        </div>

        <!--  READ MORE MODEL BOX  -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modal_content">

                </div>
            </div>
        </div>
        <?php
        $this->load->view('admin/footscript');
        ?>
        <script src="<?php echo base_url(); ?>admin_assets/js/munchbox_ajax.js" type="text/javascript"></script>
    </body>
</html>




