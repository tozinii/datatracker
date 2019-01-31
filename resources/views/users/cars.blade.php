@extends('layouts.layoutLogged')
@section('contenido')

<section class="car-list-content">
	<!-- Car data -->
  @if(!empty($cars))
  	<div class="sections">
      <div class="tab-content">
  	    	<div id="car-list" class="tab-pane fade in active">
  		      <h3>Coches</h3>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Nº</th>
                  <th scope="col">Coche</th>
                  <th scope="col">Sensores</th>
                </tr>
              </thead>
              <tbody>

                @foreach($cars as $car)
                <tr>
                  <th>{{ $car->id }}</th>
                  <td>{{ $car->code }}</td>
                  <td>
                    @foreach($carsSensorsNames[$car->id] as $sensorName)
                    <a href="{{ route('sensorInfo',[$car->code,$sensorName]) }}" class="button">{{ $sensorName }}</a>
                    @endforeach
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>

  		    </div>
  	  </div>
  	</div>
  @else
  <div class="sections">
    <div class="tab-content">
        <div id="car-list" class="tab-pane fade in active">
          <h3>Coches</h3>
          <p> No tienes ningún coche. Accede al menu de kits para comprar uno.</p>
        </div>
    </div>
  </div>
  @endif
</section>

@endsection
