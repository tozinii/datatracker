@extends('layouts.layoutLogged')
@section('contenido')
<script src="{{asset('assets/js/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('assets/js/statistics/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/js/statistics/Chart.js')}}"></script>
<div class="sensors">
   <h1>Sensor de {{ $sensor->name }} del coche {{ $car->code }}</h1>
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
     <select class="" id="selectfecha">
       <option value="1">Año</option>
       <option value="2">Mes</option>
       <option value="3" selected>Dia</option>
       <option value="4">Hora</option>
     </select>
    <div id="fechas" class="input-append">
      <input type="date" id="fecha">
    </div>

   </form>
   @if($sensorName == 'gps')
   <div id="map"></div>
   @endif
   {{var_dump($jsonSensor)}}
   <canvas id="chartSensor" width="800" height="350"></canvas>
   <script type="text/javascript">
    var datos;
    $(document).ready(function(){

      $('#selectfecha').on('change', function() {
        var fecha = document.getElementById('fecha');
        var selectfecha = document.getElementById('selectfecha');

        switch (selectfecha.value) {
          case '1':
            fecha.type = 'date';
            format = new Date(fecha);
            var year = format.getYear();
            break;
          case '2':
            fecha.type = 'month';
            format = new Date(fecha);
            break;
          case '3':
            fecha.type = 'date';
            format = new Date(fecha);

            break;
          case '4':
            fecha.type = 'time';
            format = new Date(fecha);

            break;
          default:

        }
      });

      $('#fecha').on('change',function(){
        var date = document.getElementById('fecha').value;
        console.log(date);
        var carName = '{{$car->code}}';
        var sensorName = '{{$sensor->name}}';

        $.ajax({
            data:  {carName : carName, sensorName: sensorName,fecha:date} ,
            url:   '/sensorDate',
            type:  'get',
            dataType: 'json',
            success:  function (response) {
              alert(response);
            },
            error: function (error) {
              alert('error: ' + error);
            }
          });
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
   <script>

       var carmap = L.map('map').setView([43.326025, -1.968831], 16);

           L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoiY3luZGEiLCJhIjoiY2pyOTM3b2ZmMDB0dDQzcGZ5ajR4aXJyNiJ9.uQDXCNWklDqzIdAHxI0XqA', {
               attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
               maxZoom: 18,
               id: 'mapbox.streets'
           }).addTo(carmap);
           	<?php for($i = 0; $i < count($coordenadas)-1; $i++) { ?>
   		        var etapa<?php echo $i ?> = [
   		            [<?php echo $coordenadas[$i] ?>],
   		           	[<?php echo $coordenadas[$i+1] ?>]
   		        ];
   		        var polyline<?php echo $i ?> = L.polyline(etapa<?php echo $i ?>, {color: 'red'}).addTo(carmap);
           	<?php

           		}
   		?>

   </script>
</div>

@endsection
