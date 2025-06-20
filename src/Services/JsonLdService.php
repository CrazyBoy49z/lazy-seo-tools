<?php

namespace Step2dev\LazySeoTools\Services;

class JsonLdService
{
    public function generateForPage(array $data): string
    {
        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $data['title'] ?? config('app.name'),
            'description' => $data['description'] ?? '',
            'url' => $data['url'] ?? request()->fullUrl(),
        ];

        return '<script type="application/ld+json">'.json_encode($json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES).'</script>';
    }
}
