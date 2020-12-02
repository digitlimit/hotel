<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;

class Recaptcha implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new Client([
            'base_uri' => config('services.recaptcha.api')
        ]);

        $response = $client->post('siteverify', [
            'query' => [
                'secret' => config('services.recaptcha.secret'),
                'response' => $value
            ]
        ]);

        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The recaptcha verification failed. Try again.';
    }

    /**
     * Determine if Recaptcha's keys are set to test mode.
     *
     * @return bool
     */
    public static function isInTestMode()
    {
//        return Zttp::asFormParams()->post(static::URL, [
//            'secret' => config('services.recaptcha.secret'),
//            'response' => 'test',
//            'remoteip' => request()->ip()
//        ])->json()['success'];
    }
}