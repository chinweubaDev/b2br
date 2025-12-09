@extends('layouts.app')

@section('title', $hotel->name . ' - Hotel Details')

@section('page-title', $hotel->name)

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hotel Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-6">
        <div class="relative h-64 bg-gradient-to-r from-blue-600 to-purple-600">
            <!-- Placeholder for hotel image -->
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-">
                    <i class="fas fa-hotel text-6xl mb-4 opacit0"></i>
                    <h1 class="text-3xl mt-3 text-dark font-bold" style='color:#000'>{{ $hotel->name }}  - {{ $hotel->location }}</h1> <br>
                    <p class="text-xl opacity-90"></p>
                </div>
            </div>
            
           
            <!-- Category Badge -->
            <div class="absolute top-4 left-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $hotel->category_badge_class }}">
                    {{ $hotel->category }}
                </span>
            </div>
        </div>

        <!-- Quick Info Bar -->
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <div class="flex flex-wrap items-center justify-between gap-4">
                
                <div class="flex items-center space-x-6">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                        <span>{{ $hotel->city }}, {{ $hotel->country }}</span>
                    </div>
                    
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-tag mr-2 text-green-500"></i>
                        <span>{{ $hotel->category }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-star mr-2 text-yellow-500"></i>
                        <span>{{ $hotel->star_rating }} Stars</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- <a href="{{ route('hotels.edit', $hotel) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Hotel
                    </a> -->
                    <a href="{{ route('payment.options', ['serviceType' => 'hotel', 'serviceId' => $hotel->id]) }}" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Hotel Description -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>
                    About This Hotel
                </h2>
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 leading-relaxed">{{ $hotel->description }}</p>
                </div>
            </div>

            <!-- Amenities -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-concierge-bell mr-3 text-blue-500"></i>
                    Hotel Amenities
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($hotel->amenities as $amenity)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <span class="text-gray-700 font-medium">{{ $amenity }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Location & Contact -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-map-marked-alt mr-3 text-blue-500"></i>
                    Location & Contact
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Location</h3>
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-red-500 mr-3 mt-1"></i>
                            <div>
                                <p class="text-gray-700 font-medium">{{ $hotel->name }}</p>
                                <p class="text-gray-600">{{ $hotel->location }}</p>
                                <p class="text-gray-600">{{ $hotel->city }}, {{ $hotel->country }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Hotel Details</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-500 mr-3"></i>
                                <span class="text-gray-700">{{ $hotel->star_rating }}-Star Rating</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-tag text-blue-500 mr-3"></i>
                                <span class="text-gray-700">{{ $hotel->category }} Category</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-toggle-on text-green-500 mr-3"></i>
                                <span class="text-gray-700">{{ $hotel->is_active ? 'Active' : 'Inactive' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Pricing Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-money-bill-wave mr-3 text-green-500"></i>
                    Pricing
                </h3>
                
                <div class="space-y-4">
                    <!-- Standard Rate -->
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="text-sm text-gray-600">Standard Rate</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $hotel->formatted_standard_rate }}</p>
                        </div>
                        <i class="fas fa-user text-gray-400"></i>
                    </div>

                    <!-- B2B Rate -->
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                        <div>
                            <p class="text-sm text-blue-600">B2B Rate</p>
                            <p class="text-lg font-semibold text-blue-900">{{ $hotel->formatted_b2b_rate }}</p>
                        </div>
                        <i class="fas fa-building text-blue-500"></i>
                    </div>

                    <!-- Savings -->
                    <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg border border-green-200">
                        <div>
                            <p class="text-sm text-green-600">You Save</p>
                            <p class="text-lg font-semibold text-green-900">{{ $hotel->formatted_savings }}</p>
                            <p class="text-xs text-green-600">({{ $hotel->savings_percentage }}% off)</p>
                        </div>
                        <i class="fas fa-piggy-bank text-green-500"></i>
                    </div>
                </div>

                <!-- Book Now Button -->
                <div class="mt-6">
                    <a href="{{ route('payment.options', ['serviceType' => 'hotel', 'serviceId' => $hotel->id]) }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors duration-200">
                        <i class="fas fa-calendar-plus mr-2"></i>
                        Book This Hotel
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-bolt mr-3 text-yellow-500"></i>
                    Quick Actions
                </h3>
                
                <div class="space-y-3">
                    <!-- <a href="{{ route('hotels.edit', $hotel) }}" 
                       class="flex items-center w-full p-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-edit mr-3 text-blue-500"></i>
                        <span>Edit Hotel</span>
                    </a> -->
                    
                    <button onclick="window.print()" 
                            class="flex items-center w-full p-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-print mr-3 text-gray-500"></i>
                        <span>Print Details</span>
                    </button>
                    
                    <button onclick="navigator.share({title: '{{ $hotel->name }}', text: '{{ $hotel->description }}', url: window.location.href})" 
                            class="flex items-center w-full p-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-share mr-3 text-green-500"></i>
                        <span>Share Hotel</span>
                    </button>
                </div>
            </div>

            <!-- Hotel Status -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>
                    Hotel Status
                </h3>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $hotel->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $hotel->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Category:</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $hotel->category_badge_class }}">
                            {{ $hotel->category }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Star Rating:</span>
                        <span class="text-yellow-500 font-semibold">{{ $hotel->star_rating_display }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Currency:</span>
                        <span class="font-semibold text-gray-900">{{ $hotel->currency }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Hotels -->
    <div class="mt-8 text-center">
        <a href="{{ route('hotels.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Hotels
        </a>
    </div>
</div>

@push('scripts')
<script>
    // Add any additional JavaScript for the hotel show page
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any interactive elements
        console.log('Hotel details page loaded');
    });
</script>
@endpush
@endsection 