<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function showChat()
    {
        return view('api.chat');
    }

    public function __invoke(Request $request)
    {
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Bearer " . env('CHAT_GPT_KEY')
        ])->withOptions([
            'verify' => false,
        ])->post("https://api.openai.com/v1/chat/completions", [
            "model" => $request->post('model'),
            "messages" => [
                [
                    "role" => "user",
                    "content" => $request->post('content')
                ]
            ],
            "temperature" => 0.07,
            "max_tokens" => 2048
        ])->body();

        return response()->json(json_decode($response));
    }

    public function chatting(Request $request) {
        $userMessage = $request->input('content');
        $systemMessage = 'Hola que tal?';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('http://localhost:8000/python/chat', [
            'system_message' => $systemMessage,
            'message' => $userMessage
        ]);

        $responseData = $response->json();
        $sentimiento = $responseData['sentiment_positive'];

        if($sentimiento) {
            return redirect()->route('crear.proyecto.vista');
        } else {
            return back()->with('message', 'El diseño del proyecto necesita mejorar');
        }
    }
}
