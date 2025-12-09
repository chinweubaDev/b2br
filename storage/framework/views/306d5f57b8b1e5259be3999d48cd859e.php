<header class="bg-white shadow flex items-center justify-between px-4 h-16 sticky top-0 z-20">
    <button @click="$dispatch('toggle-sidebar')" class="lg:hidden text-gray-500 focus:outline-none">
        <i class="fas fa-bars text-2xl"></i>
    </button>
    <div class="flex items-center">
        <img src="/assets/images/logo-light.png" alt="Royeli Logo" class="h-8 mr-2">
        <span class="text-xl font-bold text-blue-700">Royeli Admin</span>
    </div>
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center focus:outline-none">
            <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                <span class="text-sm font-medium text-gray-700"><?php echo e(substr(auth()->user()->name, 0, 1)); ?></span>
            </div>
        </button>
        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-30" x-cloak>
            <div class="px-4 py-2 text-sm text-gray-700 border-b">
                <div class="font-medium"><?php echo e(auth()->user()->name); ?></div>
                <div class="text-gray-500"><?php echo e(auth()->user()->email); ?></div>
            </div>
            <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <i class="fas fa-home mr-2"></i> Main Site
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sign out
                </button>
            </form>
        </div>
    </div>
</header> <?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/components/admin/topbar.blade.php ENDPATH**/ ?>