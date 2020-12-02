<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Helpers\ResponseHelper;
use App\Helpers\PathHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\RefreshDatabaseTrait;

class HotelTest extends TestCase
{
    use RefreshDatabaseTrait;

    /**
     * Test Show hotel
     *
     * @test
     * @group feature
     * @group feature_api_admin_hotel
     * @group feature_api_admin_hotel_show
     * @return void
     */
    public function feature_api_admin_hotel_show()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.hotels.show', ['hotel'=>1]);

        $response = $this->ajaxGet($url, $data=[], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' =>  1,
                'name' =>  'NobleDEN Hotel',
                'address' =>  '196 Grand Street, Little Italy, New York, NY 10013, USA',
                'city' =>  'New York',
                'state' =>  'New York',
                'country' =>  'United States',
                'zip_code' =>  '43002',
                'phone' =>  '012345667966',
                'email' =>  'info@nobeldenhotel.com'
            ]);
    }


    /**
     * Test Show hotel
     *
     * @test
     * @group feature
     * @group feature_api_admin_hotel
     * @group feature_api_admin_hotel_update
     * @return void
     */
    public function feature_api_admin_hotel_update()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.hotels.update', ['hotel'=>1]);

        $response = $this->ajaxPut($url,[
            'name' =>  'Bolingo Hotel',
            'address' =>  '300 Grand Street, Little Italy, New York, NY 10013, USA',
            'city' =>  'New York',
            'state' =>  'New York',
            'country' =>  'United States',
            'zip_code' =>  '43002',
            'phone' =>  '012345667966',
            'email' =>  'info@nobeldenhotel.com',
            'image' => UploadedFile::fake()->image('hotel.jpg')
        ], $token);

        //extract data
        $data = $response->decodeResponseJson()['data'];

        $path = PathHelper::image('hotel') . "/" . basename($data['image']);

        // Assert the file was stored...
        Storage::disk('public')->assertExists($path);

        $response->assertOk()
            ->assertJsonFragment([
                'name' =>  'Bolingo Hotel',
                'address' =>  '300 Grand Street, Little Italy, New York, NY 10013, USA',
            ]);
    }
}
