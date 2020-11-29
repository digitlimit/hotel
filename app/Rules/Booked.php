<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Helpers\BookingHelper;

class Booked implements Rule
{
    protected $start_date;

    protected $end_date;

    protected $booking_id;

    /**
     * Create a new rule instance.
     *
     * Booked constructor.
     * @param $start_date
     * @param $end_date
     * @param $booking_id
     */
    public function __construct($start_date, $end_date, $booking_id=null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->booking_id = $booking_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $room_id
     * @return bool
     */
    public function passes($attribute, $room_id)
    {
        $total = BookingHelper::isBooked(
            $room_id,
            $this->start_date,
            $this->end_date,
            $this->booking_id
        );

        //return true or false depending on whether
        // the attribute value is valid or not
        //True mean its valid
        return !$total ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Room is already booked for $this->start_date and $this->end_date";
    }
}
