@extends('layouts.layoutUser')

@section('mensaje')


<div class="container ">
   <div class="row">
     <div class="book_now_aera_register ">
        <div class="container">
           <div class="row book_now_register bg-new">
              <div class="col-md-7 booking_text_register">
                 <h2>Verifica tu correo electrónico</h2>
                 <p>Antes de empezar, verifica tu cuenta pulsando en el link del correo</p>
                 <p>Si no has recibido ningún email, <a href="{{ route('verification.resend') }}"> pulsa en el siguiente link</a>.</p>
              </div>
           </div>
        </div>
     </div>
   </div>
</div>





@endsection
