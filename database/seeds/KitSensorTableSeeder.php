<?php

use Illuminate\Database\Seeder;

class KitSensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/kit-sensor-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        DB::table('kit_sensor')->insert([
          'kit_id'=>$obj->kit_id,
          'sensor_id'=> $obj->sensor_id
        ]);
      }
    }
}
