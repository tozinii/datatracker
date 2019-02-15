@extends('layouts.layoutData')

@section('contenido')
<section>
  <table>
    <tr>
      <th>Tipo de dato</th>
      <th>Valor</th>
      <th>Fecha</th>
    </tr>
  <th></th>
  @foreach($carsData as $dataRow)
  <tr>
    <td>{{ $dataRow->sensor_name }}</td>
    <td>{{ $dataRow->data }}</td>
    <td>{{ $dataRow->created_at }}</td>
  </tr>
  @endforeach
  </table>
</section>
@endsection
