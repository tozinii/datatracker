<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;
use App\Sensor;
use DateTime;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware(['auth','verified']);
    }*/

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)//Request $request, $sensorName, $value
    {
      $car = Car::where('id', $id)->first();
      /*$sensor = Sensor::where('name',$sensorName)->first();
      if($car == null || $sensor == null){
        return response(view('errors.500'), 500);
      }*/
      for($i = 1; $i<=12; $i++){
        if($i == 3){
            DB::table('car_sensor')->insert(['sensor_id' => $i, 'car_id' => $car->id, 'data'=>(43.270579 + lcg_value()*(abs(43.325575 - 43.270579))).', '.(-1.952729 + lcg_value()*(abs(-2.014163 - -1.952729))), 'created_at'=>date("Y-m-d H:i:s")]);
        }else if($i == 1){
            DB::table('car_sensor')->insert(['sensor_id' => $i, 'car_id' => $car->id, 'data'=>random_int(1,50), 'created_at'=>date("Y-m-d H:i:s")]);
        }else if ($i == 12){
            DB::table('car_sensor')->insert(['sensor_id' => $i, 'car_id' => $car->id, 'data'=>random_int(1,1000), 'created_at'=>date("Y-m-d H:i:s")]);
        }else{
            DB::table('car_sensor')->insert(['sensor_id' => $i, 'car_id' => $car->id, 'data'=>random_int(1,100), 'created_at'=>date("Y-m-d H:i:s")]);
        }
      
      }
      /*DB::table('car_sensor')->insert(
        ['sensor_id' => $sensor->id, 'car_id' => $car->id, 'data'=>$value, 'created_at'=>date("Y-m-d H:i:s")]
      );*/

      return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function showSensorData($code){
      $car = Car::where('code',strtolower($code))->first();
      $carsData = DB::table('car_sensor')->where('car_id',$car->id)->get();

      //Crea una nueva propiedad 'sensor_name' para mostrar el nombre del sensor de cada coche
      foreach ($carsData as $data){
        $data->{'sensor_name'} = Sensor::where('id',$data->sensor_id)->first()->name;
      }
      return view('data.sensor-data',['carsData'=>$carsData]);
    }
}
