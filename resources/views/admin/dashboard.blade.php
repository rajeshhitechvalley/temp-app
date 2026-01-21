@extends('layouts.admin')

@section('content')

<h2>Dashboard</h2>

<div class="grid">
    <div class="card">
        Total Donations
        <div class="stat">₹{{ $donations }}</div>
    </div>

    <div class="card">
        Total Expenses
        <div class="stat">₹{{ $expenses }}</div>
    </div>

    <div class="card">
        Balance
        <div class="stat">₹{{ $donations - $expenses }}</div>
    </div>
</div>

@endsection
