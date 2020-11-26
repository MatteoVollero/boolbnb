<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomodationView extends Model
{
    // relazione inversa 1toM con tab. accomodations
    public function accomodation()
    {
        return $this->belongsTo('App\Accomodation');
    }
}
