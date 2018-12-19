<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  protected $table = 'sensors';

  public function car()
    {
      return $this->belongsTo('App\Car');
    }
  public function sensorsData()
    {
      return $this->hasMany('App\SensorData');
    }
}
