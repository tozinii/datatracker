@extends('layouts.layoutLogged')
@section('contenido')
<h2>Crear un evento</h2>
<form id="create-event" class="needs-validation profile-data" novalidate enctype="multipart/form-data" method="post" action="{{ route('createEvent')}}">
  @csrf
    <div class="col-md-3 mb-3">
      <label>Nombre</label>
      <input id="create-event-name" type="text" class="form-control" name="name" placeholder="Nombre" />
      <span id="create-event-name-error-text" class="form-error">Introduce un nombre válido</span>
    </div>
    <div class="col-md-3 mb-3">
      <label>Ubicación</label>
      <input type="text" class="form-control" id="create-event-location" name="location" placeholder="Ubicación" />
    </div>
    <div class="col-md-3 mb-3">
      <label>Fecha de inicio</label>
      <input id="create-event-start-date" type="date" class="form-control" name="startDate" placeholder="Fecha de inicio" />
      <span id="create-event-start-date-error-text" class="form-error">Elige una fecha</span>
    </div>
    <div class="col-md-3 mb-3">
      <label>Fecha de fin</label>
      <input id="create-event-finish-date" type="date" class="form-control" name="finishDdate" placeholder="Fecha de fin" />
      <span id="create-event-finish-date-error-text" class="form-error">Elige una fecha</span>
    </div>
    <br>
    <div class="col-md-12 mb-3">
      <button class="btn btn-primary" type="submit" id="submitCreateEvent">Crear</button>
    </div>
</form>
<h2>Editar un evento</h2>
<h2>Eliminar un evento</h2>
@endsection
