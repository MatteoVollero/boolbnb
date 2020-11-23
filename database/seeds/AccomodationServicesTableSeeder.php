<?php

use Illuminate\Database\Seeder;
use App\Accomodation;
use App\Service;

class AccomodationServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Prediamo 5 accomodation in  maniera casuale
      $newAccomodation = Accomodation::inRandomOrder()->limit(5)->get();

      // Per ogni record di $newAccomodation cicliamo
       foreach ($newAccomodation as $accomodation) {
           // Prendiamo in maniera casuale record dalla tabella service per estrapolare l'id
           $serviceRandom = Service::inRandomOrder()->first();
           // Tramite il metodo attach() andiamo ad inserire nella tabella pivotale gli id delle due tabelle rispettivamente accomodation e service
           $accomodation->services()->attach($serviceRandom);
        }
    }
}
