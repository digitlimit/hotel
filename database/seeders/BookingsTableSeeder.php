<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Carbon\Carbon;
use App\Helpers\BookingHelper;

class BookingsTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO: We could use faker but decided to manually insert known values
        //TODO: so we could assert in tests
        DB::table('bookings')->delete();

        $dates = [
            ['start' => '2019-06-29', 'end' => '2019-06-30'],
            ['start' => '2019-07-01', 'end' => '2019-07-05'],
            ['start' => '2019-07-06', 'end' => '2019-07-09'],
            ['start' => '2019-07-10', 'end' => '2019-07-13'],
            ['start' => '2019-07-15', 'end' => '2019-07-16'],
            ['start' => '2019-07-17', 'end' => '2019-07-19'],
            ['start' => '2019-07-20', 'end' => '2019-07-22'],
            ['start' => '2019-07-23', 'end' => '2019-07-24'],
            ['start' => '2019-07-25', 'end' => '2019-07-28'],
            ['start' => '2019-07-29', 'end' => '2019-07-30']
        ];

        DB::table('bookings')->insert([
            [
                'room_id'                 => 1,
                'user_id'                 => 3,
                'customer_fullname'       => 'Philip Smith',
                'customer_email'          => 'philip@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[0]['start'],$dates[0]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[0]['start'],$dates[0]['end']),
                'start_date'              => $dates[0]['start'],
                'end_date'                => $dates[0]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 2,
                'user_id'                 => 3,
                'customer_fullname'       => 'Samuel Jackson',
                'customer_email'          => 'sam@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[1]['start'],$dates[1]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[1]['start'],$dates[1]['end']),
                'start_date'              => $dates[1]['start'],
                'end_date'                => $dates[1]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 3,
                'user_id'                 => null,
                'customer_fullname'       => 'Pamela Rose',
                'customer_email'          => 'rose@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[2]['start'],$dates[2]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[2]['start'],$dates[2]['end']),
                'start_date'              => $dates[2]['start'],
                'end_date'                => $dates[2]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 4,
                'user_id'                 => null,
                'customer_fullname'       => 'James Bond',
                'customer_email'          => 'james@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[3]['start'],$dates[3]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[3]['start'],$dates[3]['end']),
                'start_date'              => $dates[3]['start'],
                'end_date'                => $dates[3]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 5,
                'user_id'                 => null,
                'customer_fullname'       => 'Kelvin Jones',
                'customer_email'          => 'jones@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[4]['start'],$dates[4]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[4]['start'],$dates[4]['end']),
                'start_date'              => $dates[4]['start'],
                'end_date'                => $dates[4]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 6,
                'user_id'                 => null,
                'customer_fullname'       => 'Laura Soft',
                'customer_email'          => 'laura@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[5]['start'],$dates[5]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[5]['start'],$dates[5]['end']),
                'start_date'              => $dates[5]['start'],
                'end_date'                => $dates[5]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 7,
                'user_id'                 => null,
                'customer_fullname'       => 'Franklin Smith',
                'customer_email'          => 'frank@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[6]['start'],$dates[6]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[6]['start'],$dates[6]['end']),
                'start_date'              => $dates[6]['start'],
                'end_date'                => $dates[6]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 8,
                'user_id'                 => null,
                'customer_fullname'       => 'Rita Dom',
                'customer_email'          => 'rita@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[7]['start'],$dates[7]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[7]['start'],$dates[7]['end']),
                'start_date'              => $dates[7]['start'],
                'end_date'                => $dates[7]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 9,
                'user_id'                 => null,
                'customer_fullname'       => 'Jessica Smith',
                'customer_email'          => 'jessy@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[8]['start'],$dates[8]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[8]['start'],$dates[8]['end']),
                'start_date'              => $dates[8]['start'],
                'end_date'                => $dates[8]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ],

            [
                'room_id'                 => 10,
                'user_id'                 => null,
                'customer_fullname'       => 'Genevieve Bush',
                'customer_email'          => 'genny@gmail.com',
                'total_nights'            => BookingHelper::calculateTotalNights($dates[9]['start'],$dates[9]['end']),
                'total_price'             => BookingHelper::calculateTotalPrice(1, $dates[9]['start'],$dates[9]['end']),
                'start_date'              => $dates[9]['start'],
                'end_date'                => $dates[9]['end'],
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s')
            ]
        ]);

//        //store roles
//        $rows = [];
//
//        for($i = 1; $i <= 10; $i++) {
//
//            $year = date('Y');
//            $month = mt_rand(date('m'), 12);
//            $day=mt_rand(1,28);
//            $booked_days = mt_rand(1,28); //days to book
//
//            $date = Carbon::create($year, $month, $day, 0, 0, 0);
//            $start_date = $date->format('Y-m-d H:i:s');
//            $end_date = $date->addDays($booked_days)->format('Y-m-d H:i:s');
//
//            $rows[] = [
//                'room_id'                 => mt_rand(1,10),
//                'user_id'                 => mt_rand(2,3),
//                'customer_fullname'       => $faker->name(),
//                'customer_email'          => $faker->email,
//                'total_nights'            => 3,
//                'total_price'             => 3999,
//                'start_date'              => $start_date,
//                'end_date'                => $end_date,
//                'created_at'              => date('Y-m-d H:i:s'),
//                'updated_at'              => date('Y-m-d H:i:s')
//            ];
//        }

        //insert rows
    }
}
