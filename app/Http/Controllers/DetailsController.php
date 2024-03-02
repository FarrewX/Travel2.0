<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Details;

class DetailsController extends Controller
{
    public function store(Request $request)
    {
       //
    }

    public function index()
    {
        $details = Details::all();
        return response()->json($details);
    }

    public function show($id)
    {
        $detail = Details::findOrFail($id);
        return response()->json([
            'message' => 'Detail retrieved successfully',
            'data' => $detail
        ], 200);
    }

    public function destroy($id)
    {
        $detail = Details::findOrFail($id);
        $detail->delete();
        return response()->json([
            'message' => 'Detail deleted successfully'
        ], 200);
    }
}
