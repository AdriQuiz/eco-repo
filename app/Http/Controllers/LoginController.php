<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Inversor;
use App\Models\User;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if(!$usuario || !Hash::check($request->password, $usuario->password)) {
            return redirect()->back()->withErrors(['email' => 'Email o contraseña incorrectos']);
        }

        session()->put('usuario_id', $usuario->id);

        if ($usuario->tipo === 'admin' && $usuario->is_admin) {
            return view('admin.index');
        } elseif ($usuario->tipo === 'inversor') {
            return view('inversor.index');
        } elseif ($usuario->tipo === 'empresa') {
            return view('empresa.index');
        }
    }

    public function crearUsuario(Request $request)
    {
        $tipo = $request->tipo;

        if ($tipo === 'inversor') {
            $request->validate([
                'ci' => 'required|string',
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'email' => 'required|email|unique:usuarios,email',
                'password' => 'required|string|min:6',
                'telefono' => 'required|string'
            ]);
        } elseif ($tipo === 'empresa') {
            $request->validate([
                'nit' => 'required|string',
                'titulo' => 'required|string',
                'telefono' => 'required|string',
                'direccion' => 'required|string',
                'email' => 'required|email|unique:usuarios,email',
                'password' => 'required|string|min:6'
            ]);
        }

        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo = $tipo;
        $usuario->save();

        if ($tipo === 'inversor') {
            $inversor = new Inversor();
            $inversor->ci = $request->ci;
            $inversor->nombre = $request->nombre;
            $inversor->apellido = $request->apellido;
            $inversor->telefono = $request->telefono;
            $inversor->usuario_id = $usuario->id;
            $inversor->save();
        } elseif ($tipo === 'empresa') {
            $empresa = new Empresa();
            $empresa->nit = $request->nit;
            $empresa->titulo = $request->titulo;
            $empresa->telefono = $request->telefono;
            $empresa->direccion = $request->direccion;
            $empresa->usuario_id = $usuario->id;
            $empresa->save();
        }

        // Redireccionar o mostrar una vista de confirmación
        return redirect()->back()->with('success', 'Usuario creado exitosamente');
    }
}
