<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Sensor;
use App\User;
use Illuminate\Support\Facades\DB;

class ApiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $jsonData = json_decode($request->getContent(), true);

      //Si el valor no es vacio hace la insercion a la base de datos
      if($jsonData['code'] != '' && $jsonData['sensorName'] != ''){
        $car = Car::where('code',strtolower($jsonData['code']))->first();
        $user = User::find($car->user_id);
        $sensor = Sensor::where('name',$jsonData['sensorName'])->first();
        if($jsonData['api_token'] == $user->api_token){

          DB::table('car_sensor')->insert(
            ['sensor_id' => $sensor->id, 'car_id' => $car->id, 'data'=>$jsonData['value'], 'created_at'=>date("Y-m-d H:i:s")]
          );
          return response()->json('Datos insertados correctamente.');
        }

      }
      return response()->json('Petición incorrecta, revise sus datos.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $jsonData = json_decode($request->getContent(), true);

      //Si el valor no es vacio hace la insercion a la base de datos
      if($jsonData['code'] != '' && $jsonData['sensorName'] != ''){
        $car = Car::where('code',strtolower($jsonData['code']))->first();
        $user = User::find($car->user_id);
        $sensor = Sensor::where('name',$jsonData['sensorName'])->first();
        if($jsonData['api_token'] == $user->api_token){

          DB::table('car_sensor')->insert(
            ['sensor_id' => $sensor->id, 'car_id' => $car->id, 'data'=>$jsonData['value'], 'created_at'=>date("Y-m-d H:i:s")]
          );
          return response()->json('Datos insertados correctamente.');
        }

      }
      return response()->json('Petición incorrecta, revise sus datos.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $car = Car::find($id);

      return response()->json($car);
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
