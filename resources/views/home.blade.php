@extends('layouts.layoutLogged')

@section('contenido')

<div class="container">
   <div class="alert alert-success ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <hr>
	  <h4 class="alert-heading">Grupos</h4>
	  <p class="mb-0">Actualmente usted no está en ningún grupo.</p>
	  <hr>
	  <h4 class="alert-heading">Coche</h4>
	  <p class="mb-0">Actualmente usted no dispone de ningún coche.</p>
	</div>


<div class="card-deck">
  @foreach($kits as $kit)
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$kit->name}}</h5>
    </div>
    <ul class="list-group list-group-flush">
    @foreach($kit->sensors as $sensor)
      <li class="list-group-item">{{$sensor->name}}</li>
    @endforeach
  </ul>
  </div>

  @endforeach
</div>




</div>
@endsection
