@extends('layout.app')

@section('content')
    <div style="background-color: #2d2d2d">
        <div class="container py-4">
            <div class="mb-3 d-flex align-items-center">
                <img src="{{ asset('img/5046859.png') }}" alt="icono-user" style="width: 70px; height: 70;">
                <div class="d-flex flex-column ms-4">
                    <h2 class="text-white">{{ $empresa->titulo }} {{ $empresa->apellido }}</h2>
                    <p class="text-white">Correo electrónico: {{ $usuario->email }}</p>
                    <p class="text-white">Telf: {{ $empresa->telefono}}</p>
                </div>
            </div>

            <div class="h2 text-white py-4">Todos los Proyectos</div>

            @if (empty($proyectos))
                <p class="text-white">No tienes proyectos aún.</p>
            @else
                <ul>
                    @foreach ($proyectos as $proyecto)
                        <li>{{ $proyecto->nombre }}</li>
                        <!-- Aquí puedes mostrar otros detalles de la inversión -->
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
