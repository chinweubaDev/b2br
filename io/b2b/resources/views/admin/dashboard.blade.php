@extends('layouts.app')

@section('title', 'Dashboard - Royeli Tours & Travel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Welcome to Royeli Tours & Travel</h1>
                <p class="text-gray-600">Your comprehensive B2B travel solutions partner</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Today's Date</p>
                    <p class="text-lg font-semibold text-gray-900">{{ now()->format('F j, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-4">
                             <!-- Wallet Balance -->
                             <div class="bg-dad=rk rounded-lg shadow-sm p-6 border-l-4 border-blue-500" style="background:#000">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-wallet text-green-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Wallet Balance</p>
                        <p class="text-2xl font-bold text-blue-600">{{ ($user ?? auth()->user())->formatted_wallet_balance ?? '₦0.00' }}</p>
                    </div>
                </div>
                <div>
                    <a href="{{ route('wallet.fund') }}" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-green-700 text-xs font-semibold">
                        <i class="fas fa-plus mr-1"></i> Fund Wallet
                    </a>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-white-600 text-sm font-medium">Use wallet for quick payments</span>
            </div>
        </div>

                                </div>
      <div class="col-md-4">
 <!-- Points Balance -->
 <div class="bg-whitde rounded-lg shadow-sm p-6 mt3 border-l-4 border-yellow-400" style='background:#570d7a'>
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-white-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-star text-yellow-500"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Points Balance</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ ($user ?? auth()->user())->points_balance ?? 0 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-white-600 text-sm font-medium">Earn 100 points per successful transaction</span>
            </div>
        </div>
      </div>
           
                               
                            </div> <!--end row--> 
                        </div> <!--end col--> 
                                  
                    </div>
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
      

       
        <!-- Visa Services -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-passport text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Visa Services</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $visaCount ?? 15 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('visas.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View all services →
                </a>
            </div>
        </div>

        <!-- Tour Packages -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marked-alt text-green-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Tour Packages</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $tourCount ?? 8 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('tours.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                    View all packages →
                </a>
            </div>
        </div>

        <!-- Hotels -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hotel text-purple-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Hotels</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $hotelCount ?? 25 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('hotels.index') }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                    View all hotels →
                </a>
            </div>
        </div>

        <!-- Cruises -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-indigo-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-ship text-indigo-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Cruises</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $cruiseCount ?? 3 }}</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('cruises.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                    View all cruises →
                </a>
            </div>
        </div>

    
    </div>

    <!-- Featured Services -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Featured Tour Packages -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Featured Tour Packages</h2>
                <a href="{{ route('tours.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View all →
                </a>
            </div>
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Cape Town Experience</h3>
                            <p class="text-sm text-gray-500">Oct 1–7, 2025 • 7 days</p>
                            <p class="text-sm text-green-600 font-medium">₦3,595,000 B2B Rate</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Featured
                            </span>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">Qatar Wonders</h3>
                            <p class="text-sm text-gray-500">Aug 19–25, 2025 • 7 days</p>
                            <p class="text-sm text-green-600 font-medium">₦2,825,000 B2B Rate</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Popular
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Visa Services -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Popular Visa Services</h2>
                <a href="{{ route('visas.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View all →
                </a>
            </div>
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">UK Tourist Visa</h3>
                            <p class="text-sm text-gray-500">Processing: 2-3 weeks</p>
                            <p class="text-sm text-green-600 font-medium">₦500,000 B2B Rate</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                High Demand
                            </span>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900">USA Tourist Visa</h3>
                            <p class="text-sm text-gray-500">Processing: By appointment</p>
                            <p class="text-sm text-green-600 font-medium">₦649,000 B2B Rate</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                Express
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('visas.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-blue-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">New Visa Application</p>
                    <p class="text-sm text-gray-500">Start visa process</p>
                </div>
            </a>
            <a href="{{ route('tours.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-green-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Book Tour Package</p>
                    <p class="text-sm text-gray-500">Reserve tour</p>
                </div>
            </a>
            <a href="{{ route('hotels.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-purple-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Hotel Booking</p>
                    <p class="text-sm text-gray-500">Reserve hotel</p>
                </div>
            </a>
            <a href="{{ route('documentation.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-file-alt text-indigo-600"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Documentation</p>
                    <p class="text-sm text-gray-500">Get documents</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h2>
        <div class="space-y-4">
            <div class="flex items-center space-x-3">
                <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">New booking received for Qatar Wonders tour</p>
                    <p class="text-xs text-gray-500">2 hours ago</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Visa application approved for UK Tourist Visa</p>
                    <p class="text-xs text-gray-500">1 day ago</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">New partner registration: Travel Express Agency</p>
                    <p class="text-xs text-gray-500">2 days ago</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 