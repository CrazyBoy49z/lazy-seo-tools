<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Database\Eloquent\Model;
use Step2dev\LazySeoTools\Models\Seo;

class SeoService
{
    public function createOrUpdateSeo(Model $model, array $seoData): Seo
    {
        $model->seo()->updateOrCreate(
            [
                'seoable_id' => $model->id,
                'seoable_type' => get_class($model),
            ],
            $seoData
        );

        return $this->getSeo($model);
    }

    public function getSeo(Model $model): Seo
    {
        return $model->seo ?: new Seo;
    }
}
