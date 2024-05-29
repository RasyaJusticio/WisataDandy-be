<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnedFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'facility_id'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
