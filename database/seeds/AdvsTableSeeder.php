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
        $advHours = [24, 72, 144];
        $advPrice = [2.99, 5.99, 9.99];
        $advLabel = ['Bronze', 'Silver', 'Gold'];

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

        for ($i=0; $i < count($advsList); $i++) {
            $newAdvs = new Adv;
            $newAdvs->price = $advsList[$i]['price'];
            $newAdvs->hours = $advsList[$i]['hours'];
            $newAdvs->label = $advsList[$i]['label'];
            $newAdvs->save();
        }

    }
}
