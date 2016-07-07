<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\AlumnoCreateRequest;
use App\Alumno;
use App\Grado;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoCreateRequest $request)
    {
        if(isset($request->grado_id)) {
            $alumno = Alumno::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'genero' => $request->genero
                ]);
            
            Grado::find($request->grado_id)->alumnos()->attach($alumno->id);

            return redirect('/grado/'.$request->grado_id)->with('success', 'Alumno registrado correctamente.');
        } else {
            Alumno::create($request->all());
            return redirect('/alumno')->with('success', 'Alumno registrado correctamente.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoCreateRequest $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return redirect('/alumno')->with('success', 'Alumno editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAlumnos(Request $request) {
        $term = '%'.$request->term.'%';
        $alumnos = Alumno::where('nombre', 'like', $term)->orwhere('apellido', 'like', $term)->get();
        $result = [];

        foreach ($alumnos as $key => $alu) {
            $nombreCompleto = $alu['nombre']." ".$alu['apellido'];
            $nombreCompleto = Str::title($nombreCompleto);
            $result[] = [ "value" => $nombreCompleto, "label" => $nombreCompleto, "id" => $alu['id'] ];
        }
        return json_encode($result);
    }
}
