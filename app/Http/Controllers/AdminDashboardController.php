<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Expense;

class AdminDashboardController extends Controller {
 public function index(){
  return view('admin.dashboard',[
   'donations'=>Donation::sum('amount'),
   'expenses'=>Expense::sum('amount')
  ]);
 }
}

