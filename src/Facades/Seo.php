<?php

namespace Step2dev\LazySeoTools\Facades;

use Illuminate\Support\Facades\Facade;
use Step2dev\LazySeoTools\Services\SeoManager;

class Seo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SeoManager::class;
    }
}
