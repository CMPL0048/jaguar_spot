<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de login
     */
    public function showLoginForm() {
        return view('auth.login');
    }

    /**
     * Procesar el login
     */
    public function login(Request $request) {
        // Validación de credenciales
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Intentar autenticación
        $credentials = $request->only('usuario', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Obtener usuario autenticado
    
            // Verificar el rol y redirigir
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Bienvenido al panel de administración');
            }
    
            return redirect()->route('estacionamientos.index')->with('success', 'Inicio de sesión exitoso');
        }
    
        return back()->withErrors(['usuario' => 'Credenciales incorrectas'])->withInput();
    }
    

    /**
     * Cerrar sesión
     */
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Sesión cerrada correctamente');
    }
}


