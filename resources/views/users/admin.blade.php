@extends('layouts.layoutLogged')
@section('contenido')


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

<div>
	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#sensores">Usuarios</a></li>
	    <li><a data-toggle="tab" href="#estadisticas">Grupos</a></li>
	</ul>

	<div class="tab-content">
    	<div id="sensores" class="tab-pane fade in active">
	      <h3>Usuarios</h3>
	      <div class="list-group">
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			</div>
	    </div>
    <div id="estadisticas" class="tab-pane fade">
    	<h3>Grupos</h3>
	      <div class="list-group">
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			  <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a info list group item</a>
			</div>
    </div>
  </div>
</div>

@endsection