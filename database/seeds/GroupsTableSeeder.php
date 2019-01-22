<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/groups-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        Group::create(array(
          'name'=> $obj->name,
          'password'=>$obj->password,
          'description'=>$obj->description
        ));
      }


    }
}
