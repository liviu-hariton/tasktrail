<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileDelete
{
    public function deleteFile($path, $disk): false|string
    {
        if(Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);

            return true;
        }

        return false;
    }
}
