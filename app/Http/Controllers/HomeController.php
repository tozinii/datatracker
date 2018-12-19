<?php

namespace App\Http\Controllers;

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
<<<<<<< HEAD
        $this->middleware(['auth','verified']);
=======
        //Pedira autenticarse a todas las funciones de este controlador
        //$this->middleware('auth');
>>>>>>> e82bc167c6f9b1ccaf69c151a348686c566245e3
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
}
