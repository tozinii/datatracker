@extends('layouts.layoutLogged')
@section('contenido')

<section class="car-list-content">
	<!-- Car data -->
  @if(!empty($cars))
  	<div class="sections">
      <div class="tab-content">
  	    	<div id="car-list" class="tab-pane fade in active">
  		      <h3>Coches</h3>
            @foreach($cars as $car)
            <p>{{ $car->code }}</p>
            @endforeach

  		      <!--<form>
  		      	<label>Bateria</label>
  		      	<input type="text" name="bateria" value="Le queda bateria para 3 horas..." disabled="disabled">
  		      	<label>Velocidad</label>
  		      	<input type="text" name="velocidad" value="El coche esta yendo a 40km/h..." disabled="disabled">
  		      	<label>Caballos</label>
  		      	<input type="text" name="caballos" value="La potencia de este coche es de no se cuantos caballos" disabled="disabled">
  		      	<label>Gasolina</label>
  		      	<input type="text" name="gasolina" value="Este coche tiene un deposito de gasolina de 20 litros" disabled="disabled">
  		      	<label>GPS</label>
  		      	<input type="text" name="maxMarcas" value="Esta en la tercera curva..." disabled="disabled">
  		      </form>-->
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
