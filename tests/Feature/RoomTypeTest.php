<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Helpers\ResponseHelper;
use Tests\RefreshDatabaseTrait;

class RoomTypeTest extends TestCase
{
    use RefreshDatabaseTrait;

    /**
     * Test List room_types
     *
     * @test
     * @group feature
     * @group feature_api_admin_room_type
     * @group feature_api_admin_room_type_list
     * @return void
     */
    public function feature_api_admin_room_type_list()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.room_types.index');

        $response = $this->ajaxGet($url, $data=[], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' =>  'Standard',
            ]);
    }


    /**
     * Test Show room_type
     *
     * @test
     * @group feature
     * @group feature_api_admin_room_type
     * @group feature_api_admin_room_type_show
     * @return void
     */
    public function feature_api_admin_room_type_show()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.room_types.show', ['room_type'=>1]);

        $response = $this->ajaxGet($url, $data=[], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' =>  'Standard',
            ]);
    }


    /**
     * Test Show room_type
     *
     * @test
     * @group feature
     * @group feature_api_admin_room_type
     * @group feature_api_admin_room_type_update
     * @return void
     */
    public function feature_api_admin_room_type_update()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.room_types.update', ['room_type'=>1]);

        $response = $this->ajaxPut($url,[
            'name' =>  'Mansion',
        ], $token);

        $response->assertOk()
            ->assertJsonFragment([
                'name' =>  'Mansion',
            ]);
    }


    /**
     * Test Store room_type
     *
     * @test
     * @group feature
     * @group feature_api_admin_room_type
     * @group feature_api_admin_room_type_store
     * @return void
     */
    public function feature_api_admin_room_type_store()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.room_types.store');

        $response = $this->ajaxPost($url,[
            'name' =>  'Golden',
        ],  $token);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'name' =>  'Golden',
            ]);
    }


    /**
     * Test Delete room_type
     *
     * @test
     * @group feature
     * @group feature_api_admin_room_type
     * @group feature_api_admin_room_type_delete
     * @return void
     */
    public function feature_api_admin_room_type_destroy()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.room_types.destroy', ['room_type'=>1]);

        $response = $this->ajaxDelete($url, $data=[], $token);

        $response->assertStatus(204);
    }

    /**
     * Test Http response 404
     *
     * @test
     * @group feature
     * @group feature_api_admin_room_type
     * @group feature_api_admin_room_type_not_found
     * @return void
     */
    public function feature_api_admin_room_type_not_found()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.room_types.destroy', ['room_type'=>2]);

        $this->ajaxDelete($url, $data=[], $token);

        $response = $this->ajaxGet(route('api.v1.admin.room_types.show', ['room_type'=>2]));

        $response
            ->assertStatus(404)
            ->assertJson([
                //'message' => ResponseHelper::message('not_found'), //@todo fix custom exception handler
                'message' => "No query results for model [App\\Models\\RoomType] 2"
            ]);
    }
}
