<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class PricesTableSeeder extends Seeder
{
    /**
     * Fetch room type ID for a given room name
     * @param $name
     * @return mixed
     */
    protected function roomTypeId($name)
    {
        return DB::table('room_types')
            ->where('name', $name)
            ->select('id')->first()->id;
    }

    /**
     * Fetch room capacity ID for a given room name
     * @param $name
     * @return mixed
     */
    protected function roomCapacityId($name)
    {
        return DB::table('room_capacities')
            ->where('name', $name)
            ->select('id')->first()->id;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('prices')->delete();

        DB::table('prices')->insert([

            //Regular Prices
            [
                'room_type_id'      => $this->roomTypeId('Standard'),
                'currency'          => config('global.default_currency'),
                'amount'            => 50.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Deluxe'),
                'currency'          => config('global.default_currency'),
                'amount'             => 100.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Superior'),
                'currency'          => config('global.default_currency'),
                'amount'             => 150.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Premier'),
                'currency'          => config('global.default_currency'),
                'amount'             => 200.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Dazzle'),
                'currency'          => config('global.default_currency'),
                'amount'             => 250.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Duke'),
                'currency'          => config('global.default_currency'),
                'amount'             => 300.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Prestige'),
                'currency'          => config('global.default_currency'),
                'amount'             => 350.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Honeymoon'),
                'currency'          => config('global.default_currency'),
                'amount'             => 400.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Super Deluxe'),
                'currency'          => config('global.default_currency'),
                'amount'             => 450.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'room_type_id'      => $this->roomTypeId('Prime Deluxe'),
                'currency'          => config('global.default_currency'),
                'amount'             => 500.00,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
