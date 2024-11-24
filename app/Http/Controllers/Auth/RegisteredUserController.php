<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Muestra el formulario de registro personalizado.
     */
    public function create()
    {
        return view('auth.custom_auth.register'); // Ruta de tu vista personalizada
    }

    /**
     * Maneja el registro de usuario.
     */
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Creación del usuario en la base de datos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Dispara el evento de registro para el usuario recién creado
        event(new Registered($user));

        // Autentica al usuario recién registrado
        auth()->login($user);

        // Redirige a la página principal después del registro
        return redirect('/');
    }
}

