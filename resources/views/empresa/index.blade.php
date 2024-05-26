@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')

        <div style="background-color: #2d2d2d">
            <div class="container p-4 m-4">
                <div class="mb-3 d-flex align-items-center">
                    <img src="{{ asset('img/5046859.png') }}" alt="icono-user" style="width: 70px; height: 70;">
                    <div class="d-flex flex-column ms-4">
                        <h2 class="text-white">{{ $empresa->titulo }} {{ $empresa->apellido }}</h2>
                        <p class="text-white">Correo electrónico: {{ $usuario->email }}</p>
                        <p class="text-white">Telf: {{ $empresa->telefono}}</p>
                    </div>
                </div>
    
                <div class="h2 text-white py-4">Todos los Proyectos</div>
    
                @if ($proyectos->isEmpty())
                    <p class="text-white">No tienes proyectos aún.</p>
                @else
                    <ul>
                        @foreach ($proyectos as $proyecto)
                            <li>{{ $proyecto->titulo }}</li>
                            
                            <div class="d-flex flex-column">
                                <a href="{{ route('proyecto.metricas', ['id' => $proyecto->id]) }}">Ver</a>
                                <a href="#" class="m-1">Aportar</a>
                            </div>
                        @endforeach
                    </ul>
                @endif
                <div>
                    <a href="{{ route('chat.vista') }}">Presentar proyecto</a>
                    {{-- <form method="GET" action="{{ route('dashboard.proyectos') }}">
                        <button type="submit" class="text-white btn btn-primary ">Presentar proyecto</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
