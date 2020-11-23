<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Creiamo 20 record per la tabella user
        for ($i=0; $i <20 ; $i++) {
            // Creiamo una nuova istanza per il singolo record
            $newUser = new User;
            // Riempiamo tutti i campi
            $newUser->name = $faker->userName;
            $newUser->email = $faker->email;
            $newUser->email_verified_at = $faker->dateTime;
            $newUser->password = $faker->password;
            // Salviamo il tutto
            $newUser->save();
        }
    }
}
