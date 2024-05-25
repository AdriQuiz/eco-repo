<?php

namespace App\Http\Controllers;

use App\Models\Inversor;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class InversorController extends Controller
{
    public function showInversorForm()
    {
        return view('inversor.crear-cuenta');
    }

    public function registrarInversor(Request $request)
    {
        $request->validate([
            'ci' => 'required|string|unique:inversores,ci',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'telefono' => 'required|string|size:8'
        ]);

        try {
            $usuario = new Usuario();
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->tipo = 'inversor';
            $usuario->save();

            $inversor = new Inversor();
            $inversor->ci = $request->ci;
            $inversor->nombre = $request->nombre;
            $inversor->apellido = $request->apellido;
            $inversor->telefono = $request->telefono;
            $inversor->usuario_id = $usuario->id;
            $inversor->save();

            $data = [
                'usuario' => $usuario,
                'inversor' => $inversor,
                'inversiones' => []
            ];

            return view('inversor.index', $data);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }
}
