@extends('layout.app')

{{-- @section('content')
    <div style="background-color: #2d2d2d">
        <div class="container-sm p-4">
            <div class="py-3">
                <h1 class="h2 text-white">Login</h1>
                <p class="h5 text-white">Inicia sesión con tus datos</p>
            </div>
            <div class="col-md-4">
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">E-mail</label>
                        <input type="email" style="background-color: #464646" class="form-control text-white"
                            id="email" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-white">No compartiremos tu email con nadie más.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <input type="password" style="background-color: #464646" class="form-control text-white"
                            id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>

            <div class="py-4">
                <a class="text-decoration-none text-white me-5" href="{{ route('registrar.inversor.vista') }}">¿Aún no
                    tienes cuenta?
                    Crea tu cuenta inversor</a>
                <a class="text-decoration-none text-white me-5" href="{{ route('registrar.empresa.vista') }}">¿Aún no tienes
                    cuenta?
                    Crea tu cuenta empresa</a>
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
                        <h3 class="fw-bold text-white">Log In</h3>
                        <p class="text-secondary text-white"> Accede a tu cuenta</p>
                    </div>

                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                            </span>
                            <input type="text" id="email"
                                class="form-control form-control-lg
                        fs-6" placeholder="Email"
                                name="email">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-lock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                </svg>
                            </span>
                            <input type="password" id="password"
                                class="form-control form-control-lg
                        fs-6" placeholder="Contraseña"
                                name="password">
                        </div>

                        <div class="py-3">
                            <button class="btn btn-primary btn-lg w-100">Login</button>
                        </div>
                    </form>

                    <div class="d-flex">
                        <div class="text-center">
                            <small>Quieres invertir? <a href="{{ url('/inversor/registrar') }}"
                                    class="fw-bold">Regístrate como inversor</a></small>
                        </div>

                        <div class="text-center">
                            <small>Quieres publicar tus proyectos? <a href="{{ url('/empresa/registrar') }}"
                                    class="fw-bold">Regístrate como empresa</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
