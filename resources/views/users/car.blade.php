@extends('layouts.layoutLogged')
@section('contenido')
<section class="profile-content">
		<div class="sections">
			<div id="contenido">
			    <div id="sensores">
			    	<h2>{{ucfirst($car->code)}}</h2>
			    	<input type="hidden" id="idCoche" value="{{$car->id}}">
			    	<input type="hidden" id="idKit" value="{{$car->kit->id}}">
			    	<button id="valoresSensores" value="{{$car->id}}">{{$car->id}}</button>
				    <div id="lista-sensores">
				    	<h3>{{ucfirst($car->kit->name)}}</h3>
						@foreach($car->kit->sensors as $sensor)
						    <div id="sensores-listados">
						      	<label>{{ ucfirst($sensor->name) }}</label>
						      	<input type='text' id='sensor{{$sensor->id}}' value='' disabled>
							</div>
						@endforeach
					</div>
					<div id="SensoresVisualizados" class="fondo">
						<div class="listado-sensores">
							<label>Velocidad</label>
							<div class="sensor1" id="1">
								<img id="flechaVelocimetro" src="/assets/images/flecha.png">
							</div>
							
						</div>
						<div class="listado-sensores">
							<label>Bateria</label>
							<div id="bateria2">
								<i class="sensor2" id="cocheBateria"></i>
							</div>
							
						</div>
						<div class="listado-sensores">
							<label>Consumo</label>
							<div class="sensor1" id="4">
								<img id="flechaConsumo" src="/assets/images/flecha.png">
							</div>
							
						</div>
						<div class="listado-sensores">
							<label>Autonomia</label>
							<div class="sensor1" id="5">
								<img id="flechaAutonomia" src="/assets/images/flecha.png">
							</div>
						</div>
						<div class="listado-sensores">
							<label>Voltaje</label>
							<div class="sensor1" id="6">
								<img id="flechaVoltios" src="/assets/images/flecha.png">
							</div>
						</div>
						<div class="listado-sensores">
							<label>Potencia</label>
							<div class="sensor1" id="7">
								<img id="flechaPotencia" src="/assets/images/flecha.png">
							</div>
						</div>
						<div class="listado-sensores">
							<label>Temperatura-Motor</label>
							<div class="sensor1" id="8">
								<img id="flechaTemperatura-Motor" src="/assets/images/flecha.png">
							</div>
						</div>
						<div class="listado-sensores">
							<label>Temperatura-Bateria</label>
							<div class="sensor1" id="9">
								<img id="flechaTemperatura-Bateria" src="/assets/images/flecha.png">
							</div>
						</div>
						<div class="listado-sensores">
							<label>Satelites</label>
							<div class="sensor10" id="10">
								Aqui van los satelites
							</div>
						</div>
						<div class="listado-sensores">
							<label>Rumbo</label>
							<div class="sensor11" id="11">
								<img id="flechaRumbo" src="/assets/images/flecha.png">
							</div>
						</div>
						<div class="listado-sensores">
							<label>RPM</label>
							<div class="sensor1" id="12">
								<img id="flechaRPM" src="/assets/images/flecha.png">
							</div>
						</div>
						<div class="listado-sensores">
							<label>GPS</label>
							<div class="sensor3" id="3">
								<div id="mapid"></div>
							</div>
						</div>
					</div>
					

				</div>
			</div>
	  </div>
	</div>
</section>
@include('includes.geoscripts')
<script type="text/javascript">
var mapa = L.map('mapid').setView([43.326353,-1.971578], 12);

var baselayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets',
	}).addTo(mapa);

