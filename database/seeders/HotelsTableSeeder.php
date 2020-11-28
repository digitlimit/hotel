<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class HotelsTableSeeder extends Seeder
{
    /**
     * Create Image
     *
     * @param $faker
     * @param $id
     * @return mixed
     */
    protected function createImage($faker)
    {
        //image path
        $path = storage_path("app/public/hotel");

        //create path if not exists
        if(!File::exists($path)){
            File::makeDirectory($path, $mode = 0775, $recursive = true);
        }

        //faker generate and save image to path
        return $faker->image($path, 400,300, 'city', false);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO: We could use faker but decided to manually insert known values
        //TODO: so we could assert in tests

        DB::table('hotels')->delete();

        //insert rows
        DB::table('hotels')->insert([
            [
                'name'           => 'NobleDEN Hotel',
                'address'        => '196 Grand Street, Little Italy, New York, NY 10013, USA',
                'city'           => 'New York',
                'state'          => 'New York',
                'country'        => 'United States',
                'zip_code'       => '43002',
                'phone'          => '012345667966',
                'email'          => 'info@nobeldenhotel.com',
                'image'          => 'hotels/1/hotel.jpg',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
