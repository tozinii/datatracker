<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('admin');
  }
  /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPanel () {
        return view('admin');
    }


    public function index()
    {
        return view('home');
    }
}
