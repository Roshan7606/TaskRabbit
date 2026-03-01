<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Munchbox | Restaurant Order</title>
        <?php
        $this->load->view("seller/headerscript");
        ?>
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
                            <h2 class="font-weight-normal">Orders</h2>
                            <ul class="nav nav-tabs" >
                                <li class="nav-item">
                                    <a class="nav-link active" onclick="setordertabdata('prepared')" data-toggle="tab" href="#tab-account">Pending</a>
                                </li>
                                <li class="nav-item">
                                    <a onclick="setordertabdata('prepared')" class="nav-link" data-toggle="tab" href="#tab-bank">Prepared</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="setordertabdata('readydeliver')" data-toggle="tab" href="#tab-network">Ready to Deliver</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" id="tab-account" >
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Pending Orders :</h4>
                                    </div>
                                    <div class="card-body" id="pending_orders">
                                        <?php
                                        if (count($pending_orders) == 0) {
                                            ?>
                                            <center>
                                                <img src="<?php echo base_url(); ?>seller_assets/images/others/no-order.png" class="panding-order-img">
                                                <h3 class="margin-top-10">No Pending Orders Found...</h3>
                                            </center>
                                            <?php
                                        } else {
                                            ?>

                                            <div class="table-responsive">
                                                <table class="table table-hover e-commerce-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Id</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact No</th>
                                                            <th>Email</th>
                                                            <th>Amount</th>
                                                            <th class="text-center">view</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($pending_orders as $single) {
                                                            ?>
                                                            <tr>

                                                                <td>#<?php echo $single->bill_number; ?></td>
                                                                <td><?php echo ucwords($single->name); ?></td>
                                                                <td><a title="Click Here To Contact Customer" href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>

                                                                <td><a <a title="Click Here To Send Mail To Customer" href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                                                <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                                                <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'pending');"  data-toggle="modal" data-target="#pendingModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                                                <td> <a title="Click Here To Send Item for Prepared" onclick="orderprocess('<?php echo $single->bill_id; ?>', 'pending')"><p class="margin-bottom-none btn-send-table">Send To Prepare</p></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-bank">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Prepared Orders :</h4>
                                    </div>
                                    <div class="card-body"id="prepared_orders">
                                        <?php
                                        if (count($prepared_orders) == 0) {
                                            ?>
                                            <center>
                                                <img src="<?php echo base_url(); ?>seller_assets/images/others/prepared.png" class="panding-order-img">
                                                <h3 class="margin-top-10">No Prepared Orders Found...</h3>
                                            </center>
                                            <?php
                                        } else {
                                            ?>

                                            <div class="table-responsive">
                                                <table class="table table-hover e-commerce-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Id</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact No</th>
                                                            <th>Email</th>
                                                            <th>Amount</th>
                                                            <th class="text-center">view</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($prepared_orders as $single) {
                                                            ?>
                                                            <tr>

                                                                <td>#<?php echo $single->bill_number; ?></td>
                                                                <td><?php echo ucwords($single->name); ?></td>
                                                                <td><a title="Click Here To Contact Customer"  href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>
                                                                <td><a title="Click Here To Send Mail To Customer" href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                                                <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                                                <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'prepared');"  data-toggle="modal" data-target="#preparedModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                                                <td> <a title="Click Here To Send Item for Deliver" onclick="orderprocess('<?php echo $single->bill_id; ?>', 'prepared')"><p class="margin-bottom-none btn-send-table">Send For Deliver</p></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-network">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Ready To Delivered Orders :</h4>
                                    </div>
                                    <div class="card-body" id="readydeliver_orders">

                                        <?php
                                        if (count($deliveredready_orders) == 0) {
                                            ?>
                                            <center>
                                                <img src="<?php echo base_url(); ?>seller_assets/images/others/ready-order.png" class="panding-order-img">
                                                <h3 class="margin-top-10">No Ready To Deliver Orders Found...</h3>
                                            </center>
                                            <?php
                                        } else {
                                            ?>

                                            <div class="table-responsive">
                                                <table class="table table-hover e-commerce-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Id</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact No</th>
                                                            <th>Email</th>
                                                            <th>Amount</th>
                                                            <th class="text-center">view</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($deliveredready_orders as $single) {
                                                            ?>
                                                            <tr>

                                                                <td>#<?php echo $single->bill_number; ?></td>
                                                                <td><?php echo ucwords($single->name); ?></td>
                                                                <td><a title="Click Here To Contact Customer" href="tel:<?php echo $single->contact_no; ?>" class="text-dark">(+91) <?php echo $single->contact_no; ?></a></td>

                                                                <td><a href="mailto:<?php echo $single->email; ?>" class="text-dark"><?php echo $single->email; ?></a></td>
                                                                <td class="text-dark">&#8377;<?php echo $single->amount; ?></td>
                                                                <td><a title="Click Here For View Order Detail" onclick="set_modal('<?php echo $single->bill_id; ?>', 'readydeliver');"  data-toggle="modal" data-target="#readydeliverModal"><p class="margin-bottom-none btn-view-table">View Order</p></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <!-- Content Wrapper END -->
                    <?php
                    $this->load->view("seller/footer");
                    ?>
                </div>
                <!-- Page Container END -->

                <!-- Search Start-->
                <div class="modal modal-left fade search" id="search-drawer">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Search</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-search"></i>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Files</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-cyan avatar-icon">
                                            <i class="anticon anticon-file-excel"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                            <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-blue avatar-icon">
                                            <i class="anticon anticon-file-word"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                            <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-purple avatar-icon">
                                            <i class="anticon anticon-file-text"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                            <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-red avatar-icon">
                                            <i class="anticon anticon-file-pdf"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                            <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Members</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                            <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                        </div>
                                    </div>
                                </div>   
                                <div class="m-t-30">
                                    <h5 class="m-b-20">News</h5> 
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="<?php echo base_url(); ?>seller_assets/images/others/img-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                            <p class="m-b-0 text-muted font-size-13">
                                                <i class="anticon anticon-clock-circle"></i>
                                                <span class="m-l-5">25 Nov 2018</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search End-->

                <!-- Quick View START -->
                <div class="modal fade bs-example-modal-lg" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" id="pending-modal-content">


                        </div>

                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" id="preparedModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" id="prepared-modal-content">


                        </div>

                    </div>
                </div>
                <div class="modal fade bs-example-modal-lg" id="readydeliverModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" id="readydeliver-modal-content">


                        </div>

                    </div>
                </div>
                <div class="modal modal-right fade quick-view" id="quick-view">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Theme Config</h5>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="m-b-30">
                                    <h5 class="m-b-0">Header Color</h5>
                                    <p>Config header background color</p>
                                    <div class="theme-configurator d-flex m-t-10">
                                        <div class="radio">
                                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                                            <label for="header-default"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                                            <label for="header-primary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-success" name="header-theme" type="radio" value="success">
                                            <label for="header-success"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                            <label for="header-secondary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                                            <label for="header-danger"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Side Nav Dark</h5>
                                    <p>Change Side Nav to dark</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                        <label for="side-nav-theme-toogle"></label>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Folded Menu</h5>
                                    <p>Toggle Folded Menu</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                        <label for="side-nav-fold-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <!-- Quick View END -->
            </div>
        </div>
        <?php
        $this->load->view("seller/footerscript");
        ?>
        <script src="<?php echo base_url(); ?>seller_assets/js/munchbox_ajax.js"></script>
        <script>
                                                                            (function (w, d) {


                                                                                function LetterAvatar(name, size) {

                                                                                    name = name || '';
                                                                                    size = size || 60;

                                                                                    var colours = [
                                                                                        "#FF0000", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                                                                                        "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                                                                                    ],
                                                                                            nameSplit = String(name).toUpperCase().split(' '),
                                                                                            initials, charIndex, colourIndex, canvas, context, dataURI;


                                                                                    if (nameSplit.length == 1) {
                                                                                        initials = nameSplit[0] ? nameSplit[0].charAt(0) : '?';
                                                                                    } else {
                                                                                        initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
                                                                                    }

                                                                                    if (w.devicePixelRatio) {
                                                                                        size = (size * w.devicePixelRatio);
                                                                                    }

                                                                                    charIndex = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
                                                                                    colourIndex = charIndex % 20;
                                                                                    canvas = d.createElement('canvas');
                                                                                    canvas.width = size;
                                                                                    canvas.height = size;
                                                                                    context = canvas.getContext("2d");

                                                                                    context.fillStyle = "#FF0000";
                                                                                    context.fillRect(0, 0, canvas.width, canvas.height);
                                                                                    context.font = Math.round(canvas.width / 2) + "px Arial";
                                                                                    context.textAlign = "center";
                                                                                    context.fillStyle = "#FFF";
                                                                                    context.fillText(initials, size / 2, size / 1.5);

                                                                                    dataURI = canvas.toDataURL();
                                                                                    canvas = null;

                                                                                    return dataURI;
                                                                                }

                                                                                LetterAvatar.transform = function () {

                                                                                    Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function (img, name) {
                                                                                        name = img.getAttribute('avatar');
                                                                                        img.src = LetterAvatar(name, img.getAttribute('width'));
                                                                                        img.removeAttribute('avatar');
                                                                                        img.setAttribute('alt', name);
                                                                                    });
                                                                                };


                                                                                // AMD support
                                                                                if (typeof define === 'function' && define.amd) {

                                                                                    define(function () {
                                                                                        return LetterAvatar;
                                                                                    });

                                                                                    // CommonJS and Node.js module support.
                                                                                } else if (typeof exports !== 'undefined') {

                                                                                    // Support Node.js specific `module.exports` (which can be a function)
                                                                                    if (typeof module != 'undefined' && module.exports) {
                                                                                        exports = module.exports = LetterAvatar;
                                                                                    }

                                                                                    // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
                                                                                    exports.LetterAvatar = LetterAvatar;

                                                                                } else {

                                                                                    window.LetterAvatar = LetterAvatar;

                                                                                    d.addEventListener('DOMContentLoaded', function (event) {
                                                                                        LetterAvatar.transform();
                                                                                    });
                                                                                }

                                                                            })(window, document);
        </script>
    </body>
</html>