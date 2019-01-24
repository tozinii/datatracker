<?php

use Illuminate\Database\Seeder;

class CarSensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/car-sensor-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        DB::table('car_sensor')->insert([
          'car_id'=>$obj->car_id,
          'sensor_id'=> $obj->sensor_id
        ]);
      }
    }
}
