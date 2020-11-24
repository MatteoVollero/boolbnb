<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    // relazione MtoM con accomodations
    public function accomodations()
    {
        // return $this->belongsToMany('App\Accomodation','accomodation_advs')->withPivot('start_adv', 'end_adv','price_paid');
        return $this->belongsToMany('App\Accomodation');
    }
}
