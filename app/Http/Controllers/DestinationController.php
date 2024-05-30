<?php

namespace App\Http\Controllers;

use App\Http\Requests\Destination\IndexDestinationRequest;
use App\Http\Requests\Destination\StoreDestinationRequest;
use App\Http\Requests\Destination\UpdateDestinationRequest;
use App\Models\Destination;
use App\Services\StorageService;
use Illuminate\Support\Str;

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
            'message' => 'Successfully fetched the specified data',
            ...collect($destinations)->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {
        $fields = $request->validated();
        unset($fields['image']);

        if ($request->hasFile('image')) {
            $fields['image_url'] = StorageService::upload($request->file('image'));
        }

        if (!isset($fields['slug'])) {
            $fields['slug'] = Str::slug($fields['name']);

            if (Destination::where('slug', $fields['slug'])->first()) {
                return response()->json([
                    'message' => 'The slug has already been taken.',
                    'errors' => [
                        'name' => [
                            'The generated slug from name has already been taken.'
                        ]
                    ]
                ], 422);
            }
        }

        $destination = Destination::create($fields);

        return response()->json([
            'message' => 'Successfully created a new destination',
            'data' => $destination
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $destination->load('facilities.facility');
        $destination->facilities = $destination->facilities->transform(function ($facility) {
            return [
                'id' => $facility->facility->id,
                'name' => $facility->facility->name
            ];
        });

        return response()->json([
            'message' => 'Successfully fetched the specified data',
            'data' => $destination
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $fields = $request->validated();
        unset($fields['image']);

        if ($request->hasFile('image')) {
            StorageService::delete($destination->image_url);
            $fields['image_url'] = StorageService::upload($request->file('image'));
        }

        $destination->update($fields);

        return response()->json([
            'message' => 'Successfully updated a destination',
            'data' => $destination
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        StorageService::delete($destination->image_url);
        $destination->delete();

        return response()->json([
            'message' => 'Successfully deleted a destination'
        ]);
    }
}
