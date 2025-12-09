@extends('admin.layouts.app')

@section('title', 'All Tours - Admin Dashboard')
@section('page-title', 'Tour Packages')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Tour Packages</h1>
            <p class="text-gray-400 mt-1">Manage all tour packages</p>
        </div>
        <a href="{{ route('tours.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New Tour
        </a>
    </div>
</div>

<!-- Tours Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Tour Name</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Destination</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Category</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Duration</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Standard Rate</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $tours = \App\Models\TourPackage::latest()->paginate(15);
                @endphp
                @forelse($tours as $tour)
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-map-marked-alt text-purple-400"></i>
                            <span class="text-gray-200 font-medium">{{ $tour->name }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300">{{ $tour->destination }}</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400">
                            {{ $tour->category }}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-gray-300">{{ $tour->duration_days }} days</td>
                    <td class="py-4 px-4 text-gray-300">₦{{ number_format($tour->standard_rate, 2) }}</td>
                    <td class="py-4 px-4">
                        @if($tour->is_active)
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Active
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Inactive
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('tours.show', $tour) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('tours.edit', $tour) }}" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('tours.destroy', $tour) }}" class="inline" onsubmit="return confirm('Delete this tour?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-map-marked-alt text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No tours found</p>
                            <a href="{{ route('tours.create') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                                <i class="fas fa-plus mr-2"></i>Add Tour
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($tours->hasPages())
    <div class="mt-6">
        {{ $tours->links() }}
    </div>
    @endif
</div>
@endsection
