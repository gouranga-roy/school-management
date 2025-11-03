<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class GlobalHelper
{
    /**
     * Upload a file to the public storage.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @return string|null
     */
    public static function uploadFile(UploadedFile $file, string $folder): ?string
    {
        if ($file && $file->isValid()) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs($folder, $fileName, 'public');
            return $path;
        }

        return null;
    }
}
