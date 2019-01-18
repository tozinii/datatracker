<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Sensor;
use App\SensorData;
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
    public function store(Request $request,$code,$sensorName,$type)
    {
      $car = Car::where('code',strtolower($code))->first();
      $sensor = Sensor::where('name',$sensorName)->first();

      $sensorData = new SensorData();
      $sensorData->data = $type;
      $sensorData->data_type = 'Tipo de dato';
      $sensorData->sensor_id = $sensor->id;

      $sensorData->save();

      return redirect()->route('root');

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

    public function showSensorData($code, $sensorName){
      $car = Car::where('code',strtolower($code))->first();
      $sensor = Sensor::where('name',$sensorName)->first();

      return view('data.sensor-data',['sensorsData'=>$sensor->sensorsData]);
    }
}
