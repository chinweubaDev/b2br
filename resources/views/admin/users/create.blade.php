@extends('admin.layouts.app')

@section('title', 'Create User - Admin Dashboard')
@section('page-title', 'Create User')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Create New User</h1>
            <p class="text-gray-400 mt-1">Add a new user to the system</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Users
        </a>
    </div>
</div>

<!-- Create User Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                Full Name <span class="text-red-400">*</span>
            </label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ old('name') }}"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                required
            >
            @error('name')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                Email Address <span class="text-red-400">*</span>
            </label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ old('email') }}"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                required
            >
            @error('email')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">
                Phone Number
            </label>
            <input 
                type="text" 
                name="phone" 
                id="phone" 
                value="{{ old('phone') }}"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
            @error('phone')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Company Name -->
        <div>
            <label for="company_name" class="block text-sm font-medium text-gray-300 mb-2">
                Company Name
            </label>
            <input 
                type="text" 
                name="company_name" 
                id="company_name" 
                value="{{ old('company_name') }}"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
            @error('company_name')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-300 mb-2">
                Role <span class="text-red-400">*</span>
            </label>
            <select 
                name="role" 
                id="role"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                required
            >
                <option value="">Select a role</option>
                @foreach($roles as $roleValue => $roleLabel)
                    <option value="{{ $roleValue }}" {{ old('role') == $roleValue ? 'selected' : '' }}>
                        {{ $roleLabel }}
                    </option>
                @endforeach
            </select>
            @error('role')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                Password <span class="text-red-400">*</span>
            </label>
            <input 
                type="password" 
                name="password" 
                id="password"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                required
            >
            @error('password')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-xs text-gray-400">Minimum 8 characters</p>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                Confirm Password <span class="text-red-400">*</span>
            </label>
            <input 
                type="password" 
                name="password_confirmation" 
                id="password_confirmation"
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                required
            >
        </div>

        <!-- Active Status -->
        <div class="flex items-center">
            <input 
                type="checkbox" 
                name="is_active" 
                id="is_active" 
                value="1"
                {{ old('is_active', true) ? 'checked' : '' }}
                class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
            >
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-300">
                Active (User can log in)
            </label>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Create User
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
