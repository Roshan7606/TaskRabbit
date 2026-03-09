<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TASKRABBIT - My Services</title>

        <?php
        $this->load->view("seller/headerscript");
        ?>
    </head>
    <body>
        <div class="app">
            <div class="layout">

                <!-- Header START -->
                <?php
                $this->load->view("seller/head");
                ?>
                <!-- Header END -->

                <!-- Side Nav START -->
                <?php
                $this->load->view("seller/sidebar");
                ?>
                <!-- Side Nav END -->

                <!-- Page Container START -->
                <div class="page-container">

                    <!-- Content Wrapper START -->
                    <div class="main-content">

                        <?php
                        $res_detail = $this->md->my_select(
                            "tbl_restaurant",
                            "*",
                            array("restaurant_id" => $this->session->userdata("seller_email"))
                        );
                        ?>

                        <div class="page-header no-gutters">
                            <div class="d-md-flex align-items-md-center justify-content-between">
                                <div class="media m-v-10 align-items-center">
                                    <div class="avatar avatar-image avatar-lg">
                                        <?php if (!empty($res_detail) && $res_detail[0]->profile_pic == "") { ?>
                                            <img class="round" height="30" width="40" avatar="<?php echo substr($res_detail[0]->owner_name, 0, 1); ?>">
                                        <?php } else if (!empty($res_detail)) { ?>
                                            <img src="<?php echo base_url() . $res_detail[0]->profile_pic; ?>" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="media-body m-l-15">
                                        <h4 class="m-b-0">
                                            <?php
                                            if (!empty($res_detail)) {
                                                echo ucwords($res_detail[0]->owner_name);
                                            }
                                            ?>
                                        </h4>
                                        <span class="text-gray">Manage your service categories and pricing</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="m-b-20">My Services</h4>
                                <p class="m-b-25">Select the services you want to offer and enter your service price.</p>

                                <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php } ?>

                                <form method="post" action="<?php echo base_url('Restaurant/save_services'); ?>">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px; text-align: center;">Select</th>
                                                    <th>Service Category</th>
                                                    <th style="width: 220px;">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($categories)) { ?>
                                                    <?php foreach ($categories as $cat) { ?>
                                                        <?php
                                                        $checked = '';
                                                        $saved_price = '';

                                                        if (!empty($provider_services)) {
                                                            foreach ($provider_services as $ps) {
                                                                if ($ps->category_id == $cat->category_id) {
                                                                    $checked = 'checked';
                                                                    $saved_price = $ps->service_price;
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <input type="checkbox" name="category_id[]" value="<?php echo $cat->category_id; ?>" <?php echo $checked; ?>>
                                                            </td>
                                                            <td style="vertical-align:middle;">
                                                                <strong><?php echo $cat->name; ?></strong>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="number"
                                                                    name="price[<?php echo $cat->category_id; ?>]"
                                                                    class="form-control"
                                                                    placeholder="Enter price"
                                                                    value="<?php echo $saved_price; ?>"
                                                                    min="0"
                                                                >
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="3" class="text-center">No service categories found.</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="m-t-20">
                                        <button type="submit" class="btn btn-primary">Save Services</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- Content Wrapper END -->

                    <?php
                    $this->load->view("seller/footer");
                    ?>
                </div>
                <!-- Page Container END -->

            </div>
        </div>

        <?php
        $this->load->view("seller/footerscript");
        ?>
    </body>
</html>