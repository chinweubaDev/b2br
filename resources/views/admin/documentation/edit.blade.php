@extends('admin.layouts.app')

@section('title', 'Edit Documentation Service - Admin Dashboard')
@section('page-title', 'Edit Documentation Service')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Edit Documentation Service</h1>
            <p class="text-gray-400 mt-1">Update {{ $documentation->service_name }}</p>
        </div>
        <a href="{{ route('admin.documentation.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Documentation
        </a>
    </div>
</div>

<!-- Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.documentation.update', $documentation) }}" class="space-y-8">
        @csrf
        @method('PUT')
        
        <!-- Service Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-info-circle mr-2 text-purple-400"></i>Service Information
            </h3>
            
            <div class="space-y-4">
                <div>
                    <label for="service_name" class="block text-sm font-medium text-gray-300 mb-2">
                        Service Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="service_name" 
                        name="service_name" 
                        value="{{ old('service_name', $documentation->service_name) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('service_name') border-red-500 @enderror"
                        placeholder="e.g., Passport Application Assistance"
                    >
                    @error('service_name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

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
                        placeholder="Provide a detailed description of the service..."
                    >{{ old('description', $documentation->description) }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Pricing -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-money-bill-wave mr-2 text-green-400"></i>Pricing
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
                        value="{{ old('standard_rate', $documentation->standard_rate) }}" 
                        step="0.01" 
                        min="0" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('standard_rate') border-red-500 @enderror"
                        placeholder="0.00"
                    >
                    @error('standard_rate')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="b2b_rate" class="block text-sm font-medium text-gray-300 mb-2">
                        B2B Rate (₦) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="b2b_rate" 
                        name="b2b_rate" 
                        value="{{ old('b2b_rate', $documentation->b2b_rate) }}" 
                        step="0.01" 
                        min="0" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('b2b_rate') border-red-500 @enderror"
                        placeholder="0.00"
                    >
                    @error('b2b_rate')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">Auto-calculated at 5% discount</p>
                </div>
            </div>
        </div>

        <!-- Requirements & Processing -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-clipboard-list mr-2 text-blue-400"></i>Requirements & Processing
            </h3>
            
            <div class="space-y-4">
                <div>
                    <label for="requirements" class="block text-sm font-medium text-gray-300 mb-2">
                        Requirements <span class="text-red-400">*</span>
                    </label>
                    <textarea 
                        id="requirements" 
                        name="requirements" 
                        rows="4" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('requirements') border-red-500 @enderror"
                        placeholder="List all required documents and information..."
                    >{{ old('requirements', $documentation->requirements) }}</textarea>
                    @error('requirements')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="processing_time" class="block text-sm font-medium text-gray-300 mb-2">
                            Processing Time <span class="text-red-400">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="processing_time" 
                            name="processing_time" 
                            value="{{ old('processing_time', $documentation->processing_time) }}" 
                            required 
                            class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('processing_time') border-red-500 @enderror"
                            placeholder="e.g., 3-5 business days"
                        >
                        @error('processing_time')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-300 mb-2">
                            Category <span class="text-red-400">*</span>
                        </label>
                        <select 
                            id="category" 
                            name="category" 
                            required 
                            class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('category') border-red-500 @enderror"
                        >
                            <option value="">Select Category</option>
                            <option value="legal" {{ old('category', $documentation->category) == 'legal' ? 'selected' : '' }}>Legal</option>
                            <option value="travel" {{ old('category', $documentation->category) == 'travel' ? 'selected' : '' }}>Travel</option>
                            <option value="business" {{ old('category', $documentation->category) == 'business' ? 'selected' : '' }}>Business</option>
                        </select>
                        @error('category')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-toggle-on mr-2 text-yellow-400"></i>Status
            </h3>
            
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    id="is_active" 
                    name="is_active" 
                    value="1" 
                    {{ old('is_active', $documentation->is_active) ? 'checked' : '' }} 
                    class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                >
                <label for="is_active" class="ml-2 text-sm font-medium text-gray-300">
                    Active Service
                </label>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Update Service
            </button>
            <a 
                href="{{ route('admin.documentation.index') }}"
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
    const b2bRate = standardRate * 0.95;
    document.getElementById('b2b_rate').value = b2bRate.toFixed(2);
});
</script>
@endpush
