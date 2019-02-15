<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/users-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        User::create(array(
          'name'=> $obj->name,
          'lastname'=> $obj->lastname,
          'email'=>$obj->email,
          'email_verified_at'=>$obj->email_verified_at,
          'password'=>Hash::make($obj->password),
          'description'=>$obj->description,
          'role'=>$obj->role,
        ));
      }
    }
}
