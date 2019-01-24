<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/cars-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        Car::create(array(
          'description'=> $obj->description,
          'code'=>$obj->code
        ));
      }
    }
}
