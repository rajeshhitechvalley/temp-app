@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="page-header">
        <h2>➕ Add Donation</h2>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a>
    </div>

    <form method="POST" action="/donations">
        @csrf

        {{-- MEMBER SECTION --}}
        <h3>Member Details</h3>

        <label>Select Existing Member</label>
        <select name="member_id" id="member_id_select">
            <option value="">➕ New Member</option>
            @foreach($members as $m)
                <option value="{{ $m->id }}">
                    {{ $m->name }} ({{ $m->mobile }})
                </option>
            @endforeach
        </select>

        <div id="new-member-section">
            <hr>

            <label>Member Name (for new member)</label>
            <input type="text" name="member_name" placeholder="Enter member name">

            <label>Mobile</label>
            <input type="text" name="member_mobile" placeholder="98XXXXXXXX">

            <label>Address</label>
            <input type="text" name="member_address" placeholder="Village / Ward">

            <hr>
        </div>

        {{-- DONATION DETAILS --}}
        <h3>Donation Details</h3>

        <label>Amount</label>
        <input type="number" name="amount" required>

        <label>Payment Mode</label>
        <select name="mode">
            <option>Cash</option>
            <option>UPI</option>
            <option>Bank</option>
        </select>

        <label>Purpose</label>
        <select name="purpose">
            <option value="General">General</option>
            <option value="Health">Health</option>
            <option value="Education">Education</option>
            <option value="Helping">Helping</option>
            <option value="Bhoj">Bhoj</option>
        </select>

        <label>Donation Date</label>
        <input type="date" name="donation_date" value="{{ date('Y-m-d') }}" required>

        <br><br>
        <button class="btn btn-primary">💾 Save Donation</button>

    </form>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    var select = document.getElementById('member_id_select');
    var newMemberSection = document.getElementById('new-member-section');
    function toggleNewMemberSection() {
        if (select.value && select.value !== "") {
            newMemberSection.style.display = 'none';
        } else {
            newMemberSection.style.display = 'block';
        }
    }
    select.addEventListener('change', toggleNewMemberSection);
    toggleNewMemberSection();
});
</script>
