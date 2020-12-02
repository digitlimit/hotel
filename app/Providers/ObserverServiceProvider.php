<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Booking::observe(\App\Observers\BookingObserver::class);
        \App\Models\Price::observe(\App\Observers\PriceObserver::class);
        \App\Models\Room::observe(\App\Observers\RoomObserver::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}