<?php

namespace Step2dev\LazySeoTools\Services;

use Step2dev\LazySeoTools\Models\Seo;

class SeoManager extends SeoService
{
    public function analyze(Seo $seo): array
    {
        $results = [];

        $results['title_exists'] = ! empty($seo->title);
        $results['description_exists'] = ! empty($seo->description);
        $results['keywords_exists'] = ! empty($seo->keywords);

        return $results;
    }

    public function getSeoForUrl(string $url): Seo
    {
        return Seo::where('url', $url)->first() ?: new Seo;
    }
}
