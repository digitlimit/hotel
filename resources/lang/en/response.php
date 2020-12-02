<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Error messages
    |--------------------------------------------------------------------------
    |
    */

    'created' => [
        'message' => 'The item was created successfully',
        'status'  => Illuminate\Http\Response::HTTP_CREATED
    ],

    'unauthorized' => [
        'message' => 'Authentication credentials were missing or incorrect',
        'status'  => Illuminate\Http\Response::HTTP_UNAUTHORIZED
    ],

    'unauthenticated' => [
        'message' => 'Unauthenticated. Token not present or invalid',
        'status'  => Illuminate\Http\Response::HTTP_UNAUTHORIZED
    ],

    'recaptcha_failed' => [
        'message' => 'The recaptcha verification failed. Try again',
        'status'  => Illuminate\Http\Response::HTTP_UNAUTHORIZED
    ],

    'already_authenticated' => [
        'message' => 'Already Authenticated. Request is not allowed for authenticated',
        'status'  => Illuminate\Http\Response::HTTP_FORBIDDEN
    ],

    'token_expired' => [
        'message' => 'The request token has expired',
        'status'  => Illuminate\Http\Response::HTTP_UNAUTHORIZED
    ],

    'token_invalid' => [
        'message' => 'The request token is invalid',
        'status'  => Illuminate\Http\Response::HTTP_UNAUTHORIZED
    ],

    'token_absent' => [
        'message' => 'The request token is absent',
        'status'  => Illuminate\Http\Response::HTTP_UNAUTHORIZED
    ],

    'access_denied' => [
        'message' => 'Access Denied. The request requires a higher privilege',
        'status'  => Illuminate\Http\Response::HTTP_UNAUTHORIZED
    ],


    'forbidden' => [
        'message' => 'The request is understood, but it has been refused or access is not allowed',
        'status'  => Illuminate\Http\Response::HTTP_FORBIDDEN
    ],

    'not_found' => [
        'message' => 'The item does not exist',
        'status'  => Illuminate\Http\Response::HTTP_NOT_FOUND
    ],

    'method_not_allowed' => [
        'message' => 'The request is understood, but method is not allowed',
        'status'  => Illuminate\Http\Response::HTTP_METHOD_NOT_ALLOWED
    ],

    'unprocessable_entity' => [
        'message' => 'The request is understood,  but was unable to process the contained instructions',
        'status'  => Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY
    ],

    'too_many_requests' => [
        'message' => 'The request cannot be served due to the rate limit having been exhausted for the resource',
        'status'  => Illuminate\Http\Response::HTTP_TOO_MANY_REQUESTS
    ],

    'internal_server_error' => [
        'message' => 'Internal Server Error. Something is broken',
        'status'  => Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR
    ],

    'service_unavailable' => [
        'message' => 'The server is up, but overloaded with requests. Try again later!',
        'status'  => Illuminate\Http\Response::HTTP_SERVICE_UNAVAILABLE
    ],

    'logout_success' => [
        'message' => 'The logout request was successful',
        'status'  => Illuminate\Http\Response::HTTP_OK
    ]
];
