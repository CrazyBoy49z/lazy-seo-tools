<?php

namespace Step2dev\LazySeoTools\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
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
        'robots',
        'canonical',
    ];

    protected $casts = [
        'robots' => 'array',
    ];

    final public function seo(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeSearch(Builder $builder, ?string $search): Builder
    {
        return $builder->when($search, function (Builder $query, string $search) {
            $query->where(function (Builder $q) use ($search) {
                $q
                    ->where('title', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->orWhere('url', 'like', '%'.$search.'%');
            });
        });
    }
}
