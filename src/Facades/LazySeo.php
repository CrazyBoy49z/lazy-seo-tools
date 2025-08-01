<?php

namespace Step2dev\LazySeoTools\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Step2dev\LazySeoTools\LazySeo
 */
class LazySeo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Step2dev\LazySeoTools\LazySeo::class;
    }
}
