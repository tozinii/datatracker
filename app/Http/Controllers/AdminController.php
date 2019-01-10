<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    public function userList(){
      $users = User::where('role', 'User')
      ->orderBy('name', 'asc')
      ->get();

      return view('users.admin')->with([
        'users'=>$users
      ]);
    }
}
