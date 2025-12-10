<?php $__env->startSection('title', 'Tour Packages - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .tours-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-header {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        border-radius: 24px;
        padding: 2.5rem 2rem;
        color: white;
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 10px 40px rgba(79, 172, 254, 0.3);
    }

    .header-content h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .header-content p {
        font-size: 1.05rem;
        opacity: 0.95;
    }

    .create-btn {
        padding: 0.875rem 1.75rem;
        background: white;
        color: #4facfe;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .create-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .create-btn i {
        margin-right: 0.5rem;
    }

    /* Filters */
    .filters-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .filters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.25rem;
    }

    .filter-group label {
        display: block;
        font-weight: 600;
        color: var(--color-gray-700);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .filter-input,
    .filter-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid var(--color-gray-200);
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        outline: none;
    }

    .filter-input:focus,
    .filter-select:focus {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    /* Tours Grid */
    .tours-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .tour-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        animation: fadeIn 0.6s ease-out;
    }

    .tour-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
    }

    .tour-image {
        height: 220px;
        position: relative;
        overflow: hidden;
    }

    .tour-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .tour-card:hover .tour-image img {
        transform: scale(1.1);
    }

    .tour-image.gradient-placeholder {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tour-image.gradient-placeholder i {
        font-size: 3rem;
        color: white;
        opacity: 0.9;
    }

    .featured-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .featured-badge i {
        margin-right: 0.375rem;
    }

    .tour-content {
        padding: 1.75rem;
    }

    .tour-header {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.25rem;
    }

    .tour-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .tour-icon i {
        font-size: 1.5rem;
        color: white;
    }

    .tour-info h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--color-gray-900);
        margin-bottom: 0.25rem;
    }

    .tour-info p {
        font-size: 0.9rem;
        color: var(--color-gray-600);
    }

    .tour-details {
        margin-bottom: 1.5rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.625rem 0;
        border-bottom: 1px solid var(--color-gray-100);
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-size: 0.875rem;
        color: var(--color-gray-600);
    }

    .detail-value {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--color-gray-900);
    }

    .detail-value.price {
        font-size: 1.1rem;
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .tour-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
    }

    .action-btn {
        padding: 0.875rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        text-align: center;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-view {
        background: var(--bg-gradient-light);
        color: var(--color-gray-900);
        border: 2px solid var(--color-gray-200);
    }

    .btn-view:hover {
        border-color: var(--color-primary);
        transform: translateY(-2px);
    }

    .btn-book {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }

    .btn-book:hover {
        box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
        transform: translateY(-2px);
    }

    .action-btn i {
        margin-right: 0.5rem;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--color-gray-300);
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: var(--color-gray-700);
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: var(--color-gray-500);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            text-align: center;
            gap: 1.5rem;
        }

        .header-content h1 {
            font-size: 1.5rem;
        }

        .tours-grid {
            grid-template-columns: 1fr;
        }

        .filters-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="tours-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h1>Tour Packages</h1>
            <p>Explore amazing destinations with our curated tour packages</p>
        </div>
        <a href="<?php echo e(route('tours.create')); ?>" class="create-btn">
            <i class="fas fa-plus"></i>
            New Tour Package
        </a>
    </div>

    <!-- Filters -->
    <div class="filters-card">
        <div class="filters-grid">
            <div class="filter-group">
                <label for="search">Search</label>
                <input type="text" id="search" class="filter-input" placeholder="Search tours...">
            </div>
            <div class="filter-group">
                <label for="destination">Destination</label>
                <select id="destination" class="filter-select">
                    <option value="">All Destinations</option>
                    <option value="cape-town">Cape Town</option>
                    <option value="dubai">Dubai</option>
                    <option value="paris">Paris</option>
                    <option value="london">London</option>
                    <option value="new-york">New York</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="category">Category</label>
                <select id="category" class="filter-select">
                    <option value="">All Categories</option>
                    <option value="luxury">Luxury</option>
                    <option value="adventure">Adventure</option>
                    <option value="romance">Romance</option>
                    <option value="family">Family</option>
                    <option value="cultural">Cultural</option>
                    <option value="beach">Beach</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="duration">Duration</label>
                <select id="duration" class="filter-select">
                    <option value="">All Durations</option>
                    <option value="1-3">1-3 Days</option>
                    <option value="4-7">4-7 Days</option>
                    <option value="8-14">8-14 Days</option>
                    <option value="15+">15+ Days</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Tours Grid -->
    <div class="tours-grid">
        <?php $__empty_1 = true; $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="tour-card">
                <?php if($tour->featured_image_url || $tour->image_url): ?>
                    <div class="tour-image">
                        <img src="<?php echo e(asset('public/storage' . $tour->featured_image ?? 'storage' . $tour->image)); ?>" alt="<?php echo e($tour->name); ?>">
                        <?php if($tour->is_featured): ?>
                            <div class="featured-badge">
                                <i class="fas fa-star"></i> Featured
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="tour-image gradient-placeholder">
                        <i class="fas fa-map-marked-alt"></i>
                        <?php if($tour->is_featured): ?>
                            <div class="featured-badge">
                                <i class="fas fa-star"></i> Featured
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="tour-content">
                    <div class="tour-header">
                        <div class="tour-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="tour-info">
                            <h3><?php echo e($tour->name); ?></h3>
                            <p><?php echo e($tour->destination); ?></p>
                        </div>
                    </div>

                    <div class="tour-details">
                        <div class="detail-row">
                            <span class="detail-label">Duration</span>
                            <span class="detail-value"><?php echo e($tour->duration_days); ?> Days</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Category</span>
                            <span class="detail-value"><?php echo e(ucfirst($tour->category)); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Standard Rate</span>
                            <span class="detail-value">₦<?php echo e(number_format($tour->standard_rate)); ?></span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">B2B Rate</span>
                            <span class="detail-value price">₦<?php echo e(number_format($tour->b2b_rate)); ?></span>
                        </div>
                    </div>

                    <div class="tour-actions">
                        <a href="<?php echo e(route('tours.show', $tour)); ?>" class="action-btn btn-view">
                            <i class="fas fa-eye"></i> View Details
                        </a>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('payment.options', ['tour', $tour->id])); ?>" class="action-btn btn-book">
                                <i class="fas fa-credit-card"></i> Book Now
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="action-btn btn-book" title="Please log in to book this tour">
                                <i class="fas fa-sign-in-alt"></i> Login to Book
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state" style="grid-column: 1 / -1;">
                <i class="fas fa-map-marked-alt"></i>
                <h3>No Tour Packages Found</h3>
                <p>Check back later for exciting tour packages!</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/tours/index.blade.php ENDPATH**/ ?>