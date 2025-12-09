<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard - Royeli Tours & Travel'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen">
        <!-- Sidebar -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 lg:hidden" style="display: none;">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
        </div>

        <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform lg:translate-x-0 lg:static lg:inset-0" style="display: none;">
            <!-- Sidebar content -->
            <div class="flex items-center justify-center h-16 bg-gray-800">
                <h1 class="text-white text-xl font-bold">Admin Panel</h1>
            </div>
            
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.users.*') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-users mr-3"></i>
                        User Management
                    </a>
                    
                    <div x-data="{ openVisa: false, openTour: false, openHotel: false, openCruise: false, openDoc: false }">
                        <!-- Manage Visa -->
                        <div>
                            <button @click="openVisa = !openVisa" class="flex items-center w-full px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg focus:outline-none">
                                <i class="fas fa-passport mr-3"></i> Manage Visa
                                <i class="fas fa-chevron-down ml-auto" :class="openVisa ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openVisa" x-cloak class="ml-8 space-y-1">
                                <a href="<?php echo e(route('visas.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Visas</a>
                                <a href="<?php echo e(route('visas.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Visa</a>
                            </div>
                        </div>
                        <!-- Manage Tour -->
                        <div>
                            <button @click="openTour = !openTour" class="flex items-center w-full px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg focus:outline-none">
                                <i class="fas fa-map-marked-alt mr-3"></i> Manage Tour
                                <i class="fas fa-chevron-down ml-auto" :class="openTour ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openTour" x-cloak class="ml-8 space-y-1">
                                <a href="<?php echo e(route('tours.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Tours</a>
                                <a href="<?php echo e(route('tours.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Tour</a>
                            </div>
                        </div>
                        <!-- Manage Hotel -->
                        <div>
                            <button @click="openHotel = !openHotel" class="flex items-center w-full px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg focus:outline-none">
                                <i class="fas fa-hotel mr-3"></i> Manage Hotel
                                <i class="fas fa-chevron-down ml-auto" :class="openHotel ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openHotel" x-cloak class="ml-8 space-y-1">
                                <a href="<?php echo e(route('hotels.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Hotels</a>
                                <a href="<?php echo e(route('hotels.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Hotel</a>
                            </div>
                        </div>
                        <!-- Manage Cruise -->
                        <div>
                            <button @click="openCruise = !openCruise" class="flex items-center w-full px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg focus:outline-none">
                                <i class="fas fa-ship mr-3"></i> Manage Cruise
                                <i class="fas fa-chevron-down ml-auto" :class="openCruise ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openCruise" x-cloak class="ml-8 space-y-1">
                                <a href="<?php echo e(route('cruises.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Cruises</a>
                                <a href="<?php echo e(route('cruises.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Cruise</a>
                            </div>
                        </div>
                        <!-- Manage Documentation -->
                        <div>
                            <button @click="openDoc = !openDoc" class="flex items-center w-full px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg focus:outline-none">
                                <i class="fas fa-file-alt mr-3"></i> Manage Documentation
                                <i class="fas fa-chevron-down ml-auto" :class="openDoc ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="openDoc" x-cloak class="ml-8 space-y-1">
                                <a href="<?php echo e(route('documentation.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Documentation</a>
                                <a href="<?php echo e(route('documentation.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Documentation</a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="<?php echo e(route('admin.services')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.services') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-cogs mr-3"></i>
                        All Services
                    </a>
                    
                    <a href="<?php echo e(route('admin.payments')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.payments') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-credit-card mr-3"></i>
                        All Payments
                    </a>
                    
                    <a href="<?php echo e(route('admin.wallet-transactions')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.wallet-transactions') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-wallet mr-3"></i>
                        Wallet Transactions
                    </a>
                    
                    <a href="<?php echo e(route('admin.mail.all')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.mail.all') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-envelope mr-3"></i>
                        Send Mail to All
                    </a>
                    
                    <a href="<?php echo e(route('bookings.index')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('bookings.*') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-calendar-check mr-3"></i>
                        Bookings
                    </a>
                    
                    <hr class="border-gray-700 my-4">
                    
                    <a href="<?php echo e(route('admin.settings')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.settings') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-cog mr-3"></i>
                        Settings
                    </a>
                    
                    <a href="<?php echo e(route('admin.health')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.health') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-heartbeat mr-3"></i>
                        System Health
                    </a>
                    
                    <a href="<?php echo e(route('admin.logs')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.logs') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-list-alt mr-3"></i>
                        System Logs
                    </a>
                    
                    <a href="<?php echo e(route('admin.backups')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg <?php echo e(request()->routeIs('admin.backups') ? 'bg-gray-700 text-white' : ''); ?>">
                        <i class="fas fa-database mr-3"></i>
                        Backups
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main content -->
        <div class="lg:pl-64 flex flex-col flex-1">
            <!-- Top navigation -->
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button @click="sidebarOpen = !sidebarOpen" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 lg:hidden">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex items-center">
                        <h1 class="text-2xl font-semibold text-gray-900"><?php echo $__env->yieldContent('page-title', 'Admin Dashboard'); ?></h1>
                    </div>
                    
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-sm font-medium text-gray-700"><?php echo e(substr(auth()->user()->name, 0, 1)); ?></span>
                                    </div>
                                </button>
                            </div>
                            
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">
                                <div class="px-4 py-2 text-sm text-gray-700 border-b">
                                    <div class="font-medium"><?php echo e(auth()->user()->name); ?></div>
                                    <div class="text-gray-500"><?php echo e(auth()->user()->email); ?></div>
                                    <div class="text-xs text-gray-400"><?php echo e(auth()->user()->role_display_name); ?></div>
                                </div>
                                
                                <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-home mr-2"></i>
                                    Main Site
                                </a>
                                
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page content -->
            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <?php if(session('success')): ?>
                            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded flex items-center">
                                <i class="fas fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($errors->any()): ?>
                            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <ul class="list-disc list-inside">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html> <?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/layouts/admin.blade.php ENDPATH**/ ?>