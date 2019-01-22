@extends('layouts.layoutLogged')
@section('contenido')


<div>
	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#userList">Usuarios</a></li>
	    <li><a data-toggle="tab" href="#bannedList">Banned users</a></li>
	    <li><a data-toggle="tab" href="#groupList">Grupos</a></li>
	</ul>

	<div class="tab-content">
    	<div id="userList" class="tab-pane fade in active">
	      <div class="list-group">
	      	  @foreach($users as $user)
			  <a class="list-group-item list-group-item-action list-group-item-light">
			  	<p class="userList">
			  		{{$user->name}}
			  	</p>
			  	<button type="button" data-toggle="modal" data-target="#ban{{$user->id}}" class="btnedit btnedit-outline-danger">Ban</button>
			  </a>
				@include('elements.pop-up-ban')
			  @endforeach
		  </div>
	    </div>
    	<div id="bannedList" class="tab-pane fade">
	      <div class="list-group">
	      	  @foreach($banneds as $banned)
			  <a class="list-group-item list-group-item-action list-group-item-light">
			  	<p>
			  		{{$banned->name}}
			  	</p>
			  	<button type="button" data-toggle="modal" data-target="#delete{{$banned->id}}" class="btnedit btnedit-outline-danger">Delete</button>
              	<button type="button" data-toggle="modal" data-target="#restore{{$banned->id}}" class="btnedit btnedit-outline-success">Restore</button>
			  </a>
			  @include('elements.pop-up-delete')
				@include('elements.pop-up-restore')
				

			  @endforeach
		  </div>
	    </div>
    	<div id="groupList" class="tab-pane fade">
	      <div class="list-group">
	      	  @foreach($groups as $group)
			  <a class="list-group-item list-group-item-action list-group-item-light">
			  	{{$group->name}}
			  </a>			  
			  @endforeach
			</div>
    </div>
  </div>
</div>
<!-- Pop up delete -->

@endsection
