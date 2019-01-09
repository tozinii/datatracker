@extends('layouts.layoutPrincipal')

@section('banner')
  <div class="container ">
     <div class="row">
       <div class="book_now_aera_register ">
          <div class="container">
             <div class="row book_now_register bg-new">
                <div class="col-md-7 booking_text_register">
                   <h2>Resetea tu contraseña</h2>
                   <form method="POST" action="{{ route('password.email') }}">
                       @csrf

                       <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                           <div class="col-md-6">
                               <input id="reset-password-email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                               <span id="reset-password-error-text" class="form-error">Introduce un correo válido</span>
                               @if ($errors->has('email'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group row mb-0">
                           <div class="col-md-6 offset-md-4">
                               <button id="reset-password-submit" type="submit" class="btn btn-primary">
                                   {{ __('Enviar correo') }}
                               </button>
                           </div>
                       </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
     </div>
  </div>
@endsection
