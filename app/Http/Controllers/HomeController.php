<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Ciclo;
use App\Grado;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Ciclo::count() == 0) {
            return view('ciclos.create');
        } else {
            $ciclo = Ciclo::where('actual', '=', true)->first();
            $grados = Grado::where('ciclo_id', '=', $ciclo->id)->get();
            return view('home',compact('ciclo', 'grados'));
        }
    }
}
