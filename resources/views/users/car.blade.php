@extends('layouts.layoutLogged')
@section('contenido')
<section class="profile-content">
		<div class="sections">
			<div id="contenido">
			    <div id="sensores">
			    	<h2>{{ucfirst($car->code)}}</h2>
			    	<input type="hidden" id="idCoche" value="{{$car->id}}">

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

	  	$.ajax({
		  url: '/api/lastdata/'+car_id,
		  type: "GET",
		  dataType: 'json',
		  success: function(dato) {
		  		console.log(dato);

		  		if (dato[0].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[0].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[1].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[1].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[2].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[2].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[3].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[3].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[4].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[4].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[5].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[5].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[6].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[6].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[7].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[7].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[8].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[8].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[9].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[9].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[10].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[10].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}

		  		if (dato[11].data != null) {
		  			var newRow1 = "<input type='text' id='valor' value="+dato[11].data+" disabled>"
		  		}else{
		  			var newRow1 = "<input type='text' id='valor' value="Sin valor" disabled>"
		  		}
			
			  	$(newRow1).appendTo("#1");
			  	$(newRow2).appendTo("#2");
			  	$(newRow3).appendTo("#3");
			  	$(newRow4).appendTo("#4");
			  	$(newRow5).appendTo("#5");
			  	$(newRow6).appendTo("#6");
			  	$(newRow7).appendTo("#7");
			  	$(newRow8).appendTo("#8");
			  	$(newRow9).appendTo("#9");
			  	$(newRow10).appendTo("#10");
			  	$(newRow11).appendTo("#11");
			  	$(newRow12).appendTo("#12");
	       }

		});
});
</script>
@endsection

