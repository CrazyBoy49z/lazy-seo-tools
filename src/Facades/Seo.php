<?php

namespace Step2dev\LazySeoTools\Facades;

use Illuminate\Support\Facades\Facade;
use Step2dev\LazySeo\Services\SeoManager;

class Seo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SeoManager::class;
    }
}
