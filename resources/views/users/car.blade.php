@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- Car data -->
	<div class="sections">

		<!-- Car image -->
		<img src="assets/images/article.jpeg" alt="Imagen de perfil">

		<!-- Car data -->
		<form class="needs-validation profile-data" novalidate>
				<div class="col-md-4 mb-3">
					<label>Nombre</label>
					<input type="text" class="form-control" placeholder="Nombre" value="{{$car->code}}" disabled="disabled">
				</div>
		    <div class="col-md-4 mb-3">
		      <label>Descripcion</label>
		      <input type="text" class="form-control" placeholder="Nombre" value="{{$car->description}}" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Anchura</label>
		      <input type="text" class="form-control" placeholder="Apellido" value="1m" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Nº sensores</label>
		      <input type="text" class="form-control" placeholder="3" value="{{$car->kit->sensors->count()}}" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Bateria</label>
		      <input type="text" class="form-control" placeholder="20000mAh" value="20000mAh" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		  	  <button class="btn btn-primary" type="submit">Editar coche</button>
		    </div>
		</form>

	</div>
	<div>
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#sensores">Sensores</a></li>
		    <li><a data-toggle="tab" href="#estadisticas">Estadisticas</a></li>
		    <li><a data-toggle="tab" href="#comentarios">Comentarios</a></li>
		    <li><a data-toggle="tab" href="#map">Mapa</a></li>
		</ul>

		<div class="tab-content">
	    	<div id="sensores" class="tab-pane fade in active">
		      <h3>Sensores</h3>
		      <form>
		      	<label>Bateria</label>
		      	<input type="text" name="bateria" value="Le queda bateria para 3 horas..." disabled="disabled">
		      	<label>Velocidad</label>
		      	<input type="text" name="velocidad" value="El coche esta yendo a 40km/h..." disabled="disabled">
		      	<label>GPS</label>
		      </form>
		    </div>
	    	<div id="estadisticas" class="tab-pane fade">
		    	<h3>Estadisticas</h3>
		    	<form>
		    		<label>Mejores marcas</label>
		    		<input type="text" name="maxMarcas" value="Su mejor carrera la hizo en 40mins, 12secs..." disabled="disabled">
			      	<label>Ultimas marcas</label>
			      	<input type="text" name="ultMarcas" value="Su ultima carrera la terminó en 56mins, 37secs..." disabled="disabled">
			      	<label>Consumo</label>
			      	<input type="text" name="consumo" value="El consumo medio de gasolina en cada carrera es de 25 litros" disabled="disabled">
			      	<label>Accidentes</label>
			      	<input type="text" name="fallos" value="Este coche ha tenido 4 accidentes" disabled="disabled">
			    </form>
	    	</div>
		    <div id="comentarios" class="tab-pane fade">
		    	<h3>Comentarios</h3>
		    	<form>
		    		<textarea placeholder="Escriba aquí su comentario..."></textarea>
		    		<input type="submit" name="submit" value="Enviar comentario">
		    	</form>
		    	<div class="comments-list">
		    		<span>Paco: El coche ha girado mal en la quinta curva, tenemos que mirarlo, YA.</span>
		    	</div>
		    </div>
		    <div id="map">
		    </div>
	  </div>
	</div>
	</div>
</section>
<script>

    var carmap = L.map('map').setView([43.326025, -1.968831], 16);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoiY3luZGEiLCJhIjoiY2pyOTM3b2ZmMDB0dDQzcGZ5ajR4aXJyNiJ9.uQDXCNWklDqzIdAHxI0XqA', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets'
        }).addTo(carmap);
        	<?php for($i = 0; $i < count($coordenadas)-1; $i++) { ?>
		        var etapa<?php echo $i ?> = [
		            [<?php echo $coordenadas[$i] ?>],
		           	[<?php echo $coordenadas[$i+1] ?>]
		        ];
		        var polyline<?php echo $i ?> = L.polyline(etapa<?php echo $i ?>, {color: 'red'}).addTo(carmap);
        	<?php

        		}
		?>

</script>

@endsection
