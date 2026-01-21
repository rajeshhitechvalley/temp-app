@extends('layouts.admin')

@section('content')
<div class="card">
    <h2>{{ $member->name }}</h2>
    <p>Mobile: {{ $member->mobile }}</p>

    <div class="grid">
        <div class="card">Total Donations<div class="stat">{{ $member->donations->count() }}</div></div>
        <div class="card">Total Amount<div class="stat">₹{{ $member->donations->sum('amount') }}</div></div>
    </div>
</div>

<div class="card">
    <h3>Donation History</h3>
    <table>
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Mode</th>
            <th>Purpose</th>
        </tr>

        @foreach($member->donations as $d)
        <tr>
            <td>{{ $d->donation_date }}</td>
            <td>₹{{ $d->amount }}</td>
            <td>{{ $d->mode }}</td>
            <td>{{ $d->purpose }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
