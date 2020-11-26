<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomodationType extends Model
{
    public $timestamps = false;

    // relazione 1toM con accomodations
    public function accomodations()
    {
        return $this->hasMany('App\Accomodation');
    }

}
