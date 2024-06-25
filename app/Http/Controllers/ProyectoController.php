<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Metrica;
use App\Models\Proyecto;
use App\Models\Usuario;
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
        $proyectos = Proyecto::with('empresa')->get();
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

    public function registrarProyectos(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'tipo' => 'required|string',
            'costo' => 'required|numeric|min:9999|max:999999',
            'beneficios' => 'required|numeric|min:9999|max:999999',
            // 'empleos' => 'required|string',
            // 'servicios' => 'required|string',
            'gases' => 'required|numeric|min:1',
            'recursos' => 'required|numeric|min:1',
            // 'tecnologia' => 'required|string',
            // 'riesgos' => 'required|string'
        ]);

        $usuario_id = session('usuario_id');
        $usuario = Usuario::where('id', $usuario_id)->first();
        $empresa = Empresa::where('usuario_id', $usuario->id)->first();

        $proyecto = new Proyecto();
        $proyecto->empresa_id = $empresa->id;
        $proyecto->titulo = $request->titulo;
        $proyecto->tipo = $request->tipo;
        $proyecto->progreso = 0;
        $proyecto->es_viable = 1;
        $proyecto->save();

        $metricas = new Metrica();
        $metricas->proyecto_id = $proyecto->id;
        $metricas->costo_total = $request->costo;
        $metricas->beneficios_netos = $request->beneficios;
        $metricas->crea_empleos = 1;
        $metricas->acceso_servicios = 1;
        $metricas->emision_gases = $request->gases;
        $metricas->consumo_recursos = $request->recursos;
        $metricas->tecno_disponible = 1;
        $metricas->gestion_riesgos = 1;
        $metricas->save();

        $data = [
            'proyecto' => $proyecto,
            'metricas' => $metricas,
        ];

        return view('proyectos.integral-proyecto', $data);
        // return view('empresa.index');
    }

    public function eliminar($id) {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.empresa');
    }

    public function inversionesProyecto(Request $request) {
        $metricas_id = $request->metricas_id;
        $proyecto = Proyecto::where('id', $metricas_id)->first();
        
        $inversiones = $proyecto->inversiones;
        $data = ['inversiones' => $inversiones];
        return view('proyectos.lista-inversores', $data);
    }
}
