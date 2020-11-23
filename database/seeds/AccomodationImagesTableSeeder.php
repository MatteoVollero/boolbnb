<?php

use App\Accomodation;
use App\AccomodationImage;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AccomodationImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Prendiamo tutte le accomodation per ciclare e per estrapolare l'id
        $accomodations = Accomodation::all();

        // Per ogni elemento presente in accomodations creiamo un record
        foreach ($accomodations as $accomodation) {
            // CARICA IN DB 10 IMMAGINI PER OGNI ACCOMODATION
            for ($i=0; $i < 10; $i++) {
                // Creiamo un'istanza di accomodationImage
                $newImage = new AccomodationImage();
                // Riempiamo tutti i campi
                $newImage->accomodation_id = $accomodation->id;
                $newImage->image = $faker->imageUrl(400, 250, 'detail');
                // PRINCIPAL
                if ($i<4) {
                    // imposta true per le prime 4 immagini caricate,
                    // per tutte le altre prenderà false come default dal DB
                    $newImage->principal = true;
                }
                // Salviamo il tutto
                $newImage->save();
            }
        }
    }
}
