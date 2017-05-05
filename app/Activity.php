<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['name','coordinators_guides', 'security_managers', 'type','place','description','learning','goals','init_date','finish_date','photo','video'];

    public function users()
    {
         return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function isAssigned()
    {
        return \DB::table('activity_user')->where('activity_id', $this->id)->count() ? true : false;
    }
}
