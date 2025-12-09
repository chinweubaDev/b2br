<?php $__env->startSection('title', 'Admin Dashboard - Royeli Tours & Travel'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- Welcome Header -->
<div class="glass-card p-6 mb-8 animate-fade-in">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                Welcome back, <?php echo e(auth()->user()->name ?? 'Admin'); ?>!
            </h1>
            <p class="text-gray-400 mt-2">Here's what's happening with your business today</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="text-sm text-gray-400">Today's Date</p>
                <p class="text-lg font-semibold text-gray-200"><?php echo e(now()->format('F j, Y')); ?></p>
            </div>
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center">
                <i class="fas fa-calendar text-white"></i>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Users -->
    <div class="stat-card animate-slide-in" style="animation-delay: 0.1s">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-purple">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-card-trend up">
                <i class="fas fa-arrow-up"></i> 12%
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Total Users</p>
            <p class="stat-card-value"><?php echo e($userCount ?? '1,234'); ?></p>
        </div>
        <div class="stat-card-footer">
            <span class="text-xs text-gray-400">+48 this week</span>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="stat-card-link">
                View all <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Total Revenue -->
    <div class="stat-card animate-slide-in" style="animation-delay: 0.2s">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-blue">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-card-trend up">
                <i class="fas fa-arrow-up"></i> 8%
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Total Revenue</p>
            <p class="stat-card-value">₦<?php echo e(number_format($totalRevenue ?? 5420000, 0)); ?></p>
        </div>
        <div class="stat-card-footer">
            <span class="text-xs text-gray-400">This month</span>
            <a href="<?php echo e(route('admin.payments')); ?>" class="stat-card-link">
                View all <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Active Bookings -->
    <div class="stat-card animate-slide-in" style="animation-delay: 0.3s">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-cyan">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-card-trend up">
                <i class="fas fa-arrow-up"></i> 23%
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Active Bookings</p>
            <p class="stat-card-value"><?php echo e($bookingCount ?? '89'); ?></p>
        </div>
        <div class="stat-card-footer">
            <span class="text-xs text-gray-400">Pending: <?php echo e($pendingBookings ?? '12'); ?></span>
            <a href="<?php echo e(route('admin.bookings.index')); ?>" class="stat-card-link">
                View all <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Pending Approvals -->
    <div class="stat-card animate-slide-in" style="animation-delay: 0.4s">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-yellow">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-card-trend down">
                <i class="fas fa-arrow-down"></i> 5%
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Pending Approvals</p>
            <p class="stat-card-value"><?php echo e($pendingApprovals ?? '7'); ?></p>
        </div>
        <div class="stat-card-footer">
            <span class="text-xs text-gray-400">Requires action</span>
            <a href="<?php echo e(route('admin.partners.pending')); ?>" class="stat-card-link">
                Review <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>

<!-- Services Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Visa Services -->
    <div class="stat-card animate-fade-in">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-blue">
                <i class="fas fa-passport"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Visa Services</p>
            <p class="stat-card-value"><?php echo e($visaCount ?? '15'); ?></p>
        </div>
        <div class="stat-card-footer">
            <a href="<?php echo e(route('visas.index')); ?>" class="stat-card-link">
                View all <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Tour Packages -->
    <div class="stat-card animate-fade-in">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-green">
                <i class="fas fa-map-marked-alt"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Tour Packages</p>
            <p class="stat-card-value"><?php echo e($tourCount ?? '8'); ?></p>
        </div>
        <div class="stat-card-footer">
            <a href="<?php echo e(route('tours.index')); ?>" class="stat-card-link">
                View all <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Hotels -->
    <div class="stat-card animate-fade-in">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-pink">
                <i class="fas fa-hotel"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Hotels</p>
            <p class="stat-card-value"><?php echo e($hotelCount ?? '25'); ?></p>
        </div>
        <div class="stat-card-footer">
            <a href="<?php echo e(route('hotels.index')); ?>" class="stat-card-link">
                View all <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Cruises -->
    <div class="stat-card animate-fade-in">
        <div class="stat-card-header">
            <div class="stat-card-icon gradient-cyan">
                <i class="fas fa-ship"></i>
            </div>
        </div>
        <div class="stat-card-body">
            <p class="stat-card-label">Cruises</p>
            <p class="stat-card-value"><?php echo e($cruiseCount ?? '3'); ?></p>
        </div>
        <div class="stat-card-footer">
            <a href="<?php echo e(route('cruises.index')); ?>" class="stat-card-link">
                View all <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>
</div>

<!-- Recent Activity & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Recent Activity -->
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-200">Recent Activity</h2>
            <a href="<?php echo e(route('admin.logs')); ?>" class="text-sm text-purple-400 hover:text-purple-300">View all →</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-white hover:bg-opacity-5 transition">
                <div class="w-10 h-10 rounded-full bg-gradient-purple flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user-plus text-white text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-200 font-medium">New user registered</p>
                    <p class="text-xs text-gray-400 mt-1">John Doe joined the platform</p>
                    <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-white hover:bg-opacity-5 transition">
                <div class="w-10 h-10 rounded-full bg-gradient-blue flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-credit-card text-white text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-200 font-medium">Payment received</p>
                    <p class="text-xs text-gray-400 mt-1">₦250,000 for UK Visa application</p>
                    <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-white hover:bg-opacity-5 transition">
                <div class="w-10 h-10 rounded-full bg-gradient-green flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check-circle text-white text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-200 font-medium">Booking confirmed</p>
                    <p class="text-xs text-gray-400 mt-1">Qatar Wonders tour package</p>
                    <p class="text-xs text-gray-500 mt-1">3 hours ago</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-white hover:bg-opacity-5 transition">
                <div class="w-10 h-10 rounded-full bg-gradient-yellow flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-handshake text-white text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-200 font-medium">New partner request</p>
                    <p class="text-xs text-gray-400 mt-1">Travel Express Agency</p>
                    <p class="text-xs text-gray-500 mt-1">5 hours ago</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-200">Quick Actions</h2>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <a href="<?php echo e(route('visas.create')); ?>" class="p-4 rounded-xl bg-gradient-to-br from-purple-500/10 to-purple-500/5 border border-purple-500/20 hover:border-purple-500/40 transition group">
                <div class="w-12 h-12 rounded-lg bg-gradient-purple flex items-center justify-center mb-3 group-hover:scale-110 transition">
                    <i class="fas fa-passport text-white"></i>
                </div>
                <p class="font-semibold text-gray-200 mb-1">Add Visa</p>
                <p class="text-xs text-gray-400">Create new visa service</p>
            </a>
            <a href="<?php echo e(route('tours.create')); ?>" class="p-4 rounded-xl bg-gradient-to-br from-green-500/10 to-green-500/5 border border-green-500/20 hover:border-green-500/40 transition group">
                <div class="w-12 h-12 rounded-lg bg-gradient-green flex items-center justify-center mb-3 group-hover:scale-110 transition">
                    <i class="fas fa-map-marked-alt text-white"></i>
                </div>
                <p class="font-semibold text-gray-200 mb-1">Add Tour</p>
                <p class="text-xs text-gray-400">Create tour package</p>
            </a>
            <a href="<?php echo e(route('hotels.create')); ?>" class="p-4 rounded-xl bg-gradient-to-br from-pink-500/10 to-pink-500/5 border border-pink-500/20 hover:border-pink-500/40 transition group">
                <div class="w-12 h-12 rounded-lg bg-gradient-pink flex items-center justify-center mb-3 group-hover:scale-110 transition">
                    <i class="fas fa-hotel text-white"></i>
                </div>
                <p class="font-semibold text-gray-200 mb-1">Add Hotel</p>
                <p class="text-xs text-gray-400">Create hotel listing</p>
            </a>
            <a href="<?php echo e(route('cruises.create')); ?>" class="p-4 rounded-xl bg-gradient-to-br from-cyan-500/10 to-cyan-500/5 border border-cyan-500/20 hover:border-cyan-500/40 transition group">
                <div class="w-12 h-12 rounded-lg bg-gradient-cyan flex items-center justify-center mb-3 group-hover:scale-110 transition">
                    <i class="fas fa-ship text-white"></i>
                </div>
                <p class="font-semibold text-gray-200 mb-1">Add Cruise</p>
                <p class="text-xs text-gray-400">Create cruise package</p>
            </a>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="p-4 rounded-xl bg-gradient-to-br from-blue-500/10 to-blue-500/5 border border-blue-500/20 hover:border-blue-500/40 transition group">
                <div class="w-12 h-12 rounded-lg bg-gradient-blue flex items-center justify-center mb-3 group-hover:scale-110 transition">
                    <i class="fas fa-users text-white"></i>
                </div>
                <p class="font-semibold text-gray-200 mb-1">Manage Users</p>
                <p class="text-xs text-gray-400">View all users</p>
            </a>
            <a href="<?php echo e(route('admin.payments')); ?>" class="p-4 rounded-xl bg-gradient-to-br from-yellow-500/10 to-yellow-500/5 border border-yellow-500/20 hover:border-yellow-500/40 transition group">
                <div class="w-12 h-12 rounded-lg bg-gradient-yellow flex items-center justify-center mb-3 group-hover:scale-110 transition">
                    <i class="fas fa-credit-card text-white"></i>
                </div>
                <p class="font-semibold text-gray-200 mb-1">Payments</p>
                <p class="text-xs text-gray-400">View transactions</p>
            </a>
        </div>
    </div>
</div>

<!-- Featured Services -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Featured Tours -->
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-200">Featured Tours</h2>
            <a href="<?php echo e(route('tours.index')); ?>" class="text-sm text-purple-400 hover:text-purple-300">View all →</a>
        </div>
        <div class="space-y-4">
            <div class="p-4 rounded-lg bg-white bg-opacity-5 hover:bg-opacity-10 transition">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-semibold text-gray-200">Cape Town Experience</h3>
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-500/20 text-green-400">Featured</span>
                </div>
                <p class="text-sm text-gray-400 mb-2">Oct 1–7, 2025 • 7 days</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-purple-400">₦3,595,000</span>
                    <span class="text-xs text-gray-500">B2B Rate</span>
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white bg-opacity-5 hover:bg-opacity-10 transition">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-semibold text-gray-200">Qatar Wonders</h3>
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-500/20 text-blue-400">Popular</span>
                </div>
                <p class="text-sm text-gray-400 mb-2">Aug 19–25, 2025 • 7 days</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-purple-400">₦2,825,000</span>
                    <span class="text-xs text-gray-500">B2B Rate</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Visas -->
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-200">Popular Visas</h2>
            <a href="<?php echo e(route('visas.index')); ?>" class="text-sm text-purple-400 hover:text-purple-300">View all →</a>
        </div>
        <div class="space-y-4">
            <div class="p-4 rounded-lg bg-white bg-opacity-5 hover:bg-opacity-10 transition">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-semibold text-gray-200">UK Tourist Visa</h3>
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-500/20 text-yellow-400">High Demand</span>
                </div>
                <p class="text-sm text-gray-400 mb-2">Processing: 2-3 weeks</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-purple-400">₦500,000</span>
                    <span class="text-xs text-gray-500">B2B Rate</span>
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white bg-opacity-5 hover:bg-opacity-10 transition">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-semibold text-gray-200">USA Tourist Visa</h3>
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-500/20 text-red-400">Express</span>
                </div>
                <p class="text-sm text-gray-400 mb-2">Processing: By appointment</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-purple-400">₦649,000</span>
                    <span class="text-xs text-gray-500">B2B Rate</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>