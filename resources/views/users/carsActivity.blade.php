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

   function renderizarMapa(coordenadasMapa){
     var activity = L.map('map').setView([43.326353,-1.971578], 16);

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoiY3luZGEiLCJhIjoiY2pyOTM3b2ZmMDB0dDQzcGZ5ajR4aXJyNiJ9.uQDXCNWklDqzIdAHxI0XqA', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 18,
          id: 'mapbox.streets'
      }).addTo(activity);
      // Se pasa la coordenada en string por lo que hay que dividirla y pasarla a int cada coordenada
      var coche = L.marker(coordenadasMapa[3]["coords"]).addTo(activity);
   }

   $(document).ready(function () {
    var carsId = {{ $cars_ids }};
    console.log(carsId);
   	var carCoords = [];

    for(let carId of carsId){
   	  	$.ajax({
   		  url: '/api/lastdata/'+carId,
   		  type: "GET",
   		  dataType: 'json',
   		  success: function(dato, status, xhr) {
            var coordenadas = null;
            for(var sensor of dato){
              if(sensor && sensor.sensor_id == 3){
                coordenadas = sensor.data;
              }
            }
            carCoords.push({
                id: carId,
                coords: coordenadas
            });
            if(carCoords.length === carsId.length){
              renderizarMapa(carCoords);
            }
  	       }
  		});
    }
  });


   </script>

@endsection
