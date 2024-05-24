@extends('layout.app')

$@section('content')
    <div style="background-color: #2d2d2d">
        <div class="container p-4">
            <div class="h2 text-white py-4">Regístrate como inversor</div>
            <div>
                <form action="{{ route('registrar.inversor') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ci" class="form-label text-white">Número de Carnet</label>
                        <input type="text" class="form-control text-white" style="background-color: #464646" id="ci"
                            name="ci">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label text-white">Nombre</label>
                        <input type="text" class="form-control text-white" style="background-color: #464646"
                            id="nombre" name="nombre">
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label text-white">Apellido</label>
                        <input type="text" class="form-control text-white" style="background-color: #464646"
                            id="apellido" name="apellido">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label text-white">Teléfono</label>
                        <input type="tel" class="form-control text-white" style="background-color: #464646"
                            id="telefono" name="telefono">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Correo Electrónico</label>
                        <input type="email" class="form-control text-white" style="background-color: #464646"
                            id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Contraseña</label>
                        <input type="password" class="form-control text-white" style="background-color: #464646"
                            id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
@endsection
