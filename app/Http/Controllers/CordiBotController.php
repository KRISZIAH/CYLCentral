<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CordiBotController extends Controller
{
    public function message(Request $request)
    {
        $userMessage = $request->input('message');

        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are CordiBot from CYLC. Answer questions about CYLCentral.'],
                ['role' => 'user', 'content' => $userMessage]
            ],
        ]);

        $reply = $response['choices'][0]['message']['content'] ?? 'Sorry, something went wrong.';

        return response()->json(['reply' => $reply]);
    }
}
