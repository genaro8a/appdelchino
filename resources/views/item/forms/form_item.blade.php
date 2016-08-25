<div class="form-group">
	{!!Form::label('Nombre','Nombre:')!!}
	{!!Form::text('nombre_item',null,['class'=>'form-control', 'placeholder'=>'Ingrese nombre del Item'])!!}
</div>
<div class="form-group">
	{!!Form::label('Descripcion','Descripcion:')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control', 'placeholder'=>'Ingrese la descripcion del item'])!!}
</div>
<div class="form-group">
	{!!Form::label('Precio','Precio:')!!}
	{!!Form::text('precio',null,['class'=>'form-control', 'placeholder'=>'Ingresa el precio'])!!}
</div>

<div class="form-group">
	{!!Form::label('Categoria','categoria:')!!}
	{!!Form::select('categoria_id', $categorias)!!}
</div>
<div class="form-group">
	{!!Form::label('Imagen','Imagen:')!!}
	{!!Form::file('path')!!}
</div>