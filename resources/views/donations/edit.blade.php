@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="page-header">
        <h2>✏ Edit Donation</h2>
        <a href="/admin/donations" class="btn btn-secondary">← Back</a>
    </div>

    <form method="POST" action="/admin/donations/{{ $donation->id }}">
        @csrf
        @method('PUT')

        <label>Member</label>
        <select name="member_id">
            <option value="">Anonymous</option>
            @foreach($members as $m)
                <option value="{{ $m->id }}"
                    {{ $donation->member_id == $m->id ? 'selected' : '' }}>
                    {{ $m->name }} ({{ $m->mobile }})
                </option>
            @endforeach
        </select>

        <label>Amount</label>
        <input type="number" name="amount" value="{{ $donation->amount }}" required>

        <label>Payment Mode</label>
        <select name="mode">
            <option {{ $donation->mode=='Cash'?'selected':'' }}>Cash</option>
            <option {{ $donation->mode=='UPI'?'selected':'' }}>UPI</option>
            <option {{ $donation->mode=='Bank'?'selected':'' }}>Bank</option>
        </select>

        <label>Purpose</label>
        <input type="text" name="purpose" value="{{ $donation->purpose }}">

        <label>Donation Date</label>
        <input type="date" name="donation_date"
               value="{{ $donation->donation_date }}" required>

        <br><br>
        <button class="btn btn-primary">💾 Update Donation</button>
    </form>

</div>

@endsection
