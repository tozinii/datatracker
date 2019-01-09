<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/sensors-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        Sensor::create(array(
          'name'=> $obj->name,
          'car_id'=>$obj->car_id
        ));
      }
    }
}
