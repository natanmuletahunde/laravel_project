<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class RegUserController extends Controller
{
    public function Users(){
        $users= Admin::all();
        return view("admin.registeredusers",compact("users"));
    }
    public function EditUser($user_id){
        $user= Admin::find($user_id);
        return view("admin.edituser",compact("user"));
    }
    public function Update(Request $request , $user_id){
        $user= Admin::find($user_id);
        if($user)
        {
            $user->is_admin=$request->is_admin;
           
            $user->update();
            return redirect()->route('admin.registeredusers')->with('message','updated successfully');
        }
        return redirect()->route('admin.registeredusers')->with('message','no user found');
    }

}
