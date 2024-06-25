@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')
        <div class="container" style="background-color: #2c3034">
            <div class="container mt-4 p-4" style="border-radius: 10px; background-color: #212529;">
                <h2 style="color: #fff; margin-bottom: 20px;">Lista de Inversiones</h2>
                <table style="background-color: #212529 !important" class="table table-dark">
                    <thead>
                        <tr>
                            <th style="background-color: #212529">Nombre</th>
                            <th style="background-color: #212529">Monto</th>
                            <th style="background-color: #212529">Fecha de Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inversiones as $inversion)
                        <tr>
                            <td>{{ $inversion->inversor->nombre }}</td>
                            <td>{{ $inversion->monto }}</td>
                            <td>{{ $inversion->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <a href="{{ route('proyectos.empresa') }}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection