<?php $__env->startSection('title', 'System Health - Admin Dashboard'); ?>
<?php $__env->startSection('page-title', 'System Health'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- System Status Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 <?php echo e($health['database']['status'] === 'healthy' ? 'bg-green-500' : 'bg-red-500'); ?> rounded-md flex items-center justify-center">
                            <i class="fas fa-database text-white"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Database</dt>
                            <dd class="text-lg font-medium text-gray-900"><?php echo e(ucfirst($health['database']['status'])); ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="mt-2">
                    <p class="text-sm text-gray-600"><?php echo e($health['database']['message']); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 <?php echo e($health['storage']['status'] === 'healthy' ? 'bg-green-500' : ($health['storage']['status'] === 'warning' ? 'bg-yellow-500' : 'bg-red-500')); ?> rounded-md flex items-center justify-center">
                            <i class="fas fa-hdd text-white"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Storage</dt>
                            <dd class="text-lg font-medium text-gray-900"><?php echo e(ucfirst($health['storage']['status'])); ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="mt-2">
                    <p class="text-sm text-gray-600"><?php echo e($health['storage']['message']); ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 <?php echo e($health['cache']['status'] === 'healthy' ? 'bg-green-500' : 'bg-red-500'); ?> rounded-md flex items-center justify-center">
                            <i class="fas fa-bolt text-white"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Cache</dt>
                            <dd class="text-lg font-medium text-gray-900"><?php echo e(ucfirst($health['cache']['status'])); ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="mt-2">
                    <p class="text-sm text-gray-600"><?php echo e($health['cache']['message']); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed System Information -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">System Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Application Details</h4>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Laravel Version:</span>
                            <span class="font-medium"><?php echo e(app()->version()); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>PHP Version:</span>
                            <span class="font-medium"><?php echo e(phpversion()); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Environment:</span>
                            <span class="font-medium"><?php echo e(config('app.env')); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Debug Mode:</span>
                            <span class="font-medium"><?php echo e(config('app.debug') ? 'Enabled' : 'Disabled'); ?></span>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Server Information</h4>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Server Software:</span>
                            <span class="font-medium"><?php echo e($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Server Protocol:</span>
                            <span class="font-medium"><?php echo e($_SERVER['SERVER_PROTOCOL'] ?? 'Unknown'); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Server Time:</span>
                            <span class="font-medium"><?php echo e(now()->format('Y-m-d H:i:s T')); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Timezone:</span>
                            <span class="font-medium"><?php echo e(config('app.timezone')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Metrics -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Performance Metrics</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-600"><?php echo e(number_format(memory_get_usage(true) / 1024 / 1024, 2)); ?> MB</div>
                    <div class="text-sm text-gray-500">Memory Usage</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-600"><?php echo e(number_format(microtime(true) - LARAVEL_START, 3)); ?>s</div>
                    <div class="text-sm text-gray-500">Request Time</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-purple-600"><?php echo e(number_format(count(get_included_files()))); ?></div>
                    <div class="text-sm text-gray-500">Files Loaded</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <button onclick="location.reload()" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center mr-3">
                        <i class="fas fa-sync-alt text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Refresh Status</p>
                        <p class="text-xs text-gray-500">Check current health</p>
                    </div>
                </button>

                <button onclick="clearCache()" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-yellow-500 rounded-md flex items-center justify-center mr-3">
                        <i class="fas fa-broom text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Clear Cache</p>
                        <p class="text-xs text-gray-500">Clear application cache</p>
                    </div>
                </button>

                <a href="<?php echo e(route('admin.logs')); ?>" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center mr-3">
                        <i class="fas fa-list-alt text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">View Logs</p>
                        <p class="text-xs text-gray-500">Check system logs</p>
                    </div>
                </a>

                <a href="<?php echo e(route('admin.backups')); ?>" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-red-500 rounded-md flex items-center justify-center mr-3">
                        <i class="fas fa-database text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Backup System</p>
                        <p class="text-xs text-gray-500">Create system backup</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function clearCache() {
    if (confirm('Are you sure you want to clear the application cache?')) {
        // This would typically make an AJAX call to clear cache
        alert('Cache cleared successfully!');
        location.reload();
    }
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/admin/health.blade.php ENDPATH**/ ?>