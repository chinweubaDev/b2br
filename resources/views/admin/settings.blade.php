@extends('admin.layouts.app')

@section('title', 'System Settings - Admin Dashboard')
@section('page-title', 'System Settings')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">System Settings</h1>
            <p class="text-gray-400 mt-1">Configure your application settings</p>
        </div>
    </div>
</div>

<!-- Settings Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- General Settings -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-cog mr-2 text-purple-400"></i>General Settings
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Application Name</label>
                    <input 
                        type="text" 
                        name="app_name" 
                        value="{{ config('app.name') }}"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Support Email</label>
                    <input 
                        type="email" 
                        name="support_email" 
                        value="support@b2br.com"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Contact Phone</label>
                    <input 
                        type="text" 
                        name="contact_phone" 
                        value="+234 XXX XXX XXXX"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    >
                </div>
            </div>
        </div>

        <!-- Payment Settings -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-credit-card mr-2 text-green-400"></i>Payment Settings
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Paystack Public Key</label>
                    <input 
                        type="text" 
                        name="paystack_public_key" 
                        value="{{ config('paystack.publicKey') ?? 'pk_test_xxxxx' }}"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition font-mono text-sm"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Currency</label>
                    <select 
                        name="currency"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    >
                        <option value="NGN" selected>Nigerian Naira (₦)</option>
                        <option value="USD">US Dollar ($)</option>
                        <option value="EUR">Euro (€)</option>
                        <option value="GBP">British Pound (£)</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        name="maintenance_mode" 
                        id="maintenance_mode"
                        class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                    >
                    <label for="maintenance_mode" class="ml-2 text-sm font-medium text-gray-300">
                        Enable Maintenance Mode
                    </label>
                </div>
            </div>
        </div>

        <!-- Email Settings -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-envelope mr-2 text-blue-400"></i>Email Settings
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">SMTP Host</label>
                    <input 
                        type="text" 
                        name="mail_host" 
                        value="{{ config('mail.mailers.smtp.host') ?? 'smtp.mailtrap.io' }}"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    >
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">SMTP Port</label>
                        <input 
                            type="text" 
                            name="mail_port" 
                            value="{{ config('mail.mailers.smtp.port') ?? '2525' }}"
                            class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Encryption</label>
                        <select 
                            name="mail_encryption"
                            class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                        >
                            <option value="tls" selected>TLS</option>
                            <option value="ssl">SSL</option>
                            <option value="">None</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">From Email</label>
                    <input 
                        type="email" 
                        name="mail_from_address" 
                        value="{{ config('mail.from.address') ?? 'noreply@b2br.com' }}"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    >
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-shield-alt mr-2 text-red-400"></i>Security Settings
            </h3>
            <div class="space-y-4">
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        name="require_email_verification" 
                        id="require_email_verification"
                        checked
                        class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                    >
                    <label for="require_email_verification" class="ml-2 text-sm font-medium text-gray-300">
                        Require Email Verification
                    </label>
                </div>
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        name="enable_two_factor" 
                        id="enable_two_factor"
                        class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                    >
                    <label for="enable_two_factor" class="ml-2 text-sm font-medium text-gray-300">
                        Enable Two-Factor Authentication
                    </label>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Session Timeout (minutes)</label>
                    <input 
                        type="number" 
                        name="session_timeout" 
                        value="120"
                        min="5"
                        max="1440"
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    >
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Save Settings
            </button>
            <button 
                type="reset"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition font-medium"
            >
                Reset
            </button>
        </div>
    </form>
</div>

<!-- Info Notice -->
<div class="bg-blue-500/10 border border-blue-500/30 rounded-lg p-4 mt-6">
    <div class="flex items-start gap-3">
        <i class="fas fa-info-circle text-blue-400 mt-1"></i>
        <div>
            <h4 class="text-blue-400 font-semibold mb-1">Configuration Note</h4>
            <p class="text-sm text-gray-300">
                Some settings require server-level configuration changes. 
                Please ensure you have the necessary permissions and backup your configuration before making changes.
            </p>
        </div>
    </div>
</div>
@endsection
