<?php namespace App\Helpers;

class PathHelper
{
    public static function image($type)
    {
        return config("global.paths.image.{$type}");
    }

}
