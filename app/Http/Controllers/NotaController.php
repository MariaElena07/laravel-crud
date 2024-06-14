<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\User;
use App\Models\cursos;
use Illuminate\Support\Facades\Validator;

class NotaController extends Controller
{
    // public function index()
    // {
    //        $notas = Nota::orderBy('created_at', 'DESC')->get();
    //       return view('notas.alumnos', compact('notas'));
    // }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de notas
    }
    public function alumnos()
    { 
        $notas = Nota::orderBy('created_at', 'DESC')->get();
        $users = User::where('type', 0)->get();
        $cursos = cursos::all();
        return view('notas.alumnos', compact('notas' , 'users', 'cursos'));
    }


    public function save(Request $request)
    {
        // Validar los datos recibidos del formulario
        Validator::make($request->all(), [
            'user_id' => 'required',
            'cursos_id' => 'required',
            'nota1' => 'required|numeric|between:1,20',
            'nota2' => 'required|numeric|between:1,20',
            'nota3' => 'required|numeric|between:1,20'
        ])->validate();
        
        // Crear una nueva instancia de Nota con los datos del formulario
        nota::create([
            'user_id' => $request->user_id,
            'cursos_id' => $request->cursos_id,
            'nota1' => $request->nota1,
            'nota2' => $request->nota2,
            'nota3' => $request->nota3,
        ]);
        return redirect()->route('admin/notas')->with('success', 'Nota agregada correctamente');
    }

    public function show(string $nota)
    {
        // Lógica para mostrar una nota específica
    }

    public function edit(string $id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.edit', compact('nota'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nota1' => 'required|numeric|between:1,20',
            'nota2' => 'required|numeric|between:1,20',
            'nota3' => 'required|numeric|between:1,20'
        ]);
    
        $nota = Nota::findOrFail($id);
        $nota->nota1 = $request->nota1;
        $nota->nota2 = $request->nota2;
        $nota->nota3 = $request->nota3;
        $nota->save();
    
        return redirect()->route('admin/notas')->with('success', 'notas actualizado correctamente');
    }

    public function destroy(string $id)
    {
       // Buscar la nota por su ID y eliminarla
       $notas = Nota::findOrFail($id);
        
         $notas->delete();

        return redirect()->route('admin/notas')->with('success', 'Nota eliminada correctamente');
    }
}
