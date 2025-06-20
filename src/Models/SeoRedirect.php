<?php

namespace Step2dev\LazySeoTools\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $old_url
 * @property string $new_url
 * @property int $status_code
 */
class SeoRedirect extends Model
{
    protected $fillable = [
        'old_url',
        'new_url',
        'status_code',
    ];
}
