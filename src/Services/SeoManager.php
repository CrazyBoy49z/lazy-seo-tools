<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Database\Eloquent\Model;
use Step2dev\LazySeoTools\Models\Seo;

class SeoManager
{
    public function createOrUpdateSeo(Model $model, array $seoData)
    {
        return $model->seo()->updateOrCreate(
            ['seoable_id' => $model->id, 'seoable_type' => get_class($model)],
            $seoData
        );
    }

    public function getSeo(Model $model)
    {
        return $model->seo ?: new Seo;
    }

    public function analyze(Seo $seo): array
    {
        $results = [];

        $results['title_exists'] = ! empty($seo->title);
        $results['description_exists'] = ! empty($seo->description);
        $results['keywords_exists'] = ! empty($seo->keywords);

        return $results;
    }

    public function getSeoForUrl(string $url): Seo
    {
        return Seo::where('url', $url)->first() ?: new Seo;
    }
}
