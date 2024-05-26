<?php

namespace App\Http\Controllers;

use App\Models\Metrica;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function showProyectoForm()
    {
        return view('proyectos.crear-proyecto');
    }

    // Para el admin
    public function dashboardProyectos(Request $request)
    {
        $proyectos = Proyecto::all();
        $data = [
            'proyectos' => $proyectos
        ];

        return view('proyectos.dashboard-proyectos', $data);
    }
    //////

    public function showInfoProyecto($id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false || $id <= 0) {
            abort(404, 'ID inválido.');
        }

        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.proyecto-info', ['proyecto' => $proyecto]);
    }

    public function showMetricasProyecto($id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false || $id <= 0) {
            abort(404, 'ID inválido.');
        }

        $proyecto = Proyecto::findOrFail($id);
        $metricas = Metrica::where('proyecto_id', $proyecto->id)->first();

        $data = [
            'proyecto' => $proyecto,
            'metricas' => $metricas
        ];

        return view('proyectos.proyecto-detalle', $data);
    }
}
