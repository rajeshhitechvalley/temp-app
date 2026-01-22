<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temple Fund Dashboard</title>

    <style>
        :root {
            --primary: #6366f1;
            --bg: #f5f7fb;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
            --radius: 14px;
        }

        * {
            box-sizing: border-box;
            font-family: "Inter", system-ui, sans-serif;
        }

        body {
            margin: 0;
            padding: 20px;
            background: var(--bg);
            color: var(--text);
        }

        h2, h3 {
            margin: 0 0 16px;
        }

        /* Card */
        .card {
            background: var(--card);
            border-radius: var(--radius);
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        /* Stats Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .stat-card {
            padding: 18px;
            border-radius: var(--radius);
            background: linear-gradient(135deg, #eef2ff, #ffffff);
            border: 1px solid var(--border);
        }

        .stat-card span {
            display: block;
            font-size: 13px;
            color: var(--muted);
        }

        .stat {
            font-size: 24px;
            font-weight: 700;
            margin-top: 6px;
        }

        /* Filter */
        .filter-row {
            width: 100% !important;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 16px;
        }

        .filter-row input,
        .filter-row select {
            flex: 1 1 0;
            min-width: 120px;
        }

        .btn {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Table */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
        }

        th {
            background: #f9fafb;
            font-weight: 600;
            color: var(--muted);
        }

        tr:hover td {
            background: #f9fafb;
        }

        /* Mobile tweaks */
        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            h2, h3 {
                font-size: 18px;
            }

            .stat {
                font-size: 20px;
            }
        }

        .input-beauty {
            background: #f4f6fb;
            border: 1.5px solid #d1d5db;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 15px;
            color: #222;
            transition: border 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(99,102,241,0.04);
            outline: none;
        }
        .input-beauty:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px #6366f133;
            background: #fff;
        }
        .input-beauty::placeholder {
            color: #a0aec0;
            opacity: 1;
        }
    </style>
</head>

<body>

<!-- Overview -->
<div class="card">
    <h2>Temple Fund Overview</h2>
    <div class="grid">
        <div class="stat-card">
            <span>Total Members</span>
            <div class="stat">{{ $totalMembers }}</div>
        </div>
        <div class="stat-card">
            <span>Total Fund</span>
            <div class="stat">₹{{ $totalFund }}</div>
        </div>
        <div class="stat-card">
            <span>Total Expense</span>
            <div class="stat">₹{{ $totalExpense }}</div>
        </div>
        <div class="stat-card">
            <span>Remaining Fund</span>
            <div class="stat">₹{{ $remainingFund }}</div>
        </div>
    </div>
</div>

<!-- Donations -->
<div class="card">
    <h3>Donations</h3>

    <form method="GET" class="filter-row" style="width:100%;">
        <input type="text" name="search" class="input-beauty" placeholder="Name or mobile" value="{{ request('search') }}">
        <select name="month" class="input-beauty">
            <option value="">Month</option>
            @for($m=1;$m<=12;$m++)
                <option value="{{ $m }}" {{ request('month')==$m?'selected':'' }}>
                    {{ date('F', mktime(0,0,0,$m,1)) }}
                </option>
            @endfor
        </select>
        <select name="year" class="input-beauty">
            <option value="">Year</option>
            @for($y=date('Y')-5;$y<=date('Y');$y++)
                <option value="{{ $y }}" {{ request('year')==$y?'selected':'' }}>
                    {{ $y }}
                </option>
            @endfor
        </select>
        <button class="btn">Filter</button>
    </form>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Member</th>
                    <th>Amount</th>
                    <th>Mode</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $d)
                <tr>
                    <td>{{ $d->donation_date ?? $d->created_at->format('d M Y') }}</td>
                    <td>{{ $d->member ? $d->member->name : 'Anonymous' }}</td>
                    <td>₹{{ $d->amount }}</td>
                    <td>{{ $d->mode }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Loans -->
<div class="card">
    <h3>Active Loans</h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Person</th>
                    <th>Mobile</th>
                    <th>Amount</th>
                    <th>Date Taken</th>
                    <th>Duration (days)</th>
                    <th>Remaining Days</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->person_name }}</td>
                    <td>{{ $loan->mobile_no }}</td>
                    <td>₹{{ $loan->amount }}</td>
                    <td>{{ $loan->date_taken }}</td>
                    <td>{{ $loan->duration }}</td>
                    <td>
    {{ max(0, (int) $loan->remaining_days) }}
    <small style="color:#6b7280;">days</small>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
