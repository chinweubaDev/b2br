<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Canada', 'code' => 'CA', 'is_active' => true],
            ['name' => 'United Kingdom', 'code' => 'UK', 'is_active' => true],
            ['name' => 'United States', 'code' => 'US', 'is_active' => true],
            ['name' => 'France', 'code' => 'FR', 'is_active' => true],
            ['name' => 'Qatar', 'code' => 'QA', 'is_active' => true],
            ['name' => 'Kenya', 'code' => 'KE', 'is_active' => true],
            ['name' => 'Egypt', 'code' => 'EG', 'is_active' => true],
            ['name' => 'Morocco', 'code' => 'MA', 'is_active' => true],
            ['name' => 'South Africa', 'code' => 'ZA', 'is_active' => true],
            ['name' => 'Tanzania', 'code' => 'TZ', 'is_active' => true],
            ['name' => 'Thailand', 'code' => 'TH', 'is_active' => true],
            ['name' => 'Turkey', 'code' => 'TR', 'is_active' => true],
            ['name' => 'Vietnam', 'code' => 'VN', 'is_active' => true],
            ['name' => 'Zambia', 'code' => 'ZM', 'is_active' => true],
            ['name' => 'Italy', 'code' => 'IT', 'is_active' => true],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
