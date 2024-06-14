<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
{
    // Obtener todas las inscripciones y cargar la relación 'curso'
    $inscripciones = Inscripcion::with('curso')->orderBy('created_at', 'DESC')->get();
    $inscripciones = Inscripcion::with('curso')->orderBy('created_at', 'DESC')->get();


    return view('inscripcion.index', compact('inscripciones'));
}


    public function store(Request $request)
    {
        // Proceso de inscripción
        $curso = cursos::findOrFail($request->curso_id);
        $user = auth()->user();
        
        // Crea una nueva inscripción
        $inscripcion = new Inscripcion();
        $inscripcion->user_id = $user->id;
        $inscripcion->curso_id = $curso->id;
        $inscripcion->save();
        
        return redirect()->route('inscripcion')->with('success', 'Inscripción realizada con éxito');

    }
}
