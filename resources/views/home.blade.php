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
        @foreach($kits as $key => $kit)
          @if($key == 0)
            <td>{{$kit}}</td>
          @elseif($kit == false)
            <td>No</td>
          @else
            <td>Si</td>
          @endif
        @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>








</div>
@endsection
