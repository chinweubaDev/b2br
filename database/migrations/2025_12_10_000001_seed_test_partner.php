<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create a test partner account
        DB::table('partners')->insert([
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
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('partners')->where('email', 'partner@test.com')->delete();
    }
};
