<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

body {
    font-family: 'Inter', sans-serif !important;
    color: #18212f;
}

.dashboard-shell {
    margin-bottom: 32px;
}

.dashboard-panel {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(226, 232, 240, 0.9);
    border-radius: 20px;
    box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
    backdrop-filter: blur(14px);
    overflow: hidden;
    animation: dashboardFadeUp 0.6s ease both;
}

.dashboard-panel-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 16px;
    padding: 28px 32px 20px;
    border-bottom: 1px solid rgba(226, 232, 240, 0.75);
}

.dashboard-panel-header h2 {
    margin: 0;
    font-size: 24px;
    line-height: 1.2;
    font-weight: 800;
    color: #111827;
}

.dashboard-panel-header p {
    margin: 8px 0 0;
    font-size: 14px;
    color: #6b7280;
}

.dashboard-section-body {
    padding: 24px 32px 32px;
}

.profile-hero-wrap {
    margin-bottom: 28px;
}

.profile-hero-card {
    position: relative;
    overflow: hidden;
    border-radius: 24px;
    padding: 34px 24px;
    text-align: center;
    background:
        radial-gradient(circle at top left, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.86) 40%, rgba(255, 237, 213, 0.7) 100%),
        linear-gradient(135deg, #fff7ed 0%, #ffffff 48%, #eef2ff 100%);
    border: 1px solid rgba(255, 255, 255, 0.85);
    box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
    animation: dashboardFadeUp 0.65s ease both;
}

.profile-hero-card:before,
.profile-hero-card:after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(8px);
    opacity: 0.5;
}

.profile-hero-card:before {
    width: 180px;
    height: 180px;
    top: -80px;
    right: -30px;
    background: rgba(251, 146, 60, 0.18);
}

.profile-hero-card:after {
    width: 140px;
    height: 140px;
    bottom: -55px;
    left: -30px;
    background: rgba(244, 114, 182, 0.14);
}

.profile-hero-inner {
    position: relative;
    z-index: 1;
}

.profile-avatar-frame {
    width: 136px;
    height: 136px;
    margin: 0 auto 18px;
    padding: 6px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(251, 146, 60, 0.9), rgba(244, 114, 182, 0.82));
    box-shadow: 0 18px 40px rgba(251, 146, 60, 0.18);
}

.profile-avatar-frame img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255, 255, 255, 0.92);
    background: #fff;
}

.profile-user-name {
    margin: 0;
    font-size: 28px;
    font-weight: 800;
    color: #111827;
    letter-spacing: -0.02em;
}

.profile-user-meta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 10px;
    padding: 8px 16px;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.72);
    color: #6b7280;
    font-size: 13px;
    font-weight: 600;
    box-shadow: inset 0 0 0 1px rgba(226, 232, 240, 0.9);
}

.profile-user-meta i {
    color: #fb923c;
}

.gradient-action {
    border: none;
    border-radius: 999px;
    background: linear-gradient(135deg, #fb923c 0%, #f472b6 100%);
    color: #fff !important;
    box-shadow: 0 16px 32px rgba(244, 114, 182, 0.22);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gradient-action:hover,
.gradient-action:focus {
    transform: translateY(-2px) scale(1.01);
    box-shadow: 0 18px 38px rgba(244, 114, 182, 0.28);
    color: #fff !important;
}

.dashboard-form-control {
    height: 54px;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
    box-shadow: none;
    padding: 12px 16px;
    background: #fff;
    transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
}

.dashboard-form-control:focus {
    border-color: #fb923c;
    box-shadow: 0 0 0 4px rgba(251, 146, 60, 0.15);
    transform: translateY(-1px);
}

@keyframes dashboardFadeUp {
    from {
        opacity: 0;
        transform: translateY(18px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 991px) {
    .dashboard-panel-header,
    .dashboard-section-body {
        padding-left: 22px;
        padding-right: 22px;
    }

    .profile-hero-card {
        padding: 28px 20px;
    }

    .profile-user-name {
        font-size: 24px;
    }
}
</style>

<div class="main-sec" style="height: 70px;"></div>

<div class="container profile-hero-wrap">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="profile-hero-card">
                <div class="profile-hero-inner">
                    <?php 
                      $record = $this->md->my_select("tbl_user","*",array("user_id"=>$this->session->userdata("user_username")));
                    ?>
                    <div class="user-img">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="profile-avatar-frame">
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
                                 <img id="user_img_profile_top" src="<?php echo base_url().$record[0]->profile;?>" class="round" width="130" height="130" avatar="<?php echo $record[0]->name; ?>">
                                <?php 
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                    <div class="user-name">
                        <p class="profile-user-name"><?php echo ucwords($record[0]->name); ?></p>
                        <div class="profile-user-meta">
                            <i class="fa fa-check-circle"></i>
                            <span>Personal dashboard workspace</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>                     
    </div> 
</div>
