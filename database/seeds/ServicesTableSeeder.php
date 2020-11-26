<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Array con tutti i servizi richiesti
        $services = ['wi-fi', 'parking', 'pool', 'reception', 'sauna', 'sea_view'];

        // Utilizziamo $services per popolare la tabella
        foreach($services as $service){
          // Creiamo una nuova istanza di Service
          $newService = new Service;
          
          // Inseriamo elemento per elemento quello che si trova all'interno di $services
          $newService->service_name = $service;

          //Salviamo il nuovo record inserito
          $newService->save();
        }

    }
}
