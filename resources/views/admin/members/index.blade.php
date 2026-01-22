@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="page-header">
        <h2>Members</h2>
        <a href="/admin/members/create" class="btn btn-primary">+ Add Member</a>
    </div>

    <div class="table-responsive">
        <table>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Total Donations</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>

            @foreach($members as $m)
            <tr>
                <td>{{ $m->name }}</td>
                <td>{{ $m->mobile }}</td>
                <td>{{ $m->donations_count }}</td>
                <td>Rs.{{ $m->donations_sum_amount ?? 0 }}</td>
                <td>
                    <a href="/admin/members/{{ $m->id }}" class="btn btn-sm">View</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

<style>
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }
    @media (max-width: 600px) {
        table {
            font-size: 14px;
            min-width: 500px;
        }
        th, td {
            padding: 8px;
        }
    }
</style>
