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
    <div x-data="{ sidebarOpen: false }" @toggle-sidebar.window="sidebarOpen = !sidebarOpen" class="min-h-screen flex">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'block' : 'hidden lg:block'" class="fixed lg:static z-40 w-64 h-full">
            <?php echo $__env->make('components.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Main content -->
        <div class="flex-1 flex flex-col min-h-screen lg:pl-64">
            <?php echo $__env->make('components.admin.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
</html> <?php /**PATH /home/u363422527/domains/royelimytravel.com/public_html/b2b/resources/views/layouts/admin.blade.php ENDPATH**/ ?>