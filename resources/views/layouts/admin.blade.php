<!DOCTYPE html>
<html>

<head>
    <title>Admin | Temple Fund</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f1f5f9;
        }

        /* HEADER */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: #0f172a;
            color: #fff;
            display: flex;
            align-items: center;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 600;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            width: 220px;
            height: calc(100vh - 60px);
            background: #020617;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #cbd5f5;
            text-decoration: none;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #1e293b;
            color: #fff;
        }

        .sidebar-link.active {
            background: #1e293b;
            color: #fff !important;
        }

        /* CONTENT */
        .content {
            margin-left: 220px;
            padding: 25px;
            margin-top: 60px;
        }

        /* CARDS */
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .stat {
            font-size: 26px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #f8fafc;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
        }

        /* FORM */
        label {
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
        }

        /* BUTTONS */
        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-header h2 {
            margin: 0;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }


        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-success {
            background: #16a34a;
            color: #fff;
        }

        .btn-danger {
            background: #dc2626;
            color: #fff;
        }

        table a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        table a:hover {
            text-decoration: underline;
        }
        select, input {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
}

hr {
    margin: 20px 0;
}

/* MOBILE RESPONSIVE */
        @media (max-width: 900px) {
            .sidebar {
                width: 60px;
                padding-top: 10px;
            }
            .sidebar a {
                font-size: 0;
                padding: 12px 10px;
                text-align: center;
            }
            .sidebar a:before {
                font-size: 20px;
                display: block;
                margin-bottom: 2px;
            }
            .content {
                margin-left: 60px;
                padding: 15px;
            }
        }
        @media (max-width: 600px) {
            .header {
                height: 50px;
                font-size: 15px;
                padding: 0 10px;
            }
            .sidebar {
                top: 50px;
                width: 100%;
                height: auto;
                position: static;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                padding: 0;
            }
            .sidebar a {
                font-size: 0;
                padding: 10px 0;
                flex: 1;
            }
            .sidebar a:before {
                font-size: 20px;
                display: block;
                margin-bottom: 0;
            }
            .content {
                margin: 0;
                margin-top: 50px;
                padding: 10px;
            }
        }
        /* Add icons to sidebar links for mobile */
        .sidebar a[href*="dashboard"]:before { content: "🏠"; }
        .sidebar a[href*="members"]:before { content: "👥"; }
        .sidebar a[href*="donations"]:before { content: "💰"; }
        .sidebar a[href*="expenses"]:before { content: "💸"; }
        .sidebar a[href*="reports"]:before { content: "📊"; }
        .sidebar a[href*="logout"]:before { content: "🚪"; }
        .sidebar a:before {
            display: none;
        }
        @media (max-width: 900px) {
            .sidebar a:before {
                display: block;
            }
        }
        @media (max-width: 600px) {
            .sidebar a:before {
                display: block;
            }
        }
        /* Hide text on sidebar links for mobile */
        @media (max-width: 900px) {
            .sidebar a {
                color: #cbd5f5;
            }
            .sidebar a span {
                display: none;
            }
        }
        @media (max-width: 600px) {
            .sidebar a span {
                display: none;
            }
        }

        /* Toggle button styles */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 28px;
            margin-right: 15px;
            cursor: pointer;
        }
        @media (max-width: 900px) {
            .sidebar-toggle {
                display: block;
            }
        }
        @media (max-width: 600px) {
            .sidebar-toggle {
                font-size: 24px;
                margin-right: 8px;
            }
        }
        .sidebar.mobile-hidden {
            display: none !important;
        }
        @media (max-width: 900px) {
            .sidebar {
                transition: left 0.2s;
                z-index: 1001;
                background: #020617;
            }
        }
        @media (max-width: 600px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 50px;
                width: 100vw;
                height: auto;
                flex-direction: row;
                display: flex;
                justify-content: space-around;
                z-index: 1001;
            }
        }
        .sidebar-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.2);
            z-index: 1000;
        }
        .sidebar-backdrop.active {
            display: block;
        }

        /* Bottom nav styles for mobile */
        .bottom-nav {
            display: none;
        }
        @media (max-width: 600px) {
            .sidebar,
            .sidebar-backdrop,
            .sidebar-toggle {
                display: none !important;
            }
            .bottom-nav {
                display: flex;
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100vw;
                height: 56px;
                background: #0f172a;
                z-index: 1002;
                box-shadow: 0 -2px 8px rgba(0,0,0,0.08);
                justify-content: space-around;
                align-items: center;
            }
            .bottom-nav a {
                flex: 1;
                text-align: center;
                color: #cbd5f5;
                text-decoration: none;
                font-size: 22px;
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100%;
                transition: color 0.2s;
            }
            .bottom-nav a.active,
            .bottom-nav a:active {
                color: #2563eb;
            }
            .bottom-nav a span {
                font-size: 11px;
                margin-top: 2px;
                display: block;
            }
        }

        /* Fix content overflow on mobile with bottom nav */
        @media (max-width: 600px) {
            .content {
                padding-bottom: 70px; /* Add space for bottom nav */
            }
        }
        /* Ensure .card takes full width on mobile */
        @media (max-width: 600px) {
            .card {
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar-backdrop" id="sidebar-backdrop"></div>
    <div class="header">
        <button class="sidebar-toggle" id="sidebar-toggle" aria-label="Toggle sidebar">☰</button>
        🛕 Temple Fund Management – Admin Panel
    </div>

    <div class="sidebar" id="sidebar">
        <a href="/admin/dashboard" class="sidebar-link"><span>🏠 Dashboard</span></a>
        <a href="/admin/members" class="sidebar-link"><span>👥 Members</span></a>
        <a href="/donations" class="sidebar-link"><span>💰 Donations</span></a>
        <a href="/admin/expenses" class="sidebar-link"><span>💸 Expenses</span></a>
        <a href="/admin/reports/monthly" class="sidebar-link"><span>📊 Monthly Report</span></a>
        <a href="/admin/loans" class="sidebar-link"><span>💳 Loan</span></a>
        <a href="/admin/logout" class="sidebar-link"><span>🚪 Logout</span></a>
    </div>

    <div class="bottom-nav" id="bottom-nav">
        <a href="/admin/dashboard" id="nav-dashboard"><div>🏠<span>Dashboard</span></div></a>
        <a href="/admin/members" id="nav-members"><div>👥<span>Members</span></div></a>
        <a href="/donations" id="nav-donations"><div>💰<span>Donations</span></div></a>
        <a href="/admin/expenses" id="nav-expenses"><div>💸<span>Expenses</span></div></a>
        <a href="/admin/reports/monthly" id="nav-reports"><div>📊<span>Report</span></div></a>
        <a href="/admin/logout" id="nav-logout"><div>🚪<span>Logout</span></div></a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script>
        // Sidebar toggle for mobile
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebar-toggle');
        const backdrop = document.getElementById('sidebar-backdrop');
        function toggleSidebar() {
            sidebar.classList.toggle('mobile-hidden');
            backdrop.classList.toggle('active');
        }
        toggleBtn.addEventListener('click', toggleSidebar);
        backdrop.addEventListener('click', toggleSidebar);
        // Hide sidebar by default on mobile
        function handleResize() {
            if (window.innerWidth <= 900) {
                sidebar.classList.add('mobile-hidden');
            } else {
                sidebar.classList.remove('mobile-hidden');
                backdrop.classList.remove('active');
            }
        }
        window.addEventListener('resize', handleResize);
        window.addEventListener('DOMContentLoaded', handleResize);

        // Active nav for bottom navigation
        function setActiveNav() {
            const path = window.location.pathname;
            const navLinks = document.querySelectorAll('.bottom-nav a');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === path) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }
        window.addEventListener('DOMContentLoaded', setActiveNav);

        // Active nav for desktop sidebar
        function setActiveSidebar() {
            var path = window.location.pathname;
            var sidebarLinks = document.querySelectorAll('.sidebar-link');
            sidebarLinks.forEach(function(link) {
                if (link.getAttribute('href') === path) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }
        window.addEventListener('DOMContentLoaded', setActiveSidebar);
    </script>
</body>

</html>