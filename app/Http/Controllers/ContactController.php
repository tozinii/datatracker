<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    //Formulario para almacenar datos del form-contacto
    public function postContact(Request $request){
      $contact = new Contact;
      $contact->name = $request->name;
      $contact->email = $request->email;
      $contact->message = $request->message;

      $contact->save();
      return redirect('/');
    }
}
