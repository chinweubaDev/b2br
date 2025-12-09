@extends('layouts.app')

@section('title', 'Add New Partner - Royeli Tours & Travel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <nav class="flex mb-4" aria-label="Breadcrumb">
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
                                <a href="{{ route('partners.index') }}" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Partners</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-500 md:ml-2">Add New Partner</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                
                <h1 class="text-3xl font-bold text-gray-900">Add New Partner</h1>
                <p class="mt-2 text-gray-600">Create a new B2B travel partner account</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('partners.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <!-- Company Information -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Company Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name *</label>
                        <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('company_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_person" class="block text-sm font-medium text-gray-700">Contact Person *</label>
                        <input type="text" name="contact_person" id="contact_person" value="{{ old('contact_person') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('contact_person')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address *</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number *</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="url" name="website" id="website" value="{{ old('website') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('website')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="business_type" class="block text-sm font-medium text-gray-700">Business Type *</label>
                        <select name="business_type" id="business_type" required
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Business Type</option>
                            <option value="travel_agent" {{ old('business_type') == 'travel_agent' ? 'selected' : '' }}>Travel Agent</option>
                            <option value="tour_operator" {{ old('business_type') == 'tour_operator' ? 'selected' : '' }}>Tour Operator</option>
                            <option value="corporate" {{ old('business_type') == 'corporate' ? 'selected' : '' }}>Corporate</option>
                            <option value="individual" {{ old('business_type') == 'individual' ? 'selected' : '' }}>Individual</option>
                        </select>
                        @error('business_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Address Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address *</label>
                        <textarea name="address" id="address" rows="3" required
                                  class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City *</label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('city')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700">State *</label>
                        <input type="text" name="state" id="state" value="{{ old('state') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('state')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Country *</label>
                        <input type="text" name="country" id="country" value="{{ old('country') }}" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('country')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('postal_code')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Business Details -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Business Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="license_number" class="block text-sm font-medium text-gray-700">License Number</label>
                        <input type="text" name="license_number" id="license_number" value="{{ old('license_number') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('license_number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tax_id" class="block text-sm font-medium text-gray-700">Tax ID</label>
                        <input type="text" name="tax_id" id="tax_id" value="{{ old('tax_id') }}"
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('tax_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="commission_rate" class="block text-sm font-medium text-gray-700">Commission Rate (%) *</label>
                        <input type="number" name="commission_rate" id="commission_rate" value="{{ old('commission_rate', 10) }}" min="0" max="100" step="0.01" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('commission_rate')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="credit_limit" class="block text-sm font-medium text-gray-700">Credit Limit (₦) *</label>
                        <input type="number" name="credit_limit" id="credit_limit" value="{{ old('credit_limit', 0) }}" min="0" step="0.01" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('credit_limit')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_terms" class="block text-sm font-medium text-gray-700">Payment Terms *</label>
                        <select name="payment_terms" id="payment_terms" required
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Payment Terms</option>
                            <option value="immediate" {{ old('payment_terms') == 'immediate' ? 'selected' : '' }}>Immediate</option>
                            <option value="7_days" {{ old('payment_terms') == '7_days' ? 'selected' : '' }}>7 Days</option>
                            <option value="15_days" {{ old('payment_terms') == '15_days' ? 'selected' : '' }}>15 Days</option>
                            <option value="30_days" {{ old('payment_terms') == '30_days' ? 'selected' : '' }}>30 Days</option>
                        </select>
                        @error('payment_terms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Services and Specializations -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Services & Specializations</h3>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Services Offered</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="flex items-center">
                                <input type="checkbox" name="services_offered[]" value="visa" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Visa Services</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="services_offered[]" value="tours" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Tour Packages</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="services_offered[]" value="hotels" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Hotel Booking</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="services_offered[]" value="cruises" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Cruise Packages</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="services_offered[]" value="documentation" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Documentation</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="services_offered[]" value="flights" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Flight Booking</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="specializations" class="block text-sm font-medium text-gray-700">Specializations</label>
                        <textarea name="specializations" id="specializations" rows="3"
                                  class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Areas of specialization, target markets, etc.">{{ old('specializations') }}</textarea>
                        @error('specializations')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Account Setup -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Account Setup</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                        <input type="password" name="password" id="password" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
            </div>

            <!-- Additional Notes -->
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Additional Notes</label>
                <textarea name="notes" id="notes" rows="3"
                          class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Any additional information about this partner">{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('partners.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save mr-2"></i>
                    Create Partner
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 