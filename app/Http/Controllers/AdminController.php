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

      // Recoge usuarios
      $users = User::where('role', 'User')
      ->orderBy('name', 'asc')
      ->get();

      //  Recoge usuarios baneados
      $banneds = User::onlyTrashed()
      ->orderBy('name', 'asc')
      ->get();


      return view('users.listUsers
        ')->with([
        'users'=>$users,
        'banneds'=>$banneds
      ]);
    }
    public function statistics()
    {

<<<<<<< HEAD
      $users = DB::select("SELECT count(*) as contador, to_char(created_at, '%M %Y') as fecha FROM users WHERE role='User' GROUP BY fecha ORDER BY to_char(created_at, '%Y%m') asc");


      return view('users.statistics')->with('users',$users);
    }
}
=======
      return view('users.statistics')->with('users',$users);
    }
}
>>>>>>> 38161b6e7a9fbcb494cf36327310cca9c98489aa
