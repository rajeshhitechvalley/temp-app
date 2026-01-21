<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class MemberController extends Controller
{
    public function index()
    {
        $members = Member::withCount('donations')
            ->withSum('donations','amount')
            ->get();

        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $r)
    {
        Member::create($r->only('name','mobile','address'));
        return redirect('/admin/members');
    }

    public function show(Member $member)
    {
        $member->load('donations');
        return view('admin.members.show', compact('member'));
    }
}
