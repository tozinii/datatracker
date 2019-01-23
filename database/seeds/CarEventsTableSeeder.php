<?php

use Illuminate\Database\Seeder;

class CarEventsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $json = File::get('database/data/car-event-data.json');
    $data = json_decode($json);
    foreach($data as $obj){
      DB::table('car_events')->insert([
        'car_id'=> $obj->car_id,
        'event_id'=>$obj->event_id
        ]);
    }
  }
}
