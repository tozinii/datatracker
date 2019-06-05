<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Sensor;
use Illuminate\Support\Facades\DB;

class ApiSensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idcar)
      {
        $car = Car::find($idcar);

        $listasensors = array();
        $lastsensors = array();
        $elem = array();
        if (count ($car->lastsensors)>0) {
            foreach ($car->lastsensors as $sensor) {
                if (!in_array($sensor->id, $listasensors)) {
                    $elem[]=$sensor->id;
                    $elem[]=$sensor->pivot->data;
                    $elem[]=$sensor->pivot->created_at;
                    $lastsensors[]=$elem;
                    $listasensors[]=$sensor->id;
                    $elem=null;
                }
            }
            return $lastsensors;
        }
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idcar)
      {
          //Si el valor no es vacio hace la insercion a la base de datos
          // Toma los valores, sensor_id, sensor_valor
          $registro=array();
          if ($request->input('sensor_id') != '' && $request->input('sensor_valor') != '') {
              $registro["car_id"]=$idcar;
              $registro["sensor_id"]=$request->input('sensor_id');
              $registro["sensor_valor"]=$request->input('sensor_valor');
              $registro["date"]=date("Y-m-d H:i:s");
              try {
                DB::table('car_sensor')->insert(
              ['sensor_id' => $request->input('sensor_id'), 'car_id' => $idcar, 'data'=>$request->input('sensor_valor'), 'created_at'=>date("Y-m-d H:i:s")]
            );
              } catch(\Illuminate\Database\QueryException $ex){
                return response()->json($ex->getMessage());
              }
              return response()->json($registro);
          }
          else
              return response()->json('Petición incorrecta, revise sus datos.');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idcar,$idsensor)
      {
        $car = Car::find($idcar)->sensors()->where('car_sensor.sensor_id', '=', $idsensor)->orderBy('car_sensor.created_at', 'desc')->get();;

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

    public function set(Request $request)
    {
       //Si el valor no es vacio hace la insercion a la base de datos
        // Toma los valores, sensor_id, sensor_valor
        $registro=array();
        if ($request->input('idcar') != '' && $request->input('idsensor') != '' &&$request->input('valor')  != '') {
            $registro["car_id"]=$request->input('idcar');
            $registro["sensor_id"]=$request->input('idsensor');
            $registro["sensor_valor"]=$request->input('valor');
            $registro["date"]=date("Y-m-d H:i:s");
            try {
              DB::table('car_sensor')->insert(
            ['sensor_id' => $registro["sensor_id"], 'car_id' => $registro["car_id"], 'data'=>$registro["sensor_valor"], 'created_at'=>date("Y-m-d H:i:s")]
          );
            } catch(\Illuminate\Database\QueryException $ex){
              return response()->json($ex->getMessage());
            }
            return response()->json($registro);
        }
        else
            return response()->json('Petición incorrecta, revise sus datos.');
    }
}
