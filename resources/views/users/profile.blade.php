@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- User data -->
	<div class="sections">
		
		<!-- Profile image -->
		<img src="assets/images/navIcon.png" alt="Imagen de perfil">

		<!-- Profile data -->
		<form class="needs-validation profile-data" novalidate>
		    <div class="col-md-4 mb-3">
		      <label>Nombre</label>
		      <input type="text" class="form-control" placeholder="Nombre" value="Paco" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Apellido</label>
		      <input type="text" class="form-control" placeholder="Apellido" value="Petardos" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Correo electrónico</label>
		      <input type="text" class="form-control" placeholder="Correo electronico" value="Petardos" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Descripción</label>
		      <textarea class="form-control" placeholder="Hey there! I am using Telegram!" disabled="disabled"></textarea>
		    </div>
		    <div class="col-md-4 mb-3">
		  	  <button class="btn btn-primary" type="submit">Editar perfil</button>
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
