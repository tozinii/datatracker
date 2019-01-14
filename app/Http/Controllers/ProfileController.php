<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $user = Auth::user();
        return view('users.profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
          if(!$this->validator($request->all())->fails()){
            $user=User::find($id);
            if ($request->hasFile('avatar')) {
              $user->avatar = $request->file('avatar')->store('public');
            }
            $user->name = $request->input('nombre');
            $user->lastname = $request->input('apellido');
            $user->email = $request->input('email');
            $user->description = $request->get('descripcion');

            $user->save();
            return back();
          }
          return redirect('/profile')->with('editProfileError', 'Error en la solicitud. Por favor, rellena los campos obligatorios. (*)');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::destroy($id);

      if (Auth::User()->role == 'Admin') {
        return back();
      } else {
        return redirect('/');
      }



    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'min:1', 'max:50'],
            'apellido' => ['string', 'min:1', 'max:50'],
            'email' => ['required', 'email'],
            'descripcion' => ['string', 'max:150','nullable'],
            'avatar' => ['image'],
        ]);
    }
}
