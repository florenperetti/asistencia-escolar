@extends('layouts.app')

@section('content')
<div class="container">
	@include('alerts.success')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Alumno</div>

				<div class="panel-body">
					@include('alerts.errors')
					{!! Form::open(['route'=>'alumno.store','method'=>'POST']) !!}
						@include('alumnos.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Alumnos</div>

				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Género</th>
								<th>Operaciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alumnos as $alumno)
							<tr>
								<td>{{ $alumno->nombre }}</td>
								<td>{{ $alumno->apellido }}</td>
								<td>{{ $alumno->genero }}</td>
								<td>
									{{ link_to_route( 'alumno.edit', $title = 'Editar', $parameter = $alumno, $attributes = [ 'class' => 'btn btn-primary' ] ) }}
									<button class="btn btn-danger" value="{{$alumno->id}}" >Eliminar</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection