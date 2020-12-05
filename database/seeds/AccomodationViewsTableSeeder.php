<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Accomodation;
use App\AccomodationView;
use Carbon\Carbon;

class AccomodationViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Prendiamo tutti i record della tabella Accomodations
        $accomodations = Accomodation::all();

        // Cicliamo su tutti i record di Accomodations
        foreach ($accomodations as $accomodation) {

          // Cicliamo 7 volte, per creare le date dell'utlima settimana (dalla data odierna a 7 giorni fa)
          for ($i=0; $i<7; $i++){
            // Definiamo la data per cui creare i record di views
            $dayStat = Carbon::now()->subDays(6-$i);
            // Definiamo random quante views creare per la data in iterazione
            $dayNumViews = $faker->numberBetween(2, 10);

            // Cicliamo per creare le views della data in iterazione
            for ($cont=0; $cont < $dayNumViews; $cont++) {
                //Allochiamo memoria per un'istanza di AccomodationView
                $newAccomodationView = new AccomodationView;
                // Inseriamo i dati all'interno della tabella Accomodation_Views
                $newAccomodationView->accomodation_id = $accomodation->id;
                $newAccomodationView->date = $dayStat;
                $newAccomodationView->user_ip = $faker->ipv4;
                // Salviamo
                $newAccomodationView->save();
            }
          }
        }
    }
}
