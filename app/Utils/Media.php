<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait Media
{
    public function uploads($file, $path)
    {
        if ($file) {

            $fileName   = time();
            $fileType  = $file->getClientOriginalExtension();
            $filePath   = $path . $fileName . '.' . $fileType;
            Storage::disk('public')->put($filePath, File::get($file));

            return $filePath;
        }
    }
}
