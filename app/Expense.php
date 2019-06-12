<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'expenseID';
    protected $fillable = [
        'name','amount','monthID', 'userID',
    ];

    public function members(){
        return $this->belongsTo('App\User','userID');
    }
    public function month(){
        return $this->belongsTo('App\Month','monthID');
    }
}
