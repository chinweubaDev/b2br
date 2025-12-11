<?php $__env->startSection('title', 'Dashboard - Royeli Tours & Travel'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 24px;
        padding: 3rem 2.5rem;
        color: white;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        animation: slideInLeft 0.6s ease-out;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.95;
        animation: slideInRight 0.6s ease-out;
    }

    .hero-date {
        margin-top: 1rem;
        font-size: 0.95rem;
        opacity: 0.9;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.6s ease-out;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: var(--gradient);
        opacity: 0.05;
        border-radius: 50%;
        transform: translate(30%, -30%);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }

    .stat-card.gradient-card {
        background: var(--gradient);
        color: white;
    }

    .stat-card.gradient-card::before {
        background: white;
        opacity: 0.1;
    }

    .stat-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        margin-right: 1rem;
    }

    .stat-info h3 {
        font-size: 0.9rem;
        font-weight: 600;
        opacity: 0.8;
        margin-bottom: 0.25rem;
    }

    .stat-info p {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
    }

    .stat-footer {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .gradient-card .stat-footer {
        border-top-color: rgba(255, 255, 255, 0.2);
    }

    .stat-footer a {
        color: inherit;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .stat-footer a:hover {
        transform: translateX(5px);
    }

    .stat-footer a i {
        margin-left: 0.5rem;
    }

    /* Service Cards Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .service-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 4px solid var(--color);
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .service-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .service-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        background: var(--color);
    }

    .service-count {
        font-size: 2rem;
        font-weight: 700;
        color: var(--color-gray-900);
    }

    .service-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--color-gray-700);
        margin-bottom: 1rem;
    }

    .service-link {
        display: inline-flex;
        align-items: center;
        color: var(--color);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .service-link:hover {
        transform: translateX(5px);
    }

    .service-link i {
        margin-left: 0.5rem;
    }

    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .quick-actions h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: var(--color-gray-900);
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .action-btn {
        display: flex;
        align-items: center;
        padding: 1.25rem;
        background: var(--bg-gradient-light);
        border-radius: 16px;
        text-decoration: none;
        color: var(--color-gray-900);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border-color: var(--color-primary);
    }

    .action-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        background: var(--gradient);
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .action-text h4 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .action-text p {
        font-size: 0.85rem;
        color: var(--color-gray-600);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 1.5rem;
        }

        .hero-title {
            font-size: 1.5rem;
        }

        .stats-grid,
        .services-grid {
            grid-template-columns: 1fr;
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dashboard-container">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Welcome to Royeli Tours & Travel</h1>
            <p class="hero-subtitle">Your comprehensive B2B travel solutions partner</p>
            <p class="hero-date"><i class="fas fa-calendar-alt"></i> <?php echo e(now()->format('l, F j, Y')); ?></p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <!-- Wallet Balance -->
        <div class="stat-card gradient-card" style="--gradient: linear-gradient(135deg, #0281b8 0%, #0a4d6e 100%);">
            <div class="stat-header">
                <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="stat-info">
                    <h3>Wallet Balance</h3>
                    <p><?php echo e(($user ?? auth()->user())->formatted_wallet_balance ?? '₦0.00'); ?></p>
                </div>
            </div>
            <div class="stat-footer">
                <a href="<?php echo e(route('wallet.fund')); ?>">
                    <i class="fas fa-plus"></i> Fund Wallet <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Points Balance -->
        <div class="stat-card gradient-card" style="--gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="stat-header">
                <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-info">
                    <h3>Points Balance</h3>
                    <p><?php echo e(($user ?? auth()->user())->points_balance ?? 0); ?></p>
                </div>
            </div>
            <div class="stat-footer">
                <span style="font-size: 0.85rem; opacity: 0.9;">Earn 100 points per transaction</span>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div class="services-grid">
        <!-- Visa Services -->
        <div class="service-card" style="--color: #667eea;">
            <div class="service-header">
                <div class="service-icon">
                    <i class="fas fa-passport"></i>
                </div>
                <div class="service-count"><?php echo e($visaCount ?? 15); ?></div>
            </div>
            <h3 class="service-title">Visa Services</h3>
            <a href="<?php echo e(route('visas.index')); ?>" class="service-link">
                View all services <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Tour Packages -->
        <div class="service-card" style="--color: #4facfe;">
            <div class="service-header">
                <div class="service-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <div class="service-count"><?php echo e($tourCount ?? 8); ?></div>
            </div>
            <h3 class="service-title">Tour Packages</h3>
            <a href="<?php echo e(route('tours.index')); ?>" class="service-link">
                View all packages <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Hotels -->
        <div class="service-card" style="--color: #f5576c;">
            <div class="service-header">
                <div class="service-icon">
                    <i class="fas fa-hotel"></i>
                </div>
                <div class="service-count"><?php echo e($hotelCount ?? 25); ?></div>
            </div>
            <h3 class="service-title">Hotels</h3>
            <a href="<?php echo e(route('hotels.index')); ?>" class="service-link">
                View all hotels <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Cruises -->
        <div class="service-card" style="--color: #30cfd0;">
            <div class="service-header">
                <div class="service-icon">
                    <i class="fas fa-ship"></i>
                </div>
                <div class="service-count"><?php echo e($cruiseCount ?? 3); ?></div>
            </div>
            <h3 class="service-title">Cruises</h3>
            <a href="<?php echo e(route('cruises.index')); ?>" class="service-link">
                View all cruises <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h2>Quick Actions</h2>
        <div class="actions-grid">
            <a href="<?php echo e(route('visas.index')); ?>" class="action-btn">
                <div class="action-icon" style="--gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="action-text">
                    <h4>New Visa Application</h4>
                    <p>Start visa process</p>
                </div>
            </a>

            <a href="<?php echo e(route('tours.index')); ?>" class="action-btn">
                <div class="action-icon" style="--gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="action-text">
                    <h4>Book Tour Package</h4>
                    <p>Reserve tour</p>
                </div>
            </a>

            <a href="<?php echo e(route('hotels.index')); ?>" class="action-btn">
                <div class="action-icon" style="--gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="action-text">
                    <h4>Hotel Booking</h4>
                    <p>Reserve hotel</p>
                </div>
            </a>

            <a href="<?php echo e(route('documentation.index')); ?>" class="action-btn">
                <div class="action-icon" style="--gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="action-text">
                    <h4>Documentation</h4>
                    <p>Get documents</p>
                </div>
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/b2br/resources/views/dashboard.blade.php ENDPATH**/ ?>