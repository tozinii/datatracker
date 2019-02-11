<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;
use App\Sensor;
use Carbon\Carbon;

class SensorController extends Controller
{

    public function __construct()
    {
      $this->middleware(['auth','verified','user']);
    }
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
    public function show($carName,$sensorId)
    {
      $car = Car::where('code', $carName)->first();

      $sensor = Sensor::where('id', $sensorId)->first();

      /*dd($sensor->unidad);
      foreach ($car->sensors as $sensorData) {
        if ($sensorData->name == $sensor) {
          dd($sensorData);
        }
      }*/


      $sensorInfo = DB::table('car_sensor')
                      ->where([['car_id', '=', $car->id],['sensor_id', '=', $sensor->id]])
                      ->get();

      return view('users.sensors')->with(['sensorInfo'=>$sensorInfo,'car'=>$car,'sensor'=>$sensor, 'jsonSensor' => json_encode($sensorInfo)]);
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

    public function sensorDate(Request $request)
    {
      $car = Car::where('code',$request->carName)->first();

      $sensor = Sensor::where('name',$request->sensorName)->first();

      $fechaType = $request->tipo;

      $fechaValor = $request->fecha;


      switch ($fechaType) {
        case 'date':
          return json_encode('dia/año');
          break;
        case 'month':
          $mes = Carbon::parse($fechaValor);
          /*$sensorInfo = DB::table('car_sensor')->select(DB::raw('data as dato, created_at as fecha'))
                          ->where([['car_id', '=', $car->id],['sensor_id', '=', $sensor->id]])
                          ->whereMonth('created_at',$mes->month)
                          ->groupBy('created_at')
                          ->get();*/
          $sensorInfo = DB::select("SELECT data as dato, created_at as fecha FROM car_sensor WHERE car_id = 4 AND sensor_id = 10 GROUP BY created_at");
          return json_encode($sensorInfo);

          break;
        case 'time':
          return json_encode('hora');
          break;
        default:
          // code...
          break;
      }


      $sensorInfo = DB::table('car_sensor')->select('data','created_at')
                      ->where([['car_id', '=', $car->id],['sensor_id', '=', $sensor->id]])
                      ->avg('data')
                      ->whereMonth('created_at',2)
                      ->groupBy('created_at')
                      ->get();


    }
}
