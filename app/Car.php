<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  protected $table = 'car';

  public function group()
    {
      return $this->belongsTo('App\Group');
    }
  public function sensors()
    {
      return $this->hasMany('App\Sensor');
    }

  public function events()
    {
      return $this->hasMany('App\Event');
    }
}
