<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
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
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if(!$this->validator($request->all())->fails()){
        $user=User::find($id);
          $foto = $request->file('foto');
          if($foto == ''){
            $user->avatar = 'avatar.png';
          }else{
          // $extension = $foto->getClientOriginalExtension();
          // Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));
            $image64 = base64_encode(file_get_contents($foto)); //pasar la foto a base64

            //llamar a la api y subir la imagen
            $curl = curl_init();

            $client_id = "64b806a9b93f90f";

            $token = "e91ea0203e37ebb4a90cf957ea2edee47f3c59cb";

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.imgur.com/3/image",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => false,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array('image' => $image64),
              CURLOPT_HTTPHEADER => array(
                // "Authorization: Client-ID {{1cb45b7462006f}}",
                "Authorization: Bearer ".$token //nuestro token para acceder a ala api
              ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              $json = json_decode($response);
              $user->avatar = $json->data->link; //pilla link de la api
            }
          }
        $user->name = $request->input('nombre');
        $user->lastname = $request->input('apellido');
        $user->email = $request->input('email');
        $user->description = $request->get('descripcion');

        $user->save();
        return back()->withCookie(cookie('name', 'value', 60));
      }
      return back()->with('editProfileError', 'Error en la solicitud. Por favor, rellena los campos obligatorios. (*)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if (Auth::User()->role == 'Admin') {
            User::destroy($id);
            return back();
        } else {
            User::destroy($id);
            return redirect('/');
        }
    }

    public function restore($id){

        $user = User::onlyTrashed()->find($id)->restore();
        return back();
    
    }

    public function forceDelete($id){

        $user = User::onlyTrashed()->find($id)->restore();
        $user = User::find($id)->forceDelete();
        return back();
    

    }



    public function changePassword(Request $request,$id){
      if(!$this->passwordValidator($request->all())->fails()){
        $user = User::find($id);
        if(Hash::check($request->input('old-password'), $user->password)){
          $user->password = Hash::make($request->input('new-password'));
          $user->save();
          return back();
        }
        return back()->with('changePasswordError', 'Error en el cambio de contraseña. Inténtalo de nuevo.');
      }
      return back()->with('changePasswordError', 'Error en el cambio de contraseña. Inténtalo de nuevo.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'min:1', 'max:50'],
            'apellido' => ['string', 'nullable', 'max:50'],
            'email' => ['required', 'email'],
            'descripcion' => ['string', 'max:150','nullable'],
            'avatar' => ['image', 'nullable'],
        ]);
    }

    protected function passwordValidator(array $data)
    {
        return Validator::make($data, [
            'old-password' => ['required', 'string', 'min:1'],
            'new-password' => ['required', 'string', 'min:1'],
            'repeat-new-password' => ['required', 'string', 'min:1'],
        ]);
    }
}
