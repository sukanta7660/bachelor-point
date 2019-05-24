<?php

namespace App\Http\Controllers\Auth;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required | confirmed'
        ]);

        $hashedPass = Auth::user()->password;

        if (Hash::check($request->oldpassword,$hashedPass)){

            $user = User::find(Auth::user()->id);
            $user->password = Hash::make('password');
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('successMsg',"Password changed Successfully");
        }else{
            return redirect()->back()->with('errorMsg',"Current Password is Invalid");
        }
    }
}
