@extends('layouts.app')

@section('content')
<div class="container">
	@include('alerts.success')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="form-group">
				<div class="row acciones">
					<div class="col-md-4">
						<div class="row">
							<button id="btn-ver" class="btn btn-info btn-block">Ver alumnos</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<button id="btn-asignar" class="btn btn-danger btn-block">Asignar existentes</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">
							<button id="btn-nuevo" class="btn btn-success btn-block">Nuevo alumno</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="display:none;" class="asignar col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">Asignar alumnos a {{$grado->nombre}}</div>

							<div class="panel-body">
								{!! Form::label('autoAlumnos', 'Buscar alumnos') !!}
								{!! Form::text('autoAlumnos', null, ['class' => 'form-control', 'id'=>'autoAlumnos']) !!}
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">Confirmar</div>

							<div class="panel-body">
								<form id="confirmar">
								</form>
							</div>
							<div class="panel-footer">
								<button id="btn-confirmar" class="btn btn-success pull-right">Confirmar</button>									
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="display:none;" class="nuevo col-md-10 col-md-offset-1">
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">Nuevo alumno</div>

					<div class="panel-body">
						{!! Form::open(['route'=>'alumno.store','method'=>'POST']) !!}
							{!! Form::hidden('grado_id', $grado->id) !!}
							@include('alumnos.form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		<div class="lista col-md-10 col-md-offset-1">
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">Lista de alumnos</div>
					<div class="panel-body">
						<ul>
						@foreach($grado->alumnos as $alumno)
							<li>{{$alumno->nombreCompleto}}</li>
						@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script> var idGrado = {{$grado->id}}; </script>
	{!!Html::script('js/vendor/jquery-ui.min.js')!!}
	{!!Html::script('js/grado.js')!!}
@endsection