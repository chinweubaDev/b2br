<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin
        User::updateOrCreate(
            ['email' => 'admin@royelitravel.com'],
            [
                'name' => 'Super Administrator',
                'email' => 'admin@royelitravel.com',
                'password' => Hash::make('password123'), // Change this in production!
                'role' => User::ROLE_ADMIN,
                'phone' => '+234 800 000 0001',
                'company_name' => 'Royeli Tours & Travel',
                'is_active' => true,
                'email_verified_at' => now(),
                'wallet_balance' => 0,
                'points_balance' => 0,
            ]
        );

        // Create Manager
        User::updateOrCreate(
            ['email' => 'manager@royelitravel.com'],
            [
                'name' => 'Travel Manager',
                'email' => 'manager@royelitravel.com',
                'password' => Hash::make('password123'), // Change this in production!
                'role' => User::ROLE_MANAGER,
                'phone' => '+234 800 000 0002',
                'company_name' => 'Royeli Tours & Travel',
                'is_active' => true,
                'email_verified_at' => now(),
                'wallet_balance' => 0,
                'points_balance' => 0,
            ]
        );

        // Create Sample Agent
        User::updateOrCreate(
            ['email' => 'agent@royelitravel.com'],
            [
                'name' => 'Travel Agent',
                'email' => 'agent@royelitravel.com',
                'password' => Hash::make('password123'), // Change this in production!
                'role' => User::ROLE_AGENT,
                'phone' => '+234 800 000 0003',
                'company_name' => 'Sample Travel Agency',
                'is_active' => true,
                'email_verified_at' => now(),
                'wallet_balance' => 50000.00,
                'points_balance' => 500,
            ]
        );

        // Create Sample User
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'John Doe',
                'email' => 'user@example.com',
                'password' => Hash::make('password123'), // Change this in production!
                'role' => User::ROLE_USER,
                'phone' => '+234 800 000 0004',
                'company_name' => null,
                'is_active' => true,
                'email_verified_at' => now(),
                'wallet_balance' => 10000.00,
                'points_balance' => 100,
            ]
        );

        $this->command->info('✅ Admin users seeded successfully!');
        $this->command->info('');
        $this->command->info('Login Credentials:');
        $this->command->info('==================');
        $this->command->info('Super Admin:');
        $this->command->info('  Email: admin@royelitravel.com');
        $this->command->info('  Password: password123');
        $this->command->info('');
        $this->command->info('Manager:');
        $this->command->info('  Email: manager@royelitravel.com');
        $this->command->info('  Password: password123');
        $this->command->info('');
        $this->command->info('Agent:');
        $this->command->info('  Email: agent@royelitravel.com');
        $this->command->info('  Password: password123');
        $this->command->info('');
        $this->command->info('User:');
        $this->command->info('  Email: user@example.com');
        $this->command->info('  Password: password123');
        $this->command->info('');
        $this->command->warn('⚠️  IMPORTANT: Change these passwords in production!');
    }
}
