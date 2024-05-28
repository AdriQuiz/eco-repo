@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Detalles de la Inversión</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Inversión ID: {{ $inversion->id }}</h5>
                    <p class="card-text"><strong>Inversor ID:</strong> {{ $inversion->inversor_id }}</p>
                    <p class="card-text"><strong>Proyecto ID:</strong> {{ $inversion->proyecto_id }}</p>
                    <p class="card-text"><strong>Monto:</strong> ${{ $inversion->monto }}</p>
                    <p class="card-text"><strong>Fecha de Creación:</strong> {{ $inversion->created_at }}</p>
                    <a href="{{ route('inversiones.inversor') }}" class="btn btn-primary">Volver a la Lista de Inversiones</a>
                </div>
            </div>
        </div>
    </div>
@endsection