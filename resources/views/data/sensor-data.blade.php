@extends('layouts.layoutPrincipal')

@section('contenido')
<section>
  <table>
    <tr>
      <th>Tipo de dato</th>
      <th>Dato</th>
    </tr>
  <th></th>
  @foreach($sensorsData as $dataRow)
  <tr>
    <td>{{ $dataRow->data_type }}</td>
    <td>{{ $dataRow->data }}</td>
  </tr>
  @endforeach
  </table>
</section>
@endsection
