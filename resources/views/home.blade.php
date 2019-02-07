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
        @foreach($listadoKits as $kit)
          <th>{{$kit->name}}</th>
          @php
            $kitId = $kit->id;
          @endphp
        @endforeach
      </tr>
        @for($i=0; $i < count($listadoSensores); $i++)
          <tr>
            <th scope="col">{{$sensors[$i]->name}}</th>
            @for($j=0; $j < count($listadoSensores[$i]); $j++)
              @if($listadoSensores[$i][$j] == false)
                <td><img src="{{asset('assets/images/redcross.png')}}" alt="No tiene" width="60%"></td>
              @elseif($listadoSensores[$i][$j] == true)
                <td><img src="{{asset('assets/images/tick.png')}}" alt="Tiene" width="60%"></td></td>
              @endif
            @endfor

          </tr>
        @endfor
        <tr>
          <td></td>
          @for($i=0; $i < count($listadoKits); $i++)
            <td><button href="" data-target="#createCar{{$kitId}}" data-toggle="modal" class="btnedit3 btnedit-outline-primary btnedit-size" aria-label="Close">Comprar</button></td>
            @include('elements/pop-up-createCar')
          @endfor

        </tr>


    </tr>
  </thead>
  </table>






</div>
@endsection
