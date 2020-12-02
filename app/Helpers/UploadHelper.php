<?php namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadHelper
{

    /**
     * Upload Hotel Image
     *
     * @param UploadedFile $image
     * @return bool|string
     */
    public static function uploadHotelImage(UploadedFile $image)
    {
        if(!$image->isValid()){
            return null;
        }

        //generate filename
        $filename = Str::random()
            . "_hotel"
            . "." . $image->getClientOriginalExtension();


        //generate file path
        $path = PathHelper::image('hotel');

        //upload profile pix
        if(!$path = $image->storeAs($path, $filename, 'public')) {
            return null;
        }

        return $path;
    }


    /**
     * Upload Room Image
     *
     * @param UploadedFile $image
     * @param $room_name
     * @return bool|string
     */
    public static function uploadRoomImage(UploadedFile $image, $room_name)
    {
        if(!$image->isValid()){
            return null;
        }

        //generate filename
        $filename = 'room'
            . "_" . strtolower($room_name)
            . "." . $image->getClientOriginalExtension();

        //generate file path
        $path = PathHelper::image('room');

//        dd($path);

        //upload profile pix
        if(!$path = $image->storeAs($path, $filename, 'public')) {
            return null;
        }

        return $path;
    }
}