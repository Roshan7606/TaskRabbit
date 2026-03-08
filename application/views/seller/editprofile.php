<?php
$seller_detail = $this->md->my_select("tbl_restaurant", "*", array("restaurant_id" => $this->session->userdata("seller_email")));
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TaskRabbit | Service Provider Profile</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
        <style>
        .provider-section{
            display:block;
        }
        </style>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                <?php
                $this->load->view("seller/head");
                $this->load->view("seller/sidebar");
                ?>
                <!-- Page Container START -->
                <div class="page-container">

                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <div class="page-header no-gutters has-tab">
                            <h2 class="font-weight-normal">Service Provider Profile</h2>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active provider-tab-link" href="#" data-target="tab-account">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link provider-tab-link" href="#" data-target="tab-network">Location</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link provider-tab-link" href="#" data-target="tab-notification">Gallery</a>
                                </li>
                            </ul>
                        </div>
                        <div class="">
                            <div class="tab-content m-t-15">
                                <div id="tab-account" class="provider-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Provider Account Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <?php
                                                if (!isset($seller_account_info)) {
                                                    foreach ($edit_profile as $data) {
                                                        ?>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="font-weight-semibold" for="restaurantName">Provider Name:</label>
                                                                <input type="text" name="resname" disabled="" autofocus="" class="form-control" id="restaurantName" placeholder="<?php
                                                                if ($data->restaurant_name  == "") {
                                                                    echo 'Data Not Found';
                                                                } else {
                                                                    echo $data->restaurant_name;
                                                                }
                                                                ?>">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="font-weight-semibold" for="email">Email:</label>
                                                                <input type="email" disabled="" name="email" class="form-control" id="email" placeholder="<?php
                                                                if ($data->email == "") {
                                                                    echo 'Data Not Found';
                                                                } else {
                                                                    echo $data->email;
                                                                }
                                                                ?>">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                                                                <input type="text" disabled="" name="contactno" class="form-control" id="phoneNumber" placeholder="<?php
                                                                if ($data->contact_no == "") {
                                                                    echo 'Data Not Found';
                                                                } else {
                                                                    echo $data->contact_no;
                                                                }
                                                                ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <a href="Edit-Restaurant-Account" class="btn change-profile-btn" name="editprofile">Edit Profile</a>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                } else {
                                                    foreach ($edit_profile as $data) {
                                                        ?>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="font-weight-semibold" for="restaurantName">Provider Name:</label>
                                                                <input type="text" name="resname" check_control="" autofocus="" class="form-control" id="restaurantName" value="<?php
                                                                if ($data->restaurant_name  == "") {
                                                                    echo 'Data Not Found';
                                                                } else {
                                                                    echo $data->restaurant_name;
                                                                }
                                                                ?>">
                                                                <p class="form-php-error">
                                                                    <?php
                                                                    if (form_error("resname")) {
                                                                        echo form_error("resname");
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="font-weight-semibold" for="email">Email:</label>
                                                                <input type="email" name="email" check_control="" class="form-control" id="email" value="<?php
                                                                if ($data->email == "") {
                                                                    echo 'Data Not Found';
                                                                } else {
                                                                    echo $data->email;
                                                                }
                                                                ?>">
                                                                <p class="form-php-error">
                                                                    <?php
                                                                    if (form_error("email")) {
                                                                        echo form_error("email");
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                                                                <input type="text" name="contactno" check_control="number" class="form-control" id="phoneNumber" value="<?php
                                                                if ($data->contact_no == "") {
                                                                    echo 'Data Not Found';
                                                                } else {
                                                                    echo $data->contact_no;
                                                                }
                                                                ?>">
                                                                <p class="form-php-error">
                                                                    <?php
                                                                    if (form_error("contactno")) {
                                                                        echo form_error("contactno");
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <button type="submit" class="btn change-profile-btn" value="updateaccount" name="updateaccount">Update Account</button>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </form>
                                        </div>
                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Professional Details</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="font-weight-semibold">Primary Skill:</label>
                                                                <input type="text" name="primary_skill" class="form-control" placeholder="e.g. Electrician, Plumber, Cleaner">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="font-weight-semibold">Experience:</label>
                                                                <input type="text" name="experience" class="form-control" placeholder="e.g. 3 Years">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="font-weight-semibold">Starting Price:</label>
                                                                <input type="text" name="starting_price" class="form-control" placeholder="e.g. 299">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="font-weight-semibold">Languages Known:</label>
                                                                <input type="text" name="languages" class="form-control" placeholder="e.g. Gujarati, Hindi, English">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="font-weight-semibold">About Me:</label>
                                                                <textarea name="about_me" class="form-control" rows="4" placeholder="Write a short introduction about your work experience and services"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <button type="submit" class="btn change-profile-btn" name="updateprofessional">Save Details</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
<!--                                <div class="tab-pane fade" id="tab-bank">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Bank Details</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="">
                                                        <?php
                                                        if (!isset($seller_bank_info)) {
                                                            ?>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="font-weight-semibold" for="bankname">Bank Name :</label>
                                                                    <input type="text" class="form-control" name="bankname" id="bankname" disabled="" placeholder="<?php
                                                                    if ($data->bank_name == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->bank_name;
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="font-weight-semibold" for="branchname">Branch Name :</label>
                                                                    <input type="text" class="form-control" name="branchname" disabled="" id="branchname" placeholder="<?php
                                                                    if ($data->branch_name == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->branch_name;
                                                                    }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="font-weight-semibold" for="acno">Account Number :</label>
                                                                    <input type="text" class="form-control" name="acno" id="acno" disabled="" placeholder="<?php
                                                                    if ($data->ac_no == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->ac_no;
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="font-weight-semibold" for="IFSCcode">IFSC Code:</label>
                                                                    <input type="text" class="form-control" name="IFSCcode" id="IFSCcode" disabled="" placeholder="<?php
                                                                    if ($data->IFSC_code == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->IFSC_code;
                                                                    }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="font-weight-semibold" for="benificiary">Bank Benificiary Name :</label>
                                                                    <input type="text" class="form-control" name="bankbenificiary" id="benificiary" disabled="" placeholder="<?php
                                                                    if ($data->bank_benificiary_name == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->bank_benificiary_name;
                                                                    }
                                                                    ?>">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="font-weight-semibold" for="pannumber">Pan Card Number :</label>                            
                                                                    <input type="text" class="form-control" name="panno" id="pannumber" disabled="" placeholder="<?php
                                                                    if ($data->pan_no == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->pan_no;
                                                                    }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="font-weight-semibold" for="tinvatno">Tin Vat Number :</label>                            
                                                                    <input type="text" class="form-control" name="tinvatno" id="tinvatno" disabled="" placeholder="<?php
                                                                    if ($data->tin_vat_no == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->tin_vat_no;
                                                                    }
                                                                    ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <a href="Edit-Restaurant-Bank-Details" class="btn change-profile-btn" name="editbankdetails">Edit Bank Details</a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>

                                                            <div class = "form-row">
                                                                <div class = "form-group col-md-6">
                                                                    <label class = "font-weight-semibold" for = "bankname">Bank Name :</label>
                                                                    <input type = "text" check_control="alpha" class = "form-control" name = "bankname" id = "bankname" value = "<?php
                                                                    if ($data->bank_name == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->bank_name;
                                                                    }
                                                                    ?>">
                                                                    <p class="form-php-error">
                                                                        <?php
                                                                        if (form_error("bankname")) {
                                                                            echo form_error("bankname");
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>

                                                                <div class = "form-group col-md-6">
                                                                    <label class = "font-weight-semibold" for = "branchname">Branch Name :</label>
                                                                    <input type = "text" check_control="alpha" class = "form-control" name = "branchname"  id = "branchname" value = "<?php
                                                                    if ($data->branch_name == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->branch_name;
                                                                    }
                                                                    ?>">
                                                                    <p class="form-php-error">
                                                                        <?php
                                                                        if (form_error("branchname")) {
                                                                            echo form_error("branchname");
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class = "form-row">
                                                                <div class = "form-group col-md-6">
                                                                    <label class = "font-weight-semibold" check_control="number" for = "acno">Account Number :</label>
                                                                    <input type = "text" class = "form-control" name = "acno" id = "acno"  value = "<?php
                                                                    if ($data->ac_no == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->ac_no;
                                                                    }
                                                                    ?>">
                                                                    <p class="form-php-error">
                                                                        <?php
                                                                        if (form_error("acno")) {
                                                                            echo form_error("acno");
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                                <div class = "form-group col-md-6">
                                                                    <label class = "font-weight-semibold" for = "IFSCcode">IFSC Code:</label>
                                                                    <input type = "text" class = "form-control" check_control="alpha" name = "IFSCcode" id = "IFSCcode"  value = "<?php
                                                                    if ($data->IFSC_code == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->IFSC_code;
                                                                    }
                                                                    ?>">
                                                                    <p class="form-php-error">
                                                                        <?php
                                                                        if (form_error("IFSCcode")) {
                                                                            echo form_error("IFSCcode");
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class = "form-row">
                                                                <div class = "form-group col-md-6">
                                                                    <label class = "font-weight-semibold" for = "benificiary">Bank Benificiary Name :</label>
                                                                    <input type = "text" class = "form-control" check_control="" name = "bankbenificiary" id = "benificiary"  value = "<?php
                                                                    if ($data->bank_benificiary_name == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->bank_benificiary_name;
                                                                    }
                                                                    ?>">
                                                                    <p class="form-php-error">
                                                                        <?php
                                                                        if (form_error("bankbenificiary")) {
                                                                            echo form_error("bankbenificiary");
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                                <div class = "form-group col-md-6">
                                                                    <label class = "font-weight-semibold" for = "pannumber">Pan Card Number :</label>
                                                                    <input type = "text" class = "form-control" check_control="" name = "panno" id = "pannumber" value = "<?php
                                                                    if ($data->pan_no == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->pan_no;
                                                                    }
                                                                    ?>">
                                                                    <p class="form-php-error">
                                                                        <?php
                                                                        if (form_error("panno")) {
                                                                            echo form_error("panno");
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class = "form-row">
                                                                <div class = "form-group col-md-6">
                                                                    <label class = "font-weight-semibold" for = "tinvatno">Tin Vat Number :</label>
                                                                    <input type = "text" class = "form-control" check_control="" name = "tinvatno" id = "tinvatno"  value = "<?php
                                                                    if ($data->tin_vat_no == "") {
                                                                        echo 'Data Not Found';
                                                                    } else {
                                                                        echo $data->tin_vat_no;
                                                                    }
                                                                    ?>">
                                                                    <p class="form-php-error">
                                                                        <?php
                                                                        if (form_error("tinvatno")) {
                                                                            echo form_error("tinvatno");
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class = "form-row">
                                                                <div class = "form-group col-md-12">
                                                                    <button type="submit" value="updatebankdetails" name="updatebankdetails" class="btn change-profile-btn">Update Bank Details</button>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div id="tab-network" class="provider-section" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Service Locations</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post" action="">
                                                        <?php
                                                        if (!isset($seller_location_info)) {
                                                            ?>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label class="font-weight-semibold" for="fullAddress">State:</label>            
                                                                    <select autofocus="" name="state" class="form-control" disabled="">
                                                                        <option>
                                                                            <?php
                                                                            if (count($location_detail) == 0) {
                                                                               echo "Data Not Found";
                                                                            } else {
                                                                                
                                                                                 echo $location_detail[0]->state;
                                                                            }
                                                                            ?>
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label class="font-weight-semibold" for="fullAddress">City:</label>            
                                                                    <select name="city" class="form-control" disabled="">
                                                                        <option><?php
                                                                            if (count($location_detail) == 0) {
                                                                               echo "Data Not Found";
                                                                            } else {
                                                                                
                                                                                 echo $location_detail[0]->city;
                                                                            }
                                                                            ?>
                                                                        </option>
                                                                    </select>
                                                                </div> 
                                                                <div class="form-group col-md-4">
                                                                    <label class="font-weight-semibold" for="fullAddress">Area:</label>            
                                                                    <select name="area" class="form-control" disabled="">
                                                                        <option>
                                                                            <?php
                                                                            if (count($location_detail) == 0) {
                                                                               echo "Data Not Found";
                                                                            } else {
                                                                                
                                                                                 echo $location_detail[0]->area;
                                                                            }
                                                                            ?>
                                                                        </option>
                                                                    </select>
                                                                </div> 
                                                            </div>
                                                            <div class="form-row">

                                                                <div class="form-group col-md-12">
                                                                    <label class="font-weight-semibold" for="locmap">Work Location Map:</label>                            
                                                                    <input type="text" id="locmap" class="locmap form-control" value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.942535551661!2d72.86207421488687!3d21.234127185887505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f1a6f801b9f%3A0xf9141eda48610fdb!2sNova%20One%20Click%20Solution!5e0!3m2!1sen!2sin!4v1575889003656!5m2!1sen!2sin" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Need Help ?</a>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <a href="Edit-Restaurant-Location-Info" class="btn change-profile-btn" name="editlocation">Edit Service Area</a>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label class="font-weight-semibold" for="fullAddress">State:</label>            
                                                                    <select autofocus="" name="state" class="form-control" onchange="set_combo1('city', this.value);">
                                                                        <option>Select State</option>
                                                                        <?php
                                                                        foreach ($state_detail as $state) {
                                                                            ?>
                                                                            <option value="<?php echo $state->location_id; ?>"><?php echo $state->name; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label class="font-weight-semibold" for="fullAddress">City:</label>            
                                                                    <select name="city" class="form-control" id="city" onchange="set_combo1('area', this.value);">
                                                                        <option>Select City</option>

                                                                    </select>
                                                                </div> 
                                                                <div class="form-group col-md-4">
                                                                    <label class="font-weight-semibold" for="fullAddress">Area:</label>            
                                                                    <select name="area" class="form-control" id="area">
                                                                        <option>Select Area</option>

                                                                    </select>
                                                                </div> 
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="font-weight-semibold" for="locmap">Work Location Map:</label>                            
                                                                    <input type="text" id="locmap" class="locmap form-control" value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.942535551661!2d72.86207421488687!3d21.234127185887505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f1a6f801b9f%3A0xf9141eda48610fdb!2sNova%20One%20Click%20Solution!5e0!3m2!1sen!2sin!4v1575889003656!5m2!1sen!2sin">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Need Help ?</a>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <button class="btn btnadd m-t-30" type="submit" value="updatelocation" name="updatelocation">Update Service Area</button>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-notification" class="provider-section" style="display:none;">
                                    <form action="" name="banner_upload" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12  mx-auto">
                                                <h4>Gallery</h4>

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="main-cover">
                                                                <label class="cover-label" for="cover-img">
                                                                    <div class="user-cover" style="background: url('<?php echo base_url(); ?>seller_assets/images/seller_profile/cover_3.jpg')">
                                                                        <div class="cover-overlay">
                                                                            <i class="fas fa-camera-retro text-white fa-3x" title="Choose Cover Image"></i>
                                                                            <input type="file" name="cover" id="cover-img" style="display: none;" onchange="readURL(this);">
                                                                            <p class="form-php-error"><?php
                                                                                if ($this->upload->display_errors()) {
                                                                                    echo $this->upload->display_errors();
                                                                                }
                                                                                ?></p>
                                                                        </div>
                                                                    </div>  
                                                                </label>
                                                                <label class="cover-img" for="user-img">
                                                                    <div class="user-img">
                                                                        <div class="img-overlay">
                                                                            <?php
                                                                            if ($seller_detail[0]->profile_pic == "") {
                                                                                ?>
                                                                                <img class="img" src="<?php echo base_url(); ?>seller_assets/images/seller_profile/default_profile.jpg"  alt="">
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <img class="img" src="<?php echo base_url() . $seller_detail[0]->profile_pic; ?>"  alt="">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <i class="fas fa-camera text-white icon" style="font-size: 25px;" title="Choose Profile Picture"></i>
                                                                            <input type="file" id="user-img" name="seller_profile" onchange="readURL1(this);" style="display: none;">
                                                                            <p class="form-php-error"></p>
                                                                        </div>
                                                                    </div>  
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="container">
                                            <input type="submit" name="apply" value="Apply" class="btn btnadd" style="margin-top: 10%;margin-left: 95%;">
                                        </div>
                                    </form>
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
        <!-- Content Wrapper END -->
        <!-- <button type="button" class="btn btn-primary" >Large modal</button> -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="padding: 30px;">
                    <center>
                        <img src="<?php echo base_url(); ?>seller_assets/images/logo/lg.jpg" width="100%" >

                    </center>
                </div>
            </div>
        </div>

        <!-- Page Container END -->
        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js" type="text/javascript"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.provider-tab-link');
            const sections = document.querySelectorAll('.provider-section');

            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('data-target');

                    links.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    sections.forEach(section => {
                        section.style.display = 'none';
                    });

                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        targetSection.style.display = 'block';
                    }
                });
            });
        });
        </script>

    </body>
</html>