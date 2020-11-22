<?php

use Illuminate\Database\Seeder;
use App\Accomodation;
use App\User;
use Faker\Generator as Faker;


class AccomodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <10 ; $i++) { 
            $userTemp = User::inRandomOrder()->first();
            $newAccomodation = new Accomodation;
            $newAccomodation->user_id = $userTemp->id;
            $newAccomodation->type = $faker->word;
            $newAccomodation->title = $faker->text(15);
            $newAccomodation->description = $faker->paragraph(5);
            $newAccomodation->cover_image = $faker->imageUrl(640, 480, 'cover');
            $newAccomodation->slug = $faker->slug;
            $newAccomodation->country = $faker->country;
            $newAccomodation->region = $faker->state;
            $newAccomodation->city = $faker->city;
            $newAccomodation->address = $faker->address;
            $newAccomodation->beds = $faker->numberBetween(1, 5);
            $newAccomodation->rooms = $faker->numberBetween(1, 7);
            $newAccomodation->toilets = $faker->numberBetween(1, 3);
            $newAccomodation->zip_code = $faker->postcode;
            $newAccomodation->square_meters = $faker->numberBetween(9, 1200);
            $newAccomodation->price = $faker->randomFloat(2, 20, 900);
            $newAccomodation->latitude = $faker->latitude;
            $newAccomodation->longitude = $faker->longitude;
            $newAccomodation->save();

        }
    }
}
