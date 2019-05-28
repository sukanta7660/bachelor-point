<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $table = 'months';
    protected $primaryKey = 'monthID';
    protected $fillable = [
        'month_date', 'userID',
    ];
}
