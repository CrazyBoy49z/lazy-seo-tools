<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Support\Facades\Cache;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapGeneratorService
{
    public function generate(array $items, string $path = 'sitemap.xml'): void
    {
        $sitemap = Sitemap::create();

        foreach ($items as $item) {
            $sitemap->add(Url::create($item['loc'])
                ->setLastModificationDate($item['lastmod'] ?? now())
                ->setChangeFrequency($item['freq'] ?? 'weekly')
                ->setPriority($item['priority'] ?? 0.8));
        }

        $sitemap->writeToFile(public_path($path));
    }

    public function cached(array $items, string $cacheKey = 'lazy-sitemap', int $minutes = 60): void
    {
        Cache::remember($cacheKey, now()->addMinutes($minutes), function () use ($items) {
            $this->generate($items);
        });
    }
}
