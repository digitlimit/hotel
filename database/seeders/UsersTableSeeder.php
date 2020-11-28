<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                //'role_id'           => 1, //admin
                'name'              => 'Admin',
                'email'             => 'admin@hotels.com',
                'password'          => bcrypt(env('DEFAULT_PASSWORD')),
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
