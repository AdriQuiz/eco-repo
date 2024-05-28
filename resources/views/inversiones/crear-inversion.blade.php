@extends('layout.app')

@section('content')
    <div class="d-flex">
        @include('componentes.sidebar')

        <div class="p-5" style="background-color: #2d2d2d">
            <div class="container py-4">
                <h2 class="text-white mb-4">Inversión en Proyectos</h2>
                <div class="col">
                    <form action="{{ route('crear.inversion') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nit" class="form-label text-white">A nombre de</label>
                            <input type="text" class="form-control text-white" style="background-color: #464646" id="nit"
                                name="nit">
                        </div>
    
                        <div class="mb-3">
                            <label for="titulo" class="form-label text-white">Monto a invertir</label>
                            <input type="text" class="form-control text-white" style="background-color: #464646"
                                id="titulo" name="titulo">
                        </div>
    
                        <button type="submit" class="btn btn-primary mt-4">Realizar inversión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
