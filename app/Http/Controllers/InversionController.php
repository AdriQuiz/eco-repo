<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InversionController extends Controller
{
    public function showInversionForm() {
        return view('inversiones.crear-inversion');
    }

    public function crearInversion(Request $request) {
        
    }

    public function showInversion(Request $request) {

    }

    public function eliminarInversion(Request $request) {

    }
}
