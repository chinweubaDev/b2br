@extends('admin.layouts.app')

@section('title', 'Edit Booking - Admin Dashboard')
@section('page-title', 'Edit Booking')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Edit Booking</h1>
            <p class="text-gray-400 mt-1">Update booking #{{ $booking->reference_number }}</p>
        </div>
        <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Bookings
        </a>
    </div>
</div>

<!-- Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.bookings.update', $booking) }}" class="space-y-8">
        @csrf
        @method('PUT')
        
        <!-- Service Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-info-circle mr-2 text-purple-400"></i>Service Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="booking_type" class="block text-sm font-medium text-gray-300 mb-2">
                        Booking Type <span class="text-red-400">*</span>
                    </label>
                    <select 
                        id="booking_type" 
                        name="booking_type" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('booking_type') border-red-500 @enderror"
                    >
                        <option value="">Select Booking Type</option>
                        <option value="visa" {{ old('booking_type', $booking->booking_type) == 'visa' ? 'selected' : '' }}>Visa Service</option>
                        <option value="tour" {{ old('booking_type', $booking->booking_type) == 'tour' ? 'selected' : '' }}>Tour Package</option>
                        <option value="hotel" {{ old('booking_type', $booking->booking_type) == 'hotel' ? 'selected' : '' }}>Hotel</option>
                        <option value="cruise" {{ old('booking_type', $booking->booking_type) == 'cruise' ? 'selected' : '' }}>Cruise</option>
                        <option value="documentation" {{ old('booking_type', $booking->booking_type) == 'documentation' ? 'selected' : '' }}>Documentation</option>
                    </select>
                    @error('booking_type')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="service_name" class="block text-sm font-medium text-gray-300 mb-2">
                        Service Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="service_name" 
                        name="service_name" 
                        value="{{ old('service_name', $booking->service_name) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('service_name') border-red-500 @enderror"
                        placeholder="Enter service name"
                    >
                    @error('service_name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Pricing Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-money-bill-wave mr-2 text-green-400"></i>Pricing Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-300 mb-2">
                        Amount <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="amount" 
                        name="amount" 
                        value="{{ old('amount', $booking->amount) }}" 
                        step="0.01" 
                        min="0" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('amount') border-red-500 @enderror"
                        placeholder="0.00"
                    >
                    @error('amount')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="currency" class="block text-sm font-medium text-gray-300 mb-2">
                        Currency <span class="text-red-400">*</span>
                    </label>
                    <select 
                        id="currency" 
                        name="currency" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('currency') border-red-500 @enderror"
                    >
                        <option value="NGN" {{ old('currency', $booking->currency) == 'NGN' ? 'selected' : '' }}>NGN (Nigerian Naira)</option>
                        <option value="USD" {{ old('currency', $booking->currency) == 'USD' ? 'selected' : '' }}>USD (US Dollar)</option>
                        <option value="EUR" {{ old('currency', $booking->currency) == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                        <option value="GBP" {{ old('currency', $booking->currency) == 'GBP' ? 'selected' : '' }}>GBP (British Pound)</option>
                    </select>
                    @error('currency')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Travel Details -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-plane-departure mr-2 text-blue-400"></i>Travel Details
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="travel_date" class="block text-sm font-medium text-gray-300 mb-2">
                        Travel Date
                    </label>
                    <input 
                        type="date" 
                        id="travel_date" 
                        name="travel_date" 
                        value="{{ old('travel_date', $booking->travel_date) }}" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('travel_date') border-red-500 @enderror"
                    >
                    @error('travel_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="return_date" class="block text-sm font-medium text-gray-300 mb-2">
                        Return Date
                    </label>
                    <input 
                        type="date" 
                        id="return_date" 
                        name="return_date" 
                        value="{{ old('return_date', $booking->return_date) }}" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('return_date') border-red-500 @enderror"
                    >
                    @error('return_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="passengers" class="block text-sm font-medium text-gray-300 mb-2">
                        Number of Passengers
                    </label>
                    <input 
                        type="number" 
                        id="passengers" 
                        name="passengers" 
                        value="{{ old('passengers', $booking->passengers) }}" 
                        min="1" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('passengers') border-red-500 @enderror"
                    >
                    @error('passengers')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Booking Status -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-check-circle mr-2 text-yellow-400"></i>Booking Status
            </h3>
            
            <div>
                <label for="status" class="block text-sm font-medium text-gray-300 mb-2">
                    Status <span class="text-red-400">*</span>
                </label>
                <select 
                    id="status" 
                    name="status" 
                    required 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('status') border-red-500 @enderror"
                >
                    <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Description -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-align-left mr-2 text-pink-400"></i>Description
            </h3>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">
                    Description <span class="text-red-400">*</span>
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="6" 
                    required 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('description') border-red-500 @enderror"
                    placeholder="Provide a detailed description of the booking..."
                >{{ old('description', $booking->description) }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Additional Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-clipboard mr-2 text-indigo-400"></i>Additional Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="special_requirements" class="block text-sm font-medium text-gray-300 mb-2">
                        Special Requirements
                    </label>
                    <textarea 
                        id="special_requirements" 
                        name="special_requirements" 
                        rows="4" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('special_requirements') border-red-500 @enderror"
                        placeholder="Any special requirements or requests..."
                    >{{ old('special_requirements', $booking->special_requirements) }}</textarea>
                    @error('special_requirements')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-300 mb-2">
                        Notes
                    </label>
                    <textarea 
                        id="notes" 
                        name="notes" 
                        rows="4" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('notes') border-red-500 @enderror"
                        placeholder="Additional notes or comments..."
                    >{{ old('notes', $booking->notes) }}</textarea>
                    @error('notes')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Update Booking
            </button>
            <a 
                href="{{ route('admin.bookings.index') }}"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition font-medium"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection