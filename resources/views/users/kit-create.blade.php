@extends('layouts.layoutLogged')
@section('contenido')


<section class="car-list-content">
	<!-- Car data -->
	<div class="sections">
		@if(Session::has('confirmation'))
    <div class="alert alert-success mt-2" role="alert">{{Session::get('confirmation')}}</div>
    @endif
		<h2>Añadir Kit</h2>
		<form action="{{route('kits.store')}}" method="post">
			@csrf
      <label>Nombre</label>
      <input type="text" name="nombre" placeholder="Nombre del kit">
			@if ($errors->has('nombre'))
				 <span class="invalid-feedback" role="alert">
						 <strong>{{ $errors->first('nombre') }}</strong>
				 </span>
		 	@endif
      <label for="exampleInputPassword1">Numero de serie</label>
      <input type="text" name="num_serie" placeholder="Num_serie">
			<button type="submit" class="btn btn-primary">Añadir</button>
    </form>
	</div>
	</div>
</section>














@endsection
