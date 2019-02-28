<?php

use Illuminate\Database\Seeder;
use App\Kit;

class KitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/kits-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        Kit::create(array(
          'name'=> $obj->name,
          'num_serie'=>$obj->num_serie,
          'image'=>$obj->image
        ));
      }
    }
}
