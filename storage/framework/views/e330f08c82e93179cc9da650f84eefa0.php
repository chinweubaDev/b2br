

<?php $__env->startSection('title', 'User Management - Admin Dashboard'); ?>
<?php $__env->startSection('page-title', 'User Management'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<div class="glass-card p-6 mb-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-200">User Management</h1>
            <p class="text-gray-400 mt-1">Manage all users and their permissions</p>
        </div>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add New User
        </a>
    </div>
</div>

<!-- Users Table -->
<div class="glass-card p-6">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Name</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Email</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Role</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Status</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Wallet</th>
                    <th class="text-left py-3 px-4 text-gray-300 font-semibold">Last Login</th>
                    <th class="text-right py-3 px-4 text-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b border-gray-700/50 hover:bg-white hover:bg-opacity-5 transition">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white font-semibold">
                                <?php echo e(substr($user->name, 0, 1)); ?>

                            </div>
                            <span class="text-gray-200 font-medium"><?php echo e($user->name); ?></span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-gray-300"><?php echo e($user->email); ?></td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            <?php if($user->role === 'admin'): ?> bg-red-500/20 text-red-400
                            <?php elseif($user->role === 'manager'): ?> bg-blue-500/20 text-blue-400
                            <?php elseif($user->role === 'agent'): ?> bg-green-500/20 text-green-400
                            <?php else: ?> bg-gray-500/20 text-gray-400
                            <?php endif; ?>">
                            <?php echo e(ucfirst($user->role)); ?>

                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <?php if($user->is_active): ?>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Active
                            </span>
                        <?php else: ?>
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">
                                <i class="fas fa-circle text-xs mr-1"></i>Inactive
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="py-4 px-4 text-gray-300"><?php echo e($user->formatted_wallet_balance ?? '₦0.00'); ?></td>
                    <td class="py-4 px-4 text-gray-400 text-sm">
                        <?php echo e($user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never'); ?>

                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="p-2 hover:bg-blue-500/20 rounded-lg transition text-blue-400" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?php echo e(route('admin.users.fund', $user)); ?>" class="p-2 hover:bg-green-500/20 rounded-lg transition text-green-400" title="Fund Wallet">
                                <i class="fas fa-wallet"></i>
                            </a>
                            <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="p-2 hover:bg-red-500/20 rounded-lg transition text-red-400" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="py-12 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-users text-4xl mb-4 opacity-50"></i>
                            <p class="text-lg">No users found</p>
                            <p class="text-sm mt-2">Add your first user to get started</p>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <?php if(isset($users) && $users->hasPages()): ?>
    <div class="mt-6">
        <?php echo e($users->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\creat\Downloads\b2b\resources\views/admin/users/index.blade.php ENDPATH**/ ?>