$(document).ready(function () {
	var car_id = document.getElementById("idCoche").value;
	var kit = document.getElementById("idKit").value;
	var valores = [];
	function ActualizarAjax(){
		$.ajax({
		  url: '/api/lastdata/'+car_id,
		  type: "GET",
		  dataType: 'json',
		  success: function(dato) {

		  		for(var i = 0; i<dato.length; i++){
		  			var mostrar = i+1;
		  			if($("#sensor"+mostrar) && dato[i]){
		  				$("#sensor"+mostrar).val(dato[i].data);
		  				$('#'+mostrar).css('display','block');
		  				var coordenadas = dato[2].data.split(",");
		  				coordenadas[0] = parseFloat(coordenadas[0]);
		  				coordenadas[1] = parseFloat(coordenadas[1]);
		  				var marcador = L.marker([coordenadas[0],coordenadas[1]]).addTo(mapa);
		  				if(!marcador){
							mapa.removeLayer(marcador);
						}
		  				if(dato[1].data < 20){
		  					$(".sensor2").addClass("bateria1");
				  		}else if(dato[1].data < 51){
				  			$(".sensor2").removeClass("bateria1");
				  			$(".sensor2").addClass("bateria2");
				  		}else if(dato[1].data < 90){
				  			$(".sensor2").removeClass("bateria2");
				  			$(".sensor2").addClass("bateria3");
				  		}else{
				  			$(".sensor2").removeClass("bateria3");
				  			$(".sensor2").addClass("bateria4");
				  		}
				  	}
				}

		  		//$("velocimetro").style.display = "block";
				/*var mapa = L.map('mapid').setView([coordenadas], 12);
				var marker = L.marker([coordenadas],{icon:cocheIcon});.addTo(mapa);*/
				if(kit==1){
					$(".fondo").addClass("fondo1");
				}else if(kit==2){
					$(".fondo").removeClass("fondo1");
					$(".fondo").addClass("fondo2");
				}else if(kit==3){
					$(".fondo").removeClass("fondo2");
					$(".fondo").addClass("fondo3");
				}else{
					$(".fondo").removeClass("fondo3");
					$(".fondo").addClass("fondo4");
				}

		  		var rotar;
		  		if(dato[0].data >= 0){
		  			rotar = (265*dato[0].data/50)+140;
		  			console.log(rotar);
		  			$("#flechaVelocimetro").css("transform", "rotate("+rotar+"deg)");
		  		}
		  		if(dato[3].data >= 0){
		  			rotar = (265*dato[3].data/100)+140;
		  			console.log(rotar);
		  			$("#flechaConsumo").css("transform", "rotate("+rotar+"deg)");
		  		}
		  		if(dato[4].data >= 0){
		  			rotar = (265*dato[4].data/100)+140;
		  			console.log(rotar);
		  			$("#flechaAutonomia").css("transform", "rotate("+rotar+"deg)");
		  		}
		  		if(dato[6].data >= 0){
		  			rotar = (265*dato[6].data/100)+140;
		  			console.log(rotar);
		  			$("#flechaPotencia").css("transform", "rotate("+rotar+"deg)");
		  		}
		  		if(dato[7].data >= 0){
		  			rotar = (265*dato[7].data/100)+140;
		  			console.log(rotar);
		  			$("#flechaTemperatura-Motor").css("transform", "rotate("+rotar+"deg)");
		  		}
		  		if(dato[8].data >= 0){
		  			rotar = (265*dato[8].data/100)+140;
		  			console.log(rotar);
		  			$("#flechaTemperatura-Bateria").css("transform", "rotate("+rotar+"deg)");
		  		}
		  		if(dato[10].data >= 0){
		  			rotar = (265*dato[10].data/100)+140;
		  			console.log(rotar);
		  			$("#flechaRumbo").css("transform", "rotate("+rotar+"deg)");
		  		}
		  		if(dato[11].data >= 0){
		  			rotar = (265*dato[11].data/1000)+140;
		  			console.log(rotar);
		  			$("#flechaRPM").css("transform", "rotate("+rotar+"deg)");
		  		}
	       }
		});
		
	}

	$("#valoresSensores").on("click", function(e){
		e.preventDefault();
		$.ajax({
			  url: '/store/'+car_id,
			  type: "GET",
			  dataType: 'json',
			  success: function(dato) {
			  	ActualizarAjax();

		       }
		});
	});
	
	  	
	setInterval(ActualizarAjax, 5000);
});


	
</script>
@endsection



