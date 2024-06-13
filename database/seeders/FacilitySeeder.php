<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = $this->get_seed();

        foreach ($seeds as $seed) {
            Facility::create($seed);
        }
    }

    public function get_seed()
    {
        return [
            [
                'name' => 'Restrooms'
            ],
            [
                'name' => 'Parking Lot'
            ],
            [
                'name' => 'Food Stalls'
            ],
            [
                'name' => 'Restaurants'
            ],
            [
                'name' => 'Cafes'
            ],
            [
                'name' => 'Parks'
            ],
            [
                'name' => 'Accommodation'
            ],
            [
                'name' => 'Shopping Centers'
            ],
        ];
    }
}
