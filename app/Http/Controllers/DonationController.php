<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Member;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('member')
            ->whereHas('member')
            ->latest()
            ->get();

        //dd($donations);
        return view('donations.index', compact('donations'));
    }
    public function create()
    {
        $members = Member::orderBy('name')->get();
        return view('donations.create', compact('members'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'amount' => 'required|numeric',
            'donation_date' => 'required|date',
        ]);

        $memberId = $r->member_id;

        // Auto create member if not selected
        if (!$memberId && $r->member_name) {
            $member = Member::create([
                'name' => $r->member_name,
                'mobile' => $r->member_mobile,
                'address' => $r->member_address,
            ]);
            $memberId = $member->id;
        }

        Donation::create([
            'member_id' => $memberId,
            'amount' => $r->amount,
            'mode' => $r->mode,
            'purpose' => $r->purpose,
            'donation_date' => $r->donation_date,
        ]);

        return redirect('/donations')
            ->with('success', 'Donation added successfully');
    }
    public function edit(Donation $donation)
    {
        $members = Member::orderBy('name')->get();
        return view('donations.edit', compact('donation', 'members'));
    }

    public function update(Request $r, Donation $donation)
    {
        $r->validate([
            'amount' => 'required|numeric',
            'donation_date' => 'required|date',
        ]);

        $donation->update([
            'member_id' => $r->member_id,
            'amount' => $r->amount,
            'mode' => $r->mode,
            'purpose' => $r->purpose,
            'donation_date' => $r->donation_date,
        ]);

        return redirect('/donations')
            ->with('success', 'Donation updated successfully');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();

        return redirect('/donations')
            ->with('success', 'Donation deleted successfully');
    }
}
