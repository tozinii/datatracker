@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- Car data -->
	<div class="row">

		<!-- Car image -->
		<img src="assets/images/article.jpeg" alt="Imagen de perfil">

		<!-- Car data -->
		<form class="needs-validation profile-data" novalidate>
				<div class="col-md-4 mb-3">
					<label>Nombre</label>
					<input type="text" class="form-control" value="{{$car->code}}" disabled="disabled">
				</div>
		    <div class="col-md-4 mb-3">
		      <label>Descripcion</label>
		      <input type="text" class="form-control" value="{{$car->description}}" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Nº sensores</label>
		      <input type="text" class="form-control" value="{{$car->kit->sensors->count()}}" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		  	  <button class="btn btn-primary" type="submit">Editar coche</button>
		    </div>
		</form>

	</div>
	<div class="row">
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#sensores">Sensores</a></li>
		</ul>

		<div class="tab-content">
	    	<div id="sensores" class="tab-pane fade in active">
		      <h3>Sensores</h3>
						@foreach($carSensorsNames as $sensorName)
						<label>{{ ucfirst($sensorName) }}</label><br />
		      	<a href="{{ route('sensorInfo',[$car->code, $sensorName]) }}" class="button">Ver datos</a><br />
						@endforeach
		    </div>
	  </div>
	</div>
	</div>
</section

@endsection
