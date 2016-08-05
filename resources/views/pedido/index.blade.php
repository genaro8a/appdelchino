@extends('layouts.admin')
@section('content')
@include('cliente.modal')
<table class="table">
    <thead>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Cedula</th>
    <th>Direccion</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Operaciones</th>
    </thead>
    <tbody id="datos"> </tbody>
</table>
@endsection
@section('scripts')
{!!Html::script('js/clientes/script-leer.js')!!}
@endsection