@extends('layouts.app')

@section('title', 'Cruise Packages - Royeli Tours & Travel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Cruise Packages</h1>
                <p class="text-gray-600">Discover luxury cruise experiences to exotic destinations</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('cruises.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    New Cruise Package
                </a>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" id="search" placeholder="Search cruise packages..." class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                <select id="destination" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Destinations</option>
                    <option value="caribbean">Caribbean</option>
                    <option value="mediterranean">Mediterranean</option>
                    <option value="alaska">Alaska</option>
                    <option value="europe">Europe</option>
                    <option value="asia">Asia</option>
                    <option value="australia">Australia</option>
                    <option value="hawaii">Hawaii</option>
                    <option value="mexico">Mexico</option>
                </select>
            </div>
            <div>
                <label for="cruise_line" class="block text-sm font-medium text-gray-700 mb-1">Cruise Line</label>
                <select id="cruise_line" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Cruise Lines</option>
                    <option value="royal-caribbean">Royal Caribbean</option>
                    <option value="carnival">Carnival</option>
                    <option value="norwegian">Norwegian</option>
                    <option value="celebrity">Celebrity</option>
                    <option value="princess">Princess</option>
                    <option value="disney">Disney</option>
                    <option value="holland-america">Holland America</option>
                </select>
            </div>
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                <select id="duration" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Durations</option>
                    <option value="1-3">1-3 Days</option>
                    <option value="4-7">4-7 Days</option>
                    <option value="8-14">8-14 Days</option>
                    <option value="15+">15+ Days</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Cruise Packages Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($cruises as $cruise)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                @if($cruise->image)
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('storage/' . $cruise->image) }}" alt="{{ $cruise->name }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center">
                        <i class="fas fa-ship text-white text-4xl"></i>
                    </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-ship text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $cruise->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $cruise->cruise_line }}</p>
                            </div>
                        </div>
                        @if($cruise->is_featured)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Featured
                            </span>
                        @endif
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Destination:</span>
                            <span class="font-medium">{{ $cruise->destination }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium">{{ $cruise->duration_days }} Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦{{ number_format($cruise->standard_rate) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦{{ number_format($cruise->b2b_rate) }}</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="{{ route('cruises.show', $cruise) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            @auth
                                <a href="{{ route('payment.options', ['cruise', $cruise->id]) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                    <i class="fas fa-credit-card mr-1"></i>
                                    Book Now
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium" title="Please log in to book this cruise">
                                    <i class="fas fa-sign-in-alt mr-1"></i>
                                    Login to Book
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Placeholder Cards -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center">
                    <i class="fas fa-ship text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-ship text-blue-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Caribbean Paradise</h3>
                                <p class="text-sm text-gray-500">Royal Caribbean</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Featured
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Destination:</span>
                            <span class="font-medium">Caribbean</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium">7 Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦2,850,000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦2,700,000</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            <a href="#" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
                    <i class="fas fa-ship text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-ship text-purple-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Mediterranean Dream</h3>
                                <p class="text-sm text-gray-500">Celebrity Cruises</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Popular
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Destination:</span>
                            <span class="font-medium">Mediterranean</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium">10 Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦4,200,000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦3,950,000</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            <a href="#" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center">
                    <i class="fas fa-ship text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-ship text-green-600"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-semibold text-gray-900">Alaska Adventure</h3>
                                <p class="text-sm text-gray-500">Princess Cruises</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Destination:</span>
                            <span class="font-medium">Alaska</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-medium">14 Days</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">₦5,800,000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">₦5,500,000</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex space-x-2">
                            <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                View Details
                            </a>
                            <a href="#" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Load More Button -->
    <div class="text-center">
        <button class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium">
            Load More Cruise Packages
        </button>
    </div>
</div>

@push('scripts')
<script>
    // Search and filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const destinationSelect = document.getElementById('destination');
        const cruiseLineSelect = document.getElementById('cruise_line');
        const durationSelect = document.getElementById('duration');
        
        // Add event listeners for filtering
        [searchInput, destinationSelect, cruiseLineSelect, durationSelect].forEach(element => {
            element.addEventListener('change', filterCruisePackages);
            element.addEventListener('input', filterCruisePackages);
        });
        
        function filterCruisePackages() {
            // Implementation for filtering cruise packages
            console.log('Filtering cruise packages...');
        }
    });
</script>
@endpush
@endsection 