<?php

namespace App\Http\Controllers;
use App\Kit;
use Illuminate\Http\Request;

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
        $kits = Kit::find(4);
        dd($kits->sensors);
        return view('home')->with('kits',$kits);
    }
}
