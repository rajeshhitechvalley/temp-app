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

    </style>
</head>

<body>

    <div class="header">
        🛕 Temple Fund Management – Admin Panel
    </div>

    <div class="sidebar">
        <a href="/admin/dashboard">🏠 Dashboard</a>
        <a href="/admin/members">👥 Members</a>
        <a href="/donations">💰 Donations</a>
        <a href="/admin/expenses">💸 Expenses</a>
        <a href="/admin/reports/monthly">📊 Monthly Report</a>
        <a href="/admin/logout">🚪 Logout</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>

</html>