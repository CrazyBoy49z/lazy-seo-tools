<?php

namespace Step2dev\LazySeoTools\Models;

use Illuminate\Database\Eloquent\Model;

class SeoRedirect  extends Model
{
    protected $fillable = [
        'old_url',
        'new_url',
        'status_code',
    ];

}
