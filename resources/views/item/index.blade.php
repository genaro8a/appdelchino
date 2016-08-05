@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Precio</th>
		<th>Categoria</th>
		<th>Imagen</th>
		<th>Operaciones</th>
	</thead>
	@foreach($items as $item)
	<tbody>
		<td>{{$item->nombre_item}}</td>
		<td>{{$item->descripcion}}</td>
		<td>{{$item->precio}}</td>
		<td>{{$item->categoria->nombre_categoria}}</td>
		<td>
			<img src="items/{{$item->path}}"  style="width:100px;" style="height:100px;"/>
		</td>
		<td>
			{!!link_to_route('item.edit', $title = 'Editar', $parameters = $item, $attributes = ['class'=>'btn btn-primary'])!!}
		</td>
	</tbody>
	@endforeach
</table>
@endsection