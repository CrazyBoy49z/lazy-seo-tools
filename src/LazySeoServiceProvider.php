<?php

namespace Step2dev\LazySeo;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Step2dev\LazySeo\Commands\LazySeoCommand;

class LazySeoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lazy-seo')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lazy-seo_table')
            ->hasCommand(LazySeoCommand::class);
    }
}
