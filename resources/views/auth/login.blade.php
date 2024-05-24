@extends('layout.app')

@section('content')
    <div style="background-color: #2d2d2d">
        <div class="container p-4">
            <div class="py-3">
                <h1 class="h2 text-white">Login</h1>
                <p class="h5 text-white">Inicia sesión con tus datos</p>
            </div>
            <div>
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
@endsection