@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="page-header">
        <h2>Edit Loan</h2>
    </div>
    <form method="POST" action="/admin/loans/{{ $loan->id }}">
        @csrf
        @method('PUT')
        <label>Person Name</label>
        <input type="text" name="person_name" value="{{ $loan->person_name }}" required>
        <label>Mobile No</label>
        <input type="text" name="mobile_no" value="{{ $loan->mobile_no }}" required>
        <label>Amount</label>
        <input type="number" name="amount" step="0.01" value="{{ $loan->amount }}" required>
        <label>Date Taken</label>
        <input type="date" name="date_taken" value="{{ $loan->date_taken }}" required>
        <label>Interest (%)</label>
        <input type="number" name="interest" step="0.01" value="{{ $loan->interest }}" required>
        <label>Duration (days)</label>
        <input type="number" name="duration" value="{{ $loan->duration }}" required>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>
@endsection
