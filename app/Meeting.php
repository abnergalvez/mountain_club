<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['place','attendant'];

    public function users()
    {
         return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function isAssigned()
    {
        return \DB::table('meeting_user')->where('meeting_id', $this->id)->count() ? true : false;
    }
}
