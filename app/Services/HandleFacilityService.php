<?php

namespace App\Services;

use App\Models\Facility;
use App\Models\OwnedFacility;

class HandleFacilityService
{
    public static function valid_facility($facility_id)
    {
        return Facility::find($facility_id);
    }

    public static function has_facility($destination_id, $facility_id)
    {
        return OwnedFacility::where([
            'destination_id' => $destination_id,
            'facility_id' => $facility_id
        ])
            ->first();
    }

    public static function append_facility($destination_id, $facility_id)
    {
        if (!self::valid_facility($facility_id)) {
            return false;
        }

        $facility = self::has_facility($destination_id, $facility_id);
        if ($facility) {
            return true;
        }

        OwnedFacility::create([
            'destination_id' => $destination_id,
            'facility_id' => $facility_id
        ]);

        return true;
    }

    public static function detach_facility($destination_id, $facility_id)
    {
        if (!self::valid_facility($facility_id)) {
            return false;
        }

        $facility = self::has_facility($destination_id, $facility_id);
        if (!$facility) {
            return true;
        }

        $facility->delete();

        return true;
    }
}
