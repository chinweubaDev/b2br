@extends('layouts.app')

@section('title', 'Tour Packages - Royeli Tours & Travel')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --glass-bg: rgba(255, 255, 255, 0.95);
        --glass-border: 1px solid rgba(255, 255, 255, 0.2);
        --glass-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        --card-hover-transform: translateY(-5px);
    }

    .tours-container {
        max-width: 1400px;
        margin: 0 auto;
        padding-bottom: 3rem;
    }

    /* Modern Hero Section */
    .page-header {
        background: var(--primary-gradient);
        border-radius: 24px;
        padding: 4rem 3rem;
        color: white;
        margin-bottom: -3rem; /* Overlap with filters */
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 242, 254, 0.2);
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.4;
    }

    .header-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .header-content h1 {
        font-size: 3rem;
        font-weight: 800;
        letter-spacing: -0.02em;
        margin-bottom: 1rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        animation: fadeDown 0.8s ease-out;
    }

    .header-content p {
        font-size: 1.2rem;
        opacity: 0.95;
        font-weight: 500;
        animation: fadeUp 0.8s ease-out 0.2s backwards;
    }

    /* Floating Filters Bar */
    .filters-section {
        position: relative;
        z-index: 10;
        margin-top: 0;
        padding: 0 1rem;
    }

    .filters-card {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--glass-shadow);
        border: var(--glass-border);
        margin-bottom: 3rem;
    }

    .filters-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 1.5rem;
        align-items: end;
    }

    .filter-group {
        position: relative;
    }

    .filter-group label {
        display: block;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .filter-input-wrapper {
        position: relative;
    }

    .filter-input-wrapper i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #a0aec0;
        pointer-events: none;
    }

    .filter-input,
    .filter-select {
        width: 100%;
        padding: 0.85rem 1rem 0.85rem 2.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
        color: #2d3748;
        appearance: none;
    }

    .filter-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }

    .filter-input:focus,
    .filter-select:focus {
        border-color: #4facfe;
        box-shadow: 0 0 0 4px rgba(79, 172, 254, 0.1);
        outline: none;
    }

    /* Tours Grid */
    .tours-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2.5rem;
        padding: 0 1rem;
    }

    .tour-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid #f0f0f0;
    }

    .tour-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
    }

    .tour-image {
        height: 240px;
        position: relative;
        overflow: hidden;
    }

    .tour-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .tour-card:hover .tour-image img {
        transform: scale(1.1);
    }

    .tour-image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        padding: 2rem 1.5rem 1rem;
        color: white;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }

    .tour-card:hover .tour-image-overlay {
        transform: translateY(0);
    }

    .tour-image.gradient-placeholder {
        background: var(--secondary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tour-image.gradient-placeholder i {
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.3);
    }

    .featured-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        background: rgba(255, 255, 255, 0.95);
        color: #d63031;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        z-index: 5;
    }

    .tour-content {
        padding: 2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .destination-tag {
        display: inline-flex;
        align-items: center;
        color: #667eea;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .destination-tag i {
        margin-right: 0.5rem;
    }

    .tour-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .tour-meta {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #f1f5f9;
        color: #718096;
        font-size: 0.9rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
    }

    .meta-item i {
        margin-right: 0.5rem;
        color: #4facfe;
    }

    .tour-pricing {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 1.5rem;
    }

    .price-group {
        display: flex;
        flex-direction: column;
    }

    .price-label {
        font-size: 0.8rem;
        color: #a0aec0;
        margin-bottom: 0.2rem;
    }

    .price-value {
        font-size: 1.5rem;
        font-weight: 800;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .old-price {
        font-size: 0.9rem;
        color: #cbd5e0;
        text-decoration: line-through;
    }

    .tour-actions {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .btn-details {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.9rem;
        border-radius: 12px;
        background: #f7fafc;
        color: #4a5568;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .btn-details:hover {
        background: white;
        border-color: #cbd5e0;
        color: #2d3748;
    }

    .btn-book {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.9rem;
        border-radius: 12px;
        background: var(--primary-gradient);
        color: white;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }

    .btn-book:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: white;
        border-radius: 20px;
        box-shadow: var(--glass-shadow);
        grid-column: 1 / -1;
    }

    .empty-icon-wrapper {
        width: 100px;
        height: 100px;
        background: #f7fafc;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .empty-state i {
        font-size: 3rem;
        color: #cbd5e0;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    /* Animations */
    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 968px) {
        .page-header {
            padding: 3rem 1.5rem 5rem;
        }
        
        .filters-grid {
            grid-template-columns: 1fr 1fr;
        }
        
        .header-content h1 {
            font-size: 2.25rem;
        }
    }

    @media (max-width: 640px) {
        .filters-grid {
            grid-template-columns: 1fr;
        }
        
        .tours-grid {
            grid-template-columns: 1fr;
        }
        
        .price-value {
            font-size: 1.25rem;
        }
    }
</style>

<div class="tours-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h1>Discover Your Next Adventure</h1>
            <p>Explore exclusive tour packages curated just for you. From luxury escapes to cultural journeys.</p>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="filters-section">
        <div class="filters-card">
            <div class="filters-grid">
                <div class="filter-group">
                    <label for="search">Find your trip</label>
                    <div class="filter-input-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" id="search" class="filter-input" placeholder="Where do you want to go?" value="{{ request('search') }}">
                    </div>
                </div>
                <div class="filter-group">
                    <label for="destination">Destination</label>
                    <div class="filter-input-wrapper">
                        <i class="fas fa-map-marker-alt"></i>
                        <select id="destination" class="filter-select">
                            <option value="">Anywhere</option>
                            @foreach($destinations as $dest)
                                <option value="{{ $dest }}" {{ request('destination') == $dest ? 'selected' : '' }}>
                                    {{ $dest }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="filter-group">
                    <label for="category">Style</label>
                    <div class="filter-input-wrapper">
                        <i class="fas fa-tag"></i>
                        <select id="category" class="filter-select">
                            <option value="">Any Style</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                    {{ ucfirst($cat) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="filter-group">
                    <label for="duration">Duration</label>
                    <div class="filter-input-wrapper">
                        <i class="fas fa-clock"></i>
                        <select id="duration" class="filter-select">
                            <option value="">Any Length</option>
                            <option value="1-3" {{ request('duration') == '1-3' ? 'selected' : '' }}>1-3 Days</option>
                            <option value="4-7" {{ request('duration') == '4-7' ? 'selected' : '' }}>4-7 Days</option>
                            <option value="8-14" {{ request('duration') == '8-14' ? 'selected' : '' }}>8-14 Days</option>
                            <option value="15+" {{ request('duration') == '15+' ? 'selected' : '' }}>15+ Days</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tours Grid -->
    <div class="tours-grid">
        @forelse($tours as $tour)
            <div class="tour-card">
                <div class="tour-image">
                    @if($tour->is_featured ?? false)
                        <div class="featured-badge">
                            <i class="fas fa-star" style="margin-right: 6px;"></i> Featured
                        </div>
                    @endif
                    
                    @if($tour->featured_image_url || $tour->image_url)
                        <img src="{{ $tour->featured_image ? asset('public/storage/' . $tour->featured_image) : asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}">
                    @else
                        <div class="gradient-placeholder" style="width: 100%; height: 100%;">
                            <i class="fas fa-mountain"></i>
                        </div>
                    @endif

                    <div class="tour-image-overlay">
                        <span>View Details</span>
                    </div>
                </div>

                <div class="tour-content">
                    <div class="destination-tag">
                        <i class="fas fa-map-pin"></i> {{ $tour->destination }}
                    </div>
                    
                    <h3 class="tour-title">{{ $tour->name }}</h3>
                    
                    <div class="tour-meta">
                        <span class="meta-item">
                            <i class="far fa-clock"></i> {{ $tour->duration_days }} Days
                        </span>
                        <span class="meta-item">
                            <i class="far fa-compass"></i> {{ ucfirst($tour->category) }}
                        </span>
                    </div>

                    <div class="tour-pricing">
                        <div class="price-group">
                            <span class="price-label">Standard Rate</span>
                            <span class="old-price">₦{{ number_format($tour->standard_rate) }}</span>
                        </div>
                        <div class="price-group" style="text-align: right;">
                            <span class="price-label">Your Rate</span>
                            <span class="price-value">₦{{ number_format($tour->b2b_rate) }}</span>
                        </div>
                    </div>

                    <div class="tour-actions">
                        @auth
                            <a href="{{ route('payment.options', ['tour', $tour->id]) }}" class="btn-book">
                                Book Now <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-book">
                                Login to Book
                            </a>
                        @endauth
                        <a href="{{ route('tours.show', $tour) }}" class="btn-details">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-icon-wrapper">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <h3>No Tour Packages Found</h3>
                <p>We couldn't find any tours matching your criteria. Try adjusting your filters.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    // Tour filtering functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const destinationSelect = document.getElementById('destination');
        const categorySelect = document.getElementById('category');
        const durationSelect = document.getElementById('duration');

        // Debounce function for search input
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Apply filters function
        function applyFilters() {
            const params = new URLSearchParams();
            
            const searchValue = searchInput.value.trim();
            const destinationValue = destinationSelect.value;
            const categoryValue = categorySelect.value;
            const durationValue = durationSelect.value;

            if (searchValue) params.append('search', searchValue);
            if (destinationValue) params.append('destination', destinationValue);
            if (categoryValue) params.append('category', categoryValue);
            if (durationValue) params.append('duration', durationValue);

            // Reload page with filters
            const queryString = params.toString();
            window.location.href = queryString ? `{{ route('tours.index') }}?${queryString}` : '{{ route('tours.index') }}';
        }

        // Add event listeners
        searchInput.addEventListener('input', debounce(applyFilters, 500));
        destinationSelect.addEventListener('change', applyFilters);
        categorySelect.addEventListener('change', applyFilters);
        durationSelect.addEventListener('change', applyFilters);
    });
</script>
@endsection
