<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class RoomsTableSeeder extends Seeder
{
    protected function createImage($faker, $id)
    {
        //image path
        $path = storage_path("app/public/rooms/{$id}");

        //create path if not exists
        if(!File::exists($path)){
            File::makeDirectory($path, $mode = 0775, $recursive = true);
        }

        //faker generate and save image to path
        return $faker->image($path, 400,300, 'city', false);
    }

     /**
     * Fetch hotel ID
     * @return mixed
     */
    protected function hotelId()
    {
        return 1;
        //@TODO return default hotel or random
    }

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
        return 1;

        //@TODO fix
        // return DB::table('room_capacities')
        //     ->where('name', $name)
        //     ->select('id')->first()->id;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('rooms')->delete();

        //insert rows
        DB::table('rooms')->insert([
            [
                'name'              => 'A1',
                'room_type_id'      => $this->roomTypeId('Standard'),
                'room_capacity_id'  => $this->roomCapacityId('Standard'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/1/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'A2',
                'room_type_id'      => $this->roomTypeId('Deluxe'),
                'room_capacity_id'  => $this->roomCapacityId('Deluxe'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/2/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'A3',
                'room_type_id'      => $this->roomTypeId('Superior'),
                'room_capacity_id'  => $this->roomCapacityId('Superior'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/2/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'B1',
                'room_type_id'      => $this->roomTypeId('Premier'),
                'room_capacity_id'  => $this->roomCapacityId('Premier'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/4/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'B2',
                'room_type_id'      => $this->roomTypeId('Dazzle'),
                'room_capacity_id'  => $this->roomCapacityId('Dazzle'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/5/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'B3',
                'room_type_id'      => $this->roomTypeId('Duke'),
                'room_capacity_id'  => $this->roomCapacityId('Duke'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/6/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'C1',
                'room_type_id'      => $this->roomTypeId('Prestige'),
                'room_capacity_id'  => $this->roomCapacityId('Prestige'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/7/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'C2',
                'room_type_id'      => $this->roomTypeId('Honeymoon'),
                'room_capacity_id'  => $this->roomCapacityId('Honeymoon'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/8/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'C3',
                'room_type_id'      => $this->roomTypeId('Super Deluxe'),
                'room_capacity_id'  => $this->roomCapacityId('Super Deluxe'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/9/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'D1',
                'room_type_id'      => $this->roomTypeId('Prime Deluxe'),
                'room_capacity_id'  => $this->roomCapacityId('Prime Deluxe'),
                'hotel_id'          => $this->hotelId(),
                'image'             => 'rooms/10/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
