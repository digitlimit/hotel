<?php

namespace App\Transformers;

use App\Models\CustomerUser;
use League\Fractal\TransformerAbstract;
use App\Models\User;

/**
 * Class UserTransformer
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'bookings',
        'role'
    ];

    protected $defaultIncludes = [

    ];


    /**
     * Transform the \User entity
     *
     * @param User $model
     * @return array
     */
    public function transform(User $model)
    {
        return [
//            'id'                => (int) $model->id,

            'email'             => $model->email,
            'role'              => $model->role->name,
            'role_display_name' => $model->role->display_name,
//
//            'created_at'        => $model->created_at->format('Y-m-d g:i A'),
//            'updated_at'        => $model->updated_at->format('Y-m-d g:i A')
        ];
    }

    /**
     * Include bookings relationship
     *
     * @param User $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeBookings(User $model){
        $bookings = $model->bookings;
        return !$bookings ? $this->null() : $this->collection($bookings, new StateTransformer);
    }


    /**
     * Include role relationship
     *
     * @param User $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeRole(User $model){

        $role = $model->role;
        return !$role ? $this->null() : $this->item($role, new RoleTransformer);
    }
}