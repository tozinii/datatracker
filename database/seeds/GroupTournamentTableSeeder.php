<?php

use Illuminate\Database\Seeder;

class GroupTournamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $json = File::get('database/data/group-tournament-data.json');
      $data = json_decode($json);
      foreach($data as $obj){
        DB::table('group_tournament')->insert([
          'group_id'=>$obj->group_id,
          'tournament_id'=> $obj->tournament_id
        ]);
      }
    }
}
