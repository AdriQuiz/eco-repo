@extends('layout.app')

@section('content')
    <div style="background-color: #2d2d2d">
        <div class="container py-4">
            <div class="mb-3 d-flex align-items-center">
                <img src="{{ asset('img/5046859.png') }}" alt="icono-user" style="width: 70px; height: 70;">
                <div class="d-flex flex-column ms-4">
                    <h2 class="text-white">{{ $inversor->nombre }} {{ $inversor->apellido }}</h2>
                    <p class="text-white">Correo electrónico: {{ $usuario->email }}</p>
                    <p class="text-white">Telf: {{ $inversor->telefono}}</p>
                </div>
            </div>

            <div class="h2 text-white py-4">Todas las Inversiones</div>

            @if (empty($inversiones))
                <p class="text-white">No has hecho inversiones aún.</p>
            @else
                <ul>
                    @foreach ($inversiones as $inversion)
                        <li>{{ $inversion->nombre }}</li>
                        <!-- Aquí puedes mostrar otros detalles de la inversión -->
                    @endforeach
                </ul>
            @endif
            <div>
                <form method="GET" action="{{ route('crear.inversion.vista') }}">
                    <button type="submit" class="text-white btn btn-primary ">Crear una inversión</button>
                </form>
            </div>
        </div>
    </div>
@endsection
