<?php $__env->startSection('title', 'All Payments'); ?>
<?php $__env->startSection('page-title', 'All Payments'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">Payments</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Method</th>
                    <th class="px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($payment->id); ?></td>
                        <td class="px-4 py-2"><?php echo e($payment->user->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-2">₦<?php echo e(number_format($payment->amount)); ?></td>
                        <td class="px-4 py-2"><?php echo e(ucfirst($payment->status)); ?></td>
                        <td class="px-4 py-2"><?php echo e(ucfirst($payment->method)); ?></td>
                        <td class="px-4 py-2"><?php echo e($payment->created_at->format('Y-m-d H:i')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/simeonuba/Downloads/royeli_travel_portal_final/resources/views/admin/payments.blade.php ENDPATH**/ ?>