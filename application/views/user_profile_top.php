<div class="main-sec" style="height: 70px;">

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="user-banner">
                <div class="user-banner-detail">
                    <center>
                        <?php 
                          $record = $this->md->my_select("tbl_user","*",array("user_id"=>$this->session->userdata("user_username")));
                        ?>
                        <div class="user-img">
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php 
                                if($record[0]->profile != "")
                                {
                                ?>
                                 <img id="user_img_profile_top" src="<?php echo base_url().$record[0]->profile;?>" class="profile">
                                <?php 
                                }
                                else
                                {    
                                ?>
                                 <img id="user_img_profile_top" src="<?php echo base_url().$record[0]->profile;?>" class=" round" width="130" height="130" avatar="<?php echo $record[0]->name; ?>">
                                <?php 
                                }
                                ?>
                                
<!--                                <a href = ""><label for="user_img" title="Edit Profile Picture"><i class="fa fa-camera"></i></label></a>-->

                                
                            </form>
                        </div>
                        <div class="user-name" >
                            <p class="u-name"><?php echo ucwords($record[0]->name); ?></p>
                           
                        </div>
                    </center>
                </div>
            </div>
        </div>                     
    </div> 
</div>   