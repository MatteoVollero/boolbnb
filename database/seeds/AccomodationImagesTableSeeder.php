<?php

// ------------------------------------------------- COME RINOMINARE UN FILE NELLA STORAGE ------------------------------------------
        // $file = Storage::files('public/cover');
        // Storage::move($file[0], 'public/cover/modified.jpg');
        // $file = Storage::files('public/cover');
        // dd($file);
// ------------------------------------------------- /COME RINOMINARE UN FILE NELLA STORAGE ------------------------------------------

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
            $countPrincipal = 0;
            $moduloPrincipal = $faker->numberBetween(1, 3);
            // CARICA IN DB 10 IMMAGINI PER OGNI ACCOMODATION
            for ($i=0; $i < 10; $i++) {
                // Creiamo un'istanza di accomodationImage
                $newImage = new AccomodationImage();
                // Riempiamo tutti i campi
                $newImage->accomodation_id = $accomodation->id;
                $newImage->image = 'http://localhost:8000/storage/interior_image/interior'.($i+1).'.jpeg';
                // PRINCIPAL
                
                if ($countPrincipal<4 && $i%$moduloPrincipal==0) {
                    // imposta true per le prime 4 immagini caricate,
                    // per tutte le altre prenderà false come default dal DB
                    $newImage->principal = true;
                    $countPrincipal ++;
                }
                // Salviamo il tutto
                $newImage->save();
            }
        }
    }
}
