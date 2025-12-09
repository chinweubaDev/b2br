<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceImage;
use App\Models\TourPackage;
use App\Models\Hotel;
use App\Models\Cruise;
use App\Models\VisaService;

class ServiceImageSeeder extends Seeder
{
    public function run(): void
    {
        // Add sample images for tour packages
        $tours = TourPackage::all();
        foreach ($tours as $tour) {
            // Add 3-5 extra images per tour
            for ($i = 1; $i <= rand(3, 5); $i++) {
                ServiceImage::create([
                    'service_type' => 'tour',
                    'service_id' => $tour->id,
                    'image_path' => 'tours/extra/sample-tour-' . $i . '.jpg',
                    'caption' => 'Sample tour image ' . $i . ' for ' . $tour->name,
                    'sort_order' => $i - 1,
                    'is_active' => true,
                ]);
            }
        }

        // Add sample images for hotels
        $hotels = Hotel::all();
        foreach ($hotels as $hotel) {
            // Add 2-4 extra images per hotel
            for ($i = 1; $i <= rand(2, 4); $i++) {
                ServiceImage::create([
                    'service_type' => 'hotel',
                    'service_id' => $hotel->id,
                    'image_path' => 'hotels/extra/sample-hotel-' . $i . '.jpg',
                    'caption' => 'Sample hotel image ' . $i . ' for ' . $hotel->name,
                    'sort_order' => $i - 1,
                    'is_active' => true,
                ]);
            }
        }

        // Add sample images for cruises
        $cruises = Cruise::all();
        foreach ($cruises as $cruise) {
            // Add 2-4 extra images per cruise
            for ($i = 1; $i <= rand(2, 4); $i++) {
                ServiceImage::create([
                    'service_type' => 'cruise',
                    'service_id' => $cruise->id,
                    'image_path' => 'cruises/extra/sample-cruise-' . $i . '.jpg',
                    'caption' => 'Sample cruise image ' . $i . ' for ' . $cruise->name,
                    'sort_order' => $i - 1,
                    'is_active' => true,
                ]);
            }
        }

        // Add sample images for visa services
        $visas = VisaService::all();
        foreach ($visas as $visa) {
            // Add 1-3 extra images per visa service
            for ($i = 1; $i <= rand(1, 3); $i++) {
                ServiceImage::create([
                    'service_type' => 'visa',
                    'service_id' => $visa->id,
                    'image_path' => 'visas/extra/sample-visa-' . $i . '.jpg',
                    'caption' => 'Sample visa image ' . $i . ' for ' . $visa->country->name,
                    'sort_order' => $i - 1,
                    'is_active' => true,
                ]);
            }
        }
    }
} 