<!-- Left Section -->
<div class="topbar-left">
    <!-- Mobile Menu Toggle -->
    <button @click="sidebarOpen = !sidebarOpen" class="topbar-toggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Breadcrumb -->
    <div class="topbar-breadcrumb hidden md:flex">
        <span>Admin</span>
        <span class="breadcrumb-separator">/</span>
        <span class="breadcrumb-current"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></span>
    </div>
</div>

<!-- Right Section -->
<div class="topbar-right">
    <!-- Search Bar -->
    <div class="topbar-search hidden lg:block">
        <i class="fas fa-search topbar-search-icon"></i>
        <input type="text" placeholder="Search..." />
    </div>
    
    <!-- Notifications -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="topbar-icon-btn">
            <i class="fas fa-bell"></i>
            <span class="badge">3</span>
        </button>
        
        <!-- Notifications Dropdown -->
        <div x-show="open" 
             @click.away="open = false"
             x-cloak
             class="absolute right-0 mt-3 w-80 glass-card p-4 rounded-xl shadow-xl z-50"
             style="top: 100%;">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-base">Notifications</h3>
                <span class="text-xs text-purple-400">3 new</span>
            </div>
            <div class="space-y-3">
                <div class="p-3 bg-white bg-opacity-5 rounded-lg hover:bg-opacity-10 transition cursor-pointer">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-purple flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-white text-xs"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-200">New user registration</p>
                            <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                        </div>
                    </div>
                </div>
                <div class="p-3 bg-white bg-opacity-5 rounded-lg hover:bg-opacity-10 transition cursor-pointer">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-blue flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-credit-card text-white text-xs"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-200">New payment received</p>
                            <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                        </div>
                    </div>
                </div>
                <div class="p-3 bg-white bg-opacity-5 rounded-lg hover:bg-opacity-10 transition cursor-pointer">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-green flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-200">Booking confirmed</p>
                            <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-700">
                <a href="#" class="text-sm text-purple-400 hover:text-purple-300 font-medium">View all notifications →</a>
            </div>
        </div>
    </div>
    
    <!-- User Menu -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="flex items-center gap-2 hover:opacity-80 transition">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center font-semibold text-white">
                <?php echo e(substr(auth()->user()->name ?? 'A', 0, 1)); ?>

            </div>
            <div class="hidden md:block text-left">
                <div class="text-sm font-medium text-gray-200"><?php echo e(auth()->user()->name ?? 'Admin'); ?></div>
                <div class="text-xs text-gray-400">Administrator</div>
            </div>
            <i class="fas fa-chevron-down text-xs text-gray-400 hidden md:block"></i>
        </button>
        
        <!-- User Dropdown -->
        <div x-show="open" 
             @click.away="open = false"
             x-cloak
             class="absolute right-0 mt-3 w-56 glass-card rounded-xl shadow-xl overflow-hidden z-50"
             style="top: 100%;">
            <div class="p-4 border-b border-gray-700">
                <div class="font-medium text-gray-200"><?php echo e(auth()->user()->name ?? 'Admin'); ?></div>
                <div class="text-sm text-gray-400 mt-1"><?php echo e(auth()->user()->email ?? 'admin@example.com'); ?></div>
            </div>
            <div class="p-2">
                <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-5 transition text-gray-300 hover:text-white">
                    <i class="fas fa-home w-4"></i>
                    <span class="text-sm">Main Site</span>
                </a>
                <a href="<?php echo e(route('admin.settings')); ?>" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-5 transition text-gray-300 hover:text-white">
                    <i class="fas fa-cog w-4"></i>
                    <span class="text-sm">Settings</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white hover:bg-opacity-5 transition text-gray-300 hover:text-white">
                    <i class="fas fa-user w-4"></i>
                    <span class="text-sm">Profile</span>
                </a>
            </div>
            <div class="p-2 border-t border-gray-700">
                <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-500 hover:bg-opacity-10 transition text-red-400 hover:text-red-300 w-full text-left">
                        <i class="fas fa-sign-out-alt w-4"></i>
                        <span class="text-sm">Sign Out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> <?php /**PATH /Users/simeonuba/b2br/resources/views/admin/components/topbar.blade.php ENDPATH**/ ?>