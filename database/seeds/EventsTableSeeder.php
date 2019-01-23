<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $json = File::get('database/data/events-data.json');
    $data = json_decode($json);
    foreach($data as $obj){
      Event::create(array(
        'name'=> $obj->name,
        'location'=>$obj->location,
        'start_date'=>$obj->start_date,
        'finish_date'=>$obj->finish_date
      ));
    }
  }
}
