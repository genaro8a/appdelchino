@extends('layouts.admin')
	@include('alerts.success')
	@section('content')
	<table class="table">
		<thead>
			<th>Nombre</th>			
		</thead>
		@foreach($categorias as $categoria)
			<tbody>
				<td>{{$categoria->nombre_categoria}}</td>				
				<td>
					{!!link_to_route('categoria.edit', $title = 'Editar', $parameters = $categoria, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>
			</tbody>
		@endforeach
	</table>
	{!!$categorias->render()!!}
	@endsection