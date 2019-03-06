@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- Car data -->


		<!-- Car image -->
		<!-- <img src="assets/images/article.jpeg" alt="Imagen de perfil">-->

		<!-- Car data -->
		<form id="edit-car-form" method="POST" action="{{ route('cars.update',$car->id)}}" class="needs-validation profile-data" novalidate>
			@csrf
			@method('PUT')
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<label>Código*</label>
					<input id="car-code" type="text" name="car-code" class="form-control" value="{{$car->code}}" disabled="disabled">
					<span id="car-code-error-text" class="form-error">Este campo no debe estar vacío</span>
				</div>
		    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
		      <label>Descripción</label>
					<textarea class="form-control" id="car-description" name="car-description" disabled>{{$car->description}}</textarea>
		    </div>
		    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
		      <label>Nº sensores</label>
					<p>{{$car->kit->sensors->count()}}</p>
		    </div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  	  <button class="btn btn-primary" type="button" id="edit-car">Editar coche</button>
		    </div>
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  	  <button class="btn btn-primary" type="submit" id="save-car">Guardar</button>
		    </div>
		</form>

		@if(Session::has('editCarError'))
			<div class="col-md-12">
				<span class="form-error-displayed">{{ Session::get('editCarError') }}</span>
			</div>
		@endif

</section>

@endsection
