<?php

use Illuminate\Database\Seeder;
use App\Accomodation;
use App\AccomodationAdv;
use App\Adv;


class AccomodationAdvsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 5 ; $i++) { 
            $advRandom = Adv::inRandomOrder()->first();
            $accomodationRandom = Accomodation::inRandomOrder()->first();
            $newAccAdv = new AccomodationAdv();
            $newAccAdv->adv_id = $advRandom->id;
            $newAccAdv->accomodation_id = $accomodationRandom->id;
            $newAccAdv->start_adv = Carbon\Carbon::now();
            $newAccAdv->end_adv = Carbon\Carbon::now()->addHours($advRandom->hours);
            $newAccAdv->save();
        }

        // old option
        // $newAccomodation = Accomodation::inRandomOrder()->limit(5);

        // foreach ($newAccomodation as $accomodation) {
        //     $advRandom = Adv::inRandomOrder()->first();
        //     $accomodation->advs()->attach($advRandom->id, [
        //         'star_adv'=> Carbon\Carbon::now(),
        //         'end_adv'=> Carbon\Carbon::now()->addHours($advRandom->hours),
        //    ]);           
        // }

    }
}