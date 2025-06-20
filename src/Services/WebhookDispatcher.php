<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Support\Facades\Http;

class WebhookDispatcher
{
    public function trigger(string $event, array $payload = []): void
    {
        $webhookUrl = config("lazy-seo.webhooks.{$event}");

        if ($webhookUrl) {
            Http::post($webhookUrl, $payload);
        }
    }
}
