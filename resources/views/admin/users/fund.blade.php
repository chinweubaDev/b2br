@extends('admin.layouts.app')

@section('title', 'Fund User Wallet - Admin Dashboard')
@section('page-title', 'Fund User Wallet')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Fund User Wallet</h1>
            <p class="text-gray-400 mt-1">Add funds to {{ $user->name }}'s wallet</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Users
        </a>
    </div>
</div>

<!-- User Info Card -->
<div class="glass-card p-6 mb-6">
    <div class="flex items-center gap-4 mb-4">
        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white font-bold text-2xl">
            {{ substr($user->name, 0, 1) }}
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-200">{{ $user->name }}</h2>
            <p class="text-gray-400">{{ $user->email }}</p>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t border-gray-700">
        <div>
            <p class="text-sm text-gray-400">Current Balance</p>
            <p class="text-2xl font-bold text-green-400">{{ $user->formatted_wallet_balance ?? '₦0.00' }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-400">Role</p>
            <p class="text-lg font-medium text-gray-200">{{ ucfirst($user->role) }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-400">Status</p>
            <p class="text-lg font-medium {{ $user->is_active ? 'text-green-400' : 'text-red-400' }}">
                {{ $user->is_active ? 'Active' : 'Inactive' }}
            </p>
        </div>
    </div>
</div>

<!-- Fund Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.users.fund', $user) }}" class="space-y-6">
        @csrf

        <div>
            <label for="amount" class="block text-sm font-medium text-gray-300 mb-2">
                Amount to Add (₦) <span class="text-red-400">*</span>
            </label>
            <input 
                type="number" 
                name="amount" 
                id="amount" 
                value="{{ old('amount') }}"
                min="1"
                step="0.01"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-lg"
                placeholder="0.00"
                required
                autofocus
            >
            @error('amount')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-sm text-gray-400">
                <i class="fas fa-info-circle mr-1"></i>
                Enter the amount you want to add to this user's wallet
            </p>
        </div>

        <!-- Quick Amount Buttons -->
        <div>
            <p class="text-sm font-medium text-gray-300 mb-3">Quick Amounts</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <button 
                    type="button" 
                    onclick="document.getElementById('amount').value = '1000'"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition"
                >
                    ₦1,000
                </button>
                <button 
                    type="button" 
                    onclick="document.getElementById('amount').value = '5000'"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition"
                >
                    ₦5,000
                </button>
                <button 
                    type="button" 
                    onclick="document.getElementById('amount').value = '10000'"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition"
                >
                    ₦10,000
                </button>
                <button 
                    type="button" 
                    onclick="document.getElementById('amount').value = '50000'"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition"
                >
                    ₦50,000
                </button>
            </div>
        </div>

        <!-- Warning Notice -->
        <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-lg p-4">
            <div class="flex items-start gap-3">
                <i class="fas fa-exclamation-triangle text-yellow-400 mt-1"></i>
                <div>
                    <h4 class="text-yellow-400 font-semibold mb-1">Important Notice</h4>
                    <p class="text-sm text-gray-300">
                        This action will immediately credit the user's wallet. Make sure you have verified the amount before proceeding.
                        This transaction will be recorded in the system.
                    </p>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-lg hover:shadow-lg transition font-medium"
                onclick="return confirm('Are you sure you want to fund this user\'s wallet with ₦' + document.getElementById('amount').value + '?')"
            >
                <i class="fas fa-wallet mr-2"></i>Fund Wallet
            </button>
            <a 
                href="{{ route('admin.users.index') }}"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition font-medium"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
