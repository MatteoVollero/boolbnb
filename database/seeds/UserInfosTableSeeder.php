<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserInfo;
use Faker\Generator as Faker;

class UserInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Prendiamo tutti i record che ci sono nella tabella user
        $users = User::all();
        // Cicliamo per ogni elemento presente in $users
        foreach ($users as $user) {
            // Creiamo una nuova istanza di UserInfo
            $newInfoUser = new UserInfo();
            // Riempiamo tutti i campi
            $newInfoUser->user_id = $user->id;
            $newInfoUser->first_name = $faker->firstName;
            $newInfoUser->last_name = $faker->lastName;
            // Crea una data di nascita per un utente con età compresa tra i 18 e i 60 anni
            $newInfoUser->date_of_birth = $faker->dateTimeBetween('-60 years', '-18 years');
            // Salviamo il tutto
            $newInfoUser->save();
        }
    }
}
