<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        //$monthly_expense = DB::table('expenses')->select('amount')->where('created_at',date('y-m-d'))->sum('amount');
        return view('main');
    }
}
