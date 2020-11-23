<?php

use Illuminate\Database\Seeder;
use Generator\Faker as Faker;
use App\Adv;

class AdvsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lista di tutte le sponsorizzazione con tutte le info relative
        $advsList = [
            [
                "price"=>2.99,
                "hours"=>24,
                "label"=>'Bronze'
            ],
            [
                "price"=>5.99,
                "hours"=>72,
                "label"=>'Silver'
            ],
            [
                "price"=>9.99,
                "hours"=>144,
                "label"=>'Gold'
            ]
        ];

        // Cicliamo per tutta la lunghezza della lista
        for ($i=0; $i < count($advsList); $i++) {
            // Creiamo una nuova istanza di adv
            $newAdvs = new Adv;
            // Inseriamo i valori della lista $advsList all'interno del record appena creato
            $newAdvs->price = $advsList[$i]['price'];
            $newAdvs->hours = $advsList[$i]['hours'];
            $newAdvs->label = $advsList[$i]['label'];
            // Salviamo il tutto
            $newAdvs->save();
        }

    }
}
