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
      return $this->belongsToMany('App\Sensor');
    }
  public function user()
    {
      return $this->belongsTo('App\User');
    }

}
