<?php

namespace App\Http\Controllers\Expense;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    public function index(){
        return view('inner.expense');
    }
}
