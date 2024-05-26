@extends('layout.app')

@section('content')

    {{-- Header --}}
    <div class="chat">
        <div class="top">
            <p>Ross Edlin</p>
            <small>Online</small>
        </div>
    </div>

    {{-- Chat --}}

    <div class="messages">
        <div class="left message">
            <img src="{{ asset('img/5046859.png') }}" alt="avatar">
            <p>Empieza a chatear con Chat GPT AI aquí</p>
        </div>
    </div>

    {{-- Foooter --}}
    <div class="bottom">
        <form action="">
            <input type="text" id="message" name="message" placeholder="Escribe tu mensaje..."
            autocomplete="off">
            <button type="submit"></button>
        </form>
    </div>
@endsection