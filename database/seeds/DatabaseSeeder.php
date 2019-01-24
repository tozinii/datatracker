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
      $this->call(UsersTableSeeder::class);
      $this->call(CarsTableSeeder::class);
      $this->call(SensorsTableSeeder::class);
      $this->call(CarSensorTableSeeder::class);
      $this->call(KitsTableSeeder::class);
      $this->call(KitSensorTableSeeder::class);
    }
}
