<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
 
class AuthController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    public function register()
    {
        return view('auth/register');
    }
 
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "0"
        ]);
 
        return redirect()->route('login');
    }
 
    public function login()
    {
        return view('auth/login');
    }
 
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
 
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
 
        $request->session()->regenerate();
 
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin/home');
        }
        // else if (auth()->user()->type == 'prof') {
        //     return redirect()->route('admin/home');
        // }      
        else {
            return redirect()->route('home');
        }
         
        return redirect()->route('alumnos');
    }
 
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
 
        return redirect('/login');
    }
 
    public function profile()
    {
        return view('userprofile');
    }

    public function updateProfile(Request $request)
    {
        dd($request->all());
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
