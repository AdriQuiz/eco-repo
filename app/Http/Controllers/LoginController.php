<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Inversor;
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
            $data = [
                'usuario' => $usuario,
                'inversor' => $inversor
            ];

            return view('inversor.index', $data);

        } elseif ($usuario->tipo === 'empresa') {
            $empresa = Empresa::where('usuario_id', $usuario->id)->first();
            $data = [
                'usuario' => $usuario,
                'empresa' => $empresa
            ];

            return view('empresa.index', $data);
        }
    }

    public function logout() {
        Session::forget('usuario_id');
        return redirect()->route('login');
    }
}
