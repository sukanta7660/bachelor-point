<?php

namespace App\Http\Controllers\User;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

    public function check(){
        $days = User::orderBy('created_at')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('d');
            });

        foreach ($days as $day => $users) {
            echo '<h2>'.$day.'</h2><ul>';
            foreach ($users as $user) {
                echo '<li>'.$user->created_at.'</li>';
            }
            echo '</ul>';
        }
    }

    public function create_user(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed',
            'imageName' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $table = new User();
        $table->name = $request->name;
        $table->email = $request->email;
        $table->password = Hash::make($request->password);
        //image upload
        if ($request->hasFile('imageName')) {

            $extnshon = $request->imageName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;

            $table->imageName = $filename;

            $request->imageName->move('public/upload/profile',$filename);
        }
        $table->save();
        return redirect()->back()->with('success','Data Created Successfully!!');
    }

    public function edit_user(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'imageName' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $table = User::find($request->id);
        $table->name = $request->name;
        $table->email = $request->email;
        //image upload
        if ($request->hasFile('imageName')) {

            // previous file delete
            $file = public_path('upload/profile/'.$table->imageName);
            if(file_exists($file)){
                unlink($file);
            }
            // previous file delete

            $extnshon = $request->imageName->extension();
            $filename =  md5(date('Y-m-d H:i:s'));
            $filename = $filename.'.'.$extnshon;

            $table->imageName = $filename;

            $request->imageName->move('public/upload/profile',$filename);
        }
        $table->save();
        return redirect()->back()->with('edit','Data edited Successfully!!');
    }

    public function del($id){
        $table = User::find($id);
        $table->delete();
        return redirect()->back()->with('delete','Data Deleted Successfully!!');
    }
}
