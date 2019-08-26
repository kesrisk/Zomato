<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Requests\CreateRestaurantRequest;
use Illuminate\Http\Request;
use App\Restaurant;
use App\State;

class RestaurantController extends Controller
{
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


        $restaurant = [
            'name' => $request['name'],
            'description' => $request['description'],
            'phone_number' => $request['phone_number']
        ];
        $restaurant = Restaurant::create($restaurant);
        // return($restaurant);
        $address = $restaurant->address()->create([
            'state_id' => $request['state_id'],
            'district_id' => $request['district_id'],
            'street' => $request['street'],
        ]);
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
}
