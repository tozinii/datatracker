<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
  protected $table = 'kits';

  public function cars()
    {
        return $this->hasMany('App\Car');
    }

  public function sensors()
    {
      return $this->belongsToMany('App\Sensor')->withPivot('sensor_id');
    }
}
