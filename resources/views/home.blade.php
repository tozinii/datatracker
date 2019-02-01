@extends('layouts.layoutLogged')

@section('contenido')

<div class="container">
   <div class="alert alert-success ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <hr>
	  <h4 class="alert-heading">Coche</h4>
    @if(Session::has('confirmation'))
      <p class="mb-0">{{Session::get('confirmation')}}</p>
    @elseif($cars == 0)
	    <p class="mb-0">Actualmente usted no dispone de ningún coche.</p>
    @else
      <p class="mb-0">Actualmente usted dispone de {{$cars}} coche(s).</p>
    @endif
	</div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        @foreach($kits as $kit)
        <th scope="col">{{$kit->name}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach($sensors as $sensor)
      <tr>
        <th scope="row">{{$sensor->name}}</th>
        @foreach($kits as $kit)
        <td>{{$kit->name}}</td>
        @endforeach
      </tr>
      @endforeach
    </tbody>
  </table>


<div class="card-deck">
  @foreach($kits as $kit)
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
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
