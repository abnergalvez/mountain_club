<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name','brand', 'model', 'cost','photo'];

    public function users()
    {
         return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function isAssigned()
    {
        return \DB::table('equipment_user')->where('equipment_id', $this->id)->count() ? true : false;
    }
}
