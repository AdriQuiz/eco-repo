@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex">
            <!-- Sidebar -->
           @include('componentes.sidebar')

            <!-- Main content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="daxa-card all-projects-card bg-dark text-white">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="text-white py-4">Todos tus proyectos</h5>
                        </div>
                        {{-- <div class="card-subtitle">
                            <button type="button" class="card-header-menu-btn" onclick="toggleMenu()">
                                This Month
                            </button>
                            <div class="card-header-menu" id="cardHeaderMenu">
                                <button class="menu-item">This Day</button>
                                <button class="menu-item">This Week</button>
                                <button class="menu-item">This Month</button>
                                <button class="menu-item">This Year</button>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-content">
                        <div class="all-projects-table">
                            <div class="table-responsive">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-white" style="background-color: #212529">ID</th>
                                            <th class="text-white" style="background-color: #212529">Nombre proyecto</th>
                                            <th class="text-white" style="background-color: #212529">Tipo</th>
                                            <th class="text-white" style="background-color: #212529">Progreso</th>
                                            <th class="text-white" style="background-color: #212529">Viabilidad</th>
                                            <th class="text-white" style="background-color: #212529">Viabilidad</th>
                                            <th class="text-white" style="background-color: #212529"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row, replace with dynamic data as needed -->
                                        @foreach ($proyectos as $proyecto)
                                            <tr>
                                                <td style="background-color: #2c3034">{{ $proyecto->id }}</td>
                                                <td style="background-color: #2c3034">{{ $proyecto->titulo }}</td>
                                                <td style="background-color: #2c3034">{{ $proyecto->tipo }}</td>
                                                <td style="background-color: #2c3034">{{ $proyecto->progreso }}%</td>
                                                @if ($proyecto->es_viable === 1)
                                                    <td style="background-color: #2c3034">Viable</td>
                                                @endif
                                                <td style="background-color: #2c3034">
                                                    <form method="GET" action="{{ route('proyecto.metricas', ['id' => $proyecto->id]) }}">
                                                        <button type="submit" class="text-white btn btn-primary ">Ver detalles</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("cardHeaderMenu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }
    </script>
@endsection
