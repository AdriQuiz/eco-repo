@extends('layout.app')

$@section('content')
    <div style="background-color: #2d2d2d">
        <div class="container p-4">
            <div class="h2 text-white py-4">Registra tu empresa</div>
            <div>
                <form action="{{ route('registrar.empresa') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nit" class="form-label text-white">NIT</label>
                        <input type="text" class="form-control text-white" style="background-color: #464646" id="nit"
                            name="nit">
                    </div>

                    <div class="mb-3">
                        <label for="titulo" class="form-label text-white">Título</label>
                        <input type="text" class="form-control text-white" style="background-color: #464646"
                            id="titulo" name="titulo">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label text-white">Teléfono</label>
                        <input type="tel" class="form-control text-white" style="background-color: #464646"
                            id="telefono" name="telefono">
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label text-white">Dirección</label>
                        <input type="text" class="form-control text-white" style="background-color: #464646"
                            id="direccion" name="direccion">
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
