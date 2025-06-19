<?php

namespace Step2dev\LazySeoTools\Services;

class OgMetaService
{
    public function generate(array $data): string
    {
        return implode("\n", [
            "<meta property='og:title' content='" . e($data['title'] ?? config('app.name')) . "'>",
            "<meta property='og:description' content='" . e($data['description'] ?? '') . "'>",
            "<meta property='og:type' content='website'>",
            "<meta property='og:url' content='" . e($data['url'] ?? request()->fullUrl()) . "'>",
            "<meta property='og:image' content='" . e($data['image'] ?? asset('default-og.png')) . "'>",
        ]);
    }
}
