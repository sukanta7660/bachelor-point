<?php

namespace App\Http\Controllers\Expense;

use App\Expense;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index(){
        $table = Expense::orderBy('created_at','DESC')->where('monthID', session('monthID'))
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('d/m/y');
            });
        $total_expense = DB::table('expenses')->select('amount')->where('monthID', session('monthID'))->sum('amount');
        $total_row = DB::table('expenses')->where('monthID', session('monthID'))->count();
        $users = User::orderBy('name','ASC')->get();
        return view('inner.expense')->with(['table'=>$table,'total_expense' => $total_expense,'users' => $users,'total_row' => $total_row]);
    }
}
