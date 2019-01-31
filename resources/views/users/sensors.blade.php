@extends('layouts.layoutLogged')
@section('contenido')

<div class="sensors">
   <h1>Sensor de {{ $sensorName }} del coche {{ $carName }}</h1>
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
         <td>{{ $info->data }}</td>
         <td>{{ $info->created_at }}</td>
       </tr>
       @endforeach

     </tbody>
   </table>
</div>

@endsection
