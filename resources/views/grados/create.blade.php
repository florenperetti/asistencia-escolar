@extends('layouts.app')

@section('content')
<div class="container">
	@include('alerts.success')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Grado</div>

				<div class="panel-body">
					@include('alerts.errors')
					{!! Form::open(['route'=>'grado.store','method'=>'POST']) !!}
						@include('grados.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection