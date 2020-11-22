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
        for ($i=0; $i <20 ; $i++) { 
            $newUser = new User;
            $newUser->name = $faker->name;
            $newUser->email = $faker->email;
            $newUser->email_verified_at = $faker->dateTime;
            $newUser->password = $faker->password;
            $newUser->save();
        }
    }
}
