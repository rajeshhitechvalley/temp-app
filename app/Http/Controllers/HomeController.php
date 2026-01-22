<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Donation;
use App\Models\Expense;
use App\Models\Loan;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $totalMembers = Member::count();
        $totalFund = Donation::sum('amount');
        $totalExpense = Expense::sum('amount');
        $remainingFund = $totalFund - $totalExpense;

        $donationsQuery = Donation::with('member');
        if ($request->search) {
            $donationsQuery->whereHas('member', function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->search.'%')
                  ->orWhere('mobile', 'like', '%'.$request->search.'%');
            });
        }
        if ($request->month) {
            $donationsQuery->whereMonth('donation_date', $request->month);
        }
        if ($request->year) {
            $donationsQuery->whereYear('donation_date', $request->year);
        }
        $donations = $donationsQuery->orderByDesc('donation_date')->limit(50)->get();

        $loans = Loan::all();
        foreach ($loans as $loan) {
            $end = \Carbon\Carbon::parse($loan->date_taken)->addDays($loan->duration);
            $now = now();
            $loan->remaining_days = $now->greaterThan($end) ? 0 : $now->diffInDays($end, false);
        }

        return view('welcome', compact('totalMembers', 'totalFund', 'totalExpense', 'remainingFund', 'donations', 'loans'));
    }
}
