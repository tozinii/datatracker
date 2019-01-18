<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table = 'groups';

  public function users()
    {
      return $this->belongsToMany('App\User');
    }

  public function tournaments()
    {
      return $this->hasMany('App\Tournament');
    }

  public function car()
    {
      return $this->hasOne('App\Car');
    }
}
