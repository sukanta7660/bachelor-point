<?php

namespace App\Http\Controllers\Meal;

use App\Meal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MealController extends Controller
{
    public function index(){
        $table = Meal::orderBy('created_at','DESC')->where('monthID', session('monthID'))
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('d/m/y');
            });
        $users = User::orderBy('id','ASC')->get();
        $ckdate = Meal::select('created_at')->where('monthID', session('monthID'))->whereDate('created_at',date('Y-m-d'))->first();
        return view('inner.meal')->with(['table'=>$table,'ckdate'=>$ckdate,'users' => $users]);
    }

    public function save(Request $request){
        $meals = $request->userID;
        $nom = $request->meal;
        foreach ($meals as $meal => $val){
            $table = new Meal();
            $table->userID = $val;
            $table->monthID = session('monthID');
            $table->nom = $nom[$val];
            $table->save();
        }
        return redirect()->back()->with('success','Data Added Successfully!!');
    }


    public function edit(Request $request){
            $table = Meal::find($request->id);
            $request->validate([
                'meal' => 'required | min:0',
            ]);
            $table->nom = $request->meal;
            $table->save();
        return redirect()->back()->with('edit','Data Edited Successfully!!');
    }
}
