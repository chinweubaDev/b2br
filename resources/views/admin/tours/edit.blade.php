@extends('admin.layouts.app')

@section('title', 'Edit Tour Package - Admin Dashboard')
@section('page-title', 'Edit Tour Package')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Edit Tour Package</h1>
            <p class="text-gray-400 mt-1">Update tour package information</p>
        </div>
        <a href="{{ route('admin.tours.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Tours
        </a>
    </div>
</div>

<!-- Form -->
<div class="glass-card p-6">
    <form method="POST" action="{{ route('admin.tours.update', $tour) }}" enctype="multipart/form-data" class="space-y-8">
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
                        Tour Name <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $tour->name) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
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
                        <option value="">Select Category</option>
                        <option value="Urban Adventures" {{ old('category', $tour->category) == 'Urban Adventures' ? 'selected' : '' }}>Urban Adventures</option>
                        <option value="Tropical Escapes" {{ old('category', $tour->category) == 'Tropical Escapes' ? 'selected' : '' }}>Tropical Escapes</option>
                        <option value="Safari & Wildlife" {{ old('category', $tour->category) == 'Safari & Wildlife' ? 'selected' : '' }}>Safari & Wildlife</option>
                        <option value="Cultural Tours" {{ old('category', $tour->category) == 'Cultural Tours' ? 'selected' : '' }}>Cultural Tours</option>
                        <option value="Adventure Tours" {{ old('category', $tour->category) == 'Adventure Tours' ? 'selected' : '' }}>Adventure Tours</option>
                    </select>
                    @error('category')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="destination" class="block text-sm font-medium text-gray-300 mb-2">
                        Destination <span class="text-red-400">*</span>
                    </label>
                    <select 
                        id="destination" 
                        name="destination" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('destination') border-red-500 @enderror"
                    >
                        <option value="">Select Destination</option>
                        @foreach(\App\Models\Country::all() as $country)
                            <option value="{{ $country->name }}" {{ old('destination', $tour->destination) == $country->name ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('destination')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duration_days" class="block text-sm font-medium text-gray-300 mb-2">
                        Duration (Days) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="duration_days" 
                        name="duration_days" 
                        value="{{ old('duration_days', $tour->duration_days) }}" 
                        min="1" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('duration_days') border-red-500 @enderror"
                    >
                    @error('duration_days')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Dates and Pricing -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-calendar-alt mr-2 text-blue-400"></i>Dates & Pricing
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="travel_start_date" class="block text-sm font-medium text-gray-300 mb-2">
                        Travel Start Date <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="travel_start_date" 
                        name="travel_start_date" 
                        value="{{ old('travel_start_date', $tour->travel_start_date) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('travel_start_date') border-red-500 @enderror"
                    >
                    @error('travel_start_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="travel_end_date" class="block text-sm font-medium text-gray-300 mb-2">
                        Travel End Date <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="travel_end_date" 
                        name="travel_end_date" 
                        value="{{ old('travel_end_date', $tour->travel_end_date) }}" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('travel_end_date') border-red-500 @enderror"
                    >
                    @error('travel_end_date')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="standard_rate" class="block text-sm font-medium text-gray-300 mb-2">
                        Standard Rate (₦) <span class="text-red-400">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="standard_rate" 
                        name="standard_rate" 
                        value="{{ old('standard_rate', $tour->standard_rate) }}" 
                        step="0.01" 
                        min="0" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('standard_rate') border-red-500 @enderror"
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
                        value="{{ old('b2b_rate', $tour->b2b_rate) }}" 
                        step="0.01" 
                        min="0" 
                        required 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('b2b_rate') border-red-500 @enderror"
                    >
                    @error('b2b_rate')
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
                    Tour Description <span class="text-red-400">*</span>
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="6" 
                    required 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('description') border-red-500 @enderror"
                >{{ old('description', $tour->description) }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Inclusions & Exclusions -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-list-ul mr-2 text-yellow-400"></i>Inclusions & Exclusions
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                        placeholder="What's included in the tour..."
                    >{{ old('inclusions', $tour->inclusions) }}</textarea>
                    @error('inclusions')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="exclusions" class="block text-sm font-medium text-gray-300 mb-2">
                        Exclusions
                    </label>
                    <textarea 
                        id="exclusions" 
                        name="exclusions" 
                        rows="6" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('exclusions') border-red-500 @enderror"
                        placeholder="What's not included..."
                    >{{ old('exclusions', $tour->exclusions) }}</textarea>
                    @error('exclusions')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Itinerary -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-route mr-2 text-pink-400"></i>Itinerary
            </h3>
            
            <div>
                <label for="itinerary" class="block text-sm font-medium text-gray-300 mb-2">
                    Tour Itinerary
                </label>
                <textarea 
                    id="itinerary" 
                    name="itinerary" 
                    rows="8" 
                    class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition resize-none @error('itinerary') border-red-500 @enderror"
                    placeholder="Day-by-day itinerary..."
                >{{ old('itinerary', $tour->itinerary) }}</textarea>
                @error('itinerary')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Image Uploads -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-images mr-2 text-indigo-400"></i>Images
            </h3>
            
            <div class="space-y-4">
                <!-- Main Tour Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-300 mb-2">
                        Main Tour Image
                    </label>
                    @if($tour->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $tour->image) }}" alt="Current main image" class="w-32 h-32 object-cover rounded-lg border border-gray-700">
                            <p class="text-xs text-gray-400 mt-1">Current image</p>
                        </div>
                    @endif
                    <input 
                        type="file" 
                        id="image" 
                        name="image" 
                        accept="image/*" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('image') border-red-500 @enderror"
                    >
                    <p class="text-xs text-gray-400 mt-1">Accepted formats: JPEG, PNG, JPG, GIF (Max: 2MB). Leave empty to keep current image.</p>
                    @error('image')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-300 mb-2">
                        Featured Image
                    </label>
                    @if($tour->featured_image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $tour->featured_image) }}" alt="Current featured image" class="w-32 h-32 object-cover rounded-lg border border-gray-700">
                            <p class="text-xs text-gray-400 mt-1">Current featured image</p>
                        </div>
                    @endif
                    <input 
                        type="file" 
                        id="featured_image" 
                        name="featured_image" 
                        accept="image/*" 
                        class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition @error('featured_image') border-red-500 @enderror"
                    >
                    <p class="text-xs text-gray-400 mt-1">This image will be used for featured displays and banners. Leave empty to keep current image.</p>
                    @error('featured_image')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Existing Extra Images -->
                @if($tour->extra_images && count(json_decode($tour->extra_images, true) ?? []) > 0)
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Current Extra Images</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                        @foreach(json_decode($tour->extra_images, true) as $index => $extraImage)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $extraImage) }}" alt="Extra image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg border border-gray-700">
                                <button 
                                    type="button" 
                                    onclick="if(confirm('Delete this image?')) document.getElementById('delete_extra_{{ $index }}').value = '1'; this.parentElement.style.opacity = '0.3';"
                                    class="absolute top-1 right-1 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition"
                                >
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                                <input type="hidden" id="delete_extra_{{ $index }}" name="delete_extra_images[]" value="0">
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Extra Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Add New Extra Images</label>
                    <div id="extra-images-container" class="space-y-3">
                        <div class="extra-image-item bg-gray-800/30 border border-gray-700 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-400 mb-1">Image</label>
                                    <input type="file" name="extra_images[]" accept="image/*" class="w-full px-3 py-2 bg-gray-800/50 border border-gray-700 rounded text-gray-200 text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-400 mb-1">Caption</label>
                                    <input type="text" name="image_captions[]" placeholder="Image caption" class="w-full px-3 py-2 bg-gray-800/50 border border-gray-700 rounded text-gray-200 text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-extra-image" class="mt-2 text-sm text-purple-400 hover:text-purple-300 font-medium">
                        <i class="fas fa-plus mr-1"></i> Add Another Image
                    </button>
                    <p class="text-xs text-gray-400 mt-1">Add additional images to showcase the tour destination</p>
                </div>
            </div>
        </div>

        <!-- Status Options -->
        <div>
            <h3 class="text-lg font-semibold text-gray-200 mb-4 pb-2 border-b border-gray-700">
                <i class="fas fa-toggle-on mr-2 text-green-400"></i>Status
            </h3>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="is_featured" 
                        name="is_featured" 
                        value="1" 
                        {{ old('is_featured', $tour->is_featured) ? 'checked' : '' }} 
                        class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                    >
                    <label for="is_featured" class="ml-2 text-sm font-medium text-gray-300">
                        Featured Tour
                    </label>
                </div>

                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="is_active" 
                        name="is_active" 
                        value="1" 
                        {{ old('is_active', $tour->is_active) ? 'checked' : '' }} 
                        class="w-4 h-4 text-purple-600 bg-gray-800 border-gray-700 rounded focus:ring-purple-500 focus:ring-2"
                    >
                    <label for="is_active" class="ml-2 text-sm font-medium text-gray-300">
                        Active
                    </label>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button 
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition font-medium"
            >
                <i class="fas fa-save mr-2"></i>Update Tour Package
            </button>
            <a 
                href="{{ route('admin.tours.index') }}"
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

// Add extra image functionality
document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementById('add-extra-image');
    const container = document.getElementById('extra-images-container');
    let imageCount = 1;

    addButton.addEventListener('click', function() {
        const newItem = document.createElement('div');
        newItem.className = 'extra-image-item bg-gray-800/30 border border-gray-700 rounded-lg p-4';
        newItem.innerHTML = `
            <div class="flex justify-between items-start mb-2">
                <span class="text-sm font-medium text-gray-300">Image ${imageCount + 1}</span>
                <button type="button" class="remove-image text-red-400 hover:text-red-300 text-sm">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1">Image</label>
                    <input type="file" name="extra_images[]" accept="image/*" class="w-full px-3 py-2 bg-gray-800/50 border border-gray-700 rounded text-gray-200 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-400 mb-1">Caption</label>
                    <input type="text" name="image_captions[]" placeholder="Image caption" class="w-full px-3 py-2 bg-gray-800/50 border border-gray-700 rounded text-gray-200 text-sm">
                </div>
            </div>
        `;
        
        container.appendChild(newItem);
        imageCount++;

        // Add remove functionality
        newItem.querySelector('.remove-image').addEventListener('click', function() {
            newItem.remove();
        });
    });
});
</script>
@endpush
