<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TASKRABBIT - My Services</title>

        <?php
        $this->load->view("seller/headerscript");
        ?>
                <style>
        :root {
            --service-bg: #fff3e6;
            --service-surface: rgba(255, 255, 255, 0.94);
            --service-surface-soft: rgba(255, 247, 240, 0.98);
            --service-border: rgba(255, 107, 0, 0.14);
            --service-border-strong: rgba(255, 107, 0, 0.22);
            --service-text: #1f2937;
            --service-muted: #6b7280;
            --service-primary: #ff6b00;
            --service-secondary: #ff8c42;
            --service-shadow: 0 20px 45px rgba(255, 107, 0, 0.12);
            --service-radius: 20px;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(255, 140, 66, 0.18), transparent 26%),
                radial-gradient(circle at top right, rgba(255, 107, 0, 0.1), transparent 22%),
                linear-gradient(180deg, #fffaf6 0%, #fff3e6 58%, #fff8f2 100%);
            color: var(--service-text);
        }

        .page-container,
        .main-content {
            background: transparent;
        }

        .main-content {
            position: relative;
            padding: 28px;
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
            top: -70px;
            right: -60px;
            width: 210px;
            height: 210px;
            background: rgba(255, 107, 0, 0.12);
        }

        .main-content::after {
            bottom: 10px;
            left: -40px;
            width: 180px;
            height: 180px;
            background: rgba(255, 140, 66, 0.14);
        }

        .services-shell {
            position: relative;
            z-index: 1;
            animation: servicesFade 0.75s ease;
        }

        .services-header {
            position: relative;
            padding: 24px 26px;
            margin-bottom: 24px;
            border-radius: 24px;
            border: 1px solid rgba(255, 107, 0, 0.14);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 247, 240, 0.96));
            box-shadow: var(--service-shadow);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            overflow: hidden;
        }

        .services-header::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(120deg, rgba(255, 255, 255, 0.42), transparent 38%),
                radial-gradient(circle at 100% 0%, rgba(255, 140, 66, 0.16), transparent 30%);
            pointer-events: none;
        }

        .services-header .d-md-flex {
            position: relative;
            z-index: 1;
        }

        .services-header .avatar {
            width: 72px;
            height: 72px;
            border-radius: 22px;
            overflow: hidden;
            background: linear-gradient(135deg, #ff6b00, #ff8c42);
            padding: 3px;
            box-shadow: 0 14px 28px rgba(255, 107, 0, 0.16);
        }

        .services-header .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 19px;
            background: #fffaf5;
        }

        .services-header h4 {
            margin-bottom: 6px;
            font-size: 1.9rem;
            font-weight: 800;
            color: #111827;
        }

        .services-header .text-gray {
            display: block;
            color: var(--service-muted);
            font-size: 0.98rem;
            line-height: 1.6;
        }

        .services-card {
            position: relative;
            border: 1px solid var(--service-border);
            border-radius: var(--service-radius);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(255, 249, 243, 0.98));
            box-shadow: var(--service-shadow);
            overflow: hidden;
        }

        .services-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 140, 66, 0.08), transparent 40%);
            pointer-events: none;
        }

        .services-card .card-body {
            position: relative;
            z-index: 1;
            padding: 30px;
        }

        .services-title {
            margin-bottom: 8px;
            font-size: 1.7rem;
            font-weight: 800;
            color: #111827;
            letter-spacing: -0.02em;
        }

        .services-subtitle {
            margin-bottom: 22px;
            color: var(--service-muted);
            font-size: 0.98rem;
            line-height: 1.7;
            max-width: 680px;
        }

        .alert {
            border: 1px solid transparent;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 18px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.04);
        }

        .alert-success {
            background: #f0fdf4;
            border-color: rgba(34, 197, 94, 0.16);
            color: #166534;
        }

        .alert-danger {
            background: #fff1f2;
            border-color: rgba(244, 63, 94, 0.16);
            color: #be123c;
        }

        .table-responsive {
            border: 1px solid rgba(255, 107, 0, 0.12);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.88);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            color: var(--service-text);
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            padding: 18px 20px;
            border: 0;
            background: linear-gradient(180deg, #fff7f0, #fff3e6);
            color: #9a3412;
            font-size: 0.82rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .table thead th:first-child {
            border-top-left-radius: 18px;
        }

        .table thead th:last-child {
            border-top-right-radius: 18px;
        }

        .table tbody tr {
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .table tbody tr:nth-child(even) {
            background: rgba(255, 247, 240, 0.6);
        }

        .table tbody tr:hover {
            background: rgba(255, 107, 0, 0.06);
        }

        .table tbody td {
            padding: 20px;
            border-top: 1px solid rgba(255, 107, 0, 0.08);
            vertical-align: middle;
            background: transparent;
        }

        .table-bordered th,
        .table-bordered td {
            border: 0;
        }

        .table tbody td strong {
            display: inline-block;
            font-size: 1rem;
            font-weight: 700;
            color: #111827;
        }

        input[type="checkbox"][name="category_id[]"] {
            appearance: none;
            -webkit-appearance: none;
            width: 22px;
            height: 22px;
            border-radius: 8px;
            border: 2px solid rgba(255, 107, 0, 0.26);
            background: #fff;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 8px 18px rgba(255, 107, 0, 0.06);
        }

        input[type="checkbox"][name="category_id[]"]::after {
            content: "";
            position: absolute;
            top: 4px;
            left: 7px;
            width: 5px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg) scale(0);
            transition: transform 0.2s ease;
        }

        input[type="checkbox"][name="category_id[]"]:checked {
            background: linear-gradient(135deg, #ff6b00, #ff8c42);
            border-color: transparent;
            box-shadow: 0 12px 24px rgba(255, 107, 0, 0.22);
        }

        input[type="checkbox"][name="category_id[]"]:checked::after {
            transform: rotate(45deg) scale(1);
        }

        input[type="checkbox"][name="category_id[]"]:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.12);
        }

        .form-control {
            height: 48px;
            border-radius: 12px;
            border: 1px solid rgba(255, 107, 0, 0.16);
            background: #fffdfa;
            color: var(--service-text);
            font-size: 0.95rem;
            box-shadow: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-control:focus {
            border-color: #ff6b00;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.12);
        }

.premium-input.input-valid,
.form-control.input-valid{
border:2px solid #28a745 !important;
box-shadow:0 0 0 4px rgba(34,197,94,0.12) !important;
}

.premium-input.input-invalid,
.form-control.input-invalid{
border:2px solid #dc3545 !important;
box-shadow:0 0 0 4px rgba(220,53,69,0.12) !important;
}

.validation-error{
color:#dc3545;
font-size:13px;
margin-top:8px;
display:block;
font-weight:500;
}

        .m-t-20 {
            margin-top: 24px !important;
        }

        .btn-primary {
            border: 0;
            border-radius: 999px;
            padding: 12px 28px;
            font-weight: 700;
            letter-spacing: 0.01em;
            background: linear-gradient(135deg, #ff6b00, #ff8c42);
            box-shadow: 0 14px 28px rgba(255, 107, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: linear-gradient(135deg, #ff6b00, #ff8c42);
            transform: translateY(-2px);
            box-shadow: 0 18px 32px rgba(255, 107, 0, 0.24);
            opacity: 0.98;
        }

        .btn-primary:focus {
            outline: none;
        }

        @keyframes servicesFade {
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
                padding: 20px;
            }

            .services-card .card-body,
            .services-header {
                padding: 22px;
            }
        }

        @media (max-width: 767.98px) {
            .main-content {
                padding: 16px;
            }

            .services-header,
            .services-card {
                border-radius: 18px;
            }

            .services-header h4 {
                font-size: 1.5rem;
            }

            .services-title {
                font-size: 1.35rem;
            }

            .table thead th,
            .table tbody td {
                padding: 16px 14px;
            }

            .btn-primary {
                width: 100%;
            }
        }

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

        .main-content {
            padding: 28px;
            overflow: hidden;
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
        .services-card .card-body {
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
        .services-subtitle,
        .service-name,
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
            min-width: 280px;
            max-width: 360px;
            width: 100%;
            padding: 22px;
            border-radius: 24px;
            background: rgba(15, 23, 42, 0.58);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.06), 0 24px 44px rgba(2, 6, 23, 0.42), 0 0 24px rgba(255, 107, 0, 0.06);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
            overflow: hidden;
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
        .services-title,
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

        .services-card {
            border: 1px solid var(--dash-border);
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(30, 41, 59, 0.82) 0%, rgba(15, 23, 42, 0.94) 100%);
            box-shadow: 0 24px 52px rgba(2, 6, 23, 0.48), 0 0 30px rgba(255, 107, 0, 0.06);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
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

        .alert-success {
            background: rgba(34, 197, 94, 0.12);
            border-color: rgba(34, 197, 94, 0.2);
            color: #bbf7d0;
        }

        .alert-danger {
            background: rgba(244, 63, 94, 0.12);
            border-color: rgba(244, 63, 94, 0.2);
            color: #fecdd3;
        }

        .table-responsive {
            padding: 6px;
            border-radius: 22px;
            background: rgba(15, 23, 42, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }

        .table {
            color: var(--dash-text);
            border-collapse: separate;
            border-spacing: 0 14px;
        }

        .table thead th {
            background: transparent;
            color: #fdba74;
            font-size: 0.78rem;
            letter-spacing: 0.09em;
            border: 0;
        }

        .table tbody tr {
            transition: transform 0.35s ease, filter 0.35s ease;
        }

        .table tbody tr:hover {
            transform: translateY(-4px);
            filter: brightness(1.03);
        }

        .table tbody td {
            border-top: 0;
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

        .checkbox-cell {
            text-align: center;
        }

        input[type="checkbox"][name="category_id[]"] {
            width: 24px;
            height: 24px;
            border-radius: 9px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            background: rgba(15, 23, 42, 0.92);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.04), 0 10px 22px rgba(2, 6, 23, 0.3);
        }

        input[type="checkbox"][name="category_id[]"]:hover {
            border-color: rgba(255, 107, 0, 0.38);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05), 0 14px 26px rgba(2, 6, 23, 0.34), 0 0 18px rgba(255, 107, 0, 0.08);
        }

        input[type="checkbox"][name="category_id[]"]:checked {
            box-shadow: 0 16px 30px rgba(255, 107, 0, 0.24), 0 0 20px rgba(255, 107, 0, 0.18);
        }

        .form-control {
            height: 50px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.09);
            background: #1e293b;
            color: #f8fafc;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.03);
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .form-control:focus {
            background: #1e293b;
            color: #f8fafc;
            border-color: rgba(255, 107, 0, 0.7);
            box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.14), 0 0 22px rgba(255, 107, 0, 0.1);
        }

        .validation-error {
            color: #fda4af;
        }

        .btn-primary {
            box-shadow: 0 18px 30px rgba(255, 107, 0, 0.24);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            box-shadow: 0 24px 40px rgba(255, 107, 0, 0.28), 0 0 22px rgba(255, 140, 66, 0.16);
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
            .hero-profile {
                justify-content: flex-start;
                margin-top: 24px;
            }
        }

        @media (max-width: 767.98px) {
            .dashboard-hero {
                padding: 20px;
                border-radius: 22px;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .hero-profile-card {
                min-width: 100%;
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

            .checkbox-cell {
                justify-content: flex-start;
            }

            .checkbox-cell::before {
                flex-basis: auto;
                margin-right: auto;
            }

            .empty-state::before {
                display: none;
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
            animation: sellerServicesFade 0.7s ease;
        }

        .dashboard-hero,
        .services-card {
            border-radius: 24px;
            background: linear-gradient(180deg, #ffffff 0%, #fffaf8 100%);
            border: 1px solid rgba(15, 23, 42, 0.06);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        .dashboard-hero::before,
        .services-card::before {
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
        .services-title,
        .hero-profile-card h4,
        .table tbody td strong {
            color: #1f2937 !important;
        }

        .hero-description,
        .hero-meta,
        .services-subtitle,
        .service-name,
        .empty-state {
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

        .status-pill {
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

        input[type="checkbox"][name="category_id[]"] {
            border-color: rgba(255, 90, 60, 0.24);
            background: #ffffff;
            box-shadow: 0 8px 18px rgba(255, 90, 60, 0.08);
        }

        input[type="checkbox"][name="category_id[]"]:checked {
            background: linear-gradient(45deg, #ff4d4d, #ff5a3c);
        }

        .form-control {
            background: #ffffff;
            color: #1f2937;
            border: 1px solid rgba(15, 23, 42, 0.10);
        }

        .form-control:focus {
            background: #ffffff;
            color: #1f2937;
            border-color: rgba(255, 90, 60, 0.45);
            box-shadow: 0 0 0 4px rgba(255, 90, 60, 0.10);
        }

        .btn-primary {
            border-radius: 10px;
            background: linear-gradient(45deg, #ff4d4d, #ff5a3c);
            box-shadow: 0 14px 28px rgba(255, 90, 60, 0.20);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 18px 32px rgba(255, 90, 60, 0.24);
        }

        @keyframes sellerServicesFade {
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

            .dashboard-hero,
            .services-card .card-body {
                padding: 24px;
            }
        }

        @media (max-width: 767.98px) {
            .main-content {
                padding: 16px;
            }

            .dashboard-hero,
            .services-card {
                border-radius: 22px;
            }

            .hero-title {
                font-size: 1.9rem;
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
        .services-card,
        .table tbody tr,
        .table tbody td,
        input[type="checkbox"][name="category_id[]"],
        .btn-primary {
            transition: all 0.3s ease;
        }

        .hero-profile-card:hover,
        .services-card:hover {
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
        .table tbody tr:hover .service-name {
            color: #222 !important;
            opacity: 1 !important;
        }

        input[type="checkbox"][name="category_id[]"]:hover {
            background: #ffffff;
            border-color: #ffd1c7;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.06);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: linear-gradient(45deg, #ff5c5c, #ff6a4e);
            opacity: 1 !important;
            filter: none !important;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
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
                                        <i class="fas fa-layer-group"></i>
                                        Service Control
                                    </span>
                                    <h1 class="hero-title">My Services</h1>
                                    <p class="hero-description">Shape your service catalog, fine-tune pricing, and manage every offering from the same premium workspace used across your dashboard.</p>
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
                                                    Service Catalog Active
                                                </span>
                                                <small>Manage your listed offerings</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card services-card">
                            <div class="card-body">
                                <span class="section-label">
                                    <i class="fas fa-sliders-h"></i>
                                    Service Setup
                                </span>
                                <h4 class="m-b-20 services-title">My Services</h4>
                                <p class="m-b-25 services-subtitle">Select the services you want to offer and enter your service price with a clean, modern service management experience.</p>

                                            <?php 
                                            $success = $this->session->flashdata('success');
                                            if ($success) { 
                                            ?>
                                            <div class="alert alert-success">
                                            <?php echo $success; ?>
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
                                                            <td class="checkbox-cell" data-label="Select" style="text-align:center; vertical-align:middle;">
                                                                <input type="checkbox" name="category_id[]" value="<?php echo $cat->category_id; ?>" <?php echo $checked; ?>>
                                                            </td>
                                                            <td data-label="Service Category" style="vertical-align:middle;">
                                                                <strong><?php echo $cat->name; ?></strong>
                                                                <span class="service-name">Enable this service to make it available in your seller catalog.</span>
                                                            </td>
                                                            <td data-label="Price">
                                                                <input
                                                                    type="number"
                                                                    name="price[<?php echo $cat->category_id; ?>]"
                                                                    class="form-control"
                                                                    placeholder="Enter price"
                                                                    value="<?php echo $saved_price; ?>"
                                                                    min="1"
                                                                    id="price_<?php echo $cat->category_id; ?>"
                                                                >
                                                                <small class="validation-error" id="error_price_<?php echo $cat->category_id; ?>"></small>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="3" class="text-center empty-state">No service categories found.</td>
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

document.querySelector("form").addEventListener("submit", function(e){

let valid = true;

document.querySelectorAll('input[type="checkbox"][name="category_id[]"]').forEach(function(checkbox){

if(checkbox.checked){

let catId = checkbox.value;

let priceInput = document.querySelector('input[name="price['+catId+']"]');

if(priceInput.value === "" || priceInput.value <= 0){

alert("Price must be greater than 0 for selected service.");

priceInput.focus();

valid = false;

}

}

});

if(!valid){
e.preventDefault();
}

});

function validatePrice(catId){

let input = document.getElementById("price_"+catId);
let error = document.getElementById("error_price_"+catId);

let value = input.value.trim();

if(value === "" || value <= 0){

input.classList.remove("input-valid");
input.classList.add("input-invalid");

error.innerHTML = "Price must be greater than 0";

return false;

}else{

input.classList.remove("input-invalid");
input.classList.add("input-valid");

error.innerHTML = "";

return true;

}

}

document.querySelectorAll('input[name="category_id[]"]').forEach(function(checkbox){

checkbox.addEventListener("change",function(){

let catId = this.value;
let input = document.getElementById("price_"+catId);

if(this.checked){

input.addEventListener("input",function(){
validatePrice(catId);
});

}

});

});

document.querySelector("form").addEventListener("submit",function(e){

let valid = true;

document.querySelectorAll('input[name="category_id[]"]:checked').forEach(function(checkbox){

let catId = checkbox.value;

if(!validatePrice(catId)){
valid=false;
}

});

if(!valid){
e.preventDefault();
}

});
</script>
   </body>
</html>
