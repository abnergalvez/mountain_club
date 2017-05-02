<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['month','type','amount','user_id'];

    public function user()
    {
         return $this->belongsTo('App\User');
    }
}
