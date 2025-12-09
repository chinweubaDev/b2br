<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisaService;
use App\Models\Country;

class VisaServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visaServices = [
            [
                'country_id' => 1, // Canada
                'visa_type' => 'tourist',
                'requirements' => "• Valid passport with at least 6 months validity\n• Completed visa application form\n• Passport-size photographs\n• Proof of financial support\n• Travel itinerary\n• Letter of invitation (if applicable)\n• Medical examination results\n• Police clearance certificate",
                'processing_time' => '2-6 months',
                'standard_rate' => 510000,
                'b2b_rate' => 470000,
                'cost_includes' => 'Application fee, processing, courier service',
                'additional_notes' => 'Processing time may vary based on application volume. Biometric appointment required.',
                'is_active' => true,
            ],
            [
                'country_id' => 2, // United Kingdom
                'visa_type' => 'tourist',
                'requirements' => "• Valid passport with at least 6 months validity\n• Completed online application form\n• Recent passport photographs\n• Bank statements (last 6 months)\n• Employment letter or business registration\n• Travel insurance\n• Accommodation details\n• Flight itinerary",
                'processing_time' => '2-3 weeks',
                'standard_rate' => 595000,
                'b2b_rate' => 500000,
                'cost_includes' => 'Visa fee, processing, document verification',
                'additional_notes' => 'Biometric appointment required at VFS Global center.',
                'is_active' => true,
            ],
            [
                'country_id' => 3, // United States
                'visa_type' => 'tourist',
                'requirements' => "• Valid passport with at least 6 months validity\n• DS-160 confirmation page\n• Appointment confirmation letter\n• Recent passport photograph\n• Financial documents\n• Employment verification\n• Travel itinerary\n• Previous travel history",
                'processing_time' => 'By appointment',
                'standard_rate' => 780000,
                'b2b_rate' => 649000,
                'cost_includes' => 'Visa application fee, appointment booking, document preparation',
                'additional_notes' => 'Interview required at US Embassy. Processing time depends on appointment availability.',
                'is_active' => true,
            ],
            [
                'country_id' => 4, // France
                'visa_type' => 'tourist',
                'requirements' => "• Valid passport with at least 3 months validity\n• Schengen visa application form\n• Recent passport photographs\n• Travel insurance (minimum €30,000 coverage)\n• Flight reservation\n• Hotel bookings\n• Bank statements\n• Employment letter",
                'processing_time' => '2-3 weeks',
                'standard_rate' => 495000,
                'b2b_rate' => 400000,
                'cost_includes' => 'Schengen visa fee, processing, biometric collection',
                'additional_notes' => 'Schengen visa allows travel to 26 European countries.',
                'is_active' => true,
            ],
            [
                'country_id' => 5, // Qatar
                'visa_type' => 'tourist',
                'requirements' => "• Valid passport with at least 6 months validity\n• Completed visa application form\n• Recent passport photograph\n• Hotel reservation\n• Flight itinerary\n• Bank statement\n• Employment letter",
                'processing_time' => '5-10 days',
                'standard_rate' => 160000,
                'b2b_rate' => 135000,
                'cost_includes' => 'Visa fee, processing, e-visa issuance',
                'additional_notes' => 'E-visa available for most nationalities. Valid for 30 days.',
                'is_active' => true,
            ],
            [
                'country_id' => 6, // Kenya
                'visa_type' => 'tourist',
                'requirements' => "• Valid passport with at least 6 months validity\n• Completed online application\n• Recent passport photograph\n• Yellow fever vaccination certificate\n• Flight itinerary\n• Hotel reservation\n• Bank statement",
                'processing_time' => '24-72 hours',
                'standard_rate' => 280000,
                'b2b_rate' => 250000,
                'cost_includes' => 'E-visa fee, processing, online application assistance',
                'additional_notes' => 'E-visa available. Processing is usually very fast.',
                'is_active' => true,
            ],
        ];

        foreach ($visaServices as $visaService) {
            VisaService::create($visaService);
        }
    }
}
