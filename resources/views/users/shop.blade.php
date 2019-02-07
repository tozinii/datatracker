@extends('layouts.layoutLogged')

@section('contenido')

<div class="container">

<h1>Bienvenido a la tienda</h1>


<div class="card-deck">
  @foreach($kits as $kit)
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{$kit->name}}</h5>
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        @foreach($kit->sensors as $sensor)
          <li class="list-group-item">{{$sensor->name}}</li>
        @endforeach
      </ul>
    </div>
    <div class="card-body">
      <a href="" data-target="#createCar{{$kit->id}}" data-toggle="modal" class="btn btn-default  wow fadeInUp  js-scroll-trigger">Comprar</a>
    </div>

    @include('elements.pop-up-createCar')
  </div>

  @endforeach
</div>





</div>
@endsection

