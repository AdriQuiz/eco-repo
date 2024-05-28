<?php

namespace App\Http\Controllers;

use App\Models\Inversion;
use Illuminate\Http\Request;

class InversionController extends Controller
{
    public function showInversionForm()
    {
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
    }

    public function eliminarInversion(Request $request)
    {
    }
}
