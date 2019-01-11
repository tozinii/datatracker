@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<!-- User data -->
	<div class="sections">
		<h2>Información de perfil:</h2>
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

		<div class="col-md-12">
			<a id="change-password-button" class="btn btn-primary button_12  wow fadeInUp js-scroll-trigger"><span class="skew_14">Cambiar contraseña</span></a>
		</div>
		<div id="change-password-element" class="col-md-12" style="display:none">
			<h2>Cambiar contraseña:</h2>
			<form id="form-change-password" method="POST" action="{{ route('changePassword') }}">
				@csrf
				<label>Contraseña actual: </label>
				<input id="old-password" type="password" name="old-password" placeholder="Contraseña actual" required /><br/>
				<span id="old-password-error-text" class="form-error">Introduce una contraseña válida</span>
				<label>Nueva contraseña: </label>
				<input id="new-password" type="password" name="new-password" placeholder="Nueva contraseña" required />
				<span id="new-password-error-text" class="form-error">La contraseña debe tener 8 carácteres o más</span>
				<label>Repite la nueva contraseña: </label>
				<input id="repeat-new-password" type="password" name="repeat-new-password" placeholder="Repite la nueva contraseña" required />
				@if(Session::has('changePasswordError'))
					<span class="form-error-displayed">{{ Session::get('changePasswordError') }}</span>
				@endif
				<span id="repeat-new-password-error-text" class="form-error">Las contraseñas no coinciden</span>
				<button id="change-password-submit" type="submit" class="btn btn-primary">Guardar</button>
			</form>

		</div>


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
