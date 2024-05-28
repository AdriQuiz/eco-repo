@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')
        <div class="container mt-5">
            <div class="card text-white p-5" style="background-color: #212529">
                <div class="card-header rounded" style="background-color: #2c3034">
                    <div class="d-flex align-items-center">
                        <h3>Detalles del Proyecto</h3>
                        <svg class="mx-4" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-dark">
                        <tbody>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Costo total</th>
                                <td style="background-color: #2c3034">{{ $metricas->costo_total ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Beneficios netos</th>
                                <td style="background-color: #2c3034">{{ $metricas->beneficios_netos ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Crea empleos</th>
                                @if ($metricas->crea_empleos === 1)
                                    <td style="background-color: #2c3034">Sí</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Acceso a servicios</th>
                                @if ($metricas->acceso_servicios === 1)
                                    <td style="background-color: #2c3034">Sí</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Emisión de gases (< 1000 ton CO2)</th>
                                <td style="background-color: #2c3034">{{ $metricas->emision_gases ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Consumo de recursos</th>
                                <td style="background-color: #2c3034">{{ $metricas->consumo_recursos ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Tecnología disponible</th>
                                @if ($metricas->tecno_disponible === 1)
                                    <td style="background-color: #2c3034">Sí</td>
                                @endif
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Gestión de riesgos</th>
                                @if ($metricas->gestion_riesgos === 1)
                                    <td style="background-color: #2c3034">Sí</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    <div class="py-3">
                        <a href="{{ route('proyectos.empresa') }}" class="btn btn-primary">Volver a la Lista de
                            Proyectos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
