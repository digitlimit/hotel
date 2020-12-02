<?php namespace App\Helpers;

class TestHelper
{

    public static function bookingDates()
    {
        //we want a date like this
       // $dates = [
        //     ['start' => '2020-11-29', 'end' => '2020-06-30'],
        //     ['start' => '2020-12-01', 'end' => '2020-12-05'],
        //     ['start' => '2020-12-06', 'end' => '2020-12-09'],
        //     ['start' => '2020-12-10', 'end' => '2020-12-13'],
        //     ['start' => '2020-12-15', 'end' => '2020-12-16'],
        //     ['start' => '2020-12-17', 'end' => '2020-12-19'],
        //     ['start' => '2020-12-20', 'end' => '2020-12-22'],
        //     ['start' => '2020-12-23', 'end' => '2020-12-24'],
        //     ['start' => '2020-12-25', 'end' => '2020-12-28'],
        //     ['start' => '2020-12-29', 'end' => '2020-12-30']
        // ];

        $dates = [];

        $no_of_bookings = 10;

        for($i = 0; count($dates) < $no_of_bookings; $i++){

            //get a date like this YYYY-MM-DD, starting from current date
            $start = date("Y-m-d", strtotime('+'. $i .' days'));

            $i += 3; //interval of 3 days

            //get a date like this YYYY-MM-DD, starting from current date plus 3 days
            $end = date("Y-m-d", strtotime('+'. $i .' days'));

            $dates[] = ['start' => $start, 'end' => $end];
        }

        return $dates;
    }

}
