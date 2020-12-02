<?php namespace App\Helpers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use App\Exceptions\BookingException;

class BookingHelper{

    /**
     * Calculate nights between booking dates
     *
     * @param $start_date
     * @param $end_date
     * @return int
     */
    public static function calculateTotalNights($start_date, $end_date)
    {
        //start date
        $start_date = new Carbon($start_date);

        //end date
        $end_date = new Carbon($end_date);

        //return difference in days (int)
        return $start_date->diffInDays($end_date);
    }


    public static function calculateTotalPrice($room_id, $start_date, $end_date)
    {
        //find room_id or fail with and exception
        $room = Room::findOrFail($room_id);

        //room type price
        $amount = $room->room_type->price->amount;

        //calculate days
        $days = self::calculateTotalNights($start_date, $end_date);

        //TODO:
        //if difference is zero. This should never happen, check-in date and check-out date
        //must be different. Throw an exception

        return $amount * $days;
    }

    public static function calculateTotalNightsPrice($room_id, $total_nights)
    {
        //find room_id or fail with and exception
        $room = Room::findOrFail($room_id);

        //room type price
        $amount = $room->room_type->price->amount;

        return $amount * $total_nights;
    }

    public static function isBooked($room_id, $start_date, $end_date, $booking_id)
    {
        $from = min($start_date, $end_date);
        $until = max($start_date, $end_date);

        $booking = Booking::where('start_date', '<=', $from)
        ->where('end_date', '>=', $until)
        ->where('room_id', $room_id);

        //exempt the given booking ID if any
        if($booking_id){
            $booking->where('id', '!=', $booking_id);
        }

        return $booking->count();
    }

    public static function allBooked($room_id, $start_date, $end_date){
        return Booking::where('start_date', '<=', new Carbon($start_date))
            ->where('end_date', '>=', new Carbon($end_date))
            ->where('room_id', $room_id)
            ->get();
    }
}
