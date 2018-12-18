<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/car-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        Car::create(array(
          'description'=> $obj->description,
          'group_id'=>$obj->group_id
        ));
      }
    }
}
