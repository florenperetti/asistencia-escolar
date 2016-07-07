<div class="form-group">
	{!! Form::label('year', 'Año:') !!}
	{!! Form::text('year', Carbon\Carbon::now()->year, ['class'=>'form-control']) !!}
</div>
{!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}