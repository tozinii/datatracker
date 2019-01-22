@extends('layouts.layoutLogged')
@section('contenido')

<script type="text/javascript">
$(document).ready(function() {
    $('#groups').DataTable();
} );

</script>

<!--<div class="panel panel-default">-->
  <!-- Default panel contents -->
  <h1>Grupos</h1>
  <table id="groups">

  @foreach($groups as $group)
  <thead>
    <tr>
      <th colspan="3"><h2>{{$group->name}}</h2></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach($group->users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->lastname}}</td>
        <td>{{$user->email}}</td>
      </tr>

    @endforeach
  </tbody>
  <!--<div class="panel-heading">Miembros</div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> </li>
  </ul>-->

  @endforeach

  </table>

<!-- </div>-->

<div class="sections">
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <form action="{{route('group.store')}}" method="post">
            @csrf
            <h5 class="card-title">Crea un grupo</h5>
            <p class="card-text">¿No estás en ningún grupo? ¿Estás pensando en crear uno? ¡Aquí tienes la solución! Tan solo debes introducir el nombre del grupo y una etiqueta.</p>
            <input type="text" name="groupName" class="card-text" placeholder="Escriba aqui el nombre del grupo (E.j. Alumnos Zubiri Manteo)">
            <input type="text" name="groupTag" class="card-text" placeholder="Escriba aqui la etiqueta del grupo (E.j. AZM)">
            <button type="submit" class="btnedit2 btnedit-outline-success">Crear</button>
          </form>

        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Unete a un grupo</h5>
          <p class="card-text">¿Ya tienes compañeros con los que estas trabajando?¿Te han invitado a algún grupo? ¡Únete!</p>
          <input type="text" name="groupName" class="card-text" placeholder="Escriba aqui el nombre del grupo al que quiera unirse...">
      <button type="button" class="btnedit2 btnedit-outline-success">Unirse</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
