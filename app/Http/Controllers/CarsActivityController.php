<?php

namespace App\Http\Controllers;
use App\Kit;
use App\Car;
use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CarsActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified','admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $posicion cogera la posicion de los coches que vaya a coger para mostrarlos en el mapa
       $hoy = '2019-04-12';
    	//$hoy = date('Y-m-d');
       // coger los coches que hayan recibido los datos el dia de hoy (sin la hora)
       // Para ello recorro todos los coches y cojo de cada uno los datos que hayan sido recibidos el dia de hoy
       $cars = array();
       $cars_ids = array();
       $sensorData = DB::table('car_sensor')->select('car_id')->where('created_at', '<=', $hoy)->groupBy('car_id')->get();
       foreach ($sensorData as $car) {
         $cars = Car::find($car->car_id)->get();
       }
       foreach ($cars as $car) {
         array_push($cars_ids, $car->id);
       }


        return view('users.carsActivity')->with(['cars'=>$cars , 'cars_ids'=>json_encode($cars_ids)]);
     }
}
