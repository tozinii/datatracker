@extends('layouts.layoutLogged')
@section('contenido')


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
			  	<button type="button" data-toggle="modal" data-target="#delete{{$user->id}}" class="btnedit btnedit-outline-danger">Delete</button>
			  </a>
				@include('elements.pop-up-delete')
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

@endsection
