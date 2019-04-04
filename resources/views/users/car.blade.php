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
						Aqui va el mapa
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
		  	console.log(dato);

		  		for(var i = 0; i<dato.length; i++){
		  			var mostrar = i+1;
		  			if($("#sensor"+mostrar) && dato[i]){
		  				$("#sensor"+mostrar).val(dato[i].data);
		  				document.getElementById(mostrar).style.display = "block";
		  			}
		  		}
		  		//Esto funciona
		  		document.getElementById("1").style.display = "block";
		  		//$("velocimetro").style.display = "block";
		  		if(dato[1].data < 25){
		  			document.getElementById("bateria1").style.display = "block";
		  		}else if(dato[1].data >= 25 && dato[2].data < 50){
		  			document.getElementById("bateria2").style.display = "block";
		  		}else if(dato[1].data >= 50 && dato[2].data < 75){
		  			document.getElementById("bateria3").style.display = "block";
		  		}else{
		  			document.getElementById("bateria1").style.display = "block";
		  		}

		  		//Esto deberia cambiarlo
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
		 		
		  		
			  	/*var newRow2 = $("2").val = dato[1].data;
			  	var newRow3 = $("3").val = dato[2].data;
			  	var newRow4 = $("4").val = dato[3].data;
			  	var newRow5 = $("5").val = dato[4].data;
			  	var newRow6 = $("6").val = dato[5].data;
			  	var newRow7 = $("7").val = dato[6].data;
			  	var newRow8 = $("8").val = dato[7].data;
			  	var newRow9 = $("9").val = dato[8].data;
			  	var newRow10 = $("10").val = dato[9].data;
			  	var newRow11 = $("11").val = dato[10].data;
			  	var newRow12 = $("12").val = dato[11].data;*/
			
		  		/*switch(kit) {
				  case "1":
				  	valores = [1,2,3,4,5,10];
				    for(var i = 0; i < dato.length; i++){
			  			if (dato[i] != null) {
			  				var newRow = "<input type='text' id='valor' value="+dato[i].data+" disabled>";
			  				$(newRow).appendTo("#"+dato[i].sensor_id);
			  			}else{
			  				var newRow = "<input type='text' id='valor' value='Sin Valor' disabled>";
			  				$(newRow).appendTo("#"+valores[i]);
		  				}
		  			}
				    break;
				  case "2":
				    valores = [1,2,3,4,5,7,10,11,12];
				    for(var i = 0; i < dato.length; i++){
			  			if (dato[i] != null) {
			  				var newRow = "<input type='text' id='valor' value="+dato[i].data+" disabled>";
			  				$(newRow).appendTo("#"+dato[i].sensor_id);
			  			}else{
			  				var newRow = "<input type='text' id='valor' value='Sin Valor' disabled>";
			  				$(newRow).appendTo("#"+valores[i]);
		  				}
		  			}
				    break;
				  case "3":
				    valores = [1,2,3,4,5,6,7,10,11,12];
				    for(var i = 0; i < dato.length; i++){
			  			if (dato[i] != null) {
			  				var newRow = "<input type='text' id='valor' value="+dato[i].data+" disabled>";
			  				$(newRow).appendTo("#"+dato[i].sensor_id);
			  			}else{
			  				var newRow = "<input type='text' id='valor' value='Sin Valor' disabled>";
			  				$(newRow).appendTo("#"+valores[i]);
		  				}
		  			}
				   	break;
				  case "4":
				    for(var i = 0; i < dato.length; i++){
			  			if (dato[i] != null) {
			  				console.log(i);
			  				var newRow = "<input type='text' id='valor' value="+dato[i].data+" disabled>";
			  				$(newRow).appendTo("#"+dato[i].sensor_id);
			  			}else{
			  				var mostrar = i+1;
			  				var newRow = "<input type='text' id='valor' value='Sin Valor' disabled>";
			  				$(newRow).appendTo("#"+mostrar);
		  				}
		  			}
				    break;
				  default:
				    alert("sa matao paco");
				}*/
	       }
		});
});
</script>
@endsection

