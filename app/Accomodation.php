<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    // relazione inversa 1toM con users
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // relazione 1toM con user_messages
    public function user_messages()
    {
        return $this->hasMany('App\UserMessage');
    }

    // relazione 1toM con accomodation_views
    public function accomodation_views()
    {
        return $this->hasMany('App\AccomodationView');
    }

    // relazione 1toM con accomodation_images
    public function accomodation_images()
    {
        return $this->hasMany('App\AccomodationImage');
    }

    // relazione MtoM con services
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    // relazione MtoM con advs
    public function advs()
    {
        return $this->belongsToMany('App\Adv')->withPivot('start_adv','end_adv','price_paid');
    }

    // relazione inversa Mto1 con accomodation_types
    public function accomodation_type()
    {
        return $this->belongsTo('App\AccomodationType','type_id');
    }

}
