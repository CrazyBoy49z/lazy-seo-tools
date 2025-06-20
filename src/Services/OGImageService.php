<?php

namespace Step2dev\LazySeoTools\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class OGImageService
{
    public function generate(string $title, ?string $path = null): string
    {
        $img = Image::canvas(1200, 630, '#f9fafb');
        $img->text($title, 100, 315, function ($font) {
            $font->file(__DIR__.'/../../resources/fonts/OpenSans-Bold.ttf');
            $font->size(48);
            $font->color('#111827');
            $font->align('left');
            $font->valign('center');
        });

        $path ??= 'og/'.md5($title).'.png';

        Storage::disk('public')->put($path, (string) $img->encode('png'));

        return Storage::url($path);
    }
}
