<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Support\Facades\Http;

class CTRPredictorService
{
    public function predict(string $title, string $description): array
    {
        $prompt = "Оціни ймовірність кліку за результатом пошуку:

Title: {$title}
Description: {$description}

Відповідь у форматі: CTR: %, Коментар.";

        $response = Http::withToken(config('lazy-seo.ai_token'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

        $content = $response->json()['choices'][0]['message']['content'] ?? '';

        preg_match('/CTR: (\d+%)/', $content, $ctrMatch);
        $ctr = $ctrMatch[1] ?? 'N/A';

        return [
            'raw' => $content,
            'ctr' => $ctr,
        ];
    }
}
