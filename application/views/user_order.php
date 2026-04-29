<!DOCTYPE html>

<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Order | TaskRabbit</title>
        <?php
        $this->load->view("CSS");
        ?>
    </head>

    <body style="background: linear-gradient(180deg, #fffdf8 0%, #f8fafc 45%, #fdf2f8 100%);">
        <!-- Navigation -->
        <?php
        $this->load->view("header");
        ?>

        <div class="main-sec" style="height: 70px;"></div>
        <?php
        $this->load->view("user_profile_top");
        ?>

        <style>
            .booking-tabs { margin-bottom: 24px; }
            .booking-tabs .nav-tabs { border: none; display: inline-flex; padding: 6px; border-radius: 999px; background: #f8fafc; gap: 8px; }
            .booking-tabs .nav-tabs > li { float: none; margin: 0; }
            .booking-tabs .nav-tabs > li > a { border: none !important; border-radius: 999px; margin: 0; padding: 12px 18px; color: #6b7280; font-weight: 700; background: transparent; transition: all 0.3s ease; }
            .booking-tabs .nav-tabs > li.active > a,
            .booking-tabs .nav-tabs > li.active > a:hover,
            .booking-tabs .nav-tabs > li.active > a:focus { color: #fff; background: linear-gradient(135deg, #fb923c 0%, #f472b6 100%); box-shadow: 0 12px 24px rgba(244, 114, 182, 0.22); }
            .booking-summary-chip { display: inline-flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 14px; background: #fff7ed; color: #9a3412; font-size: 13px; font-weight: 700; }
            .booking-summary-chip i { color: #fb923c; }
            .booking-table-card { border-radius: 20px; border: 1px solid #edf2f7; background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.96)); overflow: hidden; box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.8); transition: transform 0.3s ease, box-shadow 0.3s ease; }
            .booking-table-card:hover { transform: translateY(-2px); box-shadow: 0 18px 34px rgba(15, 23, 42, 0.08); }
            .booking-table-wrap { overflow-x: auto; }
            .booking-table { width: 100%; margin-bottom: 0; border-collapse: separate; border-spacing: 0; }
            .booking-table thead th { padding: 18px 20px; border: none !important; background: #f8fafc; color: #6b7280; font-size: 12px; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; }
            .booking-table tbody td { padding: 20px; border-top: 1px solid #eef2f7 !important; border-left: none !important; border-right: none !important; border-bottom: none !important; color: #1f2937; font-size: 14px; vertical-align: middle !important; }
            .booking-table tbody tr { transition: background 0.25s ease; }
            .booking-table tbody tr:hover { background: rgba(251, 146, 60, 0.04); }
            .booking-cell-strong { font-weight: 700; color: #111827; }
            .booking-status-badge { display: inline-flex; align-items: center; justify-content: center; min-width: 96px; padding: 8px 14px; border-radius: 999px; font-size: 12px; font-weight: 800; letter-spacing: 0.02em; text-transform: capitalize; }
            .booking-status-accepted { background: rgba(34, 197, 94, 0.14); color: #166534; }
            .booking-status-pending { background: rgba(250, 204, 21, 0.2); color: #854d0e; }
            .booking-status-expired, .booking-status-cancelled, .booking-status-rejected { background: rgba(248, 113, 113, 0.16); color: #991b1b; }
            .booking-status-default { background: #f3f4f6; color: #4b5563; }
            .booking-empty-state { padding: 46px 20px !important; text-align: center; color: #6b7280; font-weight: 600; }

            @media (max-width: 767px) {
                .booking-tabs .nav-tabs { display: flex; width: 100%; }
                .booking-tabs .nav-tabs > li { flex: 1 1 auto; }
                .booking-tabs .nav-tabs > li > a { text-align: center; }
                .booking-table thead th, .booking-table tbody td { padding: 16px 14px; }
            }
        </style>

        <div class="container dashboard-shell">
            <div class="row">
                <?php
                $this->load->view("user_profile_sidebar");
                ?>
                <div class="col-md-9 col-sm-9 col-xs-12 dashboard-main-column">
                    <div class="dashboard-panel user-menu-display">
                        <div class="dashboard-panel-header">
                            <div>
                                <h2>Booking</h2>
                                <p>Track your booking history in a cleaner, more organized workspace.</p>
                            </div>
                            <div class="booking-summary-chip">
                                <i class="fa fa-calendar-check-o"></i>
                                <span><?php echo count($res_ord_detail_active); ?> booking<?php if(count($res_ord_detail_active) != 1){ echo "s"; } ?></span>
                            </div>
                        </div>

                        <div class="dashboard-section-body booking-tabs wishlist-nav">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="wishlist-li active" id="wishlist-item">
                                    <a href="#fooditem" aria-controls="fooditem" role="tab" data-toggle="tab">History booking</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="fooditem">
                                    <div class="wishlist-item restaurant-wishlist" id="user_wishlist_item">
                                        <div class="booking-table-card">
                                            <div class="booking-table-wrap">
                                                <table class="table booking-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tasker name</th>
                                                            <th>Category</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(count($res_ord_detail_active)==0){ ?>
                                                        <tr><td colspan="7" class="booking-empty-state">No Data</td></tr>
                                                        <?php } ?>

                                                        <?php foreach($res_ord_detail_active as $row){ ?>
                                                        <?php
                                                            $status_class = "booking-status-default";
                                                            $booking_status = strtolower(trim($row->booking_status));
                                                            if($booking_status == "accepted"){ $status_class = "booking-status-accepted"; }
                                                            elseif($booking_status == "pending"){ $status_class = "booking-status-pending"; }
                                                            elseif($booking_status == "expired"){ $status_class = "booking-status-expired"; }
                                                            elseif($booking_status == "cancelled"){ $status_class = "booking-status-cancelled"; }
                                                            elseif($booking_status == "rejected"){ $status_class = "booking-status-rejected"; }
                                                        ?>
                                                        <tr>
                                                            <td class="booking-cell-strong"><?php echo $row->restaurant_name; ?></td>
                                                            <td><?php echo $row->category_name; ?></td>
                                                            <td><?php echo $row->service_date; ?></td>
                                                            <td><?php echo $row->service_time; ?></td>
                                                            <td><span class="booking-status-badge <?php echo $status_class; ?>"><?php echo $row->booking_status; ?></span></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="cancelorder">
                                    <div class="row wishlist-item restaurant-wishlist" id="user_wishlist_cancel"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $this->load->view("footer");
        ?>
        <!-- footer -->
        <!-- modal-boxes -->

        <div class="modal fade bs-example-modal-md-checkout" id="cancelmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="model-remove">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/cancel-order.png" style="height: 100px;width:100px;">
                        <h5 class="margin-bottom-5"> Are you sure want to Cancel Order ? </h5>
                        <p>If your order is prepared and on the way to deliver then you will pay cancellation charges which is add on your next order.</p>
                        <input type="hidden" id="modal-cancel-bill-id">
                        <div class="order-btn-reorder">
                            <a  class="btn btn-checkout-modal" onclick="cancelorder($('#modal-cancel-bill-id').val())">Yes</a>
                            <a class="btn btn-cancel" data-dismiss="modal">No</a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade bs-example-modal-md-checkout" id="reordermodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="model-remove">
                    <center>
                        <img src="<?php echo base_url(); ?>assets/img/cancel-order.png" style="height: 100px;width:100px;">
                        <h5 class="margin-bottom-10 margin-top-15"> Are you sure want to Reorder ? </h5>
                        <p>If the items you ordered earlier may not be available when you reorder, please check the item in the cart when ordering.</p>
                        <input type="hidden" id="modal-reorder-bill-id">
                        <div class="order-btn-reorder">
                            <a  class="btn btn-checkout-modal" onclick="reorder($('#modal-reorder-bill-id').val())">Yes</a>
                            <a class="btn btn-cancel" data-dismiss="modal">No</a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade" id="address-box">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title fw-700">Change Address</h4>
                    </div>
                    <div class="modal-body">
                        <div class="location-picker">
                            <input type="text" class="form-control" placeholder="Enter a new address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="search-box">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="search-box p-relative full-width">
                            <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                        </div>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

    <?php
    $this->load->view("footerscript");
    ?>
</body>



</html>
