<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            UsersTableSeeder::class,
            AccomodationsTableSeeder::class,
            AdvsTableSeeder::class,
            AccomodationAdvsTableSeeder::class,
            ServicesTableSeeder::class,
            AccomodationViewsTableSeeder::class,
            AccomodationServicesTableSeeder::class,
            UserInfosTableSeeder::class,
            UserMessagesTableSeeder::class,
            AccomodationImagesTableSeeder::class,
            AccomodationAdvsTableSeeder::class,
          ]);
    }
}
