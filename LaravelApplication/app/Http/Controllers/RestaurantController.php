<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Requests\CreateRestaurantRequest;
use Illuminate\Http\Request;
use App\Restaurant;
use App\State;
use App\Transformers\RestaurantTransformer;

class RestaurantController extends Controller
{

    private $transformer;

    public function __construct(RestaurantTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Restaurant::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRestaurantRequest $request)
    {

        $data = $request->all();

        $restaurant = $this->transformer->restaurant($data);

        $restaurant = Restaurant::create($restaurant);

        $address = $restaurant->address()->create($this->transformer->address($data));

        return response(['restaurant' => $restaurant, 'address' => $address]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Restaurant::findOrFail($id)->cuisines;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


    public function address($id)
    {
        return Restaurant::findOrFail($id)->address;
    }


    // public function addAttachment($id, Request $request)
    // {
    //     $restaurant = Restaurant::findOrFail($id);

    //     $restaurant->attachments()->create($request->all());

    //     return response(['success'=>'success']);
    // }


    public function addReview($id, Request $request)
    {
        $restaurant = Restaurant::findOrFail($id);

        return $restaurant->reviews()->create($request->all());
    }
}
