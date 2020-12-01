<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\StoreRequest;
use App\Http\Requests\Hotel\UpdateRequest;

use App\Models\Hotel;
use App\Transformers\HotelTransformer;
use App\Helpers\UploadHelper;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::paginate();

        return fractal($hotels, new HotelTransformer())
            ->withResourceName('hotels')
            ->respond(200);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        if($hotel = Hotel::create($request->all())){

            $hotel = fractal($hotel, new HotelTransformer())
                ->withResourceName('hotels')->toArray();

            return $this->apiStoreResponse($hotel);
        }

        return $this->apiErrorResponse('unprocessable_entity');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //throw an exception 404 if not found
        $hotel = Hotel::findOrFail($id);

        return fractal($hotel, new HotelTransformer())
            ->withResourceName('hotels')
            ->respond(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        //throw an exception 404 if not found
        $hotel = Hotel::findOrFail($id);

        //data
        $data = $request->all();

        //upload image
        if($request->image){
            $data['image'] = UploadHelper::uploadHotelImage($request->image);
        }

        if($hotel->update($data)){

            $hotel = fractal($hotel, new HotelTransformer())
                ->withResourceName('hotels')->toArray();

            return $this->apiUpdateResponse($hotel);
        }

        return $this->apiErrorResponse('unprocessable_entity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel->delete();

        return $this->apiDeleteResponse();
    }
}
