<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();
        // Add remaining days calculation for each loan
        foreach ($loans as $loan) {
            $end = \Carbon\Carbon::parse($loan->date_taken)->addDays($loan->duration);
            $now = now();
            $loan->remaining_days = $now->greaterThan($end) ? 0 : $now->diffInDays($end, false);
        }
        return view('admin.loans.index', compact('loans'));
    }

    public function create()
    {
        return view('admin.loans.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'person_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'mobile_no' => 'required|numeric',
            'date_taken' => 'required|date',
            'interest' => 'required|numeric',
            'duration' => 'required|integer',
        ]);
        Loan::create($data);
        return redirect('/admin/loans')->with('success', 'Loan added!');
    }

    public function edit($id)
    {
        $loan = Loan::findOrFail($id);
        return view('admin.loans.edit', compact('loan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'person_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'mobile_no' => 'required|numeric',
            'date_taken' => 'required|date',
            'interest' => 'required|numeric',
            'duration' => 'required|integer',
        ]);
        $loan = Loan::findOrFail($id);
        $loan->update($data);
        return redirect('/admin/loans')->with('success', 'Loan updated!');
    }

    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect('/admin/loans')->with('success', 'Loan deleted!');
    }
}
