<?php

namespace App\Ai;

use Illuminate\Support\Facades\Http;

class Chat
{
    protected array $messages = [];

    public function systemMessage(string $message): static
    {
        $this->messages[] = [
            'role' => 'assistant',
            'content' => $message
        ];

        return $this;
    }

    public function send(string $message): string
    {
        $this->messages[] = [
            'role' => 'user',
            'content' => $message
        ];

        $response = Http::withToken(env('OPEN_AI_API_KEY'))
        ->post('https://api.openai.com/v1/chat/completions', [
            "model" => "gpt-4o-mini",
            "messages" => $this->messages
        ])->json('choices.0.message.content');

        $this->messages = [
            'role' => 'assistant',
            'content' => $response
        ];

        return $response;
    }


    public function messages()
    {
        return $this->messages;
    }
}
