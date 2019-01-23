<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table = 'groups';

  public function users()
    {
      return $this->hasMany('App\User');
    }

  public function car()
    {
      return $this->hasOne('App\Car');
    }
}
