<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Helpers\ResponseHelper;

class BookingTest extends TestCase
{
    /**
     * Test List bookings
     *
     * @test
     * @group feature
     * @group feature_api_admin_booking
     * @group feature_api_admin_booking_list
     * @return void
     */
    public function feature_api_admin_booking_list()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.bookings.index');

        $response = $this->ajaxGet($url, $data = [], $token);

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' =>  1,
                'room_id' =>  1,
                'user_id' =>  3,
                'customer_fullname' =>  'Philip Smith',
                'customer_email' =>  'philip@gmail.com',
                'total_nights' =>  1,
                'total_price' =>  '50.10', //@todo fix wired number issues
                'start_date' =>  '2019-06-29',
                'end_date' =>  '2019-06-30'
            ]);
    }

    // /**
    //  * Test Show booking
    //  *
    //  * @test
    //  * @group feature
    //  * @group feature_api_admin_booking
    //  * @group feature_api_admin_booking_show
    //  * @return void
    //  */
    // public function feature_api_admin_booking_show()
    // {
    //     $token = $this->AdminToken();

    //     $url = route('api.v1.admin.bookings.show', ['booking'=>1]);

    //     $response = $this->ajaxGet($url, $data = [], $token);

    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonFragment([
    //             'id' =>  1,
    //             'room_id' =>  '1',
    //             'user_id' =>  '3',
    //             'customer_fullname' =>  'Philip Smith',
    //             'customer_email' =>  'philip@gmail.com',
    //             'total_nights' =>  '1',
    //             'total_price' =>  '50',
    //             'start_date' =>  '2019-06-29',
    //             'end_date' =>  '2019-06-30'
    //         ]);
    // }


    // /**
    //  * Test Show booking
    //  *
    //  * @test
    //  * @group feature
    //  * @group feature_api_admin_booking
    //  * @group feature_api_admin_booking_update
    //  * @return void
    //  */
    // public function feature_api_admin_booking_update()
    // {
    //     $token = $this->AdminToken();

    //     $url = route('api.v1.admin.bookings.update', ['booking'=>1]);

    //     $response = $this->ajaxPut($url,[
    //         'room_id' => '5',
    //         'user_id' => '1',
    //         'customer_fullname' => 'Emeka Frank',
    //         'customer_email' => 'frankemeks77@yahoo.com',
    //         'start_date' => '2019-09-26',
    //         'end_date' => '2019-09-28'

    //     ], $token);

    //     $response->assertOk()
    //         ->assertJsonFragment([
    //             'id' =>  1,
    //             'room_id' =>  '5',
    //             'user_id' =>  '1',
    //             'customer_fullname' => 'Emeka Frank',
    //             'customer_email' => 'frankemeks77@yahoo.com',
    //             'start_date' => '2019-09-26',
    //             'end_date' => '2019-09-28',
    //         ]);
    // }

    // /**
    //  * Test Delete booking
    //  *
    //  * @test
    //  * @group feature
    //  * @group feature_api_admin_booking
    //  * @group feature_api_admin_booking_delete
    //  * @return void
    //  */
    // public function feature_api_admin_booking_destroy()
    // {
    //     $token = $this->AdminToken();

    //     $url = route('api.v1.admin.bookings.destroy', ['booking'=>1]);

    //     $response = $this->ajaxDelete($url, $data = [], $token);

    //     $response->assertStatus(204);
    // }

    // /**
    //  * Test Http response 404
    //  *
    //  * @test
    //  * @group feature
    //  * @group feature_api_admin_booking
    //  * @group feature_api_admin_booking_not_found
    //  * @return void
    //  */
    // public function feature_api_admin_booking_not_found()
    // {
    //     $token = $this->AdminToken();

    //     $url = route('api.v1.admin.bookings.destroy', ['booking'=>2]);

    //     $this->ajaxDelete($url, $data=[], $token);

    //     $response = $this->ajaxGet($url, $data=[], $token);

    //     $response
    //         ->assertStatus(404)
    //         ->assertJson([
    //             'message' => ResponseHelper::message('not_found')
    //         ]);
    // }
}
