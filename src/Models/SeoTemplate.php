<?php

namespace Step2dev\LazySeoTools\Models;

use Illuminate\Database\Eloquent\Model;

class SeoTemplate extends Model
{
    protected $fillable = [
        'url_pattern',
        'title',
        'description',
        'keywords',
    ];
}
