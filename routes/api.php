<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.v1.')
->prefix('v1')
->middleware('api', 'throttle:60,1')
->group(function()
{


    /**
     * Admin DashBoard API routes
     */
    Route::name('admin.')
    ->prefix('admin')
    //->middleware(['auth:api', 'admin'])
    ->namespace('App\Http\Controllers\Admin')
    ->group(function ()
    {

        //Hotels API endpoints
        Route::resource('hotel', 'HotelController')
        ->names([
            'index'     => 'hotels.index',
            'show'      => 'hotels.show',
            'store'     => 'hotels.store',
            'update'    => 'hotels.update',
            'destroy'   => 'hotels.destroy'
        ])
        ->only(['show', 'update']);

        //Booking API endpoints
        Route::resource('booking', 'BookingController')
        ->names([
            'index'     => 'bookings.index',
            'show'      => 'bookings.show',
            'store'     => 'bookings.store',
            'update'    => 'bookings.update',
            'destroy'   => 'bookings.destroy'
        ])
        ->only(['index', 'show', 'store',  'update', 'destroy']);


    });
});
