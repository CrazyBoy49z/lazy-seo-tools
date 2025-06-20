<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Support\Facades\URL;

class CanonicalService
{
    public function resolve(?string $canonical, string $currentUrl): string
    {
        if ($canonical) {
            return $canonical;
        }

        return URL::to($currentUrl);
    }

    public function isDuplicate(?string $canonical, string $currentUrl): bool
    {
        return $canonical && trim($canonical, '/') !== trim(URL::to($currentUrl), '/');
    }
}
