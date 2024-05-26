<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Inversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Inversor;
use App\Models\Proyecto;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;

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
        session()->put('tipo', $usuario->tipo);

        if ($usuario->tipo === 'admin' && $usuario->is_admin) {
            return view('admin.index');
        } elseif ($usuario->tipo === 'inversor') {
            $inversor = Inversor::where('usuario_id', $usuario->id)->first();
            $inversiones = Inversion::where('inversor_id', $inversor->id)->get();
            $data = [
                'usuario' => $usuario,
                'inversor' => $inversor,
                'inversiones' => $inversiones
            ];

            return view('inversor.index', $data);

        } elseif ($usuario->tipo === 'empresa') {
            $empresa = Empresa::where('usuario_id', $usuario->id)->first();
            $proyectos = Proyecto::where('empresa_id', $empresa->id)->get();
            $data = [
                'usuario' => $usuario,
                'empresa' => $empresa,
                'proyectos' => $proyectos
            ];

            return view('empresa.index', $data);
        }
    }

    public function logout() {
        Session::forget('usuario_id');
        return redirect()->route('login');
    }
}
