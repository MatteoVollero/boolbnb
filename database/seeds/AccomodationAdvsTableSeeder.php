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

            // Prendiamo un record da adv per estrapolare l'id
            $advRandom = Adv::inRandomOrder()->first();
            // Prendiamo un record da accomodation per estrapolare l'id
            $accomodationRandom = Accomodation::inRandomOrder()->first();
            // Creiamo un'istanza al fine di inserire i nuovi record
            $newAccAdv = new AccomodationAdv();
            // Riempiamo tutti i campi di accomodation_adv
            $newAccAdv->adv_id = $advRandom->id;
            $newAccAdv->accomodation_id = $accomodationRandom->id;
            $newAccAdv->price_paid = $advRandom->price;
            $newAccAdv->start_adv = Carbon\Carbon::now();// Prendiamo l'ora attuale
            $newAccAdv->end_adv = Carbon\Carbon::now()->addHours($advRandom->hours);// Aggiungiamo le corrispondenti ore della sponsorizzazione
            // Salviamo il tutto
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
