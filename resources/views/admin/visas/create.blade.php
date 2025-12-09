@extends('admin.layouts.app')

@section('title', 'Create Visa Service - Admin Dashboard')
@section('page-title', 'Create Visa Service')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Create New Visa Service</h1>
            <p class="text-gray-400 mt-1">Add a new visa service to the system</p>
        </div>
        <a href="{{ route('admin.visas.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Visa Services
        </a>
    </div>
</div>

<!-- Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.visas.store') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <!-- Basic Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-info-circle mr-2 text-purple-400"></i>Basic Information
            </h3>
            
            <div class="space-y-4">
                <div>
                    <label for="service_name" class="block text-sm font-medium text-gray-300 mb-2">
                        Visa Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="service_name" 
                        name="service_name" 
                        value="{{ old('service_name') }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('service_name') border-red-500 @enderror"
                        placeholder="e.g., USA Tourist Visa"
                    >
                    @error('service_name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="country_id" class="block text-sm font-medium text-gray-300 mb-2">
                            Country <span class="text-red-400">*</span>
                        </label>
                        <select 
                            id="country_id" 
                            name="country_id" 
                            required 
                            class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('country_id') border-red-500 @enderror"
                        >
                            <option value="">Select Country</option>
                            @foreach(\App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="visa_type" class="block text-sm font-medium text-gray-300 mb-2">
                            Visa Type <span class="text-red-400">*</span>
                        </label>
                        <select 
                            id="visa_type" 
                            name="visa_type" 
                            required 
                            class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('visa_type') border-red-500 @enderror"
                        >
                            <option value="">Select Visa Type</option>
                            <option value="tourist" {{ old('visa_type') == 'tourist' ? 'selected' : '' }}>Tourist Visa</option>
                            <option value="business" {{ old('visa_type') == 'business' ? 'selected' : '' }}>Business Visa</option>
                            <option value="student" {{ old('visa_type') == 'student' ? 'selected' : '' }}>Student Visa</option>
                            <option value="work" {{ old('visa_type') == 'work' ? 'selected' : '' }}>Work Visa</option>
                            <option value="transit" {{ old('visa_type') == 'transit' ? 'selected' : '' }}>Transit Visa</option>
                            <option value="diplomatic" {{ old('visa_type') == 'diplomatic' ? 'selected' : '' }}>Diplomatic Visa</option>
                        </select>
                        @error('visa_type')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
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
                    <label for="standard_rate" class="block text-sm font-medium text-gray-300 mb-2">
                        Standard Rate (₦) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="standard_rate" 
                        name="standard_rate" 
                        value="{{ old('standard_rate') }}" 
                        step="0.01" 
                        min="0" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('standard_rate') border-red-500 @enderror"
                        placeholder="0.00"
                    >
                    @error('standard_rate')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">Regular customer rate</p>
                </div>

                <div>
                    <label for="b2b_rate" class="block text-sm font-medium text-gray-300 mb-2">
                        B2B Rate (₦) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="b2b_rate" 
                        name="b2b_rate" 
                        value="{{ old('b2b_rate') }}" 
                        step="0.01" 
                        min="0" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('b2b_rate') border-red-500 @enderror"
                        placeholder="0.00"
                    >
                    @error('b2b_rate')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">Business partner rate (auto-calculated at 5% discount)</p>
                </div>
            </div>
        </div>

        <!-- Processing Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-clock mr-2 text-blue-400"></i>Processing Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="processing_time" class="block text-sm font-medium text-gray-300 mb-2">
                        Processing Time <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="processing_time" 
                        name="processing_time" 
                        value="{{ old('processing_time') }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('processing_time') border-red-500 @enderror"
                        placeholder="e.g., 5-7 business days"
                    >
                    @error('processing_time')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="cost_includes" class="block text-sm font-medium text-gray-300 mb-2">
                        Cost Includes
                    </label>
                    <input 
                        type="text" 
                        id="cost_includes" 
                        name="cost_includes" 
                        value="{{ old('cost_includes') }}" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('cost_includes') border-red-500 @enderror"
                        placeholder="e.g., Application fee, processing, courier"
                    >
                    @error('cost_includes')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Requirements -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-list-check mr-2 text-yellow-400"></i>Requirements
            </h3>
            
            <div>
                <label for="requirements" class="block text-sm font-medium text-gray-300 mb-2">
                    Requirements <span class="text-red-400">*</span>
                </label>
                <textarea 
                    id="requirements" 
                    name="requirements" 
                    rows="8" 
                    required 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('requirements') border-red-500 @enderror" 
                    placeholder="List all required documents and requirements..."
                >{{ old('requirements') }}</textarea>
                <p class="text-xs text-gray-400 mt-1">Use bullet points or numbered lists for better formatting</p>
                @error('requirements')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Additional Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-info mr-2 text-gray-400"></i>Additional Information
            </h3>
            
            <div>
                <label for="additional_notes" class="block text-sm font-medium text-gray-300 mb-2">
                    Additional Notes
                </label>
                <textarea 
                    id="additional_notes" 
                    name="additional_notes" 
                    rows="4" 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('additional_notes') border-red-500 @enderror" 
                    placeholder="Any additional information or special notes..."
                >{{ old('additional_notes') }}</textarea>
                @error('additional_notes')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Status -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-toggle-on mr-2 text-green-400"></i>Status
            </h3>
            
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="is_active" 
                    name="is_active" 
                    value="1" 
                    {{ old('is_active', true) ? 'checked' : '' }} 
                    class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                >
                <label for="is_active" class="ml-2 text-sm font-medium text-gray-300">
                    Active Service
                </label>
            </div>
            <p class="text-xs text-gray-400 mt-1">Inactive services will not be visible to users</p>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Create Visa Service
            </button>
            <a 
                href="{{ route('admin.visas.index') }}"
                class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition font-medium"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Auto-calculate B2B rate based on standard rate (5% discount)
document.getElementById('standard_rate').addEventListener('input', function() {
    const standardRate = parseFloat(this.value) || 0;
    const b2bRate = standardRate * 0.95; // 5% discount for B2B
    document.getElementById('b2b_rate').value = b2bRate.toFixed(2);
});
</script>
@endpush
