<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Accomodation;
use App\AccomodationView;

class AccomodationViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Inserisco una decina di record all'interno della tabella accomodation_views
        for($i = 0 ; $i < 10 ;  $i ++)
        {
          //Tramite accomodation mi tiro fuori un record casuali per estrapolare l'id
          $accomodationIds = Accomodation::inRandomOrder()->first();

          //Alloco memoria per un'istanza di AccomodationView
          $newAccomodationView = new AccomodationView;

          // Inserisco i dati all'interno della tabella
          $newAccomodationView->accomodation_id = $accomodationIds->id;
          $newAccomodationView->date = $faker->date;
          $newAccomodationView->user_ip = $faker->ipv4;

          // Salvo
          $newAccomodationView->save();
        }
    }
}
