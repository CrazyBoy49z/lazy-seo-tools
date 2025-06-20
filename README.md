# 🧩 step2dev/lazy-seotools

Універсальний SEO пакет для Laravel з підтримкою Livewire, Blade, OpenGraph, JSON-LD, редіректів, AI, шаблонів та інтеграцій.

## ⚙️ Встановлення

```bash
composer require step2dev/lazy-seotools
```

# 🧠 Headless режим

## Middleware

```php
protected $routeMiddleware = [
    'headless' => \Step2dev\LazySeoTools\Http\Middleware\ForceHeadless::class,
];
```

## 🧬 Можливості

- CRUD SEO для будь-якої моделі
- Редіректи (301/410) з Middleware
- Blade компоненти: title, og, json-ld
- Livewire UI (форма + таблиця редіректів)
- OpenGraph, Twitter Card, JSON-LD
- SEO аналізатор
- AI генерація meta
- SEO шаблони (по url_pattern)
- Фасад `Seo::renderMetaTags([...])`
- Інтеграція з `spatie/laravel-sitemap`

## 🔧 Публікація

```bash
php artisan vendor:publish --tag=lazy-seo-config
php artisan vendor:publish --tag=lazy-seo-views
```

## 🧪 Livewire компонент SEO Аналізу

```blade
<livewire:seo-analyzer-livewire 
    :title="$model->seo_title" 
    :description="$model->seo_description" 
    :keywords="$model->seo_keywords" 
    :content="$model->content"
/>

## 🧠 Використання

### Blade

```blade
<x-lazy-seo-title :title="$title" />
<x-lazy-seo-jsonld />
<x-lazy-seo-og />
```

### Facade

```php
use Step2dev\LazySeoTools\Facades\Seo;

Seo::renderMetaTags([
    'title' => 'About Us',
    'description' => 'This is the about us page',
]);
```

## Приклад використання

```php
Route::middleware(['headless'])->group(function () {
    Route::get('/api/seo', [SeoApiController::class, 'index']);
});
```

## 🧪 Livewire

Компоненти:
- `SeoForm`
- `RedirectTable`

## 🗺 Міграції


```bash
php artisan migrate
```

## 🧱 Підключення Middleware

У `app/Http/Kernel.php`:

```php
'web' => [
    \Step2dev\LazySeoTools\Http\Middleware\HandleSeoRedirects::class,
]
```
## 🔔 Webhook Triggers

```php
$analysis = app(\Step2dev\LazySeoTools\Services\SeoAnalyzerService::class)->analyze(
    'Title Example',
    'Description Example',
    'example',
    '<p>This is an example content with keyword: example</p>'
);
```

Повертає:

- score: 0–50
- grade: red / orange / green
- warnings: масив зауважень
## 📊 SEO Аналізатор (Yoast-style)


## 🏷 OG Image Generator

Використання:

```php
$url = app(\Step2dev\LazySeoTools\Services\OGImageService::class)
    ->generate('Laravel SEO Tools');

```php
$analysis = app(\Step2dev\LazySeoTools\Services\SeoAnalyzerService::class)->analyze(
    'Title Example',
    'Description Example',
    'example',
    '<p>This is an example content with keyword: example</p>'
);
```

Повертає:

- score: 0–50
- grade: red / orange / green
- warnings: масив зауважень
## 📊 SEO Аналізатор (Yoast-style)

Можна вказати URL у `.env`:


```
SEO_WEBHOOK_CREATED=https://your.site/webhooks/seo-created
SEO_WEBHOOK_UPDATED=https://your.site/webhooks/seo-updated
SEO_WEBHOOK_DELETED=https://your.site/webhooks/seo-deleted
```

І викликати:

```php
app(WebhookDispatcher::class)->trigger('seo.created', ['id' => 123]);
```

## 📚 Документація


echo '<meta property="og:image" content="' . $url . '" />';
```

> ⚠️ Потрібен шрифт у `resources/fonts/OpenSans-Bold.ttf`
> Використовує Intervention Image та disk `public`


## 🔗 Canonical Checker

```php
$url = request()->fullUrl();
$canonical = app(\Step2dev\LazySeoTools\Services\CanonicalService::class)
    ->resolve($model->canonical_url, $url);

$isDuplicate = app(\Step2dev\LazySeoTools\Services\CanonicalService::class)
    ->isDuplicate($model->canonical_url, $url);
```

Вивід у Blade:

```blade
<link rel="canonical" href="{{ $canonical }}">
@if ($isDuplicate)
    <!-- Canonical differs from current URL -->
@endif
```

.env:

```
OPENAI_API_KEY=your-api-key
```






## 🎯 CTR Predictor (AI)

```php
$result = app(\Step2dev\LazySeoTools\Services\CTRPredictorService::class)
    ->predict('Найкращий Laravel SEO пакет', 'Цей пакет зробить ваше SEO ідеальним!');

echo 'Очікуваний CTR: ' . $result['ctr'];
```



> Використовує OpenAI GPT-3.5. Потрібен `OPENAI_API_KEY` у `.env`.

## 🤝 Підтримка

- Laravel 10, 11, 12+
- PHP 8.2+

## 🚀 Автор

`step2dev` — створено з ❤️
