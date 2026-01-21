@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="page-header">
        <h2>Donations</h2>
        <a href="/admin/donations/create" class="btn btn-primary">+ Add Donation</a>
    </div>

    <table>
        <tr>
            <th>Date</th>
            <th>Member</th>
            <th>Amount</th>
            <th>Mode</th>
            <th>Action</th>
        </tr>

        @foreach($donations as $d)
        <tr>
            <td>{{ $d->donation_date }}</td>
            <td>
                @if($d->member)
                    <a href="/admin/members/{{ $d->member->id }}">
                        {{ $d->member->name }}
                    </a>
                @else
                    Anonymous
                @endif
            </td>
            <td>₹{{ $d->amount }}</td>
            <td>{{ $d->mode }}</td>
            <td>
                <a href="/admin/donations/{{ $d->id }}/edit" class="btn btn-sm">Edit</a>

                <form method="POST"
                      action="/admin/donations/{{ $d->id }}"
                      style="display:inline;"
                      onsubmit="return confirm('Delete this donation?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection
