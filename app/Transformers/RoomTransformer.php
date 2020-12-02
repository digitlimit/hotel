<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Room;
use App\Helpers\ImageHelper;

/**
 * Class RoomTransformer
 * @package namespace App\Transformers;
 */
class RoomTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'room_type',
        'hotel',
    ];

    protected $defaultIncludes = [

    ];


    /**
     * Transform the \Room entity
     *
     * @param Room $model
     * @return array
     */
    public function transform(Room $model)
    {
        return [
            'id'                => (int) $model->id,

            'name'              => $model->name,
            'hotel_id'          => $model->hotel_id,
            'room_type_id'      => $model->room_type_id,
            'image'             => ImageHelper::url($model->image),

//            'created_at'        => $model->created_at->format('Y-m-d g:i A'),
//            'updated_at'        => $model->updated_at->format('Y-m-d g:i A')
        ];
    }

    /**
     * Include room type relationship
     *
     * @param Room $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeRoomType(Room $model){
        $room_type = $model->room_type;
        return !$room_type ? $this->null() : $this->item($room_type, new RoomTypeTransformer);
    }

    /**
     * Include hotel relationship
     *
     * @param Room $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeHotel(Room $model){
        $hotel = $model->hotel;
        return !$hotel ? $this->null() : $this->item($hotel, new HotelTransformer);
    }

}