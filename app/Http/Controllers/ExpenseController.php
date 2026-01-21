<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller {
 public function index(){
  return view('admin.expenses.index',['expenses'=>Expense::all()]);
 }
 public function create(){ return view('admin.expenses.create'); }
 public function store(Request $r){
  Expense::create($r->all());
  return redirect('/admin/expenses');
 }
}
