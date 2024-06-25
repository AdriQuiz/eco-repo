@extends('layout.app')

{{-- @section('content')
    <div style="background-color: #2d2d2d">
        <div class="container p-4">
            <div class="h2 text-white py-4">Regístrate como inversor</div>
            <div class="col-md-6">
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
@endsection --}}

@section('content')
    <div class="row vh-100 g-0">
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder"
                style="background-image: url({{ asset('img/Por-que-el-sector-de-la-construccion-es-clave-para-la-economia-y-la-creacion-de-empleo-easyAlquiler-Blog.jpg') }})">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0
        px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <a href="#" class="d-flex justify-content-center mb-4">
                        <img src="{{ asset('img/9147895.png') }}" alt="" width="60">
                    </a>

                    <div class="text-center mb-5">
                        <h3 class="fw-bold text-white">Sign in</h3>
                        <p class="text-secondary text-white">Regístrate como inversor</p>
                    </div>

                    <form method="POST" action="{{ route('registrar.inversor') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" id="ci"
                                class="form-control form-control-lg
                        fs-6"
                                placeholder="Carnet de Identidad" name="ci">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" id="nombre"
                                class="form-control form-control-lg
                        fs-6" placeholder="Nombre"
                                name="nombre">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" id="apellido"
                                class="form-control form-control-lg
                        fs-6" placeholder="Apellido"
                                name="apellido">
                        </div>

                        <div class="input-group mb-3">
                            <input type="tel" id="telefono"
                                class="form-control form-control-lg
                        fs-6" placeholder="Teléfono"
                                name="telefono">
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" id="email"
                                class="form-control form-control-lg
                        fs-6" placeholder="E-mail"
                                name="email">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" id="password"
                                class="form-control form-control-lg
                        fs-6" placeholder="Contraseña"
                                name="password">
                        </div>

                        <div class="py-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Sign in</button>
                        </div>
                    </form>

                    <div class="d-flex">
                        <div class="text-center">
                            <small>Quieres publicar tus proyectos? <a href="{{ route('registrar.empresa.vista') }}"
                                    class="fw-bold">Regístrate como empresa</a></small>
                        </div>

                        <div class="text-center">
                            <small>Ya tienes una cuenta? <a href="{{ route('login') }}" class="fw-bold">Login</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
