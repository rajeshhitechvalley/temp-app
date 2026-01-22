@extends('layouts.admin')

@section('content')

<div class="card">
    <h2>Expense Management</h2>
    <a href="/admin/expenses/create" class="btn btn-primary">➕ Add Expense</a>

    <table>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Amount</th>
        </tr>

        @foreach($expenses as $e)
        <tr>
            <td>{{ $e->expense_date }}</td>
            <td>{{ $e->title }}</td>
            <td>Rs.{{ $e->amount }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
