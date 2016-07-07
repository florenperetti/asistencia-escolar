@extends('layouts.app')

@section('content')
<div class="container">
	@include('alerts.success')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$grado->nombre}}</div>

				<div class="panel-body">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection