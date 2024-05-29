<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Successfully fetched all the data',
            'data' => Facility::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacilityRequest $request)
    {
        $facility = Facility::create($request->validated());

        return response()->json([
            'message' => 'Successfully created a new facility',
            'data' => $facility
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
