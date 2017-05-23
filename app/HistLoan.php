<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistLoan extends Model
{

    protected $table = 'hist_loans';

    public function user()
    {
         return $this->belongsTo('App\User');
    }

    public function equipment()
    {
         return $this->belongsTo('App\Equipment');
    }
}
