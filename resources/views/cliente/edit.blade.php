@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($item,['route'=>['item.update',$item],'method'=>'PUT','files' => true])!!}
			@include('item.forms.form_item')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		{!!Form::open(['route'=>['item.destroy', $item], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection