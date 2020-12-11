<?php

use Illuminate\Database\Seeder;
use App\Accomodation;
use App\AccomodationType;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;


class AccomodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // accomodations faker ROMA
        $recordsNumber = 50;

        // stringe per Title accomodations a Roma
        $typeTitleRoma = [
            "Appartment in Rome",
            "Room in Rome",
            "Mansion in Rome",
            "House in Rome",
            "Loft in Rome",
            "Hostel in Rome"
        ];

        // stringe per Description accomodations a ROMA
        $typeDescriptionRoma = [
            "Cozy apartment on the third floor with lift in a period building in a historic and central area. It is one of the most beautiful and well-known shopping streets, reachable in a few minutes via the metro stops A - Flaminio and Spagna. From here, many places of historical and cultural interest can be reached on foot. The apartment has a classic décor, consists of a living room, dining room with kitchenette, a bedroom and a bathroom.",
            
            "Beautiful apartment with three large bedrooms, excellent base for traveling to Rome and visiting the city with friends. Located in the center of Rome, five minutes walk from the Colosseum, the metro is 100 meters away, walk from the train station for 10 minutes. Convenient supermarket nearby. A centenary restaurant called Vecchia Roma is just around the corner. We are waiting for your arrival at the apartment, have a nice trip.",
            
            "After years of renting through private channels, the elegant liberty villa a few steps from Villa Borghese, in the heart of the Parioli, considered the most exclusive residential area in Rome, debuts on Boolbnb. Located in a quiet street and surrounded by a large and well-kept garden, the villa is spread over four floors. On the ground floor there is the entrance, a large and bright living room with dining area, TV lounge as well as a veranda area which constitutes an additional living and dining area, connected to the garden.",

            "Imagine having a beautiful detached house all to yourself. Bedroom, kitchen, living room, bathroom. Imagine going out and finding yourself in a rural setting ... and you are just a bus ride away from the city center. The house has its own private entrance, inside a large garden. It is fully furnished, with a private bathroom complete with shower and French bidet. There is a new fully equipped kitchen and lounge where you can enjoy dinner or lunch in the sun in the garden. It is an area of ​​Rome full of 'liberty' style villas.",

            "The Loft is perfect for a romantic and fun stay, it enjoys the characteristic wooden ceilings of the neighborhood, flat screen, a comfortable bathroom complete with everything, the kitchen is well equipped. The apartment is located in the heart of the historic center of Rome, in Trastevere. Besides the cultural and folkloric atmosphere of the area, you can enjoy many nice shops, restaurants, pubs, clubs, lounge bars, bakeries, supermarkets and laundries.",

            "The hostel has a bar, a shared lounge, a garden and free Wi-Fi. The property is about 3 km from the Roman Forum, 4 km from the Palatine Hill and 3 km from Palazzo Venezia. The property is located in the Trastevere district, 4 km from Largo di Torre Argentina. Rooms at the hostel are equipped with a desk, air conditioning and a private bathroom. You can play table tennis and darts at the property. The nearest airport is Rome Ciampino."
        ];

        // stringe per Title accomodations a MILANO
        $typeTitleMilano = [
            "Appartment in Milan",
            "Room in Milan",
            "Mansion in Milan",
            "House in Milan",
            "Loft in Milan",
            "Hostel in Milan"
        ];

        // stringe per Description accomodations a MILANO
        $typeDescriptionMilano = [
            "Cozy apartment on the third floor with lift in a period building in a historic and central area. It is one of the most beautiful and well-known shopping streets, reachable in a few minutes via the metro stops A - Flaminio and Spagna. From here, many places of historical and cultural interest can be reached on foot. The apartment has a classic décor, consists of a living room, dining room with kitchenette, a bedroom and a bathroom.",
            
            "Beautiful apartment with three large bedrooms, excellent base for traveling to Rome and visiting the city with friends. Located in the center of Rome, five minutes walk from the Colosseum, the metro is 100 meters away, walk from the train station for 10 minutes. Convenient supermarket nearby. A centenary restaurant called Vecchia Roma is just around the corner. We are waiting for your arrival at the apartment, have a nice trip.",
            
            "After years of renting through private channels, the elegant liberty villa a few steps from Villa Borghese, in the heart of the Parioli, considered the most exclusive residential area in Rome, debuts on Boolbnb. Located in a quiet street and surrounded by a large and well-kept garden, the villa is spread over four floors. On the ground floor there is the entrance, a large and bright living room with dining area, TV lounge as well as a veranda area which constitutes an additional living and dining area, connected to the garden.",

            "Imagine having a beautiful detached house all to yourself. Bedroom, kitchen, living room, bathroom. Imagine going out and finding yourself in a rural setting ... and you are just a bus ride away from the city center. The house has its own private entrance, inside a large garden. It is fully furnished, with a private bathroom complete with shower and French bidet. There is a new fully equipped kitchen and lounge where you can enjoy dinner or lunch in the sun in the garden. It is an area of ​​Rome full of 'liberty' style villas.",

            "The Loft is perfect for a romantic and fun stay, it enjoys the characteristic wooden ceilings of the neighborhood, flat screen, a comfortable bathroom complete with everything, the kitchen is well equipped. The apartment is located in the heart of the historic center of Rome, in Trastevere. Besides the cultural and folkloric atmosphere of the area, you can enjoy many nice shops, restaurants, pubs, clubs, lounge bars, bakeries, supermarkets and laundries.",

            "The hostel has a bar, a shared lounge, a garden and free Wi-Fi. The property is about 3 km from the Roman Forum, 4 km from the Palatine Hill and 3 km from Palazzo Venezia. The property is located in the Trastevere district, 4 km from Largo di Torre Argentina. Rooms at the hostel are equipped with a desk, air conditioning and a private bathroom. You can play table tennis and darts at the property. The nearest airport is Rome Ciampino."
        ];        


        // Istruzioni per gestione immagini nella create / update
        // asset('storage/file.txt')
        // Storage::disk('local')->put('file.txt', 'Contents');
        // $url = Storage::url('file.jpg');
        // Storage::move('hodor/oldfile-name.jpg', 'hodor/newfile-name.jpg');
        // $files = Storage::files($directory);
            
        // ************** ROMA **************
        // Creiamo $recordsNumber record in Accomodations
        for ($i=0; $i < $recordsNumber ; $i++) {
            // Prendiamo un record casuale da user per estrapolare l'id
            $userTemp = User::inRandomOrder()->first();
            // Creiamo una nuova istanza di accomodation
            $newAccomodation = new Accomodation;
            // Riempiamo tutti i campi di Accomodation
            $newAccomodation->user_id = $userTemp->id;
            $newAccomodation->type_id = AccomodationType::inRandomOrder()->first()->id;
            $newAccomodation->title = $typeTitleRoma [$newAccomodation->type_id - 1];
            $newAccomodation->description = $typeDescriptionRoma [$newAccomodation->type_id - 1];
            $newAccomodation->cover_image = 'http://localhost:8000/storage/cover_image/cover'.($i+1).'.jpeg';
            $newAccomodation->country = "Italy";
            $newAccomodation->region = "Lazio";
            $newAccomodation->city = "Rome";
            $newAccomodation->address = "Street of the Ciclamini, ".$i;
            $newAccomodation->zip_code = "00100";
            // Riempiamo i campi a seconda del type dell'accomodation                
            switch ($newAccomodation->type_id) {
                case 1:
                    // Accomodation
                    $newAccomodation->beds = $faker->numberBetween(1, 5);
                    $newAccomodation->rooms = $faker->numberBetween(1, 3);
                    $newAccomodation->toilets = $faker->numberBetween(1, 2);
                    $newAccomodation->square_meters = $faker->numberBetween(80, 200);
                    $newAccomodation->price = $faker->randomFloat(2, 120, 200);
                    break;
                
                case 2:
                    // Room
                    $newAccomodation->beds = $faker->numberBetween(1,2);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = 1;
                    $newAccomodation->square_meters = $faker->numberBetween(9, 30);
                    $newAccomodation->price = $faker->randomFloat(2, 30, 150);
                    break;

                case 3:
                    // Mansion
                    $newAccomodation->beds = $faker->numberBetween(4,10);
                    $newAccomodation->rooms = $faker->numberBetween(5,15);
                    $newAccomodation->toilets = $faker->numberBetween(2,4);
                    $newAccomodation->square_meters = $faker->numberBetween(200, 700);
                    $newAccomodation->price = $faker->randomFloat(2, 400, 900);
                    break;

                case 4:
                    // House
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = $faker->randomFloat(2, 120, 300);
                    break;

                case 5:
                    // Loft
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = $faker->randomFloat(2, 150, 400);
                    break;

                case 6:
                    // Hostel
                    $newAccomodation->beds = $faker->numberBetween(1,6);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = $faker->numberBetween(0,1);
                    $newAccomodation->square_meters = $faker->numberBetween(15, 30);
                    $newAccomodation->price = $faker->randomFloat(2, 30, 70);
                    break;
            }

            // Coordinate +/- 40 km. dal centro di Roma
            $latMin= 41.89938; 
            $latMax= 41.90398;
            $lgtMin= 12.48484;
            $lgtMax= 12.51239;

            // latitude e longitude, che stiamo nell'intervallo predefinito per la zona di Roma
            $newAccomodation->latitude = $faker->latitude($latMin, $latMax);
            $newAccomodation->longitude = $faker->longitude($lgtMin, $lgtMax);
            // Riempie temporaneamente lo slug, per eivtare di avere errore al primo save() del record
            // Lo slug effettivo verrà assgnato dopo il primo save(), quando sarà stato creato l'id dal DB,
            // id che concateniamo in coda allo slug del titolo, per fare in modo che lo slug sia univoco
            $newAccomodation->slug = $i;
            // Salviamo il tutto 1°
            $newAccomodation->save();
            // Creiamo lo slug partendo dal title e aggiungendo in coda l'id (per essere sicuri che sia univoco)
            $newAccomodation->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $newAccomodation->title)))."-".$newAccomodation->id;
            // Salviamo di nuovo il record, per salvare lo slug appena creato
            $newAccomodation->save();
        }

        // ************** MILANO **************
        // Creiamo $recordsNumber record in Accomodations
        for ($i=0; $i < $recordsNumber ; $i++) {
            // Prendiamo un record casuale da user per estrapolare l'id
            $userTemp = User::inRandomOrder()->first();
            // Creiamo una nuova istanza di accomodation
            $newAccomodation = new Accomodation;
            // Riempiamo tutti i campi di Accomodation
            $newAccomodation->user_id = $userTemp->id;
            $newAccomodation->type_id = AccomodationType::inRandomOrder()->first()->id;
            $newAccomodation->title = $typeTitleMilano [$newAccomodation->type_id - 1];
            $newAccomodation->description = $typeDescriptionMilano [$newAccomodation->type_id - 1];
            $newAccomodation->cover_image = 'http://localhost:8000/storage/cover_image/cover'.($i+1).'.jpeg';
            $newAccomodation->country = "Italy";
            $newAccomodation->region = "Lombardia";
            $newAccomodation->city = "Milan";
            $newAccomodation->address = "Street Liberty, ".$i;
            $newAccomodation->zip_code = "20122";
            // Riempiamo i campi a seconda del type dell'accomodation                
            switch ($newAccomodation->type_id) {
                case 1:
                    // Accomodation
                    $newAccomodation->beds = $faker->numberBetween(1, 5);
                    $newAccomodation->rooms = $faker->numberBetween(1, 3);
                    $newAccomodation->toilets = $faker->numberBetween(1, 2);
                    $newAccomodation->square_meters = $faker->numberBetween(80, 200);
                    $newAccomodation->price = $faker->randomFloat(2, 120, 200);
                    break;
                
                case 2:
                    // Room
                    $newAccomodation->beds = $faker->numberBetween(1,2);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = 1;
                    $newAccomodation->square_meters = $faker->numberBetween(9, 30);
                    $newAccomodation->price = $faker->randomFloat(2, 30, 150);
                    break;

                case 3:
                    // Mansion
                    $newAccomodation->beds = $faker->numberBetween(4,10);
                    $newAccomodation->rooms = $faker->numberBetween(5,15);
                    $newAccomodation->toilets = $faker->numberBetween(2,4);
                    $newAccomodation->square_meters = $faker->numberBetween(200, 700);
                    $newAccomodation->price = $faker->randomFloat(2, 400, 900);
                    break;

                case 4:
                    // House
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = $faker->randomFloat(2, 120, 300);
                    break;

                case 5:
                    // Loft
                    $newAccomodation->beds = $faker->numberBetween(2,6);
                    $newAccomodation->rooms = $faker->numberBetween(2,4);
                    $newAccomodation->toilets = $faker->numberBetween(1,2);
                    $newAccomodation->square_meters = $faker->numberBetween(100, 200);
                    $newAccomodation->price = $faker->randomFloat(2, 150, 400);
                    break;

                case 6:
                    // Hostel
                    $newAccomodation->beds = $faker->numberBetween(1,6);
                    $newAccomodation->rooms = 1;
                    $newAccomodation->toilets = $faker->numberBetween(0,1);
                    $newAccomodation->square_meters = $faker->numberBetween(15, 30);
                    $newAccomodation->price = $faker->randomFloat(2, 30, 70);
                    break;
            }

            // Coordinate +/- 30 km. dal centro di Milano
            $latMin= 45.49232; 
            $latMax= 45.49809;
            $lgtMin= 9.14614;
            $lgtMax= 9.20107;

            // latitude e longitude, che stiamo nell'intervallo predefinito per la zona di Roma
            $newAccomodation->latitude = $faker->latitude($latMin, $latMax);
            $newAccomodation->longitude = $faker->longitude($lgtMin, $lgtMax);
            // Riempie temporaneamente lo slug, per eivtare di avere errore al primo save() del record
            // Lo slug effettivo verrà assgnato dopo il primo save(), quando sarà stato creato l'id dal DB,
            // id che concateniamo in coda allo slug del titolo, per fare in modo che lo slug sia univoco
            $newAccomodation->slug = $i;
            // Salviamo il tutto 1°
            $newAccomodation->save();
            // Creiamo lo slug partendo dal title e aggiungendo in coda l'id (per essere sicuri che sia univoco)
            $newAccomodation->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $newAccomodation->title)))."-".$newAccomodation->id;
            // Salviamo di nuovo il record, per salvare lo slug appena creato
            $newAccomodation->save();
        }

    }
}
