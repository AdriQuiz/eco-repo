@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')
        <div class="container mt-5">
            <div class="card text-white p-5" style="background-color: #212529">
                <div class="card-header rounded mb-2" style="background-color: #2c3034">
                    <div class="d-flex align-items-center">
                        <h3>Detalles de la Inversión</h3>
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
                                <th scope="row" style="background-color: #2c3034">Inversión Nro.</th>
                                <td style="background-color: #2c3034">{{ $inversion->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Inversor</th>
                                <td style="background-color: #2c3034">{{ $inversion->inversor->nombre }}
                                    {{ $inversion->inversor->apellido }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Proyecto</th>
                                <td style="background-color: #2c3034">{{ $inversion->proyecto->titulo }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Monto (Bs)</th>
                                <td style="background-color: #2c3034">${{ $inversion->monto }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="background-color: #2c3034">Fecha de Creación</th>
                                <td style="background-color: #2c3034">{{ $inversion->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="py-3">
                        <a href="{{ route('inversiones.inversor') }}" class="btn btn-primary">Volver a la Lista de
                            Inversiones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
