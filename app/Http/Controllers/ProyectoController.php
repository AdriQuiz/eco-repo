<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function showProyectoForm() {
        return view('proyectos.crear-proyecto');
    }

    public function dashboardProyectos(Request $request) {
        $proyectos = Proyecto::all();
        $data = [
            'proyectos' => $proyectos
        ];

        return view('proyectos.dashboard-proyectos', $data);
    }
}
