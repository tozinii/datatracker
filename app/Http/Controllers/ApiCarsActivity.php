<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCarsActivity extends Controller
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
        // $posicion cogera la posicion de los coches que vaya a coger para mostrarlos en el mapa
       $hoy = '2019-03-29';
        //$hoy = date('Y-m-d');
       // coger los coches que hayan recibido los datos el dia de hoy (sin la hora)
       // Para ello recorro todos los coches y cojo de cada uno los datos que hayan sido recibidos el dia de hoy
       $cars = array();
       $cars_ids = array();
       $sensorsData = DB::table('car_sensor')->select('car_id')->where('created_at', '<=', $hoy)->groupBy('car_id')->get();
       foreach ($sensorsData as $car) {
         $cars = Car::find($car->car_id)->get();
       }
       foreach ($cars as $car) {
         array_push($cars_ids, $car->id);
       }
        return view('users.carsActivity')->with(['cars'=>$cars , 'cars_ids'=>json_encode($cars_ids)]);
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
