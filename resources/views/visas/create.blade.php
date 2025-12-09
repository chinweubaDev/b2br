@extends('layouts.app')

@section('title', 'Create Visa Service - Royeli Tours & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
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
                            <span class="ml-1 text-gray-500 md:ml-2">Create Visa Service</span>
                        </div>
                    </li>
                </ol>
            </nav>
            
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Create New Visa Service</h1>
                    <p class="mt-2 text-gray-600">Add a new visa service to the system</p>
                </div>
                <a href="{{ route('visas.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Visa Services
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-8">
                <form method="POST" action="{{ route('visas.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="space-y-8">
                        <!-- Basic Information -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
                            <div style="margin-bottom:20px">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Visa Name*</label>
                                    <input type="text" id="service_name" name="service_name" value="{{ old('service_name') }}"  required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('standard_rate') border-red-500 @enderror">
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <br>
                                </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="country_id" class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                                    <select id="country_id" name="country_id" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('country_id') border-red-500 @enderror">
                                        <option value="">Select Country</option>
                                        @foreach(\App\Models\Country::all() as $country)
                                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="visa_type" class="block text-sm font-medium text-gray-700 mb-2">Visa Type *</label>
                                    <select id="visa_type" name="visa_type" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('visa_type') border-red-500 @enderror">
                                        <option value="">Select Visa Type</option>
                                        <option value="tourist" {{ old('visa_type') == 'tourist' ? 'selected' : '' }}>Tourist Visa</option>
                                        <option value="business" {{ old('visa_type') == 'business' ? 'selected' : '' }}>Business Visa</option>
                                        <option value="student" {{ old('visa_type') == 'student' ? 'selected' : '' }}>Student Visa</option>
                                        <option value="work" {{ old('visa_type') == 'work' ? 'selected' : '' }}>Work Visa</option>
                                        <option value="transit" {{ old('visa_type') == 'transit' ? 'selected' : '' }}>Transit Visa</option>
                                        <option value="diplomatic" {{ old('visa_type') == 'diplomatic' ? 'selected' : '' }}>Diplomatic Visa</option>
                                    </select>
                                    @error('visa_type')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Pricing Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="standard_rate" class="block text-sm font-medium text-gray-700 mb-2">Standard Rate (₦) *</label>
                                    <input type="number" id="standard_rate" name="standard_rate" value="{{ old('standard_rate') }}" step="0.01" min="0" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('standard_rate') border-red-500 @enderror">
                                    @error('standard_rate')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="b2b_rate" class="block text-sm font-medium text-gray-700 mb-2">B2B Rate (₦) *</label>
                                    <input type="number" id="b2b_rate" name="b2b_rate" value="{{ old('b2b_rate') }}" step="0.01" min="0" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('b2b_rate') border-red-500 @enderror">
                                    @error('b2b_rate')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Processing Information -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Processing Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="processing_time" class="block text-sm font-medium text-gray-700 mb-2">Processing Time *</label>
                                    <input type="text" id="processing_time" name="processing_time" value="{{ old('processing_time') }}" placeholder="e.g., 5-7 business days" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('processing_time') border-red-500 @enderror">
                                    @error('processing_time')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="cost_includes" class="block text-sm font-medium text-gray-700 mb-2">Cost Includes</label>
                                    <input type="text" id="cost_includes" name="cost_includes" value="{{ old('cost_includes') }}" placeholder="e.g., Application fee, processing, courier" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('cost_includes') border-red-500 @enderror">
                                    @error('cost_includes')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Requirements -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Requirements</h3>
                            <div>
                                <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">Requirements *</label>
                                <textarea id="requirements" name="requirements" rows="8" required class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('requirements') border-red-500 @enderror" placeholder="List all required documents and requirements...">{{ old('requirements') }}</textarea>
                                <p class="text-sm text-gray-500 mt-1">Use bullet points or numbered lists for better formatting</p>
                                @error('requirements')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Additional Information</h3>
                            <div>
                                <label for="additional_notes" class="block text-sm font-medium text-gray-700 mb-2">Additional Notes</label>
                                <textarea id="additional_notes" name="additional_notes" rows="4" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('additional_notes') border-red-500 @enderror" placeholder="Any additional information or special notes...">{{ old('additional_notes') }}</textarea>
                                @error('additional_notes')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Status</h3>
                            <div class="flex items-center">
                                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                    Active Service
                                </label>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Inactive services will not be visible to users</p>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="{{ route('visas.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                                <i class="fas fa-save mr-2"></i>
                                Create Visa Service
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Auto-calculate B2B rate based on standard rate (optional)
document.getElementById('standard_rate').addEventListener('input', function() {
    const standardRate = parseFloat(this.value) || 0;
    const b2bRate = standardRate * 0.95; // 5% discount for B2B
    document.getElementById('b2b_rate').value = b2bRate.toFixed(2);
});
</script>
@endpush
@endsection 