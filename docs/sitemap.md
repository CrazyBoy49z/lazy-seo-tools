## 🗺 Sitemap Generator

```php
use Step2dev\LazySeoTools\Services\SitemapGeneratorService;

$items = [
    ['loc' => '/about', 'lastmod' => now()],
];

app(SitemapGeneratorService::class)->generate($items);
```
