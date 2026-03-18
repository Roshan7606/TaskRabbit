<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TASKRABBIT - Booking Requests</title>

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
                                        <span class="text-gray">Manage customer booking requests</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="m-b-20">Booking Requests</h4>
                                <p class="m-b-25">Here you can view, accept, or reject service booking requests from users.</p>

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

                                <?php if (!empty($bookings)) { ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Service</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th>Timer</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($bookings as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $row->booking_id; ?></td>
                                                        <td><?php echo $row->category_name; ?></td>
                                                        <td><?php echo $row->customer_name; ?></td>
                                                        <td><?php echo $row->customer_phone; ?></td>
                                                        <td><?php echo $row->customer_email; ?></td>
                                                        <td><?php echo $row->customer_address; ?></td>
                                                        <td><?php echo $row->customer_description; ?></td>
                                                        <td><?php echo $row->service_date; ?></td>
                                                        <td><?php echo $row->service_time; ?></td>
                                                        <td>
                                                            <?php if ($row->booking_status == "pending") { ?>
                                                                <span class="badge badge-warning">Pending</span>
                                                            <?php } elseif ($row->booking_status == "accepted") { ?>
                                                                <span class="badge badge-success">Accepted</span>
                                                            <?php } elseif ($row->booking_status == "rejected") { ?>
                                                                <span class="badge badge-danger">Rejected</span>
                                                            <?php } elseif ($row->booking_status == "expired") { ?>
                                                                <span class="badge badge-secondary">Expired</span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-info"><?php echo ucfirst($row->booking_status); ?></span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row->booking_status == "pending") { ?>
                                                                <span class="booking-timer" data-expires="<?php echo strtotime($row->expires_at); ?>">00:00</span>
                                                            <?php } else { ?>
                                                                00:00
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row->booking_status == "pending") { ?>
                                                                <a href="<?php echo base_url('Restaurant-Accept-Booking/'.$row->booking_id); ?>" class="btn btn-success btn-sm m-b-5">Accept</a>
                                                                <a href="<?php echo base_url('Restaurant-Reject-Booking/'.$row->booking_id); ?>" class="btn btn-danger btn-sm m-b-5" onclick="return confirm('Are you sure you want to reject this booking?')">Reject</a>
                                                            <?php } else { ?>
                                                                <span>-</span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning">
                                        No booking requests found.
                                    </div>
                                <?php } ?>
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

        <script>
            function updateBookingTimers()
            {
                var now = Math.floor(Date.now() / 1000);

                var timers = document.querySelectorAll('.booking-timer');

                timers.forEach(function(el) {
                    var expires = parseInt(el.getAttribute('data-expires'));
                    var diff = expires - now;

                    if (diff < 0) {
                        diff = 0;
                    }

                    var min = Math.floor(diff / 60);
                    var sec = diff % 60;

                    if (min < 10) min = '0' + min;
                    if (sec < 10) sec = '0' + sec;

                    el.innerHTML = min + ':' + sec;
                });
            }

            updateBookingTimers();
            setInterval(updateBookingTimers, 1000);
            setInterval(function(){
                location.reload();
            }, 5000);
        </script>
    </body>
</html>