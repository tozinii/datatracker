@extends('layouts.layoutLogged')
@section('contenido')


<div class="container">
   <div class="alert alert-info ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <p>Añadir datos nuevos aleatorios medio realistas. Poner una vista predeterminada de donosti entero. Ruta aplicacion -> posgps/3 </p>
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
<<<<<<< HEAD
      }).addTo(activity);
      // Se pasa la coordenada en string por lo que hay que dividirla y pasarla a int cada coordenada
      var coche = L.marker(coordenadasMapa[3]["coords"]).addTo(activity);
=======
      }).addTo(carmap);
      var marcadores = [];
      for(var i=0; i=coordenadasMapa.length;i++){
        if(coordenadasMapa[i] != null){
          marcadores.push(L.marker(coordenadasMapa[i]["coords"]));
        }
      }
      for (var i = marcadores.length - 1; i >= 0; i--) {
        marcadores[i].addTo(carmap);
      }

>>>>>>> 956c660a61dff407c4635d9998eef594e5ea0c2b
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
            var coordenadas = [];
            for(var sensor of dato){
              if(sensor && sensor.sensor_id == 3 && sensor.data != null){
                coordenadas = sensor.data;
              }
            }
            console.log(coordenadas);
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
