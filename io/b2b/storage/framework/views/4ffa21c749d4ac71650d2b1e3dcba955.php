<?php $__env->startSection('title', 'Admin Dashboard'); ?>
<?php $__env->startSection('page-title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white shadow rounded-lg p-6 text-center">
        <div class="text-3xl font-bold text-blue-600"><?php echo e($userCount); ?></div>
        <div class="text-gray-600 mt-2">Users</div>
    </div>
    <div class="bg-white shadow rounded-lg p-6 text-center">
        <div class="text-3xl font-bold text-green-600"><?php echo e($paymentCount); ?></div>
        <div class="text-gray-600 mt-2">Payments</div>
    </div>
    <div class="bg-white shadow rounded-lg p-6 text-center">
        <div class="text-3xl font-bold text-yellow-600"><?php echo e($walletTxCount); ?></div>
        <div class="text-gray-600 mt-2">Wallet Transactions</div>
    </div>
    <div class="bg-white shadow rounded-lg p-6 text-center">
        <div class="text-3xl font-bold text-purple-600"><?php echo e(array_sum($serviceCounts)); ?></div>
        <div class="text-gray-600 mt-2">Total Services</div>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <a href="<?php echo e(route('admin.users.index')); ?>" class="bg-blue-50 hover:bg-blue-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-users text-2xl text-blue-600 mb-2"></i>
        <span class="font-semibold">Manage Users</span>
    </a>
    <a href="<?php echo e(route('admin.services')); ?>" class="bg-green-50 hover:bg-green-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-cogs text-2xl text-green-600 mb-2"></i>
        <span class="font-semibold">All Services</span>
    </a>
    <a href="<?php echo e(route('admin.payments')); ?>" class="bg-yellow-50 hover:bg-yellow-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-credit-card text-2xl text-yellow-600 mb-2"></i>
        <span class="font-semibold">All Payments</span>
    </a>
    <a href="<?php echo e(route('admin.wallet-transactions')); ?>" class="bg-purple-50 hover:bg-purple-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-wallet text-2xl text-purple-600 mb-2"></i>
        <span class="font-semibold">Wallet Transactions</span>
    </a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <a href="<?php echo e(route('admin.mail.all')); ?>" class="bg-indigo-50 hover:bg-indigo-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-envelope text-2xl text-indigo-600 mb-2"></i>
        <span class="font-semibold">Send Mail to All Users</span>
    </a>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="bg-pink-50 hover:bg-pink-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-user-plus text-2xl text-pink-600 mb-2"></i>
        <span class="font-semibold">Add New User</span>
    </a>
    <a href="<?php echo e(route('admin.users.index')); ?>" class="bg-gray-50 hover:bg-gray-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-money-bill-wave text-2xl text-gray-600 mb-2"></i>
        <span class="font-semibold">Fund User Wallet</span>
    </a>
    <a href="<?php echo e(route('admin.services')); ?>#documentation" class="bg-teal-50 hover:bg-teal-100 shadow rounded-lg p-6 flex flex-col items-center justify-center">
        <i class="fas fa-file-alt text-2xl text-teal-600 mb-2"></i>
        <span class="font-semibold">Manage Documentation</span>
    </a>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>