@extends('layouts.layoutLogged')
@section('contenido')



<div class="container">
   <div class="alert alert-info ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <p>Este es el panel de administrador, aquí podrás ver la cantidad total de usuarios y grupos que actualmente estan registrados en la base de datos.</p>
	</div>
</div>

<div class="card text-white crd-primary mb-3">
  <div class="card-header">Usuarios</div>
  <div class="card-body">
    <p class="card-text text-white">Hay {{$users}} en la base de datos.</p>
  </div>
</div>


@endsection
