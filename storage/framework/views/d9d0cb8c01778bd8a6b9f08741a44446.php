<aside class="bg-gray-900 text-gray-100 w-64 min-h-screen flex flex-col" x-data="{ open: false }">
    <div class="flex items-center justify-center h-16 bg-gray-800">
        <img src="/assets/images/logo-light.png" alt="Royeli Logo" class="h-8 mr-2">
        <span class="text-xl font-bold">Admin</span>
    </div>
    <nav class="flex-1 mt-4 space-y-1 px-2">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-700' : ''); ?>">
            <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
        </a>
        <a href="<?php echo e(route('admin.users.index')); ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 <?php echo e(request()->routeIs('admin.users.*') ? 'bg-gray-700' : ''); ?>">
            <i class="fas fa-users mr-3"></i> Users
        </a>
        <a href="<?php echo e(route('admin.payments')); ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 <?php echo e(request()->routeIs('admin.payments') ? 'bg-gray-700' : ''); ?>">
            <i class="fas fa-credit-card mr-3"></i> Payments
        </a>
        <a href="<?php echo e(route('admin.wallet-transactions')); ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 <?php echo e(request()->routeIs('admin.wallet-transactions') ? 'bg-gray-700' : ''); ?>">
            <i class="fas fa-wallet mr-3"></i> Wallet
        </a>
        <template x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center w-full px-4 py-2 rounded-lg hover:bg-gray-700 focus:outline-none">
                <i class="fas fa-passport mr-3"></i> Visa
                <i class="fas fa-chevron-down ml-auto" :class="open ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="open" x-cloak class="ml-8 space-y-1">
                <a href="<?php echo e(route('visas.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Visas</a>
                <a href="<?php echo e(route('visas.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Visa</a>
            </div>
        </template>
        <template x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center w-full px-4 py-2 rounded-lg hover:bg-gray-700 focus:outline-none">
                <i class="fas fa-map-marked-alt mr-3"></i> Tour
                <i class="fas fa-chevron-down ml-auto" :class="open ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="open" x-cloak class="ml-8 space-y-1">
                <a href="<?php echo e(route('tours.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Tours</a>
                <a href="<?php echo e(route('tours.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Tour</a>
            </div>
        </template>
        <template x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center w-full px-4 py-2 rounded-lg hover:bg-gray-700 focus:outline-none">
                <i class="fas fa-hotel mr-3"></i> Hotel
                <i class="fas fa-chevron-down ml-auto" :class="open ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="open" x-cloak class="ml-8 space-y-1">
                <a href="<?php echo e(route('hotels.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Hotels</a>
                <a href="<?php echo e(route('hotels.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Hotel</a>
            </div>
        </template>
        <template x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center w-full px-4 py-2 rounded-lg hover:bg-gray-700 focus:outline-none">
                <i class="fas fa-ship mr-3"></i> Cruise
                <i class="fas fa-chevron-down ml-auto" :class="open ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="open" x-cloak class="ml-8 space-y-1">
                <a href="<?php echo e(route('cruises.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Cruises</a>
                <a href="<?php echo e(route('cruises.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Cruise</a>
            </div>
        </template>
        <template x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center w-full px-4 py-2 rounded-lg hover:bg-gray-700 focus:outline-none">
                <i class="fas fa-file-alt mr-3"></i> Documentation
                <i class="fas fa-chevron-down ml-auto" :class="open ? 'rotate-180' : ''"></i>
            </button>
            <div x-show="open" x-cloak class="ml-8 space-y-1">
                <a href="<?php echo e(route('documentation.index')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">All Documentation</a>
                <a href="<?php echo e(route('documentation.create')); ?>" class="block px-4 py-2 text-gray-400 hover:text-white">Create Documentation</a>
            </div>
        </template>
        <a href="<?php echo e(route('admin.settings')); ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 <?php echo e(request()->routeIs('admin.settings') ? 'bg-gray-700' : ''); ?>">
            <i class="fas fa-cog mr-3"></i> Settings
        </a>
        <a href="<?php echo e(route('admin.logs')); ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 <?php echo e(request()->routeIs('admin.logs') ? 'bg-gray-700' : ''); ?>">
            <i class="fas fa-list-alt mr-3"></i> Logs
        </a>
        <a href="<?php echo e(route('admin.backups')); ?>" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 <?php echo e(request()->routeIs('admin.backups') ? 'bg-gray-700' : ''); ?>">
            <i class="fas fa-database mr-3"></i> Backups
        </a>
    </nav>
</aside> <?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/admin/components/sidebar.blade.php ENDPATH**/ ?>