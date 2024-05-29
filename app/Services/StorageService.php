<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public static function upload(UploadedFile $image): string
    {
        $origin_ext = $image->getClientOriginalExtension();
        $image_name = time() . '.' . $origin_ext;
        $image->storeAs('public/images', $image_name);

        return 'images/' . $image_name;
    }

    public static function delete(string $path)
    {
        $f_path = 'public/' . $path; // Formatted path

        if (Storage::has($f_path)) {
            Storage::delete($f_path);
        }
    }
}