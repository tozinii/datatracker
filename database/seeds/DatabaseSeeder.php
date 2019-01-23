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
      $this->call(GroupsTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(EventsTableSeeder::class);
      $this->call(CarTableSeeder::class);
      $this->call(SensorsTableSeeder::class);
      $this->call(SensorsDataTableSeeder::class);
      //$this->call(UserGroupTableSeeder::class);
      $this->call(CarEventsTableSeeder::class);
    }
}
