@extends('admin.layouts.app')

@section('title', 'Edit Hotel - Admin Dashboard')
@section('page-title', 'Edit Hotel')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Edit Hotel</h1>
            <p class="text-gray-400 mt-1">Update the details for {{ $hotel->name }}</p>
        </div>
        <a href="{{ route('admin.hotels.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Hotels
        </a>
    </div>
</div>

<!-- Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.hotels.update', $hotel) }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-info-circle mr-2 text-purple-400"></i>Basic Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                        Hotel Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $hotel->name) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
                        placeholder="Enter hotel name"
                    >
                    @error('name')
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
                        <option value="">Select category</option>
                        <option value="Luxury" {{ old('category', $hotel->category) == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                        <option value="Corporate" {{ old('category', $hotel->category) == 'Corporate' ? 'selected' : '' }}>Corporate</option>
                        <option value="Tropical" {{ old('category', $hotel->category) == 'Tropical' ? 'selected' : '' }}>Tropical</option>
                        <option value="Safari" {{ old('category', $hotel->category) == 'Safari' ? 'selected' : '' }}>Safari</option>
                        <option value="Budget" {{ old('category', $hotel->category) == 'Budget' ? 'selected' : '' }}>Budget</option>
                    </select>
                    @error('category')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="star_rating" class="block text-sm font-medium text-gray-300 mb-2">
                        Star Rating <span class="text-red-400">*</span>
                    </label>
                    <select 
                        id="star_rating" 
                        name="star_rating" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('star_rating') border-red-500 @enderror"
                    >
                        <option value="">Select rating</option>
                        @for($i = 1; $i <= 7; $i++)
                            <option value="{{ $i }}" {{ old('star_rating', $hotel->star_rating) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                    @error('star_rating')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Location Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-map-marker-alt mr-2 text-blue-400"></i>Location Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-300 mb-2">
                        City <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="city" 
                        name="city" 
                        value="{{ old('city', $hotel->city) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('city') border-red-500 @enderror"
                        placeholder="Enter city"
                    >
                    @error('city')
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
                        value="{{ old('country', $hotel->country) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('country') border-red-500 @enderror"
                        placeholder="Enter country"
                    >
                    @error('country')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="location" class="block text-sm font-medium text-gray-300 mb-2">
                        Full Location <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="location" 
                        name="location" 
                        value="{{ old('location', $hotel->location) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('location') border-red-500 @enderror"
                        placeholder="e.g., Victoria Island, Lagos, Nigeria"
                    >
                    @error('location')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Description -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-align-left mr-2 text-green-400"></i>Description
            </h3>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">
                    Hotel Description <span class="text-red-400">*</span>
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="6" 
                    required 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('description') border-red-500 @enderror"
                    placeholder="Enter detailed description of the hotel..."
                >{{ old('description', $hotel->description) }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Pricing Information -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-money-bill-wave mr-2 text-yellow-400"></i>Pricing Information
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="standard_rate" class="block text-sm font-medium text-gray-300 mb-2">
                        Standard Rate <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="standard_rate" 
                        name="standard_rate" 
                        value="{{ old('standard_rate', $hotel->standard_rate) }}" 
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
                        B2B Rate <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="b2b_rate" 
                        name="b2b_rate" 
                        value="{{ old('b2b_rate', $hotel->b2b_rate) }}" 
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
                        <option value="NGN" {{ old('currency', $hotel->currency) == 'NGN' ? 'selected' : '' }}>NGN - Nigerian Naira</option>
                        <option value="USD" {{ old('currency', $hotel->currency) == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                        <option value="EUR" {{ old('currency', $hotel->currency) == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                        <option value="GBP" {{ old('currency', $hotel->currency) == 'GBP' ? 'selected' : '' }}>GBP - British Pound</option>
                    </select>
                    @error('currency')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Amenities -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-concierge-bell mr-2 text-pink-400"></i>Amenities
            </h3>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @php
                    $commonAmenities = [
                        'Wi-Fi', 'Pool', 'Spa', 'Gym', 'Restaurant', 'Bar', 'Breakfast', 
                        'Business Center', 'Conference Room', 'Tennis Court', 'Kitchenette', 
                        'Laundry', 'Room Service', 'Air Conditioning', 'TV', 'Mini Bar'
                    ];
                    $currentAmenities = $hotel->amenities ?? [];
                @endphp
                @foreach($commonAmenities as $amenity)
                    <label class="flex items-center p-3 bg-gray-800/30 border border-gray-700 rounded-lg hover:bg-gray-800/50 cursor-pointer transition">
                        <input 
                            type="checkbox" 
                            name="amenities[]" 
                            value="{{ $amenity }}" 
                            class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                            {{ in_array($amenity, old('amenities', $currentAmenities)) ? 'checked' : '' }}
                        >
                        <span class="ml-3 text-sm text-gray-300">{{ $amenity }}</span>
                    </label>
                @endforeach
            </div>
            @error('amenities')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-image mr-2 text-indigo-400"></i>Hotel Image
            </h3>
            
            <div>
                @if($hotel->image)
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Current Image</label>
                        <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}" class="w-32 h-32 object-cover rounded-lg border border-gray-700">
                        <p class="text-xs text-gray-400 mt-1">Current hotel image</p>
                    </div>
                @endif
                
                <label for="image" class="block text-sm font-medium text-gray-300 mb-2">
                    {{ $hotel->image ? 'New Hotel Image' : 'Hotel Image' }}
                </label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    accept="image/*" 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('image') border-red-500 @enderror"
                >
                <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB. Leave empty to keep current image.</p>
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
                    {{ old('is_active', $hotel->is_active) ? 'checked' : '' }} 
                    class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                >
                <label for="is_active" class="ml-2 text-sm font-medium text-gray-300">
                    Active Hotel
                </label>
            </div>
            <p class="text-xs text-gray-400 mt-1">Inactive hotels won't be visible to customers</p>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Update Hotel
            </button>
            <a 
                href="{{ route('admin.hotels.index') }}"
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
