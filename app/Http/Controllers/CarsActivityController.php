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
       //$hoy = '2019-03-22';
    	$hoy = date('Y-m-d');
       // coger los coches que hayan recibido los datos el dia de hoy (sin la hora)
       // Para ello recorro todos los coches y cojo de cada uno los datos que hayan sido recibidos el dia de hoy
       $cars = Car::all();
       foreach ($cars as $car) {
         // Otro foreach que recorra todos los sensores del coche? o no hace falta? A la noche miro que no me da tiempo
         $sensoresHoy = Car::where([['created_at', '>', $hoy],['cars.kit_id', '3']])->get();
       }
      //return $cars;

        return view('users.carsActivity')->with('cars', $cars, $posicion);
     }
}
