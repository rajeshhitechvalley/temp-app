<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Expense;

class MonthlyReportController extends Controller
{
    public function index(Request $r)
    {
        $month = $r->month ?? date('m');
        $year  = $r->year ?? date('Y');

        $donations = Donation::with('member')
            ->whereHas('member')
            ->whereMonth('donation_date', $month)
            ->whereYear('donation_date', $year)
            ->get();


        $expenses = Expense::with('member')
            ->whereMonth('expense_date', $month)
            ->whereYear('expense_date', $year)
            ->get();

        $totalDonation = $donations->sum('amount');
        $totalExpense  = $expenses->sum('amount');
        $balance       = $totalDonation - $totalExpense;

        return view('admin.reports.monthly', compact(
            'donations',
            'expenses',
            'totalDonation',
            'totalExpense',
            'balance',
            'month',
            'year'
        ));
    }
}
