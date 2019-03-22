@extends('layouts.layoutLogged')
@section('contenido')


<div class="container">
   <div class="alert alert-info ttl" role="alert">
	  <h3 class="alert-heading">Bienvenidox {{ Auth::user()->name}}</h3>
	  <p>Este es el panel de administrador, aquí podrás ver la cantidad total de usuarios y grupos que actualmente estan registrados en la base de datos.</p>
	</div>
</div>

  <div class="row">
    @foreach($cars as $car)
    <div class="car-element">
      <a href="{{route('cars.show',$car->id)}}"><img class="home-img align-start" src="{{asset($car->kit->image)}}"/></a>
      <p><b>Coche:</b>{{ $car->code }}</p>
      <p><b>Kit:</b>{{ $car->kit->name }}</p>
      <p><b>Posición: </b>{{ $car->kit->gps }}</p>
    </div>
    @endforeach
  </div>



@endsection
