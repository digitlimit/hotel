<?php

namespace Tests;

use App\Models\User;
use Illuminate\Auth\Authenticatable;

trait APIAuthTrait {
    /**
     * @var User
     */
    protected $loginUser;
    protected $admin_email = 'admin@hotels.com';
    protected $admin_password = 'admin!';

    /**
     * Generate Auth token for user
     *
     * @param Authenticatable $user
     * @param null $driver
     * @return mixed
     */
    public function token(Authenticatable $user, $driver = null)
    {
        $token = ''; //@todo implement

        return $token;
    }

    /**
     * @param Authenticatable $user
     * @param null $driver
     * @return $this
     */
    // public function actingAs(Authenticatable $user, $driver = null)
    // {
    //     $token = '';  //@todo implement
    //     $this->withHeader('Authorization', 'Bearer ' . $token);

    //     return $this;
    // }

    /**
     * Generate Token for Admin
     * @return mixed
     */
    public function AdminToken()
    {
        $admin = User::where('email', $this->admin_email)->first();
        //@todo implement
    }
}
