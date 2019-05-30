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
}
