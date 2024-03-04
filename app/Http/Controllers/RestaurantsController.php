<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantsRequest;
use App\Http\Requests\UpdateRestaurantsRequest;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restaurant = Restaurant::all();
    
        return response()->json([
            'message' => 'Data retrieved successfully',
            'favplace' => $restaurant,
        ], 200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurants $restaurants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantsRequest $request, no $no, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'fav_place_id' => 'required|string',
             'name' => 'required|string|max:70',
            'address' => 'required|string|max:100',
        ]);

        $restaurant->update($validated);

        return response()->json(['message'=>'RestaurantUpdated'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return response()->json(['message'=>'RestaurantDeleted'],200);
    }
}
