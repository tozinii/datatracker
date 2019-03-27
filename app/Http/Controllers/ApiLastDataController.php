<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Sensor;
use App\User;
use Illuminate\Support\Facades\DB;

class ApiLastDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD

      $lastData = array();
      $car = Car::find($id);
      // return $car->kit->sensors;
      foreach ($car->kit->sensors as $carSensor) {
      $query = DB::table('car_sensor')->where('car_id', $car->id)->where('sensor_id', $carSensor->id)->orderby('created_at','DESC')->take(1)->first();
      array_push($lastData, $query);
      }
      
      return $lastData;
=======
        
      $lastData = array();
      $car = Car::find($id);
      //return $car->kit->sensors;
        foreach ($car->kit->sensors as $carSensor) {
            $query = DB::table('car_sensor')->where('car_id', $car->id)->where('sensor_id', $carSensor->id)->orderby('created_at','DESC')->take(1)->first();
            array_push($lastData, $query);
        }
        
        return $lastData;
>>>>>>> 0728664ba196a2e377d562ec9371b232d62f1152
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
