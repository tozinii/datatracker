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
      $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

      $mesesAño = DB::table('car_sensor')->select(DB::raw("avg(data) as dato, date_part('month',created_at) as fecha"))
                      ->where([['car_id', '=', $car->id],['sensor_id', '=', $sensor->id]])
                      ->whereYear('created_at',2019)
                      ->groupBy('fecha')
                      ->orderBy('fecha')
                      ->get();

      $timestamp = strtotime('13-02-2019');
      $sensorInfo = DB::table('car_sensor')
                      ->where([['car_id', '=', $car->id],['sensor_id', '=', $sensor->id]])
                      ->get();
      /*json_encode($sensorInfo);
      $json = json_decode($sensorInfo);

      array_push($json,$dias);*/


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

      $nombreSelect = $request->nombreSelect;

      $fecha = Carbon::parse($fechaValor);

      $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

      switch ($nombreSelect) {
        case 'Año':
          $mesesAño = DB::table('car_sensor')->select(DB::raw("avg(data) as dato, date_part('month',created_at) as fecha"))
                          ->where([['car_id', '=', $car->id],['sensor_id', '=', $sensor->id]])
                          ->whereYear('created_at',$fecha->year)
                          ->groupBy('fecha')
                          ->orderBy('fecha')
                          ->get();
          $datos = array();
          for ($i=0; $i < count($meses) ; $i++) {
            $dato = array();
            foreach ($mesesAño as $valor) {
              if($valor->fecha -1 == $i){
                $dato['mes'] = $meses[$i];
                $dato['dato'] = $valor->dato;
                break;
              }
              else {
                $dato['mes'] = $meses[$i];
                $dato['dato'] = 0;
              }
            }
            array_push($datos,$dato);
          }
          return json_encode($datos);
          break;
        case 'Mes':

          
          $dias = DB::table('car_sensor')->select(DB::raw('avg(data) as dato,date(created_at) as fecha'))
                          ->where([['car_id', '=', $car->id],['sensor_id', '=', $sensor->id]])
                          ->whereMonth('created_at',$fecha->month)
                          ->groupBy('fecha')
                          ->orderBy('fecha')
                          ->get();
          return json_encode($dias);

          break;
        case 'Dia':



          break;
        case 'time':
          return json_encode('hora');
          break;
        default:
          // code...
          break;
      }

    }
}
