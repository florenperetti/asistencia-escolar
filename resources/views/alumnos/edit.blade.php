@extends('layouts.app')

@section('content')
<div class="container">
	@include('alerts.success')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Alumno</div>

				<div class="panel-body">
					@include('alerts.errors')
					{!! Form::model($alumno, ['route'=>['alumno.update',$alumno],'method'=>'PUT']) !!}
						@include('alumnos.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection