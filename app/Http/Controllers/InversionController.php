<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InversionController extends Controller
{
    public function showInversionForm() {
        return view('inversiones.crear-inversion');
    }
}
