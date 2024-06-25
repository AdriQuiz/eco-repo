<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Metrica;
use App\Models\Proyecto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class EmpresaController extends Controller
{
    public function showEmpresaForm()
    {
        return view('empresa.crear-cuenta');
    }

    public function showEmpresaMain()
    {
        $usuario_id = session('usuario_id');
        $usuario = Usuario::where('id', $usuario_id)->first();
        $empresa = Empresa::where('usuario_id', $usuario_id)->first();

        if ($empresa) {
            $proyectos = Proyecto::where('empresa_id', $empresa->id)->get();

            $data = [
                'usuario' => $usuario,
                'empresa' => $empresa,
                'proyectos' => $proyectos
            ];
        } else {
            $data = [
                'usuario' => $usuario,
                'empresa' => $empresa,
                'proyectos' => new Proyecto()
            ];
        }

        return view('empresa.index', $data);
    }

    public function registrarEmpresa(Request $request)
    { 
        $request->validate([
            'nit' => 'required|string|unique:empresas,nit',
            'titulo' => 'required|string',
            'telefono' => 'required|string|size:8',
            'direccion' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string'
        ]);
        
        try {
            $usuario = new Usuario();
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->tipo = 'empresa';
            $usuario->save();
            
            $empresa = new Empresa();
            $empresa->usuario_id = $usuario->id;
            $empresa->nit = $request->nit;
            $empresa->titulo = $request->titulo;
            $empresa->telefono = $request->telefono;
            $empresa->direccion = $request->direccion;
            $empresa->save();
            $proyectos = Proyecto::where('empresa_id', $empresa->id)->get();

            session(['usuario_id' => $usuario->id]);

            $data = [
                'usuario' => $usuario,
                'empresa' => $empresa,
                'proyectos' => $proyectos
            ];

            return view('empresa.index', $data);

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }
}
