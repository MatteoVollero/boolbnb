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
      $newAccomodation = Accomodation::inRandomOrder()->limit(5)->get();

       foreach ($newAccomodation as $accomodation) {
           $serviceRandom = Service::inRandomOrder()->first();
           $accomodation->services()->attach($serviceRandom);
        }
    }
}
