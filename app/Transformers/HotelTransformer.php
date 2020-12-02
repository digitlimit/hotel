<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Hotel;
use App\Helpers\ImageHelper;

/**
 * Class HotelTransformer
 * @package namespace App\Transformers;
 */
class HotelTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
//        'country',
//        'state'
    ];

    protected $defaultIncludes = [
//        'country',
//        'state'
    ];


    /**
     * Transform the \Hotel entity
     *
     * @param Hotel $model
     * @return array
     */
    public function transform(Hotel $model)
    {
        return [
            'id'                => (int) $model->id,

            'name'              => $model->name,
            'address'           => $model->address,
            'city'              => $model->city,

            'state'             => $model->state,
            'country'           => $model->country,

            'zip_code'          => $model->zip_code,
            'phone'             => $model->phone,
            'email'             => $model->email,
            'image'             => ImageHelper::url($model->image)
        ];
    }

    /**
     * Include country relationship
     *
     * @param Hotel $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeCountry(Hotel $model){

        $country = $model->country;
        return !$country ? $this->null() : $this->item($country, new CountryTransformer);
    }


    /**
     * Include state relationship
     *
     * @param Hotel $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeState(Hotel $model){

        $state = $model->state;
        return !$state ? $this->null() : $this->item($state, new StateTransformer);
    }
}