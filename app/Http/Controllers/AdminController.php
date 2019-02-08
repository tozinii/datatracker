<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use App\Kit;

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
      $Users = User::where('role','User')->withTrashed()->get()->count();

      $cars = DB::table('cars')->select(DB::raw('count(*) as contador, created_at as fecha'))->groupBy('created_at')->get();

      $mensajes = DB::table('contact')->select(DB::raw('count(*) as contador, created_at as fecha'))->groupBy('created_at')->get();

      return view('users.admin')->with(['users'=>$Users,'cars'=>$cars, 'mensajes' => $mensajes]);
    }


    public function index()
    {
        return view('home');
    }

    public function userList(){

      // Recoge usuarios
      $users = User::where('role', 'User')
      ->orderBy('name', 'asc')
      ->get();

      //  Recoge usuarios baneados
      $banneds = User::onlyTrashed()
      ->orderBy('name', 'asc')
      ->get();

      // Recoge usuarios

      return view('users.listUsers
        ')->with([
        'users'=>$users,
        'banneds'=>$banneds
      ]);
    }
    public function statistics()
    {
      $users = DB::select("SELECT count(*) as contador, to_char(created_at, 'YYYYMM') as year  FROM users WHERE role='User' GROUP BY year ORDER BY year");
      $cars = DB::select("SELECT count(*) as contador, to_char(created_at, 'YYYYMM') as year  FROM cars GROUP BY year ORDER BY year");
      $kits = Kit::all();

      return view('users.statistics')->with([
        'users' => $users,
        'cars' => $cars,
        'kits' => $kits
      ]);
    }

    public function adminEvents(){
      return view('users.adminEvents');
    }
}
