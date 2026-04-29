<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">


    <head>
        <title>User-Review | Munchbox-Foodies food</title>
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
            .review-scroll,
            .review-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px; }
            .review-empty-state { grid-column: 1 / -1; padding: 40px 24px; border-radius: 20px; background: linear-gradient(180deg, #ffffff, #f8fafc); border: 1px solid #edf2f7; text-align: center; }
            .review-empty-state img { max-width: 220px; width: 100%; margin-bottom: 18px; }
            .review-empty-state h3 { margin: 0 0 8px; font-size: 22px; font-weight: 800; color: #111827; }
            .review-empty-state h6 { margin: 0; font-size: 14px; color: #6b7280; }
            .review-card { height: 100%; padding: 22px; border-radius: 22px; border: 1px solid #edf2f7; background: linear-gradient(180deg, #ffffff, #fbfdff); box-shadow: 0 16px 34px rgba(15, 23, 42, 0.06); transition: transform 0.3s ease, box-shadow 0.3s ease; }
            .review-card:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1); }
            .review-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 18px; }
            .review-user { display: flex; align-items: center; gap: 14px; }
            .review-avatar-shell { width: 56px; height: 56px; border-radius: 50%; padding: 3px; background: linear-gradient(135deg, rgba(251, 146, 60, 0.9), rgba(244, 114, 182, 0.85)); box-shadow: 0 12px 24px rgba(251, 146, 60, 0.18); flex: 0 0 auto; }
            .review-avatar-shell img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; border: 3px solid #fff; background: #fff; }
            .reviewer-name p { margin: 0; font-size: 16px; font-weight: 800; color: #111827 !important; }
            .review-service-name { margin: 4px 0 0; color: #6b7280; font-size: 13px; font-weight: 600; }
            .review-date { white-space: nowrap; padding: 8px 12px; border-radius: 999px; background: #f8fafc; color: #6b7280; font-size: 12px; font-weight: 700; }
            .review-stars { display: flex; align-items: center; gap: 4px; margin-bottom: 14px; }
            .review-stars .filled-star { color: #f59e0b; }
            .review-stars .empty-star { color: #d1d5db; }
            .review-copy { margin: 0; color: #374151 !important; font-size: 14px; line-height: 1.75; }

            @media (max-width: 991px) {
                .review-scroll, .review-grid { grid-template-columns: 1fr; }
            }

            @media (max-width: 575px) {
                .review-card-top { flex-direction: column; }
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
                                <h2>Review</h2>
                                <p>Your customer feedback, presented in a polished and readable card layout.</p>
                            </div>
                        </div>
                        <div class="dashboard-section-body">
                            <div class="<?php 
                                if(count($user_review_rating) >= 5)
                                {
                                    echo "review-scroll";
                                }
                                else
                                {
                                    echo "review-grid";
                                }
                            ?>">
                            <?php
                            if (count($user_review_rating) == 0) {
                                ?>
                                <div class="wishlist-empty review-empty-state">
                                    <center>
                                        <img src="<?php echo base_url(); ?>assets/img/noreview.png">
                                        <h3>Where is the Reviews And Rating?</h3>
                                        <h6>Once you Give Reviews and Rating, it will appear here.</h6>
                                    </center>
                                </div>
                                <?php
                            } else {
                                foreach($user_review_rating as $single)
                                {
                                ?>
                                <div class="review-box review-card">
                                    <div class="review-card-top">
                                        <div class="review-user">
                                            <div class="review-avatar-shell review-user-img">
                                               <?php    
                                                if($single->profile != "")
                                                        {
                                            ?>
                                                            <img src="<?php echo base_url().$single->profile; ?>" class="rounded-circle review-user-img-icon" alt="userimg"> 
                                            <?php
                                                        }
                                                        else
                                                        {
                                            ?>
                                                           <img class="round" height="30" width="30" avatar="<?php echo substr($single->name, 0,1); ?>">
                                            <?php                
                                                        }
                                             ?>    
                                            </div>
                                            <div class="reviewer-name">
                                                <p class="fs-17 text-light-black fw-600 font-size-27"><?php echo ucwords($single->name); ?></p>
                                                <p class="review-service-name"><?php echo $single->restaurant_name; ?></p>
                                            </div>
                                        </div>
                                        <div class="review-date"><span class="text-light-white"><?php echo date("M d,Y",strtotime($single->date)); ?></span></div>
                                    </div>
                                    <div class="ratings review-stars"> 
                                        <?php $cnt_star = round($single->rating); 
                                        for($i = 1;$i<=5;$i++)
                                        {
                                            if($i <= $cnt_star)
                                            {
                                        ?>
                                        <span class="text-yellow fs-16 filled-star">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    <?php
                                            }
                                            else
                                            {
                                     ?>
                                    <span class="text-dark-white fs-16 empty-star">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    <?php
                                            }
                                        }
                                    ?>
                                    </div>
                                    <p class="text-light-black review-copy"><?php echo ucfirst($single->review); ?></p>
                                </div>
                                <?php
                                }
                            }
                            ?>
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
