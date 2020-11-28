<?php namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;
use App\Helpers\ResponseHelper;
use Exception;

trait ResponseHelperTrait{

    /**
     * GET - Get single item - HTTP Response Code: 200
     *
     * @param array $content
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiShowResponse(array $content, array $headers=[])
    {
        return response()->json($content, $status=200, $headers);
    }


    /**
     * GET - Get item list - HTTP Response Code: 200
     *
     * @param array $content
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiListResponse(array $content, array $headers=[])
    {
        return response()->json($content, $status=200, $headers);
    }

    /**
     * //POST - Create a new item - HTTP Response Code: 201
     *
     * @param array $content
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiStoreResponse(array $content, array $headers=[])
    {
        //TODO: Store (Returns the created post with a 201 status code, meaning: ‘Content created’)
        //$content = [
        //    'message' => ResponseHelper::message('created')
        //];

        return response()->json($content, $status=201, $headers);
    }


    /**
     * PUT/PATCH - Update an item - HTTP Response Code: 200/204
     *
     * @param array $content
     * @param array $headers
     * @return mixed
     */
    public function apiUpdateResponse(array $content, array $headers=[])
    {
        return response()->json($content, $status=200, $headers);
    }

    /**
     * DELETE - Delete an item - HTTP Response Code: 204
     *
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiDeleteResponse(array $headers=[])
    {
        return response()->json($content='', $status=204, $headers);
    }


    /**
     * Generate an success response
     *
     * @param $code
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiSuccessResponse($code, array $headers=[])
    {
        //status code
        $status = ResponseHelper::status($code);

        //message
        $message = ResponseHelper::message($code);

        $content = [
            'message' => $message,
        ];

        return response()->json($content, $status, $headers);
    }



    /**
     * Generate an error response
     *
     * @param $code
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiErrorResponse($code, array $headers=[])
    {
        //status code
        $status = ResponseHelper::status($code);

        //message
        $message = ResponseHelper::message($code);

        $content = [
            'message' => $message,
        ];

        return response()->json($content, $status, $headers);
    }


    /**
     * Generate failure response
     *
     * @param Exception $exception
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiFailureResponse(Exception $exception, array $headers=[])
    {
        if(!config('app.debug')){
            $status = ResponseHelper::status('internal_server_error');
            $message = ResponseHelper::message('internal_server_error');
        }else{
            $status = $exception->getCode();
            $message = $exception->getMessage();
        }

        $content = [
            'message' => $message,
        ];

        return response()->json($content, $status=500, $headers);
    }


    /**
     * //Generation Validation response
     *
     * @param Validator $validator
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiValidationResponse(Validator $validator, array $headers=[])
    {
        $content = [
            'message' => 'Validation errors in your request',
            'errors'  => $validator->errors(),
        ];

        return response()->json($content, $status=422, $headers);
    }

}