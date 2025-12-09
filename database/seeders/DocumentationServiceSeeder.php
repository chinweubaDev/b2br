<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentationService;

class DocumentationServiceSeeder extends Seeder
{
    public function run(): void
    {
        $docs = [
            [
                'service_name' => 'CAC Registration',
                'description' => 'Company registration and incorporation with the Corporate Affairs Commission (CAC).',
                'standard_rate' => 75000,
                'b2b_rate' => 65000,
                'requirements' => 'Valid ID, Passport Photo, Business Name, Address',
                'processing_time' => '5-10 working days',
                'category' => 'legal',
                'is_active' => true,
            ],
            [
                'service_name' => 'International Passport Processing',
                'description' => 'Assistance with new and renewal of Nigerian international passports.',
                'standard_rate' => 85000,
                'b2b_rate' => 80000,
                'requirements' => 'Birth Certificate, National ID, Passport Photos',
                'processing_time' => '2-4 weeks',
                'category' => 'travel',
                'is_active' => true,
            ],
            [
                'service_name' => 'Business Invitation Letter',
                'description' => 'Official business invitation letters for visa applications.',
                'standard_rate' => 40000,
                'b2b_rate' => 35000,
                'requirements' => 'Company Registration, Passport Copy',
                'processing_time' => '3-5 working days',
                'category' => 'business',
                'is_active' => true,
            ],
            [
                'service_name' => 'Police Character Certificate',
                'description' => 'Obtain a police character certificate for travel or employment abroad.',
                'standard_rate' => 30000,
                'b2b_rate' => 25000,
                'requirements' => 'Valid ID, Passport Photos, Application Letter',
                'processing_time' => '7-14 working days',
                'category' => 'legal',
                'is_active' => true,
            ],
        ];
        foreach ($docs as $doc) {
            DocumentationService::create($doc);
        }
    }
} 