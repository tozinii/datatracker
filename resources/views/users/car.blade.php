@extends('layouts.layoutLogged')
@section('contenido')

<section class="profile-content">
	<div>
		<div>
	    	<div id="sensores">
		      <h3>Datos de los sensores</h3>
						@foreach($car->kit->sensors as $sensor)

						<a href="{{ route('sensorInfo',[$car->code, $sensor->id]) }}" class="sensor-info-button sensor-info-button--isi sensor-info-button--text-thick sensor-info-button--text-upper">
							<span>{{ ucfirst($sensor->name) }}</span>
						</a>

						@endforeach
		    </div>
	  </div>
	</div>
	</div>
</section>

@endsection
