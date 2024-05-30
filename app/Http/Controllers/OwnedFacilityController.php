<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageFacilityRequest;
use App\Models\Destination;
use App\Services\HandleFacilityService;
use App\Services\StorageService;

class OwnedFacilityController extends Controller
{
    public function add(ManageFacilityRequest $request, Destination $destination)
    {
        $facilities_id = $request->validated()['facilities'];

        foreach ($facilities_id as $facility_id) {
            StorageService::delete("");
            $result = HandleFacilityService::append_facility($destination->id, $facility_id);
            
            if (!$result) {
                return response()->json([
                    'message' => 'ID: ' . $facility_id . ' is not a valid facility id'
                ], 422);
            }
        }

        return response()->json([
            'message' => 'Successfully added facilities to a destination'
        ]);
    }

    public function remove(ManageFacilityRequest $request, Destination $destination)
    {
        $facilities_id = $request->validated()['facilities'];

        foreach ($facilities_id as $facility_id) {
            $result = HandleFacilityService::detach_facility($destination->id, $facility_id);

            if (!$result) {
                return response()->json([
                    'message' => 'ID: ' . $facility_id . ' is not a valid facility id'
                ], 422);
            }
        }

        return response()->json([
            'message' => 'Successfully removed facilities to a destination'
        ]);
    }
}
