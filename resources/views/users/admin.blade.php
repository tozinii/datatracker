@extends('layouts.layoutLogged')
@section('contenido')


	
	<div class="sections">

		<!-- Profile image -->
		<img src="{{Storage::url(auth()->user()->avatar)}}" alt="Imagen de perfil">

		<!-- Profile data -->
		<form class="needs-validation profile-data" novalidate enctype="multipart/form-data" method="post" action="{{ route('profile.edit',auth()->user()->id)}}">
				@csrf
		    <div class="col-md-4 mb-3">
		      <label>Nombre</label>
		      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{auth()->user()->name}}" disabled>
		    </div>
		    <div class="col-md-4 mb-3">
		      <label>Apellido</label>
		      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{auth()->user()->lastname}}" disabled>
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
	      	  @foreach($users as $user)
			  <a class="list-group-item list-group-item-action list-group-item-light">
			  	{{$user->name}} 
			  	<button type="button" data-toggle="modal" data-target="#delete" class="btnedit btnedit-outline-danger">Delete</button>
			  </a>
			  @endforeach
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
<!-- Pop up delete -->
@include('elements.pop-up-delete')

@endsection