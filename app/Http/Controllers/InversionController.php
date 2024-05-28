<?php

namespace App\Http\Controllers;

use App\Models\Inversion;
use App\Models\Inversor;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class InversionController extends Controller
{
    public function showInversionForm(Request $request)
    {
        session(['proyecto_id' => $request->proyecto_id]);
        return view('inversiones.crear-inversion');
    }

    public function showDetalleInversion($id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false || $id <= 0) {
            abort(404, 'ID inválido.');
        }

        $inversion = Inversion::findOrFail($id);
        return view('inversiones.detalle-inversion', ['inversion' => $inversion]);
    }

    public function showInversiones()
    {
        $inversiones = Inversion::with('proyecto')->get();
        $data = [
            'inversiones' => $inversiones
        ];

        return view('componentes.table-inversion', $data);
    }

    public function crearInversion(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:1'
        ]);

        $usuario_id = session('usuario_id');

        try {
            $inversion = new Inversion();
            $inversor = Inversor::where('usuario_id', $usuario_id)->first();
            $inversion->inversor_id = $inversor->id;
            $inversion->proyecto_id = $request->proyecto_id;
            $inversion->monto = $request->monto;
            $inversion->save();

            return view('inversiones.detalle-inversion', ['inversion' => $inversion, 'id' => $inversion->id]);
        } catch (ValidationValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }

    public function eliminarInversion(Request $request)
    {
    }
}
