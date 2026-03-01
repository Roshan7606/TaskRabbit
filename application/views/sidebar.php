<html>
    <head>
        <?php
            $this->load->view("CSS");
        ?>
    </head>
    <body>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Small modal</button>

        <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="padding: 20px;">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/exclamation.png" style="height: 60px;width: 60px;    " >
                        <p style="margin-top: 5%;font-size: 20px;">Are you sure want to delete ?</p>
                        <p style="margin-top: 2%;font-size: 15px;">You don't able to recover data after deleting .</p>
                        <a href="#" class="btn btn-danger" style="padding:10px 40px;">Yes</a>
                        <a href="#" class="btn btn-primary" style="padding:10px 40px;">NO</a>
                        
                    </center>
                </div>
            </div>
        </div>
        <?php
            $this->load->view("footerscript");
        ?>
    </body>
</html>