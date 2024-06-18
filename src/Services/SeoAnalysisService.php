<?php

namespace Step2dev\LazySeo\Services;

use Step2dev\LazySeo\Models\Seo;

class SeoAnalysisService
{
    public function analyze(Seo $seo)
    {
        $results = [];

        $results['title_exists'] = !empty($seo->title);
        $results['description_exists'] = !empty($seo->description);
        $results['keywords_exists'] = !empty($seo->keywords);

        // Add more checks as needed...

        return $results;
    }
}
