<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Support\Facades\Http;

class AISeoService
{
    public function generateMeta(string $content): array
    {
        $response = Http::withToken(config('lazy-seo.ai_token'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are an SEO assistant.'],
                    ['role' => 'user', 'content' => 'Generate SEO title, description, keywords for: '.$content],
                ],
            ]);

        $result = $response->json();

        return [
            'title' => $result['choices'][0]['message']['content'] ?? 'Generated Title',
            'description' => '',
            'keywords' => '',
        ];
    }
}
