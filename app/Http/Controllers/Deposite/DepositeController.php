<?php

namespace App\Http\Controllers\Deposite;

use App\Deposite;
use App\Month;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DepositeController extends Controller
{
    public function index(){
        $table = Deposite::orderBy('depositID','DESC')->where('monthID', session('monthID'))->get();
        $users = User::orderBy('id','ASC')->get();
        return view('deposite.deposite')->with(['table'=>$table,'users' => $users]);
    }

    public function save(Request $request){
        DB::beginTransaction();
        try {

            $month = Month::find(session('monthID'));
            $deposit = $request->amount;
            $old_balance = $month->balance;
            $new_balance = $old_balance + $deposit;
            $month->balance = $new_balance;
            $month->save();

            $table = new Deposite();
            $request->validate([
                'userID' => 'required',
                'amount' => 'required | min:0',
            ]);
            $table->amount = $request->amount;
            $table->monthID = session('monthID');
            $table->userID = $request->userID;
            $table->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->back()->with('success','Data Added Successfully!!');
    }


    public function edit(Request $request){
        DB::beginTransaction();
        try {
            $month = Month::find(session('monthID'));
            $old = $request->old_amount;
            $updated_bal = $request->amount;
            $balance_up = $month->balance - $old;
            $new_balance = $balance_up + $updated_bal;
            $month->balance = $new_balance;
            $month->save();

            $table = Deposite::find($request->id);
            $request->validate([
                'userID' => 'required',
                'amount' => 'required | min:0',
            ]);
            $table->amount = $request->amount;
            $table->userID = $request->userID;
            $table->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with('edit','Data edited Successfully!!');
    }

    public function del($id){
        $table = Deposite::find($id);
        DB::beginTransaction();
        try {

            $month = Month::find(session('monthID'));
            $old = $month->balance;
            $deposit_ammount = $table->amount;
            $new_balance = $old - $deposit_ammount;
            $month->balance = $new_balance;
            $month->save();


            $table->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->back()->with('delete','Data Deleted Successfully!!');
    }
}
