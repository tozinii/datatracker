@extends('layouts.layoutLogged')

@section('contenido')

<div class="container">
   <div class="alert alert-success ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <p>Esta es la vista principal, aquí podrás ver los últimos cambios en tu grupo y ver el estado del coche.</p>
	  <hr>
	  <h4 class="alert-heading">Grupos</h4>
	  <p class="mb-0">Actualmente usted no está en ningún grupo.</p>
	  <hr>
	  <h4 class="alert-heading">Coche</h4>
	  <p class="mb-0">Actualmente usted no dispone de ningún coche.</p>
	</div>
</div>

@endsection
