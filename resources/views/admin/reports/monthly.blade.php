@extends('layouts.admin')

@section('content')

<div class="card">
    <h2>Monthly Report</h2>

    <form method="GET">
        <label>Month</label>
        <select name="month">
            @for($m=1;$m<=12;$m++)
                <option value="{{ $m }}" {{ $m==$month?'selected':'' }}>
                    {{ date('F', mktime(0,0,0,$m,1)) }}
                </option>
            @endfor
        </select>

        <label>Year</label>
        <select name="year">
            @for($y=date('Y')-5;$y<=date('Y');$y++)
                <option value="{{ $y }}" {{ $y==$year?'selected':'' }}>
                    {{ $y }}
                </option>
            @endfor
        </select>

        <br><br>
        <button class="btn btn-primary">View Report</button>
    </form>
</div>

<div class="grid">
    <div class="card">Donation<div class="stat">₹{{ $totalDonation }}</div></div>
    <div class="card">Expense<div class="stat">₹{{ $totalExpense }}</div></div>
    <div class="card">Balance<div class="stat">₹{{ $balance }}</div></div>
</div>

<div class="card">
    <h3>Donation Details</h3>
    <table>
        <tr>
            <th>Date</th><th>Name</th><th>Amount</th><th>Mode</th>
        </tr>
        @foreach($donations as $d)
        <tr>
            <td>{{ $d->created_at->format('d M Y') }}</td>
            <td>{{ $d->member->name }}</td>
            <td>₹{{ $d->amount }}</td>
            <td>{{ $d->mode }}</td>
        </tr>
        @endforeach
    </table>
</div>

<div class="card">
    <h3>Expense Details</h3>
    <table>
        <tr>
            <th>Date</th><th>Title</th><th>Amount</th>
        </tr>
        @foreach($expenses as $e)
        <tr>
            <td>{{ $e->expense_date }}</td>
              <td>{{ $e->member->name }}</td>
            <td>{{ $e->title }}</td>
            <td>₹{{ $e->amount }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
