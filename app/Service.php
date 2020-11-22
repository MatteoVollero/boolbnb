<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // relazione MtoM con accomodations
    public function accomodaions()
    {
        return $this->belongsToMany('App\Accomodation');
    }
}
