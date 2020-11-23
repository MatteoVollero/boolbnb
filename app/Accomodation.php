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

    /* RELAZIONE DA VERIFICARE! */
    // relazione MtoM con advs
    // public function advs()
    // {
    //     return $this->belongsToMany('App\Adv','accomodation_advs')->withPivot('start_adv', 'end_adv');
    // }

    // public function advs()
    // {
    //     return $this->belongsToMany('App\adv')->using('App\RoleUser');
    // }

    public function advs()
    {
        return $this->belongsToMany('App\Adv')
                        ->using('App\AccomodationAdv')
                        ->withPivot([
                            'start_adv',
                            'end_adv',
                        ]);
    }

}
