@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Create New Tour Package</h1>
            <a href="{{ route('tours.index') }}" class="btn-secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Tours
            </a>
        </div>

        <div class="card">
            <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="form-label">Tour Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-input @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category" class="form-label">Category *</label>
                            <select id="category" name="category" required class="form-input @error('category') border-red-500 @enderror">
                                <option value="">Select Category</option>
                                <option value="Urban Adventures" {{ old('category') == 'Urban Adventures' ? 'selected' : '' }}>Urban Adventures</option>
                                <option value="Tropical Escapes" {{ old('category') == 'Tropical Escapes' ? 'selected' : '' }}>Tropical Escapes</option>
                                <option value="Safari & Wildlife" {{ old('category') == 'Safari & Wildlife' ? 'selected' : '' }}>Safari & Wildlife</option>
                                <option value="Cultural Tours" {{ old('category') == 'Cultural Tours' ? 'selected' : '' }}>Cultural Tours</option>
                                <option value="Adventure Tours" {{ old('category') == 'Adventure Tours' ? 'selected' : '' }}>Adventure Tours</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="destination" class="form-label">Destination *</label>
                            <input type="text" id="destination" name="destination" value="{{ old('destination') }}" required class="form-input @error('destination') border-red-500 @enderror">
                            @error('destination')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="duration_days" class="form-label">Duration (Days) *</label>
                            <input type="number" id="duration_days" name="duration_days" value="{{ old('duration_days') }}" min="1" required class="form-input @error('duration_days') border-red-500 @enderror">
                            @error('duration_days')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Dates and Rates -->
                    <div class="space-y-4">
                        <div>
                            <label for="travel_start_date" class="form-label">Travel Start Date *</label>
                            <input type="date" id="travel_start_date" name="travel_start_date" value="{{ old('travel_start_date') }}" required class="form-input @error('travel_start_date') border-red-500 @enderror">
                            @error('travel_start_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="travel_end_date" class="form-label">Travel End Date *</label>
                            <input type="date" id="travel_end_date" name="travel_end_date" value="{{ old('travel_end_date') }}" required class="form-input @error('travel_end_date') border-red-500 @enderror">
                            @error('travel_end_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="standard_rate" class="form-label">Standard Rate (₦) *</label>
                            <input type="number" id="standard_rate" name="standard_rate" value="{{ old('standard_rate') }}" step="0.01" min="0" required class="form-input @error('standard_rate') border-red-500 @enderror">
                            @error('standard_rate')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="b2b_rate" class="form-label">B2B Rate (₦) *</label>
                            <input type="number" id="b2b_rate" name="b2b_rate" value="{{ old('b2b_rate') }}" step="0.01" min="0" required class="form-input @error('b2b_rate') border-red-500 @enderror">
                            @error('b2b_rate')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label for="description" class="form-label">Description *</label>
                    <textarea id="description" name="description" rows="4" required class="form-input @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Inclusions and Exclusions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="inclusions" class="form-label">Inclusions *</label>
                        <textarea id="inclusions" name="inclusions" rows="4" required class="form-input @error('inclusions') border-red-500 @enderror">{{ old('inclusions') }}</textarea>
                        @error('inclusions')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="exclusions" class="form-label">Exclusions</label>
                        <textarea id="exclusions" name="exclusions" rows="4" class="form-input @error('exclusions') border-red-500 @enderror">{{ old('exclusions') }}</textarea>
                        @error('exclusions')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Itinerary -->
                <div class="mt-6">
                    <label for="itinerary" class="form-label">Itinerary</label>
                    <textarea id="itinerary" name="itinerary" rows="6" class="form-input @error('itinerary') border-red-500 @enderror">{{ old('itinerary') }}</textarea>
                    @error('itinerary')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Uploads -->
                <div class="mt-6 space-y-6">
                    <!-- Main Tour Image -->
                    <div>
                        <label for="image" class="form-label">Main Tour Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="form-input @error('image') border-red-500 @enderror">
                        <p class="text-sm text-gray-500 mt-1">Accepted formats: JPEG, PNG, JPG, GIF (Max: 2MB)</p>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="form-label">Featured Image</label>
                        <input type="file" id="featured_image" name="featured_image" accept="image/*" class="form-input @error('featured_image') border-red-500 @enderror">
                        <p class="text-sm text-gray-500 mt-1">This image will be used for featured displays and banners</p>
                        @error('featured_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Extra Images -->
                    <div>
                        <label class="form-label">Extra Images</label>
                        <div id="extra-images-container" class="space-y-4">
                            <div class="extra-image-item border border-gray-300 rounded-lg p-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                                        <input type="file" name="extra_images[]" accept="image/*" class="form-input">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Caption</label>
                                        <input type="text" name="image_captions[]" placeholder="Image caption" class="form-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-extra-image" class="mt-2 text-sm text-blue-600 hover:text-blue-800 font-medium">
                            <i class="fas fa-plus mr-1"></i> Add Another Image
                        </button>
                        <p class="text-sm text-gray-500 mt-1">Add additional images to showcase the tour destination</p>
                    </div>
                </div>

                <!-- Status Options -->
                <div class="mt-6">
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Featured Tour</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('tours.index') }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Create Tour Package
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementById('add-extra-image');
    const container = document.getElementById('extra-images-container');
    let imageCount = 1;

    addButton.addEventListener('click', function() {
        const newItem = document.createElement('div');
        newItem.className = 'extra-image-item border border-gray-300 rounded-lg p-4';
        newItem.innerHTML = `
            <div class="flex justify-between items-start mb-2">
                <span class="text-sm font-medium text-gray-700">Image ${imageCount + 1}</span>
                <button type="button" class="remove-image text-red-600 hover:text-red-800 text-sm">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" name="extra_images[]" accept="image/*" class="form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Caption</label>
                    <input type="text" name="image_captions[]" placeholder="Image caption" class="form-input">
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
@endsection 