<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    /* RELAZIONE DA VERIFICARE! */
    // relazione MtoM con accomodations
    public function accomodations()
    {
        return $this->belongsToMany('App\Accomodation','accomodation_advs')->withPivot('start_adv', 'end_adv');
        // return $this->belongsToMany('App\Accomodation');
    }
}