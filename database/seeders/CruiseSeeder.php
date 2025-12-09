<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cruise;

class CruiseSeeder extends Seeder
{
    public function run(): void
    {
        $cruises = [
            [
                'name' => 'Mediterranean Explorer',
                'description' => 'Explore the beautiful Mediterranean with stops in Italy, Greece, and Spain.',
                'cruise_line' => 'Royal Caribbean',
                'ship_name' => 'Symphony of the Seas',
                'route' => 'Rome - Athens - Barcelona',
                'departure_date' => '2025-09-10',
                'return_date' => '2025-09-20',
                'duration_nights' => 10,
                'ports_of_call' => 'Rome, Naples, Athens, Santorini, Barcelona',
                'standard_rate' => 1200000,
                'b2b_rate' => 1100000,
                'inclusions' => 'Accommodation, meals, entertainment, shore excursions',
                'exclusions' => 'Flights, personal expenses',
                'image' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Caribbean Adventure',
                'description' => 'Sail the Caribbean and enjoy tropical islands and crystal-clear waters.',
                'cruise_line' => 'Costa Cruises',
                'ship_name' => 'Costa Smeralda',
                'route' => 'Miami - Bahamas - Jamaica - Puerto Rico',
                'departure_date' => '2025-11-05',
                'return_date' => '2025-11-15',
                'duration_nights' => 10,
                'ports_of_call' => 'Miami, Nassau, Ocho Rios, San Juan',
                'standard_rate' => 1350000,
                'b2b_rate' => 1250000,
                'inclusions' => 'All meals, entertainment, kids club, port taxes',
                'exclusions' => 'Flights, shore excursions, drinks',
                'image' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Norwegian Fjords',
                'description' => 'Experience the breathtaking fjords of Norway on a luxury cruise.',
                'cruise_line' => 'Norwegian Cruise Line',
                'ship_name' => 'Norwegian Bliss',
                'route' => 'Bergen - Geiranger - Flam - Oslo',
                'departure_date' => '2025-07-15',
                'return_date' => '2025-07-22',
                'duration_nights' => 7,
                'ports_of_call' => 'Bergen, Geiranger, Flam, Oslo',
                'standard_rate' => 1500000,
                'b2b_rate' => 1400000,
                'inclusions' => 'Luxury accommodation, meals, onboard activities',
                'exclusions' => 'Flights, specialty dining, spa treatments',
                'image' => null,
                'is_active' => true,
            ],
        ];
        foreach ($cruises as $cruise) {
            Cruise::create($cruise);
        }
    }
} 