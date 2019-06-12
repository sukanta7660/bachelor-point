<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    protected $table = 'deposites';
    protected $primaryKey = 'depositID';
    protected $fillable = [
       'amount','monthID', 'userID',
    ];

    public function members(){
        return $this->belongsTo('App\User','userID');
    }
    public function month(){
        return $this->belongsTo('App\Month','monthID');
    }
}
