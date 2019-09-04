<?php

namespace App\Http\Controllers\User;

use App\Expense;
use App\Meal;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndividualMealController extends Controller
{
    public function index(){
        $table = User::orderBy('name','ASC')->get();
        $expense = Expense::where('monthID', session('monthID'))->get();
        $meal = Meal::where('monthID', session('monthID'))->get();
        return view('individual.individual')->with(['table'=>$table,'meal' => $meal, 'expense' => $expense]);
    }
}
