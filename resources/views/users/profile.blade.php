@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- User data -->
	<div class="sections">
		
		<!-- Profile image -->
		<img src="assets/images/navIcon.png" alt="Imagen de perfil">

		<!-- Profile data -->
		<form class="needs-validation profile-data" novalidate>
		  <div class="form-row">
		    <div class="col-md-4 mb-3">
		      <label for="validationTooltip01">Nombre</label>
		      <input type="text" class="form-control" id="validationTooltip01" placeholder="Nombre" value="Paco" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label for="validationTooltip02">Apellido</label>
		      <input type="text" class="form-control" id="validationTooltip02" placeholder="Apellido" value="Petardos" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label for="validationTooltip02">Correo electronico</label>
		      <input type="text" class="form-control" id="validationTooltip02" placeholder="Correo electronico" value="Petardos" disabled="disabled">
		    </div>
		    <div class="col-md-4 mb-3">
		      <label for="validationTooltipUsername">Descripción</label>
		      <textarea class="form-control" id="validationTooltip03" placeholder="Pon lo que te salga de los..." disabled="disabled"></textarea>
		    </div>
		  </div>
		  <div class="form-row">
		    <div class="col-md-6 mb-3">
		  </div>
		  <button class="btn btn-primary" type="submit">Editar perfil</button>
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
