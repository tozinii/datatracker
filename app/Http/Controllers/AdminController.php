<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
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

      // Recoge usuarios
      $users = User::where('role', 'User')
      ->orderBy('name', 'asc')
      ->get();

      //  Recoge usuarios baneados
      $banneds = User::onlyTrashed()
      ->orderBy('name', 'asc')
      ->get();

      // Recoge usuarios
      $groups = Group::all();

      return view('users.listUsers
        ')->with([
        'users'=>$users,
        'banneds'=>$banneds,
        'groups'=>$groups
      ]);
    }
    public function statistics()
    {
      $users = DB::select("SELECT count(*) as contador, to_char(created_at, 'Mon YYYY') as fecha FROM users WHERE role='User' GROUP BY 2 ORDER BY to_char(created_at, 'YYYY MM') asc");


      return view('users.statistics')->with('users',$users);
    }
}
