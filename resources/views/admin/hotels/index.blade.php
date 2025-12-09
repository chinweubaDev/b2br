@extends('admin.layouts.app')

@section('title', 'Hotels - Admin Dashboard')
@section('page-title', 'Hotels')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Hotels</h1>
            <p class="text-gray-400 mt-1">Manage all hotel listings</p>
        </div>
        <a href="{{ route('admin.hotels.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New Hotel
        </a>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="glass-card p-6">
       
    </div>

   

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Luxury Hotels</p>
                <h3 class="text-2xl font-bold text-yellow-400 mt-1">{{ \App\Models\Hotel::where('category', 'Luxury')->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-star text-yellow-400 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Countries</p>
                <h3 class="text-2xl font-bold text-blue-400 mt-1">{{ \App\Models\Hotel::distinct('country')->count('country') }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-globe text-blue-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filter and Search -->
<div class="glass-card p-6 mb-6">
    <form method="GET" action="{{ route('admin.hotels.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Search</label>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Hotel name or location..." 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
            <select 
                name="category" 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Categories</option>
                <option value="Luxury" {{ request('category') == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                <option value="Corporate" {{ request('category') == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                <option value="Tropical" {{ request('category') == 'Tropical' ? 'selected' : '' }}>Tropical</option>
                <option value="Safari" {{ request('category') == 'Safari' ? 'selected' : '' }}>Safari</option>
                <option value="Budget" {{ request('category') == 'Budget' ? 'selected' : '' }}>Budget</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
            <select 
                name="status" 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 px-4 py-3 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition">
                <i class="fas fa-search mr-2"></i>Filter
            </button>
            <a href="{{ route('admin.hotels.index') }}" class="px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                <i class="fas fa-redo"></i>
            </a>
        </div>
    </form>
</div>

<!-- Hotels Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Hotel</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Location</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Category</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Rating</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Rates</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hotels as $hotel)
                <tr class="border-b border-gray-700/50 hover:bg-white/5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            @if($hotel->image)
                                <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}" class="w-12 h-12 object-cover rounded-lg">
                            @else
                                <div class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-hotel text-gray-400"></i>
                                </div>
                            @endif
                            <div>
                                <p class="text-gray-200 font-medium">{{ $hotel->name }}</p>
                                <p class="text-xs text-gray-400">{{ $hotel->star_rating }} Star{{ $hotel->star_rating > 1 ? 's' : '' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <div class="text-gray-300">
                            <p>{{ $hotel->city }}</p>
                            <p class="text-xs text-gray-400">{{ $hotel->country }}</p>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-500/20 text-purple-400">
                            {{ $hotel->category }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-1 text-yellow-400">
                            @for($i = 0; $i < $hotel->star_rating; $i++)
                                <i class="fas fa-star text-xs"></i>
                            @endfor
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <div class="text-gray-300">
                            <p class="text-sm">{{ $hotel->currency }} {{ number_format($hotel->standard_rate, 2) }}</p>
                            <p class="text-xs text-gray-400">B2B: {{ $hotel->currency }} {{ number_format($hotel->b2b_rate, 2) }}</p>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        @if($hotel->is_active)
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
                            <a href="{{ route('admin.hotels.show', $hotel) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.hotels.edit', $hotel) }}" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.hotels.destroy', $hotel) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this hotel?');">
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
                    <td colspan="7" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-hotel text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No hotels found</p>
                            <p class="text-sm mt-2">Add your first hotel to get started</p>
                            <a href="{{ route('admin.hotels.create') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                                <i class="fas fa-plus mr-2"></i>Add Hotel
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
   
</div>
@endsection
