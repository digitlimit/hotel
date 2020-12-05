<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;
use App\Http\Requests\Booking\FilterRequest;

use App\Models\Booking;
use App\Transformers\BookingTransformer;
use App\Helpers\TestHelper;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\Models\User::find(1);

        $token = $user->createToken('token-name');

        return $token->plainTextToken;

        $bookings = Booking::orderBy('id', 'DESC')
        ->paginate(request()->limit ? request()->limit : 15);

        return fractal($bookings, new BookingTransformer())
            ->withResourceName('bookings')
            ->respond(200);
    }

    /**
     * Filter bookings
     *
     * @param FilterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function filter(FilterRequest $request)
    {
        $bookings = Booking::orderBy('id', 'DESC')
            ->whereYear('start_date', '=', $request->year)
            ->whereMonth('start_date', '=', $request->month)
            ->get();

        return fractal($bookings, new BookingTransformer())
            ->withResourceName('bookings')
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
        if($booking = Booking::create($request->all())){

            $booking = fractal($booking, new BookingTransformer())
                ->withResourceName('bookings')->toArray();

            return $this->apiStoreResponse($booking);
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
        $booking = Booking::findOrFail($id);

        return fractal($booking, new BookingTransformer())
            ->withResourceName('bookings')
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
        $booking = Booking::findOrFail($id);

        if($booking->update($request->all())){

            $booking = fractal($booking, new BookingTransformer())
                ->withResourceName('bookings')->toArray();

            return $this->apiUpdateResponse($booking);
        }

        return $this->apiErrorResponse('unprocessable_entity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return $this->apiDeleteResponse();
    }
}
