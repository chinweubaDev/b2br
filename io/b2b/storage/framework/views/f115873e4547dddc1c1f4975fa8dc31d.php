<?php $__env->startSection('title', 'Wallet Transactions'); ?>
<?php $__env->startSection('page-title', 'Wallet Transactions'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">All Wallet Transactions</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Balance</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($transaction->id); ?></td>
                        <td class="px-4 py-2"><?php echo e($transaction->user->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs <?php echo e($transaction->type === 'credit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                <?php echo e(ucfirst($transaction->type)); ?>

                            </span>
                        </td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($transaction->amount)); ?></td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($transaction->balance_after)); ?></td>
                        <td class="px-4 py-2"><?php echo e($transaction->description); ?></td>
                        <td class="px-4 py-2"><?php echo e($transaction->created_at->format('Y-m-d H:i')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/admin/wallet-transactions.blade.php ENDPATH**/ ?>