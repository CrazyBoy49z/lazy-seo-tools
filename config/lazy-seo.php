<?php

return [
    'webhooks' => [
        'seo.created' => env('SEO_WEBHOOK_CREATED', null),
        'seo.updated' => env('SEO_WEBHOOK_UPDATED', null),
        'seo.deleted' => env('SEO_WEBHOOK_DELETED', null),
    ],
    'ai_token' => env('OPENAI_API_KEY'),
];
