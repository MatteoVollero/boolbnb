<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Utilizziamo Faker per la popolazione della tabella services
        for($i = 0 ; $i < 10; $i ++){
          $newService = new Service;


          //Utilizzo una parola che sarà la descrizione del servizio
          $newService->service_name = $faker->word;

          //Salvo il nuovo record inserito
          $newService->save();
        }

    }
}
