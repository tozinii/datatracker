<?php

namespace App\Http\Controllers;
use App\Kit;
use App\Car;
use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified','user']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('user_id',Auth::user()->id)->count();
        $kits = Kit::all();
        $sensors = Sensor::all();

        $existe = array();

        foreach ($kits as $kit) {
            foreach($kit->sensors as $sensor){
                $allSensors = DB::table('kit_sensor')->select('kit_id')->where('sensor_id', '=', $sensor->id)->get();
                if(!array_key_exists($sensor->name, $existe)){
                    $existe[$sensor->name] = $allSensors;
                }
            }
            /*foreach ($sensors as $sensor) {
                if ($sensor->id == $kit->id) {
                    array_push($existe, true);
                }else{
                    array_push($existe, false);
                }
            }*/
        }
        return view('home')->with(['kits' => $kits, 'cars' => $cars, 'sensors' => $sensors, 'existe' => $existe]);
    }
}
