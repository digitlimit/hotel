<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Country;

/**
 * Class CountryTransformer
 * @package namespace App\Transformers;
 */
class CountryTransformer extends TransformerAbstract
{

    protected $availableIncludes = [

    ];

    protected $defaultIncludes = [

    ];


    /**
     * Transform the \Country entity
     *
     * @param Country $model
     * @return array
     */
    public function transform(Country $model)
    {
        return [
            'id'                => (int) $model->id,
            'code'              => $model->code,
            'name'              => $model->name
        ];
    }

    /**
     * Include states relationship
     *
     * @param Country $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeStates(Country $model){
        $states = $model->states;
        return !$states ? $this->null() : $this->collection($states, new StateTransformer);
    }

}