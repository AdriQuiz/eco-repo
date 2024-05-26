<?php $auth = session('tipo'); ?>
<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="{{ $auth === 'inversor' ? url('/inversor/inversiones') : url('/empresa/proyectos') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="{{ asset('img/9147895.png') }}" alt="icono-eco" width="40" height="32">
        <span class="fs-4 m-2">Ecocomunidad</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ $auth === 'inversor' ? url('/inversor/inversiones') : url('/empresa/proyectos') }}"
                class="nav-link text-white d-flex align-items-center">
                <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                </svg>
                Home
            </a>
        </li>

        @if ($auth === 'inversor')
            <li class="nav-item">
                <a href="{{ url('/proyectos/dashboard') }}" class="nav-link text-white d-flex align-items-center">
                    <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                    Dashboard
                </a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ url('/chat') }}" class="nav-link text-white d-flex align-items-center">
                    <svg class="bi me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                    Chat
                </a>
            </li>
        @endif
    </ul>
    <hr>
    <div class="">
        @if (session('usuario_id'))
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        @endif
    </div>
</div>
