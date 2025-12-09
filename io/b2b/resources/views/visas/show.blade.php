@extends('layouts.app')

@section('title', $visa->country->name . ' ' . ucfirst($visa->visa_type) . ' Visa - Royeli Tours & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('visas.index') }}" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Visa Services</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2">{{ $visa->country->name }} {{ ucfirst($visa->visa_type) }} Visa</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="text-blue-600 font-bold text-xl">{{ strtoupper(substr($visa->country->name, 0, 2)) }}</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $visa->country->name }} {{ ucfirst($visa->visa_type) }} Visa</h1>
                        <p class="text-gray-600 mt-1">Professional visa processing service</p>
                        <div class="flex items-center mt-2 space-x-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active Service
                            </span>
                            <span class="text-sm text-gray-500">Processing Time: {{ $visa->processing_time }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- <a href="{{ route('visas.edit', $visa) }}" class="btn-secondary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a> -->
                    @auth
                        <a href="{{ route('payment.options', ['visa', $visa->id]) }}" class="btn btn-primary">
                           
                            Pay Now
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary" title="Please log in to place an order">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login to Order
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Pricing Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Pricing Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Standard Rate</h3>
                            <div class="text-3xl font-bold text-gray-900 mb-2">{{ $visa->formatted_standard_rate }}</div>
                            <p class="text-sm text-gray-600">Regular processing fee</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                            <h3 class="text-lg font-medium text-blue-600 mb-2">B2B Rate</h3>
                            <div class="text-3xl font-bold text-green-600 mb-2">{{ $visa->formatted_b2b_rate }}</div>
                            <p class="text-sm text-green-700">Special rate for travel agents</p>
                            <div class="mt-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Save {{ $visa->formatted_savings }} ({{ $visa->savings_percentage }}%)
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Requirements Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Visa Requirements</h2>
                    <div class="prose max-w-none">
                        {!! nl2br(e($visa->requirements)) !!}
                    </div>
                </div>

                <!-- Processing Information -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Processing Information</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-medium text-gray-900">Processing Time</h3>
                                    <p class="text-sm text-gray-600">{{ $visa->processing_time }}</p>
                                </div>
                            </div>
                        </div>
                        
                        @if($visa->cost_includes)
                        <div class="flex items-start justify-between p-4 bg-green-50 rounded-lg">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-green-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-medium text-gray-900">What's Included</h3>
                                    <div class="text-sm text-gray-600 mt-1">
                                        {!! nl2br(e($visa->cost_includes)) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Additional Notes -->
                @if($visa->additional_notes)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Additional Notes</h2>
                    <div class="prose max-w-none">
                        {!! nl2br(e($visa->additional_notes)) !!}
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        @auth
                            <a href="{{ route('payment.options', ['visa', $visa->id]) }}" class="w-full btn-primary text-center">
                                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Order This Visa
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="w-full btn-primary text-center" title="Please log in to place an order">
                                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                Login to Order
                            </a>
                        @endauth
                        <a href="{{ route('visas.requirements', $visa) }}" class="w-full btn-secondary text-center">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            View Requirements
                        </a>
                        <button onclick="window.print()" class="w-full btn-outline text-center">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            Print Details
                        </button>
                    </div>
                </div>

                <!-- Service Details -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Service Details</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Country:</span>
                            <span class="font-medium">{{ $visa->country->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Visa Type:</span>
                            <span class="font-medium">{{ ucfirst($visa->visa_type) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $visa->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Created:</span>
                            <span class="font-medium">{{ $visa->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="font-medium">{{ $visa->updated_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Related Services -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Other {{ $visa->country->name }} Services</h3>
                    <div class="space-y-3">
                        <a href="#" class="block p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="font-medium text-gray-900">Hotel Bookings</div>
                            <div class="text-sm text-gray-600">Find accommodation in {{ $visa->country->name }}</div>
                        </a>
                        <a href="#" class="block p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="font-medium text-gray-900">Tour Packages</div>
                            <div class="text-sm text-gray-600">Explore {{ $visa->country->name }} with our tours</div>
                        </a>
                        <a href="#" class="block p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="font-medium text-gray-900">Documentation</div>
                            <div class="text-sm text-gray-600">Legal document processing</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mt-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Need Help?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <div>
                        <div class="font-medium text-gray-900">Call Us</div>
                        <div class="text-sm text-gray-600">+234 123 456 7890</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <div>
                        <div class="font-medium text-gray-900">Email Us</div>
                        <div class="text-sm text-gray-600">info@royelitours.com</div>
                    </div>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div>
                        <div class="font-medium text-gray-900">Visit Us</div>
                        <div class="text-sm text-gray-600">Lagos, Nigeria</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Add any interactive functionality here
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
@endpush
@endsection 