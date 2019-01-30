<?php

namespace App\Http\Controllers;
use App\Kit;
use App\Car;
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
        return view('home')->with(['kits' => $kits, 'cars' => $cars]);
    }
}
