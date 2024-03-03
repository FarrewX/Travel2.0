<?php

namespace App\Http\Controllers;

use App\Models\FavPlace;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use HasApiTokens;

class FavPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $favplace = FavPlace::all();
        $user = User::all();
        $hotel = Hotel::all();
        $restaurant = Restaurant::all();
        $userDetails = UserDetails::all();
    
        return response()->json([
            'message' => 'Data retrieved successfully',
            'favplace' => $favplace,
            'user' => $user,
            'hotel' => $hotel,
            'restaurant' => $restaurant,
            'userDetails' => $userDetails
        ], 200);
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
