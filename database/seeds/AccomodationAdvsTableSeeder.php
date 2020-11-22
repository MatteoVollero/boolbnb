<?php

use Illuminate\Database\Seeder;
use App\Accomodation;
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

        $newAccomodation = Accomodation::inRandomOrder()->limit(5);

        foreach ($newAccomodation as $accomodation) {
            $advRandom = Adv::inRandomOrder()->first();
            $accomodation->advs()->attach($advRandom->id, [
                'star_adv'=> Carbon\Carbon::now(),
                'end_adv'=> Carbon\Carbon::now()->addHours($advRandom->hours),
           ]);           
        }

    }
}