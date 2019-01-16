<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

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
        return view('users.admin');
    }


    public function index()
    {
        return view('home');
    }

    public function userList(){
      $users = User::where('role', 'User')
      ->orderBy('name', 'asc')
      ->get();

      return view('users.listUsers')->with([
        'users'=>$users
      ]);
    }

    public function statistics()
    {
      $users = User::select(DB::raw('count(*) as contador, date_format(created_at, "%M %Y") as mes, date_format(created_at, "%Y%m") as anio'))
      ->where('role','User')
      ->groupBy('mes')
      ->orderBy('mes','desc')
      ->get();

      return view('users.statistics')->with('users',$users);
    }
}
