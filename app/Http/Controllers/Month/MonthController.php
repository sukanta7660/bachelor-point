<?php

namespace App\Http\Controllers\Month;

use App\Month;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonthController extends Controller
{
    public function index(){
        $table = Month::orderBy('monthID','DESC')->get();
        return view('months.month')->with(['table'=>$table]);
    }

    public function save(Request $request){
        $table = new Month();
        $request->validate([
            'month' => 'required',
        ]);
        $table->month_date = db_date($request->month).' '.date('0:0:0');
        $table->save();

        return redirect()->back()->with('success','Data Created Successfully!!');
    }

    public function del($id){
        $table = Month::find($id);
        $table->delete();
        return redirect()->back()->with('delete','Data Deleted Successfully!!');
    }
}
