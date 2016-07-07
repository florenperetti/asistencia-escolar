@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> - {{$grado->nombre}}</div>

                <div class="panel-body lista-asistencia">
                	@foreach($grado->alumnos as $alumno)
                		<div class="asistencia">
                			<span class="select pull-left">
								<label class="switch">
									<input type="checkbox" name="asistencia" value="{{$alumno->id}}" checked>
									<div class="slider round"></div>
								</label>
							</span>
                			<span class="alumno pull-left">{{$alumno->nombreCompleto}}</span>
                		</div>
                	@endforeach

                    <button class="btn btn-succesa">Confirmar Asistencias</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
