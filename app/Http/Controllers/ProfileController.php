<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function save(Request $request)
    {
      
    }

    public function show()
    {
      return view('users.profile');
    }
}
