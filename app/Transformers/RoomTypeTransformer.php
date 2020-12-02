<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\RoomType;

/**
 * Class RoomTypeTransformer
 * @package namespace App\Transformers;
 */
class RoomTypeTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'rooms',
        'price'
    ];

    protected $defaultIncludes = [

    ];


    /**
     * Transform the \RoomType entity
     *
     * @param RoomType $model
     * @return array
     */
    public function transform(RoomType $model)
    {
        return [
            'id'                => (int) $model->id,
            'name'              => $model->name,
        ];
    }

    public function includeRooms(RoomType $model){

        $rooms = $model->rooms;
        return !$rooms ? $this->null() : $this->collection($rooms, new RoomTransformer);
    }

    public function includePrice(RoomType $model){

        $room_type = $model->price;
        return !$room_type? $this->null() : $this->item($room_type, new PriceTransformer());
    }
}