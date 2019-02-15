@extends('layouts.layoutLogged')
@section('contenido')


<div>
	<ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#userList">Usuarios</a></li>
	    <li><a data-toggle="tab" href="#bannedList">Banned users</a></li>
	</ul>

	<div class="tab-content">
		<div id="userList" class="tab-pane fade in active">
			<div class="list-group">

				<table id="list-users-table" class="table">
			    <thead>
			      <tr>
								<th>Usuario</th>
								<th>Acciones</th>
			      </tr>
			    </thead>
			    <tbody>

						@foreach($users as $user)
							<tr>
								<td><span>{{$user->name}} &#8212; {{$user->email}}</span></td>
								<td class="text-centered"><button type="button" data-toggle="modal" data-target="#ban{{$user->id}}" class="btnedit btnedit-outline-danger list-users-ban-button">Ban</button></td>
								@include('elements.pop-up-ban')
							</tr>
						@endforeach

			    </tbody>
			  </table>

			</div>
		</div>
  	<div id="bannedList" class="tab-pane fade">

			<div class="list-group">

				<table id="banned-users-table" class="table">
			    <thead>
			      <tr>
								<th>Usuario</th>
								<th>Acciones</th>
			      </tr>
			    </thead>
			    <tbody>

						@foreach($banneds as $banned)
							<tr>
								<td><span>{{$banned->name}}</span></td>
								<td class="text-centered">
									<button type="button" data-toggle="modal" data-target="#delete{{$banned->id}}" class="btnedit btnedit-outline-danger list-users-banned-button">Delete</button>
					        <button type="button" data-toggle="modal" data-target="#restore{{$banned->id}}" class="btnedit btnedit-outline-success list-users-banned-button">Restore</button>
								</td>
								@include('elements.pop-up-delete')
								@include('elements.pop-up-restore')
							</tr>
						@endforeach

			    </tbody>
			  </table>

			</div>

    </div>

  </div>
</div>
<!-- Pop up delete -->

@endsection
