<?php

namespace App\Http\Controllers;

use App\Models\FavPlace;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $favplace = FavPlace::findOrFail($request);
        return response()->json([
            'message' => 'favplace retrieved successfully',
            'data' => $favplace
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
