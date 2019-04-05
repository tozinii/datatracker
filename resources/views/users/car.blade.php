@extends('layouts.layoutLogged')
@section('contenido')
<section class="profile-content">
		<div class="sections">
			<div id="contenido">
			    <div id="sensores">
			    	<h2>{{ucfirst($car->code)}}</h2>
			    	<input type="hidden" id="idCoche" value="{{$car->id}}">
			    	<input type="hidden" id="idKit" value="{{$car->kit->id}}">
				    <div id="lista-sensores">
				    	<h3>{{ucfirst($car->kit->name)}}</h3>
						@foreach($car->kit->sensors as $sensor)
						    <div id="sensores-listados">
						      	<label>{{ ucfirst($sensor->name) }}</label>
						      	<input type='text' id='sensor{{$sensor->id}}' value='' disabled>
							</div>
						@endforeach
					</div>
					<div class="sensor1" id="1">
						<img id="flechaVelocimetro" src="/assets/images/flecha.png">
					</div>
					<div id="2">
						<i class="sensor2" id="cocheBateria"></i>
					</div>
					<div class="sensor3" id="3">
						<div id="mapid" onload="setVista(coordenadas)"></div>
					</div>
					<div class="sensor4" id="4">
						<img id="flechaConsumo" src="/assets/images/flecha.png">
					</div>
					<div class="sensor5" id="5">
						<img id="flechaAutonomia" src="/assets/images/flecha.png">
					</div>
					<div class="sensor6" id="6">
						<img id="Indicador" src="/assets/images/Voltaje.png">
					</div>
					<div class="sensor7" id="7">
						<img id="flechaPotencia" src="/assets/images/flecha.png">
					</div>
					<div class="sensor8" id="8">
						<img id="flechaTemperatura-Motor" src="/assets/images/flecha.png">
					</div>
					<div class="sensor9" id="9">
						<img id="flechaTemperatura-Bateria" src="/assets/images/flecha.png">
					</div>
					<div class="sensor10" id="10">
						Aqui van los satelites
					</div>
					<div class="sensor11" id="11">
						<img id="flechaRumbo" src="/assets/images/flecha.png">
					</div>
					<div class="sensor12" id="12">
						<img id="flechaRPM" src="/assets/images/flecha.png">
					</div>

				</div>
				<div class="clear">
					<div id="imagen-coche">
						<img src="{{asset($car->kit->image)}}">
					</div>
				</div>
			</div>
	  </div>
	</div>
</section>
@include('includes.geoscripts')
<script src="/assets/js/map.js" ></script>
<script type="text/javascript">
$(document).ready(function () {
	var car_id = document.getElementById("idCoche").value;
	var kit = document.getElementById("idKit").value;
	var valores = [];
	function ajax(){
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
	  	
		setInterval(ajax, 5000);
});
</script>
@endsection

