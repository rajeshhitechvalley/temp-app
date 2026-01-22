@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="page-header">
        <h2>Loans</h2>
        <a href="/admin/loans/create" class="btn btn-primary">+ Add Loan</a>
    </div>
    <div class="table-responsive">
        <table>
            <tr>
                <th>Person Name</th>
                <th>Mobile No</th>
                <th>Amount</th>
                <th>Date Taken</th>
                <th>Interest (%)</th>
                <th>Duration (days)</th>
                <th>Remaining Days</th>
                <th>Countdown</th>
                <th>Action</th>
            </tr>
            @foreach($loans as $loan)
            <tr>
                <td>{{ $loan->person_name }}</td>
                <td>{{ $loan->mobile_no }}</td>
                <td>Rs.{{ $loan->amount }}</td>
                <td>{{ $loan->date_taken }}</td>
                <td>{{ $loan->interest }}</td>
                <td>{{ $loan->duration }}</td>
                <td>{{ $loan->remaining_days }}</td>
                <td>{{ $loan->countdown }}</td>
                <td>
                    <a href="/admin/loans/{{ $loan->id }}/edit" class="btn btn-sm">Edit</a>
                    <form method="POST" action="/admin/loans/{{ $loan->id }}" style="display:inline;" onsubmit="return confirm('Delete this loan?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

<style>
.table-responsive { width: 100%; overflow-x: auto; }
@media (max-width: 600px) {
    table { font-size: 14px; min-width: 700px; }
    th, td { padding: 8px; }
}
</style>
