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
                            <h5 class="text-white py-4">Todas tus inversiones, {{ $inversor->nombre }}</h5>
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
                                            <th class="text-white" style="background-color: #212529">Proyecto</th>
                                            <th class="text-white" style="background-color: #212529">Monto (Bs)</th>
                                            <th class="text-white" style="background-color: #212529">Fecha</th>
                                            <th class="text-white" style="background-color: #212529">Progreso</th>
                                            <th class="text-white" style="background-color: #212529"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example row, replace with dynamic data as needed -->
                                        @foreach ($inversiones as $inversion)
                                            <tr>
                                                <td style="background-color: #2c3034">{{ $inversion->proyecto->titulo }}
                                                </td>
                                                <td style="background-color: #2c3034">{{ $inversion->monto }}</td>
                                                @if ($inversion->created_at)
                                                    <td style="background-color: #2c3034">{{ $inversion->created_at }}</td>
                                                @else
                                                    <td style="background-color: #2c3034">{{ now() }}</td>
                                                @endif
                                                <td style="background-color: #2c3034">{{ $inversion->proyecto->progreso }}%
                                                </td>
                                                <td style="background-color: #2c3034">
                                                    <form method="GET" action="{{ route('inversion.detalle', ['id' => $inversion->id]) }}">
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
