@extends('layouts.admin')
@section('content')
{!!Form::open()!!}
<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
	<strong> Cliente Agregado Correctamente.</strong>
</div>
<div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
	<strong id="msj"> fallo en la peticion </strong>
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

@include('pedido.forms.ajax')
<div class="form-group">
	{!!Form::label('correo','correo:')!!}
	{!!Form::text('correo',null,['id'=>'correo','class'=>'form-control', 'placeholder'=>'Ingresa su direccion de correo'])!!}
</div>
<div class="form-group">
	{!!Form::label('password','Contraseña:')!!}
	{!!Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
{!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
{!!Form::close()!!}
@endsection
@section('scripts')
{!!Html::script('js/clientes/script-crear.js')!!}
@endsection