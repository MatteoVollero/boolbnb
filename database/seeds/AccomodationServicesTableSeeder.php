<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Accomodation;
use App\Service;

class AccomodationServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      // Prediamo 5 accomodation in  maniera casuale
      $newAccomodation = Accomodation::all();

      // Per ogni record di $newAccomodation cicliamo
       foreach ($newAccomodation as $accomodation) {
           // Prendiamo in maniera casuale record dalla tabella service per estrapolare l'id
           $randomServices = Service::inRandomOrder()->limit($faker->numberBetween(1,6))->get();
           // Tramite il metodo attach() andiamo ad inserire nella tabella pivotale gli id delle due tabelle rispettivamente accomodation e service
           foreach($randomServices as $randomService)
           {
            $accomodation->services()->attach($randomService); 
           }
        }
    }
}
