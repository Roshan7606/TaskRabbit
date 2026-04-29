<style>
.dashboard-sidebar-column {
    margin-bottom: 24px;
}

.dashboard-sidebar {
    position: sticky;
    top: 96px;
    padding: 18px;
    border-radius: 24px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(226, 232, 240, 0.9);
    box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
    animation: dashboardFadeUp 0.7s ease both;
}

.dashboard-sidebar-brand {
    margin-bottom: 18px;
    padding: 14px 16px 18px;
    border-bottom: 1px solid rgba(226, 232, 240, 0.85);
}

.dashboard-sidebar-brand span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    margin-bottom: 12px;
    border-radius: 14px;
    background: linear-gradient(135deg, #fb923c 0%, #f472b6 100%);
    color: #fff;
    box-shadow: 0 12px 24px rgba(244, 114, 182, 0.2);
}

.dashboard-sidebar-brand h4 {
    margin: 0;
    font-size: 18px;
    font-weight: 800;
    color: #111827;
}

.dashboard-sidebar-brand p {
    margin: 6px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.dashboard-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.dashboard-menu li + li {
    margin-top: 8px;
}

.dashboard-menu a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    border-radius: 16px;
    color: #4b5563;
    text-decoration: none !important;
    font-size: 14px;
    font-weight: 600;
    transition: transform 0.3s ease, background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
}

.dashboard-menu a i {
    width: 20px;
    text-align: center;
    font-size: 15px;
}

.dashboard-menu a:hover,
.dashboard-menu a:focus {
    color: #111827;
    background: #f8fafc;
    transform: translateX(4px);
}

.dashboard-menu a.is-active {
    color: #111827;
    background: linear-gradient(135deg, rgba(251, 146, 60, 0.16), rgba(244, 114, 182, 0.14));
    box-shadow: inset 0 0 0 1px rgba(251, 146, 60, 0.16);
}

.dashboard-menu a.is-active i {
    color: #fb923c;
}

@media (max-width: 991px) {
    .dashboard-sidebar {
        position: static;
        top: auto;
    }
}
</style>

<div class="col-md-3 col-sm-3 col-xs-12 dashboard-sidebar-column">
    <aside class="dashboard-sidebar user-menu">
        <div class="dashboard-sidebar-brand">
            <span><i class="fa fa-th-large"></i></span>
            <h4>Dashboard</h4>
            <p>Manage your account, bookings, and settings.</p>
        </div>
        <ul class="dashboard-menu">
            <li>
                <a href="<?php echo base_url("User-Order");?>" data-dashboard-link>
                    <i class="fa fa-calendar"></i>
                    <span>Booking</span>
                </a>
            </li>
            <!-- <li><a href="<?php echo base_url("User-Favourite");?>"><i class="fa fa-heart"></i><span>Favourite</span></a></li>
            <li><a href="<?php echo base_url("User-Review");?>"><i class="fas fa-address-book"></i><span>Review</span></a></li> -->
            <!-- <li><a href="<?php echo base_url("User-Shipment");?>"><i class="fa fa-truck"></i><span>Shipment</span></a></li> -->
            <li>
                <a href="<?php echo base_url("User-Editprofile");?>" data-dashboard-link>
                    <i class="fa fa-user"></i>
                    <span>Edit Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url("User-Setting");?>" data-dashboard-link>
                    <i class="fa fa-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url("User-Logout");?>" data-dashboard-link>
                    <i class="fa fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

<script>
(function () {
    var currentPath = window.location.pathname.replace(/\/+$/, '').toLowerCase();
    var links = document.querySelectorAll('[data-dashboard-link]');

    for (var i = 0; i < links.length; i++) {
        var linkPath = links[i].pathname.replace(/\/+$/, '').toLowerCase();
        if (linkPath && currentPath.indexOf(linkPath) !== -1) {
            links[i].classList.add('is-active');
        }
    }
})();
</script>
