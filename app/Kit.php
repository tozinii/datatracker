<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
  protected $table = 'kits';

  public function car()
    {
      return $this->belongsTo('App\Car');
    }

  public function sensors()
    {
      return $this->belongsToMany('App\Sensor');
    }
}
