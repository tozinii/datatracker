@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- User data -->
	<div class="sections">

		<!-- Profile image -->
		<img src="assets/images/navIcon.png" alt="Imagen de perfil">

		<!-- Profile data -->
		<form class="needs-validation profile-data" novalidate enctype="multipart/form-data" method="get" action="{{ route('profile.edit')}}">
		    <div class="col-md-4 mb-3">
		      <label>Nombre</label>
		      <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="{{auth()->user()->name}}" disabled>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Apellido</label>
		      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="Petardos" disabled>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Correo electrónico</label>
		      <input type="text" class="form-control" id="emailPerfil" name="email" placeholder="Correo electronico" value="{{auth()->user()->email}}" disabled>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Descripción</label>
		      <textarea class="form-control" id="descripcion" placeholder="Hey there! I am using Telegram!" disabled></textarea>
		    </div>
				<div class="col-md-4 mb-3">
		      <label>Imagen</label>
		      <input type="file" class="form-control" name="imagenPerfil" id="imagenPerfil" disabled>
		    </div>
		    <div class="col-md-4 mb-3" id="botonPerfil">
		  	  <button class="btn btn-primary" type="button" id="editarPerfil">Editar perfil</button>
		    </div>
				<br>
				<div class="col-md-4 mb-3">
		  	  <button class="btn btn-primary" type="submit" id="guardarPerfil">Guardar</button>
		    </div>
		</form>

	</div>

	<!-- Section group -->
	<div class="sections">
		<p>Aquí irá la información del grupo al que este usuario pertenece</p>
	</div>

	<!-- Section cars -->
	<div class="sections">
		<p>Aquí irá la información del coche que tiene este usuario</p>
	</div>
</section>

@endsection
