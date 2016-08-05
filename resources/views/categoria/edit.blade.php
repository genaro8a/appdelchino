@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($categoria,['route'=>['categoria.update',$categoria],'method'=>'PUT'])!!}
			@include('categoria.forms.from_cat')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		<br>
		{!!Form::open(['route'=>['categoria.destroy', $categoria], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection