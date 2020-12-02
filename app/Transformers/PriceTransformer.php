<?php

namespace App\Transformers;

use App\Models\RoomCapacity;
use League\Fractal\TransformerAbstract;
use App\Models\Price;

/**
 * Class PriceTransformer
 * @package namespace App\Transformers;
 */
class PriceTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'room_type',
    ];

    protected $defaultIncludes = [

    ];


    /**
     * Transform the \Price entity
     *
     * @param Price $model
     * @return array
     */
    public function transform(Price $model)
    {
        return [
            'id'                => $model->id,

            'room_type_id'      => $model->room_type_id,
            'currency'          => $model->currency,
            'amount'            => $model->amount,

            'created_at'        => $model->created_at->format('Y-m-d g:i A'),
            'updated_at'        => $model->updated_at->format('Y-m-d g:i A')
        ];
    }


    /**
     * Include room type relationship
     *
     * @param Price $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeRoomType(Price $model){
        $room_type = $model->room_type;
        return !$room_type ? $this->null() : $this->item($room_type, new RoomTypeTransformer);
    }
}