@extends('admin.layouts.app')

@section('title', 'Create Cruise Package - Admin Dashboard')
@section('page-title', 'Create Cruise Package')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Create New Cruise Package</h1>
            <p class="text-gray-400 mt-1">Add a new cruise package to the system</p>
        </div>
        <a href="{{ route('admin.cruises.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Cruises
        </a>
    </div>
</div>

<!-- Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.cruises.store') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <!-- Basic Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-info-circle mr-2 text-purple-400"></i>Basic Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                        Cruise Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
                    >
                    @error('name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="cruise_line" class="block text-sm font-medium text-gray-300 mb-2">
                        Cruise Line <span class="text-red-400">*</span>
                    </label>
                    <select 
                        id="cruise_line" 
                        name="cruise_line" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('cruise_line') border-red-500 @enderror"
                    >
                        <option value="">Select Cruise Line</option>
                        <option value="Royal Caribbean" {{ old('cruise_line') == 'Royal Caribbean' ? 'selected' : '' }}>Royal Caribbean</option>
                        <option value="Costa Cruises" {{ old('cruise_line') == 'Costa Cruises' ? 'selected' : '' }}>Costa Cruises</option>
                        <option value="Norwegian Cruise Line" {{ old('cruise_line') == 'Norwegian Cruise Line' ? 'selected' : '' }}>Norwegian Cruise Line</option>
                        <option value="MSC Cruises" {{ old('cruise_line') == 'MSC Cruises' ? 'selected' : '' }}>MSC Cruises</option>
                        <option value="Celebrity Cruises" {{ old('cruise_line') == 'Celebrity Cruises' ? 'selected' : '' }}>Celebrity Cruises</option>
                        <option value="Princess Cruises" {{ old('cruise_line') == 'Princess Cruises' ? 'selected' : '' }}>Princess Cruises</option>
                    </select>
                    @error('cruise_line')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="ship_name" class="block text-sm font-medium text-gray-300 mb-2">
                        Ship Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="ship_name" 
                        name="ship_name" 
                        value="{{ old('ship_name') }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('ship_name') border-red-500 @enderror"
                    >
                    @error('ship_name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="route" class="block text-sm font-medium text-gray-300 mb-2">
                        Route <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="route" 
                        name="route" 
                        value="{{ old('route') }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('route') border-red-500 @enderror"
                        placeholder="e.g., Caribbean Islands"
                    >
                    @error('route')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Dates & Duration -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-calendar-alt mr-2 text-blue-400"></i>Dates & Duration
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="departure_date" class="block text-sm font-medium text-gray-300 mb-2">
                        Departure Date <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="departure_date" 
                        name="departure_date" 
                        value="{{ old('departure_date') }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('departure_date') border-red-500 @enderror"
                    >
                    @error('departure_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="return_date" class="block text-sm font-medium text-gray-300 mb-2">
                        Return Date <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="return_date" 
                        name="return_date" 
                        value="{{ old('return_date') }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('return_date') border-red-500 @enderror"
                    >
                    @error('return_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duration_nights" class="block text-sm font-medium text-gray-300 mb-2">
                        Duration (Nights) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="duration_nights" 
                        name="duration_nights" 
                        value="{{ old('duration_nights') }}" 
                        min="1" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('duration_nights') border-red-500 @enderror"
                    >
                    @error('duration_nights')
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
                    <p class="text-xs text-gray-400 mt-1">Auto-calculated at 5% discount</p>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-align-left mr-2 text-yellow-400"></i>Description
            </h3>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">
                    Cruise Description <span class="text-red-400">*</span>
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="6" 
                    required 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Ports & Inclusions -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-anchor mr-2 text-pink-400"></i>Ports & Inclusions
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="ports_of_call" class="block text-sm font-medium text-gray-300 mb-2">
                        Ports of Call <span class="text-red-400">*</span>
                    </label>
                    <textarea 
                        id="ports_of_call" 
                        name="ports_of_call" 
                        rows="6" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('ports_of_call') border-red-500 @enderror"
                        placeholder="List all ports of call..."
                    >{{ old('ports_of_call') }}</textarea>
                    @error('ports_of_call')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="inclusions" class="block text-sm font-medium text-gray-300 mb-2">
                        Inclusions <span class="text-red-400">*</span>
                    </label>
                    <textarea 
                        id="inclusions" 
                        name="inclusions" 
                        rows="6" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('inclusions') border-red-500 @enderror"
                        placeholder="What's included..."
                    >{{ old('inclusions') }}</textarea>
                    @error('inclusions')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Exclusions -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-times-circle mr-2 text-red-400"></i>Exclusions
            </h3>
            
            <div>
                <label for="exclusions" class="block text-sm font-medium text-gray-300 mb-2">
                    Exclusions
                </label>
                <textarea 
                    id="exclusions" 
                    name="exclusions" 
                    rows="4" 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('exclusions') border-red-500 @enderror"
                    placeholder="What's not included..."
                >{{ old('exclusions') }}</textarea>
                @error('exclusions')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Image Upload -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-image mr-2 text-indigo-400"></i>Cruise Image
            </h3>
            
            <div>
                <label for="image" class="block text-sm font-medium text-gray-300 mb-2">
                    Cruise Image
                </label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    accept="image/*" 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('image') border-red-500 @enderror"
                >
                <p class="text-xs text-gray-400 mt-1">Accepted formats: JPEG, PNG, JPG, GIF (Max: 2MB)</p>
                @error('image')
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
                    Active
                </label>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Create Cruise Package
            </button>
            <a 
                href="{{ route('admin.cruises.index') }}"
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
