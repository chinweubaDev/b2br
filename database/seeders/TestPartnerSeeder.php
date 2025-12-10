<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;
use Illuminate\Support\Facades\Hash;

class TestPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'company_name' => 'Test Travel Agency',
            'contact_person' => 'John Doe',
            'email' => 'partner@test.com',
            'phone' => '+234 123 456 7890',
            'address' => '123 Test Street',
            'city' => 'Lagos',
            'state' => 'Lagos',
            'country' => 'Nigeria',
            'postal_code' => '100001',
            'business_type' => 'travel_agent',
            'license_number' => 'TL-2024-001',
            'commission_rate' => 10.00,
            'credit_limit' => 100000.00,
            'current_balance' => 0.00,
            'status' => 'active',
            'payment_terms' => '30_days',
            'password' => Hash::make('password123'),
        ]);

        $this->command->info('Test partner created successfully!');
        $this->command->info('Email: partner@test.com');
        $this->command->info('Password: password123');
    }
}
