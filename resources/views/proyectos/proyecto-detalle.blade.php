@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')

        <div class="container-fluid m-3 d-flex flex-column">
            <h2>{{ $proyecto->titulo }}</h2>

            <div>
                <ul class="d-flex">
                    <div class="d-flex flex-column">
                        <li class="p-2">
                            <h4>Costo total: </h4>
                            <p>{{ $metricas->costo_total }}</p>
                        </li>
                        <li class="p-2">
                            <h4>Beneficios netos: </h4>
                            <p>{{ $metricas->beneficios_netos }}</p>
                        </li>
                        <li class="p-2">
                            <h4>Crea empleos: </h4>
                            @if ($metricas->crea_empleos === 1)
                                <p>Sí</p>
                            @endif
                        </li>
                        <li class="p-2">
                            <h4>Acceso a servicios</h4>
                            @if ($metricas->acceso_servicios === 1)
                                <p>Sí</p>
                            @endif
                        </li>
                    </div>
                    <div class="d-flex flex-column">
                        <li class="p-2">
                            <h4>Emision gases</h4>
                            <p>{{ $metricas->emision_gases }}</p>
                        </li>
                        <li class="p-2">
                            <h4>Consumo recursos</h4>
                            <p>{{ $metricas->consumo_recursos }}</p>
                        </li>
                        <li class="p-2">
                            <h4>Tecnología disponible</h4>
                            @if ($metricas->tecno_disponible === 1)
                                <p>Sí</p>
                            @endif
                        </li>
                        <li class="p-2">
                            <h4>Gestión de riesgos</h4>
                            @if ($metricas->gestion_riesgos === 1)
                                <p>Sí</p>
                            @endif
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
@endsection
