@extends('layouts.layoutLogged')
@section('contenido')


<div class="container">
   <div class="alert alert-info ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <p>Añadir datos nuevos aleatorios medio realistas. Poner una vista predeterminada de donosti entero. </p>
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

   var carCoords = [];
   var coordenadas = [];
     var map = L.map('map').setView([43.326353,-1.971578], 13);

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoiY3luZGEiLCJhIjoiY2pyOTM3b2ZmMDB0dDQzcGZ5ajR4aXJyNiJ9.uQDXCNWklDqzIdAHxI0XqA', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox.streets'
      }).addTo(map);



   $(document).ready(function () {
     var cars_ids = {{$cars_ids}};


    for(let carId of cars_ids){
   	  	$.ajax({
   		  url: '/api/lastdata/'+carId,
   		  type: "GET",
   		  dataType: 'json',
   		  success: function(dato) {
          for (var i = 0; i < dato.length; i++) {
            if(dato[i] != null){
              if(dato[i].sensor_id == 3){
                  coordenadas = dato[2].data.split(",");
                          coordenadas[0] = parseFloat(coordenadas[0]);
                          coordenadas[1] = parseFloat(coordenadas[1]);
                L.marker([coordenadas[0], coordenadas[1]]).addTo(map);
                carCoords = dato[2].data;
                  console.log(carCoords);
              }
            }
          }
        }
  		});

  }
});


   </script>

@endsection
