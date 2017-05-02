<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['who_are','schedule_meetings', 'objetives', 'history','dni_club','birthdate','address','logo'];
}
