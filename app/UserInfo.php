<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    // relazione inversa 1to1 con users
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
