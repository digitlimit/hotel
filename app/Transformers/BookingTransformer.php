<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Booking;

/**
 * Class BookingTransformer
 * @package namespace App\Transformers;
 */
class BookingTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'room',
        'user'
    ];

    protected $defaultIncludes = [

    ];

    /**
     * Transform the \Booking entity
     *
     * @param Booking $model
     * @return array
     */
    public function transform(Booking $model)
    {
        return [
            'id'                => (int) $model->id,

            'room_id'           => $model->room_id,
            'user_id'           => $model->user_id,

            'customer_fullname' => $model->customer_fullname,
            'customer_email'    => $model->customer_email,
            'total_nights'      => $model->total_nights,
            'total_price'       => $model->total_price,

            'start_date'        => $model->start_date->format('Y-m-d'),
            'end_date'          => $model->end_date->format('Y-m-d'),
            'created_at'        => $model->created_at->format('Y-m-d g:i A'),
            'updated_at'        => $model->updated_at->format('Y-m-d g:i A')
        ];
    }

    /**
     * Include room relationship
     *
     * @param Booking $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeRoom(Booking $model){
        $room = $model->room;
        return !$room ? $this->null() : $this->item($room, new RoomTransformer);
    }

    /**
     * Include user relation
     *
     * @param Booking $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeUser(Booking $model){
        $user = $model->user;
        return !$user ? $this->null() : $this->item($user, new UserTransformer);
    }
}
