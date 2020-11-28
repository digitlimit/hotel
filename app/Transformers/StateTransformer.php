<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\State;

/**
 * Class StateTransformer
 * @package namespace App\Transformers;
 */
class StateTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'country'
    ];

    protected $defaultIncludes = [

    ];


    /**
     * Transform the \State entity
     *
     * @param State $model
     * @return array
     */
    public function transform(State $model)
    {
        return [
            'id'                => (int) $model->id,

            'name'              => $model->name,
            'code'              => $model->code,
            'country_code'      => $model->country_code,

//            'created_at'        => $model->created_at->format('Y-m-d g:i A'),
//            'updated_at'        => $model->updated_at->format('Y-m-d g:i A')
        ];
    }


    public function includeCountry(State $model){

        $country = $model->country;
        return !$country ? $this->null() : $this->item($country, new CountryTransformer);
    }

}