@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="page-header">
        <h2>➕ Add Member</h2>
        <a href="/admin/members" class="btn btn-secondary">← Back</a>
    </div>

    <form method="POST" action="/admin/members">
        @csrf
        <div style="display: flex; gap: 16px; flex-wrap: wrap;">
            <div style="flex:1; min-width:180px;">
                <label>Member Name</label>
                <input type="text" name="name" placeholder="Enter full name" required>
            </div>
            <div style="flex:1; min-width:180px;">
                <label>Mobile Number</label>
                <input type="text" name="mobile" placeholder="98XXXXXXXX">
            </div>
        </div>
        <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-top: 12px;">
            <div style="flex:1; min-width:180px;">
                <label>Country</label>
                <select name="address" id="country-select" required>
                    <option value="">Select Country</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="India">India</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="UAE">Dubai</option>
                </select>
            </div>
            <!-- You can add another address/city dropdown here if needed -->
        </div>
        <div style="margin-top:20px;">
            <button class="btn btn-primary">💾 Save Member</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>

</div>

@endsection
