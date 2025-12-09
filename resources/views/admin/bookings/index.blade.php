@extends('admin.layouts.app')

@section('title', 'Bookings - Admin Dashboard')
@section('page-title', 'Bookings')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">Bookings</h1>
            <p class="text-gray-400 mt-1">Manage all customer bookings</p>
        </div>
        <a href="{{ route('admin.bookings.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Create Booking
        </a>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Bookings</p>
                <h3 class="text-2xl font-bold text-gray-200 mt-1">{{ $bookings->total() }}</h3>
            </div>
            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-check text-purple-400 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Pending</p>
                <h3 class="text-2xl font-bold text-yellow-400 mt-1">{{ \App\Models\Booking::where('status', 'pending')->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-clock text-yellow-400 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Confirmed</p>
                <h3 class="text-2xl font-bold text-green-400 mt-1">{{ \App\Models\Booking::where('status', 'confirmed')->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-check-circle text-green-400 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Completed</p>
                <h3 class="text-2xl font-bold text-blue-400 mt-1">{{ \App\Models\Booking::where('status', 'completed')->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-flag-checkered text-blue-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filter and Search -->
<div class="glass-card p-6 mb-6">
    <form method="GET" action="{{ route('admin.bookings.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Search</label>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Reference or service name..." 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Booking Type</label>
            <select 
                name="type" 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Types</option>
                <option value="visa" {{ request('type') == 'visa' ? 'selected' : '' }}>Visa</option>
                <option value="tour" {{ request('type') == 'tour' ? 'selected' : '' }}>Tour</option>
                <option value="hotel" {{ request('type') == 'hotel' ? 'selected' : '' }}>Hotel</option>
                <option value="cruise" {{ request('type') == 'cruise' ? 'selected' : '' }}>Cruise</option>
                <option value="documentation" {{ request('type') == 'documentation' ? 'selected' : '' }}>Documentation</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
            <select 
                name="status" 
                class="w-full px-4 py-3 bg-gray-800/50 border border-gray-700 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
            >
                <option value="">All Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 px-4 py-3 bg-purple-500 hover:bg-purple-600 text-white rounded-lg transition">
                <i class="fas fa-search mr-2"></i>Filter
            </button>
            <a href="{{ route('admin.bookings.index') }}" class="px-4 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition">
                <i class="fas fa-redo"></i>
            </a>
        </div>
    </form>
</div>

<!-- Bookings Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Reference</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Customer</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Service</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Type</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Amount</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Date</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr class="border-b border-gray-700/50 hover:bg-white/5 transition">
                    <td class="py-4 px-4">
                        <span class="text-gray-200 font-mono text-sm">{{ $booking->reference_number }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="text-gray-300">
                            <p class="font-medium">{{ $booking->user->name }}</p>
                            <p class="text-xs text-gray-400">{{ $booking->user->email }}</p>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-200">{{ $booking->service_name }}</span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-500/20 text-purple-400 capitalize">
                            {{ $booking->booking_type }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="text-gray-200">{{ $booking->currency }} {{ number_format($booking->amount, 2) }}</span>
                    </td>
                    <td class="py-4 px-4">
                        @if($booking->status == 'pending')
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">
                                <i class="fas fa-clock text-xs mr-1"></i>Pending
                            </span>
                        @elseif($booking->status == 'confirmed')
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                <i class="fas fa-check-circle text-xs mr-1"></i>Confirmed
                            </span>
                        @elseif($booking->status == 'completed')
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400">
                                <i class="fas fa-flag-checkered text-xs mr-1"></i>Completed
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <i class="fas fa-times-circle text-xs mr-1"></i>Cancelled
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-4">
                        <div class="text-gray-300 text-sm">
                            <p>{{ $booking->created_at->format('M d, Y') }}</p>
                            <p class="text-xs text-gray-400">{{ $booking->created_at->format('h:i A') }}</p>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.bookings.show', $booking) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.bookings.edit', $booking) }}" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-calendar-times text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No bookings found</p>
                            <p class="text-sm mt-2">Create your first booking to get started</p>
                            <a href="{{ route('admin.bookings.create') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                                <i class="fas fa-plus mr-2"></i>Create Booking
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if($bookings->hasPages())
    <div class="mt-6">
        {{ $bookings->links() }}
    </div>
    @endif
</div>
@endsection