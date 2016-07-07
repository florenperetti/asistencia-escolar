<div class="form-group">
	{!! Form::label('nombre', 'Nombre:') !!}
	{!! Form::text('nombre', null, ['class'=>'form-control']) !!}
	{!! Form::hidden('ciclo_id', $ciclo->id) !!}
</div>
{!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}