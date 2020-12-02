<?php namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{

    public static function url($path)
    {
        return asset(Storage::url($path));
    }

}