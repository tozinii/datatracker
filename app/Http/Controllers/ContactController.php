<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //Formulario para almacenar datos del form-contacto
    public function postContact(Request $request){
      if(!$this->validator($request->all())->fails()){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();
        return redirect('/');
      }else{
        return redirect('/#contacto')->with('contactError','Error en la solicitud. Por favor, rellena otra vez el formulario.');
      }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'message' => ['required', 'string', 'min:1', 'max:300'],

        ]);
    }

}
