<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function Userdashboard(){
        return view ('user.userdashboard');
    }
    public function UserLogout(Request $request){
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/admin/login');
     }
//    

}