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
        //Inseriamo dei record all'interno della tabella accomodation_views
        for($i = 0 ; $i < 30 ;  $i ++)
        {
          //Tramite accomodation tiriamo fuori un record casuale per estrapolare l'id
          $accomodationIds = Accomodation::inRandomOrder()->first();

          //Allochiamo memoria per un'istanza di AccomodationView
          $newAccomodationView = new AccomodationView;

          // Inseriamo i dati all'interno della tabella
          $newAccomodationView->accomodation_id = $accomodationIds->id;
          $newAccomodationView->date = $faker->dateTime;
          $newAccomodationView->user_ip = $faker->ipv4;

          // Salviamo
          $newAccomodationView->save();
        }
    }
}
