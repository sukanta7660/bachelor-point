<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = 'meals';
    protected $primaryKey = 'mealID';
    protected $fillable = [
        'nom','monthID', 'userID',
    ];

    public function members(){
        return $this->belongsTo('App\User','userID');
    }
    public function month(){
        return $this->belongsTo('App\Month','monthID');
    }
}
