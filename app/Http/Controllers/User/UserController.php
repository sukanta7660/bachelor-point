<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $table = User::orderBy('name','ASC')->get();
        return view('user.user')->with(['table'=>$table]);
    }
    public function profile(){
        return view('user.profile');
    }

    public function profile_info(Request $request){
        $table = User::find($request->userID);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $table->name = $request->name;
        $table->email = $request->email;
        $table->save();

        return redirect()->back();
    }
}
