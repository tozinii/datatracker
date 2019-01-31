<?php

namespace App\Http\Controllers;
use App\Kit;
use App\Car;
use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $existe = [];

        foreach ($kits as $kit) {
            foreach ($kit->sensors as $sensor) {
                if ($sensor->pivot->kit_id == $kit->id) {
                    array_push($existe, true);
                }else{
                    array_push($existe, false);
                }
            }
        }
        return view('home')->with(['kits' => $kits, 'cars' => $cars, 'existe' => $existe]);
    }
}
