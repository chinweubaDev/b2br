@extends('admin.layouts.app')

@section('title', 'All Cruises - Admin Dashboard')
@section('page-title', 'Cruises')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Cruises</h1>
            <p class="text-gray-400 mt-1">Manage all cruise packages</p>
        </div>
        <a href="{{ route('cruises.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New Cruise
        </a>
    </div>
</div>

<!-- Cruises Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Cruise Name</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Route</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Duration</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Price</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $cruises = \App\Models\Cruise::latest()->paginate(15);
                @endphp
                @forelse($cruises as $cruise)
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-ship text-purple-400"></i>
                            <span class="text-gray-200 font-medium">{{ $cruise->name }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300">{{ $cruise->departure_port }} → {{ $cruise->destination }}</td>
                    <td class="py-4 px-4 text-gray-300">{{ $cruise->duration }} nights</td>
                    <td class="py-4 px-4 text-gray-300">₦{{ number_format($cruise->price, 2) }}</td>
                    <td class="py-4 px-4">
                        @if($cruise->is_active)
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
                            <a href="{{ route('cruises.show', $cruise) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('cruises.edit', $cruise) }}" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('cruises.destroy', $cruise) }}" class="inline" onsubmit="return confirm('Delete this cruise?');">
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
                    <td colspan="6" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-ship text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No cruises found</p>
                            <a href="{{ route('cruises.create') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                                <i class="fas fa-plus mr-2"></i>Add Cruise
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($cruises->hasPages())
    <div class="mt-6">
        {{ $cruises->links() }}
    </div>
    @endif
</div>
@endsection
