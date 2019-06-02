<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  protected $table = 'cars';

  public function kit()
    {
      return $this->belongsTo('App\Kit');
    }
  public function sensors()
    {
      return $this->belongsToMany('App\Sensor')->withPivot('data');
    }
  public function user()
    {
      return $this->belongsTo('App\User');
    }

  public function lastsensors()
    {
      $lastsensors = $this->belongsToMany('App\Sensor')
                  ->withPivot('data','created_at')
                  ->orderBy('car_sensor.created_at', 'desc');

      return $lastsensors;
    }

}
