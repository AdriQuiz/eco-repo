@extends('layout.app')

{{-- @section('content')
    <div style="background-color: #2d2d2d">
        <div class="container p-4">
            <div class="h2 text-white py-4">Registra tu empresa</div>
            <div class="col-md-6">
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
                        <p class="text-secondary text-white">Registra tu empresa</p>
                    </div>

                    <form method="POST" action="{{ route('registrar.empresa') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" id="NIT"
                                class="form-control form-control-lg
                        fs-6" placeholder="NIT"
                                name="NIT">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" id="titulo"
                                class="form-control form-control-lg
                        fs-6" placeholder="Título"
                                name="titulo">
                        </div>

                        <div class="input-group mb-3">
                            <input type="tel" id="telefono"
                                class="form-control form-control-lg
                        fs-6" placeholder="Teléfono"
                                name="telefono">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" id="direccion"
                                class="form-control form-control-lg
                        fs-6" placeholder="Dirección"
                                name="direccion">
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
                            <button class="btn btn-primary btn-lg w-100">Sign in</button>
                        </div>
                    </form>

                    <div class="d-flex">
                        <div class="text-center">
                            <small>Quieres invertir? <a href="{{ route('registrar.inversor.vista') }}"
                                    class="fw-bold">Regístrate como inversor</a></small>
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
