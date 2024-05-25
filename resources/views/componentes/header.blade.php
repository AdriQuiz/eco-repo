<div class="w-100 border-bottom" style="background-color: #464646">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{ asset('img/9147895.png') }}" alt="icono-main" style="width: 50px; height: 50;">
                <span class="fs-4 text-white">Ecocomunidad</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Nosotros</a>
                </li>
                <li class="nav-item">
                    @if (session('usuario_id'))
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    @endif
                </li>
            </ul>
    </div>
    </header>
</div>
