@extends('layouts.layoutLogged')

@section('contenido')

<div class="container container-logged">
   <div class="row alert alert-success ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <hr>
	  <h4 class="alert-heading">Coche</h4>
    @if(Session::has('confirmation'))
      <p class="mb-0">{{Session::get('confirmation')}}</p>
    @elseif(sizeOf($cars) == 0)
	    <p class="mb-0">Actualmente usted no dispone de ningún coche.</p>
    @else
      <p class="mb-0">Actualmente usted dispone de {{sizeOf($cars)}} coche(s).</p>
    @endif
	</div>

  <div class="row">
    @foreach($cars as $car)
    <div class="car-element">
      <a href="{{route('cars.show',$car->id)}}"><img class="home-img align-start" src="{{asset($car->kit->image)}}"/></a>
      <p><b>Coche:</b>{{ $car->code }}</p>
      <p><b>Kit:</b>{{ $car->kit->name }}</p>           
    </div>
    @endforeach
  </div>

</div>
@endsection
