<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['place','attendant'];    
    public function users()
    {
         return $this->belongsToMany('App\User');
    }
}
