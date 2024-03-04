<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use App\Http\Requests\StorehotelRequest;
use App\Http\Requests\UpdatehotelRequest;

class HotelController extends Controller
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
    public function store(StorehotelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(hotel $hotel)
    {
        $hotel = hotel::all();
    
        return response()->json([
            'message' => 'Data retrieved successfully',
            'favplace' => $hotel,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehotelRequest $request, hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hotel $hotel)
    {
        //
    }
}
