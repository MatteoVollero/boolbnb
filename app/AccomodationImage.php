<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomodationImage extends Model
{
    // relazione inversa 1toM con accomodations
    public function accomodation ()
    {
        return $this->belongsTo('App\Accomodation');
    }
}
