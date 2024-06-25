@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('componentes.sidebar')
        </div>
        <div class="col-lg-9">
            <main class="mainito">
                <div class="container p-3" style="background-color: #2d2d2d">
                    <h1 class="text-white">Empieza creando tu proyecto!</h1>
                </div>

                <section class="section">
                    <div class="row">
                        <div class="col-lg-11 mb-4">
                            <div class="card">
                                <div class="card-body text-white" style="background-color: #212529">
                                    <h5 class="card-title py-3">Formulario de registro</h5>
                                    <form method="POST" action="{{ route('crear.proyecto') }}">
                                        @csrf
                                        <div class="row mb-4 justify-content-center">
                                            <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-white" id="titulo" name="titulo"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-center">
                                            <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-white" id="tipo" name="tipo"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-center">
                                            <label for="costo" class="col-sm-2 col-form-label">Costo total</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control text-white" id="costo" name="costo"
                                                    style="background-color: #2d2d2d" placeholder="Costo total">
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-center">
                                            <label for="beneficios" class="col-sm-2 col-form-label">Beneficios netos</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control text-white" id="beneficios" name="beneficios"
                                                    style="background-color: #2d2d2d" placeholder="">
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-4 justify-content-center">
                                            <label for="empleos" class="col-sm-2 col-form-label">Crea empleos?</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-white" id="empleos" name="empleos"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-center">
                                            <label for="servicios" class="col-sm-2 col-form-label">Crea servicios?</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-white" id="servicios" name="servicios"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div> --}}
                                        <div class="row mb-4 justify-content-center">
                                            <label for="gases" class="col-sm-2 col-form-label">Emisión de gases
                                                (tonelada)</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control text-white" id="gases" name="gases"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-center">
                                            <label for="recursos" class="col-sm-2 col-form-label">Consumo de
                                                recursos (tonelada)</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control text-white" id="recursos" name="recursos"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-4 justify-content-center">
                                            <label for="tecnologia" class="col-sm-2 col-form-label">Tecnología
                                                disponible</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-white" id="tecnologia" name="tecnologia"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-center">
                                            <label for="riesgos" class="col-sm-2 col-form-label">Gestión de
                                                riesgos</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control text-white" id="riesgos" name="riesgos"
                                                    style="background-color: #2d2d2d">
                                            </div>
                                        </div> --}}
                                        <div class="p-4">
                                            <button type="submit" class="btn btn-primary">Crear proyecto</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6"></div> --}}
                    </div>
                </section>
            </main>
        </div>
    </div>
@endsection
