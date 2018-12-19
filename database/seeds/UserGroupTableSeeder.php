<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/user-group-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        DB::table('user_group')->insert([
          'user_id'=>$obj->user_id,
          'group_id'=>$obj->group_id
        ]);
      }
    }
}
