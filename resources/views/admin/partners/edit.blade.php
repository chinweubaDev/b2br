@extends('admin.layouts.app')

@section('title', 'Edit Partner - Admin Dashboard')
@section('page-title', 'Edit Partner')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Edit Partner</h1>
            <p class="text-gray-400 mt-1">Update {{ $partner->company_name }}</p>
        </div>
        <a href="{{ route('admin.partners.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Partners
        </a>
    </div>
</div>

<!-- Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.partners.update', $partner) }}" class="space-y-8">
        @csrf
        @method('PUT')
        
        <!-- Company Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-building mr-2 text-purple-400"></i>Company Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-300 mb-2">
                        Company Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="company_name" 
                        name="company_name" 
                        value="{{ old('company_name', $partner->company_name) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('company_name') border-red-500 @enderror"
                    >
                    @error('company_name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact_person" class="block text-sm font-medium text-gray-300 mb-2">
                        Contact Person <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="contact_person" 
                        name="contact_person" 
                        value="{{ old('contact_person', $partner->contact_person) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('contact_person') border-red-500 @enderror"
                    >
                    @error('contact_person')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Email Address <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $partner->email) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('email') border-red-500 @enderror"
                    >
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">
                        Phone Number <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        value="{{ old('phone', $partner->phone) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('phone') border-red-500 @enderror"
                    >
                    @error('phone')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="website" class="block text-sm font-medium text-gray-300 mb-2">
                        Website
                    </label>
                    <input 
                        type="url" 
                        id="website" 
                        name="website" 
                        value="{{ old('website', $partner->website) }}" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('website') border-red-500 @enderror"
                        placeholder="https://"
                    >
                    @error('website')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="business_type" class="block text-sm font-medium text-gray-300 mb-2">
                        Business Type <span class="text-red-400">*</span>
                    </label>
                    <select 
                        id="business_type" 
                        name="business_type" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('business_type') border-red-500 @enderror"
                    >
                        <option value="">Select Business Type</option>
                        <option value="travel_agent" {{ old('business_type', $partner->business_type) == 'travel_agent' ? 'selected' : '' }}>Travel Agent</option>
                        <option value="tour_operator" {{ old('business_type', $partner->business_type) == 'tour_operator' ? 'selected' : '' }}>Tour Operator</option>
                        <option value="corporate" {{ old('business_type', $partner->business_type) == 'corporate' ? 'selected' : '' }}>Corporate</option>
                        <option value="individual" {{ old('business_type', $partner->business_type) == 'individual' ? 'selected' : '' }}>Individual</option>
                    </select>
                    @error('business_type')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-map-marker-alt mr-2 text-blue-400"></i>Address Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-300 mb-2">
                        Address <span class="text-red-400">*</span>
                    </label>
                    <textarea 
                        id="address" 
                        name="address" 
                        rows="3" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('address') border-red-500 @enderror"
                    >{{ old('address', $partner->address) }}</textarea>
                    @error('address')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="city" class="block text-sm font-medium text-gray-300 mb-2">
                        City <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="city" 
                        name="city" 
                        value="{{ old('city', $partner->city) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('city') border-red-500 @enderror"
                    >
                    @error('city')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="state" class="block text-sm font-medium text-gray-300 mb-2">
                        State <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="state" 
                        name="state" 
                        value="{{ old('state', $partner->state) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('state') border-red-500 @enderror"
                    >
                    @error('state')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-300 mb-2">
                        Country <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="country" 
                        name="country" 
                        value="{{ old('country', $partner->country) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('country') border-red-500 @enderror"
                    >
                    @error('country')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-300 mb-2">
                        Postal Code
                    </label>
                    <input 
                        type="text" 
                        id="postal_code" 
                        name="postal_code" 
                        value="{{ old('postal_code', $partner->postal_code) }}" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('postal_code') border-red-500 @enderror"
                    >
                    @error('postal_code')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Business Details -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-briefcase mr-2 text-green-400"></i>Business Details
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="license_number" class="block text-sm font-medium text-gray-300 mb-2">
                        License Number
                    </label>
                    <input 
                        type="text" 
                        id="license_number" 
                        name="license_number" 
                        value="{{ old('license_number', $partner->license_number) }}" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('license_number') border-red-500 @enderror"
                    >
                    @error('license_number')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tax_id" class="block text-sm font-medium text-gray-300 mb-2">
                        Tax ID
                    </label>
                    <input 
                        type="text" 
                        id="tax_id" 
                        name="tax_id" 
                        value="{{ old('tax_id', $partner->tax_id) }}" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('tax_id') border-red-500 @enderror"
                    >
                    @error('tax_id')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="commission_rate" class="block text-sm font-medium text-gray-300 mb-2">
                        Commission Rate (%) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="commission_rate" 
                        name="commission_rate" 
                        value="{{ old('commission_rate', $partner->commission_rate) }}" 
                        min="0" 
                        max="100" 
                        step="0.01" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('commission_rate') border-red-500 @enderror"
                    >
                    @error('commission_rate')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="credit_limit" class="block text-sm font-medium text-gray-300 mb-2">
                        Credit Limit (₦) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="credit_limit" 
                        name="credit_limit" 
                        value="{{ old('credit_limit', $partner->credit_limit) }}" 
                        min="0" 
                        step="0.01" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('credit_limit') border-red-500 @enderror"
                    >
                    @error('credit_limit')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="payment_terms" class="block text-sm font-medium text-gray-300 mb-2">
                        Payment Terms <span class="text-red-400">*</span>
                    </label>
                    <select 
                        id="payment_terms" 
                        name="payment_terms" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('payment_terms') border-red-500 @enderror"
                    >
                        <option value="">Select Payment Terms</option>
                        <option value="immediate" {{ old('payment_terms', $partner->payment_terms) == 'immediate' ? 'selected' : '' }}>Immediate</option>
                        <option value="7_days" {{ old('payment_terms', $partner->payment_terms) == '7_days' ? 'selected' : '' }}>7 Days</option>
                        <option value="15_days" {{ old('payment_terms', $partner->payment_terms) == '15_days' ? 'selected' : '' }}>15 Days</option>
                        <option value="30_days" {{ old('payment_terms', $partner->payment_terms) == '30_days' ? 'selected' : '' }}>30 Days</option>
                    </select>
                    @error('payment_terms')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Services & Specializations -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-concierge-bell mr-2 text-yellow-400"></i>Services & Specializations
            </h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Services Offered</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @php
                            $currentServices = $partner->services_offered ?? [];
                        @endphp
                        <label class="flex items-center p-3 bg-gray-800/30 border border-gray-700 rounded-lg hover:bg-gray-800/50 cursor-pointer transition">
                            <input type="checkbox" name="services_offered[]" value="visa" class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2" {{ in_array('visa', old('services_offered', $currentServices)) ? 'checked' : '' }}>
                            <span class="ml-3 text-sm text-gray-300">Visa Services</span>
                        </label>
                        <label class="flex items-center p-3 bg-gray-800/30 border border-gray-700 rounded-lg hover:bg-gray-800/50 cursor-pointer transition">
                            <input type="checkbox" name="services_offered[]" value="tours" class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2" {{ in_array('tours', old('services_offered', $currentServices)) ? 'checked' : '' }}>
                            <span class="ml-3 text-sm text-gray-300">Tour Packages</span>
                        </label>
                        <label class="flex items-center p-3 bg-gray-800/30 border border-gray-700 rounded-lg hover:bg-gray-800/50 cursor-pointer transition">
                            <input type="checkbox" name="services_offered[]" value="hotels" class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2" {{ in_array('hotels', old('services_offered', $currentServices)) ? 'checked' : '' }}>
                            <span class="ml-3 text-sm text-gray-300">Hotel Booking</span>
                        </label>
                        <label class="flex items-center p-3 bg-gray-800/30 border border-gray-700 rounded-lg hover:bg-gray-800/50 cursor-pointer transition">
                            <input type="checkbox" name="services_offered[]" value="cruises" class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2" {{ in_array('cruises', old('services_offered', $currentServices)) ? 'checked' : '' }}>
                            <span class="ml-3 text-sm text-gray-300">Cruise Packages</span>
                        </label>
                        <label class="flex items-center p-3 bg-gray-800/30 border border-gray-700 rounded-lg hover:bg-gray-800/50 cursor-pointer transition">
                            <input type="checkbox" name="services_offered[]" value="documentation" class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded-lg focus:ring-purple-500 focus:ring-2" {{ in_array('documentation', old('services_offered', $currentServices)) ? 'checked' : '' }}>
                            <span class="ml-3 text-sm text-gray-300">Documentation</span>
                        </label>
                        <label class="flex items-center p-3 bg-gray-800/30 border border-gray-700 rounded-lg hover:bg-gray-800/50 cursor-pointer transition">
                            <input type="checkbox" name="services_offered[]" value="flights" class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2" {{ in_array('flights', old('services_offered', $currentServices)) ? 'checked' : '' }}>
                            <span class="ml-3 text-sm text-gray-300">Flight Booking</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="specializations" class="block text-sm font-medium text-gray-300 mb-2">
                        Specializations
                    </label>
                    <textarea 
                        id="specializations" 
                        name="specializations" 
                        rows="3" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('specializations') border-red-500 @enderror"
                        placeholder="Areas of specialization, target markets, etc."
                    >{{ old('specializations', $partner->specializations) }}</textarea>
                    @error('specializations')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Additional Notes -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-sticky-note mr-2 text-indigo-400"></i>Additional Notes
            </h3>
            
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-300 mb-2">
                    Notes
                </label>
                <textarea 
                    id="notes" 
                    name="notes" 
                    rows="3" 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('notes') border-red-500 @enderror"
                    placeholder="Any additional information about this partner"
                >{{ old('notes', $partner->notes) }}</textarea>
                @error('notes')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Update Partner
            </button>
            <a 
                href="{{ route('admin.partners.index') }}"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition font-medium"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
