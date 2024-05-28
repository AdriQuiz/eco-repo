@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')

        <div class="container d-flex flex-column">
            <div id="project-details" class="container p-4">
                <h2 id="project-title">Proyectos disponibles</h2>
                <p id="project-description">Mira</p>
            </div>

            {{-- <div class="container-fluid py-4">
                @foreach ($proyectos->chunk(3) as $chunk)
                    <div class="d-flex m-0">
                        @foreach ($chunk as $proyecto)
                            <div class="col-md-3 cursor-pointer rounded p-3 m-3 bg-primary">
                                <h2>{{ $proyecto->titulo }}</h2>
                                <p>{{ $proyecto->tipo }}</p>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="{{ route('proyecto.info', ['id' => $proyecto->id]) }}">Ver</a>
                                <a href="#" class="m-1">Aportar</a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div> --}}
            @include('componentes.grid-proyecto')
        </div>
    </div>
@endsection
