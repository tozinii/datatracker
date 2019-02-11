@extends('layouts.layoutLogged')
@section('contenido')


<section class="car-list-content">
	<!-- Car data -->
	<div class="sections">
		<h2>Listado de Kits</h2>
    <a href="{{route('kits.create')}}" class="btnedit3 btnedit-outline-success btnedit-size" style="margin-left:0;">Crear Kit</a>
		<table class="table table-hover">
		  <thead>
		    <tr>
					<th scope="col">Nº serie</th>
		      <th scope="col">Nombre</th>
					<th scope="col">Opciones</th>
		    </tr>
		  </thead>
		  <tbody>
				@foreach($kits as $kit)
			    <tr>
				  <td>{{$kit->num_serie}}</td>
			      <td>{{$kit->name}}</td>
			      <td>
              <a href="{{route('kits.edit',$kit->id)}}" class="btnedit btnedit-outline-info btnedit-size">Editar</a>
              <a href="{{route('kits.edit',$kit->id)}}" class="btnedit btnedit-outline-danger btnedit-size">Eliminar</a>
            </td>
			    </tr>
				@endforeach
		  </tbody>
		</table>
	</div>
	</div>
</section>














@endsection
