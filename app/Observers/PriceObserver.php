<?php

namespace App\Observers;
use App\Models\Price;

class PriceObserver
{
    /**
     * Run before create
     *
     * @param Price $price
     */
    public function creating(Price $price)
    {
        $price->currency = $price->currency ? $price->currency : config('global.default_currency');
    }


    /**
     * Run before updating
     *
     * @param Price $price
     */
    public function updating(Price $price)
    {
        $price->currency = $price->currency ? $price->currency : config('global.default_currency');
    }
}
