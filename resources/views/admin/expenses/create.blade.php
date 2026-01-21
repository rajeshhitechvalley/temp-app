@extends('layouts.admin')

@section('content')

<div class="card">
    <h2>Add Expense</h2>

    <form method="POST" action="/admin/expenses">
        @csrf

        <label>Expense Title</label>
        <input type="text" name="title" required>

        <label>Amount</label>
        <input type="number" name="amount" required>

        <label>Date</label>
        <input type="date" name="expense_date" required>

        <br>
        <button class="btn btn-success">Save</button>
        <a href="/admin/expenses" class="btn btn-danger">Cancel</a>
    </form>
</div>

@endsection
