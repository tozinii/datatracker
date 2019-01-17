@extends('layouts.layoutLogged')
@section('contenido')
  <script src="{{asset('assets/js/statistics/Chart.bundle.js')}}"></script>
  <script src="{{asset('assets/js/statistics/Chart.js')}}"></script>
  <h2>Registro de usuarios</h2>
  <canvas id="grafRegisterUsers" width="800" height="350"></canvas>

  <script type="text/javascript">
  var ctx = document.getElementById("grafRegisterUsers").getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [
            @foreach($users as $user)
              '{{$user->fecha}}',
            @endforeach
          ],
          datasets: [{
              label: 'Registros de cada mes',
              data: [
                 @foreach($users as $user)
                      {{$user}},
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
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
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
