@extends('layouts.app')

@section('title', 'Documentation Services - Royeli Tours & Travel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Documentation Services</h1>
                <p class="text-gray-600">Assistance with supporting documents for applicants and travelers</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('documentation.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    New Service
                </a>
            </div>
        </div>
    </div>

    <!-- Service Categories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Legal Documents -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-gavel text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Legal Documents</h3>
                    <p class="text-sm text-gray-500">Official legal documentation</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Affidavits</p>
                <p>• Notarization</p>
                <p>• Police Character Reports</p>
                <p>• Authorized Translations</p>
            </div>
        </div>

        <!-- Travel Documents -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-plane text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Travel Documents</h3>
                    <p class="text-sm text-gray-500">Travel-related documentation</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Flight Reservations</p>
                <p>• Hotel Reservations</p>
                <p>• Travel Insurance</p>
                <p>• Travel Itineraries</p>
            </div>
        </div>

        <!-- Personal Documents -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-user text-purple-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Personal Documents</h3>
                    <p class="text-sm text-gray-500">Personal identification documents</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p>• Birth Certificates</p>
                <p>• Marriage Certificates</p>
                <p>• NIN Registration</p>
                <p>• Yellow Card</p>
            </div>
        </div>
    </div>

    <!-- Documentation Services Grid -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Available Services</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
            <div class="border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-file-alt text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">{{ $service->service_name }}</h3>
                            <p class="text-sm text-gray-500">{{ Str::limit($service->description, 50) }}</p>
                        </div>
                    </div>
                    @if($service->is_active)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Inactive
                        </span>
                    @endif
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Category:</span>
                        <span class="font-medium">{{ ucfirst($service->category) }}</span>
                    </div>
                    @if($service->processing_time)
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Processing:</span>
                        <span class="font-medium">{{ $service->processing_time }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Standard Rate:</span>
                        <span class="font-medium">{{ $service->formatted_standard_rate }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">B2B Rate:</span>
                        <span class="font-medium text-green-600">{{ $service->formatted_b2b_rate }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">You Save:</span>
                        <span class="font-medium text-green-600">{{ $service->formatted_savings }} ({{ $service->savings_percentage }}%)</span>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <div class="flex space-x-2">
                        <a href="{{ route('documentation.show', $service) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                            <i class="fas fa-eye mr-1"></i>
                            View Details
                        </a>
                        @auth
                            <a href="{{ route('payment.options', ['documentation', $service->id]) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                <i class="fas fa-credit-card mr-1"></i>
                                Order Now
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium" title="Please log in to order this service">
                                <i class="fas fa-sign-in-alt mr-1"></i>
                                Login to Order
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Documentation Services Available</h3>
                    <p class="text-gray-500 mb-4">There are currently no documentation services available. Please check back later or contact us for assistance.</p>
                    <a href="{{ route('documentation.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i>
                        Add Service
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Special Services -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg shadow-sm p-6 text-white">
        <h2 class="text-xl font-semibold mb-4">Special Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="font-medium mb-2">Authorized Document Translation</h3>
                <p class="text-sm text-indigo-100 mb-3">Professional translation services for official documents</p>
                <div class="flex justify-between text-sm">
                    <span>Rate:</span>
                    <span class="font-medium">₦50,000 per page</span>
                </div>
            </div>
            <div>
                <h3 class="font-medium mb-2">Travel Itinerary</h3>
                <p class="text-sm text-indigo-100 mb-3">Detailed travel planning and itinerary creation</p>
                <div class="flex justify-between text-sm">
                    <span>Rate:</span>
                    <span class="font-medium">₦15,000</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 