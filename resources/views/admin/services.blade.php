@extends('admin.layouts.app')

@section('title', 'All Services - Admin Dashboard')
@section('page-title', 'All Services')

@section('content')
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">All Services</h1>
            <p class="text-gray-400 mt-1">Manage all services across the platform</p>
        </div>
    </div>
</div>

<!-- Service Tabs -->
<div class="glass-card p-6 mb-6">
    <div class="flex flex-wrap gap-2 border-b border-gray-700 pb-4">
        <button onclick="showTab('tours')" id="tab-tours" class="tab-button px-4 py-2 rounded-lg transition bg-purple-500/20 text-purple-400">
            <i class="fas fa-map-marked-alt mr-2"></i>Tours ({{ $tours->count() }})
        </button>
        <button onclick="showTab('visas')" id="tab-visas" class="tab-button px-4 py-2 rounded-lg transition hover:bg-gray-700/50 text-gray-400">
            <i class="fas fa-passport mr-2"></i>Visas ({{ $visas->count() }})
        </button>
        <button onclick="showTab('hotels')" id="tab-hotels" class="tab-button px-4 py-2 rounded-lg transition hover:bg-gray-700/50 text-gray-400">
            <i class="fas fa-hotel mr-2"></i>Hotels ({{ $hotels->count() }})
        </button>
        <button onclick="showTab('cruises')" id="tab-cruises" class="tab-button px-4 py-2 rounded-lg transition hover:bg-gray-700/50 text-gray-400">
            <i class="fas fa-ship mr-2"></i>Cruises ({{ $cruises->count() }})
        </button>
        <button onclick="showTab('docs')" id="tab-docs" class="tab-button px-4 py-2 rounded-lg transition hover:bg-gray-700/50 text-gray-400">
            <i class="fas fa-file-alt mr-2"></i>Documentation ({{ $docs->count() }})
        </button>
    </div>
</div>

<!-- Tours Tab -->
<div id="content-tours" class="tab-content">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-200">Tour Packages</h2>
            <a href="{{ route('tours.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>Add Tour
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Name</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Destination</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Duration</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Price</th>
                        <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tours as $tour)
                    <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                        <td class="py-4 px-4 text-gray-200">{{ $tour->name }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $tour->destination }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $tour->duration }} days</td>
                        <td class="py-4 px-4 text-gray-300">₦{{ number_format($tour->price, 2) }}</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('tours.edit', $tour) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('tours.destroy', $tour) }}" class="inline" onsubmit="return confirm('Delete this tour?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="py-8 text-center text-gray-400">No tours found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Visas Tab -->
<div id="content-visas" class="tab-content hidden">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-200">Visa Services</h2>
            <a href="{{ route('visas.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>Add Visa
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Country</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Type</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Processing Time</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Price</th>
                        <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($visas as $visa)
                    <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                        <td class="py-4 px-4 text-gray-200">{{ $visa->country }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $visa->type }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $visa->processing_time }}</td>
                        <td class="py-4 px-4 text-gray-300">₦{{ number_format($visa->price, 2) }}</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('visas.edit', $visa) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('visas.destroy', $visa) }}" class="inline" onsubmit="return confirm('Delete this visa?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="py-8 text-center text-gray-400">No visas found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Hotels Tab -->
<div id="content-hotels" class="tab-content hidden">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-200">Hotels</h2>
            <a href="{{ route('hotels.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>Add Hotel
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Name</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Location</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Rating</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Price/Night</th>
                        <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hotels as $hotel)
                    <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                        <td class="py-4 px-4 text-gray-200">{{ $hotel->name }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $hotel->city }}, {{ $hotel->country }}</td>
                        <td class="py-4 px-4 text-yellow-400">
                            @for($i = 0; $i < $hotel->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </td>
                        <td class="py-4 px-4 text-gray-300">₦{{ number_format($hotel->price_per_night, 2) }}</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('hotels.edit', $hotel) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('hotels.destroy', $hotel) }}" class="inline" onsubmit="return confirm('Delete this hotel?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="py-8 text-center text-gray-400">No hotels found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Cruises Tab -->
<div id="content-cruises" class="tab-content hidden">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-200">Cruises</h2>
            <a href="{{ route('cruises.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>Add Cruise
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Name</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Route</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Duration</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Price</th>
                        <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cruises as $cruise)
                    <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                        <td class="py-4 px-4 text-gray-200">{{ $cruise->name }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $cruise->departure_port }} → {{ $cruise->destination }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $cruise->duration }} nights</td>
                        <td class="py-4 px-4 text-gray-300">₦{{ number_format($cruise->price, 2) }}</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('cruises.edit', $cruise) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('cruises.destroy', $cruise) }}" class="inline" onsubmit="return confirm('Delete this cruise?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="py-8 text-center text-gray-400">No cruises found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Documentation Tab -->
<div id="content-docs" class="tab-content hidden">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-200">Documentation Services</h2>
            <a href="{{ route('documentation.create') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>Add Service
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Service Name</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Type</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Processing Time</th>
                        <th class="text-left py-3 px-4 text-gray-300 font-semibold">Price</th>
                        <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($docs as $doc)
                    <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                        <td class="py-4 px-4 text-gray-200">{{ $doc->name }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $doc->type }}</td>
                        <td class="py-4 px-4 text-gray-300">{{ $doc->processing_time }}</td>
                        <td class="py-4 px-4 text-gray-300">₦{{ number_format($doc->price, 2) }}</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('documentation.edit', $doc) }}" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('documentation.destroy', $doc) }}" class="inline" onsubmit="return confirm('Delete this service?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="py-8 text-center text-gray-400">No documentation services found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function showTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Remove active state from all buttons
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('bg-purple-500/20', 'text-purple-400');
        button.classList.add('hover:bg-gray-700/50', 'text-gray-400');
    });
    
    // Show selected tab content
    document.getElementById('content-' + tabName).classList.remove('hidden');
    
    // Add active state to clicked button
    const activeButton = document.getElementById('tab-' + tabName);
    activeButton.classList.add('bg-purple-500/20', 'text-purple-400');
    activeButton.classList.remove('hover:bg-gray-700/50', 'text-gray-400');
}
</script>
@endsection
