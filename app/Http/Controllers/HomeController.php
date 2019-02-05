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

        $sensorName;
        $sensors = Sensor::orderBy('name')->get();
        foreach ($sensors as $sensor) {
          $sensorName[] = $sensor->name;
        }
        sort($sensorName);

        $sensoresKit;
        $existe;
        foreach ($kits as $kit) {
          foreach ($kit->sensors as $key => $sensor) {
            $sensoresKit[] = $sensor->name;
          }
        }
        sort($sensoresKit);


        if ($sensor->name == $sensorName[$key]) {
          $existe[] = true;
        }
        else {
          $existe[] = false;
        }

        //dd($existe);

        return view('home')->with(['kits' => $kits, 'cars' => $cars, 'sensors' => $sensors]);
    }
}
