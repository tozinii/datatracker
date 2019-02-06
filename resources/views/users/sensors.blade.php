@extends('layouts.layoutLogged')
@section('contenido')
<script src="{{asset('assets/js/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('assets/js/statistics/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/js/statistics/Chart.js')}}"></script>
<div class="sensors">
   <h1>Sensor de {{ $sensor->name }} del coche {{ $carName }}</h1>
   <table class="table table-striped">
     <thead>
       <tr>
         <th scope="col">Valor</th>
         <th scope="col">Fecha</th>
       </tr>
     </thead>
     <tbody>

       @foreach($sensorInfo as $info)
       <tr>
         <td>{{ $info->data }} {{$sensor->unidad}}</td>
         <td>{{ $info->created_at }}</td>
       </tr>
       @endforeach
     </tbody>
   </table>

   <form class="" action="" method="post">
     <select class="" id="fecha">
       <option value="año">Año</option>
       <option value="mes">Mes</option>
       <option value="semana">Semana</option>
       <option value="dia" selected>Dia</option>
       <option value="hora">Hora</option>
     </select>
    <div id="fechas" class="input-append">
      <input type="text" name="" data-format="dd/MM/yyyy hh:mm:ss">
      <span class="add-on">
       <i data-time-icon="icon-time" data-date-icon="icon-calendar">
       </i>
      </span>
    </div>

   </form>
   <canvas id="chartSensor" width="800" height="350"></canvas>

   <script type="text/javascript">
    var fecha = document.getElementById('fecha').value;
    $(document).ready(function(){

      $('#fecha').on('change', function() {
        alert( this.value );
      });

      $('#fechas').datetimepicker({
      pickDate: false
    });

    });
     var ctx = document.getElementById("chartSensor").getContext('2d');
     var myChart = new Chart(ctx, {
         type: 'line',
         data: {
             labels: [
               @foreach($sensorInfo as $info)
                 '{{$info->created_at}}',
               @endforeach
             ],
             datasets: [{
                 label: 'Valores de cada '+fecha,
                 data: [
                   @foreach($sensorInfo as $info)
                     '{{$info->data}}',
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
                     display: true,
                     scaleLabel: {
                       display: true,
                       labelString: '{{$sensor->unidad}}'
                     },
                     ticks: {
                         beginAtZero:true
                     }
                 }],
                 xAxes: [{
                     scaleLabel: {
                       display: true,
                       labelString: 'Fecha'
                     },
                     ticks: {
                         beginAtZero:true
                     }
                 }]
             }
         }
     });

   </script>
</div>

@endsection
