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

            $.ajax({
                url: "/chat",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    "content": $("form #message").val()
                }
            }).done(function(res) {
                $(".messages > .message").last().after('<div class="right message">' +
                    '<p>' + $("form #message").val() + '</p>' +
                    '<img src="{{ asset('img/5046859.png') }}" width="50" height="50" alt="Avatar">' +
                    '</div>');

                $(".messages > .message").last().after('<div class="left message">' +
                    '<img src="{{ asset('img/5046859.png') }}" width="50" height="50" alt="Avatar">' +
                    '<p>' + res.choices[0].message.content + '</p>' +
                    '</div>');

                $("form #message").val('');
                $(document).scrollTop($(document).height());

                $("form #message").prop('disabled', false);
                $("form button").prop('disabled', false);
            });
        });
    </script>
@endsection
