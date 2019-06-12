<?php

namespace App\Http\Controllers\User;

use App\Meal;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndividualMealController extends Controller
{
    public function index(){
        $table = User::orderBy('name','ASC')->get();
        $meal = Meal::where('monthID', session('monthID'))->get();
        return view('individual.individual')->with(['table'=>$table,'meal'=>$meal]);
    }
}
