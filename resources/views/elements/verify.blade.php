@extends('layouts.layoutUser')

@section('mensaje')


<div class="container ">
   <div class="row">
     <div class="book_now_aera_register ">
        <div class="container">
           <div class="row book_now_register bg-new">
              <div class="col-md-7 booking_text_register">
                 <h2>Verifica tu correo electrónico</h2>
                 <p>Before proceeding, please check your email for a verification link.</p>
                 <p>If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.</p>
              </div>
           </div>
        </div>
     </div>
   </div>
</div>





@endsection
