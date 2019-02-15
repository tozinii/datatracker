<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
  protected $table = 'sensors';

  public function cars()
    {
      return $this->belongsToMany('App\Car')->withPivot('data');
    }

    public function kits()
      {
        return $this->belongsToMany('App\Kit')->withPivot('sensor_id');
      }

}
