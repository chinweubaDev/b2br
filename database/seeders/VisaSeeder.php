<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visa;

class VisaSeeder extends Seeder
{
    public function run(): void {
        Visa::create([
            'country' => 'Canada',
            'requirements' => 'Passport, Bank Statement, CAC, etc.',
            'normal_price' => 510000,
            'b2b_price' => 470000,
            'processing_time' => '2 weeks before submission'
        ]);
    }
}
