@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Edit Booking</h1>
            <a href="{{ route('bookings.show', $booking) }}" class="btn-secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Booking
            </a>
        </div>

        <div class="card">
            <form action="{{ route('bookings.update', $booking) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Booking Type and Service -->
                    <div class="space-y-4">
                        <div>
                            <label for="booking_type" class="form-label">Booking Type *</label>
                            <select id="booking_type" name="booking_type" required class="form-input @error('booking_type') border-red-500 @enderror">
                                <option value="">Select Booking Type</option>
                                <option value="visa" {{ old('booking_type', $booking->booking_type) == 'visa' ? 'selected' : '' }}>Visa Service</option>
                                <option value="tour" {{ old('booking_type', $booking->booking_type) == 'tour' ? 'selected' : '' }}>Tour Package</option>
                                <option value="hotel" {{ old('booking_type', $booking->booking_type) == 'hotel' ? 'selected' : '' }}>Hotel</option>
                                <option value="cruise" {{ old('booking_type', $booking->booking_type) == 'cruise' ? 'selected' : '' }}>Cruise</option>
                                <option value="documentation" {{ old('booking_type', $booking->booking_type) == 'documentation' ? 'selected' : '' }}>Documentation</option>
                            </select>
                            @error('booking_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="service_name" class="form-label">Service Name *</label>
                            <input type="text" id="service_name" name="service_name" value="{{ old('service_name', $booking->service_name) }}" required class="form-input @error('service_name') border-red-500 @enderror">
                            @error('service_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="amount" class="form-label">Amount (₦) *</label>
                            <input type="number" id="amount" name="amount" value="{{ old('amount', $booking->amount) }}" step="0.01" min="0" required class="form-input @error('amount') border-red-500 @enderror">
                            @error('amount')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="currency" class="form-label">Currency *</label>
                            <select id="currency" name="currency" required class="form-input @error('currency') border-red-500 @enderror">
                                <option value="NGN" {{ old('currency', $booking->currency) == 'NGN' ? 'selected' : '' }}>NGN (Nigerian Naira)</option>
                                <option value="USD" {{ old('currency', $booking->currency) == 'USD' ? 'selected' : '' }}>USD (US Dollar)</option>
                                <option value="EUR" {{ old('currency', $booking->currency) == 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                                <option value="GBP" {{ old('currency', $booking->currency) == 'GBP' ? 'selected' : '' }}>GBP (British Pound)</option>
                            </select>
                            @error('currency')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Travel Dates and Passengers -->
                    <div class="space-y-4">
                        <div>
                            <label for="travel_date" class="form-label">Travel Date</label>
                            <input type="date" id="travel_date" name="travel_date" value="{{ old('travel_date', $booking->travel_date ? $booking->travel_date->format('Y-m-d') : '') }}" class="form-input @error('travel_date') border-red-500 @enderror">
                            @error('travel_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="return_date" class="form-label">Return Date</label>
                            <input type="date" id="return_date" name="return_date" value="{{ old('return_date', $booking->return_date ? $booking->return_date->format('Y-m-d') : '') }}" class="form-input @error('return_date') border-red-500 @enderror">
                            @error('return_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="passengers" class="form-label">Number of Passengers</label>
                            <input type="number" id="passengers" name="passengers" value="{{ old('passengers', $booking->passengers ?? 1) }}" min="1" class="form-input @error('passengers') border-red-500 @enderror">
                            @error('passengers')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="form-label">Status *</label>
                            <select id="status" name="status" required class="form-input @error('status') border-red-500 @enderror">
                                <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label for="description" class="form-label">Description *</label>
                    <textarea id="description" name="description" rows="4" required class="form-input @error('description') border-red-500 @enderror">{{ old('description', $booking->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Special Requirements and Notes -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="special_requirements" class="form-label">Special Requirements</label>
                        <textarea id="special_requirements" name="special_requirements" rows="4" class="form-input @error('special_requirements') border-red-500 @enderror">{{ old('special_requirements', $booking->special_requirements) }}</textarea>
                        @error('special_requirements')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="notes" class="form-label">Notes</label>
                        <textarea id="notes" name="notes" rows="4" class="form-input @error('notes') border-red-500 @enderror">{{ old('notes', $booking->notes) }}</textarea>
                        @error('notes')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('bookings.show', $booking) }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookingType = document.getElementById('booking_type');
        const serviceName = document.getElementById('service_name');
        
        // Auto-fill service name based on booking type
        bookingType.addEventListener('change', function() {
            const type = this.value;
            const serviceNames = {
                'visa': 'Visa Application Service',
                'tour': 'Tour Package Booking',
                'hotel': 'Hotel Reservation',
                'cruise': 'Cruise Package',
                'documentation': 'Documentation Service'
            };
            
            if (serviceNames[type] && !serviceName.value) {
                serviceName.value = serviceNames[type];
            }
        });
    });
</script>
@endpush
@endsection 