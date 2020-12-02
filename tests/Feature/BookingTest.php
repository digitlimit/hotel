<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Helpers\ResponseHelper;
use App\Helpers\TestHelper;
use Tests\RefreshDatabaseTrait;

class BookingTest extends TestCase
{
    use RefreshDatabaseTrait;

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

        $dates = $this->bookingDates;

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' =>  1,
                'room_id' =>  '1',
                'user_id' =>  '3',
                'customer_fullname' =>  'Philip Smith',
                'customer_email' =>  'philip@gmail.com',
                'total_nights' =>  '3',
                'total_price' =>  '150.3', //@todo fix wired number issues
                'start_date' =>  $dates[0]['start'],
                'end_date' =>  $dates[0]['end']
            ]);
    }

    /**
     * Test Show booking
     *
     * @test
     * @group feature
     * @group feature_api_admin_booking
     * @group feature_api_admin_booking_show
     * @return void
     */
    public function feature_api_admin_booking_show()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.bookings.show', ['booking'=>1]);

        $response = $this->ajaxGet($url, $data = [], $token);

        $dates = $this->bookingDates;

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' =>  1,
                'room_id' =>  '1',
                'user_id' =>  '3',
                'customer_fullname' =>  'Philip Smith',
                'customer_email' =>  'philip@gmail.com',
                'total_nights' => '3',
                'total_price' =>  '150.3', //@todo fix wired number issues
                'start_date' =>  $dates[0]['start'],
                'end_date' =>  $dates[0]['end']
            ]);
    }

    /**
     * Test Show booking
     *
     * @test
     * @group feature
     * @group feature_api_admin_booking
     * @group feature_api_admin_booking_update
     * @return void
     */
    public function feature_api_admin_booking_update()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.bookings.update', ['booking'=>1]);

        $dates = $this->bookingDates;

        $response = $this->ajaxPut($url,[
            'room_id' => 5,
            'user_id' => 1,
            'customer_fullname' => 'Emeka Frank',
            'customer_email' => 'frankemeks77@yahoo.com',
            'start_date' =>  $dates[0]['start'],
            'end_date' =>  $dates[0]['end']
        ], $token);

        //var_dump($response->getContent());

        $response->assertOk()
            ->assertJsonFragment([
                'id' =>  1,
                'room_id' =>  5,
                'user_id' =>  1,
                'customer_fullname' => 'Emeka Frank',
                'customer_email' => 'frankemeks77@yahoo.com',
                'start_date' =>  $dates[0]['start'],
                'end_date' =>  $dates[0]['end']
            ]);
    }

    /**
     * Test Delete booking
     *
     * @test
     * @group feature
     * @group feature_api_admin_booking
     * @group feature_api_admin_booking_delete
     * @return void
     */
    public function feature_api_admin_booking_destroy()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.bookings.destroy', ['booking'=>1]);

        $response = $this->ajaxDelete($url, $data = [], $token);

        $response->assertStatus(204);
    }

    /**
     * Test Http response 404
     *
     * @test
     * @group feature
     * @group feature_api_admin_booking
     * @group feature_api_admin_booking_not_found
     * @return void
     */
    public function feature_api_admin_booking_not_found()
    {
        $token = $this->AdminToken();

        $url = route('api.v1.admin.bookings.destroy', ['booking'=>2]);

        $this->ajaxDelete($url, $data=[], $token);

        $response = $this->ajaxGet($url, $data=[], $token);

        $response
            ->assertStatus(404);
            // ->assertJson([ //@todo fix exception handler
            //     'message' => ResponseHelper::message('not_found')
            // ]);
    }
}
