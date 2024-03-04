<?php

namespace App\Http\Controllers;

use App\Models\FavPlace;
use App\Http\Requests\StoreFavPlaceRequest;
use App\Http\Requests\UpdateFavPlaceRequest;
use App\Http\Requests\ShowFavPlaceRequest;

class FavPlaceController extends Controller
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
    public function store(StoreFavPlaceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowFavPlaceRequest $request, FavPlace $favplace)
    {
        $favplace = FavPlace::all();
    
        return response()->json([
            'message' => 'Data retrieved successfully',
            'favplace' => $favplace,
        ], 200);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavPlace $favPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavPlaceRequest $request, no $no, FavPlace $favplace)
    {
        
            $validated = $request->validate([
                'favplace' => 'reqired|string|max:50',
                'user' => 'required|string|max:50',
                'hotel' => 'required|string|max:50',
                'restaurant' => 'required|string|max:50',
                'userDetails' => 'required|string|max:50',
            ]);
    
            $favplace->update($validated);
    
            return response()->json(['message'=>'FavPlaceUpdated'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavPlace $favPlace)
    {
        $favplace->delete();
        return response()->json(['message'=>'FavPlaceDeleted'],200);
    }
}
