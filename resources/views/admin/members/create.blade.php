@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="page-header">
        <h2>➕ Add Member</h2>
        <a href="/admin/members" class="btn btn-secondary">← Back</a>
    </div>

    <form method="POST" action="/admin/members">
        @csrf

        <div class="form-group">
            <label>Member Name</label>
            <input type="text" name="name" placeholder="Enter full name" required>
        </div>

        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="mobile" placeholder="98XXXXXXXX">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" placeholder="Village / Ward / City"></textarea>
        </div>

        <div style="margin-top:20px;">
            <button class="btn btn-primary">💾 Save Member</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>

</div>

@endsection
