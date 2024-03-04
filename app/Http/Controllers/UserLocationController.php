<?php

namespace App\Http\Controllers;

use App\Models\UserLocation;
use App\Models\UserDetails;
use App\Models\FavPlace;
use App\Models\Stay;
use App\Models\hotel;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserLocationRequest;
use App\Http\Requests\UpdateUserLocationRequest;

class UserLocationController extends Controller
{

    public function register(Request $request) {
        $field = $request-> validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password']),
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

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
    public function store(StoreUserLocationRequest $request)
    {
        $userDetails = UserDetails::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'cost' => $request->input('cost'),
        ]);
    
        $favPlace = FavPlace::create([
            'place_name' => $request->input('selected_place_name'), // Corrected attribute name
        ]);
        \Log::info($favPlace);

        $request->input('detailsData');
        \Log::info($request);
    
        foreach ($request->input('detailsData') as $type) {
            \Log::info("type is" . $type);
            if ($type === 'restaurants') {
                // Save restaurant details
                if ($request->has('favPlaces')) {
                    foreach ($request->input('favPlaces') as $restaurant) {
                        Restaurant::create([
                            //'user_id' => auth()->user()->id,
                            'fav_place_id' => $favPlace->id,
                            'name' => $restaurant['name'],
                            'address' => $restaurant['address'],
                        ]);
                    }
                }
            } elseif ($type === 'hotels') {
                // Save hotel details
                if ($request->has('favPlaces')) {
                    foreach ($request->input('favPlaces') as $hotel) {
                        Hotels::create([
                            //'user_id' => auth()->user()->id,
                            'fav_place_id' => $favPlace->id,
                            'name' => $hotel['name'],
                            'address' => $hotel['address'],
                        ]);
                    }
                }
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
    public function show(UserLocation $userLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserLocation $userLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserLocationRequest $request, UserLocation $userLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserLocation $userLocation)
    {
        //
    }
}
