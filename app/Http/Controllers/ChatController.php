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
        $content = $request->input('content');

        // Verificar si el mensaje contiene la solicitud de evaluación de proyecto
        if (strpos($content, 'evaluar') !== false && strpos($content, 'proyecto') !== false) {
            // Obtener las respuestas del usuario
            $respuestas = $request->all();

            // Verificar si el proyecto cumple con los criterios
            $aprobado = true;

            if ($respuestas['beneficios'] <= 0) {
                $aprobado = false;
            }

            if (
                $respuestas['empleos'] === 'no'
                || $respuestas['empleos'] === 'No'
                || $respuestas['empleos'] === 'NO'
            ) {
                $aprobado = false;
            }

            // Resto de la lógica de evaluación aquí...

            if ($aprobado) {
                // Proyecto aprobado
                return redirect()->route('crear.proyecto.vista')->with('respuestas', $respuestas);
            } else {
                // Proyecto no aprobado
                return response()->json([
                    'message' => 'El diseño del proyecto necesita mejorar.',
                    'aprobado' => false,
                    'respuestas' => $respuestas
                ]);
            }
        }

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Bearer " . env('CHAT_GPT_KEY')
        ])->withOptions([
            'verify' => false,
        ])->post("https://api.openai.com/v1/chat/completions", [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "user",
                    "content" => $request->post('content')
                ]
            ],
            "temperature" => 0,
            "max_tokens" => 2048
        ])->body();

        return response()->json(json_decode($response));
    }
}
