<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            [
                'name'         => 'administrator',
                'display_name' => 'Administrator',
                'description'  => 'Hotel administrator'
            ],
            [
                'name'         => 'customer',
                'display_name' => 'Customer',
                'description'  => 'Hotel guests'
            ],
        ]);
    }
}
