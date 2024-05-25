@extends('layout.app')

@section('content')
    <div style="background-color: #2d2d2d">
        <div class="container py-4">
            <h1 class="text-white">Creaste una inversion</h1>
            <div class="col-md-6">
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
@endsection
