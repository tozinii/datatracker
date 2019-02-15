@extends('layouts.layoutLogged')
@section('contenido')
<script src="{{asset('assets/js/statistics/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/js/statistics/Chart.js')}}"></script>


<div class="container">
   <div class="alert alert-info ttl" role="alert">
	  <h3 class="alert-heading">Bienvenido {{ Auth::user()->name}}</h3>
	  <p>Este es el panel de administrador, aquí podrás ver la cantidad total de usuarios y grupos que actualmente estan registrados en la base de datos.</p>
	</div>
</div>

<div class="card text-white crd-primary mb-3">
  <div class="card-header">Usuarios</div>
  <div class="card-body">
    <p class="card-text text-white">Hay {{$users}} en la base de datos.</p>
  </div>
</div>

<canvas id="cars" width="800" height="350"></canvas>

<canvas id="mensajes" width="800" height="350"></canvas>

<script type="text/javascript">
  var chartCars = document.getElementById("cars").getContext('2d');
  var chartmensajes = document.getElementById("mensajes").getContext('2d');
  var cars = new Chart(chartCars, {
      type: 'line',
      data: {
          labels: [
            @foreach($cars as $car)
              '{{$car->fecha}}',
            @endforeach
          ],
          datasets: [{
              label: 'Registros de coches',
              data: [
                @foreach($cars as $car)
                  '{{$car->contador}}',
                @endforeach
              ],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 3,
              fill:false
          }]
      },
      options: {
        responsive: true,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });


  var mensajes = new Chart(chartmensajes, {
      type: 'bar',
      data: {
          labels: [
            @foreach($mensajes as $car)
              '{{$car->fecha}}',
            @endforeach
          ],
          datasets: [{
              label: 'Registros de mensajes',
              data: [
                @foreach($mensajes as $car)
                  '{{$car->contador}}',
                @endforeach
              ],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 3,
              fill:false
          }]
      },
      options: {
        responsive: true,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });

</script>

@endsection
