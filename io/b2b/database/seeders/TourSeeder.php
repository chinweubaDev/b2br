<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourPackage;

class TourSeeder extends Seeder
{
    public function run(): void {
        TourPackage::create([
            'name' => 'Cape Town Experience',
            'description' => 'Luxury, wine, beach, and unforgettable views!',
            'category' => 'Luxury',
            'destination' => 'Cape Town, South Africa',
            'travel_start_date' => '2025-10-01',
            'travel_end_date' => '2025-10-07',
            'duration_days' => 7,
            'standard_rate' => 3638000,
            'b2b_rate' => 3595000,
            'inclusions' => 'Accommodation, meals, transportation, guided tours',
            'exclusions' => 'International flights, personal expenses',
            'itinerary' => 'Day 1: Arrival and welcome dinner\nDay 2: Table Mountain and city tour\nDay 3: Wine tasting in Stellenbosch\nDay 4: Cape Point and penguin colony\nDay 5: Robben Island tour\nDay 6: Free day for shopping\nDay 7: Departure',
            'is_featured' => true,
            'is_active' => true,
        ]);

        TourPackage::create([
            'name' => 'Dubai Desert Adventure',
            'description' => 'Experience the magic of Dubai with desert safari and luxury accommodations!',
            'category' => 'Adventure',
            'destination' => 'Dubai, UAE',
            'travel_start_date' => '2025-11-15',
            'travel_end_date' => '2025-11-20',
            'duration_days' => 6,
            'standard_rate' => 2850000,
            'b2b_rate' => 2800000,
            'inclusions' => '5-star hotel, desert safari, city tours, meals',
            'exclusions' => 'International flights, personal expenses',
            'itinerary' => 'Day 1: Arrival and hotel check-in\nDay 2: Dubai city tour\nDay 3: Desert safari with dinner\nDay 4: Burj Khalifa and shopping\nDay 5: Palm Jumeirah and water park\nDay 6: Departure',
            'is_featured' => true,
            'is_active' => true,
        ]);

        TourPackage::create([
            'name' => 'Paris Romantic Getaway',
            'description' => 'Perfect romantic escape to the City of Light!',
            'category' => 'Romance',
            'destination' => 'Paris, France',
            'travel_start_date' => '2025-12-01',
            'travel_end_date' => '2025-12-08',
            'duration_days' => 8,
            'standard_rate' => 4200000,
            'b2b_rate' => 4150000,
            'inclusions' => 'Boutique hotel, Seine cruise, museum passes, romantic dinner',
            'exclusions' => 'International flights, personal expenses',
            'itinerary' => 'Day 1: Arrival and Eiffel Tower\nDay 2: Louvre Museum\nDay 3: Notre Dame and Latin Quarter\nDay 4: Versailles Palace\nDay 5: Seine River cruise\nDay 6: Montmartre and Sacré-Cœur\nDay 7: Shopping and farewell dinner\nDay 8: Departure',
            'is_featured' => false,
            'is_active' => true,
        ]);
    }
}
