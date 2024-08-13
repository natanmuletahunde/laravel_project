<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function register(){
        return view ('Admin.register');
    }
    
    public function registerPost(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $admins = new Admin();
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password = Hash::make($request->password);
        $admins->save();

        return redirect()->route('admin.login');
    }

    public function login(){
        return view ('Admin.login');
    }

    public function loginPost(Request $request)
{
    // Validate the input
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    // Get the credentials
    $credentials = $request->only('email', 'password');

    // Attempt to log in with the admin guard
    if (Auth::guard('admin')->attempt($credentials)) {
        // Redirect to the intended page or default to the root
        if (auth('admin')->user()->is_admin== 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.userdashboard');
        }
    }

    // Redirect back with an error message
    return redirect()->route('admin.login');
}


}