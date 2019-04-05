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
						<i class="sensor2" id="bateria1"></i>
						<i class="sensor2" id="bateria2"></i>
						<i class="sensor2" id="bateria3"></i>
						<i class="sensor2" id="bateria4"></i>
					</div>
					<div class="sensor3" id="3">
						<div id="mapid" ></div>
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

<script type="text/javascript">
$(document).ready(function () {
	var car_id = document.getElementById("idCoche").value;
	var kit = document.getElementById("idKit").value;
	var valores = [];
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
		  					$('#bateria1').css('display','block');
				  		}else if(dato[1].data < 51){
				  			$('#bateria2').css('display','block');
				  		}else if(dato[1].data < 90){
				  			$('#bateria3').css('display','block');
				  		}else{
				  			$('#bateria4').css('display','block');
				  		}
				  	}
				}

		  		//$("velocimetro").style.display = "block";
				mapa.setView([coordenadas], 12);
				marker.setLatLng([coordenadas]).addTo(mapa);

		  		var rotar;
		  		if(dato[0].data != 0){
		  			rotar = rotar = (405*dato[0].data)/50;
		  			console.log(rotar);
		  			if(rotar < 82){
		  				rotar = rotar = ((405*dato[0].data)/50)+135;
		  				$("#flecha").css("transform", "rotate("+rotar+"deg)");
		  				console.log(rotar);
		  			}else if(rotar > 83 && rotar < 163){
		  				rotar = rotar = ((405*dato[0].data)/50)+100;
		  				$("#flecha").css("transform", "rotate("+rotar+"deg)");
		  				console.log(rotar);
		  			}else if(rotar < 280){
		  				rotar = rotar = ((405*dato[0].data)/50)+45;
		  				$("#flecha").css("transform", "rotate("+rotar+"deg)");
		  				console.log(rotar);
		  			}else{
		  				$("#flecha").css("transform", "rotate("+rotar+"deg)");
		  				console.log(rotar);
		  			}
		  		}
	       }
		});
});
</script>
<script src="/assets/js/map.js" ></script>
@endsection

