<?php

namespace App\Observers;
use App\Models\Room;

class RoomObserver
{
    /**
     * Run before create
     *
     * @param Room $room
     */
    public function creating(Room $room)
    {
        $room->hotel_id = $room->hotel_id ? $room->hotel_id : config('global.default_hotel_id');
    }


    /**
     * Run before updating
     *
     * @param Room $room
     */
    public function updating(Room $room)
    {
        $room->hotel_id = $room->hotel_id ? $room->hotel_id : config('global.default_hotel_id');
    }
}
