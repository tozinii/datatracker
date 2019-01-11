@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- User data -->
	<div class="sections">

		<!-- Profile image -->
		<img src="{{Storage::url(auth()->user()->avatar)}}" alt="Imagen de perfil">

		<!-- Profile data -->
		<form class="needs-validation profile-data" novalidate enctype="multipart/form-data" method="post" action="{{ route('profile.edit',auth()->user()->id)}}">
				@csrf
		    <div class="col-md-4 mb-3">
		      <label>Nombre*</label>
		      <input id="profile-name" type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{auth()->user()->name}}" disabled>
					<span id="profile-name-error-text" class="form-error">Introduce un nombre válido</span>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Apellido</label>
		      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{auth()->user()->lastname}}" disabled>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Correo electrónico*</label>
		      <input id="profile-email" type="text" class="form-control" name="email" placeholder="Correo electronico" value="{{auth()->user()->email}}" disabled>
					<span id="profile-email-error-text" class="form-error">Introduce un correo válido</span>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Descripción</label>
		      <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de usuario" disabled>{{auth()->user()->description}}</textarea>
		    </div>
				<div class="col-md-4 mb-3">
		      <label>Imagen</label>
		      <input type="file" class="form-control" name="avatar" id="avatar" disabled>
		    </div>
		    <div class="col-md-4 mb-3" id="botonPerfil">
		  	  <button class="btn btn-primary" type="button" id="editarPerfil">Editar perfil</button>
		    </div>
				<br>
				<div class="col-md-4 mb-3">
		  	  <button class="btn btn-primary" type="submit" id="guardarPerfil">Guardar</button>
		    </div>
		</form>
		@if(Session::has('editProfileError'))
			<span class="form-error-displayed">{{ Session::get('editProfileError') }}</span>
		@endif

		<div class="col-md-4 mb-3" id="botonPerfil">
			<button class="btn btn-primary" type="button" id="eliminar" data-toggle="modal" data-target="#delete">Eliminar Cuenta</button>
		</div>

		@include('elements.pop-up-delete')
	</div>

	<!-- Section group -->
	<div class="sections">
		<!--<p>Aquí irá la información del grupo al que este usuario pertenece</p>-->
	</div>

	<!-- Section cars -->
	<div class="sections">
		<!--<p>Aquí irá la información del coche que tiene este usuario</p>-->
	</div>
</section>

@endsection
