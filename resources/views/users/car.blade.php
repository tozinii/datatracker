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
						      	<div id="{{$sensor->id}}"></div>
							</div>
						@endforeach
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
		  		switch(kit) {
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
				}
	       }
		});
});
</script>
@endsection

