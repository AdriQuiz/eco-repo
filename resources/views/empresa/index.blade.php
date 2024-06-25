@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')

        <div style="background-color: #2d2d2d">
            <div class="container p-4 m-4">
                <div class="mb-3 d-flex align-items-center conatiner p-5 rounded vw-100" style="background-color: #2c3034">
                    <img src="{{ asset('img/5046859.png') }}" alt="icono-user" style="width: 70px; height: 70;">
                    <div class="d-flex flex-column ms-4">
                        <h2 class="text-white">{{ $empresa->titulo }} {{ $empresa->apellido }}</h2>
                        <p class="text-white">Correo electrónico: {{ $usuario->email }}</p>
                        <p class="text-white">Telf: {{ $empresa->telefono }}</p>
                    </div>
                </div>

                <div class="h2 text-white py-4">Todos los Proyectos</div>

                @if ($proyectos->isEmpty())
                    <p class="text-white">No tienes proyectos aún.</p>
                @else
                    @include('componentes.table-proyecto')
                @endif
                <div class="py-3">
                    <form method="GET" action="{{ route('chat.vista') }}">
                        <button type="submit" class="text-white btn btn-primary ">Presentar proyecto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
