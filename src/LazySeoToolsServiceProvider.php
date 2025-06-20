<?php

namespace Step2dev\LazySeoTools;

use Illuminate\Support\ServiceProvider;
use Step2dev\LazySeoTools\View\Components\JsonLdComponent;
use Step2dev\LazySeoTools\View\Components\OgComponent;
use Step2dev\LazySeoTools\View\Components\TitleComponent;

class LazySeoToolsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/lazy-seo.php', 'lazy-seo');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lazy-seo');
        $this->publishes([
            __DIR__.'/../config/lazy-seo.php' => config_path('lazy-seo.php'),
        ], 'lazy-seo-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/lazy-seo'),
        ], 'lazy-seo-views');

        $this->registerComponents();
    }

    protected function registerComponents(): void
    {
        \Illuminate\Support\Facades\Blade::component('lazy-seo-title', TitleComponent::class);
        \Illuminate\Support\Facades\Blade::component('lazy-seo-jsonld', JsonLdComponent::class);
        \Illuminate\Support\Facades\Blade::component('lazy-seo-og', OgComponent::class);
    }
}
