<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomType\StoreRequest;
use App\Http\Requests\RoomType\UpdateRequest;

use App\Models\RoomType;
use App\Transformers\RoomTypeTransformer;
use App\Helpers\UploadHelper;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_types = RoomType::orderBy('id', 'DESC')
            ->paginate(request()->limit ? request()->limit : 15);

        return fractal($room_types, new RoomTypeTransformer())
            ->withResourceName('room_types')
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
        //data
        $data = $request->all();

        //upload image
        if($request->image){
            $data['image'] = UploadHelper::uploadHotelImage($request->image);
        }

        if($room = RoomType::create($data)){

            $room = fractal($room, new RoomTypeTransformer())
                ->withResourceName('room_types')->toArray();

            return $this->apiStoreResponse($room);
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
        $room = RoomType::findOrFail($id);

        return fractal($room, new RoomTypeTransformer())
            ->withResourceName('room_types')
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
        $room = RoomType::findOrFail($id);

        //data
        $data = $request->all();

        //upload image
        if($request->image){
            $data['image'] = UploadHelper::uploadHotelImage($request->image);
        }

        if($room->update($data)){

            $room = fractal($room, new RoomTypeTransformer())
                ->withResourceName('room_types')->toArray();

            return $this->apiUpdateResponse($room);
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
        $room = RoomType::findOrFail($id);

        $room->delete();

        return $this->apiDeleteResponse();
    }
}