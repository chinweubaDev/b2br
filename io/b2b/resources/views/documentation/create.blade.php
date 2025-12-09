@extends('layouts.app')

@section('title', 'Create Documentation Service')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-8">
                <h1 class="text-2xl font-bold mb-6">Create Documentation Service</h1>
                <form method="POST" action="{{ route('documentation.store') }}">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="service_name" class="block text-sm font-medium text-gray-700 mb-1">Service Name *</label>
                            <input type="text" id="service_name" name="service_name" value="{{ old('service_name') }}" required class="form-input w-full @error('service_name') border-red-500 @enderror">
                            @error('service_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                            <textarea id="description" name="description" rows="4" required class="form-input w-full @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="standard_rate" class="block text-sm font-medium text-gray-700 mb-1">Standard Rate (₦) *</label>
                                <input type="number" id="standard_rate" name="standard_rate" value="{{ old('standard_rate') }}" step="0.01" min="0" required class="form-input w-full @error('standard_rate') border-red-500 @enderror">
                                @error('standard_rate')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="b2b_rate" class="block text-sm font-medium text-gray-700 mb-1">B2B Rate (₦) *</label>
                                <input type="number" id="b2b_rate" name="b2b_rate" value="{{ old('b2b_rate') }}" step="0.01" min="0" required class="form-input w-full @error('b2b_rate') border-red-500 @enderror">
                                @error('b2b_rate')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="requirements" class="block text-sm font-medium text-gray-700 mb-1">Requirements *</label>
                            <textarea id="requirements" name="requirements" rows="3" required class="form-input w-full @error('requirements') border-red-500 @enderror">{{ old('requirements') }}</textarea>
                            @error('requirements')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="processing_time" class="block text-sm font-medium text-gray-700 mb-1">Processing Time *</label>
                                <input type="text" id="processing_time" name="processing_time" value="{{ old('processing_time') }}" required class="form-input w-full @error('processing_time') border-red-500 @enderror">
                                @error('processing_time')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                                <select id="category" name="category" required class="form-input w-full @error('category') border-red-500 @enderror">
                                    <option value="">Select Category</option>
                                    <option value="legal" {{ old('category') == 'legal' ? 'selected' : '' }}>Legal</option>
                                    <option value="travel" {{ old('category') == 'travel' ? 'selected' : '' }}>Travel</option>
                                    <option value="business" {{ old('category') == 'business' ? 'selected' : '' }}>Business</option>
                                </select>
                                @error('category')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Active Service
                            </label>
                        </div>
                        <div class="flex justify-end space-x-4 mt-8">
                            <a href="{{ route('documentation.index') }}" class="btn-secondary">Cancel</a>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save mr-2"></i>
                                Create Service
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 