<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TASKRABBIT - Booking Requests</title>

        <?php
        $this->load->view("seller/headerscript");
        ?>
        <style>
            :root {
                --dash-bg: #0f172a;
                --dash-surface: rgba(30, 41, 59, 0.72);
                --dash-surface-strong: rgba(30, 41, 59, 0.92);
                --dash-border: rgba(255, 255, 255, 0.08);
                --dash-border-strong: rgba(255, 107, 0, 0.28);
                --dash-text: #f8fafc;
                --dash-muted: #94a3b8;
                --dash-primary: #ff6b00;
                --dash-secondary: #ff8c42;
            }

            body {
                background:
                    radial-gradient(circle at top left, rgba(59, 130, 246, 0.16), transparent 24%),
                    radial-gradient(circle at top right, rgba(255, 107, 0, 0.18), transparent 22%),
                    radial-gradient(circle at 85% 18%, rgba(255, 140, 66, 0.14), transparent 14%),
                    linear-gradient(180deg, #020617 0%, #0f172a 52%, #111827 100%);
                color: var(--dash-text);
                position: relative;
            }

            body::before {
                content: "";
                position: fixed;
                inset: 0;
                pointer-events: none;
                opacity: 0.06;
                background-image:
                    radial-gradient(rgba(248, 250, 252, 0.16) 0.6px, transparent 0.6px),
                    radial-gradient(rgba(255, 107, 0, 0.14) 0.6px, transparent 0.6px);
                background-position: 0 0, 12px 12px;
                background-size: 24px 24px;
            }

            .page-container,
            .main-content {
                background: transparent;
            }

            .main-content {
                padding: 28px;
                position: relative;
                overflow: hidden;
            }

            .main-content::before,
            .main-content::after {
                content: "";
                position: absolute;
                border-radius: 999px;
                pointer-events: none;
                filter: blur(12px);
            }

            .main-content::before {
                top: -100px;
                right: -90px;
                width: 260px;
                height: 260px;
                background: rgba(255, 107, 0, 0.2);
            }

            .main-content::after {
                bottom: 30px;
                left: -70px;
                width: 220px;
                height: 220px;
                background: rgba(59, 130, 246, 0.14);
            }

            .dashboard-shell {
                position: relative;
                z-index: 1;
                animation: dashboardFade 0.9s cubic-bezier(0.22, 1, 0.36, 1);
            }

            .dashboard-hero {
                position: relative;
                padding: 30px;
                margin-bottom: 28px;
                border-radius: 28px;
                border: 1px solid rgba(255, 255, 255, 0.08);
                background: linear-gradient(135deg, rgba(30, 41, 59, 0.82), rgba(15, 23, 42, 0.94) 42%, rgba(30, 41, 59, 0.92) 100%);
                box-shadow: 0 28px 70px rgba(2, 6, 23, 0.52), 0 0 40px rgba(255, 107, 0, 0.08);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .dashboard-hero::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.08), transparent 35%),
                    radial-gradient(circle at 100% 0%, rgba(255, 140, 66, 0.14), transparent 30%);
                pointer-events: none;
            }

            .dashboard-hero::after {
                content: "";
                position: absolute;
                inset: 1px;
                border-radius: inherit;
                border: 1px solid rgba(255, 255, 255, 0.06);
                pointer-events: none;
            }

            .dashboard-hero > .row,
            .booking-card .card-body {
                position: relative;
                z-index: 1;
            }

            .hero-eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 15px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.12);
                border: 1px solid rgba(255, 107, 0, 0.18);
                color: #fed7aa;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 16px;
            }

            .hero-title {
                margin-bottom: 10px;
                font-size: 2.15rem;
                font-weight: 800;
                line-height: 1.05;
                color: var(--dash-text);
                letter-spacing: -0.03em;
            }

            .hero-description,
            .hero-meta,
            .booking-subtitle,
            .booking-copy,
            .empty-state {
                color: var(--dash-muted);
            }

            .hero-description {
                max-width: 640px;
                margin-bottom: 0;
                line-height: 1.7;
            }

            .hero-profile {
                display: flex;
                justify-content: flex-end;
            }

            .hero-profile-card {
                position: relative;
                width: 100%;
                max-width: 360px;
                padding: 22px;
                border-radius: 24px;
                background: rgba(15, 23, 42, 0.58);
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.06), 0 24px 44px rgba(2, 6, 23, 0.42), 0 0 24px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
            }

            .hero-profile-card:hover {
                transform: translateY(-6px) scale(1.015);
                border-color: rgba(255, 107, 0, 0.24);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08), 0 30px 50px rgba(2, 6, 23, 0.5), 0 0 28px rgba(255, 107, 0, 0.1);
            }

            .hero-profile-top {
                display: flex;
                align-items: center;
                gap: 16px;
                margin-bottom: 18px;
            }

            .dashboard-avatar {
                flex-shrink: 0;
                width: 72px;
                height: 72px;
                border-radius: 22px;
                overflow: hidden;
                background: linear-gradient(135deg, rgba(255, 107, 0, 0.95), rgba(255, 140, 66, 0.88));
                padding: 3px;
                box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.12), 0 16px 32px rgba(255, 107, 0, 0.24);
            }

            .dashboard-avatar img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 19px;
                background: #0f172a;
            }

            .hero-profile-card h4,
            .booking-title,
            .table tbody td strong {
                color: #f8fafc;
            }

            .hero-status {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding-top: 14px;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
            }

            .status-pill {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 14px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.14);
                color: #fed7aa;
                font-size: 0.85rem;
                font-weight: 700;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
            }

            .status-pill i {
                color: var(--dash-primary);
                font-size: 0.7rem;
                animation: pulseDot 1.8s ease-in-out infinite;
            }

            .hero-status small {
                color: #cbd5e1;
                font-size: 0.9rem;
            }

            .booking-card {
                position: relative;
                border-radius: 24px;
                border: 1px solid var(--dash-border);
                background: linear-gradient(180deg, rgba(30, 41, 59, 0.82) 0%, rgba(15, 23, 42, 0.94) 100%);
                box-shadow: 0 24px 52px rgba(2, 6, 23, 0.48), 0 0 30px rgba(255, 107, 0, 0.06);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                overflow: hidden;
            }

            .booking-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(180deg, rgba(255, 255, 255, 0.06), transparent 30%),
                    radial-gradient(circle at top right, rgba(255, 140, 66, 0.12), transparent 28%);
                pointer-events: none;
            }

            .booking-card .card-body {
                padding: 30px;
            }

            .section-label {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 14px;
                padding: 7px 14px;
                border-radius: 999px;
                border: 1px solid rgba(255, 107, 0, 0.18);
                background: rgba(255, 107, 0, 0.12);
                color: #fdba74;
                font-size: 0.78rem;
                font-weight: 800;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .booking-title {
                margin-bottom: 10px;
                font-size: 1.8rem;
                font-weight: 800;
                letter-spacing: -0.03em;
            }

            .booking-subtitle {
                margin-bottom: 24px;
                max-width: 760px;
                font-size: 0.98rem;
                line-height: 1.7;
            }

            .alert {
                border-radius: 16px;
                padding: 15px 18px;
                margin-bottom: 18px;
                border: 1px solid transparent;
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
            }

            .alert-success {
                background: rgba(34, 197, 94, 0.12);
                border-color: rgba(34, 197, 94, 0.2);
                color: #bbf7d0;
                box-shadow: 0 14px 32px rgba(34, 197, 94, 0.08);
            }

            .alert-danger {
                background: rgba(244, 63, 94, 0.12);
                border-color: rgba(244, 63, 94, 0.2);
                color: #fecdd3;
                box-shadow: 0 14px 32px rgba(244, 63, 94, 0.08);
            }

            .alert-warning {
                background: rgba(245, 158, 11, 0.12);
                border-color: rgba(245, 158, 11, 0.22);
                color: #fde68a;
                box-shadow: 0 14px 32px rgba(245, 158, 11, 0.08);
            }

            .table-responsive {
                padding: 6px;
                border-radius: 22px;
                background: rgba(15, 23, 42, 0.4);
                border: 1px solid rgba(255, 255, 255, 0.05);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
            }

            .table {
                width: 100%;
                margin-bottom: 0;
                color: var(--dash-text);
                border-collapse: separate;
                border-spacing: 0 14px;
            }

            .table thead th {
                border: 0;
                padding: 16px 18px;
                background: transparent;
                color: #fdba74;
                font-size: 0.78rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 0.09em;
                white-space: nowrap;
            }

            .table tbody tr {
                transition: transform 0.35s ease, filter 0.35s ease;
            }

            .table tbody tr:hover {
                transform: translateY(-4px);
                filter: brightness(1.03);
            }

            .table tbody td {
                padding: 18px 16px;
                border-top: 0;
                vertical-align: middle;
                background: rgba(30, 41, 59, 0.7);
                box-shadow: 0 20px 38px rgba(2, 6, 23, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.03);
                transition: background 0.35s ease, box-shadow 0.35s ease;
            }

            .table tbody tr:hover td {
                background: rgba(30, 41, 59, 0.88);
                box-shadow: 0 24px 44px rgba(2, 6, 23, 0.42), 0 0 28px rgba(255, 107, 0, 0.12);
            }

            .table tbody td:first-child {
                border-top-left-radius: 18px;
                border-bottom-left-radius: 18px;
            }

            .table tbody td:last-child {
                border-top-right-radius: 18px;
                border-bottom-right-radius: 18px;
            }

            .table-bordered th,
            .table-bordered td {
                border: 0;
            }

            .booking-copy {
                display: block;
                margin-top: 4px;
                font-size: 0.86rem;
                line-height: 1.5;
            }

            .timer-pill {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 84px;
                padding: 10px 14px;
                border-radius: 999px;
                background: rgba(255, 107, 0, 0.14);
                border: 1px solid rgba(255, 107, 0, 0.22);
                color: #fed7aa;
                font-weight: 800;
                letter-spacing: 0.05em;
                box-shadow: 0 12px 24px rgba(255, 107, 0, 0.12);
            }

            .timer-pill.timer-danger {
                background: rgba(244, 63, 94, 0.16);
                border-color: rgba(244, 63, 94, 0.28);
                color: #fecdd3;
                box-shadow: 0 12px 24px rgba(244, 63, 94, 0.18);
            }

            .badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 92px;
                padding: 10px 14px;
                border-radius: 999px;
                font-size: 0.8rem;
                font-weight: 800;
                letter-spacing: 0.04em;
                border: 1px solid transparent;
            }

            .badge-warning {
                background: rgba(245, 158, 11, 0.14);
                border-color: rgba(245, 158, 11, 0.22);
                color: #fde68a;
                box-shadow: 0 12px 24px rgba(245, 158, 11, 0.12);
            }

            .badge-success {
                background: rgba(34, 197, 94, 0.14);
                border-color: rgba(34, 197, 94, 0.22);
                color: #bbf7d0;
                box-shadow: 0 12px 24px rgba(34, 197, 94, 0.12);
            }

            .badge-danger {
                background: rgba(244, 63, 94, 0.14);
                border-color: rgba(244, 63, 94, 0.22);
                color: #fecdd3;
                box-shadow: 0 12px 24px rgba(244, 63, 94, 0.12);
            }

            .badge-secondary {
                background: rgba(148, 163, 184, 0.14);
                border-color: rgba(148, 163, 184, 0.22);
                color: #cbd5e1;
                box-shadow: 0 12px 24px rgba(148, 163, 184, 0.1);
            }

            .badge-info {
                background: rgba(59, 130, 246, 0.14);
                border-color: rgba(59, 130, 246, 0.22);
                color: #bfdbfe;
                box-shadow: 0 12px 24px rgba(59, 130, 246, 0.1);
            }

            .btn {
                border-radius: 999px;
                font-weight: 700;
                transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
            }

            .btn-sm {
                padding: 9px 16px;
            }

            .btn-success {
                border: 0;
                color: #fff;
                background: linear-gradient(135deg, #16a34a, #22c55e);
                box-shadow: 0 14px 26px rgba(34, 197, 94, 0.18);
            }

            .btn-success:hover,
            .btn-success:focus {
                transform: translateY(-2px);
                box-shadow: 0 18px 32px rgba(34, 197, 94, 0.24);
            }

            .btn-danger {
                border: 0;
                color: #fff;
                background: linear-gradient(135deg, #e11d48, #fb7185);
                box-shadow: 0 14px 26px rgba(244, 63, 94, 0.18);
            }

            .btn-danger:hover,
            .btn-danger:focus {
                transform: translateY(-2px);
                box-shadow: 0 18px 32px rgba(244, 63, 94, 0.24);
            }

            .action-group {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                transition: opacity 0.2s ease;
            }

            .action-group.is-hidden {
                display: none;
            }

            .action-group.is-loading {
                opacity: 0.55;
                pointer-events: none;
            }

            .action-empty {
                color: var(--dash-muted);
                font-weight: 700;
            }

            @keyframes dashboardFade {
                from {
                    opacity: 0;
                    transform: translateY(22px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes pulseDot {
                0%,
                100% {
                    transform: scale(1);
                    opacity: 1;
                }
                50% {
                    transform: scale(1.45);
                    opacity: 0.55;
                }
            }

            @media (max-width: 991.98px) {
                .main-content {
                    padding: 20px;
                }

                .dashboard-hero,
                .booking-card .card-body {
                    padding: 22px;
                }

                .hero-profile {
                    justify-content: flex-start;
                    margin-top: 24px;
                }
            }

            @media (max-width: 767.98px) {
                .main-content {
                    padding: 16px;
                }

                .dashboard-hero {
                    padding: 20px;
                    border-radius: 22px;
                }

                .hero-title {
                    font-size: 1.8rem;
                }

                .hero-profile-card {
                    max-width: 100%;
                }

                .booking-card {
                    border-radius: 20px;
                }

                .booking-card .card-body {
                    padding: 20px;
                }

                .booking-title {
                    font-size: 1.45rem;
                }

                .table-responsive {
                    padding: 0;
                    background: transparent;
                    border: 0;
                    box-shadow: none;
                }

                .table,
                .table tbody,
                .table tr,
                .table td {
                    display: block;
                    width: 100%;
                }

                .table thead {
                    display: none;
                }

                .table {
                    border-spacing: 0;
                }

                .table tbody tr {
                    margin-bottom: 16px;
                    padding: 4px;
                    border-radius: 18px;
                    background: rgba(30, 41, 59, 0.72);
                    box-shadow: 0 18px 36px rgba(2, 6, 23, 0.34);
                }

                .table tbody td {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    gap: 16px;
                    padding: 14px 16px;
                    border-radius: 0;
                    background: transparent;
                    box-shadow: none;
                }

                .table tbody tr:hover td {
                    background: transparent;
                    box-shadow: none;
                }

                .table tbody td::before {
                    content: attr(data-label);
                    flex: 0 0 42%;
                    color: #fdba74;
                    font-size: 0.76rem;
                    font-weight: 800;
                    text-transform: uppercase;
                    letter-spacing: 0.08em;
                }

                .action-group {
                    width: 100%;
                    justify-content: flex-end;
                }
            }
        </style>
        <style>
            body {
                background:
                    radial-gradient(circle at top left, rgba(255, 90, 60, 0.09), transparent 24%),
                    radial-gradient(circle at top right, rgba(255, 122, 92, 0.10), transparent 22%),
                    linear-gradient(180deg, #fcfcfe 0%, #f6f7fb 58%, #eef2f7 100%);
                color: #1f2937;
                font-family: "Poppins", "Inter", "Segoe UI", sans-serif;
            }

            .main-content {
                padding: 32px;
            }

            .dashboard-shell {
                animation: sellerBookingFade 0.7s ease;
            }

            .dashboard-hero,
            .booking-card {
                border-radius: 24px;
                background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            }

            .dashboard-hero::before,
            .booking-card::before {
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.65), transparent 36%),
                    radial-gradient(circle at 100% 0%, rgba(255, 90, 60, 0.10), transparent 30%);
            }

            .hero-eyebrow,
            .section-label {
                background: rgba(255, 255, 255, 0.92);
                border-color: rgba(255, 90, 60, 0.14);
                color: #ff5a3c;
                box-shadow: 0 10px 24px rgba(255, 90, 60, 0.08);
            }

            .hero-title,
            .booking-title,
            .hero-profile-card h4,
            .table tbody td strong {
                color: #1f2937 !important;
            }

            .hero-description,
            .hero-meta,
            .hero-status small,
            .booking-subtitle,
            .booking-copy,
            .empty-state,
            .action-empty {
                color: #6b7280 !important;
            }

            .hero-profile-card {
                background: rgba(255, 255, 255, 0.84);
                border: 1px solid rgba(255, 90, 60, 0.10);
                box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
            }

            .dashboard-avatar {
                background: linear-gradient(135deg, #ffd8d2, #ffece7);
                box-shadow: 0 14px 28px rgba(255, 90, 60, 0.14);
            }

            .dashboard-avatar img {
                background: #f3f4f6;
            }

            .hero-status {
                border-top-color: rgba(15, 23, 42, 0.08);
            }

            .status-pill,
            .timer-pill {
                background: linear-gradient(45deg, rgba(255, 77, 77, 0.10), rgba(255, 122, 92, 0.16));
                border-color: rgba(255, 90, 60, 0.14);
                color: #ff5a3c;
                box-shadow: none;
            }

            .table-responsive {
                background: #fffdfc;
                border: 1px solid rgba(15, 23, 42, 0.06);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9);
            }

            .table thead th {
                color: #ff5a3c;
            }

            .table tbody td {
                background: #ffffff;
                box-shadow: 0 16px 32px rgba(15, 23, 42, 0.06);
            }

            .badge-warning {
                background: rgba(217, 119, 6, 0.10);
                border-color: rgba(217, 119, 6, 0.14);
                color: #b45309;
            }

            .badge-success {
                background: rgba(22, 163, 74, 0.10);
                border-color: rgba(22, 163, 74, 0.14);
                color: #166534;
            }

            .badge-danger {
                background: rgba(220, 38, 38, 0.10);
                border-color: rgba(220, 38, 38, 0.14);
                color: #b91c1c;
            }

            .badge-secondary,
            .badge-info {
                background: rgba(15, 23, 42, 0.06);
                border-color: rgba(15, 23, 42, 0.08);
                color: #475569;
            }

            .btn-success {
                background: linear-gradient(45deg, #16a34a, #22c55e);
            }

            .btn-danger {
                background: linear-gradient(45deg, #ef4444, #ff5a3c);
            }

            @keyframes sellerBookingFade {
                from {
                    opacity: 0;
                    transform: translateY(16px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 991.98px) {
                .main-content {
                    padding: 22px;
                }
            }

            @media (max-width: 767.98px) {
                .main-content {
                    padding: 16px;
                }

                .dashboard-hero,
                .booking-card {
                    border-radius: 22px;
                }

                .table tbody tr {
                    background: #ffffff;
                    box-shadow: 0 18px 36px rgba(15, 23, 42, 0.08);
                }

                .table tbody td::before {
                    color: #ff5a3c;
                }
            }
        </style>
        <style>
            .hero-profile-card,
            .booking-card,
            .table tbody tr,
            .table tbody td,
            .btn-success,
            .btn-danger,
            .timer-pill {
                transition: all 0.3s ease;
            }

            .hero-profile-card:hover,
            .booking-card:hover {
                transform: translateY(-4px);
                background: #ffffff;
                border-color: #f1f1f1;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .table tbody tr:hover {
                transform: translateY(-2px);
                filter: none !important;
                background: #f9fafb !important;
            }

            .table tbody tr:hover td {
                background: #f9fafb !important;
                color: #222 !important;
                box-shadow: none;
            }

            .table tbody tr:hover td strong,
            .table tbody tr:hover .booking-copy,
            .table tbody tr:hover .action-empty {
                color: #222 !important;
                opacity: 1 !important;
            }

            .btn-success:hover,
            .btn-success:focus,
            .btn-danger:hover,
            .btn-danger:focus {
                opacity: 1 !important;
                filter: none !important;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            }

            .btn-success:hover,
            .btn-success:focus {
                background: linear-gradient(45deg, #22c55e, #34d399);
            }

            .btn-danger:hover,
            .btn-danger:focus {
                background: linear-gradient(45deg, #ff5c5c, #ff6a4e);
            }
        </style>
        <style>
            body {
                background: linear-gradient(135deg, #f8fafc, #f1f5f9) !important;
                color: #222 !important;
            }

            body::before,
            .main-content::before,
            .main-content::after,
            .dashboard-hero::before,
            .dashboard-hero::after,
            .booking-card::before {
                display: none !important;
            }

            .dashboard-hero,
            .hero-profile-card,
            .booking-card,
            .table-responsive,
            .table tbody td,
            .alert {
                background: #ffffff !important;
                color: #333 !important;
                border: 1px solid rgba(15, 23, 42, 0.06) !important;
                box-shadow: 0 8px 24px rgba(0,0,0,0.05) !important;
            }

            .dashboard-hero,
            .hero-profile-card,
            .booking-card {
                border-radius: 16px !important;
            }

            .booking-card,
            .booking-card *,
            .hero-profile-card,
            .hero-profile-card * {
                opacity: 1 !important;
                color: #333 !important;
                visibility: visible !important;
                filter: none !important;
            }

            .hero-title,
            .booking-title,
            .hero-profile-card h4,
            .section-label,
            .hero-eyebrow,
            .table thead th,
            .table tbody td strong {
                color: #111 !important;
            }

            .hero-description,
            .hero-meta,
            .hero-status small,
            .booking-subtitle,
            .booking-copy,
            .action-empty {
                color: #333 !important;
            }

            .hero-eyebrow,
            .section-label,
            .status-pill,
            .timer-pill {
                background: #fff5f5 !important;
                color: #ff4d4d !important;
                border: 1px solid rgba(255, 77, 77, 0.12) !important;
                box-shadow: none !important;
            }

            .status-pill i {
                color: #ff4d4d !important;
                animation: none !important;
            }

            .dashboard-avatar {
                background: linear-gradient(45deg, #ff4d4d, #ff7a5c) !important;
                box-shadow: 0 8px 24px rgba(255,77,77,0.18) !important;
            }

            .dashboard-avatar img {
                background: #ffffff !important;
            }

            .hero-status {
                border-top: 1px solid rgba(15, 23, 42, 0.06) !important;
            }

            .table-responsive {
                padding: 6px;
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;
            }

            .table-responsive::-webkit-scrollbar {
                height: 6px;
            }

            .table-responsive::-webkit-scrollbar-thumb {
                background: #ff4d4d;
                border-radius: 10px;
            }

            .table {
                color: #333 !important;
                border-spacing: 0 12px !important;
                min-width: 1200px;
            }

            .table thead th {
                background: transparent !important;
                font-weight: 600 !important;
            }

            .table tbody tr {
                background: transparent !important;
                filter: none !important;
                transition: all 0.3s ease !important;
            }

            .table tbody td {
                background: #ffffff !important;
                color: #333 !important;
                border-top: 1px solid rgba(15, 23, 42, 0.04) !important;
                box-shadow: 0 8px 24px rgba(0,0,0,0.05) !important;
            }

            .table tbody tr:hover,
            .booking-card:hover,
            .hero-profile-card:hover {
                background: #f9fafb !important;
                transform: translateY(-3px) !important;
                box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
            }

            .table tbody tr:hover td {
                background: #f9fafb !important;
                color: #222 !important;
                box-shadow: 0 10px 25px rgba(0,0,0,0.04) !important;
            }

            .badge {
                box-shadow: none !important;
                font-weight: 600 !important;
            }

            .badge-warning {
                background: #fff7ed !important;
                color: #b45309 !important;
                border-color: rgba(217, 119, 6, 0.14) !important;
            }

            .badge-success {
                background: #f0fdf4 !important;
                color: #166534 !important;
                border-color: rgba(22, 163, 74, 0.14) !important;
            }

            .badge-danger {
                background: #fff1f2 !important;
                color: #be123c !important;
                border-color: rgba(244, 63, 94, 0.14) !important;
            }

            .badge-secondary,
            .badge-info {
                background: #f8fafc !important;
                color: #475569 !important;
                border-color: rgba(15, 23, 42, 0.08) !important;
            }

            .btn,
            .btn-success,
            .btn-danger {
                border-radius: 10px !important;
                padding: 10px 16px !important;
                color: #fff !important;
                transition: 0.3s !important;
            }

            .btn-success,
            .btn-danger {
                background: linear-gradient(45deg, #ff4d4d, #ff7a5c) !important;
                border: 0 !important;
            }

            .btn:hover,
            .btn:focus {
                transform: scale(1.03) !important;
                box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
                opacity: 1 !important;
            }

            @media (max-width: 767.98px) {
                .table-responsive {
                    background: transparent !important;
                    border: 0 !important;
                    box-shadow: none !important;
                }

                .table tbody tr {
                    margin-bottom: 14px;
                    padding: 4px;
                    border-radius: 16px;
                    background: #ffffff !important;
                    box-shadow: 0 8px 24px rgba(0,0,0,0.05) !important;
                }

                .table tbody td::before {
                    color: #111 !important;
                }
            }
        </style>
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

                        <div class="dashboard-shell">
                        <div class="dashboard-hero">
                            <div class="row align-items-center">
                                <div class="col-xl-7">
                                    <span class="hero-eyebrow">
                                        <i class="fas fa-clipboard-list"></i>
                                        Booking Control
                                    </span>
                                    <h1 class="hero-title">Booking Requests</h1>
                                    <p class="hero-description">Review incoming service requests, monitor response timers, and take action from the same premium dark workspace used across your dashboard.</p>
                                </div>
                                <div class="col-xl-5">
                                    <div class="hero-profile">
                                        <div class="hero-profile-card">
                                            <div class="hero-profile-top">
                                                <div class="dashboard-avatar">
                                                    <?php if (!empty($res_detail) && $res_detail[0]->profile_pic == "") { ?>
                                                        <img class="round" height="30" width="40" avatar="<?php echo substr($res_detail[0]->owner_name, 0, 1); ?>">
                                                    <?php } else if (!empty($res_detail)) { ?>
                                                        <img src="<?php echo base_url() . $res_detail[0]->profile_pic; ?>" alt="">
                                                    <?php } ?>
                                                </div>
                                                <div>
                                                    <h4 class="m-b-0">
                                                        <?php
                                                        if (!empty($res_detail)) {
                                                            echo ucwords($res_detail[0]->owner_name);
                                                        }
                                                        ?>
                                                    </h4>
                                                    <p class="hero-meta">Premium seller workspace</p>
                                                </div>
                                            </div>
                                            <div class="hero-status">
                                                <span class="status-pill">
                                                    <i class="fas fa-circle"></i>
                                                    Request Queue Active
                                                </span>
                                                <small>Respond before timers expire</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card booking-card">
                            <div class="card-body">
                                <span class="section-label">
                                    <i class="fas fa-stream"></i>
                                    Request Inbox
                                </span>
                                <h4 class="m-b-20 booking-title">Booking Requests</h4>
                                <p class="m-b-25 booking-subtitle">Here you can view, accept, or reject service booking requests from users in a polished table that matches the dashboard theme.</p>

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
                                                    <?php
                                                        $is_row_expired = ($row->booking_status == "pending" && !empty($row->expires_at) && strtotime($row->expires_at) <= time());
                                                        $ui_status = $is_row_expired ? "expired" : $row->booking_status;
                                                    ?>
                                                    <tr
                                                        id="booking-row-<?php echo $row->booking_id; ?>"
                                                        class="booking-request-row"
                                                        data-booking-id="<?php echo $row->booking_id; ?>"
                                                        data-status="<?php echo $ui_status; ?>"
                                                        data-expiry="<?php echo !empty($row->expires_at) ? $row->expires_at : ''; ?>"
                                                        data-expiry-timestamp="<?php echo !empty($row->expires_at) ? strtotime($row->expires_at) : 0; ?>"
                                                    >
                                                        <td data-label="ID"><strong>#<?php echo $row->booking_id; ?></strong></td>
                                                        <td data-label="Service">
                                                            <strong><?php echo $row->category_name; ?></strong>
                                                            <span class="booking-copy">Requested service category</span>
                                                        </td>
                                                        <td data-label="Name">
                                                            <strong><?php echo $row->customer_name; ?></strong>
                                                            <span class="booking-copy">Customer profile</span>
                                                        </td>
                                                        <td data-label="Phone"><?php echo $row->customer_phone; ?></td>
                                                        <td data-label="Email"><?php echo $row->customer_email; ?></td>
                                                        <td data-label="Address">
                                                            <?php echo $row->customer_address; ?>
                                                        </td>
                                                        <td data-label="Description">
                                                            <span class="booking-copy"><?php echo $row->customer_description; ?></span>
                                                        </td>
                                                        <td data-label="Date"><?php echo $row->service_date; ?></td>
                                                        <td data-label="Time"><?php echo $row->service_time; ?></td>
                                                        <td data-label="Status" class="booking-status-cell">
                                                            <?php if ($ui_status == "pending") { ?>
                                                                <span class="badge badge-warning">Pending</span>
                                                            <?php } elseif ($ui_status == "accepted") { ?>
                                                                <span class="badge badge-success">Accepted</span>
                                                            <?php } elseif ($ui_status == "rejected") { ?>
                                                                <span class="badge badge-danger">Rejected</span>
                                                            <?php } elseif ($ui_status == "expired") { ?>
                                                                <span class="badge badge-secondary">Expired</span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-info"><?php echo ucfirst($ui_status); ?></span>
                                                            <?php } ?>
                                                        </td>
                                                        <td data-label="Timer">
                                                            <?php if ($ui_status == "pending") { ?>
                                                                <span class="booking-timer timer-pill">00:00</span>
                                                            <?php } else { ?>
                                                                <span class="timer-pill">00:00</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td data-label="Action" class="booking-action-cell">
                                                            <?php if ($ui_status == "pending") { ?>
                                                                <div class="action-group">
                                                                    <a href="<?php echo base_url('Restaurant-Accept-Booking/'.$row->booking_id); ?>" class="btn btn-success btn-sm m-b-5 booking-action-btn accept-btn" data-action="accepted">Accept</a>
                                                                    <a href="<?php echo base_url('Restaurant-Reject-Booking/'.$row->booking_id); ?>" class="btn btn-danger btn-sm m-b-5 booking-action-btn reject-btn" data-action="rejected">Reject</a>
                                                                </div>
                                                            <?php } else { ?>
                                                                <span class="action-empty">-</span>
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
            (function () {
                function getStatusBadgeHtml(status) {
                    if (status === 'accepted') {
                        return '<span class="badge badge-success">Accepted</span>';
                    }

                    if (status === 'rejected') {
                        return '<span class="badge badge-danger">Rejected</span>';
                    }

                    if (status === 'expired') {
                        return '<span class="badge badge-secondary">Expired</span>';
                    }

                    if (status === 'pending') {
                        return '<span class="badge badge-warning">Pending</span>';
                    }

                    return '<span class="badge badge-info">' + status.charAt(0).toUpperCase() + status.slice(1) + '</span>';
                }

                function formatTime(diffSeconds) {
                    var minutes = Math.floor(diffSeconds / 60);
                    var seconds = diffSeconds % 60;

                    if (minutes < 10) {
                        minutes = '0' + minutes;
                    }

                    if (seconds < 10) {
                        seconds = '0' + seconds;
                    }

                    return minutes + ':' + seconds;
                }

                function setRowState(row, status) {
                    var timerEl = row.querySelector('.booking-timer, .timer-pill');
                    var statusEl = row.querySelector('.booking-status-cell');
                    var actionEl = row.querySelector('.action-group');
                    var actionCell = row.querySelector('.booking-action-cell');

                    row.dataset.status = status;
                    statusEl.innerHTML = getStatusBadgeHtml(status);

                    if (timerEl && status !== 'pending') {
                        timerEl.textContent = '00:00';
                        timerEl.classList.remove('timer-danger');
                    }

                    if (actionEl) {
                        actionEl.classList.add('is-hidden');
                        actionEl.classList.remove('is-loading');
                    }

                    if (actionCell) {
                        actionCell.innerHTML = '<span class="action-empty">-</span>';
                    }
                }

                function updateBookingTimers() {
                    var now = Math.floor(Date.now() / 1000);

                    document.querySelectorAll('.booking-request-row').forEach(function (row) {
                        var currentStatus = row.dataset.status || 'pending';
                        var timerEl = row.querySelector('.booking-timer');
                        var expiryTimestamp = parseInt(row.dataset.expiryTimestamp || '0', 10);

                        if (!timerEl || currentStatus !== 'pending') {
                            return;
                        }

                        if (expiryTimestamp <= 0) {
                            timerEl.textContent = '00:00';
                            setRowState(row, 'expired');
                            return;
                        }

                        var diff = expiryTimestamp - now;

                        if (diff <= 0) {
                            timerEl.textContent = '00:00';
                            setRowState(row, 'expired');
                            return;
                        }

                        timerEl.textContent = formatTime(diff);
                        timerEl.classList.toggle('timer-danger', diff <= 60);
                    });
                }

                document.addEventListener('click', function (event) {
                    var button = event.target.closest('.booking-action-btn');

                    if (!button) {
                        return;
                    }

                    event.preventDefault();

                    var row = button.closest('.booking-request-row');
                    var actionGroup = row ? row.querySelector('.action-group') : null;
                    var requestedStatus = button.getAttribute('data-action') || 'pending';
                    var expiryTimestamp = row ? parseInt(row.dataset.expiryTimestamp || '0', 10) : 0;
                    var now = Math.floor(Date.now() / 1000);

                    if (!row || row.dataset.status !== 'pending') {
                        return;
                    }

                    if (requestedStatus === 'rejected' && !window.confirm('Are you sure you want to reject this booking?')) {
                        return;
                    }

                    if (expiryTimestamp > 0 && now >= expiryTimestamp) {
                        setRowState(row, 'expired');
                        return;
                    }

                    if (actionGroup) {
                        actionGroup.classList.add('is-loading');
                    }

                    fetch(button.getAttribute('href'), {
                        method: 'GET',
                        credentials: 'same-origin',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        if (!data) {
                            return;
                        }

                        if (data.status === true && data.booking_status) {
                            setRowState(row, data.booking_status);
                            return;
                        }

                        if (data.booking_status) {
                            setRowState(row, data.booking_status);
                        }

                        if (actionGroup && row.dataset.status === 'pending') {
                            actionGroup.classList.remove('is-loading');
                        }

                        if (data.message) {
                            window.alert(data.message);
                        }
                    })
                    .catch(function () {
                        if (actionGroup) {
                            actionGroup.classList.remove('is-loading');
                        }

                        window.alert('Unable to process this booking request right now.');
                    });
                });

                updateBookingTimers();
                setInterval(updateBookingTimers, 1000);
            })();
        </script>
    </body>
</html>
