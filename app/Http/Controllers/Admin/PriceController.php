<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Price\StoreRequest;
use App\Http\Requests\Price\UpdateRequest;

use App\Models\Price;
use App\Transformers\PriceTransformer;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::orderBy('id', 'DESC')
            ->paginate(request()->limit ? request()->limit : 15);

        return fractal($prices, new PriceTransformer())
            ->withResourceName('prices')
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
        if($price = Price::create($request->all())){

            $price = fractal($price, new PriceTransformer())
                ->withResourceName('prices')->toArray();

            return $this->apiStoreResponse($price);
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
        $price = Price::findOrFail($id);

        return fractal($price, new PriceTransformer())
            ->withResourceName('prices')
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
        $price = Price::findOrFail($id);

        if($price->update($request->all())){

            $price = fractal($price, new PriceTransformer())
                ->withResourceName('prices')->toArray();

            return $this->apiUpdateResponse($price);
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
        $price = Price::findOrFail($id);

        $price->delete();

        return $this->apiDeleteResponse();
    }
}