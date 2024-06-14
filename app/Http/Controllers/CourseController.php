<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\cursos;
 

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursoslist = cursos::orderBy('created_at', 'DESC')->get();
        return view('cursos.index', compact('cursoslist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'nombre_curso' => 'required',
            'precio_curso' => 'required',
            'dateCurso' => 'required'
        ])->validate();
 
        cursos::create([
            'nombre_curso' => $request->nombre_curso,
            'precio_curso' => $request->precio_curso, 
            'dateCurso' => $request->dateCurso
        ]);
        return redirect()->route('admin/cursos')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = cursos::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_curso' => 'required|max:255',
            'precio_curso' => 'required|numeric',
            'dateCurso' => 'required',
        ]);
    
        $curso = cursos::findOrFail($id);
        $curso->nombre_curso = $request->nombre_curso;
        $curso->precio_curso = $request->precio_curso;
        $curso->dateCurso = $request->dateCurso;
        $curso->save();
    
        return redirect()->route('admin/cursos')->with('success', 'Curso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = cursos::findOrFail($id);
 
        $curso->delete();
 
        return redirect()->route('admin/cursos')->with('success', 'product deleted successfully');
    }
}
