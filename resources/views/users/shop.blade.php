@extends('layouts.layoutLogged')

@section('contenido')

<div class="container">

<h1>Bienvenido a la tienda</h1>
<h3>Estos son los coches que puede comprar en estos momentos:</h3>

<div class="table-responsive">
  <table id="shop-table" class="table">
    <thead>
      <tr>
        <th>Tipo de sensor</th>
        @foreach($listadoKits as $kit)
          <th>{{$kit->name}}<img src="{{asset($kit->image)}}"/></th>
          @php
            $kitId = $kit->id;
          @endphp
        @endforeach
      </tr>
    </thead>
    <tbody>
      @for($i=0; $i < count($listadoSensores); $i++)
        <tr>
          <th>{{$sensors[$i]->name}}</th>
          @for($j=0; $j < count($listadoSensores[$i]); $j++)
            @if($listadoSensores[$i][$j] == false)
              <td><img src="{{asset('assets/images/redcross.png')}}" alt="No tiene" width="10%"></td>
            @elseif($listadoSensores[$i][$j] == true)
              <td><img src="{{asset('assets/images/tick.png')}}" alt="Tiene" width="10%"></td>
            @endif
          @endfor

        </tr>
      @endfor
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        @for($i=1; $i <= count($listadoKits); $i++)
          <td><button href="" data-target="#createCar{{$i}}" data-toggle="modal" class="btnedit3 btnedit-outline-primary btnedit-size" aria-label="Close">Comprar</button></td>
          @include('elements/pop-up-createCar')
        @endfor
      </tr>
    </tfoot>
  </table>
</div>






</div>
@endsection
