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
        
      $lastData = array();
      $car = Car::find($id);
      //return $car->kit->sensors;
      foreach ($car->kit->sensors as $carSensor) {
        if ($carSensor->name == 'gps') {
            $query = DB::table('car_sensor')->select(DB::raw("data,to_char(created_at,'HH24:MI:SS') as fecha"))
                    ->where([['car_id', '=', $car->id],['sensor_id', '=', $carSensor->id]])
                    ->latest()
                    ->first();
        }
        else{

            $query = DB::table('car_sensor')->select(DB::raw("CAST(data AS integer) as dato,to_char(created_at,'HH24:MI:SS') as fecha"))
                    ->where([['car_id', '=', $car->id],['sensor_id', '=', $carSensor->id]])
                    ->latest()
                    ->first();

        }
        
        array_push($lastData, $query);
      }



      return $lastData;
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
