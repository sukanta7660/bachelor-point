<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $table = 'months';
    protected $primaryKey = 'monthID';
    protected $fillable = [
        'month_date','balance', 'userID',
    ];

    public function expense()
    {
        return $this->hasMany('App\Expense','monthID');
    }
    public function deposit()
    {
        return $this->hasMany('App\Deposite','monthID');
    }
    public function meal()
    {
        return $this->hasMany('App\Meal','monthID');
    }
}
