<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Email || MUNCHBOX - The Foodies Food</title>
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
                                <h1>Manage Email Subscriber Data <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo base_url("Admin-Home") ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Pages</li>
                                    <li class="active">Manage Email Subscriber</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->

                    <div class="row">
                        <!--Email Data table code...........................................-->
                        <form action="" method="post" name="email">
                            <div class="col-md-6">
                                <div class="panel panel-card ">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> Manage Email Data</h4>
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table id="basic-datatables" class="table table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <a href="#" id="check-box">
                                                            <input type="checkbox" class="checkbox" name="checkall" value="all" id="parentchk" style="zoom: 1.2">
                                                        </a>
                                                    </th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $recordset = $this->md->my_select("tbl_email_subscriber", "*");
                                                foreach ($recordset as $data) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="checkbox" id="childchk" name="receiver[]" value="<?php echo $data->email; ?>" style="zoom: 1.2;">
                                                        </td>
                                                        <td><?php echo $data->email ?></td>
                                                        <td align="center">
                                                            <a onclick="$('#mail_del').attr('href', '<?php echo base_url(); ?>Remove/email/<?php echo $data->email_id; ?>')" title="Delete" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fas fa-trash-alt text-danger"></i> </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- End .panel -->  
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> Send Mail</h4>
                                        <div class="panel-actions">
                                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                            <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <input type="text" name="subject" autofocus="" placeholder="Subject" class="form-control"></div>
                                        <textarea name="msg"></textarea>
                                        <button class="btn btnadd" name="add" value="add" type="submit">Send Mail</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--Email Data table code...........................................-->
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
                        <a id="mail_del" href="#" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
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
            CKEDITOR.replace('msg');
        </script>
        <script>
            $("#parentchk").click(function () {
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

            });
        </script>
    </body>
</html>
