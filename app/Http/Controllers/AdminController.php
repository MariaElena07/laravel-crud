<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class AdminController extends Controller
{
    public function profilepage()
    {
        return view('profile');
    }
    public function updateProfile(Request $request)
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
}
