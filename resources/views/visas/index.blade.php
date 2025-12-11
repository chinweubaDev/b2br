@extends('layouts.app')

@section('title', 'Visa Services - Royeli Tours & Travel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Visa Services</h1>
                <p class="text-gray-600">Comprehensive visa processing services for destinations worldwide</p>
            </div>
            <div class="flex items-center space-x-3">
               
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" id="search" placeholder="Search visa services..." class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ request('search') }}">
            </div>
            <div>
                <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                <select id="country" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Countries</option>
                    @foreach($countries as $country)
                        <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                            {{ $country }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Visa Type</label>
                <select id="type" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Types</option>
                    @foreach($visaTypes as $visaType)
                        <option value="{{ $visaType }}" {{ request('type') == $visaType ? 'selected' : '' }}>
                            {{ ucfirst($visaType) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="processing" class="block text-sm font-medium text-gray-700 mb-1">Processing Time</label>
                <select id="processing" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Times</option>
                    <option value="express" {{ request('processing') == 'express' ? 'selected' : '' }}>Express (1-7 days)</option>
                    <option value="standard" {{ request('processing') == 'standard' ? 'selected' : '' }}>Standard (1-4 weeks)</option>
                    <option value="extended" {{ request('processing') == 'extended' ? 'selected' : '' }}>Extended (1-6 months)</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Visa Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($visas as $visa)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-blue-600 font-bold text-sm">{{ strtoupper(substr($visa->country->name, 0, 2)) }}</span>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $visa->country->name }}</h3>
                            <p class="text-sm text-gray-500">{{ ucfirst($visa->visa_type) }} Visa</p>
                        </div>
                    </div>
                    @if($visa->is_active)
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
                        <span class="text-gray-500">Processing Time:</span>
                        <span class="font-medium">{{ $visa->processing_time }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Standard Rate:</span>
                        <span class="font-medium">{{ $visa->formatted_standard_rate }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">B2B Rate:</span>
                        <span class="font-medium text-green-600">{{ $visa->formatted_b2b_rate }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">You Save:</span>
                        <span class="font-medium text-green-600">{{ $visa->formatted_savings }} ({{ $visa->savings_percentage }}%)</span>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <div class="flex space-x-2">
                        <a href="{{ route('visas.show', $visa) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                            <i class="fas fa-eye mr-1"></i>
                            View Details
                        </a>
                        @auth
                            <a href="{{ route('payment.options', ['visa', $visa->id]) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium">
                                <i class="fas fa-credit-card mr-1"></i>
                                Order Now
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-3 rounded-lg text-sm font-medium" title="Please log in to place an order">
                                <i class="fas fa-sign-in-alt mr-1"></i>
                                Login to Order
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-passport text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No Visa Services Available</h3>
                <p class="text-gray-500 mb-4">There are currently no visa services available. Please check back later or contact us for assistance.</p>
               
            </div>
        </div>
        @endforelse
    </div>

    <!-- Load More Button -->
    <div class="text-center">
        <button class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium">
            Load More Visa Services
        </button>
    </div>
</div>

@push('scripts')
<script>
    // Visa filtering functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const countrySelect = document.getElementById('country');
        const typeSelect = document.getElementById('type');
        const processingSelect = document.getElementById('processing');

        // Debounce function for search input
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Apply filters function
        function applyFilters() {
            const params = new URLSearchParams();
            
            const searchValue = searchInput.value.trim();
            const countryValue = countrySelect.value;
            const typeValue = typeSelect.value;
            const processingValue = processingSelect.value;

            if (searchValue) params.append('search', searchValue);
            if (countryValue) params.append('country', countryValue);
            if (typeValue) params.append('type', typeValue);
            if (processingValue) params.append('processing', processingValue);

            // Reload page with filters
            const queryString = params.toString();
            window.location.href = queryString ? `{{ route('visas.index') }}?${queryString}` : '{{ route('visas.index') }}';
        }

        // Add event listeners
        searchInput.addEventListener('input', debounce(applyFilters, 500));
        countrySelect.addEventListener('change', applyFilters);
        typeSelect.addEventListener('change', applyFilters);
        processingSelect.addEventListener('change', applyFilters);
    });
</script>
@endpush
@endsection
