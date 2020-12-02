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

class RoomTest extends TestCase
{
    use RefreshDatabaseTrait;

    /**
     * Test List rooms
     *
     * @test
     * @group feature
     * @group feature_api_admin_room
     * @group feature_api_admin_room_list
     * @return void
     */
    public function feature_api_admin_room_list()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.rooms.index');

        $response = $this->ajaxGet($url, $data=[], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' =>  'A1',
                'hotel_id' =>  '1',
                'room_type_id' =>  '1',
            ]);
    }


    /**
     * Test Show room
     *
     * @test
     * @group feature
     * @group feature_api_admin_room
     * @group feature_api_admin_room_show
     * @return void
     */
    public function feature_api_admin_room_show()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.rooms.show', ['room'=>1]);

        $response = $this->ajaxGet($url, $data=[], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' =>  'A1',
                'hotel_id' =>  '1',
                'room_type_id' =>  '1',
            ]);
    }


    /**
     * Test Show room
     *
     * @test
     * @group feature
     * @group feature_api_admin_room
     * @group feature_api_admin_room_update
     * @return void
     */
    public function feature_api_admin_room_update()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.rooms.update', ['room'=>1]);

        $response = $this->ajaxPut($url,[
            'id' => 1,
            'name' =>  'E1',
            'room_type_id' =>  '1',
        ], $token);

        $response->assertOk()
            ->assertJsonFragment([
                'id' => 1,
                'name' =>  'E1',
                'room_type_id' =>  '1',
            ]);
    }


    /**
     * Test Store room
     *
     * @test
     * @group feature
     * @group feature_api_admin_room
     * @group feature_api_admin_room_store
     * @return void
     */
    public function feature_api_admin_room_store()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.rooms.store');

        $response = $this->ajaxPost($url ,[
            'name' =>  'E5',
            'hotel_id' =>  '1',
            'room_type_id' =>  '1',
            //'room_capacity_id' => //@todo create room capacity
            'image' => UploadedFile::fake()->image('room.jpg')
        ], $token);

        //extract data
        $data = $response->decodeResponseJson()['data'];

        $path = PathHelper::image('room') . "/" . basename($data['image']);

        // Assert the file was stored...
        Storage::disk('public')->assertExists($path);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'id' => 11,
                'name' =>  'E5',
                'hotel_id' =>  '1',
                'room_type_id' =>  '1',
            ]);
    }


    /**
     * Test Delete room
     *
     * @test
     * @group feature
     * @group feature_api_admin_room
     * @group feature_api_admin_room_delete
     * @return void
     */
    public function feature_api_admin_room_destroy()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.rooms.destroy', ['room'=>1]);

        $response = $this->ajaxDelete($url, $data=[], $token);

        $response->assertStatus(204);
    }

    /**
     * Test Http response 404
     *
     * @test
     * @group feature
     * @group feature_api_admin_room
     * @group feature_api_admin_room_not_found
     * @return void
     */
    public function feature_api_admin_room_not_found()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.rooms.destroy', ['room'=>2]);

        $this->ajaxDelete($url, $data=[], $token);

        $response = $this->ajaxGet(route('api.v1.admin.rooms.show', ['room'=>2]));

        $response
            ->assertStatus(404)
            ->assertJson([
                //'message' => ResponseHelper::message('not_found'), //@todo fix custom exception handler
                'message' => "No query results for model [App\\Models\\Room] 2"
            ]);
    }
}
