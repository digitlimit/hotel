<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\StoreRequest;
use App\Http\Requests\Hotel\UpdateRequest;
use App\Http\Requests\Hotel\FilterRequest;

use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::orderBy('id', 'DESC')
            ->paginate(request()->limit ? request()->limit : 15);

    }

    public function filter(FilterRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $hotel = Hotel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //throw an exception 404 if not found
        $hotel = Hotel::findOrFail($id);
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

        $hotels = $hotel->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel->delete();

        return $this->apiDeleteResponse();
    }
}
