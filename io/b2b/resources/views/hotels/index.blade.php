@extends('layouts.app')

@section('title', 'Hotels - Royeli Tours & Travel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Hotels</h1>
                <p class="text-gray-600">Exclusive B2B hotel deals across Asia, Africa, the Middle East, and Europe</p>
            </div>
           
        </div>
    </div>

    <!-- Hotel Categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Corporate & Business Travel -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Corporate & Business</h3>
                    <p class="text-sm text-gray-500">Business-friendly accommodations</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Hilton Hotels & Resorts</p>
                <p>• Marriott Hotels</p>
                <p>• Radisson Blu</p>
                <p>• InterContinental</p>
                <p>• Hyatt Hotels</p>
            </div>
        </div>

        <!-- Luxury & VIP -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-crown text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Luxury & VIP</h3>
                    <p class="text-sm text-gray-500">Premium luxury experiences</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Four Seasons Hotels</p>
                <p>• The Ritz-Carlton</p>
                <p>• Waldorf Astoria</p>
                <p>• Mandarin Oriental</p>
                <p>• Rosewood Hotels</p>
            </div>
        </div>

        <!-- Tropical & Beach -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-umbrella-beach text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Tropical & Beach</h3>
                    <p class="text-sm text-gray-500">Exotic beachfront locations</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• One&Only Resorts</p>
                <p>• Six Senses Resorts</p>
                <p>• Soneva Resorts</p>
                <p>• Anantara Hotels</p>
                <p>• Atlantis The Palm</p>
            </div>
        </div>
    </div>

    <!-- Featured Hotels -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-900">Featured Hotels</h2>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">All</button>
                <button class="px-3 py-1 text-sm bg-purple-600 text-white rounded-lg">Luxury</button>
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Business</button>
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Beach</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($hotels as $hotel)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="relative">
                    @if($hotel->image)
                        <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center">
                            <i class="fas fa-hotel text-white text-4xl"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            {{ $hotel->star_rating }}-Star
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $hotel->name }}</h3>
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>{{ $hotel->city }}, {{ $hotel->country }}</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">{{ Str::limit($hotel->description, 100) }}</p>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Standard Rate:</span>
                            <span class="font-medium">{{ $hotel->formatted_standard_rate }}/night</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">B2B Rate:</span>
                            <span class="font-medium text-green-600">{{ $hotel->formatted_b2b_rate }}/night</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">You Save:</span>
                            <span class="font-medium text-green-600">{{ $hotel->formatted_savings }} ({{ $hotel->savings_percentage }}%)</span>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <h4 class="font-medium text-sm text-gray-900">Amenities:</h4>
                        <div class="text-xs text-gray-600 space-y-1">
                            @foreach(array_slice($hotel->amenities, 0, 3) as $amenity)
                                <p>{{ $amenity }}</p>
                            @endforeach
                            @if(count($hotel->amenities) > 3)
                                <p class="text-blue-600">+{{ count($hotel->amenities) - 3 }} more</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('hotels.show', $hotel) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                            <i class="fas fa-eye mr-1"></i>
                            View Details
                        </a>
                        @auth
                            <a href="{{ route('payment.options', ['hotel', $hotel->id]) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                <i class="fas fa-credit-card mr-1"></i>
                                Book Now
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium" title="Please log in to book this hotel">
                                <i class="fas fa-sign-in-alt mr-1"></i>
                                Login to Book
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hotel text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Hotels Available</h3>
                    <p class="text-gray-500 mb-4">There are currently no hotels available. Please check back later or contact us for assistance.</p>
                    <a href="{{ route('hotels.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i>
                        Add Hotel
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>

  
</div>
@endsection
