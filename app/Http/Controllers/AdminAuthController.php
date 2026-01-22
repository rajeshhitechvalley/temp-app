<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $r)
    {
        $admin = Admin::where('email', $r->email)->first();
        if ($admin && Hash::check($r->password, $admin->password)) {
            session(['admin' => $admin->id]);
            return redirect('/admin/dashboard');
        }
        return back()->with('error', 'Invalid login');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect('/admin/login');
    }
}
