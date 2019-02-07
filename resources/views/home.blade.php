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
        <th></th>
        @foreach($sensors as $sensor)
        <th scope="col">{{$sensor->name}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach($existeTodo as $kits)
        <tr>
        @php
          $kitId;
        @endphp
        @foreach($kits as $key => $kit)
          @if($key == 0)
            <td>{{$kit->name}}</td>
            @php
              $kitId = $kit->id;
            @endphp
          @elseif($kit == false)
            <td><img src="{{asset('assets/images/redcross.png')}}" alt="No tiene" width="60%"></td>
          @else
            <td><img src="{{asset('assets/images/tick.png')}}" alt="Tiene" width="60%"></td></td>
          @endif
          @if($loop->last)
            <td><button href="" data-target="#createCar{{$kitId}}" data-toggle="modal" class="btnedit3 btnedit-outline-primary btnedit-size" aria-label="Close">Comprar</button></td>
            @include('elements/pop-up-createCar')
          @endif
        @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
