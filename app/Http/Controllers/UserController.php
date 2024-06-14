<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
 
class UserController extends Controller
{
    public function userprofile()
    {
        return view('userprofile');
    }

    public function ActualizarProfile(Request $request)
    {
        
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para actualizar tu perfil');
        }
    
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Verificar si el usuario es una instancia de User
        if (!$user instanceof User) {
            return redirect()->route('login')->with('error', 'Usuario no válido');
        }
    
        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
    
        // Actualizar los datos del usuario con los datos del formulario
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        // Redireccionar o devolver una respuesta JSON, según sea necesario
        return redirect()->back()->with('success', 'Perfil actualizado correctamente');
    }
    
    public function home()
    {
         // Verificar que el usuario ha iniciado sesión
    if (auth()->check()) {
        // Obtener el ID del usuario que ha iniciado sesión
        $userId = auth()->id();

        // Consultar las notas del usuario que ha iniciado sesión
        $notas = DB::table('notas')
            ->join('users', 'notas.user_id', '=', 'users.id')
            ->join('cursos', 'notas.cursos_id', '=', 'cursos.id')
            ->where('notas.user_id', $userId)
            ->select(
                'users.name as Nombre_Alumno', 
                'cursos.nombre_curso as Curso', 
                'notas.nota1', 
                'notas.nota2', 
                'notas.nota3', 
                DB::raw('ROUND((nota1 + nota2 + nota3) / 3, 2) as Promedio')
            )
            ->get();

        return view('home', ['notas' => $notas]);
    }

    // Redireccionar al usuario a la página de inicio de sesión si no ha iniciado sesión
    return redirect()->route('login');


    }
    

}