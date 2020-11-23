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
        $users = User::all();
        foreach ($users as $user) {
            $newInfoUser = new UserInfo();
            $newInfoUser->user_id = $user->id;
            $newInfoUser->first_name = $faker->firstName;
            $newInfoUser->last_name = $faker->lastName;
            $newInfoUser->date_of_birth = $faker->dateTimeBetween('-60 years', '-18 years');
            $newInfoUser->save();
        }
    }
}
