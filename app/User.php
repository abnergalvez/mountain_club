<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','last_name', 'email', 'password','role'];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function suggestions()
    {
        return $this->hasMany('App\Suggestion');
    }

    public function meetings()
    {
         return $this->belongsToMany('App\Meeting');
    }

    public function equipments()
    {
         return $this->belongsToMany('App\Equipment')->withTimestamps();;
    }

    public function activities()
    {
         return $this->belongsToMany('App\Activity');
    }

    public function isAdmin()
    {
      return $this->role == 'admin' ? true : false;
    }

    public function isMember()
    {
      return $this->role == 'member' ? true : false;
    }

    public function isAssigned()
    {
        return \DB::table('equipment_user')->where('user_id', $this->id)->count() ? true : false;
    }
}
