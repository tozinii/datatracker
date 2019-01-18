@extends('layouts.layoutLogged')

@section('contenido')

<div class="container ">
   <div class="alert alert-success ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <p>Aquí podrás crear un grupo con el cual visualizar y gestionar los datos de vuestro coche o si ya tienes un grupo, únete a el!</p>
	  <hr>
	  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
	</div>
</div>

@endsection
