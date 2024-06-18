<?php

namespace Step2dev\LazySeo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Step2dev\LazySeo\LazySeo
 */
class LazySeo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Step2dev\LazySeo\LazySeo::class;
    }
}
