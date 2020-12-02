<?php

namespace App\Observers;

use App\Models\Booking;
use App\Helpers\BookingHelper;

class BookingObserver
{
    /**
     * Run before create
     *
     * @param Booking $booking
     */
    public function creating(Booking $booking)
    {
        //calculate total nights
        $total_nights = BookingHelper::calculateTotalNights($booking->start_date, $booking->end_date);

        //calculate total price based on total nights
        $total_price = BookingHelper::calculateTotalNightsPrice($booking->room_id, $total_nights);

        $booking->total_nights = $total_nights;
        $booking->total_price = $total_price;
    }


    /**
     * Run before updating
     *
     * @param Booking $booking
     */
    public function updating(Booking $booking)
    {
        //calculate total nights
        $total_nights = BookingHelper::calculateTotalNights($booking->start_date, $booking->end_date);

        //calculate total price based on total nights
        $total_price = BookingHelper::calculateTotalNightsPrice($booking->room_id, $total_nights);

        $booking->total_nights = $total_nights;
        $booking->total_price = $total_price;
    }

}
