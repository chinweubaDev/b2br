@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Edit Cruise Package</h1>
            <a href="{{ route('cruises.show', $cruise) }}" class="btn-secondary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Cruise
            </a>
        </div>

        <div class="card">
            <form action="{{ route('cruises.update', $cruise) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="form-label">Cruise Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $cruise->name) }}" required class="form-input @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="cruise_line" class="form-label">Cruise Line *</label>
                            <select id="cruise_line" name="cruise_line" required class="form-input @error('cruise_line') border-red-500 @enderror">
                                <option value="">Select Cruise Line</option>
                                <option value="Royal Caribbean" {{ old('cruise_line', $cruise->cruise_line) == 'Royal Caribbean' ? 'selected' : '' }}>Royal Caribbean</option>
                                <option value="Costa Cruises" {{ old('cruise_line', $cruise->cruise_line) == 'Costa Cruises' ? 'selected' : '' }}>Costa Cruises</option>
                                <option value="Norwegian Cruise Line" {{ old('cruise_line', $cruise->cruise_line) == 'Norwegian Cruise Line' ? 'selected' : '' }}>Norwegian Cruise Line</option>
                                <option value="MSC Cruises" {{ old('cruise_line', $cruise->cruise_line) == 'MSC Cruises' ? 'selected' : '' }}>MSC Cruises</option>
                                <option value="Celebrity Cruises" {{ old('cruise_line', $cruise->cruise_line) == 'Celebrity Cruises' ? 'selected' : '' }}>Celebrity Cruises</option>
                                <option value="Princess Cruises" {{ old('cruise_line', $cruise->cruise_line) == 'Princess Cruises' ? 'selected' : '' }}>Princess Cruises</option>
                            </select>
                            @error('cruise_line')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ship_name" class="form-label">Ship Name *</label>
                            <input type="text" id="ship_name" name="ship_name" value="{{ old('ship_name', $cruise->ship_name) }}" required class="form-input @error('ship_name') border-red-500 @enderror">
                            @error('ship_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="route" class="form-label">Route *</label>
                            <input type="text" id="route" name="route" value="{{ old('route', $cruise->route) }}" required class="form-input @error('route') border-red-500 @enderror">
                            @error('route')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Dates and Rates -->
                    <div class="space-y-4">
                        <div>
                            <label for="departure_date" class="form-label">Departure Date *</label>
                            <input type="date" id="departure_date" name="departure_date" value="{{ old('departure_date', $cruise->departure_date->format('Y-m-d')) }}" required class="form-input @error('departure_date') border-red-500 @enderror">
                            @error('departure_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="return_date" class="form-label">Return Date *</label>
                            <input type="date" id="return_date" name="return_date" value="{{ old('return_date', $cruise->return_date->format('Y-m-d')) }}" required class="form-input @error('return_date') border-red-500 @enderror">
                            @error('return_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="duration_nights" class="form-label">Duration (Nights) *</label>
                            <input type="number" id="duration_nights" name="duration_nights" value="{{ old('duration_nights', $cruise->duration_nights) }}" min="1" required class="form-input @error('duration_nights') border-red-500 @enderror">
                            @error('duration_nights')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="standard_rate" class="form-label">Standard Rate (₦) *</label>
                            <input type="number" id="standard_rate" name="standard_rate" value="{{ old('standard_rate', $cruise->standard_rate) }}" step="0.01" min="0" required class="form-input @error('standard_rate') border-red-500 @enderror">
                            @error('standard_rate')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="b2b_rate" class="form-label">B2B Rate (₦) *</label>
                            <input type="number" id="b2b_rate" name="b2b_rate" value="{{ old('b2b_rate', $cruise->b2b_rate) }}" step="0.01" min="0" required class="form-input @error('b2b_rate') border-red-500 @enderror">
                            @error('b2b_rate')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label for="description" class="form-label">Description *</label>
                    <textarea id="description" name="description" rows="4" required class="form-input @error('description') border-red-500 @enderror">{{ old('description', $cruise->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ports and Inclusions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label for="ports_of_call" class="form-label">Ports of Call *</label>
                        <textarea id="ports_of_call" name="ports_of_call" rows="4" required class="form-input @error('ports_of_call') border-red-500 @enderror">{{ old('ports_of_call', $cruise->ports_of_call) }}</textarea>
                        @error('ports_of_call')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="inclusions" class="form-label">Inclusions *</label>
                        <textarea id="inclusions" name="inclusions" rows="4" required class="form-input @error('inclusions') border-red-500 @enderror">{{ old('inclusions', $cruise->inclusions) }}</textarea>
                        @error('inclusions')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Exclusions -->
                <div class="mt-6">
                    <label for="exclusions" class="form-label">Exclusions</label>
                    <textarea id="exclusions" name="exclusions" rows="4" class="form-input @error('exclusions') border-red-500 @enderror">{{ old('exclusions', $cruise->exclusions) }}</textarea>
                    @error('exclusions')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="mt-6">
                    <label for="image" class="form-label">Cruise Image</label>
                    @if($cruise->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $cruise->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-500 mt-1">Current image</p>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*" class="form-input @error('image') border-red-500 @enderror">
                    <p class="text-sm text-gray-500 mt-1">Accepted formats: JPEG, PNG, JPG, GIF (Max: 2MB). Leave empty to keep current image.</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Options -->
                <div class="mt-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $cruise->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('cruises.show', $cruise) }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Cruise Package
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 