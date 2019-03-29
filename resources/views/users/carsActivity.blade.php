@extends('layouts.layoutLogged')
@section('contenido')


<div class="container">
   <div class="alert alert-info ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <p>Este es el panel de actividad, aqui podra observar los coches que han recibido algun dato el dia de hoy.</p>
	</div>
</div>

  <div class="row">
    @foreach($cars as $car)
    <div class="car-element">
      <p><b>Coche:</b>{{ $car->code }}</p>
    </div>
    @endforeach
  </div>
  <div id="map">
    
  </div>


   <script>

          var carmap = L.map('map').setView([{{$sensorInfo[0]->data}}], 16);

           L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoiY3luZGEiLCJhIjoiY2pyOTM3b2ZmMDB0dDQzcGZ5ajR4aXJyNiJ9.uQDXCNWklDqzIdAHxI0XqA', {
               attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
               maxZoom: 18,
               id: 'mapbox.streets'
           }).addTo(carmap);
           /*
                  Aqui usar un ajax para coger la api y el valor del gps


           @if($sensor->name == 'gps')
              @php
                $coordenadas = [];
              @endphp
            @foreach($sensorInfo as $info)
              <?php $coordenadas[] = $info->data ?>;
            @endforeach
            <?php for($i = 0; $i < count($coordenadas)-1; $i++) { ?>
              var etapa<?php echo $i ?> = [
                  [<?php echo $coordenadas[$i] ?>],
                   [<?php echo $coordenadas[$i+1] ?>]
              ];
              var polyline<?php echo $i ?> = L.polyline(etapa<?php echo $i ?>, {color: 'red'}).addTo(carmap);
            <?php

              }
            ?>
            */
          @endif


   </script>

@endsection
