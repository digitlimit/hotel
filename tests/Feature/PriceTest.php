<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Helpers\ResponseHelper;
use Tests\RefreshDatabaseTrait;

class PriceTest extends TestCase
{
    use RefreshDatabaseTrait;
    /**
     * Test List prices
     *
     * @test
     * @group feature
     * @group feature_api_admin_price
     * @group feature_api_admin_price_list
     * @return void
     */
    public function feature_api_admin_price_list()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.prices.index');

        $response = $this->ajaxGet($url, $data=[], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'room_type_id' =>  '1',
                'currency' =>  'USD',
                'amount' =>  '50.1', //@todo fix currency precision
            ]);
    }


    /**
     * Test Show price
     *
     * @test
     * @group feature
     * @group feature_api_admin_price
     * @group feature_api_admin_price_show
     * @return void
     */
    public function feature_api_admin_price_show()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.prices.show', ['price'=>1]);

        $response = $this->ajaxGet($url, $data = [], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' =>  1,
                'room_type_id' =>  '1',
                'currency' =>  'USD',
                'amount' =>  '50.1',
            ]);
    }


    /**
     * Test Show price
     *
     * @test
     * @group feature
     * @group feature_api_admin_price
     * @group feature_api_admin_price_update
     * @return void
     */
    public function feature_api_admin_price_update()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.prices.update', ['price'=>1]);

        $response = $this->ajaxPut($url,[
            'id' =>  1,
            'room_type_id' =>  "1",
            'currency' =>  'USD',
            'amount' =>  '60.00',
        ], $token);

        $response->assertOk()
            ->assertJsonFragment([
                'id' =>  1,
                'room_type_id' =>  '1',
                'currency' =>  'USD',
                'amount' =>  '60.00',
            ]);
    }


    /**
     * Test Store price
     *
     * @test
     * @group feature
     * @group feature_api_admin_price
     * @group feature_api_admin_price_store
     * @return void
     */
    public function feature_api_admin_price_store()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.prices.store');

        $response = $this->ajaxPost($url,[
            'room_type_id' =>  '11',
            'currency' =>  'USD',
            'amount' =>  '1500',
        ], $token);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'room_type_id' =>  '11',
                'currency' =>  'USD',
                'amount' =>  '1500',
            ]);
    }


    /**
     * Test Delete price
     *
     * @test
     * @group feature
     * @group feature_api_admin_price
     * @group feature_api_admin_price_delete
     * @return void
     */
    public function feature_api_admin_price_destroy()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.prices.destroy', ['price'=>1]);

        $response = $this->ajaxDelete($url, $data=[], $token);

        $response->assertStatus(204);
    }

    /**
     * Test Http response 404
     *
     * @test
     * @group feature
     * @group feature_api_admin_price
     * @group feature_api_admin_price_not_found
     * @return void
     */
    public function feature_api_admin_price_not_found()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.prices.destroy', ['price'=>2]);

        $this->ajaxDelete($url, $data=[], $token);

        $response = $this->ajaxGet(route('api.v1.admin.prices.show', ['price'=>2]));

        $response
            ->assertStatus(404)
            ->assertJson([
                //'message' => ResponseHelper::message('not_found'), //@todo fix exception handler
                'message' => 'No query results for model [App\\Models\\Price] 2'
            ]);
    }
}
