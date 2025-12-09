<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run(): void {
        $hotels = [
            [
                'name' => 'Eko Hotels & Suites',
                'description' => 'Luxury 5-star hotel in the heart of Victoria Island, Lagos. Features world-class amenities and stunning ocean views.',
                'location' => 'Lagos, Nigeria',
                'city' => 'Lagos',
                'country' => 'Nigeria',
                'star_rating' => 5,
                'category' => 'Luxury',
                'standard_rate' => 120000,
                'b2b_rate' => 105000,
                'currency' => 'NGN',
                'amenities' => json_encode(['Pool', 'Spa', 'Wi-Fi', 'Breakfast', 'Gym', 'Restaurant', 'Bar', 'Conference Room']),
                'is_active' => true,
            ],
            [
                'name' => 'Transcorp Hilton Abuja',
                'description' => 'Premier business hotel in Nigeria\'s capital city. Perfect for both business and leisure travelers.',
                'location' => 'Abuja, Nigeria',
                'city' => 'Abuja',
                'country' => 'Nigeria',
                'star_rating' => 5,
                'category' => 'Luxury',
                'standard_rate' => 150000,
                'b2b_rate' => 130000,
                'currency' => 'NGN',
                'amenities' => json_encode(['Pool', 'Spa', 'Wi-Fi', 'Breakfast', 'Gym', 'Restaurant', 'Bar', 'Tennis Court', 'Business Center']),
                'is_active' => true,
            ],
            [
                'name' => 'Sheraton Lagos Hotel',
                'description' => 'Modern 4-star hotel offering comfortable accommodations and excellent service in Lagos.',
                'location' => 'Lagos, Nigeria',
                'city' => 'Lagos',
                'country' => 'Nigeria',
                'star_rating' => 4,
                'category' => 'Corporate',
                'standard_rate' => 95000,
                'b2b_rate' => 85000,
                'currency' => 'NGN',
                'amenities' => json_encode(['Pool', 'Wi-Fi', 'Breakfast', 'Restaurant', 'Bar', 'Business Center']),
                'is_active' => true,
            ],
            [
                'name' => 'Radisson Blu Hotel',
                'description' => 'Contemporary hotel with modern amenities and excellent location for business travelers.',
                'location' => 'Lagos, Nigeria',
                'city' => 'Lagos',
                'country' => 'Nigeria',
                'star_rating' => 4,
                'category' => 'Corporate',
                'standard_rate' => 110000,
                'b2b_rate' => 95000,
                'currency' => 'NGN',
                'amenities' => json_encode(['Pool', 'Spa', 'Wi-Fi', 'Breakfast', 'Gym', 'Restaurant', 'Bar']),
                'is_active' => true,
            ],
            [
                'name' => 'Fraser Suites Abuja',
                'description' => 'Apartment-style hotel perfect for extended stays in Abuja. Features fully equipped kitchens.',
                'location' => 'Abuja, Nigeria',
                'city' => 'Abuja',
                'country' => 'Nigeria',
                'star_rating' => 4,
                'category' => 'Corporate',
                'standard_rate' => 125000,
                'b2b_rate' => 110000,
                'currency' => 'NGN',
                'amenities' => json_encode(['Pool', 'Wi-Fi', 'Breakfast', 'Gym', 'Restaurant', 'Kitchenette', 'Laundry']),
                'is_active' => true,
            ],
            [
                'name' => 'Protea Hotel Ikeja',
                'description' => 'Comfortable 3-star hotel in Ikeja, Lagos. Great value for business travelers.',
                'location' => 'Lagos, Nigeria',
                'city' => 'Lagos',
                'country' => 'Nigeria',
                'star_rating' => 3,
                'category' => 'Budget',
                'standard_rate' => 75000,
                'b2b_rate' => 65000,
                'currency' => 'NGN',
                'amenities' => json_encode(['Wi-Fi', 'Breakfast', 'Restaurant', 'Bar', 'Business Center']),
                'is_active' => true,
            ],
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
