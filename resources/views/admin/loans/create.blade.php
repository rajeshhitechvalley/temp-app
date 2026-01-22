@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="page-header">
        <h2>Add Loan</h2>
    </div>
    <form method="POST" action="/admin/loans">
        @csrf
        <div class="form-row" style="display: flex; gap: 16px; flex-wrap: wrap;">
            <div style="flex:1; min-width:180px;">
                <label>Person Name</label>
                <input type="text" name="person_name" required>
            </div>
            <div style="flex:1; min-width:180px;">
                <label>Mobile No</label>
                <input type="text" name="mobile_no" required>
            </div>
        </div>
        <div class="form-row" style="display: flex; gap: 16px; flex-wrap: wrap;">
            <div style="flex:1; min-width:120px;">
                <label>Amount</label>
                <input type="number" name="amount" step="0.01" required>
            </div>
            <div style="flex:1; min-width:120px;">
                <label>Date Taken</label>
                <input type="date" name="date_taken" required>
            </div>
        </div>
        <div class="form-row" style="display: flex; gap: 16px; flex-wrap: wrap;">
            <div style="flex:1; min-width:120px;">
                <label>Interest (%)</label>
                <input type="number" name="interest" step="0.01" required>
            </div>
            <div style="flex:1; min-width:120px;">
                <label>Duration (days)</label>
                <input type="number" name="duration" required>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
@endsection
