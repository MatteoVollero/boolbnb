<?php

use Illuminate\Database\Seeder;
use App\AccomodationType;

class AccomodationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creiamo array prototipo per i type
        $protoType = ['accomodation','room','mansion','house','loft','hostel'];
        // Cicliamo su ogni elemento di $protoType
        foreach ($protoType as $type) {
            // allochiamo memoria per un'istanza di AccomodationType
            $newType = new AccomodationType;
            // riempiamo il campo name con ogni elemento di $protoType
            $newType->name = $type;
            // salviamo tutto
            $newType->save();
        }
    }
}
