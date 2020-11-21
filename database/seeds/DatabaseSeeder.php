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
            AccomodationsTableSeeder::class,
            UserInfosTableSeeder::class,
            UserMessagesTableSeeder::class,
            AccomodationViewsTableSeeder::class,
            AccomodationImagesTableSeeder::class,
            AdvsTableSeeder::class,
            AccomodationAdvsTableSeeder::class,
            ServicesTableSeeder::class,
            AccomodationServicesTableSeeder::class
          ]);
    }
}
