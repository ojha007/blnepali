<?php

namespace App\Listeners;

use Intervention\Image\Facades\Image;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;

class ResizeUploadedImage
{
    public function handle(ImageWasUploaded $event): void
    {
        $image = Image::make($event->path());

        if ($image->width() <= 1000) {
            return;
        }

        $path = $event->path();

        $image->encode('webp')
            ->resize(1280, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
    }
}
