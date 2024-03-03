<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function show(Request $request)
    {
        $restaurant = Restaurant::all();
    
        return response()->json([
            'message' => 'Data retrieved successfully',
            'favplace' => $restaurant,
        ], 200);
    }

    public function update(Request $request, no $no, Restaurant $restaurant)
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
    public function destroy(no $no,Restaurant $restaurant)
    {
        $restaurant->delete();
        return response()->json(['message'=>'RestaurantDeleted'],200);
    }
}
