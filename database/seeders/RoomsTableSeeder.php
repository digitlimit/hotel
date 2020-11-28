<?php

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

        DB::table('rooms')->delete();

        //insert rows
        DB::table('rooms')->insert([
            [
                'name'              => 'A1',
                'room_type_id'      => $this->roomTypeId('Standard'),
                'hotel_id'          => 1,
                'image'             => 'rooms/1/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'A2',
                'room_type_id'      => $this->roomTypeId('Deluxe'),
                'hotel_id'          => 1,
                'image'             => 'rooms/2/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'A3',
                'room_type_id'      => $this->roomTypeId('Superior'),
                'hotel_id'          => 1,
                'image'             => 'rooms/2/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'B1',
                'room_type_id'      => $this->roomTypeId('Premier'),
                'hotel_id'          => 1,
                'image'             => 'rooms/4/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'B2',
                'room_type_id'      => $this->roomTypeId('Dazzle'),
                'hotel_id'          => 1,
                'image'             => 'rooms/5/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'B3',
                'room_type_id'      => $this->roomTypeId('Duke'),
                'hotel_id'          => 1,
                'image'             => 'rooms/6/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'C1',
                'room_type_id'      => $this->roomTypeId('Prestige'),
                'hotel_id'          => 1,
                'image'             => 'rooms/7/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'C2',
                'room_type_id'      => $this->roomTypeId('Honeymoon'),
                'hotel_id'          => 1,
                'image'             => 'rooms/8/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'C3',
                'room_type_id'      => $this->roomTypeId('Super Deluxe'),
                'hotel_id'          => 1,
                'image'             => 'rooms/9/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],

            [
                'name'              => 'D1',
                'room_type_id'      => $this->roomTypeId('Prime Deluxe'),
                'hotel_id'          => 1,
                'image'             => 'rooms/10/room.jpg',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
