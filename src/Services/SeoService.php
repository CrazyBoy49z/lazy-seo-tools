<?php

namespace Step2dev\LazySeo\Services;

class SeoService
{
    public function createOrUpdateSeo(Model $model, array $seoData)
    {
        $seo = $model->seo()->updateOrCreate(
            ['seoable_id' => $model->id, 'seoable_type' => get_class($model)],
            $seoData
        );

        return $seo;
    }

    public function getSeo(Model $model)
    {
        return $model->seo ?: new Seo;
    }
}
