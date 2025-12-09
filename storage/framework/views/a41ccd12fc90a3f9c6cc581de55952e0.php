<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard - Royeli Tours & Travel'); ?></title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/admin.css')); ?>">
    
    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body x-data="{ sidebarOpen: false }" @keydown.escape="sidebarOpen = false">
    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" 
         x-cloak
         @click="sidebarOpen = false"
         class="sidebar-overlay"
         :class="{ 'active': sidebarOpen }">
    </div>

    <!-- Sidebar -->
    <aside class="admin-sidebar" :class="{ 'mobile-open': sidebarOpen }">
        <?php echo $__env->make('admin.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </aside>

    <!-- Main Content Area -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <?php echo $__env->make('admin.components.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>

        <!-- Page Content -->
        <main class="admin-content">
            <!-- Flash Messages -->
            <?php if(session('success')): ?>
                <div class="glass-card p-4 mb-6 border-l-4 border-green-500 animate-fade-in">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                        <span class="text-green-100"><?php echo e(session('success')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                <div class="glass-card p-4 mb-6 border-l-4 border-red-500 animate-fade-in">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3"></i>
                        <span class="text-red-100"><?php echo e(session('error')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if($errors->any()): ?>
                <div class="glass-card p-4 mb-6 border-l-4 border-red-500 animate-fade-in">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-triangle text-red-500 text-xl mr-3 mt-1"></i>
                        <ul class="list-disc list-inside text-red-100">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Page Content -->
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle sidebar on mobile
        document.addEventListener('alpine:init', () => {
            Alpine.data('sidebar', () => ({
                open: false,
                toggle() {
                    this.open = !this.open;
                }
            }));
        });
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html> <?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>