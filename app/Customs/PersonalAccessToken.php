<?php

namespace App\Customs;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

/**
 * Custom PersonalAccessToken
 * It must be registered in the boot method of a ServiceProvider
 */
class PersonalAccessToken extends SanctumPersonalAccessToken
{

}
