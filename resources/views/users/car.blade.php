@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- Car data -->
	<div class="row">

		<!-- Car image -->
		<!-- <img src="assets/images/article.jpeg" alt="Imagen de perfil">-->

		<!-- Car data -->
		<form id="edit-car-form" method="POST" action="{{ route('cars.update',$car->id)}}" class="needs-validation profile-data" novalidate>
			@csrf
			@method('PUT')
				<div class="col-md-4">
					<label>Código*</label>
					<input id="car-code" type="text" name="car-code" class="form-control" value="{{$car->code}}" disabled="disabled">
					<span id="car-code-error-text" class="form-error">Este campo no debe estar vacío</span>
				</div>
		    <div class="col-md-4">
		      <label>Descripción</label>
					<textarea class="form-control" id="car-description" name="car-description" disabled>{{$car->description}}</textarea>
		    </div>
		    <div class="col-md-4">
		      <label>Nº sensores</label>
					<p>{{$car->kit->sensors->count()}}</p>
		    </div>
				<div class="col-md-12">
		  	  <button class="btn btn-primary" type="button" id="edit-car">Editar coche</button>
		    </div>
				<br>
				<div class="col-md-12">
		  	  <button class="btn btn-primary" type="submit" id="save-car">Guardar</button>
		    </div>
		</form>
	</div>

	@if(Session::has('editCarError'))
	<div class="row">
		<div class="col-md-12">
			<span class="form-error-displayed">{{ Session::get('editCarError') }}</span>
		</div>
	</div>
	@endif

	<div class="row">
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#sensores">Datos de los sensores</a></li>
		</ul>

		<div class="tab-content">
	    	<div id="sensores" class="tab-pane fade in active">
		      <h3>Datos de los sensores</h3>
						@foreach($car->sensors as $sensor)

						<a href="{{ route('sensorInfo',[$car->code, $sensor->id]) }}" class="sensor-info-button sensor-info-button--isi sensor-info-button--text-thick sensor-info-button--text-upper">
							<span>{{ ucfirst($sensor->name) }}</span>
						</a>

						@endforeach
		    </div>
	  </div>
	</div>
	</div>
</section>

@endsection
