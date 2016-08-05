<div class="form-group">
	{!!Form::label('Nombre','Nombre:')!!}
	{!!Form::text('nombre_cliente',null,['id'=>'nombre_cliente','class'=>'form-control', 'placeholder'=>'Ingrese su nombre'])!!}
</div>
<div class="form-group">
	{!!Form::label('Apellido','Apellido:')!!}
	{!!Form::text('apellido_cliente',null,['id'=>'apellido_cliente','class'=>'form-control', 'placeholder'=>'Ingrese su apellido'])!!}
</div>
<div class="form-group">
	{!!Form::label('Cedula','cedula:')!!}
	{!!Form::text('cedula_ruc',null,['id'=>'cedula_ruc','class'=>'form-control', 'placeholder'=>'Ingresa el numero de cedula'])!!}
</div>

<div class="form-group">
	{!!Form::label('Direccion','direccion:')!!}
	{!!Form::text('direccion',null,['id'=>'direccion','class'=>'form-control', 'placeholder'=>'Ingresa su direccion'])!!}
</div>
<div class="form-group">
	{!!Form::label('Telefono','Telefono:')!!}
	{!!Form::text('telefono',null,['id'=>'telefono','class'=>'form-control', 'placeholder'=>'Ingrese su numero de celular o telefono'])!!}
</div>
