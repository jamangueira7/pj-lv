<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socialauth extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
