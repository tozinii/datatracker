<?php

use Illuminate\Database\Seeder;
use App\SensorData;

class SensorsDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/sensorsData-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        SensorData::create(array(
          'data_type'=> $obj->data_type,
          'data'=>$obj->data,
          'sensor_id'=>$obj->sensor_id
        ));
      }
    }
}
