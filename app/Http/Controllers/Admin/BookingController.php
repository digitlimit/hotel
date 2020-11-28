<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;
use App\Http\Requests\Booking\FilterRequest;

use App\Models\Booking;
use App\Transformers\BookingTransformer;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id', 'DESC')
        ->paginate(request()->limit ? request()->limit : 15);

        return fractal($bookings, new BookingTransformer())
            ->withResourceName('bookings')
            ->respond(200);
    }

    public function filter(FilterRequest $request)
    {
        $bookings = Booking::orderBy('id', 'DESC')
            ->whereYear('start_date', '=', $request->year)
            ->whereMonth('start_date', '=', $request->month)
            ->get();


    }

    /**
     * Store a newly created resource in storage
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $booking = Booking::create($request->all());
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
        $booking = Booking::findOrFail($id);
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
        $booking = Booking::findOrFail($id);

        $bookings = $booking->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return $this->apiDeleteResponse();
    }
}
