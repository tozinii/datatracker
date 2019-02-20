@extends('layouts.layoutLogged')
@section('contenido')
<script src="{{asset('assets/js/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('assets/js/statistics/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/js/statistics/Chart.js')}}"></script>
<div class="sensors">
   <h1>{{ ucfirst($sensor->name) }} del coche {{ $car->code }}</h1>
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

   <form action="" method="post">
     <select class="fechas" id="selectfecha">
       <option value="Año">Año</option>
       <option value="Mes">Mes</option>
       <option value="Dia">Dia</option>
       <option value="Hora">Hora</option>
     </select>
    <div id="fechas" class="input-append">
      <input type="date" id="fecha" class="fechas">
    </div>

   </form>
   @if($sensor->name == 'gps')
    <div id="map"></div>
   @else

    <canvas id="chartSensor" width="800" height="350"></canvas>
   @endif
   <script type="text/javascript">

    $(document).ready(function(){

      $('#selectfecha').on('change', function() {
        var fecha = document.getElementById('fecha');
        selectfecha = document.getElementById('selectfecha');

        switch (selectfecha.value) {
          case 'Año':
            fecha.type = 'date';
            format = new Date(fecha);
            var year = format.getYear();
            break;
          case 'Mes':
            fecha.type = 'month';
            format = new Date(fecha);
            break;
          case 'Dia':
            fecha.type = 'date';
            format = new Date(fecha);

            break;
          case 'Hora':
            fecha.type = 'time';
            format = new Date(fecha);

            break;
          default:

        }
      });
      $('#fecha').on('change',function(){
        var date = document.getElementById('fecha');
        var tipo = date.type;
        var valor = date.value;
        var nombreSelect = document.getElementById('selectfecha').value;
        var carName = '{{$car->code}}';
        var sensorName = '{{$sensor->name}}';

        $.ajax({
               async: false,
               data:  {carName : carName, sensorName: sensorName,fecha:valor,tipo:tipo,nombreSelect:nombreSelect} ,
               url:   '{{route("sensordate")}}',
               type:  'get',
               dataType: 'json',
               success:  function (response) {
                  grafico(response);
            },
            error: function (error) {
              alert('error: ' + error);
            }
             });
      });



    });
    function grafico(sensorInfo) {
      var ctx = document.getElementById("chartSensor").getContext('2d');
      var datos = [];
      var fechas = [];
      var titulo = sensorInfo[0].titulo;
      for(var i in sensorInfo){
        datos.push(sensorInfo[i].dato);
        fechas.push(sensorInfo[i].fecha);
      }
      var myChart = new Chart(ctx, {

          type: 'line',
          data: {
              labels: fechas,
              datasets: [{
                  label: '{{$sensor->name}} de '+titulo,
                  data: datos,
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
    }


   </script>
   <script>

       var carmap = L.map('map').setView([43.326025, -1.968831], 16);

           L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=sk.eyJ1IjoiY3luZGEiLCJhIjoiY2pyOTM3b2ZmMDB0dDQzcGZ5ajR4aXJyNiJ9.uQDXCNWklDqzIdAHxI0XqA', {
               attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
               maxZoom: 18,
               id: 'mapbox.streets'
           }).addTo(carmap);
           @if($sensor->name == 'gps')
              @php
                $coordenadas = [];
              @endphp
            @foreach($sensorInfo as $info)
              array_push($coordenadas,$info->data);
            @endforeach

            <?php for($i = 0; $i < count($coordenadas)-1; $i++) { ?>
              var etapa<?php echo $i ?> = [
                  [<?php echo $coordenadas[$i] ?>],
                   [<?php echo $coordenadas[$i+1] ?>]
              ];
              var polyline<?php echo $i ?> = L.polyline(etapa<?php echo $i ?>, {color: 'red'}).addTo(carmap);
            <?php

              }
            ?>
          @endif


   </script>
</div>

@endsection
