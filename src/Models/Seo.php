<?php

namespace Step2dev\LazySeo\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Seo extends Model
{
    use HasTranslations;

    protected array $translatable = [
        'title',
        'description',
        'keywords',
    ];

    protected $fillable = [
        'url',
        'route_name',
    ];
}
