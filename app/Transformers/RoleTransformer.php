<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Role;

/**
 * Class RoleTransformer
 * @package namespace App\Transformers;
 */
class RoleTransformer extends TransformerAbstract
{

    protected $availableIncludes = [

    ];

    protected $defaultIncludes = [

    ];


    /**
     * Transform the \Role entity
     *
     * @param Role $model
     * @return array
     */
    public function transform(Role $model)
    {
        return [
            'id'                => (int) $model->id,

            'name'             => $model->name,
            'display_name'     => $model->display_name,
            'description'      => $model->description,
        ];
    }


    /**
     * Include users relationship
     *
     * @param Role $model
     * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
     */
    public function includeUser(Role $model){

        $users = $model->users;
        return !$users ? $this->null() : $this->collection($users, new RoleTransformer);
    }
}