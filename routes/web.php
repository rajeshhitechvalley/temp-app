<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MonthlyReportController;
use App\Http\Controllers\MemberController;

Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ne'])) {
        session(['locale' => $lang]);
    }
    return back();
});

Route::get('/',fn()=>view('welcome'));
Route::resource('/admin/members', MemberController::class);

Route::get('/donations',[DonationController::class,'index']);
Route::get('/admin/donations/create',[DonationController::class,'create']);
Route::post('/donations',[DonationController::class,'store']);

Route::get('/admin/login',[AdminAuthController::class,'login']);
Route::post('/admin/login',[AdminAuthController::class,'doLogin']);
Route::get('/admin/logout',[AdminAuthController::class,'logout']);

Route::get('/admin/donations/{donation}/edit', [DonationController::class, 'edit']);
Route::put('/admin/donations/{donation}', [DonationController::class, 'update']);
Route::delete('/admin/donations/{donation}', [DonationController::class, 'destroy']);


Route::middleware('admin')->group(function(){
 Route::get('/admin/dashboard',[AdminDashboardController::class,'index']);
 Route::get('/admin/expenses',[ExpenseController::class,'index']);
 Route::get('/admin/expenses/create',[ExpenseController::class,'create']);
 Route::post('/admin/expenses',[ExpenseController::class,'store']);
 Route::get('/admin/reports/monthly',[MonthlyReportController::class,'index']);
});
