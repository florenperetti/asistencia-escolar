@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ciclo Lectivo {{$ciclo->year}}</div>

                <div class="panel-body">
                    @if (count($grados) > 0)
                    <ul>
                        @foreach($grados as $grado)
                        <li>{{ link_to_route('grado.show' , $title = $grado->nombre, $parameters = $grado->id) }} | <a href="/grado/{{$grado->id}}/asistencia">Asistencias</a></li>
                        @endforeach
                        <li>{{ link_to_route('grado.create' , $title = 'Nuevo grado' ) }}</li>
                    </ul>
                    @else
                        <p>No hay grados registrados. {{ link_to_route('grado.create' , $title = 'Crear un grado ahora' ) }}.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
