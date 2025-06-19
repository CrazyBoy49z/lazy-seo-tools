# Class `LazySeoToolsServiceProvider`

## Method `register()`

## Method `boot()`

## Method `registerComponents()`

# Class `Seo`

```php
/**
* @see \Step2dev\LazySeoTools\Services\SeoService
*/
```

# Class `SeoForm`

## Method `save()`

## Method `render()`

# Class `RedirectTable`

## Method `render()`

# Class `HandleSeoRedirects`

## Method `handle()`

# Class `AISeoWriterService`

## Method `generateMeta()`

# Class `JsonLdService`

## Method `generateForPage()`

# Class `OgMetaService`

## Method `generate()`

# Class `SitemapGeneratorService`

## Method `generate()`

## Method `cached()`

# Class `TitleComponent`

## Method `__construct()`

## Method `render()`

# Class `JsonLdComponent`

## Method `render()`

# Class `OgComponent`

## Method `render()`

# Class `SeoTest`

## Method `it_can_create_seo_entry()`

```php
/** @test */
```

# Class `RedirectTest`

## Method `it_handles_redirect_properly()`

```php
/** @test */
```

---

## 💡 Приклади використання

### 🧩 Blade компоненти

```blade
<x-lazy-seo-title :title="'Головна сторінка'" />
<x-lazy-seo-jsonld />
<x-lazy-seo-og />
```

### 🧠 Facade Seo::

```php
use Step2dev\LazySeoTools\Facades\Seo;

Seo::renderMetaTags([
    'title' => 'Про нас',
    'description' => 'Сторінка з інформацією про нас',
    'keywords' => 'about, company, info',
]);
```

### ⚙️ Middleware (Redirects)

```php
// Kernel.php
'web' => [
    \Step2dev\LazySeoTools\Http\Middleware\HandleSeoRedirects::class,
]
```

### 🧪 Livewire SEO Форма

```blade
<livewire:seo-form :model="$page" />
```

### 🗺 Генерація Sitemap

```php
use Step2dev\LazySeoTools\Services\SitemapGeneratorService;

$items = [
    ['loc' => '/about', 'lastmod' => now(), 'freq' => 'monthly', 'priority' => 0.6],
];

app(SitemapGeneratorService::class)->generate($items);
```

---
