<?php

use Illuminate\Database\Seeder;
use App\Tournament;

class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/tournaments-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        Tournament::create(array(
          'name'=> $obj->name,
          'location'=>$obj->location,
          'max_participants'=>$obj->max_participants,
          'date'=>$obj->date
        ));
      }
    }
}
