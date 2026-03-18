<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant SignUp</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
    </head>
    <body>
        <div class="app">
            <div class="container-fluid p-h-0 p-v-0 bg full-height d-flex log-in-overlay">
                <div class="d-flex flex-column justify-content-between w-100">
                    <div class="container d-flex h-100" style="margin-bottom: 1%;">
                        <div class="row align-items-center w-100">
                            <div class="col-md-12 col-lg-8 m-h-auto">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between m-b-30">

                                            <h2 class="m-b-0 log-head">Other Details</h2>
                                        </div>
                                        <form method="post" action="" name="signup">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <?php
                                                        if (form_error("ownname")) {
                                                            ?>
                                                            <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("ownname"); ?></label>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <label class="font-weight-semibold" for="restaurantname">Owner Name:</label>
                                                            <?php
                                                        }
                                                        ?>
                                                            <input type="text" autofocus="" name="ownname" id="restaurantname" title="Only Alpha Is Allow" placeholder="Owner Name" class="form-control <?php
                                                        if (form_error('ownname')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value("ownname")) {
                                                                   echo set_value("ownname");
                                                               }
                                                               ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <?php
                                                        if (form_error("ownmobile")) {
                                                            ?>
                                                            <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("ownmobile"); ?></label>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <label class="font-weight-semibold" for="mobile">Owner Mobile No:</label>
                                                            <?php
                                                        }
                                                        ?>
                                                        <input type="text"  check_control="number" id="mobile" name="ownmobile" title="Only Numeric Is Allow" placeholder="Owner Mobile No" class="form-control <?php
                                                        if (form_error('ownmobile')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value("ownmobile")) {
                                                                   echo set_value("ownmobile");
                                                               }
                                                               ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <?php
                                                        if (form_error("ownemail")) {
                                                            ?>
                                                            <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("ownemail"); ?></label>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <label class="font-weight-semibold" for="email">Owner Email:</label>
                                                            <?php
                                                        }
                                                        ?>
                                                        <input type="email" autocomplete="off" id="email" name="ownemail" placeholder="Owner Email" check_control="" class="form-control <?php
                                                        if (form_error('ownemail')) {
                                                            echo 'my_error';
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value("ownemail")) {
                                                                   echo set_value("ownemail");
                                                               }
                                                               ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <?php
                                                        if (form_error("resclosetime") || form_error("resopentime")) {
                                                            ?>
                                                            <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php
                                                                if (form_error("resclosetime") || form_error("resopentime")) {
                                                                    if (form_error("resclosetime")) {
                                                                        echo form_error("resclosetime");
                                                                    } else {
                                                                        echo form_error("resopentime");
                                                                    }
                                                                }
                                                                ?>
                                                            </label>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <label class="font-weight-semibold" for="ps">Restaurant Service Time:</label>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-5 padding-right-none">
                                                                <input type="time" id="ps" name="resopentime"  check_control="" title="Please Select Restaurant Opening Time" class="form-control <?php
                                                                if (form_error('resopentime')) {
                                                                    echo 'my_error';
                                                                }
                                                                ?>" value="<?php
                                                                       if (!isset($success) && set_value("resopentime")) {
                                                                           echo set_value("resopentime");
                                                                       }
                                                                       ?>">

                                                            </div>
                                                            <div class="col-md-2 text-center padding-left-none padding-right-none p-t-10">
                                                                <label>To</label>
                                                            </div>
                                                            <div class="col-md-5 padding-left-none ">
                                                                <input type="time" id="ps" name="resclosetime" title="Please Select Restaurant Closing Time"  check_control="" class="form-control <?php
                                                                if (form_error('resclosetime')) {
                                                                    echo 'my_error';
                                                                }
                                                                ?>" value="<?php
                                                                       if (!isset($success) && set_value("resclosetime")) {
                                                                           echo set_value("resclosetime");
                                                                       }
                                                                       ?>">
                                                            </div>
                                                        </div>




                                                    </div>
                                                </div>   
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <?php
                                                        if (form_error("state")) {
                                                            ?>
                                                            <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("state"); ?></label>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <label class="font-weight-semibold" for="state">State:</label>
                                                            <?php
                                                        }
                                                        ?>
                                                        <select name="state" name="state" class="form-control <?php
                                                        if (form_error("city")) {
                                                            echo "form_error";
                                                        }
                                                        ?>" onchange="set_combo1('city', this.value);">
                                                            <option value="">Select State</option>
                                                            <?php
                                                            foreach ($state_detail as $single) {
                                                                ?>
                                                                <option value="<?php echo $single->location_id; ?>" <?php
                                                                if (!isset($success) && set_select("state", $single->location_id)) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $single->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php
                                                        if (form_error("city")) {
                                                            ?>
                                                            <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("city"); ?></label>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <label class="font-weight-semibold" for="state">City:</label>
                                                            <?php
                                                        }
                                                        ?>
                                                        <select id="city" name="city" class="form-control <?php
                                                        if (form_error("city")) {
                                                            echo "form_error";
                                                        }
                                                        ?>" onchange="set_combo1('area', this.value);">
                                                            <option value="">Select City</option>
                                                            <?php
                                                            if ($this->input->post("state") && !isset($success)) {
                                                                $recordset = $this->md->my_select("tbl_location", "*", array("label" => "city", "parent_id" => $this->input->post("state")));
                                                                foreach ($recordset as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->location_id; ?>"<?php
                                                                    if (!isset($success) && set_select("city", $data->location_id)) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php
                                                        if (form_error("area")) {
                                                            ?>
                                                            <label class="text-light-white fs-14 form_vis_error_text error_label_color"><?php echo form_error("area"); ?></label>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <label class="font-weight-semibold" for="state">Area:</label>
                                                            <?php
                                                        }
                                                        ?>
                                                        <select name="area" id="area" class="form-control <?php
                                                        if (form_error("city")) {
                                                            echo "form_error";
                                                        }
                                                        ?>">
                                                            <option value="">Select Area</option>
                                                            <?php
                                                            if ($this->input->post("city") && !isset($success)) {
                                                                $recordset = $this->md->my_select("tbl_location", "*", array("label" => "area", "parent_id" => $this->input->post("city")));
                                                                foreach ($recordset as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->location_id; ?>"<?php
                                                                    if (!isset($success) && set_select("area", $data->location_id)) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-semibold" for="state"></label>
                                                        <div class="d-flex text-right justify-content-between p-t-15">

                                                            <button class="btn btn-primary signup-detail-btn " type="submit" name="signup" value="signup">Sign UP</button>
                                                        </div>
                                                    </div>

                                                    <!--                                                    <div class="col-lg-12">
                                                    <?php
                                                    if (isset($success)) {
                                                        ?>
                                                                                                                        <div class="alert my_alert_success alert-success alert-dismissible fade in animated bounceInDown">
                                                                                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                                                                            <i class="fa fa-info-circle"></i> 
                                                                                                                            <strong>Yeah, </strong> <small><?php echo $success; ?></small>
                                                                                                                        </div>
                                                            
                                                        <?php
                                                    }
                                                    if (isset($error)) {
                                                        ?>
                                                                                                                        <div class="alert my_alert alert-warning alert-dismissible fade in animated bounceInUp">
                                                                                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                                                                            <i class="fa fa-bell"></i> 
                                                                                                                            <strong>Oops! </strong> <small><?php echo $error; ?></small>
                                                                                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                                                                        </div>-->

                                                </div>
                                            </div>      
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                    $this->load->view("seller/footer");
                    ?>
                </div>

            </div>
        </div>
        <!--script type="text/javascript">
            $(document).ready(function(){
                $("#ps").val("");
            });
        </script-->
        <script>
            $c = 1;
            function showpass(id, cls)
            {
                if ($c == 1)
                {
                    $(id).attr("type", "text");
                    $(id).attr("title", "Show");
                    $(cls).css("color", "red");
                    $(cls).removeClass("fa-eye");
                    $(cls).addClass("fa-eye-slash");
                    $c = 0;
                } else
                {
                    $(id).attr("type", "password");
                    $(id).attr("title", "Hide");
                    $(cls).css("color", "#000");
                    $(cls).removeClass("fa-eye-slash");
                    $(cls).addClass("fa-eye");
                    $c = 1;
                }

            }
        </script>
        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js" type="text/javascript"></script>

    </body>
</html>