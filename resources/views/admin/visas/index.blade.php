@extends('admin.layouts.app')

@section('title', 'All Visa Services - Admin Dashboard')
@section('page-title', 'Visa Services')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Visa Services</h1>
            <p class="text-gray-400 mt-1">Manage all visa services</p>
        </div>
        <a href="{{ route('admin.visas.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New Visa Service
        </a>
    </div>
</div>

<!-- Filter and Search -->
<div class="glass-card p-6 mb-6">
    <form method="GET" action="{{ route('admin.visas.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Search</label>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Search visa services..."
                class="w-full px-4 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Country</label>
            <select 
                name="country" 
                class="w-full px-4 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Countries</option>
                @foreach(\App\Models\Country::all() as $country)
                    <option value="{{ $country->id }}" {{ request('country') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Visa Type</label>
            <select 
                name="type" 
                class="w-full px-4 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Types</option>
                <option value="tourist" {{ request('type') == 'tourist' ? 'selected' : '' }}>Tourist</option>
                <option value="business" {{ request('type') == 'business' ? 'selected' : '' }}>Business</option>
                <option value="student" {{ request('type') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="work" {{ request('type') == 'work' ? 'selected' : '' }}>Work</option>
                <option value="transit" {{ request('type') == 'transit' ? 'selected' : '' }}>Transit</option>
                <option value="diplomatic" {{ request('type') == 'diplomatic' ? 'selected' : '' }}>Diplomatic</option>
            </select>
        </div>
        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition">
                <i class="fas fa-search mr-2"></i>Filter
            </button>
            <a href="{{ route('admin.visas.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                <i class="fas fa-redo"></i>
            </a>
        </div>
    </form>
</div>

<!-- Visa Services Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Service Name</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Country</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Type</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Processing Time</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Standard Rate</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">B2B Rate</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $visas = \App\Models\VisaService::with('country')->latest()->paginate(15);
                @endphp
                @forelse($visas as $visa)
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-passport text-purple-400"></i>
                            <span class="text-gray-200 font-medium">{{ $visa->service_name }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300">
                        {{ $visa->country->name ?? 'N/A' }}
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400">
                            {{ ucfirst($visa->visa_type) }}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-gray-300 text-sm">{{ $visa->processing_time }}</td>
                    <td class="py-4 px-4 text-gray-300">₦{{ number_format($visa->standard_rate, 2) }}</td>
                    <td class="py-4 px-4 text-green-400 font-semibold">₦{{ number_format($visa->b2b_rate, 2) }}</td>
                    <td class="py-4 px-4">
                        @if($visa->is_active)
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Active
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Inactive
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.visas.show', $visa) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.visas.edit', $visa) }}" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.visas.destroy', $visa) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this visa service?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-passport text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No visa services found</p>
                            <p class="text-sm mt-2">Add your first visa service to get started</p>
                            <a href="{{ route('admin.visas.create') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                                <i class="fas fa-plus mr-2"></i>Add Visa Service
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($visas->hasPages())
    <div class="mt-6">
        {{ $visas->links() }}
    </div>
    @endif
</div>

<!-- Statistics Cards -->
@if($visas->isNotEmpty())
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Total Services</p>
                <p class="text-2xl font-bold text-white">{{ $visas->total() }}</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-purple-500/20 flex items-center justify-center">
                <i class="fas fa-passport text-purple-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Active Services</p>
                <p class="text-2xl font-bold text-green-400">{{ \App\Models\VisaService::where('is_active', true)->count() }}</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-green-500/20 flex items-center justify-center">
                <i class="fas fa-check-circle text-green-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Countries Covered</p>
                <p class="text-2xl font-bold text-blue-400">{{ \App\Models\VisaService::distinct('country_id')->count('country_id') }}</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center">
                <i class="fas fa-globe text-blue-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400 mb-1">Avg. Processing</p>
                <p class="text-2xl font-bold text-yellow-400">5-7 days</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center">
                <i class="fas fa-clock text-yellow-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
