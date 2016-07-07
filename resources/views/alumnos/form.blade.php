<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('nombre', 'Nombre:') !!}
			{!! Form::text('nombre', null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('apellido', 'Apellido:') !!}
			{!! Form::text('apellido', null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="form-group">
	{!! Form::label('genero', 'Género:') !!}
	<div class="radio">
		<label>
			{!! Form::radio('genero', 0, true); !!}
			Hombre
		</label>
	</div>
	<div class="radio">
		<label>
			{!! Form::radio('genero', 1, false); !!}
			Mujer
		</label>
	</div>
</div>

{!! Form::submit('Registrar', ['class'=>'btn btn-success pull-right']) !!}