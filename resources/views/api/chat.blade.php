@extends('layout.app')

@section('content')
    {{-- Header --}}
    <div class="d-flex">
        @include('componentes.sidebar')

        <div class="b-example-divider"></div>
        <div class="chat p-4 m-0" style="background-color: #212529">
            <div class="top m-0">
                <p class="text-white" style="background-color: #212529">EcoComunidad IA</p>
                <small class="text-white">Online</small>
            </div>

            {{-- Chat --}}

            <div class="messages">
                <div class="left message">
                    <img src="{{ asset('img/5046859.png') }}" width="50" height="50" alt="avatar">
                    <p>Start chatting with Chat GPT AI below!!</p>
                </div>
            </div>

            {{-- Foooter --}}
            <div class="bottom">
                <form action="">
                    <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                    <button type="submit"></button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('form').submit(function(event) {
            event.preventDefault();

            $('form #message').prop('disabled', true);
            $('form button').prop('disabled', true);

            var userMessage = $("form #message").val();

            if (userMessage.includes('evaluar') && userMessage.includes('proyecto')) {
                var projectName = prompt("Por favor, ingresa el nombre de tu proyecto:");
                var costo = prompt("Por favor, ingresa el costo total de tu proyecto:");
                var beneficios = prompt("Por favor, ingresa los beneficios netos de tu proyecto:");
                var empleos = prompt("Tu proyecto genera empleos?:");
                var servicios = prompt("Tu proyecto asegura el acceso a servicios básicos?:");
                var gases = prompt(
                    "Por favor, ingresa la cifra en toneladas de gas CO2 aproximado que crea el proyecto:");
                var recursos = prompt("Por favor, ingresa la cantidad en toneladas de materiales a usar:");
                var tecno = prompt("Tu proyecto posee la maquinaria y tecnologías requeridas?:");
                var riesgo = prompt("Tu proyecto tiened definido un plan de riesgos?:");

                // Agregar los parámetros al mensaje del usuario
                userMessage +=
                    ` | Nombre del proyecto: ${projectName} | Costo: ${costo}
                      | Beneficios: ${beneficios} | Empleos: ${empleos}
                      | Servicios: ${servicios} | Emision de gases: ${gases}
                      | Recursos: ${recursos} | Tecno: ${tecno}
                      | Riesgo: ${riesgo}
                    `;
            }

            $.ajax({
                url: "/chat",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    // "content": $("form #message").val()
                    "content": userMessage,
                    "project_name": projectName,
                    "costo": costo,
                    "beneficios": beneficios,
                    "empleos": empleos,
                    "servicios": servicios,
                    "gases": gases,
                    "recursos": recursos,
                    "tecno": tecno,
                    "riesgo": riesgo
                }
            }).done(function(res) {
                $(".messages > .message").last().after('<div class="right message">' +
                    '<p>' + $("form #message").val() + '</p>' +
                    '<img src="{{ asset('img/5046859.png') }}" width="50" height="50" alt="Avatar">' +
                    '</div>');

                if (res.aprobado !== undefined && res.aprobado === false) {
                    $(".messages > .message").last().after('<div class="left message">' +
                        '<img src="{{ asset('img/5046859.png') }}" width="50" height="50" alt="Avatar">' +
                        '<p>El diseño del proyecto necesita mejorar.</p>' +
                        '</div>');
                } else if (res.choices && res.choices.length > 0 && res.choices[0].message && res.choices[0]
                    .message.content) {
                    // La respuesta tiene la estructura esperada
                    $(".messages > .message").last().after('<div class="left message">' +
                        '<img src="{{ asset('img/5046859.png') }}" width="50" height="50" alt="Avatar">' +
                        '<p>' + res.choices[0].message.content + '</p>' +
                        '</div>');
                } else {
                    // La respuesta no tiene la estructura esperada, mostrar un mensaje de error o hacer algo diferente
                    $(".messages > .message").last().after('<div class="left message">' +
                        '<img src="{{ asset('img/5046859.png') }}" width="50" height="50" alt="Avatar">' +
                        '<p>Tu proyecto va en camino!</p>' +
                        '</div>');
                }

                if (res.aprobado === true && res.redirect_url) {
                    // Construir la URL con los parámetros de las respuestas
                    const url = new URL(res.redirect_url);
                    Object.keys(res.respuestas).forEach(key => url.searchParams.append(key, res.respuestas[
                        key]));

                    // Redirigir a la URL construida
                    window.location.href = url.toString();
                }

                $("form #message").val('');
                $(document).scrollTop($(document).height());

                $("form #message").prop('disabled', false);
                $("form button").prop('disabled', false);
            });
        });
    </script>
@endsection
