<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller {
    public function create() {
        return view('auth.signup');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'usuario' => 'required|string|max:50|unique:users',
            'tipo_usuario' => 'required|string',
            'identificador' => 'nullable|string|max:50|unique:users,identificador',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'nombre_completo' => $request->nombre_completo,
            'usuario' => $request->usuario,
            'tipo_usuario' => $request->tipo_usuario,
            'identificador' => $request->identificador,
            'tipo_discapacitado_extra' => $request->tipo_discapacitado_extra,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->vehiculos) {
            foreach ($request->vehiculos as $vehiculo) {
                $user->vehiculos()->create($vehiculo);
            }
        }

        return redirect('/login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}
