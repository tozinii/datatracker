<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
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
      return view('users.cars');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $car = new Car;
      $car->code = $request->carname;
      $car->user_id = Auth::user()->id;
      $car->kit_id = $request->kit;
      $user = Auth::user()->id;

      $car->save();

      return back()->with('confirmation','Enhorabuena!! Has comprado un coche');
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



    public function recorridoMapa($car_id){

        //Coger las coordenadas de la base de datos y meterlas en un array

          $carsData = DB::table('car_sensor')->where('car_id',$car->id)->get();

          //Crea una nueva propiedad 'sensor_name' para mostrar el nombre del sensor de cada coche
          foreach ($carsData as $data){
            $data->{'sensor_name'} = Sensor::where('id',$data->sensor_id)->first()->name;
          }
          return view('data.sensor-data',['carsData'=>$carsData]);


    }
}
