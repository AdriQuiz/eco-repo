@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')

        <div class="container mt-5">
            <div class="dashboard-container" style="background-color: #212529">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4 text-white">Proyectos Disponibles</h4>
                    </div>
                    @foreach ($proyectos as $proyecto)
                        <div class="col-md-6 col-lg-3">
                            <div class="dashboard-card text-center" style="background-color: #2c3034">
                                {{-- <div class="icon icon-blue">
                                <i class="fas fa-project-diagram"></i>
                            </div> --}}
                                <h5 class="text-white">{{ $proyecto->titulo }}</h5>
                                <div class="stat text-white">{{ $proyecto->progreso }}%</div>
                                <div class="desc">{{ $proyecto->empresa->titulo }}</div>
                                {{-- <div class="change change-up">▲ 0.75%</div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
