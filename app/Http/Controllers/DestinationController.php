<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDestinationRequest;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexDestinationRequest $request)
    {
        $fields = $request->validated();
        $fields['per_page'] = isset($fields['per_page']) ? $fields['per_page'] : 15;
        $fields['page'] = isset($fields['page']) ? $fields['page'] : 1;

        $destinations = Destination::paginate($fields['per_page'], ['*'], 'page', $fields['page']);

        return response()->json([
            'message' => 'Successfully fetched destinations data',
            ...collect($destinations)->toArray()
        ]);
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
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
