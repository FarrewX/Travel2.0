<?php

namespace App\Http\Controllers;

use App\Models\FavPlace;
use App\Models\UserDetails;
use App\Models\Stay;
use App\Models\Hotel;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class UserLocation extends Controller
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
    public function store(Request $request)
    {
        $userDetails = UserDetails::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'cost' => $request->input('cost'),
        ]);
    
        $favPlace = FavPlace::create([
            'place_name' => $request->input('selected_place_name'), // Corrected attribute name
        ]);
    
        // Save restaurant details if available
        $restaurants = $request->input('favPlaces');
        if ($restaurants) {
            foreach ($restaurants as $restaurant) {
                Restaurant::create([
                    'fav_place_id' => $favPlace->id,
                    'name' => $restaurant['name'],
                    'address' => $restaurant['address'],
                ]);
            }
        }
    
        // Save stay details
        $stayDuration = strtotime($request->input('returnDate')) - strtotime($request->input('dept_date'));
        $stay = Stay::create([
            'fav_place_id' => $favPlace->id,
            'dept_date' => $request->input('dept_date'), // Corrected attribute name
            'return_date' => $request->input('returnDate'),
            'stay_days' => round($stayDuration / (60 * 60 * 24)), // Convert seconds to days
        ]);
    
        return response()->json(['message' => 'Data saved successfully']);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(no $no)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(no $no)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, no $no)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(no $no)
    {
        //
    }
}
