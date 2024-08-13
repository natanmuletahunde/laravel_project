<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class IsAdminController extends Controller
{
    public function Admindashboard(){
        return view ('admin.dashboard');
    }
    public function AdminLogout(Request $request){
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/admin/login');
     }
}